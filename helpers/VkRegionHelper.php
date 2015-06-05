<?php
namespace app\helpers;

use Yii;

/**
 * Данный класс позволяет взаимодействоватть  и обрабатывать полученные данные из ВКонтакте для категории Регион.
 */
class VkRegionHelper
{
    /**
     * Отримання інформації про регіони що відносяться до певної країни  у вигляді відповідним чином відфільтрованого массиву
     *
     * @param $country - country_id
     *
     * @internal param $args
     *
     * @return array
     */
    public static function getRegions( $country_id )
    {
        $args    = [
            'country_id' => $country_id,
            //'count'      => '',
        ];
        $i       = 0;
        $regions = [ ];
        $data              = new Vk( 'database.getRegions', $args );
        $data              = $data->fetchData();


        return $data;
    }
}