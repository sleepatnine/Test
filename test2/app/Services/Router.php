<?php

namespace App\Services;

class Router
{
    //данные о страницах
    private static $list = [];

    // заполнение списка ссылками которые присутствуют на сайте
    public static  function page($uri, $page_name){
        self::$list[] = [
            "uri" => $uri,
            "page" => $page_name
        ];
    }

    // метод для выполнения пост запроса
    public static function post($uri, $class, $method, $formdata =false){
        self::$list[] = [
            "uri" => $uri,
            "class" => $class,
            "method" => $method,
            "post" => true,
            "formdata" => $formdata
        ];
    }

    public static function enable(){
        $query = $_GET['route'];

        foreach (self::$list as $route){
            if($route["uri"] === '/' . $query){
                if($route["post"]===true && $_SERVER["REQUEST_METHOD"] === "POST"){
                   $action = new $route["class"];
                   $method = $route["method"];
                  if ($route["formdata"]){
                       $action->$method($_POST);
                   }else {
                       $action->$method();
                   }
                   die();
                }else {
                    // если uri зарегестрированный в списке совпадает с тем что есть
                        require_once "pages/" . $route['page'] . ".php";
                        die();
                    }
                }
            }

        self::not_found();
    }

    public static function redirect($page){
        require_once "pages/" . $page . ".php";
        die();
    }

    // метод отображения несуществующей ссылки
    private static function not_found(){
        require_once "pages/404.php";
    }
}



