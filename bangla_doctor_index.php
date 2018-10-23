<?php include "include/bangla_header.php";?>
<?php
$login = Session::get("dlogin");
if($login==false){ ?>
    <script>window.location = "login.php"</script>
<?php }
?>
<section id="maincontent">
    <!--pagination-->
    <?php
    $per_page = 3;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $start_for = ($page - 1) * $per_page;
    ?>
    <!--pagination-->
    <div class="container-fluid">
        <div class="row">
            <div class="leftsidebar col-md-3">
                <h2 class="text-center pb-4">প্রোফাইল</h2>
                <?php
                $id = Session::get("doctorid");
                $getdata = $doctordata->getdoctordata($id);
                if($getdata) {
                    while ($result = $getdata->fetch_assoc()) {
                        ?>
                        <img src="<?php echo $result['selfimage']?>" alt="Hi" class="img-fluid rounded-circle" width="180" height="180">
                        <h4><?php echo $result['firstname']?>&nbsp;<?php echo $result['lastname']?></h4>
                        <h5><?php echo $result['address']?></h5>
                        <h5>Blood Group:&nbsp;<?php echo $result['blood']?></h5>
                        <h5>Email:&nbsp;<?php echo $result['email']?></h5>
                        <a class="text-center p-2 btn btn-info" href="bangla_Doctor_Profile.php?doctorid=<?php echo $result['doctorid']?>">আরো পড়ুন</a>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="middlecontent col-md-7">
                <h3 class="text-center"><a href="userpost.php">ইউজার পোস্ট পড়ুন <i class="fas fa-hand-point-right"></i></a></h3>
                <div class="subcontent">
                <?php
                /*$getpost = $doctordata->getdoctorpost();*/
                $query = "select * from tbl_doctorpost order by doctorpostid DESC limit $start_for, $per_page";
                $getpost = $db->select($query);
                if($getpost){
                    while ($result = $getpost->fetch_assoc()){
                        ?>
                    <div>
                        <h3><?php echo $result['title']?></h3>
                        <a href="#"><?php echo $result['firstname']?>&nbsp;<?php echo $result['lastname']?></a>&nbsp;<span><?php echo $result['time']?></span>
                        <p></p>
                        <p><?php echo $fm->textshort($result['body'])?></p>
                        <span><a href="bangla_Doctorpost.php?doctorpostid=<?php echo $result['doctorpostid']?>" class="btn btn-info">আরো পড়ুন</a></span>
                    </div>
                        <?php
                    }
                ?>
                </div>
                <?php
                $query = 'select * from tbl_doctorpost';
                $result = $db->select($query);
                $total_rows = mysqli_num_rows($result);
                $total_page = ceil($total_rows / $per_page);
                ?>
                <div class="pagination clear mt-2">
                    <?php
                    echo "<a href='bangla_doctor_index.php?page=1'>" . "First page" . "</a>";
                    for ($i = 1; $i <= $total_page; $i++) {
                        echo "<a href='bangla_doctor_index.php?page" . $i . "'>" . $i . "</a>";
                    }
                    echo "<a href='bangla_doctor_index.php?page=$total_page'>" . "Last page" . "</a></span>";
                    ?>
                    <!--pagination-->
                </div>
                <?php } ?>
            </div>
            </div>
            <div class="rightsidebar col-md-2">
                <h3 class="text-center">জনপ্রিয় ব্লগ</h3>
                <div>
                    <ul class="list-unstyled">
                <?php
                $query = "SELECT * FROM tbl_doctorpost ORDER BY doctorpostid DESC LIMIT 5";
                $gettitle = $db->select($query);
                if($gettitle){
                    while ($result = $gettitle->fetch_assoc()){
                        ?>
                        <li><a href="Doctorpost_by_category.php?categoryid=<?php echo $result['doctorpostid']?>"><i class="fas fa-angle-double-right"></i>&nbsp;<?php echo $result['title']?></a></li>
                        <?php
                    }
                }
                ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include "include/footer.php"?>