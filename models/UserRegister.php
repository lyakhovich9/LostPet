<?php

namespace app\models;

class UserRegister extends User
// проверка на совпадение введеных паролей между собой
    {
        public $password_confirmation = '';

        public function rules()
        {
            return array_merge(
                parent:: rules(),
                [
                    ['password_confirmation', 'compare', 'compareAttribute' => 'password', 'message'=>'Пароли не совпадают']
                ]
                );
        }
    }

