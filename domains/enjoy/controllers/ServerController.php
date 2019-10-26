<?php

namespace app\controllers;
use app\models\AddUserTwitter;
use app\models\DelUserTwitter;
use Yii;
class ServerController extends \yii\web\Controller
{
    /**
     * @param string $userName
     * @param string $id
     * @return string
     */
    public function actionGetsecretkey($userName='', $id='')
    {
        if(!empty($userName)&&!empty($id)){
            $sha = sha1($id . $userName);
            Yii::$app->response->statusCode = 200;
            Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
            $response = ['status' => 'success', 'data' => ['sha'=>$sha]];
            die(json_encode($response));
        }
        $response = ['status' => 'error', 'messages' => 'not generate secret code'];
        Yii::$app->response->statusCode = 200;
        Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
        die(json_encode($response));


    }

}
