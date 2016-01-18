<?php
use common\models\db\GeobaseCity;
use common\models\db\GeobaseRegion;
use yii\helpers\Html;


$this->title = "Профиль " . $user['username'];
$this->params['breadcrumbs'][] = ['label' => 'Личный кабинет', 'url' => ['/office']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('/css/bootstrap.min.css');
?>

<section class="main-container">
    <div class="profileWrap">
        <div class="headerProfile">
            <?php if(!empty($user['avatar'])): ?>
            <div class="profileAvatar">
                <?= Html::img('/'.$user['avatar'], ['width' => '200'])?>
            </div>
            <?php endif; ?>
            <?php if(!empty($user['name'])): ?>
            <div class="profileName profileElement">
                <?=$user['name']?> <?=$user['last_name']?>
            </div>
            <?php endif; ?>
            <div class="profileLogin profileElement">
                Логин: <?=$user['username']?>
            </div>



        </div>
        <div class="cleared"></div>

        <div class="busiines_user_profile">
            <h3>Бизнес:</h3>
            <ul id="listColumn">
                <?php foreach ($business as $b):?>
                    <li> <a href="/services/services/view_service?service_id=<?=$b->id;?>"><?= $b->name; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="profileEmail profileElement">
            Email: <?=$user['email']?>
        </div>
        <?php if(!empty($user['skype'])): ?>
            <div class="profileSkype profileElement">
                Skype: <?=$user['skype']?>
            </div>
        <?php endif; ?>
        <?php if(!empty($user['telephon'])): ?>
            <div class="profileTelephon profileElement">
                Телефон: <?=$user['telephon']?>
            </div>
        <?php endif; ?>
        <?php if(!empty($user['icq'])): ?>
            <div class="profileIcq profileElement">
                ICQ: <?=$user['icq']?>
            </div>
        <?php endif; ?>
        <?php if(!empty($user['link_vk'])): ?>
            <div class="profileLink_vk profileElement">
                ВК: <?=$user['link_vk']?>
            </div>
        <?php endif; ?>

        <?php if($user['region_id'] != 0): ?>
            <div class="profileRegion_id profileElement">
                Регион: <?= GeobaseRegion::find()->where(['id'=>$user['region_id']])->one()->name?>
            </div>
        <?php endif; ?>

        <?php if($user['city_id'] != 0): ?>
            <div class="profileCity_id profileElement">
                Город: <?= GeobaseCity::find()->where(['id'=>$user['city_id']])->one()->name?>
            </div>
        <?php endif; ?>

        <?php if($user['id'] == Yii::$app->user->id): ?>
            <div class="profileEditLink profileElement">
                <div class="addContent--save">
                    <?=Html::a('Редактировать', ['/profile/default/edit_contacts'])?>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <?php if($user['id'] != Yii::$app->user->id): ?>
        <a href="/message/default/send_message?from=<?=$_GET['id'];?>" class="btn btn-info btn-xs">Написать сообщение</a>
    <?php endif; ?>
</section>