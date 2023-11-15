<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/signup.css">
        
    <title>Sign Up</title>
    
</head>
<body>
<?php

//learn from w3schools.com
//Unset all the server side variables

session_start();

$_SESSION["user"]="";
$_SESSION["usertype"]="";

// Set the new timezone
date_default_timezone_set('Asia/Kolkata');
$date = date('Y-m-d');

$_SESSION["date"]=$date;



if($_POST){

    

    $_SESSION["personal"]=array(
        'fname'=>$_POST['fname'],
        'lname'=>$_POST['lname'],
        'address'=>$_POST['address'],
        'nic'=>$_POST['nic'],
        'dob'=>$_POST['dob'],
		'city'=>$_POST['city'],
		'state'=>$_POST['state'],
		'zipcode'=>$_POST['zipcode'],
		'company'=>$_POST['company']
    );


    print_r($_SESSION["personal"]);
    header("location: create-account.php");




}

?>


    <center>
    <div class="container">
        <table border="0">
            <tr>
                <td colspan="2">
				
                    <p class="header-text">Let's Get Started</p>
					
                    <p class="sub-text">Add Your Personal Details to Continue</p>
                </td>
            </tr>
            <tr>
                <form action="" method="POST" >
                <td class="label-td" colspan="2">
                    <label for="name" class="form-label">Name: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td">
                    <input type="text" name="fname" class="input-text" placeholder="First Name" required>
                </td>
                <td class="label-td">
                    <input type="text" name="lname" class="input-text" placeholder="Last Name" required>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <label for="address" class="form-label">Address: </label>
                </td>
            </tr>
			
            <tr>
                <td class="label-td" colspan="2">
                    <input type="text" name="address" class="input-text" placeholder="Address" required>
                </td>
            </tr>
			 <tr>
                <td class="label-td" colspan="2">
                    <label for="city" class="form-label">City: </label>
                </td>
            </tr>
			 <tr>
                <td class="label-td" colspan="2">
                    <input type="text" name="city" class="input-text" placeholder="City" required>
                </td>
            </tr>
			 <tr>
                <td class="label-td" colspan="2">
                    <label for="state" class="form-label">State: </label>
                </td>
            </tr>
			 <tr>
                <td class="label-td" colspan="2">
                    <input type="text" name="state" class="input-text" placeholder="State" required>
                </td>
            </tr>
				 <tr>
                <td class="label-td" colspan="2">
                    <label for="zipcode" class="form-label">Zip Code: </label>
                </td>
            </tr>
			 <tr>
                <td class="label-td" colspan="2">
                    <input type="number" name="zipcode" class="input-text" placeholder="zipcode" required>
                </td>
            </tr>
            
            <tr>
                <td class="label-td" colspan="2">
                    <label for="dob" class="form-label">Date of Birth: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="date" name="dob" class="input-text" required>
                </td>
            </tr>
			 <tr>
                <td class="label-td" colspan="2">
                    <label for="company" class="form-label">Insurance Company: </label>
                </td>
            </tr>
			 <tr>
                <td class="label-td" colspan="2">
                    <input type="text" name="company" class="input-text" placeholder="Insurance Company" required>
                </td>
            </tr>
			<tr>
                <td class="label-td" colspan="2">
                    <label for="nic" class="form-label">Policy Number: </label>
                </td>
            </tr>
            <tr>
                <td class="label-td" colspan="2">
                    <input type="text" name="nic" class="input-text" placeholder="Policy Number:" required>
                </td>
            </tr>
			
			
            <tr>
                <td class="label-td" colspan="2">
                </td>
            </tr>

            <tr>
                <td>
                    <input type="reset" value="Reset" class="login-btn btn-primary-soft btn" >
                </td>
                <td>
                    <input type="submit" value="Next" class="login-btn btn-primary btn">
                </td>

            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    <label for="" class="sub-text" style="font-weight: 280;">Already have an account&#63; </label>
                    <a href="login.php" class="hover-link1 non-style-link" style="color:#F77D24">Login</a>
                    <br><br><br>
                </td>
            </tr>

                    </form>
            </tr>
        </table>

    </div>
</center>
</body>
</html>