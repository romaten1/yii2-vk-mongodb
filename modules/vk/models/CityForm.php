<?php

namespace app\modules\vk\models;

class CityForm extends \yii\base\Model
{
    public $region;

    public function rules()
    {
        return [
            [['region'], 'required'],// тут определяются правила валидации
            [['region'], 'integer'],// тут определяются правила валидации
        ];
    }
}