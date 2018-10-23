<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../config/config.php');
class Database
{
    public $host= DB_HOST;
    public $user= DB_USER;
    public $pass= DB_PASS;
    public $dbname= DB_NAME;

    public $link;
    public $error;

    public function __construct()
    {
        $this->connectdb();
    }

    public function connectdb(){
        $this->link =    new mysqli($this->host,$this->user,$this->pass,$this->dbname);
        if(!$this->link){
            $this->error = "Connection Fail".$this->link->error->connect_error;
            return False;
        }
    }

    //select or read data

    public function select($query){
        $result = $this->link->query($query) or die ($this->link->error.__LINE__);
        if($result->num_rows > 0){
            return $result;
        }
        else{
            return False;
        }
    }

    //insert Data

    public function insert($query){
        $insert = $this->link->query($query) or die ($this->link->error.__LINE__);
        if($insert){
            return $insert;
        }
        else{
            return false;
        }
    }

    //update Or Edit Data

    public function update($query){
        $update = $this->link->query($query) or die ($this->link->error.__LINE__);
        if($update){
            return  $update;
        }
        else{
            return false;
        }
    }

    //delete Data

    public function delete($query){
        $delete = $this->link->query($query) or die ($this->link->error.__LINE__);
        if($delete){
            return  $delete;
        }
        else{
            return false;
        }
    }
}
