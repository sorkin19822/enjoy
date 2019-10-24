<?php


namespace app\models;


use yii\base\Model;

class AddUserTwitter extends Model
{
    public $user;

    public function rules()
    {
        return [
            [['user'], 'required'],
        ];
    }
}