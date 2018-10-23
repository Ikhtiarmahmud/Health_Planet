<?php include "include/bangla_header.php"?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $user = $userdata->emergencynumber($_POST);
}
?>
    <section id="maincontent">
    <div class="container-fluid">
        <div class="row">
            <?php
            $dlogin = Session::get("dlogin");
            if($dlogin == true){ ?>
                <div class="leftsidebar col-md-5 ">
                    <h3 class="text-center"><a href="#"><i class="fab fa-blogger"></i>&nbsp;নাম্বার সংযুক্তি</a></h3>
                    <?php
                    if(isset($user)){
                        echo $user;
                    }
                    ?>
                    <form action="" method="post">
                        <input type="text" class="form-control" placeholder="complex Name" name="complex"><br>
                        <input type="text" class="form-control" placeholder="address" name="address"><br>
                        <input type="number" class="form-control" placeholder="number" name="number">
                        <input type="submit" value="ADD" name="submit" class="form-control mt-2">
                    </form>
                </div>
           <?php }
            ?>
            <div class="middlecontent col-md-7">
                <h3 class="text-center"><a href="bangla_bloodbank.php">হেলথ কমপ্লেক্স নাম্বার&nbsp;<i class="fas fa-eye"></i></a></h3>
                    <form action="bangla_emergencysearch.php" class="row" method="get">
                        <div class="col-md-2 offset-md-5">
                            <label style="font-size: 26px;color:grey;" class=" font-weight-bold">Search : </label>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control mb-2 d-inline" name="emergencysearch" placeholder="Search Blood">
                        </div>
                    </form>
                <div class="subcontent">
                   <table class="table table-responsive table-bordered table-hover">
                       <thead class="text-center">
                            <th>No</th>
                            <th>Complex Name</th>
                            <th>Address</th>
                            <th>Number</th>
                       </thead>
                       <tbody class="text-center">
                       <?php
                       $getdata = $userdata->getemergencynumber();
                       if($getdata) {
                           $i= 0;
                       while ($result = $getdata->fetch_assoc()) {
                           $i++;
                           ?>
                           <tr>
                               <td><?php echo $i;?></td>
                               <td><?php echo $result['complex']?></td>
                               <td><?php echo $result['address']?></td>
                               <td><?php echo $result['number']?></td>
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