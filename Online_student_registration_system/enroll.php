<?php
session_start();
include('includes/config.php');
if(strlen($_SESSION['login'])==0 or strlen($_SESSION['pcode'])==0)
    {
header('location:index.php');
}
else{

if(isset($_POST['submit']))
{
$studentregno=$_POST['studentregno'];
$pincode=$_POST['Pincode'];
$session=$_POST['session'];
$dept=$_POST['department'];
$level=$_POST['level'];
$course=$_POST['course'];
$sem=$_POST['sem'];
$ret=mysqli_query($bd, "insert into courseenrolls(studentRegno,pincode,session,department,level,course,semester) values('$studentregno','$pincode','$session','$dept','$level','$course','$sem')");
if($ret)
{
$_SESSION['msg']="Enroll Successfully !!";
}
else
{
  $_SESSION['msg']="Error : Not Enroll";
}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Course Enroll</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
<?php include('includes/header.php');?>
    <!-- LOGO HEADER END-->
<?php if($_SESSION['login']!="")
{
 include('includes/menubar.php');
}
 ?>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Course Enroll </h1>
                    </div>
                </div>
                <div class="row" >
                  <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                          Course Enroll
                        </div>
<font color="green" align="center"><?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?></font>
<?php $sql=mysqli_query($bd, "select * from students where StudentRegno='".$_SESSION['login']."'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{ ?>

                        <div class="panel-body">
                       <form name="dept" method="post" enctype="multipart/form-data">
   <div class="form-group">
    <label for="studentname">Student Name  </label>
    <input type="text" class="form-control" id="studentname" name="studentname" value="<?php echo htmlentities($row['studentName']);?>"  />
  </div>

 <div class="form-group">
    <label for="studentregno">Student Adm No :  </label>
    <input type="text" class="form-control" id="studentregno" name="studentregno" value="<?php echo htmlentities($row['StudentRegno']);?>"  placeholder="Student Reg no" readonly />

  </div>



<div class="form-group">
    <label for="Pincode">Pincode : </label>
    <input type="text" class="form-control" id="Pincode" name="Pincode" readonly value="<?php echo htmlentities($row['pincode']);?>" required />
  </div>

<div class="form-group">
    <label for="Pincode">Student Photo : </label>
   <?php if($row['studentPhoto']==""){ ?>
   <img src="studentphoto/noimage.png" width="200" height="200"><?php } else {?>
   <img src="studentphoto/<?php echo htmlentities($row['studentPhoto']);?>" width="200" height="200">
   <?php } ?>
  </div>
 <?php } ?>

 <div class="form-group">
     <label >Gender :  </label> <br>
     <input type="radio" name="gender" value="male"> Male
     <input type="radio" name="gender" value="female"> Female <br>
     <label>National ID/Passport No. :</label>
     <input type="number" > <br>
     <input type="file" name="kcpecert" >
   </div>

   <div class="form-group">
       <label >Faith:  </label>
       <select >
         <option value="Christ Beleiver">Christ Believer</option>
         <option value="Other">Any Other</option>
         <option value="need to be born again">Willing to be Born Again in Christ Jesus?</option>
       </select>
     </div>
   <div class="form-group">
       <label >Contact:  </label> <br>
       <input type="text" name="contacts" placeholder="+2547XXXXXXXX">
     </div>
     <div class="form-group">
         <label >Email Address :  </label> <br>
         <input type="text" name="parentname" placeholder="someone@domain.com">
       </div>
       <div class="form-group">
           <label >Home County:  </label>
           <select >
             <option value="Mombasa">Mombasa</option>
             <option value="Nairobi">Nairobi</option>
             <option value="Kwale">Kwale</option>
             <option value="Kilifi">Kilifi</option>
             <option value="Tana River">Tana River</option>
             <option value="Lamu">Lamu</option>
             <option value="Taita Taveta">Taita Taveta</option>
             <option value="Garissa">Garissa</option>
             <option value="Machakos">Machakos</option>
             <option value="Kitui">Kitui</option>
             <option value="Makueni">Makueni</option>
             <option value="Embu">Embu</option>
             <option value="Tharaka nithi">Tharaka-nithi</option>
             <option value="Meru">Meru</option>
             <option value="Nyeri">Nyeri</option>
             <option value="Laikipia">Laikipia</option>
             <option value="Kirinyaga">Kirinyaga</option>
             <option value="Kiambu">Kiambu</option>
             <option value="Nyandarua">Nyandarua</option>
             <option value="Muranga">Muranga</option>
             <option value="Nakuru">Nakuru</option>
             <option value="Uasin Gishu">Uasin Gishu</option>
             <option value="kericho">Kericho</option>
             <option value="nandi">Nandi</option>
             <option value="Bomet">Bomet</option>
             <option value="Baringo">Baringo</option>
             <option value="West Pokot">West Pokot</option>
             <option value="Elegeiyo">Elegeiyo Marakwet</option>
             <option value="Transnzoia">Transnzoia</option>
             <option value="Narok">Narok</option>
             <option value="kajiado">Kajiado</option>
             <option value="Bugoma">Bugoma</option>
             <option value="Vihiga">Vihiga</option>
             <option value="Busia">Busia</option>
             <option value="Kakamega">Kakamega</option>
             <option value="kisii">Kisii</option>
             <option value="Nyamira">Nyamira</option>
             <option value="Kisumu">Kisumu</option>
             <option value="Siaya">Siaya</option>
             <option value="Homabay">Homabay</option>
             <option value="Migori">Migori</option>
             <option value="Samburu">Samburu</option>
             <option value="Isiolo">Isiolo</option>
             <option value="mandera">Mandera</option>
             <option value="Wajir">Wajir</option>
             <option value="Marsabit">Marsabit</option>
             <option value="Turkana">Turkana</option>
           </select> <br>
<label>Sub-County :</label> &nbsp; &nbsp;&nbsp;&nbsp;<input type="text" placeholder="NakuruTown East" > &nbsp;&nbsp;&nbsp;&nbsp;
<label>Consitituency :</label> <input type="text" placeholder="Nakuru East"> <br>
<label>Ward :</label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" placeholder="Biashara ward">

         </div>
       <div class="form-group">
           <label >KCSE Mean Grade:  </label>
           <select >
             <option value="A">A</option>
             <option value="A-">A-</option>
             <option value="B+">B+</option>
             <option value="B">B</option>
             <option value="B-">B-</option>
             <option value="C+">C+</option>
             <option value="C">C</option>
             <option value="C-">C-</option>
             <option value="D+">D+</option>
             <option value="D">D</option>
             <option value="D-">D-</option>
             <label>Upload KSCE Certificate :</label>
             <input type="file" name="kcsecert" > <br>
             <label>KCPE Marks :</label>
             <input type="number" > <br>
             <input type="file" name="kcpecert" >
           </select>
         </div>
         <div class="form-group">
             <label >Hobby/Intrests : </label> <br>
             <textarea name="adress" rows="1" cols="80" placeholder="Your Co-curicular activities.."></textarea>
           </div>
 <div class="form-group">
     <label >Parent/Gurdian Name :  </label> <br>
     <input type="text" name="parentname" placeholder="Enter Parent/Gurdian Name">
   </div>
   <div class="form-group">
       <label >Parent/Gurdian Contacts :  </label> <br>
       <input type="text" name="parentname" placeholder="+2547XXXXXXXX">
     </div>
     <div class="form-group">
         <label >Address : </label> <br>
         <textarea name="adress" rows="1" cols="80" placeholder="Enter Your Home Address"></textarea>
       </div>


<div class="form-group">
    <label for="Session">Session : </label>
    <select class="form-control" name="session" required="required">
   <option value="">Select Session</option>
   <?php
$sql=mysqli_query($bd, "select * from session");
while($row=mysqli_fetch_array($sql))
{
?>
<option value="<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['session']);?></option>
<?php } ?>

    </select>
  </div>



<div class="form-group">
    <label for="Department">Department : </label>
    <select class="form-control" name="department" required="required">
   <option value="">Select Depertment</option>
   <?php
$sql=mysqli_query($bd, "select * from department");
while($row=mysqli_fetch_array($sql))
{
?>
<option value="<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['department']);?></option>
<?php } ?>

    </select>
  </div>


<div class="form-group">
    <label for="Level">Level : </label>
    <select class="form-control" name="level" required="required">
   <option value="">Select Level</option>
   <?php
$sql=mysqli_query($bd, "select * from level");
while($row=mysqli_fetch_array($sql))
{
?>
<option value="<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['level']);?></option>
<?php } ?>

    </select>
  </div>

<div class="form-group">
    <label for="Semester">Semester : </label>
    <select class="form-control" name="sem" required="required">
   <option value="">Select Semester</option>
   <?php
$sql=mysqli_query($bd, "select * from semester");
while($row=mysqli_fetch_array($sql))
{
?>
<option value="<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['semester']);?></option>
<?php } ?>

    </select>
  </div>


<div class="form-group">
    <label for="Course">Course : </label>
    <select class="form-control" name="course" id="course" onBlur="courseAvailability()" required="required">
   <option value="">Select Course</option>
   <?php
$sql=mysqli_query($bd ,"select * from course");
while($row=mysqli_fetch_array($sql))
{
?>
<option value="<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['courseName']);?></option>
<?php } ?>
    </select>
    <span id="course-availability-status1" style="font-size:12px;">
  </div>



 <button type="submit" name="submit" id="submit" class="btn btn-default">Enroll</button>
</form>
                            </div>
                            </div>
                    </div>

                </div>

            </div>





        </div>
    </div>
  <?php include('includes/footer.php');?>
    <script src="assets/js/jquery-1.11.1.js"></script>
    <script src="assets/js/bootstrap.js"></script>
<script>
function courseAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'cid='+$("#course").val(),
type: "POST",
success:function(data){
$("#course-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>


</body>
</html>
<?php } ?>
