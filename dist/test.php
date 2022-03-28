<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$name = $_POST['name'];
		$email = $_POST['email'];
        $phone = $_POST['phone'];
        //option id of cet
        $cet = $_POST['cet'];
        $query1 = "SELECT weight FROM `options` WHERE title='$cet' AND question_id = 1 ";
        $result1 = mysqli_query($conn,$query1);
        $row1 = mysqli_fetch_assoc($result1);
        $o1 = $row1['weight'];
        //option weight of far
        $far = $_POST['far'];
        $query2 = "SELECT weight FROM `options` WHERE title='$far' AND question_id = 2";
        $result2 = mysqli_query($conn,$query2);
        $row2 = mysqli_fetch_assoc($result2);
        $o2 = $row2['weight'];
        //option weight of parent
        $parent = $_POST['parent'];
        $query3 = "SELECT weight FROM `options` WHERE title='$parent' AND question_id = 3";
        $result3 = mysqli_query($conn,$query3);
        $row3 = mysqli_fetch_assoc($result3);
        $o3 = $row3['weight'];
          //option weight of reference
        $reference = $_POST['reference'];
        $query4 = "SELECT weight FROM `options` WHERE title='$reference' AND question_id = 4";
        $result4 = mysqli_query($conn,$query4);
        $row4 = mysqli_fetch_assoc($result4);
        $o4 = $row4['weight'];
        //option weight of brance
        $branch = $_POST['branch'];
        $query5 = "SELECT weight FROM `options` WHERE title='$branch' AND question_id = 5";
        $result5 = mysqli_query($conn,$query5);
        $row5 = mysqli_fetch_assoc($result5);
        $o5 = $row5['weight'];
        //option weight for hostel
        $hostel = $_POST['hostel'];
        $query6 = "SELECT weight FROM `options` WHERE title='$hostel' AND question_id = 6";
        $result6 = mysqli_query($conn,$query6);
        $row6 = mysqli_fetch_assoc($result6);
        $o6 = $row6['weight'];
        //option weight for sibling
        $sibling = $_POST['sibling'];
        $query7 = "SELECT weight FROM `options` WHERE title='$sibling' AND question_id = 7";
        $result7 = mysqli_query($conn,$query7);
        $row7 = mysqli_fetch_assoc($result7);
        $o7 = $row7['weight'];
        //priority option weight
        $priority = $_POST['priority'];
        $query8 = "SELECT weight FROM `options` WHERE title='$priority' AND question_id = 8";
        $result8 = mysqli_query($conn,$query8);
        $row8 = mysqli_fetch_assoc($result8);
        $o8 = $row8['weight'];
        //option weight for library
        $library = $_POST['library'];
        $query9 = "SELECT weight FROM `options` WHERE title='$library' AND question_id = 9";
        $result9 = mysqli_query($conn,$query9);
        $row9 = mysqli_fetch_assoc($result9);
        $o9 = $row9['weight'];
        //option weight for teaching
        $teaching = $_POST['teaching'];
        $query10 = "SELECT weight FROM `options` WHERE title='$teaching' AND question_id = 10";
        $result10 = mysqli_query($conn,$query10);
        $row10 = mysqli_fetch_assoc($result10);
        $o10 = $row10['weight'];
        //oweight for infra
        $infrastructure = $_POST['infrastructure'];
        $query11 = "SELECT weight FROM `options` WHERE title='$infrastructure' AND question_id = 11";
        $result11 = mysqli_query($conn,$query11);
        $row11 = mysqli_fetch_assoc($result11);
        $o11 = $row11['weight'];
        //oweight for lab
        $lab = $_POST['lab'];
        $query12 = "SELECT weight FROM `options` WHERE title='$lab' AND question_id = 12";
        $result12 = mysqli_query($conn,$query12);
        $row12 = mysqli_fetch_assoc($result12);
        $o12 = $row12['weight'];
        //oweight for placements
        $placement = $_POST['placement'];
        $query13 = "SELECT weight FROM `options` WHERE title='$placement' AND question_id = 13";
        $result13 = mysqli_query($conn,$query13);
        $row13 = mysqli_fetch_assoc($result13);
        $o13 = $row13['weight'];
        //oweight for transport
        $transport = $_POST['transport'];
        $query14 = "SELECT weight FROM `options` WHERE title='$transport' AND question_id = 14";
        $result14 = mysqli_query($conn,$query14);
        $row14 = mysqli_fetch_assoc($result14);
        $o14 = $row14['weight'];
        //oweight for minority
        $minority = $_POST['minority'];
        $query15 = "SELECT weight FROM `options` WHERE title='$minority' AND question_id = 15";
        $result15 = mysqli_query($conn,$query15);
        $row15 = mysqli_fetch_assoc($result15);
        $o15 = $row15['weight'];
        //oweight for inst
        $instructional = $_POST['instructional'];
        $query16 = "SELECT weight FROM `options` WHERE title='$instructional' AND question_id = 16";
        $result16 = mysqli_query($conn,$query16);
        $row16 = mysqli_fetch_assoc($result16);
        $o16 = $row16['weight'];
        //oweight for bank loan
        $bank_loan = $_POST['bank_loan'];
        $query17 = "SELECT weight FROM `options` WHERE title='$bank_loan'AND question_id = 17";
        $result17 = mysqli_query($conn,$query17);
        $row17 = mysqli_fetch_assoc($result17);
        $o17 = $row17['weight'];

		if(!empty($name) && !empty($email) && !empty($phone))
		{
            
              $weight =((17*$o1 + 16*$o2 + 15*$o3 + 14*$o4 + 13*$o5 +12* $o6 + 11*$o7 + 10*$o8 + 9*$o9 + 8*$o10 + 7*$o11 + 6*$o12 + 5*$o13 + 4*$o14 + 3*$o15 + 2*$o16 + 1*$o17)/(17+16+15+14+13+12+11+10+9+8+7+6+5+4+3+2+1))*100; 
			//save to database
			$query = "insert into student_enquiry (name,email,phone,cet,far,parent,reference, branch, hostel, sibling, priority, library, teaching, infrastructure, lab, placement, transport, minority, instructional, bank_loan, probability) 
            values ('$name','$email','$phone', '$o1','$o2','$o3','$o4','$o5','$o6','$o7','$o8','$o9','$o10','$o11','$o12','$o13','$o14','$o15','$o16','$o17','$weight')";

			mysqli_query($conn, $query);

			header("Location: test.php");
			die;
		}else
		{
			echo "Please enter some valid weight information!";
		}
	}
    
    
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script>
        function validate() {
            var name = document.forms["frmQuery"]["name"];
            var phone = document.forms["frmQuery"]["phone"];
            var email = document.forms["frmQuery"]["email"];
            if (name.value == "") {
                window.alert("Please enter your name.");
                name.focus();
                return false;
            }
            if (phone.value == "") {
                window.alert("Please enter your phone.");
                phone.focus();
                return false;
            }
            if (email.value == "") {
                window.alert("Please enter your phone.");
                phone.focus();
                return false;
            }

        }
    </script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="studentform.html">Admission Enquiry Portal</a>
        <!-- Add space -->
        <span class="ms-auto"></span>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="login.php">Admin Login</a></li>
                </ul>
            </li>
        </ul>

    </nav>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <br><br>
                            <div class="card shadow-lg border-0 rounded-lg mt-5" style="width: 100%;">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Admission Enquiry</h3>
                                </div>
                                <div class="card-body">


                                    <form method="POST" name="frmQuery" onsubmit="return validate()">
                                        <center>
                                            <table class="tablemain">
                                                <tr>
                                                    <td> </td>
                                                    <td> </td>
                                                </tr>
                                                <tr>
                                                    <td><b><h6>Name<span style="color:red">*</span></h6></b></td>
                                                    <td> <input class="form-control" type="text" name="name" /></td>
                                                </tr>

                                                <tr>
                                                    <td><b><h6>Email<span style="color:red">*</span></h6></b></td>
                                                    <td> <input class="form-control" type="email" name="email" /></td>
                                                </tr>

                                                <tr>
                                                    <td><b><h6>Phone Number<span style="color:red">*</span></h6></b></td>
                                                    <td> <input class="form-control" type="text" name="phone" /></td>
                                                </tr>
                                                
                                                <?php
                                                include("connection.php");
                                                $sql1 = "SELECT `title` FROM `options` WHERE question_id = 1 ";
                                                $res1 = mysqli_query($conn,$sql1);
                                                    echo'<td><b><h6>Select range of your CET score<span style="color:red">*</span></h6></b></td>
                                                    <td> <select class="form-control" name="cet">
                                                         <option>(Select)</option>';
                                                         while($numrow1 =  mysqli_fetch_assoc($res1)){
                                                            echo "<option value='". $numrow1['title'] ."'>" .$numrow1['title'] ."</option>";
                                                         }
                                                        echo '
                                                     </select></td>
                                                </tr>
                                                <tr>';
                                                $sql2=  "SELECT `title` FROM `options` WHERE question_id = 2 ";
                                                $res2 = mysqli_query($conn,$sql2);
                                                   echo' <td><b><h6>How far do you stay from our Institute?<span style="color:red">*</span></h6></b></td>
                                                    <td> <select class="form-control" name="far">
                                                         <option>(Select)</option>';
                                                         while($numrow2 =  mysqli_fetch_assoc($res2)){
                                                            echo "<option value='". $numrow2['title'] ."'>" .$numrow2['title'] ."</option>";
                                                         }
                                                     echo' </select></td>
                                                </tr>
                                                <tr>'; 
                                                $sql3=  "SELECT `title` FROM `options` WHERE question_id = 3 ";
                                                $res3 = mysqli_query($conn,$sql3);
                                                   echo' <td><b><h6>Are your parent working?<span style="color:red">*</span></h6></b></td>
                                                    <td> <select class="form-control" name="parent">
                                                         <option>(Select)</option>';
                                                         while($numrow3 =  mysqli_fetch_assoc($res3)){
                                                            echo "<option value='". $numrow3['title'] ."'>" .$numrow3['title'] ."</option>";
                                                         }
                                                     echo'</select></td>
                                                </tr>
                                                <tr>'; 
                                                $sql4=  "SELECT `title` FROM `options` WHERE question_id = 4 ";
                                                $res4 = mysqli_query($conn,$sql4);
                                                
                                                    echo'<td><b><h6>From where you came to know about our Institute?(Reference)<span style="color:red">*</span></h6></b></td>
                                                    <td> <select class="form-control" name="reference">
                                                         <option>(Select)</option>';
                                                          while($numrow4 =  mysqli_fetch_assoc($res4)){
                                                            echo "<option value='". $numrow4['title'] ."'>" .$numrow4['title'] ."</option>";
                                                         }
                                                    echo' </select></td>
                                                </tr>

                                                <tr>';
                                                $sql5=  "SELECT `title` FROM `options` WHERE question_id = 5 ";
                                                $res5 = mysqli_query($conn,$sql5);
                                                    echo'<td><b><h6>Which Branch you would like to give as your 1st choice?<span style="color:red">*</span></h6></b></td>
                                                    <td> <select class="form-control" name="branch">
                                                         <option>(Select)</option>';
                                                         while($numrow5 =  mysqli_fetch_assoc($res5)){
                                                            echo "<option value='". $numrow5['title'] ."'>" .$numrow5['title'] ."</option>";
                                                         }
                                                         echo' </select></td>
                                                </tr>

                                                <tr>';
                                                $sql6=  "SELECT `title` FROM `options` WHERE question_id = 6 ";
                                                $res6 = mysqli_query($conn,$sql6);
                                                
                                                   echo' <td><b><h6>Do you required Hostel facility?<span style="color:red">*</span></h6></b></td>
                                                    <td> <select class="form-control" name="hostel">
                                                         <option>(Select)</option>';
                                                         while($numrow6 =  mysqli_fetch_assoc($res6)){
                                                            echo "<option value='". $numrow6['title'] ."'>" .$numrow6['title'] ."</option>";
                                                         }
                                                         echo'</select></td>
                                                </tr>

                                                <tr>';
                                                $sql7=  "SELECT `title` FROM `options` WHERE question_id = 7 ";
                                                $res7 = mysqli_query($conn,$sql7);

                                                  echo'  <td><b><h6>Is you Siblings studying in our Institute currently or previously?<span style="color:red">*</span></h6></b></td>
                                                    <td> <select class="form-control" name="sibling">
                                                         <option>(Select)</option>';
                                                         while($numrow7 =  mysqli_fetch_assoc($res7)){
                                                            echo "<option value='". $numrow7['title'] ."'>" .$numrow7['title'] ."</option>";
                                                         }
                                                          echo'</select></td>
                                                </tr>
                                                <tr>';
                                                $sql8=  "SELECT `title` FROM `options` WHERE question_id = 8 ";
                                                $res8 = mysqli_query($conn,$sql8);

                                                 echo'   <td><b><h6>Give you Preferences to join college type<span style="color:red">*</span></h6></b></td>
                                                    <td> <select class="form-control" name="priority">
                                                         <option>(Select)</option>';
                                                         while($numrow8 =  mysqli_fetch_assoc($res8)){
                                                            echo "<option value='". $numrow8['title'] ."'>" .$numrow8['title'] ."</option>";
                                                         }
                                                         echo'</select></td>
                                                </tr>

                                                <tr>';
                                                $sql9=  "SELECT `title` FROM `options` WHERE question_id = 9 ";
                                                $res9 = mysqli_query($conn,$sql9);
                                                   echo' <td><b><h6>Library facilities(with ranking 1 to 4)<span style="color:red">*</span></h6></b></td>
                                                    <td> <select class="form-control" name="library">
                                                         <option>(Select)</option>';
                                                         while($numrow9 =  mysqli_fetch_assoc($res9)){
                                                            echo "<option value='". $numrow9['title'] ."'>" .$numrow9['title'] ."</option>";
                                                         }
                                                         echo'</select></td>
                                                </tr>
                                                <tr>';
                                                $sql10=  "SELECT `title` FROM `options` WHERE question_id = 10";
                                                $res10 = mysqli_query($conn,$sql10);
                                                    echo'<td><b><h6>Good teaching(with ranking 1 to 4)<span style="color:red">*</span></h6></b></td>
                                                    <td> <select class="form-control" name="teaching">
                                                         <option>(Select)</option>';
                                                         while($numrow10 =  mysqli_fetch_assoc($res10)){
                                                            echo "<option value='". $numrow10['title'] ."'>" .$numrow10['title'] ."</option>";
                                                         }
                                                        echo' </select></td>
                                                </tr>
                                                <tr>';
                                                $sql11=  "SELECT `title` FROM `options` WHERE question_id = 11";
                                                $res11 = mysqli_query($conn,$sql11);
                                                   echo' <td><b><h6>Good infrastructure(with ranking 1 to 4)<span style="color:red">*</span></h6></b></td>
                                                    <td> <select class="form-control" name="infrastructure">
                                                         <option>(Select)</option>';
                                                         while($numrow11 =  mysqli_fetch_assoc($res11)){
                                                            echo "<option value='". $numrow11['title'] ."'>" .$numrow11['title'] ."</option>";
                                                         }
                                                        echo' </select></td>
                                                </tr>
                                                <tr>';
                                                $sql12=  "SELECT `title` FROM `options` WHERE question_id = 12";
                                                $res12 = mysqli_query($conn,$sql12);
                                                   echo' <td><b><h6>Lab Facilities(with ranking 1 to 4)<span style="color:red">*</span></h6></b></td>
                                                    <td> <select class="form-control" name="lab">
                                                         <option>(Select)</option>';
                                                         while($numrow12 =  mysqli_fetch_assoc($res12)){
                                                            echo "<option value='". $numrow12['title'] ."'>" .$numrow12['title'] ."</option>";
                                                         }
                                                        echo' </select></td>
                                                </tr>
                                                <tr>';
                                                $sql13=  "SELECT `title` FROM `options` WHERE question_id = 13";
                                                $res13 = mysqli_query($conn,$sql13);
                                                   echo' <td><b><h6>100% placement(with ranking 1 to 4)<span style="color:red">*</span></h6></b></td>
                                                    <td> <select class="form-control" name="placement">
                                                         <option>(Select)</option>>';
                                                         while($numrow13 =  mysqli_fetch_assoc($res13)){
                                                            echo "<option value='". $numrow13['title'] ."'>" .$numrow13['title'] ."</option>";
                                                         }
                                                        echo' </select></td>
                                                </tr>
                                                <tr>';
                                                $sql14=  "SELECT `title` FROM `options` WHERE question_id = 14";
                                                $res14 = mysqli_query($conn,$sql14);
                                                  echo'  <td><b><h6>Which appropriate mode of transport will you prefer to reach college ? <span style="color:red">*</span></h6></b></td>
                                                    <td> <select class="form-control" name="transport">
                                                         <option>(Select)</option>';
                                                         while($numrow14 =  mysqli_fetch_assoc($res14)){
                                                            echo "<option value='". $numrow14['title'] ."'>" .$numrow14['title'] ."</option>";
                                                         }
                                                         echo'</select></td>
                                                </tr>
                                                <tr>';
                                                $sql15=  "SELECT `title` FROM `options` WHERE question_id = 15";
                                                $res15 = mysqli_query($conn,$sql15);
                                                  echo'  <td><b><h6>Do you prefer any minority college?<span style="color:red">*</span></h6></b></td>
                                                    <td> <select class="form-control" name="minority">
                                                         <option>(Select)</option>';
                                                         while($numrow15 =  mysqli_fetch_assoc($res15)){
                                                            echo "<option value='". $numrow15['title'] ."'>" .$numrow15['title'] ."</option>";
                                                         }
                                                         echo'</select></td>
                                                </tr>
                                                <tr>';
                                                $sql16=  "SELECT `title` FROM `options` WHERE question_id = 16";
                                                $res16 = mysqli_query($conn,$sql16);
                                                  echo'  <td><b><h6>No of instructional days you will preferred<span style="color:red">*</span></h6></b></td>
                                                    <td> <select class="form-control" name="instructional">
                                                         <option>(Select)</option>';
                                                         while($numrow16 =  mysqli_fetch_assoc($res16)){
                                                            echo "<option value='". $numrow16['title'] ."'>" .$numrow16['title'] ."</option>";
                                                         }
                                                         echo'</select></td>
                                                </tr>
                                                <tr>';
                                                $sql17=  "SELECT `title` FROM `options` WHERE question_id = 17";
                                                $res17 = mysqli_query($conn,$sql17);
                                                   echo' <td><b><h6>Do you required any bank loan assistant?<span style="color:red">*</span></h6></b></td>
                                                    <td> <select class="form-control" name="bank_loan">
                                                         <option>(Select)</option>';
                                                         while($numrow17 =  mysqli_fetch_assoc($res17)){
                                                            echo "<option value='". $numrow17['title'] ."'>" .$numrow17['title'] ."</option>";
                                                         }
                                                        echo' </select></td>
                                                </tr>

                                                <tr>'; 
                                                ?>
                                                    <td><input type="reset" /></td>
                                                    <td style="text-align:right"><input type="submit" name="submit" value="Submit" /></td>

                                                </tr>

                                            </table>
                                        </center>
                                    </form>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2021</div>
                        <!-- <div>
                            <a href="#">Privacy Policy</a> &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div> -->
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>

<style>
    thead,
    tbody,
    tfoot,
    tr,
    td,
    th {
        padding: 10px;
    }
    
    .form-control {
        width: 300px;
    }
    
    input[type=submit],
    input[type=reset] {
        width: 200px;
        padding-top: 10px;
        padding-bottom: 10px;
        border: none;
        background-color: #0d6efd;
        border-radius: 5px;
        color: #ffffff;
    }
    
    input[type=submit] {
        background-color: #198754;
    }
</style>