<?php


namespace app\models;


use yii\base\Model;

class ClearInputData extends Model
{
    public $id;
    public $userName;
    public $secret;

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @param mixed $secret
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
    }


    public function isValidate(){

        if($this->id == '' || $this->userName == '' || $this->secret == '') {
            $err[]='missing parameter';
        }
        if (strlen($this->id) != 32) {
            $err[]='missing parameter id';
        }
        if ($this->secret !== sha1($this->id . $this->userName)) {
            $err[] = 'access denied';
        }


        return $err;

    }

}