<?php
/**
 * Created by PhpStorm.
 * User: schok
 * Date: 01.11.2020
 * Time: 1:35
 */

namespace App\service\Validators;


class Validator
{
    public $errors;

    public function protectData($data, $fields)
    {
        $result = [];

        foreach ($data as $key => $value) {
            if(in_array($key, $fields)){
                $result[$key] = trim(htmlspecialchars($value));
            }
        }

        return $result;
    }

    public function required($fields)
    {
        foreach ($fields as $key => $field) {
            if(empty($field)) {
                $this->errors[] = 'Поле "' . $key . '" обязательно к заполнению';
            }
        }
    }

    public function email($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($email)) {
             $this->errors[] = 'Не валидный email';
        }
    }

    public function length($field, $value, $min, $max)
    {
        if(mb_strlen($value) < $min) {
            $this->errors[] = 'Поле "' . $field . '" слишком короткое';
        }

        if(mb_strlen($value) > $max) {
            $this->errors[] = 'Поле "' . $field . '" слишком длинное';
        }
    }
}