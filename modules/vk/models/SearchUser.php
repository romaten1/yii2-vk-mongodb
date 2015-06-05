<?php

namespace app\modules\vk\models;

use yii\mongodb\ActiveRecord;

class SearchUser extends ActiveRecord
{
    /**
     * @return string the name of the index associated with this ActiveRecord class.
     */
    public static function collectionName()
    {
        return 'search_user';
    }

    /**
     * @return array list of attribute names.
     */
    public function attributes()
    {
        return ['_id', 'id', 'first_name', 'last_name', 'screen_name', 'photo'];
    }
}