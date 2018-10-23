<?php include "include/bangla_header.php"?>
<?php


if(!isset($_GET['caloriesearch']) || $_GET['caloriesearch'] == NULL){
    header("Location:404.php");
}else{
    $caloriesearch = $_GET['caloriesearch'];
}
?>
    <section id="maincontent">
    <div class="container-fluid">
        <div class="row">
            <div class="middlecontent col-md-8 offset-md-2">
                <h3 class="text-center"><a href="bangla_calori.php">ক্যালরি<i class="fas fa-eye"></i></a></h3>
                    <form action="" method="get" class="row">
                        <div class="col-md-2 offset-md-5">
                            <label style="font-size: 26px;color:grey;" class=" font-weight-bold">সার্চ : </label>
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="caloriesearch" class="form-control mb-2 d-inline" placeholder="Search">
                        </div>
                    </form>
                <div class="subcontent">
                   <table class="table table-responsive table-bordered table-hover">
                       <thead class="text-center">
                       <th>No</th>
                       <th>Food Name</th>
                       <th>Food Quantity</th>
                       <th>Calorie</th>
                       </thead>
                       <tbody class="text-center">
                       <?php
                       $query = "SELECT * FROM tbl_calori WHERE foodname LIKE '%$caloriesearch%'";
                       $blood = $db->select($query);
                       if($blood) {
                           $i= 0;
                       while ($result = $blood->fetch_assoc()) {
                           $i++;
                           ?>
                           <tr>
                               <td><?php echo $i;?></td>
                               <td><?php echo $result['foodname']?></td>
                               <td><?php echo $result['foodquantity']?></td>
                               <td><?php echo $result['calorie']?></td>
                           </tr>
                           <?php
                       } }else{
                           echo "No Data Available";
                       }
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