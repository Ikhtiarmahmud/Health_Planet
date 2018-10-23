<?php include "include/bangla_header.php"?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $user = $userdata->calori($_POST);
}
?>
    <section id="maincontent">
    <div class="container-fluid">
        <div class="row">
            <?php
            $dlogin = Session::get("dlogin");
            if($dlogin == true){ ?>
                <div class="leftsidebar col-md-5 ">
                    <h3 class="text-center"><a href="#"><i class="fab fa-blogger">খাদ্যের নাম ও ক্যালরি</i>&nbsp;</a></h3>
                    <?php
                    if(isset($user)){
                        echo $user;
                    }
                    ?>
                    <form action="" method="post">
                        <input type="text" class="form-control" placeholder="Food Name" name="foodname"><br>
                        <input type="text" class="form-control" placeholder="Quantity" name="foodquantity"><br>
                        <input type="text" class="form-control" placeholder="Calorie" name="calorie"><br>
                        <input type="submit" value="ADD" name="submit" class="form-control mt-2">
                    </form>
                </div>
           <?php }
            ?>
            <div class="middlecontent col-md-7">
                <h3 class="text-center"><a href="#">খাদ্যের ক্যালরি&nbsp;<i class="fas fa-eye"></i></a></h3>
                    <form action="bangla_caloriedetailssearch.php" class="row" method="get">
                        <div class="col-md-2 offset-md-5">
                            <label style="font-size: 26px;color:grey;" class=" font-weight-bold">সার্চ : </label>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control mb-2 d-inline" name="caloriesearch" placeholder="Search">
                        </div>
                    </form>
                <div class="subcontent">
                   <table class="table table-responsive table-bordered table-hover">
                       <thead class="text-center">
                            <th>No</th>
                            <th>Food Name</th>
                            <th>Food Quantity</th>
                            <th>Calorie Qautity</th>
                       </thead>
                       <tbody class="text-center">
                       <?php
                       $getdata = $userdata->getcalori();
                       if($getdata) {
                           $i= 0;
                       while ($result = $getdata->fetch_assoc()) {
                           $i++;
                           ?>
                           <tr>
                               <td><?php echo $i;?></td>
                               <td><?php echo $result['foodname']?></td>
                               <td><?php echo $result['foodquantity']?></td>
                               <td><?php echo $result['calorie']?></td>
                           </tr>
                           <?php
                       } }
                       ?>
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
    </section>


<?php include "include/footer.php"?>
}