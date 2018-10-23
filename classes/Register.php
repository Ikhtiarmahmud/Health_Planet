<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../healper/Format.php');
class Register
{
    private $db;
    private $fm;

    public  function __construct()    {
        $this->db = new Database();
        $this->fm = new Format();

    }
    public function userregister($data,$file){
        $firstname = $this->fm->validation($data['firstname']);
        $lastname       = $this->fm->validation($data['lastname']);
        $email     = $this->fm->validation($data['email']);
        $number     = $this->fm->validation($data['number']);
        $address        = $this->fm->validation($data['address']);
        $bdate       = $this->fm->validation($data['bdate']);
        $blood     = $this->fm->validation($data['blood']);
        $lastblooddate     = $this->fm->validation($data['lastblooddate']);
        $school     = $this->fm->validation($data['school']);
        $versity     = $this->fm->validation($data['versity']);
        $about     = $this->fm->validation($data['about']);
        $password     = $this->fm->validation(md5($data['password']));

        $firstname = mysqli_real_escape_string($this->db->link,$data['firstname']);
        $lastname       = mysqli_real_escape_string($this->db->link,$data['lastname']);
        $email     = mysqli_real_escape_string($this->db->link,$data['email']);
        $number     = mysqli_real_escape_string($this->db->link,$data['number']);
        $address        = mysqli_real_escape_string($this->db->link,$data['address']);
        $bdate        = mysqli_real_escape_string($this->db->link,$data['bdate']);
        $blood       = mysqli_real_escape_string($this->db->link,$data['blood']);
        $lastblooddate      = mysqli_real_escape_string($this->db->link,$data['lastblooddate']);
        $school     = mysqli_real_escape_string($this->db->link,$data['school']);
        $versity     = mysqli_real_escape_string($this->db->link,$data['versity']);
        $about     = mysqli_real_escape_string($this->db->link,$data['about']);
        $password     = mysqli_real_escape_string($this->db->link,md5($data['password']));


        $permitted = array('jpg','jpeg','png','gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div = explode('.',$file_name);
        $file_ext =strtolower(end($div));
        $unique_image= substr(md5(time()),0,10).'.'.$file_ext;
        $upload_image = "image/".$unique_image;
        
        if(empty($firstname) || empty($lastname) || empty($email) || empty($number) || empty($address) || empty($bdate) || empty($school) || empty($about) || empty($upload_image) || empty($password)){
            $msg =  "<span class='error'>Field Must not be empty!</span>";
            return $msg;
        }
        $mailquery = "SELECT * FROM tbl_userlogin WHERE email='$email' LIMIT 1";
        $mailcheak = $this->db->select($mailquery);
        if($mailcheak != false){
            $msg =  "<span class='error'>Email Already Exist!</span>";
            return $msg;
        }
        elseif ($file_size > 5048567){
            $msg =  "<span class='error'>Image Size Should be less then 5mb!</span>";
            return $msg;
        }
        elseif (in_array($file_ext,$permitted) === false){
            $msg =  "<span class='error'>You can only upload " .implode(',',$permitted)."</span>";
            return $msg;
        }
        else{
            move_uploaded_file($file_temp,$upload_image);

            $query = "INSERT INTO tbl_userlogin(firstname,lastname,email,number,address,bdate,blood,lastblooddate,school,versity,about,image,password)
                      VALUES ('$firstname','$lastname','$email','$number','$address','$bdate','$blood','$lastblooddate','$school','$versity','$about','$upload_image','$password')";
            $userrdata = $this->db->insert($query);
            if($userrdata = true) {
                $msg = "<span class='success'>Registration Complete Successfuly!</span>";
                return $msg;
            }
            else{
                $msg = "<span class='error'>Please Try again!!</span>";
                return $msg;
            }

        }
    }

    public function doctorregister($data,$file){
        $firstname   = $this->fm->validation($data['firstname']);
        $lastname    = $this->fm->validation($data['lastname']);
        $email       = $this->fm->validation($data['email']);
        $address     = $this->fm->validation($data['address']);
        $bdate       = $this->fm->validation($data['bdate']);
        $blood       = $this->fm->validation($data['blood']);
        $school      = $this->fm->validation($data['school']);
        $versity     = $this->fm->validation($data['versity']);
        $about       = $this->fm->validation($data['about']);
        $category       = $this->fm->validation($data['category']);
        $chamber     = $this->fm->validation($data['chamber']);
        $password    = $this->fm->validation(md5($data['password']));

        $firstname   = mysqli_real_escape_string($this->db->link,$data['firstname']);
        $lastname    = mysqli_real_escape_string($this->db->link,$data['lastname']);
        $email       = mysqli_real_escape_string($this->db->link,$data['email']);
        $address     = mysqli_real_escape_string($this->db->link,$data['address']);
        $bdate       = mysqli_real_escape_string($this->db->link,$data['bdate']);
        $blood       = mysqli_real_escape_string($this->db->link,$data['blood']);
        $school      = mysqli_real_escape_string($this->db->link,$data['school']);
        $versity     = mysqli_real_escape_string($this->db->link,$data['versity']);
        $about       = mysqli_real_escape_string($this->db->link,$data['about']);
        $category       = mysqli_real_escape_string($this->db->link,$data['category']);
        $chamber     = mysqli_real_escape_string($this->db->link,$data['chamber']);
        $password    = mysqli_real_escape_string($this->db->link,md5($data['password']));



        $permitted = array('jpg','jpeg','png','gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div = explode('.',$file_name);
        $file_ext =strtolower(end($div));
        $unique_image= substr(md5(time()),0,10).'.'.$file_ext;
        $upload_image = "image/".$unique_image;

        if(empty($firstname) || empty($lastname) || empty($email) || empty($address) || empty($bdate) || empty($school) || empty($about) || empty($category) || empty($upload_image) || empty($password)){
            $msg =  "<span class='error'>Field Must not be empty!</span>";
            return $msg;
        }
        $mailquery = "SELECT * FROM tbl_doctorlogin WHERE email='$email' LIMIT 1";
        $mailcheak = $this->db->select($mailquery);
        if($mailcheak != false){
            $msg =  "<span class='error'>Email Already Exist!</span>";
            return $msg;
        }
        elseif ($file_size > 5048567){
            $msg =  "<span class='error'>Image Size Should be less then 5mb!</span>";
            return $msg;
        }
        elseif (in_array($file_ext,$permitted) === false){
            $msg =  "<span class='error'>You can only upload " .implode(',',$permitted)."</span>";
            return $msg;
        }
        else{
            move_uploaded_file($file_temp,$upload_image);

            $query = "INSERT INTO tbl_doctorlogin(firstname,lastname,email,address,bdate,blood,school,versity,about,category,chamber,selfimage,password)
                      VALUES ('$firstname','$lastname','$email','$address','$bdate','$blood','$school','$versity','$about','$category','$chamber','$upload_image','$password')";
            $userrdata = $this->db->insert($query);
            if($userrdata = true) {
                $msg = "<span class='success'>Registration Complete Successfuly!</span>";
                return $msg;
            }
            else{
                $msg = "<span class='error'>Please Try again!!</span>";
                return $msg;
            }
        }
    }

    public function Login($data)
    {
        $email = $this->fm->validation($data['email']);
        $password = $this->fm->validation($data['password']);

        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $password = mysqli_real_escape_string($this->db->link, md5($data['password']));

        if (empty($email) || empty($password)) {
            $loginmsg = "Email or Password Must not be empty";
            return $loginmsg;
        } else {
            $query = "SELECT * FROM `tbl_userlogin` WHERE email ='$email' AND password ='$password'";
            $doctorquery = "SELECT * FROM tbl_doctorlogin WHERE email ='$email' AND password ='$password'";
            $login = $this->db->select($query);
            
            $dLogin      = $this->db->select($doctorquery);
            if ($login != false) {
                $value = $login->fetch_assoc();
                
                Session::set("login", true);
                Session::set("userid", $value['userid']);
                Session::set("userfirstname", $value['firstname']);
                Session::set("userlastname", $value['lastname']);
                Session::set("address", $value['address']);
                Session::set("number", $value['number']);
                Session::set("image", $value['image']);
                header("Location: index.php");
            }
            elseif($dLogin != false) {
               $dvalue = $dLogin->fetch_assoc();
                
               Session::set("dlogin", true);
               Session::set("doctorid", $dvalue['doctorid']);
               Session::set("email", $dvalue['email']);
               Session::set("doctorfirstname", $dvalue['firstname']);
               Session::set("doctorlastname", $dvalue['lastname']);
               Session::set("image", $dvalue['selfimage']);
               header("Location: doctor_index.php");
           }
            else {
                $loginmsg = "Email or Password not match!";
                return $loginmsg;
            }
        }
    }
}