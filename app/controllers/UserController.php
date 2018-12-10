<?php

namespace app\controllers;

use app\models\User;

class UserController extends BaseController
{
    private $user;
    private $userPassword;

    public function __construct() {
        $requestData = $this->getRequestData();
        if (is_null($requestData) || !is_array($requestData)) {
            return;
        }
        $this->user = new User($requestData);
        $this->userPassword = $requestData['repeatingPassword'] ?? '';
    }

    public function actionRegistration() {
        echo $this->user->registration($this->userPassword);
    }

    public function actionAuthorization() {
        echo $this->user->authentication();
    }

    public function actionExit() {
        session_destroy();
    }
}