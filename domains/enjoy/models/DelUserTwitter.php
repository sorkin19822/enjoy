<?php


namespace app\models;


use yii\base\Model;

class DelUserTwitter extends Model
{
    public $user;

    public function rules()
    {
        return [
            [['user'], 'required'],
        ];
    }
}