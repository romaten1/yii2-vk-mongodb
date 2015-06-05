<?php

namespace app\modules\vk\models;

class SearchUserForm extends \yii\base\Model
{
    public $area;

    public function rules()
    {
        return [
            [['area'], 'required'],// тут определяются правила валидации
            [['area'], 'string'],// тут определяются правила валидации
        ];
    }
}