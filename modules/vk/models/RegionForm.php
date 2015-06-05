<?php

namespace app\modules\vk\models;

class RegionForm extends \yii\base\Model
{
    public $country;

    public function rules()
    {
        return [
            [['country'], 'required'],// тут определяются правила валидации
            [['country'], 'integer'],// тут определяются правила валидации
        ];
    }
}