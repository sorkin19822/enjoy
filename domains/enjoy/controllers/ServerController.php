<?php

namespace app\controllers;
use app\models\AddUserTwitter;
use app\models\DelUserTwitter;
use app\models\Twitter;
use app\models\Usertwit;
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

    /**
     * @param string $id
     * @param string $userName
     * @param string $secret
     * @throws HttpException
     */
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
        $rez = Usertwit::find()->where(['name' => $userName])->asArray()->one();
        if(!empty($rez)){
           die();
        };

        $twitter = new Twitter($userName, '1');
        $isUserNotEmpty = $twitter->returnTweet();
        if(empty($isUserNotEmpty)){
            $response = ['status' => 'error', 'data' =>'user not found in Twitter'];
            throw new HttpException(404 ,json_encode($response));
        }
        else{
            $useTwit = new Usertwit();
            $useTwit->name = $userName;
            $useTwit->date_add = date("Y-m-d H:i:s");
            $useTwit->date_last_view = date("Y-m-d H:i:s");
            $useTwit->save();
        };



    }

    public function actionTest(){
        $twitter = new Twitter('Arsenal', '1');
        var_dump($twitter->returnTweet());
        die();
    }

}
