<?php

namespace frontend\modules\news\controllers;


use common\models\db\News;
use common\classes\Debug;
use common\models\search\newsSearch;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\widgets\LinkPager;
use yii\filters\VerbFilter;



class NewsController extends \yii\web\Controller
{
	public $layout = 'page';

    public function actionIndex()
    {
    	$news = \common\models\db\News::find()->all();

        return $this->render("index", ['news' => $news]);
    }
    public function actionPage()
	{
		$this->view->params['officeHide'] = true;
		$this->view->params['bannersHide'] = true;
	    $query = \common\models\db\News::find();
	    $countQuery = clone $query;
	    $pages = new Pagination(['totalCount' => $countQuery->count()]);
	    $pages->pageSize = 8;
	    $models = $query->offset($pages->offset)
	        ->limit($pages->limit)
	        
	        ->all();			
	    return $this->render('page', [
	         'models' => $models,
	         'pages' => $pages,
	    ]);
	}

}
