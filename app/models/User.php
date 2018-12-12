<?php

namespace app\models;

class User extends BaseModel
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $is_admin;

    public function __construct($params) {
        parent::__construct();
        if (!count($params)) {
            return;
        }
        $id = $params['id'] ?? null;
        if ($id = (int) $id) {
            $this->id = $id;
        }
        $this->name = $params['name'] ?? null;
        $this->email = $params['email'] ?? null;
        $this->password = $params['password'] ?? null;
        $this->is_admin = $params['is_admin'] ?? null;
    }

    public static function getTableName(): string {
        return 'user';
    }

    public function registration(string $repeatingPassword) {
        $params = [];
        $requiredParams = $this->getRequiredParamsForCreate();
        foreach ($this as $key => $value) {
            if (in_array($key, $requiredParams) && !$value) {
                return 'Missing ' . $key;
            }
            switch ($key) {
                case 'password':
                    if ($this->password !== $repeatingPassword) {
                        return 'Ващі паролі мають різне значення, друже. Зпробуй ще трішки. У тебе все вийде!';
                    }
                    $params[$key] = password_hash($value, PASSWORD_DEFAULT);
                    break;
                case 'email':
                    if (count($this->getByEmail($value))) {
                        return 'Цей email вже зареєстрований';
                    }
                    $params[$key] = $value;
                    break;
                case 'name':
                    $params[$key] = $value;
            }
        }
        $this->create($params);
        return '';
    }

    public function authentication() {
        $user = $this->getByEmail($this->email);
        if (!count($user)) {
            return 'Користувач не знайден';
        }
        if (!password_verify ( $this->password ?? '', $user['password'])) {
            return 'Невірний пароль';
        }
        $_SESSION = $user;
        return '';
    }

    private function getByEmail(string $email) {
        $user = $this->select('SELECT * FROM user WHERE email = "' . $email . '"');
        return $user[0] ?? [];
    }

    private function getRequiredParamsForCreate()
    {
        return [
            'name',
            'email',
            'password',
        ];
    }
}