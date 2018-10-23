<?php include "include/header.php"?>
<?php
$login = Session::get("login");
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
                <h2 class="text-center pb-4">My Profile</h2>
                <?php
                $id = Session::get("userid");
                $getdata = $userdata->getuserdata($id);
                if($getdata) {
                    while ($result = $getdata->fetch_assoc()) {
                        ?>
                        <img src="<?php echo $result['image']?>" alt="Hi" class="img-fluid rounded-circle" style="width: 150px;height:150px;">
                        <h4><?php echo $result['firstname']?>&nbsp;<?php echo $result['lastname']?></h4>
                        <h5><?php echo $result['address']?></h5>
                        <h5>Blood Group:&nbsp;<?php echo $result['blood']?></h5>
                        <h5>Email:&nbsp;<?php echo $result['email']?></h5>
                        <a class="text-center p-2 btn btn-info" href="userprofile.php?userid=<?php echo $result['userid']?>">View Profile</a>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="middlecontent col-md-7">
                <h3 class="text-center"><a href="userpost.php">Read User Post <i class="fas fa-hand-point-right"></i></a></h3>
                <div class="subcontent">
                    <?php
                    $query = "select * from tbl_doctorpost order by doctorpostid DESC limit $start_for, $per_page";
                    $getpost = $db->select($query);
                  /*  $getpost = $doctordata->getdoctorpost();*/
                    if($getpost){
                        while ($result = $getpost->fetch_assoc()){
                            ?>
                            <div>
                                <h3><?php echo $result['title']?></h3>
                                <a href="#"><?php echo $result['firstname']?>&nbsp;<?php echo $result['lastname']?></a>&nbsp;<span><?php echo $result['time']?></span>
                                <p></p>
                                <p><?php echo $fm->textshort($result['body'])?></p>
                                <span><a href="Doctorpost.php?doctorpostid=<?php echo $result['doctorpostid']?>" class="btn btn-info">Read More</a></span>
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
                    echo "<a href='index.php?page=1'>" . "First page" . "</a>";
                    for ($i = 1; $i <= $total_page; $i++) {
                        echo "<a href='index.php?page" . $i . "'>" . $i . "</a>";
                    }
                    echo "<a href='index.php?page=$total_page'>" . "Last page" . "</a></span>";
                    ?>
                    <!--pagination-->
                </div>
                <?php } ?>
            </div>
            <div class="rightsidebar col-md-2">
                <h3 class="text-center">Active Doctor</h3>
                <div>
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="fas fa-angle-double-right"></i>&nbsp;Eye Specialist </a>
                            <ul class="list-group list-unstyled">
                                <?php
                                $getdata = $doctordata->getdoctorbyrole();
                                if($getdata){
                                    while($result = $getdata->fetch_assoc()){ ?>
                                <li><a href="Doctor_Profile_for_user.php?doctorid=<?php echo $result['doctorid']?>"><?php echo $result['firstname']?>&nbsp;<?php echo $result['lastname']?></a>&nbsp;&nbsp;<span></span> </li>
                                <?php
                                    }
                                }
                                ?>
                            </ul>
                        </li>
                        <li><a href="#"><i class="fas fa-angle-double-right"></i>&nbsp;Dental Specialist
                                <ul class="list-group list-unstyled">
                                    <?php
                                    $getdata = $doctordata->getdoctorbyroletwo();
                                    if($getdata){
                                        while($result = $getdata->fetch_assoc()){ ?>
                                            <li><a href="Doctor_Profile_for_user.php?doctorid=<?php echo $result['doctorid']?>"><?php echo $result['firstname']?>&nbsp;<?php echo $result['lastname']?></a>&nbsp;&nbsp;<span></span> </li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </a></li>
                        <li><a href="#" data-target="#collapseThree" data-toggle="collapse"><i class="fas fa-angle-double-right"></i>&nbsp;Medicine
                                <ul class="collapse.show list-group list-unstyled" id="collapseThree">
                                    <?php
                                    $getdata = $doctordata->getdoctorbyrolethree();
                                    if($getdata){
                                        while($result = $getdata->fetch_assoc()){ ?>
                                            <li><a href="Doctor_Profile_for_user.php?doctorid=<?php echo $result['doctorid']?>"><?php echo $result['firstname']?>&nbsp;<?php echo $result['lastname']?></a>&nbsp;&nbsp;<span></span></li>
                                            <?php
                                        }
                                    }
                                    ?>
                                </ul>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </section>


<?php include "include/footer.php"?>
}