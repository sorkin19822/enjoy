<?php

namespace app\controllers;
use app\models\AddUserTwitter;
use app\models\DelUserTwitter;
use Yii;
use yii\web\HttpException;
use app\models\ClearInputData;
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
        throw new HttpException(404 ,json_encode($response));


    }

    public function actionInsertuser($id='',$userName='',$secret=''){

        $clearData = new ClearInputData();
        $clearData->setId($id);
        $clearData->setUserName($userName);
        $clearData->setSecret($secret);
        $error = $clearData->isValidate();
        if ($error) {
            $response = ['status' => 'error', 'data' =>$error];
            Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
            throw new HttpException(404 ,json_encode($response));
        }

        die();


    }

}
