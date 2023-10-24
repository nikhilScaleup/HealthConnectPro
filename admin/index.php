<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
    
    <title>Dashboard</title>
    <style>
        .dashbord-tables{
            animation: transitionIn-Y-over 0.5s;
        }
        .filter-container{
            animation: transitionIn-Y-bottom  0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
		

.topnav
		{
				 width:100%;
			overflow:hidden;
			background-color:#F77D24;
		}
		.topnav a{
		  float:left;
		  display:block;
		  color:#f2f2f2;
		  text-align:center;
		  padding:14px 16px;
		  text-decoration:none;
		  font-size:17px;
		}
		.topnav a:hover
		{
			  background-color:#ddd;
			  color:black;
		}
		.topnav a.active
		{
			background-color:#04AA6D;
		    color:white;
			
		}
		.topnav .icon-back{
		 display:none;
		}
		
		.footer
		{
			 position:fixed;
			 left:0;
			 bottom:0;
			 width:100%;
			 background-color:#04AA6D;
			 color:white;
			 text-align:center;
		}
		@media screen and(max-width:600px)
		{
			.topnav a:not(:first-child){
			 display:none;
			}
			.topnav a.icon{
				
				float:right;
				display:block;
			}
			
		}
		
		@media screen and(max-width:600px)
		{
			.topnav.responsive {position:relative;}
			.topnav.responsive .icon{
			  position:absolute;
			  right:0;
			  top:0;
			  
			}
			.topnav.responsive a{
			  float:none;
			  display:block;
			  text-align:left;
			 }
		}
		
		
		
    </style>
    
    
</head>
<body>
    <?php

 

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    

    //import database
    include("../connection.php");

    
    ?>
	<div class="topnav" id="myTopnav">
      <a href="index.php" class="active">Dashboard</a>
	  <a href="doctors.php">Doctors</a>
	  <a href="schedule.php" >Schedule</a>
	  <a href="appointment.php" >Appointment</a>
	  <a href="patient.php" >Patients</a>
	  <a href="javascript:void(0);" class="icon" onclick="myfunction();">
	   <i class="fa fa-bars"></i>
	    </a>
	  
	</div>
	
    <div class="container">
       
        <div class="dash-body" style="margin-top: 15px">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;" >
                        
                        <tr >
                            
                            <td colspan="2" class="nav-bar" >
                                
                                <form action="doctors.php" method="post" class="header-search">
        
                                    <input type="search" name="search" class="input-text header-searchbar" placeholder="Search Doctor name or Email" list="doctors">&nbsp;&nbsp;
                                    
                                    <?php
                                        echo '<datalist id="doctors">';
                                        $list11 = $database->query("select  docname,docemail from  doctor;");
        
                                        for ($y=0;$y<$list11->num_rows;$y++){
                                            $row00=$list11->fetch_assoc();
                                            $d=$row00["docname"];
                                            $c=$row00["docemail"];
                                            echo "<option value='$d'><br/>";
                                            echo "<option value='$c'><br/>";
                                        };
        
                                    echo ' </datalist>';
                                    ?>
                                    
                               
                                    <input type="Submit" value="Search" class="login-btn btn-primary-soft btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                                
                                </form>
                                
                            </td>
                            <td width="15%" >
                                Hi,Admin
                                    <?php 
                                date_default_timezone_set('America/New_York');
        
                                $today = date('Y-m-d');
                               // echo $today;


                                $patientrow = $database->query("select  * from  patient;");
                                $doctorrow = $database->query("select  * from  doctor;");
                                $appointmentrow = $database->query("select  * from  appointment where appodate>='$today';");
                                $schedulerow = $database->query("select  * from  schedule where scheduledate='$today';");


                                ?>
                              
                            </td>
                            <td width="10%">
							 <a  class="btn-label" href="../logout.php"  style="display: flex;justify-content: center;align-items: center;color:white;margin-right:5px">Logout</a>
                                
							</td>
        
        
                        </tr>
                <tr>
                    <td colspan="4">
                        
                        <center>
                        <table class="filter-container" style="border: none;" border="0">
                            <tr>
                                <td colspan="4">
                                    <p style="font-size: 20px;font-weight:600;padding-left: 12px;">Dashboard</p>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex">
                                        <div>
                                                <div class="h1-dashboard">
                                                    <?php    echo $doctorrow->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard" style="font-size: 15px">
                                                    Doctors &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/doctor_dash.svg');"></div>
                                    </div>
                                </td>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex;">
                                        <div>
                                                <div class="h1-dashboard">
                                                    <?php    echo $patientrow->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard" style="font-size: 15px">
                                                    Patients &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/patient_dash.svg');"></div>
                                    </div>
                                </td>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex; ">
                                        <div>
                                                <div class="h1-dashboard" >
                                                    <?php    echo $appointmentrow ->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard" style="font-size: 15px">
                                                    NewBooking &nbsp;&nbsp;
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="margin-left: 0px;background-image: url('../img/icons/book_dash.svg');"></div>
                                    </div>
                                </td>
                                <td style="width: 25%;">
                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex;padding-top:26px;padding-bottom:26px;">
                                        <div>
                                                <div class="h1-dashboard">
                                                    <?php    echo $schedulerow ->num_rows  ?>
                                                </div><br>
                                                <div class="h3-dashboard" style="font-size: 15px">
                                                    Sessions
                                                </div>
                                        </div>
                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/session_dash.svg');"></div>
                                    </div>
                                </td>
                                
                            </tr>
                        </table>
                    </center>
                    </td>
                </tr>





                        </table>
                        </center>
                        </td>
                </tr>
            </table>
        </div>
    </div>
	
	<div class="footer">
	 <p>&copy Copyright By HealthConnectPro.All Rights Reserved.</p>
	</div>

<script>
 function myfunction()
 {
	 var x=document.getElementById("myTopnav");
	 if(x.className === "topnav")
	 {
		  x.className+=" responsive";
	 }
	 else{
        x.className="topnav";
	 } 
		 
 }
</script>

</body>
</html>