<?php
use common\classes\Debug;
use yii\jui\AutoComplete;
use yii\web\JsExpression;

//Debug::prn($_POST);

//$cityName = (isset($_POST['city_name'])) ?  $_POST['city_name'] : 'Город';
if(isset($_POST['city_name'])){
    $cityName = $_POST['city_name'];
}
else {
    $cookies = Yii::$app->request->cookies;
    $cityName = $cookies->getValue('city', 'Город');
}
$cityId = (isset($_POST['city_id'])) ? $_POST['city_id'] : '';

echo AutoComplete::widget([
    'name' => 'city_name',
    'options' => [
        'class' => 'header--region--box',
        'placeholder' => $cityName,
        'id' => 'auto_complete_city_name_modal'
    ],
    'clientOptions' => [
        'autoFill'=>true,
        'minLength'=>'3',
        'select' => new JsExpression("function( event, ui ) {
            $('#auto_complete_city_id').val(ui.item.id);
            $('#auto_complete_city_name').val(ui.item.value);
            $('#auto_complete_form').submit();
        }"),
        'source' => $regions,
    ],
]);
?>

    <!--<div class="myLocationCarbax myLocationCarbaxAutoComplite" title="Мое местоположение"></div>-->

<?php echo "<input type='hidden' name='city_id' value='$cityId' id='auto_complete_city_id'>";