<?php
namespace app\helpers;

use Yii;
use yii\mongodb\Query;

/**
 * Данный класс позволяет взаимодействоватть  и обрабатывать полученные данные из ВКонтакте для категории Регион.
 */
class VkCityHelper
{
    /**
     * Отримання інформації про регіони що відносяться до певної країни  у вигляді відповідним чином відфільтрованого массиву
     *
     * @param $region_id
     *
     * @internal param $country - country_id
     *
     * @internal param $args
     *
     * @return array
     */
    public static function getCities( $region_id )
    {
        $region = new Query;
        $region = $region->from('region')->where(['region_id' => $region_id])->one();
        $args    = [
            'country_id' => $region['country'],
            'region_id' => $region_id,
            'count'      => '1000',
        ];
        $data              = new Vk( 'database.getCities', $args );
        $data              = $data->fetchData();
        return $data;
    }
}