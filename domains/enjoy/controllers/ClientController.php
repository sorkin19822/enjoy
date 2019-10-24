<?php

namespace app\controllers;
use app\models\AddUserTwitter;
use app\models\DelUserTwitter;

class ClientController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $userAdd = new AddUserTwitter();
        $userDel = new DelUserTwitter();
        return $this->render('index', ['userAdd' => $userAdd, 'userDel'=>$userDel]);
    }

}
