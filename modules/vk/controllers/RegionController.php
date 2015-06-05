<?php

namespace app\modules\vk\controllers;

use app\helpers\VkRegionHelper;
use app\modules\vk\models\RegionForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\mongodb\Query;

class RegionController extends \yii\web\Controller
{
    public $defaultAction = 'search';

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionResult()
    {
        return $this->render('result');
    }

    public function actionSearch()
    {
        $query = new Query;
        $query->from('region');
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ]
        ]);
        //$models = $provider->getModels();
        $country = new RegionForm();
        if ($country->load(Yii::$app->request->post()) && $country->validate()) {
            if($country->country){

                $regions    = VkRegionHelper::getRegions( $country->country);
                $regions = $regions['response'];
                foreach($regions as $key => $item){
                    $regions[$key]['country'] = $country->country;
                }
                ///ddd($regions);
                $collection = Yii::$app->mongodb->getCollection('region');
                $collection->batchInsert($regions);
            }
            return $this->render('search', [
                'country' => $country,
                'regions' => $regions,
                'provider' => $provider,
            ]);
        } else {
            return $this->render('search', [
                'country' => $country,
                'provider' => $provider,
            ]);
        }
    }

    public function actionUpdate()
    {
        return $this->render('update');
    }

    public function actionView()
    {
        return $this->render('view');
    }

}
