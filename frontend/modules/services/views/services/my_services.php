<?php
use common\models\db\Address;

$this->title = "Мои сервисы";
$this->registerCssFile('/css/bootstrap_btn.min.css');
?>
<section class="main-container">
    <?php
        if(isset($info)){
            ?>
            <div id="serviceInfo"><?=$info;?></div>
        <?php
        }
    ?>

    <button onclick="location.href='/add?service_type=<?=$serviceTypeId?>'" type="button" class="btn btn-success addServiceBtn">Добавить сервис</button>

    <table class="addAllServices">
        <?php
            foreach($service as $serv):
                $address = Address::find()->where(['service_id'=>$serv->id])->one();
        ?>
        <tr>
            <td><a href="/services/services/view_service?service_id=<?=$serv->id;?>"><b><?=$serv->name;?></b></a>, <?=$address->address;?> </td>
            <td class="addAllServices__control">
                <a href="#nowhere">редактировать </a>/
                <a href="/services/services/del_service?service_id=<?=$serv->id;?>&service_type=<?=$serviceTypeId?>" data-confirm="Вы действительно хотите удалить?">удалить</a>
            </td>
        </tr>
        <?php
            endforeach;
        ?>
    </table>
</section>
