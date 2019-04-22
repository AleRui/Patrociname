<?php

require_once 'core/BaseController.php';
require_once 'core/Session.php';
require_once 'Model/User.php';
require_once './Model/UserModel.php';


class userController extends BaseController
{
    private $table = 'user';

    public function __construct()
    {
        parent::__construct();
    }

    //METODOS
    public function login()
    {
        echo 'UserController -> login<br>';
        //
        //$_POST['usr'] = 'prueba';
        //$_POST['psw'] = '123';
        //
        if ($_POST && $this->checkValidPost($_POST)['valid']) {
            //
            $userModel = new UserModel($this->table);
            $user = $userModel->checkExitUser($_POST['usr'], $_POST['psw']);
            //
            if ( $user && is_array($user)) {
                echo 'Tengo un usuario.<br>';
                showPretty($user);
                echo 'Hay que crear una Token';
            } else {
                echo 'El array viene vacion';
            }
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