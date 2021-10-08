<?php

namespace App\Controllers;

use App\Services\Router;

class Auth
{
    public function login($data){
        $login = $data["login"];
        $password = md5($data['password']);

        $list = Database::read();

        foreach ($list as $key) {
            if ($key['login'] == $login && $key['password'] == $password) {
                $_SESSION['name'] = $key['name'];
                Router::redirect('/profile');
            }
        }
    }

    public function register($data){
        $login = $data["login"];
        $password = $data["password"];
        $confirm_password = $data["confirm_password"];
        $email = $data["email"];
        $name = $data["name"];

        $list = Database::read();



        foreach ($list as $key) {
            if ($key['login'] == $login) {
                echo 'такой логин уже зарегестрирован';
            }elseif ($key['email'] == $email){
                echo 'такой mail уже зарегетрирован';
            }else{
                $list = array(
                    'name' => $name,
                    'email' => $email,
                    'login' => $login,
                    'password'=> md5($password)
                );
            }
        }

      /*
      за такой код я бы и сам себе руки отрубил
      делал максимально быстро. извиняюсь
       try{
            if(!valid_email($email)){
                throw new Exception('Недопустимый адрес электронной почты');
            }
            if($password != $confirm_password){
                throw new Exception('Пароли не совпадают');
            }
            //проверка длины пароля
            if((strlen($password) < 6) || (strlen($name) < 2)){
                throw new Exception('Слишком короткий пароль или имя');
            }
        }
        catch (Exception $e){
            do_html_header('Проблема: ');
            echo $e->getMassage();
            do_html_footer();
            exit;
        }*/
        Database::create($list);
        Router::redirect('/login');
    }

    public function logout(){
        unset($_SESSION["name"]);
        Router::redirect('/login');
    }
}