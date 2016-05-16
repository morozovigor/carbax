<?php
use app\models\GeobaseRegion;
use common\classes\Debug;
use yii\helpers\Url;
use yii\jui\AutoComplete;
use yii\widgets\LinkPager;
?>

<section class="deals">
    <div class="contain">
        <div class="deals--topline">
            <a href="<?= Url::to(['/offers/offers/all_offers','id'=>0]); ?>">
                <img src="/media/img/logo2.png" alt="CARBAX">
                <h3 class="orange">Спецпредложения</h3>
            </a>
            <span><a id="allOffers" href="<?= Url::to(['/offers/offers/all_offers','id'=>0]); ?>">Все спецпредложения</a></span>
        </div>
        <div class="deals__menu">
            <ul>
                <li><a href="#" class="deals__menu--service deals__menu--active" serviceTypeId="0">Все</a></li>
                <li><a href="#" class="deals__menu--service" serviceTypeId="1">Автосалон</a></li>
                <li><a href="#" class="deals__menu--service" serviceTypeId="4">Шины / Диски</a></li>
                <li><a href="#" class="deals__menu--service" serviceTypeId="6">Тюнинг</a></li>
                <li><a href="#" class="deals__menu--service" serviceTypeId="11">Автосервис</a></li>
                <li><a href="#" class="deals__menu--service" serviceTypeId="7">Автошкола</a></li>
                <li><a href="#" class="deals__menu--service" serviceTypeId="13">Авторазбор</a></li>
                <li><a href="#" class="deals__menu--service" serviceTypeId="9">Заправка</a></li>
                <li><a href="#" class="deals__menu--service" serviceTypeId="8">Страховка</a></li>
            </ul>
        </div>
        <div class="deals__line">
                <?php
                foreach($offers as $offer):?>
                    <div class="deals__item">
                        <div class="deals__block">
                            <div class="deals__block-sale">-<?= $offer['discount'] ?>%</div>
                            <div class="deals__block-img">
                                <img src="<?= \yii\helpers\Url::base().$offer['offers_images'][0]->images ?>" alt="">
                                <div class="deals__block-img-more">
                                    <p><?= substr($offer['description'], 0, 68)?></p>
                                    <!--<p>Время продаж ограниченно</p>-->
                                    <a href="<?= Url::to(['/offers/offers/view', 'id' => $offer['id']])?>">Подробнее</a>
                                </div>
                            </div>
                            <div class="deals__block-desc">
                                <p><?= $offer['title']; ?></p>
                                <div class="deals__block-desc-price">
                                    <div class="deals__block-desc-price_old">
                                        <p><?= $offer['old_price'] ?>руб.</p>
                                    </div>
                                    <div class="deals__block-desc-price_new">
                                        <p><?= $offer['new_price'] ?>руб.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>


<?php
// $region = Yii::$app->ipgeobase->getLocation($_SERVER["REMOTE_ADDR"]); 
/*$region = Yii::$app->ipgeobase->getLocation('5.153.133.222'); 
var_dump($region['region']);*/
?>