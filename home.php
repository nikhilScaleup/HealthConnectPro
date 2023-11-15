<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/animations.css">  
    <link rel="stylesheet" href="css/main.css">  
    <link rel="stylesheet" href="css/index.css">
    <title>eDoc</title>
    <style>
        table {
            animation: transitionIn-Y-bottom 0.5s;
        }
        .footer {
            text-align: center;
            /* background-color: #f0f0f0; */
            background-color: var(--primarycolor) ;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
            height:10%
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #fff ;
        }

        .footer-left {
            flex: 1;
            text-align: left;
            padding-left: 20px;
        }

        .footer-right {
            flex: 1;
            text-align: right;
            padding-right: 20px;
        }
    </style>
</head>
<body>
    <div class="full-height">
        <center>
        <table border="0">
            <tr>
                <td width="80%">
                    <font class="edoc-logo">HealthConnectPro. </font>
                    <font class="edoc-logo-sub">| The path To Wellness</font>
                </td>
                <td width="10%">
                   <a href=""  class="non-style-link"><p class="nav-item">LOGIN</p></a>
                </td>
                <td  width="10%">
                    <a href="" class="non-style-link"><p class="nav-item" style="padding-right: 10px;">SIGN UP</p></a>
                </td>
            </tr>
            
            <tr>
                <td  colspan="3">
                    <p class="heading-text">Your Portal to Healthy Life !</p>

                </td>
            </tr>
            <tr>
                <td  colspan="3">
                    <p class="sub-text2">With HealthConnectPro Patient Portal, your path to Wellness just got simpler. 
                        <br>We manage your wellness in one convenient place, make your appointment now<br>
                    </p>
                </td>
            </tr>
            <tr>
                
            <td colspan="3">
    <center>
        <a href="">
            <input type="button" value="Make Appointment" class="login-btn btn-primary btn" style="padding-left: 25px; padding-right: 25px; padding-top: 10px; padding-bottom: 10px;">
        </a>
        <a href="">
            <input type="button" value="Pay Bill As Guest " class="login-btn btn-primary btn" style="padding-left: 25px; padding-right: 25px; padding-top: 10px; padding-bottom: 10px;">
        </a>
    </center>
</td>
                
            </tr>
            <tr>
                <td colspan="3">
                   
                </td>
            </tr>
        </table>

        
        <!-- <p class="sub-text2 footer-hashen">A Web Solution by CS691 Patient Portal Project Team Fall.</p>     -->
        <div class="footer">
            <div class="footer-content">
                <div class="footer-left">
                    Its Empty Without here, Advertise here !
                </div>
                <div class="footer-right">
                    A Web Solution by CS691 Patient Portal Project Team Fall.
                </div>
            </div>
        </div>
    </center>
    
    </div>
</body>
</html>
