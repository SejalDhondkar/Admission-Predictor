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
        $cet = $_POST['cet'];
        $far = $_POST['far'];
        $parent = $_POST['parent'];
        $reference = $_POST['reference'];
        $branch = $_POST['branch'];
        $hostel = $_POST['hostel'];
        $sibling = $_POST['sibling'];
        $priority = $_POST['priority'];
        $library = $_POST['library'];
        $teaching = $_POST['teaching'];
        $infrastructure = $_POST['infrastructure'];
        $lab = $_POST['lab'];
        $placement = $_POST['placement'];
        $transport = $_POST['transport'];
        $minority = $_POST['minority'];
        $instructional = $_POST['instructional'];
        $bank_loan = $_POST['bank_loan'];

		if(!empty($name) && !empty($email) && !empty($phone))
		{

			//save to database
			$query = "insert into student_enquiry (name,email,phone,cet,far,parent,reference, branch, hostel, sibling, priority, library, teaching, infrastructure, lab, placement, transport, minority, instructional, bank_loan) 
            values ('$name','$email','$phone', '$cet','$far','$parent','$reference','$branch','$hostel','$sibling','$priority','$library','$teaching','$infrastructure','$lab','$placement','$transport','$minority','$instructional','$bank_loan')";

			mysqli_query($conn, $query);

			header("Location: studentform.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
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
                                                <tr>
                                                    <td><b><h6>Select range of your CET score<span style="color:red">*</span></h6></b></td>
                                                    <td> <select class="form-control" name="cet">
                                                         <option>(Select)</option>
                                                         <option>Above 80%</option>
                                                        <option>Above70% & 60%</option>
                                                        <option>Below 60%</option>
                                                     </select></td>
                                                </tr>
                                                <tr>
                                                    <td><b><h6>How far do you stay from our Institute?<span style="color:red">*</span></h5></b></td>
                                                    <td> <select class="form-control" name="far">
                                                         <option>(Select)</option>
                                                         <option>Within 10Km</option>
                                                        <option>Within 30Km</option>
                                                        <option>50Km and above</option>
                                                     </select></td>
                                                </tr>
                                                <tr>
                                                    <td><b><h6>Are your parent working?<span style="color:red">*</span></h5></b></td>
                                                    <td> <select class="form-control" name="parent">
                                                         <option>(Select)</option>
                                                         <option>Both</option>
                                                        <option>Only  father</option>
                                                        <option>Only mother</option>
                                                     </select></td>
                                                </tr>
                                                <tr>
                                                    <td><b><h6>From where you came to know about our Institute?(Reference)<span style="color:red">*</span></h5></b></td>
                                                    <td> <select class="form-control" name="reference">
                                                         <option>(Select)</option>
                                                         <option>Family OR frds OR relatives members</option>
                                                        <option>College Adverties</option>
                                                        <option>News Papers</option>
                                                     </select></td>
                                                </tr>

                                                <tr>
                                                    <td><b><h6>Which Branch you would like to give as your 1st choice?<span style="color:red">*</span></h5></b></td>
                                                    <td> <select class="form-control" name="branch">
                                                         <option>(Select)</option>
                                                         <option>Biomedical Engineering </option>
                                                         <option>Computer Engineering</option>
                                                         <option>Electronics Engineering</option>
                                                         <option>Electronics & Telecommunication Engineering</option>
                                                         <option>Information Technology Engineering</option>
                                                          <option>Mechanical Engineering</option>
                                                           <option>Civil Engineering</option>
                                                            <option>Textile Engineering</option>
                                                          </select></td>
                                                </tr>

                                                <tr>
                                                    <td><b><h6>Do you required Hostel facility?<span style="color:red">*</span></h5></b></td>
                                                    <td> <select class="form-control" name="hostel">
                                                         <option>(Select)</option>
                                                         <option>Yes</option>
                                                         <option>No</option>
                                                         </select></td>
                                                </tr>

                                                <tr>
                                                    <td><b><h6>Is you Siblings studying in our Institute currently or previously?<span style="color:red">*</span></h5></b></td>
                                                    <td> <select class="form-control" name="sibling">
                                                         <option>(Select)</option>
                                                         <option>Yes</option>
                                                         <option>No</option>
                                                         </select></td>
                                                </tr>
                                                <tr>
                                                    <td><b><h6>Give you Preferences to join college type<span style="color:red">*</span></h5></b></td>
                                                    <td> <select class="form-control" name="priority">
                                                         <option>(Select)</option>
                                                         <option>A+ Grade</option>
                                                         <option>A++ Grade</option>
                                                         <option>Govt Aided</option>
                                                         <option>Govt Unaided</option>
                                                         <option>NBA Accredited</option>
                                                         </select></td>
                                                </tr>

                                                <tr>
                                                    <td><b><h6>Library facilities(with ranking 1 to 4)<span style="color:red">*</span></h5></b></td>
                                                    <td> <select class="form-control" name="library">
                                                         <option>(Select)</option>
                                                         <option>1</option>
                                                         <option>2</option>
                                                         <option>3</option>
                                                         <option>4</option>
                                                         </select></td>
                                                </tr>
                                                <tr>
                                                    <td><b><h6>Good teaching(with ranking 1 to 4)<span style="color:red">*</span></h5></b></td>
                                                    <td> <select class="form-control" name="teaching">
                                                         <option>(Select)</option>
                                                         <option>1</option>
                                                         <option>2</option>
                                                         <option>3</option>
                                                         <option>4</option>
                                                         </select></td>
                                                </tr>
                                                <tr>
                                                    <td><b><h6>Good infrastructure(with ranking 1 to 4)<span style="color:red">*</span></h5></b></td>
                                                    <td> <select class="form-control" name="infrastructure">
                                                         <option>(Select)</option>
                                                         <option>1</option>
                                                         <option>2</option>
                                                         <option>3</option>
                                                         <option>4</option>
                                                         </select></td>
                                                </tr>
                                                <tr>
                                                    <td><b><h6>Lab Facilities(with ranking 1 to 4)<span style="color:red">*</span></h5></b></td>
                                                    <td> <select class="form-control" name="lab">
                                                         <option>(Select)</option>
                                                         <option>1</option>
                                                         <option>2</option>
                                                         <option>3</option>
                                                         <option>4</option>
                                                         </select></td>
                                                </tr>
                                                <tr>
                                                    <td><b><h6>100% placement(with ranking 1 to 4)<span style="color:red">*</span></h5></b></td>
                                                    <td> <select class="form-control" name="placement">
                                                         <option>(Select)</option>
                                                         <option>1</option>
                                                         <option>2</option>
                                                         <option>3</option>
                                                         <option>4</option>
                                                         </select></td>
                                                </tr>
                                                <tr>
                                                    <td><b><h6>Which appropriate mode of transport will you prefer to reach college ? <span style="color:red">*</span></h5></b></td>
                                                    <td> <select class="form-control" name="transport">
                                                         <option>(Select)</option>
                                                         <option>Through all lines</option>
                                                         <option>Only central</option>
                                                         <option>Only Western</option>
                                                         <option>Only Harbour</option>
                                                         <option>Bus</option>
                                                         </select></td>
                                                </tr>
                                                <tr>
                                                    <td><b><h6>Do you prefer any minority college?<span style="color:red">*</span></h5></b></td>
                                                    <td> <select class="form-control" name="minority">
                                                         <option>(Select)</option>
                                                         <option>Yes</option>
                                                         <option>No</option>
                                                         </select></td>
                                                </tr>
                                                <tr>
                                                    <td><b><h6>No of instructional days you will preferred<span style="color:red">*</span></h5></b></td>
                                                    <td> <select class="form-control" name="instructional">
                                                         <option>(Select)</option>
                                                         <option>5 days/week</option>
                                                         <option>6 days/week</option>
                                                         </select></td>
                                                </tr>
                                                <tr>
                                                    <td><b><h6>Do you required any bank loan assistant?<span style="color:red">*</span></h5></b></td>
                                                    <td> <select class="form-control" name="bank_loan">
                                                         <option>(Select)</option>
                                                         <option>Yes</option>
                                                         <option>No</option>
                                                         </select></td>
                                                </tr>

                                                <tr>
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