<?php
use common\models\db\RequestAddForm;
use frontend\widgets\CustomField;
use frontend\widgets\RegionSelect;
use frontend\widgets\RequestAddFieldGroup;
use yii\helpers\Html;

$this->title = "Добавить заявку";
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/office']];
$this->params['breadcrumbs'][] = ['label' => 'Мои заявки', 'url' => ['/my_requests']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
$typeDisk = ['1'=>'Кованые','2'=>'Литые','3'=>'Штампованные','4'=>'Спицованные','5'=>'Сборные'];
$diameter = [];
for($i=7;$i<=30;$i+=1){
    $diameter[$i] = $i;
}

$rim_width = [];
for($i=4;$i<=13;$i+=0.5){
    $rim_width["$i"] = $i;
}

$number_holes = ['3'=>'3','4'=>'4','5'=>'5','6'=>'6','8'=>'8','9'=>'9','10'=>'10'];


$diameter_holes = [
    '98' => '98',
    '100' => '100',
    '105' => '105',
    '108' => '108',
    '110' => '110',
    '112' => '112',
    '114.3' => '114.3',
    '115' => '115',
    '118' => '118',
    '120' => '120',
    '125' => '125',
    '127' => '127',
    '130' => '130',
    '135' => '135',
    '139' => '139',
    '139.7' => '139.7',
    '140' => '140',
    '150' => '150',
    '160' => '160',
    '165' => '165',
    '165.1' => '165.1',
    '170' => '170',
    '180' => '180',
    '200' => '200',
    '205' => '205',
    '256' => '256'
];


$sortie = [
    '-65' => '-65',
    '-50' => '-50',
    '-44' => '-44',
    '-40' => '-40',
    '-36' => '-36',
    '-35' => '-35',
    '-32' => '-32',
    '-30' => '-30',
    '-28' => '-28',
    '-25' => '-25',
    '-24' => '-24',
    '-22' => '-22',
    '-20' => '-20',
    '-16' => '-16',
    '-15' => '-15',
    '-14' => '-14',
    '-13' => '-13',
    '-12' => '-12',
    '-10' => '-10',
    '-8' => '-8',
    '-7' => '-7',
    '-6' => '-6',
    '-5' => '-5',
    '-2' => '-2',
    '0' => '0',
    '1' => '1',
    '2' => '2',
    '3' => '3',
    '4' => '4',
    '5' => '5',
    '6' => '6',
    '7' => '7',
    '8' => '8',
    '9' => '9',
    '10' => '10',
    '11' => '11',
    '12' => '12',
    '13' => '13',
    '14' => '14',
    '15' => '15',
    '16' => '16',
    '17' => '17',
    '18' => '18',
    '19' => '19',
    '20' => '20',
    '21' => '21',
    '22' => '22',
    '23' => '23.5',
    '24' => '24',
    '25' => '25',
    '26' => '26',
    '27' => '27',
    '28' => '28',
    '29' => '29',
    '30' => '30',
    '31' => '31',
    '31.5' => '31.5',
    '32' => '32',
    '33' => '33',
    '34' => '34',
    '35' => '35',
    '36' => '36',
    '36.5' => '36.5',
    '37' => '37',
    '37.5' => '37.5',
    '38' => '39',
    '39.5' => '39.5',
    '40' => '40',
    '40.5' => '40.5',
    '41' => '41',
    '41.3' => '41.3',
    '41.5' => '41.5',
    '42' => '42',
    '43' => '43',
    '43.5' => '43.5',
    '43.8' => '43.8',
    '44' => '44',
    '45' => '45',
    '45.5' => '45.5',
    '46' => '46',
    '47' => '47',
    '47.5' => '47.5',
    '48' => '48',
    '49' => '49',
    '49.5' => '49.5',
    '50' => '50',
    '50.5' => '50.5',
    '50.8' => '50.8',
    '51' => '51',
    '52' => '52',
    '52.2' => '52.2',
    '52.5' => '52.5',
    '53' => '53',
    '54' => '54',
    '55' => '55',
    '56' => '56',
    '57' => '57',
    '58' => '58',
    '59' => '59',
    '60' => '60',
    '62' => '62',
    '63' => '63',
    '65' => '65',
    '66' => '66',
    '67' => '67',
    '68' => '68',
    '70' => '70',
    '75' => '75',
    '83' => '83',
    '100' => '100',
    '102' => '102',
    '105' => '105',
    '105.5' => '105.5',
    '106' => '106',
    '107' => '107',
    '108' => '108',
    '110' => '110',
    '111' => '111',
    '115' => '115',
    '116' => '116',
    '118' => '118',
    '120' => '120',
    '123' => '123',
    '124' => '124',
    '125' => '125',
    '126' => '126',
    '127' => '127',
    '128' => '128',
    '129' => '129',
    '130' => '130',
    '132' => '132',
    '133' => '133',
    '134' => '134',
    '135' => '135',
    '136' => '136',
    '138' => '138',
    '140' => '140',
    '142' => '142',
    '143' => '143',
    '144' => '144',
    '145' => '145',
    '147' => '147',
    '148' => '148',
    '152' => '152',
    '156' => '156',
    '157' => '157',
    '161' => '161',
    '163' => '163',
    '165' => '165',
    '167' => '167',
    '168' => '168',
    '172' => '172',
    '175' => '175',
    '185' => '185',
];
?>
<section class="main-container">
    <form id="addForm" action="send_request" method="post">
        <h3>Ваш регион и город:</h3>
        <?= RegionSelect::widget() ?>
        <span id="selectAuto">
            <?php
            if ($requestType->view_widget_auto == 1) {
                echo SelectAuto::widget(['view' => $requestType->view_category_auto,'select_from_garage'=>true]);
            }

            if($requestType->view_mark_auto == 1){
                echo Html::dropDownList(
                    'typeAuto',
                    0,
                    ['1'=>'Легковой автомобиль','2'=>'Грузовой автомобиль','3'=>'Мото транспорт'],
                    ['prompt' => 'Выберите тип авто', 'class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'typeAuto', 'required' => 'required']
                );
            }
            ?>

        </span>

        <div class="requestDiametr">
            <?php
                echo Html::label('Тип диска');
                echo Html::dropDownList('type_disk',$model->type_disk,$typeDisk,['prompt'=>'-','class'=>'addContent__adress']);
            ?>
        </div>
        <div class="requestDiametr">
            <?php
                echo Html::label('Диаметр');
                echo Html::dropDownList('diameter',$model->diameter,$diameter,['prompt'=>'-','class'=>'addContent__adress']);
            ?>
        </div>
        <div class="requestDiametr">
           <?php
                echo Html::label('Ширина обода');
                echo Html::dropDownList('rim_width',$model->rim_width,$rim_width,['prompt'=>'-','class'=>'addContent__adress']);
           ?>
        </div>
        <div class="requestDiametr">
            <?php
                echo Html::label('Количество отверстий');
                echo Html::dropDownList('number_holes',$model->number_holes,$number_holes, ['prompt'=>'-','class'=>'addContent__adress']);
            ?>
        </div>
        <div class="requestDiametr">
            <?php
                echo Html::label('Диаметр расположения отверстий');
                echo Html::dropDownList('diameter_holest',$model->diameter_holest,$diameter_holes,['prompt'=>'-','class'=>'addContent__adress']);
            ?>
        </div>
        <div class="requestDiametr">
            <?php
                echo Html::label('Вылет (ET)');
                echo Html::dropDownList('sortie',$model->sortie,$sortie,['class'=>'addContent__adress','prompt'=>'-']);
            ?>
        </div>

        <div class="requestAddFieldGroup">
            <?php echo RequestAddFieldGroup::widget(['groupId' => $_GET['id']]); ?>
        </div>


        <?php echo Html::hiddenInput('request_type_id', $_GET['id']); ?>



        <div class="singleContent__desc">
            <?php
            foreach ($addForm as $f) {
                $k = RequestAddForm::find()->where(['id' => $f->add_form_id])->one();
                echo CustomField::widget([
                    'name' => $k->key,
                    'template' => $k->template,
                    'inputOption' => ['class' => $k->class, 'id' => $k->input_id, 'placeholder' => $k->placeholder],
                    'labelOption' => ['for' => $k->input_id, 'style' => 'width:100%'],
                    'labelName' => $k->name,
                    'type' => ($k->form_type == 0) ? 'input' : 'textarea'
                ]);

            }
            ?>
        </div>
        <div class="addContent--save">
            <a href="#" onclick="document.getElementById('addForm').submit(); return false;">Отправить</a>
        </div>
    </form>
</section>