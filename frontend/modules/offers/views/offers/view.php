<?php

use common\classes\Custom_function;
use common\classes\Debug;
use himiklab\ipgeobase\IpGeoBase;
$this->registerJsFile('/js/jquery.sliderkit.1.4.js',['yii\web\JqueryAsset']);
$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Спецпредложения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$checking = $news->img_url;


?>
<!--    <section class="main-container">-->
<!--        <div class="offers_page_view">-->
<!--            <div class="news__date-add"><b>Дата добавления: </b>--><? //= date('d.m.Y G:i', $model->dt_add) ?><!--</div>-->
<!--            <h1>--><? //= $model->title ?><!--</h1>-->
<!---->
<!--            <div class="offers__news-list">-->
<!--                <div class="offers__descr"><b>Описание: </b>--><? //= $model->description ?><!--</div>-->
<!--                --><?php
//                //$news->img_url;
//                if ($model->img_url != ''):
?>
<!--                    <img class="offers__image" src="--><? //= $model->img_url ?><!--" alt="">-->
<!--                --><?php //endif; ?>
<!---->
<!--            </div>-->
<!---->
<!--        </div>-->
<!--    </section>-->
<?php /*
$IpGeoBase = new IpGeoBase();
$IpGeoBase->updateDB()
*/
?>








<!--AKD47 section-->

<!-- Launch Slider Kit -->
<script type="text/javascript">
    jQuery(window).load(function(){

        // Photo gallery > Vertical
        jQuery(".photosgallery-vertical").sliderkit({
            circular:true,
            mousewheel:true,
            shownavitems:4,
            verticalnav:true,
            navclipcenter:true,
            auto:false
        });



    });
