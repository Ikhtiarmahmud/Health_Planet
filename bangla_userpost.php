<?php include "include/bangla_header.php";?>
<section id="maincontent">
    <div class="container-fluid">
        <div class="row">
            <div class="middlecontent col-md-7 offset-md-1">
                <?php
                $login = Session::get("login");
                if($login==true){
                    ?>
                    <h3 class="text-center"><a href="bangla_index.php"><i class="fas fa-hand-point-left"></i>ডাক্তার আর্টিকেল</a></h3>
                    <?php
                }else{ ?>
                    <h3 class="text-center"><a href="bangla_doctor_index.php"><i class="fas fa-hand-point-left"></i>ডাক্তার আর্টিকেল</a></h3>
                    <?php

                }
                ?>

                <div class="subcontent">
                    <?php
                    $getpost = $userdata->getuserpost();
                    if($getpost){
                    while ($result = $getpost->fetch_assoc()){
                    ?>
                    <div>
                        <h3><?php echo $result['title']?></h3>
                        <a href="#"><?php echo $result['firstname']?>&nbsp;<?php echo $result['lastname'];?></a>&nbsp;<span class="fas fa-angle-double-right">&nbsp;<?php echo $result['time']?></span>
                        <p></p>
                        <p><?php echo $fm->textshort($result['body'])?></p>
                        <span><a href="bangla_user_post's.php?userpostid=<?php echo $result['userpostid']?>" class="btn btn-info">আরো পড়ুন</a></span>
                    </div>
                        <?php
                    }
                    }
                    ?>
                    <div class="fb-comments" data-href="localhost/planet_copy/" data-width="200px" data-numposts="5"></div>
                </div>
            </div>
            <div class="rightsidebar col-md-3">
                <h3 class="text-center">জনপ্রিয় আর্টিকেল</h3>
                <div>
                    <ul class="list-unstyled">
                        <?php
                        $query = "SELECT * FROM tbl_doctorpost ORDER BY doctorpostid DESC LIMIT 5";
                        $gettitle = $db->select($query);
                        if($gettitle){
                            while ($result = $gettitle->fetch_assoc()){
                                ?>
                                <li><a href="bangla_Doctorpost_by_category.php?categoryid=<?php echo $result['doctorpostid']?>"><i class="fas fa-angle-double-right"></i>&nbsp;<?php echo $result['title']?></a></li>
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

<?php include "include/footer.php";?>