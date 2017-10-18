<?php
namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Country;

class CountryController  extends Controller {

     public function actionIndex () {
          $query = Country::find();
//echo "<pre>";print_r($query);die;
          $pagination = new Pagination([
               'defaultPageSize' => 5,
               'totalCount' => $query->count(),
          ]);

          $countries = $query->orderBy('name')
               ->offset($pagination->offset)
               ->limit($pagination->limit)
               ->all();
          //echo "<pre>";print_r($countries);die;
          return $this->render('index', [
               'countries' => $countries,
               'pagination' => $pagination,
          ]);
     }
     }
