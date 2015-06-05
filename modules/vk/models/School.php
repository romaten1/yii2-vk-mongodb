<?php

namespace app\modules\vk\models;

use yii\mongodb\ActiveRecord;

class School extends ActiveRecord
{
    /**
     * @return string the name of the index associated with this ActiveRecord class.
     */
    public static function collectionName()
    {
        return 'school';
    }

    /**
     * @return array list of attribute names.
     */
    public function attributes()
    {
        return ['_id', 'id', 'title', 'city'];
    }
}