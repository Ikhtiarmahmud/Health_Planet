<?php include "include/header.php"?>
<?php
$p_id=mysqli_real_escape_string($db->link,$_GET['userpostid']);
if (!isset($p_id) || $p_id == NULL) {
    header("Location:404.php");
} else {
    $id = $p_id;
}
?>
<section id="maincontent">
    <div class="container-fluid">
        <div class="row">
            <div id="fb-root"></div>
            <div class="middlecontent col-md-7 offset-md-1">
                <h3 class="text-center"><a href="userpost.php"><i class="fas fa-hand-point-left"></i>&nbsp;Back</a></h3>
                <div class="subcontent">
                    <?php
                    $query = "SELECT * FROM tbl_userpost WHERE userpostid='$id'";
                    $getpost = $db->select($query);
                    if($getpost){
                        while ($result = $getpost->fetch_assoc()){
                            ?>
                            <div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h3><?php echo $result['title']?></h3>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="#" class="btn btn-outline-info">EDIT</a>
                                        <a href="#" class="btn btn-outline-info">DELETE</a>
                                    </div>
                                </div>
                                <a href="#"><?php echo $result['firstname']?>&nbsp;<?php echo $result['lastname'];?></a>&nbsp;<span class="fas fa-angle-double-right">&nbsp;<?php echo $result['time']?></span>
                                <p></p>
                                <p><?php echo $result['body']?></p>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
                <div class="fb-comments" data-href="localhost/planet_copy/" data-width="200px" data-numposts="5"></div>
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