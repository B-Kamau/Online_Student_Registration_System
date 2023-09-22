<?php
include("includes/config.php");
error_reporting(0);
?>
<?php if($_SESSION['login']!="")
{?>
<header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <strong>Welcome: </strong><?php echo htmlentities($_SESSION['sname']);?>
                    &nbsp;&nbsp;



                    <strong>Last Login:<?php
        $ret=mysqli_query($bd, "SELECT  * from userlog where studentRegno='".$_SESSION['login']."' order by id desc limit 1,1");
                    $row=mysqli_fetch_array($ret);
                    echo $row['userip']; ?> at <?php echo $row['loginTime'];?></strong>
                </div>

            </div>
        </div>
    </header>
    <?php } ?>


    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
          <center>
               <img src="logo.png" alt="OSRS" id="logo" height="auto">

              <p style="font-weight: 100;font-style: bold;font-size: 35px;font-family: serif;color: darkblue;text-align: center;"> ONLINE STUDENT REGISTRATION SYSTEM (OSRS)</p>


    </center>


            </div>
        </div>
