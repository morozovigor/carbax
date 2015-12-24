<?php
use common\models\db\TofSearchTree;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
?>
<div data-view="<?= $view; ?>" class="selectCar">
    <?= Html::dropDownList(
        'typeAuto',
        $auto->auto_type,
        ['1'=>'Легковой автомобиль','2'=>'Грузовой автомобиль'],
        ['class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'typeAuto']
    ); ?>

    <?=
    Html::dropDownList(
        'manufactures',
        $auto->brand_id,
        ArrayHelper::map($brand, 'id', 'name'),
        ['class' => 'addContent__adress brand_select_car', 'id' => 'selectAutoWidget', 'type' => ($auto->auto_type=='1') ? 'man' : 'cargoman']);
    ?>

    <?=
    Html::dropDownList(
        'year',
        $auto->year,
        $year,
        ['class' => 'addContent__adress year_select_car', 'id' => 'selectAutoWidget', 'type' => ($auto->auto_type=='1') ? 'mod' : 'cargomod']);
    ?>

    <?=
        Html::dropDownList(
            'model',
            $auto->model_id,
            ArrayHelper::map($model,'id','name'),
            ['class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => ($auto->auto_type=='1') ? 'typ' : 'cargosubmod']
        );
    ?>

    <?php if($auto->auto_type == 2): ?>
        <?=
        Html::dropDownList(
            'submodel',
            $auto->submodel_id,
            ArrayHelper::map($sub_model,'id','name'),
            ['class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'cargotyp']
        );
        ?>
    <?php endif; ?>

    <?=
        Html::dropDownList(
            'types',
            $auto->type_id,
            ArrayHelper::map($typ,'id','name'),
            ['class' => 'addContent__adress', 'id' => 'selectAutoWidget', 'type' => 'group']
        );
    ?>

    <?php if($cat): ?>
    <span id="categoryBox">
        <?=
        Html::dropDownList(
            'main_cat',
            $cat[0],
            ArrayHelper::map($main_cat, 'str_id', 'str_des'),
            ['class'=>'addContent__adress catSel', 'id'=>'mainCat']);
        ?>

        <?php
            $i = 0;
            foreach($cat as $c){
                if($i != 0){
                    $subCat = TofSearchTree::find()->where(['str_id_parent' => $cat[$i - 1]])->all();
                    echo Html::dropDownList(
                        'sub_cat[]',
                        $c,
                        ArrayHelper::map($subCat, 'str_id', 'str_des'),
                        ['class' => 'addContent__adress catSel']);
                }
                $i++;
            }
        ?>
     </span>
    <?php endif; ?>
</div>