<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class SearchOrderForm extends Model
{
    public $publicNumber;

    public function rules()
    {
        return [
            [['publicNumber'], 'string'],
        ];
    }
}
