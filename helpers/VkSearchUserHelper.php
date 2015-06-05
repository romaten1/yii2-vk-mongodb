<?php
namespace app\helpers;

use Yii;
use yii\mongodb\Query;

/**
 * Данный класс позволяет взаимодействоватть  и обрабатывать полученные данные из ВКонтакте для категории Регион.
 */
class VkSearchUserHelper
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
    public static function getSearch( $area )
    {
        $cities = new Query;
        $cities = $cities->from('city')->where(['area' => $area])->all();
        //ddd( $cities);
        $schools_array = [];
        foreach($cities as $city){
            $schools = new Query;
            $temp = $schools->from('school')->where(['city' => $city['cid']])->all();
            $schools_array              = array_merge($temp, $schools_array);
        }
        //ddd($schools_array);
        $users =[];
        foreach($schools_array as $item){
            $args = [
                'school_year' => '2015',
                'access_token' => '6b7e99afa9a44d0871aab62f6187bb954aba13c1210ba4bcf804baf96def53a66e3effabbe1587147d70c',
                'count'  => '1000',
            ];
            $args['school'] = $item['id'];
            $args['city'] = $item['city'];
            $data              = new Vk( 'users.search', $args );
            $data = $data->fetchData();
            $data = $data['response'];
            $data_result = $data;
            foreach($data as $key => $user){
                if(!is_array($user)){
                    unset($data_result[$key]);
                }
            }
            $users              = array_merge($data_result, $users);

        }
        //ddd($users);

        return $users;
    }
}