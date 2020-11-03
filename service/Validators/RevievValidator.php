<?php
/**
 * Created by PhpStorm.
 * User: schok
 * Date: 01.11.2020
 * Time: 1:11
 */

namespace App\service\Validators;


class RevievValidator extends Validator
{
    public $data;
    public $fields = ['email', 'name', 'text'];

  public function __construct($data)
  {
     $this->data = $this->protectData($data, $this->fields);
  }

  public function validate()
  {
      $this->email($this->data['email']);

      $this->required([
          'E-mail' => $this->data['email'],
          'Имя' => $this->data['name'],
          'Текст сообщения' => $this->data['text']
      ]);

      $this->length('E-mail', $this->data['email'], 1, 100);
      $this->length('Имя', $this->data['name'], 1, 100);
      $this->length('Текст сообщения', $this->data['text'], 1, 100);

      if($this->errors) {
          return ['errors' => $this->errors];
      }

      return $this->data;
  }
}