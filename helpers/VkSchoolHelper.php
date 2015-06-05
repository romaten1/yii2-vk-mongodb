<?php
namespace app\helpers;

use Yii;
use yii\mongodb\Query;

/**
 * Данный класс позволяет взаимодействоватть  и обрабатывать полученные данные из ВКонтакте для категории Регион.
 */
class VkSchoolHelper
{
    /**
     * Отримання інформації про регіони що відносяться до певної країни  у вигляді відповідним чином відфільтрованого массиву
     *
     * @param $area
     *
     * @internal param $region_id
     *
     * @internal param $country - country_id
     *
     * @internal param $args
     *
     * @return array
     */
    public static function getSchools( $area )
    {
        $cities = new Query;
        $cities = $cities->from('city')->where(['area' => $area])->all();
        //ddd( $cities);
        $schools = [];
        foreach($cities as $item){
            $args    = [
                'city_id' => $item['cid'],
            ];
            $data              = new Vk( 'database.getSchools', $args );
            $data = $data->fetchData();
            $data = $data['response'];
            $data_result = $data;
            foreach($data as $key => $school){
                if(!is_array($school)){
                    unset($data_result[$key]);
                }else{
                    $data_result[$key]['city'] = $item['cid'];
                }
            }
            $schools              = array_merge($data_result, $schools);

        }
        ///ddd($schools);

        return $schools;
    }
}