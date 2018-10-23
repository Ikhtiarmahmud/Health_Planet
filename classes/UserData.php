<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
include_once ($filepath.'/../lib/Database.php');
class UserData
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function getuserdata($id){
        $query = "SELECT * FROM tbl_userLogin WHERE userid='$id'";
        $result = $this->db->select($query);
        return $result;
    }
    public function getuserdataforblodd(){
        $query = "SELECT * FROM tbl_userLogin ORDER BY userid DESC ";
        $result = $this->db->select($query);
        return $result;
    }
    
    public function userupdateprofile($data,$file){
        $id        = $this->fm->validation($data['userid']);
        $firstname = $this->fm->validation($data['firstname']);
        $lastname  = $this->fm->validation($data['lastname']);
        $email     = $this->fm->validation($data['email']);
        $number    = $this->fm->validation($data['number']);
        $address   = $this->fm->validation($data['address']);
        $bdate     = $this->fm->validation($data['bdate']);
        $blood     = $this->fm->validation($data['blood']);
        $lastblood     = $this->fm->validation($data['lastblooddate']);
        $school    = $this->fm->validation($data['school']);
        $versity   = $this->fm->validation($data['versity']);
        $about     = $this->fm->validation($data['about']);

        $id        = mysqli_real_escape_string($this->db->link,$data['userid']);
        $firstname = mysqli_real_escape_string($this->db->link,$data['firstname']);
        $lastname  = mysqli_real_escape_string($this->db->link,$data['lastname']);
        $email     = mysqli_real_escape_string($this->db->link,$data['email']);
        $number    = mysqli_real_escape_string($this->db->link,$data['number']);
        $address   = mysqli_real_escape_string($this->db->link,$data['address']);
        $bdate     = mysqli_real_escape_string($this->db->link,$data['bdate']);
        $lastblood     = mysqli_real_escape_string($this->db->link,$data['lastblooddate']);
        $school    = mysqli_real_escape_string($this->db->link,$data['school']);
        $versity   = mysqli_real_escape_string($this->db->link,$data['versity']);
        $about     = mysqli_real_escape_string($this->db->link,$data['about']);


        $permitted = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['image']['name'];
        $file_size = $file['image']['size'];
        $file_temp = $file['image']['tmp_name'];

        $div          = explode('.', $file_name);
        $file_ext     = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $upload_image = "image/" . $unique_image;


        if(empty($firstname) || empty($lastname) || empty($email) || empty($number) || empty($address) || empty($bdate) || empty($school) || empty($about)){
            $msg =  "<span class='error'>Field Must not be empty!</span>";
            return $msg;
        }
        else {
            if (!empty($file_name)) {
                if ($file_size > 5048567) {
                    $msg = "<span class='error'>Image Size Should be less then 5mb!</span>";
                    return $msg;
                } elseif (in_array($file_ext, $permitted) === false) {
                    $msg = "<span class='error'>You can only upload&nbsp;" . implode(',', $permitted) . "</span>";
                    return $msg;
                }
                else {
                    move_uploaded_file($file_temp, $upload_image);
                    $query = "UPDATE `tbl_userLogin` SET 
                               `firstname` = '$firstname',
                               `lastname`  = '$lastname',
                               `email`     = '$email',
                               `number`    = '$number',
                               `address`   = '$address',
                               `bdate`     = '$bdate',
                               `blood`     = '$blood',
                               `lastblooddate` = '$lastblood',
                               `school`    = '$school',
                               `versity`   = '$versity',
                               `about`     = '$about',
                               `image`     = '$upload_image'
                                WHERE userid   = '$id'";

                    $proresult = $this->db->update($query);
                    if ($proresult = true) {
                        $msg = "<span class='success'>Profile Updated Successfuly!</span>";
                        return $msg;
                    } else {
                        $msg = "<span class='error'>Profile Not Updated!</span>";
                        return $msg;
                    }
                }
            }else{
                $query = "UPDATE `tbl_userLogin` SET 
                               `firstname` = '$firstname',
                               `lastname`  = '$lastname',
                               `email`     = '$email',
                               `number`    = '$number',
                               `address`   = '$address',
                               `bdate`     = '$bdate',
                               `blood`     = '$blood',
                               `lastblooddate` = '$lastblood',
                               `school`    = '$school',
                               `versity`   = '$versity',
                               `about`     = '$about'
                                WHERE userid   = '$id'";
                $proresult = $this->db->update($query);
                if ($proresult = true) {
                    $msg = "<span class='success'>Profile Update Successfuly!</span>";
                    return $msg;
                } else {
                    $msg = "<span class='error'>Profile Not Updated!</span>";
                    return $msg;
                }
            }
        }
    }

    public function userpost($data){
        $title = $this->fm->validation($data['title']);
        $body  = $this->fm->validation($data['body']);
        $firstname  = $this->fm->validation($data['firstname']);
        $lastname  = $this->fm->validation($data['lastname']);

        $title        = mysqli_real_escape_string($this->db->link,$data['title']);
        $body         = mysqli_real_escape_string($this->db->link,$data['body']);
        $firstname         = mysqli_real_escape_string($this->db->link,$data['firstname']);
        $lastname         = mysqli_real_escape_string($this->db->link,$data['lastname']);

        if(empty($title) || empty($body)){
            $msg =  "<span class='error'>Field Must not be empty!</span>";
            return $msg;
        }
        else {
            $query = "INSERT INTO tbl_userpost(title,body,firstname,lastname) VALUES ('$title','$body','$firstname','$lastname')";
            $userrdata = $this->db->insert($query);
            if($userrdata != false) {
                $msg = "<span class='success'>Post Updated Successfuly!</span>";?>
                <script>window.location = "userpost.php"</script>
               <?php /*header("Location:userpost.php");*/
            }
            else{
                $msg = "<span class='error'>Please Try again!!</span>";
                return $msg;
            }
        }
    }

    public function emergencynumber($data){
        $complex = $this->fm->validation($data['complex']);
        $address  = $this->fm->validation($data['address']);
        $number  = $this->fm->validation($data['number']);

        $complex        = mysqli_real_escape_string($this->db->link,$data['complex']);
        $address         = mysqli_real_escape_string($this->db->link,$data['address']);
        $number         = mysqli_real_escape_string($this->db->link,$data['number']);

        if(empty($complex) || empty($address) || empty($number)){
            $msg =  "<span class='error'>Field Must not be empty!</span>";
            return $msg;
        }
        else {
            $query = "INSERT INTO tbl_emergencynumber(complex,address,number) VALUES ('$complex','$address','$number')";
            $userrdata = $this->db->insert($query);
            if($userrdata != false) {
                $msg = "<span class='success'>Added Successfuly!</span>";?>
                <script>window.location = "emergency.php"</script>
                <?php /*header("Location:userpost.php");*/
            }
            else{
                $msg = "<span class='error'>Please Try again!!</span>";
                return $msg;
            }
        }
    }

    public function getemergencynumber(){
        $query = "SELECT * FROM tbl_emergencynumber ORDER BY id DESC ";
        $result = $this->db->select($query);
        return $result;
    }

    public function calori($data){
        $foodname = $this->fm->validation($data['foodname']);
        $foodquantity  = $this->fm->validation($data['foodquantity']);
        $calorie  = $this->fm->validation($data['calorie']);

        $foodname        = mysqli_real_escape_string($this->db->link,$data['foodname']);
        $foodquantity         = mysqli_real_escape_string($this->db->link,$data['foodquantity']);
        $calorie         = mysqli_real_escape_string($this->db->link,$data['calorie']);

        if(empty($foodname) || empty($foodquantity)){
            $msg =  "<span class='error'>Field Must not be empty!</span>";
            return $msg;
        }
        else {
            $query = "INSERT INTO tbl_calori(foodname,foodquantity,calorie) VALUES ('$foodname','$foodquantity','$calorie')";
            $userrdata = $this->db->insert($query);
            if($userrdata != false) {
                $msg = "<span class='success'>Added Successfuly!</span>";?>
                <script>window.location = "caloriedetails.php"</script>
                <?php /*header("Location:userpost.php");*/
            }
            else{
                $msg = "<span class='error'>Please Try again!!</span>";
                return $msg;
            }
        }
    }

    public function getcalori(){
        $query = "SELECT * FROM tbl_calori ORDER BY id DESC ";
        $result = $this->db->select($query);
        return $result;
    }
    
    public function  getuserpost(){
        $query = "SELECT * FROM tbl_userpost ORDER BY userpostid DESC ";
        $result = $this->db->select($query);
        return $result;
    }

    public function inboxdata($data)
    {
        $messege = $this->fm->validation($data['messege']);
        $name = $this->fm->validation($data['name']);
        $doctorinboxid = $this->fm->validation($data['doctorinboxid']);
        $userinboxid = $this->fm->validation($data['userinboxid']);

        $messege = mysqli_real_escape_string($this->db->link, $data['messege']);
        $name = mysqli_real_escape_string($this->db->link, $data['name']);

        if (empty($messege)) {
            $msg = "<span class='error'>Field Must not be empty!</span>";
            return $msg;
        }else{
            $query = "INSERT INTO tbl_inbox(doctorinboxid,userinboxid,messege,name) VALUES ('$doctorinboxid','$userinboxid','$messege','$name')";
            $userrdata = $this->db->insert($query);
            if($userrdata != false) { ?>
                <script>window.location = "inbox.php"</script>
                <?php
            }
            else{
                $msg = "<span class='error'>Please Try again!!</span>";
                return $msg;
            }
        }
    }

    public function  getinboxdata(){
        $inboxid = Session::get("doctorinboxid");
        $userinboxid = Session::get("userid");
        $query = "SELECT * FROM tbl_inbox WHERE doctorinboxid='$inboxid' ORDER BY id DESC LIMIT 10";
        $result = $this->db->select($query);
        return $result;
    }
}
