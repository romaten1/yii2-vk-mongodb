<?php

namespace app\modules\vk\controllers;

use app\helpers\VkCityHelper;
use app\helpers\VkRegionHelper;
use app\helpers\VkSchoolHelper;
use app\modules\vk\models\CityForm;
use app\modules\vk\models\RegionForm;
use app\modules\vk\models\SchoolForm;
use Yii;
use yii\data\ActiveDataProvider;
use yii\mongodb\Query;

class SchoolController extends \yii\web\Controller
{
    public $defaultAction = 'search';

    public function actionDelete()
    {
        return $this->render('delete');
    }

    public function actionSearch()
    {
        $query = new Query;
        $query->from('school');
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ]
        ]);
        $areas = new Query;
        $areas = $areas->from('city')->all();
        $areas_array = [];
        foreach($areas as $item){
            $areas_array[$item['area']] = $item['area'];
        }
        $areas_array = array_unique($areas_array);
        //ddd($areas_array);
        $forma = new SchoolForm();
        if ($forma->load(Yii::$app->request->post()) && $forma->validate()) {
            if($forma->area){

                $schools    = VkSchoolHelper::getSchools( $forma->area);
                //ddd( $schools);
                $collection = Yii::$app->mongodb->getCollection('school');
                $collection->batchInsert($schools);
            }
            return $this->render('search', [
                'forma' => $forma,
                'areas' => $areas_array,
                'provider' => $provider,
            ]);
        } else {
            return $this->render('search', [
                'forma' => $forma,
                'areas' => $areas_array,
                'provider' => $provider,
            ]);
        }
    }

}
