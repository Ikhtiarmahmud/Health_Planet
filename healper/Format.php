<?php

Class Format{
    public function formatdate($date){
       return date("F j, Y, g:ia", strtotime($date));
    }

    public function textshort($text, $limit = 400){
        $text=$text." ";
        $text= substr($text,0,$limit);
        $text= substr($text,0,strrpos($text," "));
        $text=$text."...";
        return $text;
    }
    public function validation($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = htmlentities($data);
        return $data;
    }

    public function title(){
        $path = $_SERVER['SCRIPT_FILENAME'];
        $title=basename($path,'.php');
        if($title=='index'){
            $title = 'home';
        }
        elseif($title=='contact'){
            $title = 'contact';
        }
        return $title = ucwords($title);
    }
}