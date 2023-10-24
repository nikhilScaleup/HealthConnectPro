<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  
    <link rel="stylesheet" href="../css/admin.css">
        
    <title>Patients</title>
    <style>
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
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
      <a href="index.php" >Dashboard</a>
	  <a href="doctors.php">Doctors</a>
	  <a href="schedule.php" >Schedule</a>
	  <a href="appointment.php" >Appointment</a>
	  <a href="patient.php" class="active" >Patients</a>
	  <a href="javascript:void(0);" class="icon" onclick="myfunction();">
	   <i class="fa fa-bars"></i>
	    </a>
	  
	</div>
    <div class="container">
      
        <div class="dash-body">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;margin-top:25px; ">
                <tr >
                   
                    <td colspan="2">
                        
                        <form action="" method="post" class="header-search">

                            <input type="search" name="search" class="input-text header-searchbar" placeholder="Search Patient name or Email" list="patient">&nbsp;&nbsp;
                            
                            <?php
                                echo '<datalist id="patient">';
                                $list11 = $database->query("select  pname,pemail from patient;");

                                for ($y=0;$y<$list11->num_rows;$y++){
                                    $row00=$list11->fetch_assoc();
                                    $d=$row00["pname"];
                                    $c=$row00["pemail"];
                                    echo "<option value='$d'><br/>";
                                    echo "<option value='$c'><br/>";
                                };

                            echo ' </datalist>';
