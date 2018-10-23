<?php include "include/header.php"?>
<?php
/*$p_id=mysqli_real_escape_string($db->link,$_GET['doctorpostid']);
if (!isset($p_id) || $p_id == NULL) {
    header("Location:404.php");
} else {
    $id = $p_id;
}*/
?>
<?php
if(!isset($_GET['categoryid']) || $_GET['categoryid'] == NULL){
    header("Location:404.php");
}else{
    $categoryid = $_GET['categoryid'];
}
?>
<section id="maincontent">
    <div class="container-fluid">
        <div id="fb-root"></div>
        <div class="row">
            <div class="middlecontent col-md-7 offset-md-1">
                <h3 class="text-center"><a href="doctor_index.php"><i class="fas fa-hand-point-left"></i>&nbsp;Back</a></h3>
                <div class="subcontent">
                    <?php
                    /*$getpost = $doctordata->getdoctorpost();*/
                    $query = "SELECT * FROM tbl_doctorpost WHERE doctorpostid='$categoryid'";
                    $getpost = $db->select($query);
                    if($getpost){
                        while ($result = $getpost->fetch_assoc()){
                            ?>
                            <div>
                                <h3><?php echo $result['title']?></h3>
                                <a href="#"><?php echo $result['firstname']?>&nbsp;<?php echo $result['lastname']?></a>&nbsp;<span><?php echo $result['time']?></span>
                                <p></p>
                                <p><?php echo $result['body']?></p>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <div class="fb-like"></div>
                    <div class="fb-comments" data-href="http://localhost/planet_copy/Doctorpost_by_category.php?categoryid=13" data-width="200px" data-numposts="5"></div>
                    <!-- Your embedded comments code -->
                </div>
            </div>
            <div class="rightsidebar col-md-4">
                <h3 class="text-center">Latest Article</h3>
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