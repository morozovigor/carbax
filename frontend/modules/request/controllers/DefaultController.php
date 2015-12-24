<?php

namespace frontend\modules\request\controllers;

use common\classes\Debug;
use common\classes\SendingMessages;
use common\models\db\AddFieldsGroup;
use common\models\db\AutoComBrands;
use common\models\db\AutoComModels;
use common\models\db\AutoComModify;
use common\models\db\AutoComSubmodels;
use common\models\db\AutoWidget;
use common\models\db\BcbBrands;
use common\models\db\BcbModels;
use common\models\db\BcbModify;
use common\models\db\Request;
use common\models\db\RequestAddFieldValue;
use common\models\db\RequestAdditionalFields;
use common\models\db\RequestType;
use common\models\db\RequestTypeAddForm;
use common\models\db\RequestTypeGroup;
use common\models\db\Services;
use common\models\db\ServiceTypeGroup;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

class DefaultController extends Controller
{
    public $layout = 'page';

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'send_request' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function beforeAction($action)
    {
        if ($action->id == 'send_request') {
            Yii::$app->controller->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        $requestType = RequestType::find()->where(['id'=>$_GET['id']])->one();
        $addForm = RequestTypeAddForm::find()->where(['request_type_id'=>$_GET['id']])->all();
       // $groupService = RequestTypeGroup::find()->where(['request_type_id'=>$_GET['id']])->all();
        //Debug::prn($addForm);
        return $this->render('index',
            [
                'requestType' => $requestType,
                'addForm' => $addForm,
                //'groupService' => $groupService,
            ]);
    }

    public function actionSend_request(){
        $groups = RequestTypeGroup::find()->where(['request_type_id'=>$_POST['request_type_id']])->all();

        $autoWidget = new AutoWidget();
        $autoWidget->auto_type = $_POST['typeAuto'];
        $autoWidget->year = $_POST['year'];
        $autoWidget->brand_id = $_POST['manufactures'];
        $autoWidget->model_id = $_POST['model'];
        $autoWidget->type_id = $_POST['types'];
        if($_POST['typeAuto'] == 1){
            $manName = BcbBrands::find()->where(['id'=>$_POST['manufactures']])->one()->name;
            $modelName = BcbModels::find()->where(['id'=>$_POST['model']])->one()->name;
            $typeName = BcbModify::find()->where(['id'=>$_POST['types']])->one()->name;
        }
        else{
            $manName = AutoComBrands::find()->where(['id'=>$_POST['manufactures']])->one()->name;
            $modelName = AutoComModels::find()->where(['id'=>$_POST['model']])->one()->name;
            $typeName = AutoComModify::find()->where(['id'=>$_POST['model']])->one()->name;

            $autoWidget->submodel_id = $_POST['submodel'];
            $autoWidget->submodel_name = AutoComSubmodels::find()->where(['id'=>$_POST['submodel']])->one()->name;
        }

        $autoWidget->brand_name = $manName;
        $autoWidget->model_name = $modelName;
        $autoWidget->type_name = $typeName;

        $autoWidget->save();

        $request = new Request();
        $request->request_type_id = $_POST['request_type_id'];
        $request->user_id = Yii::$app->user->id;
        $request->id_auto_widget = $autoWidget->id;
        $request->save();

        unset($_POST['request_type_id']);



        foreach ($_POST as $key=>$value) {
            $addRequest = new RequestAddFieldValue();
            $addRequest->request_id = $request->id;
            $addRequest->key = $key;
            $addRequest->value = $value;
            $addRequest->save();
        }

        $fields = [];
        foreach($groups as $group){
            $gr = AddFieldsGroup::find()->where(['id' => $group->add_fields_group_id])->one();
            if(isset($_POST[$gr->label])) {
                foreach ($_POST[$gr->label] as $label) {
                    $saf = new RequestAdditionalFields();
                    $saf->request_id = $request->id;
                    $saf->add_field_id = $label;
                    $fields[] = $label;
                    $saf->save();
                }
            }
        }

        /*$services = Services::find()
            ->select('services.id, address.address, user_id, name, email, description, add_fields_id, address.region_id, address.city_id, brand_cars_id')
            ->leftJoin('service_add_fields', '`service_add_fields`.`service_id`')
            ->leftJoin('address', '`address`.`service_id` = `services`.`id`')
            ->leftJoin('service_brand_cars', '`service_brand_cars`.`service_id` = `services`.`id`')
            ->where([
                'address.region_id' => $_POST['regions'],
                'service_add_fields.add_fields_id' => $fields
            ])
            ->andWhere(['address.region_id' => $_POST['regions']])
            ->andWhere(['address.city_id' => $_POST['city_widget']])
            ->with('address')
            ->with('service_brand_cars')
            ->all();*/

        $services = Services::find()
            ->joinWith(['address', 'service_add_fields','service_brand_cars'])
            ->where([
                'address.region_id' => $_POST['regions'],
                'address.city_id' => $_POST['city_widget'],
                'service_brand_cars.brand_cars_id' => $_POST['manufactures'],
                'service_add_fields.add_fields_id' => $fields
            ])
            ->all();

        $ids = [];
        //Debug::prn($services);
        foreach($services as $service){
            $msg = $this->generateRequestMsg($_POST);
            $m = SendingMessages::send_message($service->user_id, Yii::$app->user->id, 'Заявка на сервис ' . $service->name, $msg,'request','0',$request->id);
            //Debug::prn($m);
            $ids[] = $service->id;
        }

        return $this->render('send_request');
    }

    public function actionAll_requests(){
        $this->view->params['bannersHide'] = false;
        $requests = Request::find()->where(['user_id' => Yii::$app->user->id])->all();
        $requestType = RequestType::find()->all();
        return $this->render('my_requests', ['requests' => $requests,'requestType'=>$requestType]);
    }

    public function actionDelete($id){
        Request::deleteAll(['id' => $id]);
        Yii::$app->session->setFlash('success','Заявка успешно удалена.');
        $requests = Request::find()->where(['user_id' => Yii::$app->user->id])->all();
        return $this->render('my_requests', ['requests' => $requests]);
    }

    public function generateRequestMsg($info){
        $data['title'] = $info['title'];
        $data['descr'] = $info['comm'];
        $data['brand_car'] = $info['manufactures'];
        return $this->renderPartial('request_msg_tpl', $data);
    }

    public function actionRequest_type(){
        $requestType = RequestType::find()->all();
        return $this->render('request_type', ['requestType' => $requestType]);
    }

    public function actionEdit(){
        //Debug::prn($_GET['id']);

        $requestTypeId = Request::find()->where(['id'=>$_GET['id']])->one()->request_type_id;

        $requestType = RequestType::find()->where(['id'=>$requestTypeId])->one();
        $addForm = RequestTypeAddForm::find()->where(['request_type_id'=>$requestTypeId])->all();
        $region = RequestAddFieldValue::find()->where(['request_id'=>$_GET['id'],'key'=>'regions'])->one();
        $city = RequestAddFieldValue::find()->where(['request_id'=>$_GET['id'],'key'=>'city_widget'])->one();
        $manufactures = RequestAddFieldValue::find()->where(['request_id'=>$_GET['id'],'key'=>'manufactures'])->one();

        return $this->render('edit',
            [
                'requestType'=>$requestType,
                'addForm' => $addForm,
                'requestTypeId'=>$requestTypeId,
            ]);
    }
}
