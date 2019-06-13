<?php

/**
 *
 * @author: Ale Ruiz
 * @Description Proyecto Fin de Grado DAW 2017-2019
 *
 */

require_once 'core/BaseController.php';
require_once 'core/UserSession.php';
require_once 'Model/User.php';
require_once './Model/UserModel.php';


class userController extends BaseController
{
    private $table = 'user';

    public function __construct()
    {
        parent::__construct();
    }


    public function login()
    {

        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Methods: POST, GET, DELETE, PATCH, PUT, OPTIONS");
        header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, X-Auth-Token");

        $post_from_angular = file_get_contents('php://input');

        $data = json_decode($post_from_angular, true);

        if ($data && $this->checkValidData($data)['valid']) {

            $userModel = new UserModel($this->table);
            $user = $userModel->checkExitUser($data['usr'], $data['psw']);

            if ( $user && is_array($user)) {

                $response = (object)$user;

            } else {

                $response = (object)array('msg' => 'Not exist user.<br>');

            }

        } else {

            $response = (object)array('msg' => 'Not exist data');

        }

        echo json_encode($response);
    }

    public function checkValidData($data)
    {
        $valid = true;
        $msg = '';

        if (!$data['usr']) {
            $msg .= 'No existe usurio.<br>';
            $valid = false;
        }

        if (!$data['psw']) {
            $msg .= 'No existe pass.<br>';
            $valid = false;
        }

        return array(
            'valid' => $valid,
            'msg' => $msg
        );
    }

}