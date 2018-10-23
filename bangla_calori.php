<?php include "include/bangla_header.php"?>
<?php
if(isset($_GET['submit'])) {
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $num3 = $_GET['num3'];
    $num4 = $_GET['num4'];
    $num5 = $_GET['num5'];
    $num6 = $_GET['num6'];
    $num7 = $_GET['num7'];
    $num8 = $_GET['num8'];
    $num9 = $_GET['num9'];
    $num10 = $_GET['num10'];
    $num11 = $_GET['num11'];
    $num12 = $_GET['num12'];
    $num13 = $_GET['num13'];
    $num14 = $_GET['num14'];
    $num15 = $_GET['num15'];
    $total = $num1 + $num2 + $num3 + $num4 + $num5 + $num6 + $num7 + $num8 + $num9 + $num10 + $num11 + $num12 + $num13 + $num14 + $num15;
}
?>
    <section id="maincontent">
    <div class="container-fluid">
        <div class="row">
            <div class="middlecontent col-md-7">
                <h3 class="text-center"><a href="">আপনার দিনের ক্যালরি হিসাব&nbsp;<i class="fas fa-eye"></i></a></h3>
                <a class="btn btn-primary p-2" href="bangla_caloriedetails.php" style="color: white;font-weight: bold">Calorie Details</a>
                <div style="padding: 20px;border: 1px solid darkgray;margin: 5px;font-size: 25px;color:#e60000">
                    <p style="font-size: 15px">একজন প্রাপ্তবয়স্ক মানুষের প্রতিদিন ২৫০০ক্যালরি খাবার গ্রহন করা উচিত।নিম্নে আপনার আজকের খাদ্য  তালিকা ও তার পরিমান লিখে &nbsp;ক্যালকুলেট করে দেখতে পারেন আজকের আপনার আর কত ক্যলরির প্রয়োজন । কোন খাবারে কত ক্যালরি জানতে উপরে
                        <a style="color: blueviolet" href="bangla_caloriedetails.php">Calorie details</a>&nbsp;এ ক্লিক করুক।</p>
                <?php if(isset($total)) {
                    echo "Your Total Calori = $total";?><br>
                <?php
                    if($total >> 2500 OR $total == 2500){
                        echo "Result : Your Calori is Perfect. keep it up!";
                    }
                    else{
                        $short = 2500-$total;
                        echo "Result : oops! Your Calorie is too Shortage.Please increse your Calorie.
                        Today Your Shortage Calory is = $short.
                        ";
                    }
                }
                ?>
                </div>
                <div class="subcontent">
                   <table class="table table-responsive table-bordered table-hover">
                       <thead class="text-center">
                            <th>No</th>
                            <th>Food Name</th>
                            <th>Calori Quantity</th>
                       </thead>
                       <tbody class="text-center">
                       <form action="bangla_calori.php" method="get">
                           <tr>
                                   <td>01</td>
                                   <td><input type="text" class="form-control"></td>
                                   <td><input type="text" class="form-control" name="num1"></td>
                           </tr>
                           <tr>
                               <td>02</td>
                               <td><input type="text" class="form-control"></td>
                               <td><input type="text" class="form-control" name="num2"></td>
                           </tr>
                           <tr>
                               <td>03</td>
                               <td><input type="text" class="form-control"></td>
                               <td><input type="text" class="form-control" name="num3"></td>
                           </tr>
                           <tr>
                               <td>04</td>
                               <td><input type="text" class="form-control"></td>
                               <td><input type="text" class="form-control" name="num4"></td>
                           </tr>
                           <tr>
                               <td>05</td>
                               <td><input type="text" class="form-control"></td>
                               <td><input type="text" class="form-control" name="num5"></td>
                           </tr>
                           <tr>
                               <td>06</td>
                               <td><input type="text" class="form-control"></td>
                               <td><input type="text" class="form-control" name="num6"></td>
                           </tr>
                           <tr>
                               <td>07</td>
                               <td><input type="text" class="form-control"></td>
                               <td><input type="text" class="form-control" name="num7"></td>
                           </tr>
                           <tr>
                               <td>08</td>
                               <td><input type="text" class="form-control"></td>
                               <td><input type="text" class="form-control" name="num8"></td>
                           </tr>
                           <tr>
                               <td>09</td>
                               <td><input type="text" class="form-control"></td>
                               <td><input type="text" class="form-control" name="num9"></td>
                           </tr>
                           <tr>
                               <td>10</td>
                               <td><input type="text" class="form-control"></td>
                               <td><input type="text" class="form-control" name="num10"></td>
                           </tr>
                           <tr>
                               <td>11</td>
                               <td><input type="text" class="form-control"></td>
                               <td><input type="text" class="form-control" name="num11"></td>
                           </tr>
                           <tr>
                               <td>12</td>
                               <td><input type="text" class="form-control"></td>
                               <td><input type="text" class="form-control" name="num12"></td>
                           </tr>
                           <tr>
                               <td>13</td>
                               <td><input type="text" class="form-control"></td>
                               <td><input type="text" class="form-control" name="num13"></td>
                           </tr>
                           <tr>
                               <td>14</td>
                               <td><input type="text" class="form-control"></td>
                               <td><input type="text" class="form-control" name="num14"></td>
                           </tr>
                           <tr>
                               <td>15</td>
                               <td><input type="text" class="form-control"></td>
                               <td><input type="text" class="form-control" name="num15"></td>
                           </tr>
                            <tr>
                                <td><input type="submit" value="Calculate" name="submit" class="form-control btn btn-dark"></td>
                            </tr>
                       </form>
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
    </section>


<?php include "include/footer.php"?>
}