</script>
<?php //Debug::prn($info);?>
<section class="offers_container">
<h3 class="offers_header"><?= $model->title; ?></h3>
    <div class="offers_page_view">


            <div id="page" class="inner layout-1col">
            <!-- Start photosgallery-vertical -->
            <div class="sliderkit photosgallery-vertical">
                <div class="sliderkit-nav">
                    <div class="sliderkit-nav-clip">
                        <ul>
                            <?php foreach($model['offers_images'] as $img):?>
                                <li><a href="#"><img src="/<?= $img->images; ?>" /></a></li>
                            <?php endforeach; ?>
                            <!--<li><a href="#" rel="nofollow" title="[link title]"><img src="../../media/img/request1.png" alt="[Alternative text]" /></a></li>
                            <li><a href="#" rel="nofollow" title="[link title]"><img src="../../media/img/request2.png" alt="[Alternative text]" /></a></li>
                            <li><a href="#" rel="nofollow" title="[link title]"><img src="../../media/img/request1.png" alt="[Alternative text]" /></a></li>
                            <li><a href="#" rel="nofollow" title="[link title]"><img src="../../media/img/request2.png" alt="[Alternative text]" /></a></li>
                            <li><a href="#" rel="nofollow" title="[link title]"><img src="../../media/img/request1.png" alt="[Alternative text]" /></a></li>
                            <li><a href="#" rel="nofollow" title="[link title]"><img src="../../media/img/request2.png" alt="[Alternative text]" /></a></li>
                            <li><a href="#" rel="nofollow" title="[link title]"><img src="../../media/img/request1.png" alt="[Alternative text]" /></a></li>-->
                        </ul>
                    </div>
                    <div class="sliderkit-btn sliderkit-nav-btn sliderkit-nav-prev"><a rel="nofollow" href="#" title="Previous line"><span>Previous</span></a></div>
                    <div class="sliderkit-btn sliderkit-nav-btn sliderkit-nav-next"><a rel="nofollow" href="#" title="Next line"><span>Next</span></a></div>
                </div>
                <div class="sliderkit-panels">
                    <?php foreach($model['offers_images'] as $img):?>
                        <div class="sliderkit-panel">
                            <img src="/<?= $img->images; ?>" alt="[Alternative text]" />

                        </div>
                    <?php endforeach; ?>
                    <!--<div class="sliderkit-panel">
                        <img src="../../media/img/request1.png" alt="[Alternative text]" />

                    </div>
                    <div class="sliderkit-panel">
                        <img src="../../media/img/request2.png" alt="[Alternative text]" />

                    </div>
                    <div class="sliderkit-panel">
                        <img src="../../media/img/request1.png" alt="[Alternative text]" />

                    </div>
                    <div class="sliderkit-panel">
                        <img src="../../media/img/request2.png" alt="[Alternative text]" />

                    </div>
                    <div class="sliderkit-panel">
                        <img src="../../media/img/request1.png" alt="[Alternative text]" />

                    </div>
                    <div class="sliderkit-panel">
                        <img src="../../media/img/request2.png" alt="[Alternative text]" />

                    </div>
                    <div class="sliderkit-panel">
                        <img src="../../media/img/request1.png alt="[Alternative text]" />

                    </div>-->
                </div>
            </div>
            <!-- // end of photosgallery-vertical -->



        <div class="offers_nav">
            <ul class="nav_sm nav nav-tabs">
                <li><a href="#conditions" role="tab" data-toggle="tab">Условия</a></li>
                <li><a href="#description" role="tab" data-toggle="tab">Описание</a></li>
                <li><a href="#reviews" role="tab" data-toggle="tab">Отзывы (125)</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="conditions">
                <div class="offers_condition_view">
                    <div class="row">

                        <p class="offers_content"><?= $model->circs; ?></p>

                    </div>


                    <span class="question"><a class="ask" href="#">Задать вопрос</a></span>


                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="description">
                <div class="offers_condition_view">
                    <div class="row">

                        <p class="offers_content"><?= $model->description; ?></p>

                    </div>

                </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="reviews">

                <div class="offers_condition_view">
                    <div class="row">

                        <p class="offers_content"><span>Задайте вопрос или оставьте комментарий</span><br/>
                            <span>Чтобы оставлять комментарии, Вам нужно подтвердить e-mail.<br/>
                            Письмо с ссылкой подтверждения должно прийти сразу после регистрации <a href="#">на
                                    указанный Вами e-mail.</a></span></p>


                        <div class="home-comments__body">

                            <div class="home-comments__item__head">
                                <div class="home-comments__item__head--img">
                                    <img src="../../media/img/recall_av.png" alt=""/>
                                </div>
                                <p>Марина К.</p>

                            </div>

                            <div class="home-comments__item__body">

                                <div class="home-comments__item--date">
                                    <p>
                                        25.01.2016 20:55
                                    </p>

                                    <img src="../../media/img/reiting.png" alt=""/>
                                </div>



                                <div class="home-comments__item--desc">
                                    <p>
                                        Отлична химчистка салона
                                    </p>
                                </div>

                            </div>
                        </div>

                        <div class="home-comments__body">

                            <div class="home-comments__item__head">
                                <div class="home-comments__item__head--img">
                                    <img src="../../media/img/recall_av.png" alt=""/>
                                </div>
                                <p>Марина К.</p>

                            </div>

                            <div class="home-comments__item__body">

                                <div class="home-comments__item--date">
                                    <p>
                                        25.01.2016 20:55
                                    </p>

                                    <img src="../../media/img/reiting.png" alt=""/>
                                </div>



                                <div class="home-comments__item--desc">
                                    <p>
                                        Отлична химчистка салона
                                    </p>
                                </div>

                            </div>
                        </div>

                        <div class="home-comments__body">

                            <div class="home-comments__item__head">
                                <div class="home-comments__item__head--img">
                                    <img src="../../media/img/recall_av.png" alt=""/>
                                </div>
                                <p>Марина К.</p>

                            </div>

                            <div class="home-comments__item__body">

                                <div class="home-comments__item--date">
                                    <p>
                                        25.01.2016 20:55
                                    </p>

                                    <img src="../../media/img/reiting.png" alt=""/>
                                </div>
                                <div class="home-comments__item--desc">
                                    <p>
                                        Отлична химчистка салона
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div></div>


    <div class="sidebar_right">

        <div class="offers_price">
            <p><?= $model->old_price; ?> руб</p>
        </div>

        <div class="offers_discount">

            <div class="offers_discount__interest">
                 <p>Скидка</p>
                <p><?= $model->discount; ?>%</p>
            </div>

            <div class="offers_discount__price">
                <p><?= $model->new_price?> руб</p>
            </div>

        </div>

        <div class="offers_agreement">
            <div class="offers_agreement--count">
            <p class="decisonY"><?= $decisonY; ?></p>
            </div>
            <div class="offers_agreement--text">
            <p><a class="offers_attend" decison="1" offersId="<?= $_GET['id']; ?>" href="#">Я приеду</a></p>
            </div>
        </div>

        <div class="offers_agreement--future">
            <div class="offers_agreement--count">
                <p class="decisonN"><?= $decisonN; ?></p>
            </div>
            <div class="offers_agreement--text">
                <p><a class="offers_attend" decison="0" offersId="<?= $_GET['id']; ?>" href="#">Возможно приеду</a></p>
            </div>
        </div>
       <!-- <a href="http://vkontakte.ru/" onclick="window.open('http://vkontakte.ru/share.php?url='+encodeURIComponent(location.href));return false;" rel="nofollow" style="text-decoration:none;" title="Поделиться ВКонтакте"> <img class="vk" onmouseout="this.src='images/socseti/vk.png ';" onmouseover="this.src='images/socseti/vk_1.png ';" src="images/socseti/vk.png" style="width: 16px; height: 16px; float: center;margin-right: 10px;" /></a>
       <a href="http://www.facebook.com/" onclick="window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(location.href));return false;" rel="nofollow" style="text-decoration:none;" title="Поделиться в Facebook"><img class="fc" onmouseout="this.src='images/socseti/fc.png';" onmouseover="this.src='images/socseti/fc_1.png';" src="images/socseti/fc.png" style="width: 16px; height: 16px; float: center;margin-right: 10px; " /> </a> <a href="http://twitter.com/" onclick="window.open('http://twitter.com/home?status=RT @www.webnotes.com.ua '+encodeURIComponent(document.title)+': '+encodeURIComponent(location.href));return false;" rel="nofollow" style="text-decoration:none;" title="Опубликовать в Twitter"><img class="tv" onmouseout="this.src='images/socseti/tv.png';" onmouseover="this.src='images/socseti/tv_1.png';" src="images/socseti/tv.png" style="width: 16px; height: 16px; float: center;margin-right:10px;" /></a> <a href="http://www.google.com/" onclick="window.open('http://www.google.com/bookmarks/mark?op=add&amp;amp;hl=ru&amp;bkmk='+encodeURIComponent(location.href)+'&amp;annotation='+encodeURIComponent(document.title)+'&amp;labels=webnotes&amp;title='+encodeURIComponent(document.title));return false;" rel="nofollow" style="text-decoration:none;" title="Добавить закладку в Google"><img class="gg" onmouseout="this.src='/images/socseti/gg.png';" onmouseover="this.src='images/socseti/gg_1.png';" src="images/socseti/gg.png" style="width: 16px; height: 16px; float: center;margin-right: 10px;" /></a>-->
        <div class="footer__social">
            <a href="#" class="footer__social--link" onclick="window.open('http://vkontakte.ru/share.php?url='+encodeURIComponent(location.href));return false;" rel="nofollow" style="text-decoration:none;" title="Поделиться ВКонтакте">
                <span>В</span>
                <i class="fa fa-heart"></i>

            </a>
            <?php
            $vk_request = file_get_contents('http://vkontakte.ru/share.php?act=count&index=1&url=http://'.$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI]);
            $tmp = array();
            preg_match('/^VK.Share.count\(1, (\d+)\);$/i',$vk_request,$tmp);
            ?>
            <span class="footer__social--link--counter">+<?= $tmp[1];?></span>


            <?php


                $fburl = "http://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];
                $facebook_request = file_get_contents("http://graph.facebook.com/?ids=".$fburl);
                $fb = json_decode($facebook_request);

            ?>
            <a href="#" class="footer__social--link--fb" onclick="window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(location.href));return false;" rel="nofollow" style="text-decoration:none;" title="Поделиться в Facebook">
               <span class="fbook">f</span>
                <p>Нравится</p>
            </a>

            <span class="footer__social--link--counter"><?= $fb->{$fburl}->shares;?></span>

        </div>

        <div class="offers_address">
            <?php foreach($info as $inf):?>
                <h3><?= $inf[0]->name; ?></h3>
                <i class="fa fa-compass"></i>
                <a class="offers_website" target="_blank" href="<?= $inf[0]->website; ?>">Посмотрите сайт</a>
                <div class="map-wrap">
                    <div id="map_canvas"></div>
                </div>

                <?php foreach($inf[0]['address'] as $seradr):?>
                    <?php
                    //Debug::prn($servicesInfo);
                    if(in_array($seradr->id,$servicesInfo[$seradr['service_id']])): ?>
                        <div class="offers_address--icons">
                            <img class="metro" src="../../media/img/metro.png">
                        </div>

                        <div class="offers_address--text">
                            <p> <?= $seradr->address; ?><br/>
                                <a href="#">Посмотреть
                                    на карте</a></p>
                        </div>
                    <?php endif; ?>
                <?php endforeach;?>

                <?php foreach($inf[0]['phone'] as $ph):?>
                    <div class="offers_address--icons">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="offers_address--text">
                        <p>Телефон:<br/>
                            <?= $ph->number; ?></p>
                    </div>
                <?php endforeach; ?>



                <?php
                $custFunc = new Custom_function();
                foreach($inf[0]['work_hours'] as $wh): ?>
                    <div class="offers_address--icons">
                        <i class="fa fa-clock-o"></i>
                    </div>
                    <div class="offers_address--text">
                        <span><?=$custFunc->get_week_day($wh->day)?></span> - <?php
                        if($wh->{'24h'} == 1){ ?>
                            Круглосуточно
                            <?php
                        }
                        else{
                            ?>
                            С <?=$wh->hours_from?> ДО <?=$wh->hours_to?>
                            <?php
                        }?>
                    </div>
                <?php endforeach; ?>
            <?php endforeach;?>
        </div>

        <span class="question" style="margin-left: 75px;"><a class="ask" href="#">Все адреса</a></span>

    </div>

</section>




