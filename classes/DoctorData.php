<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Session.php');
include_once ($filepath.'/../lib/Database.php');
class DoctorData
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getdoctordata($id){
        $query = "SELECT * FROM tbl_doctorlogin WHERE doctorid ='$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function doctorpost($data){
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
            $query = "INSERT INTO tbl_doctorpost(title,body,firstname,lastname) VALUES ('$title','$body','$firstname','$lastname')";
            $userrdata = $this->db->insert($query);
            if($userrdata != false) { ?>
                <script>window.location="doctor_index.php"</script>
                <?php
            }
            else{
                $msg = "<span class='error'>Please Try again!!</span>";
                return $msg;
            }
        }
    }

    public function doctorupdateprofile($data,$file){
        $id        = $this->fm->validation($data['doctorid']);
        $firstname = $this->fm->validation($data['firstname']);
        $lastname  = $this->fm->validation($data['lastname']);
        $email     = $this->fm->validation($data['email']);
        $address   = $this->fm->validation($data['address']);
        $bdate     = $this->fm->validation($data['bdate']);
        $blood     = $this->fm->validation($data['blood']);
        $school    = $this->fm->validation($data['school']);
        $versity   = $this->fm->validation($data['versity']);
        $about     = $this->fm->validation($data['about']);

        $id        = mysqli_real_escape_string($this->db->link,$data['doctorid']);
        $firstname = mysqli_real_escape_string($this->db->link,$data['firstname']);
        $lastname  = mysqli_real_escape_string($this->db->link,$data['lastname']);
        $email     = mysqli_real_escape_string($this->db->link,$data['email']);
        $address   = mysqli_real_escape_string($this->db->link,$data['address']);
        $bdate     = mysqli_real_escape_string($this->db->link,$data['bdate']);
        $blood     = mysqli_real_escape_string($this->db->link,$data['blood']);
        $school    = mysqli_real_escape_string($this->db->link,$data['school']);
        $versity   = mysqli_real_escape_string($this->db->link,$data['versity']);
        $about     = mysqli_real_escape_string($this->db->link,$data['about']);


        $permitted = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $file['selfimage']['name'];
        $file_size = $file['selfimage']['size'];
        $file_temp = $file['selfimage']['tmp_name'];

        $div          = explode('.', $file_name);
        $file_ext     = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $upload_image = "image/" . $unique_image;


        if(empty($firstname) || empty($lastname) || empty($email) || empty($address) || empty($bdate) || empty($school) || empty($versity) || empty($about)){
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
                    $query = "UPDATE `tbl_doctorlogin` SET 
                               `firstname` = '$firstname',
                               `lastname`  = '$lastname',
                               `email`     = '$email',
                               `address`   = '$address',
                               `bdate`     = '$bdate',
                               `blood`     = '$blood',
                               `school`    = '$school',
                               `versity`   = '$versity',
                               `about`     = '$about',
                               `selfimage`     = '$upload_image'
                                WHERE doctorid   = '$id'";

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
                $query = "UPDATE `tbl_doctorlogin` SET 
                               `firstname` = '$firstname',
                               `lastname`  = '$lastname',
                               `email`     = '$email',
                               `address`   = '$address',
                               `bdate`     = '$bdate',
                               `blood`     = '$blood',
                               `school`    = '$school',
                               `versity`   = '$versity',
                               `about`     = '$about'
                                WHERE doctorid   = '$id'";
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


    public function  getdoctorpost(){
        $query = "SELECT * FROM tbl_doctorpost ORDER BY doctorpostid DESC LIMIT 4";
        $result = $this->db->select($query);
        return $result;
    }
    public function  getdoctorbyrole(){
        $query = "SELECT * FROM tbl_doctorlogin WHERE status='1'";
        $result = $this->db->select($query);
        return $result;
    }
    public function  getdoctorbyroletwo(){
        $query = "SELECT * FROM tbl_doctorlogin WHERE status='2'";
        $result = $this->db->select($query);
        return $result;
    }
    public function  getdoctorbyrolethree(){
        $query = "SELECT * FROM tbl_doctorlogin WHERE status='3'";
        $result = $this->db->select($query);
        return $result;
    }
}