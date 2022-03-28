<?php 
session_start();

	include("connection.php");
    include("functions.php");

	$user_data = check_login($conn);

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$question1 = $_POST['question1'];
		$question2 = $_POST['question2'];
        $question3 = $_POST['question3'];
        $question4 = $_POST['question4'];
        $question5 = $_POST['question5'];
        $question6 = $_POST['question6'];
        $question7 = $_POST['question7'];
        $question8 = $_POST['question8'];
        $question9 = $_POST['question9'];
        $question10 = $_POST['question10'];
        $question11 = $_POST['question11'];
        $question12 = $_POST['question12'];
        $question13 = $_POST['question13'];
        $question14 = $_POST['question14'];
        $question15 = $_POST['question15'];
        $question16 = $_POST['question16'];
        $question17 = $_POST['question17'];
        

		if(!empty($question1) && !empty($question2) && !empty($question3) && !empty($question4) && !empty($question5) && !empty($question6) && !empty($question7) 
        && !empty($question8) && !empty($question9) && !empty($question10) && !empty($question11) && !empty($question12) && !empty($question13) && !empty($question14)
        && !empty($question15) && !empty($question16) && !empty($question17) )
		{
            
           //save to database
			
            $que = "INSERT INTO questions (id, title, weight) VALUES (1, 'cet', '$question1'),(2,'far','$question2'),(3,'parent','$question3')
                    ,(4,'reference','$question4'),(5,'branch','$question5'),(6,'hostel','$question6'),(7,'sibling','$question7'),(8,'priority','$question8')
                    ,(9,'library','$question9'),(10,'teaching','$question10'),(11,'infrastructure','$question11'),(12,'lab','$question12'),(13,'placement','$question13')
                    ,(14,'transport','$question14'),(15,'minority','$question15'),(16,'instructional','$question16'),(17,'bank_loan','$question17')
                     ON DUPLICATE KEY UPDATE weight=VALUES(weight)";

			mysqli_query($conn, $que);

			header("Location: editquestionweight.php");
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
    <title>Dashboard - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="admindashboard.html">V-Predictor Admin</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Add space -->
        <span class="ms-auto"></span>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Navigation</div>
                        <a class="nav-link" href="admindashboard.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Edit Weights
                        </a>
                        <a class="nav-link" href="#">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Page 3
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <?php echo $user_data['name']; ?>
                    <?php echo $user_data['email']; ?>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Questions Weightage</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active"> Admin-Dashboard</li>
                    </ol>
                   
                    
                <div class="container">
                    <div class="row justify-content-left">
                        <div class="col-lg-8">
                            <br><br>
                            <div class="card border-0 rounded-lg" style="width: 100%;">
                                <div class="card-body">


                                    <form method="POST" name="frmQuery" onsubmit="return validate()">
                                        <center>
                                            <table class="tablemain">
                                                <tr>
                                                    <th> Questions</th>
                                                    <th> Weight</th>
                                                </tr>
                                                
                                                <?php
                                                include("connection.php");
                                                $sql1 = "SELECT `weight` FROM `questions` WHERE id = 1 ";
                                                $res1 = mysqli_query($conn,$sql1);
                                                    echo'<td><b><h6>Select range of your CET score<span style="color:red">*</span></h6></b></td>
                                                    <td> ';
                                                    while($numrow1 =  mysqli_fetch_assoc($res1)){
                                                        echo '<input type="text" name="question1" value='.$numrow1['weight'].' required/>';
                                                     }         
                                                        echo '
                                                     </td>
                                                </tr>
                                                <tr>';
                                                $sql2=  "SELECT `weight` FROM `questions` WHERE id = 2 ";
                                                $res2 = mysqli_query($conn,$sql2);
                                                   echo' <td><b><h6>How far do you stay from our Institute?<span style="color:red">*</span></h6></b></td>
                                                    <td>';
                                                         while($numrow2 =  mysqli_fetch_assoc($res2)){
                                                            echo '<input type="text" name="question2" value='.$numrow2['weight'].' required/>';
                                                         }
                                                     echo' </td>
                                                </tr>
                                                <tr>'; 
                                                $sql3=  "SELECT `weight` FROM `questions` WHERE id = 3 ";
                                                $res3 = mysqli_query($conn,$sql3);
                                                   echo' <td><b><h6>Are your parent working?<span style="color:red">*</span></h6></b></td>
                                                    <td> ';
                                                         while($numrow3 =  mysqli_fetch_assoc($res3)){
                                                            echo '<input type="text" name="question3" value='.$numrow3['weight'].' required/>';
                                                         }
                                                     echo'</td>
                                                </tr>
                                                <tr>'; 
                                                $sql4=  "SELECT `weight` FROM `questions` WHERE id = 4 ";
                                                $res4 = mysqli_query($conn,$sql4);
                                                
                                                    echo'<td><b><h6>From where you came to know about our Institute?(Reference)<span style="color:red">*</span></h6></b></td>
                                                    <td> ';
                                                          while($numrow4 =  mysqli_fetch_assoc($res4)){
                                                            echo '<input type="text" name="question4" value='.$numrow4['weight'].' required/>';
                                                         }
                                                    echo'</td>
                                                </tr>

                                                <tr>';
                                                $sql5=  "SELECT `weight` FROM `questions` WHERE id = 5 ";
                                                $res5 = mysqli_query($conn,$sql5);
                                                    echo'<td><b><h6>Which Branch you would like to give as your 1st choice?<span style="color:red">*</span></h6></b></td>
                                                    <td> ';
                                                         while($numrow5 =  mysqli_fetch_assoc($res5)){
                                                            echo '<input type="text" name="question5" value='.$numrow5['weight'].' required/>';
                                                         }
                                                         echo' </td>
                                                </tr>

                                                <tr>';
                                                $sql6=  "SELECT `weight` FROM `questions` WHERE id = 6 ";
                                                $res6 = mysqli_query($conn,$sql6);
                                                
                                                   echo' <td><b><h6>Do you required Hostel facility?<span style="color:red">*</span></h6></b></td>
                                                    <td> ';
                                                         while($numrow6 =  mysqli_fetch_assoc($res6)){
                                                            echo '<input type="text" name="question6" value='.$numrow6['weight'].' required/>';
                                                         }
                                                         echo'</td>
                                                </tr>

                                                <tr>';
                                                $sql7=  "SELECT `weight` FROM `questions` WHERE id = 7 ";
                                                $res7 = mysqli_query($conn,$sql7);

                                                  echo'  <td><b><h6>Is you Siblings studying in our Institute currently or previously?<span style="color:red">*</span></h6></b></td>
                                                    <td> ';
                                                         while($numrow7 =  mysqli_fetch_assoc($res7)){
                                                            echo '<input type="text" name="question7" value='.$numrow7['weight'].' required/>';
                                                         }
                                                          echo'</td>
                                                </tr>
                                                <tr>';
                                                $sql8=  "SELECT `weight` FROM `questions` WHERE id = 8 ";
                                                $res8 = mysqli_query($conn,$sql8);

                                                 echo'   <td><b><h6>Give you Preferences to join college type<span style="color:red">*</span></h6></b></td>
                                                    <td> ';
                                                         while($numrow8 =  mysqli_fetch_assoc($res8)){
                                                            echo '<input type="text" name="question8" value='.$numrow8['weight'].' required/>';
                                                         }
                                                         echo'</td>
                                                </tr>

                                                <tr>';
                                                $sql9=  "SELECT `weight` FROM `questions` WHERE id = 9 ";
                                                $res9 = mysqli_query($conn,$sql9);
                                                   echo' <td><b><h6>Library facilities(with ranking 1 to 4)<span style="color:red">*</span></h6></b></td>
                                                    <td> ';
                                                         while($numrow9 =  mysqli_fetch_assoc($res9)){
                                                            echo '<input type="text" name="question9" value='.$numrow9['weight'].' required/>';
                                                         }
                                                         echo'</td>
                                                </tr>
                                                <tr>';
                                                $sql10=  "SELECT `weight` FROM `questions` WHERE id = 10";
                                                $res10 = mysqli_query($conn,$sql10);
                                                    echo'<td><b><h6>Good teaching(with ranking 1 to 4)<span style="color:red">*</span></h6></b></td>
                                                    <td> ';
                                                         while($numrow10 =  mysqli_fetch_assoc($res10)){
                                                            echo '<input type="text" name="question10" value='.$numrow10['weight'].' required/>';
                                                         }
                                                        echo'</td>
                                                </tr>
                                                <tr>';
                                                $sql11=  "SELECT `weight` FROM `questions` WHERE id = 11";
                                                $res11 = mysqli_query($conn,$sql11);
                                                   echo' <td><b><h6>Good infrastructure(with ranking 1 to 4)<span style="color:red">*</span></h6></b></td>
                                                    <td> ';
                                                         while($numrow11 =  mysqli_fetch_assoc($res11)){
                                                            echo '<input type="text" name="question11" value='.$numrow11['weight'].' required/>';
                                                         }
                                                        echo' </td>
                                                </tr>
                                                <tr>';
                                                $sql12=  "SELECT `weight` FROM `questions` WHERE id = 12";
                                                $res12 = mysqli_query($conn,$sql12);
                                                   echo' <td><b><h6>Lab Facilities(with ranking 1 to 4)<span style="color:red">*</span></h6></b></td>
                                                    <td> ';
                                                         while($numrow12 =  mysqli_fetch_assoc($res12)){
                                                            echo '<input type="text" name="question12" value='.$numrow12['weight'].' required/>';
                                                         }
                                                        echo' </td>
                                                </tr>
                                                <tr>';
                                                $sql13=  "SELECT `weight` FROM `questions` WHERE id = 13";
                                                $res13 = mysqli_query($conn,$sql13);
                                                   echo' <td><b><h6>100% placement(with ranking 1 to 4)<span style="color:red">*</span></h6></b></td>
                                                    <td> ';
                                                         while($numrow13 =  mysqli_fetch_assoc($res13)){
                                                            echo '<input type="text" name="question13" value='.$numrow13['weight'].' required/>';
                                                         }
                                                        echo' </td>
                                                </tr>
                                                <tr>';
                                                $sql14=  "SELECT `weight` FROM `questions` WHERE id = 14";
                                                $res14 = mysqli_query($conn,$sql14);
                                                  echo'  <td><b><h6>Which appropriate mode of transport will you prefer to reach college ? <span style="color:red">*</span></h6></b></td>
                                                    <td> ';
                                                         while($numrow14 =  mysqli_fetch_assoc($res14)){
                                                            echo '<input type="text" name="question14" value='.$numrow14['weight'].' required/>';
                                                         }
                                                         echo'</td>
                                                </tr>
                                                <tr>';
                                                $sql15=  "SELECT `weight` FROM `questions` WHERE id = 15";
                                                $res15 = mysqli_query($conn,$sql15);
                                                  echo'  <td><b><h6>Do you prefer any minority college?<span style="color:red">*</span></h6></b></td>
                                                    <td> ';
                                                         while($numrow15 =  mysqli_fetch_assoc($res15)){
                                                            echo '<input type="text" name="question15" value='.$numrow15['weight'].' required/>';
                                                         }
                                                         echo'</td>
                                                </tr>
                                                <tr>';
                                                $sql16=  "SELECT `weight` FROM `questions` WHERE id = 16";
                                                $res16 = mysqli_query($conn,$sql16);
                                                  echo'  <td><b><h6>No of instructional days you will preferred<span style="color:red">*</span></h6></b></td>
                                                    <td>';
                                                         while($numrow16 =  mysqli_fetch_assoc($res16)){
                                                            echo '<input type="text" name="question16" value='.$numrow16['weight'].' required/>';
                                                         }
                                                         echo'</td>
                                                </tr>
                                                <tr>';
                                                $sql17=  "SELECT `weight` FROM `questions` WHERE id = 17";
                                                $res17 = mysqli_query($conn,$sql17);
                                                   echo' <td><b><h6>Do you required any bank loan assistant?<span style="color:red">*</span></h6></b></td>
                                                    <td> ';
                                                         while($numrow17 =  mysqli_fetch_assoc($res17)){
                                                            echo '<input type="text" name="question17" value='.$numrow17['weight'].' required/>';
                                                         }
                                                        echo'</td>
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
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2021</div>
                        <div>
                            <a href="#">Privacy Policy</a> &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
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