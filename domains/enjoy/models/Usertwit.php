<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usertwit".
 *
 * @property int $id
 * @property string $name
 * @property string $date_add
 * @property string $date_last_view
 */
class Usertwit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usertwit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['date_add', 'date_last_view'], 'safe'],
            [['name'], 'string', 'max' => 60],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'date_add' => 'Date Add',
            'date_last_view' => 'Date Last View',
        ];
    }
}
