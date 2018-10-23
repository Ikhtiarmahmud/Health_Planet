<?php include "include/bangla_header.php"?>
<?php
if(!isset($_GET['emergencysearch']) || $_GET['emergencysearch'] == NULL){
    header("Location:404.php");
}else{
    $emergencysearch = $_GET['emergencysearch'];
}
?>
    <section id="maincontent">
    <div class="container-fluid">
        <div class="row">
            <div class="middlecontent col-md-8 offset-md-2">
                <h3 class="text-center"><a href="bangla_bloodbank.php">হেলথ কমপ্লেক্স নাম্বার<i class="fas fa-eye"></i></a></h3>
                    <form action="" class="row">
                        <div class="col-md-2 offset-md-5">
                            <label style="font-size: 26px;color:grey;" class=" font-weight-bold">Search : </label>
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="search" class="form-control mb-2 d-inline" placeholder="Search Blood">
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
                       $query = "SELECT * FROM tbl_emergencynumber WHERE complex LIKE '%$emergencysearch%' OR address LIKE '%$emergencysearch%' OR number LIKE '%$emergencysearch%'";
                       $blood = $db->select($query);
                       if($blood) {
                           $i= 0;
                       while ($result = $blood->fetch_assoc()) {
                           $i++;
                           ?>
                           <tr>
                               <td><?php echo $i;?></td>
                               <td><?php echo $result['complex']?></td>
                               <td><?php echo $result['address']?></td>
                               <td><?php echo $result['number']?></td>
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