<?php

class Session{

    public static function init(){
        if(!isset($_SESSION)) session_start();
    }
    public static function set($key,$val){
        self::init();
        $_SESSION[$key]=$val;


    }
    public static function get($key)
    {

        if (isset($_SESSION[$key])) {

            return $_SESSION[$key];
        } else {
            return false;
        }
    }
    public static function cheaksession(){
        self::init();

        if( self::get("login")==false && self::get("dlogin")==false){
            session_destroy();
            header("Location:login.php");
        }

    }

    public static function destroy(){
        session_destroy();
        header("Location:login.php");
    }
}