?>
                            
                       
                            <input type="Submit" value="Search" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                        
                        </form>
                        
                    </td>
                    <td width="15%">
                        Hi,Admin
                              
                                    <?php 
                                date_default_timezone_set('America/New_York');

                        $date = date('Y-m-d');
                      
                        ?>
                      
                    </td>
                     <td width="10%">
							    <a  class="btn-label" href="../logout.php"  style="display: flex;justify-content: center;align-items: center;color:white;margin-right:5px">Logout</a>
                                
							</td>


                </tr>
               
                
                <tr>
                    <td colspan="4" style="padding-top:10px;">
                        <p class="heading-main12" style="margin-left: 45px;font-size:18px;color:rgb(49, 49, 49)">All Patients (<?php echo $list11->num_rows; ?>)</p>
                    </td>
                    
                </tr>
                <?php
                    if($_POST){
                        $keyword=$_POST["search"];
                        
                        $sqlmain= "select * from patient where pemail='$keyword' or pname='$keyword' or pname like '$keyword%' or pname like '%$keyword' or pname like '%$keyword%' ";
                    }else{
                        $sqlmain= "select * from patient order by pid desc";

                    }



                ?>
                  
                <tr>
                   <td colspan="4">
                       <center>
                        <div class="abc scroll">
                        <table width="93%" class="sub-table scrolldown"  style="border-spacing:0;">
                        <thead>
                        <tr>
                                <th class="table-headin" style="font-size:14px">
                                    
                                
                                Name
                                
                                </th>
                                <th class="table-headin" style="font-size:14px">
                                    
                                
                                    NIC
                                    
                                </th>
                                <th class="table-headin" style="font-size:14px">
                                
                            
                                Telephone
                                
                                </th>
                                <th class="table-headin" style="font-size:14px">
                                    Email
                                </th>
                                <th class="table-headin" style="font-size:14px">
                                    
                                    Date of Birth
                                    
                                </th>
                                <th class="table-headin" style="font-size:14px">
                                    
                                    Events
                                    
                                </tr>
                        </thead>
                        <tbody>
                        
                            <?php

                                
                                $result= $database->query($sqlmain);

                                if($result->num_rows==0){
                                    echo '<tr>
                                    <td colspan="4">
                                    <br><br><br><br>
                                    <center>
                                    <img src="../img/notfound.svg" width="25%">
                                    
                                    <br>
                                    <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">We  couldnt find anything related to your keywords !</p>
                                    <a class="non-style-link" href="patient.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Show all Patients &nbsp;</font></button>
                                    </a>
                                    </center>
                                    <br><br><br><br>
                                    </td>
                                    </tr>';
                                    
                                }
                                else{
                                for ( $x=0; $x<$result->num_rows;$x++){
                                    $row=$result->fetch_assoc();
                                    $pid=$row["pid"];
                                    $name=$row["pname"];
                                    $email=$row["pemail"];
                                    $nic=$row["pnic"];
                                    $dob=$row["pdob"];
                                    $tel=$row["ptel"];
                                    
                                    echo '<tr>
                                        <td style="text-align:center;font-size:12px;"> &nbsp;'.
                                        substr($name,0,35)
                                        .'</td>
                                        <td style="text-align:center;font-size:12px;">
                                        '.substr($nic,0,12).'
                                        </td>
                                        <td style="text-align:center;font-size:12px;">
                                            '.substr($tel,0,10).'
                                        </td>
                                        <td style="text-align:center;font-size:12px;">
                                        '.substr($email,0,20).'
                                         </td>
                                        <td style="text-align:center;font-size:12px;">
                                        '.substr($dob,0,10).'
                                        </td>
                                        <td style="text-align:center;font-size:12px;">
                                        <div style="display:flex;justify-content: center;">
                                        
                                        <a href="?action=view&id='.$pid.'" class="non-style-link"><button  class="btn-primary-soft btn button-icon btn-view"  style="padding:20px;padding-bottom: 12px;margin-top: 10px;"></button></a>
                                       
                                        </div>
                                        </td>
                                    </tr>';
                                    
                                }
                            }
                                 
                            ?>
 
                            </tbody>

                        </table>
                        </div>
                        </center>
                   </td> 
                </tr>
                       
                        
                        
            </table>
        </div>
    </div>
    <?php 
    if($_GET){
        
        $id=$_GET["id"];
        $action=$_GET["action"];
            $sqlmain= "select * from patient where pid='$id'";
            $result= $database->query($sqlmain);
            $row=$result->fetch_assoc();
            $name=$row["pname"];
            $email=$row["pemail"];
            $nic=$row["pnic"];
            $dob=$row["pdob"];
            $tele=$row["ptel"];
            $address=$row["paddress"];
            echo '
            <div id="popup1" class="overlay">
                    <div class="popup">
                    <center>
                        <a class="close" href="patient.php">&times;</a>
                        <div class="content">

                        </div>
                        <div style="display: flex;justify-content: center;">
                        <table width="80%" class="sub-table scrolldown add-doc-form-container" border="0">
                        
                            <tr>
                                <td>
                                    <p style="padding: 0;margin: 0;text-align: left;font-size: 18px;">View Details.</p><br><br>
                                </td>
                            </tr>
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">Patient ID: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2" style="font-size:12px">
                                    P-'.$id.'<br><br>
                                </td>
                                
                            </tr>
                            
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">Name: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2" style="font-size:12px">
                                    '.$name.'<br><br>
                                </td>
                                
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Email" class="form-label">Email: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2" style="font-size:12px">
                                '.$email.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="nic" class="form-label">NIC: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2" style="font-size:12px">
                                '.$nic.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="Tele" class="form-label">Telephone: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2" style="font-size:12px">
                                '.$tele.'<br><br>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2">
                                    <label for="spec" class="form-label">Address: </label>
                                    
                                </td>
                            </tr>
                            <tr>
                            <td class="label-td" colspan="2" style="font-size:12px">
                            '.$address.'<br><br>
                            </td>
                            </tr>
                            <tr>
                                
                                <td class="label-td" colspan="2">
                                    <label for="name" class="form-label">Date of Birth: </label>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-td" colspan="2" style="font-size:12px">
                                    '.$dob.'<br><br>
                                </td>
                                
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="patient.php"><input type="button" value="OK" class="login-btn btn-primary-soft btn" ></a>
                                
                                    
                                </td>
                
                            </tr>
                           

                        </table>
                        </div>
                    </center>
                    <br><br>
            </div>
            </div>
            ';
        
    };

?>
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