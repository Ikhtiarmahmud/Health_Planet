<?php include "include/header.php"?>
<?php
if(isset($_POST['abc'])){
    //====================================================
    //step 1, get data, you can get these value from your database or any user submitted form.No need to urlencode here. Because it will send the data using POST method//



    //step 2, sendfunction//
    $token =  $_POST['token'];
    $to = $_POST['to'];
    $message =  rawurldecode($_POST['message']);

    $url = "http://api.greenweb.com.bd/api.php";


    $data= array(
        'to'=>"$to",
        'message'=>"$message",
        'token'=>"$token"
    ); // Add parameters in key value
    $ch = curl_init(); // Initialize cURL
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_ENCODING, '');
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
    $smsresult = curl_exec($ch);
    echo("$smsresult");

    //sendsms end//
}
?>
    <section id="maincontent">
    <div class="container-fluid">
        <div class="row">
            <?php $number = Session::get("number");?>
            <div class="middlecontent col-md-10 offset-md-2">
                <h3 class="text-center"><a href="bloodbank.php">Find Your Blood&nbsp;<i class="fas fa-eye"></i></a></h3>
                    <form action="search.php" class="row" method="get">
                        <div class="col-md-2 offset-md-5">
                            <label style="font-size: 26px;color:grey;" class=" font-weight-bold">Search : </label>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control mb-2 d-inline" name="search" placeholder="Search Blood">
                        </div>
                    </form>
                <div class="subcontent">
                   <table class="table table-responsive table-bordered table-hover">
                       <thead class="text-center">
                            <th>No</th>
                            <th>B. Group</th>
                            <th>LastDonateBlood</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Number</th>
                            <th>Email</th>
                            <th>Send</th>
                       </thead>
                       <tbody class="text-center">
                       <?php
                       $getdata = $userdata->getuserdataforblodd();
                       if($getdata) {
                           $i= 0;
                       while ($result = $getdata->fetch_assoc()) {
                           $i++;
                           ?>
                           <tr>
                               <td><?php echo $i;?></td>
                               <td><?php echo $result['blood']?></td>
                               <td><?php echo $result['lastblooddate']?></td>
                               <td><?php echo $result['firstname']?>&nbsp;<?php echo $result['lastname']?></td>
                               <td><?php echo $result['address']?></td>
                               <td><?php echo $result['number']?></td>
                               <td><?php echo $result['email']?></td>
                               <td>
                                   <form action="bloodbank.php" method="post">
                                               <span><input type="hidden" name="token" value="8adcd02dab4a5c360788713023d25d25"></span>
                                               <span><input type="hidden" name="to" value="<?php echo $result['number']?>"></span>
                                               <span><input type="hidden" name="message" value="If you want donnate blood,please Contact below this number as Soon as possible.<?php echo $number;?>"></span>
                                               <span><input type="submit" name="abc" class="btn btn-primary" value="send"></span>
                                   </form>
                               </td>
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