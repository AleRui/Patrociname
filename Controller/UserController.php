<?php

require_once 'core/BaseController.php';
require_once 'core/Session.php';
require_once 'Model/Searcher.php';
//require_once './Model/SearcherModel.php';
require_once './Model/UserModel.php';


class userController
{
    public function login()
    {
        echo 'UserController -> login<br>';
        //
        $_POST['usr'] = 'prueba';
        $_POST['psw'] = '123';
        //
        if ($_POST && $this->checkValidPost($_POST)['valid']) {
            showPretty($_POST);
            $userModel = new UserModel();
            $existUser = $userModel->checkExitUser($_POST['usr'], $_POST['psw']);
            //echo gettype($existUser);
        } else {
            echo $this->checkValidPost($_POST)['msg'];
        }
    }

    public function checkValidPost($postEntry)
    {
        $valid = true;
        $msg = '';
        if (!$postEntry['usr']) {
            $msg .= 'No existe usurio.<br>';
            $valid = false;
        }
        if (!$postEntry['psw']) {
            $msg .= 'No existe pass.<br>';
            $valid = false;
        }
        return array(
            'valid' => $valid,
            'msg' => $msg
        );
    }
}