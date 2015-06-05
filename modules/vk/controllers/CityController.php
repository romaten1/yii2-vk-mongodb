<?php

namespace app\modules\vk\controllers;

use app\helpers\VkCityHelper;
use app\helpers\VkRegionHelper;
use app\modules\vk\models\CityForm;
use app\modules\vk\models\RegionForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\mongodb\Query;

class CityController extends \yii\web\Controller
{
    public $defaultAction = 'search';

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionSearch()
    {
        $query = new Query;
        $query->from('city');
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ]
        ]);
        $regions = new Query;
        $regions = $regions->from('region')->all();
        $regions_array = [];
        foreach($regions as $item){
            $regions_array[$item['region_id']] = $item['title'];
        }
        //ddd($regions_array);
        $forma = new CityForm();
        if ($forma->load(Yii::$app->request->post()) && $forma->validate()) {
            if($forma->region){

                $cities    = VkCityHelper::getCities( $forma->region);
                ///ddd($regions);
                $collection = Yii::$app->mongodb->getCollection('city');
                $collection->batchInsert($cities['response']);
            }
            return $this->render('search', [
                'forma' => $forma,
                'regions' => $regions_array,
                'provider' => $provider,
            ]);
        } else {
            return $this->render('search', [
                'forma' => $forma,
                'regions' => $regions_array,
                'provider' => $provider,
            ]);
        }
    }

}
