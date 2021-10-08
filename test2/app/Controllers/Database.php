<?php

namespace App\Controllers;

class Database
{
    public static function create($list)
    {
         $file = file_get_contents('data.json');
         $taskList = json_decode($file, TRUE);
         unset($file);
         $taskList[] = $list;
         file_put_contents('data.json', json_encode($taskList));
         unset($taskList);
    }

    public static function read(){
        $file = file_get_contents('data.json');
        $taskList = json_decode($file, TRUE);
        unset($file);
        return $taskList;
    }

/*
    public static function delete($list){
        $file = file_get_contents('php/data.json');
        $taskList=json_decode($file,TRUE);
        foreach ( $taskList  as $key => $value){
            if (in_array( $current, $value)) {
                unset($taskList[$key]);
            }
        }
        file_put_contents('php/data.json',json_encode($taskList));
        unset($taskList);
        file_put_contents('php/data.json',json_encode($taskList));
        unset($taskList);
    }

    public static function update($list){
        $oldname = trim($oldname);
        $newname = trim($name);
        $file = file_get_contents('php/data.json');
        $taskList=json_decode($file,TRUE);
        foreach ( $taskList  as $key => $value){
            if (in_array( $oldname, $value)) {
                $taskList[$key]  = array('name'=>$newname);
            }
        }
        file_put_contents('php/data.json',json_encode($taskList));
        unset($taskList);
    } */
}