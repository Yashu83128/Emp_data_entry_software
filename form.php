<?php
include("connection.php");
error_reporting(0);
?>
<?php
if(isset($_POST['searchdata']))   // Searchdata Button Ka name h
{
    $search=$_POST['search'];     // aur ye input ka name h 
    $query="SELECT *FROM emp_details WHERE id='$search' "; 
    $data=mysqli_query($conn,$query);
    $result=mysqli_fetch_assoc($data);

    // $name= $result['name'];
    // echo $name;
 }
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software Development </title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="center">
        <form action="#" method="POST">
            <h1>Employee Data Entry Automation Software</h1>
            <div class="form">

                <input type="text" name="search" class="textfield" Placeholder="Search ID"
                    value="<?php if(isset($_POST['searchdata'])){  echo $result['id'];} ?>">

                <input type="text" name="emp_name" class="textfield" Placeholder="Employee Name"
                    value="<?php if(isset($_POST['searchdata'])){  echo $result['name'];} ?>">
                <select class="textfield" name="gender">
                    <option value="Not Selected">Select Gender </option>
                    <option value="Male" <?php if($result['gender']=='Male' ){ echo "selected" ;} ?> >Male </option>
                    <option value="Female" <?php if($result['gender']=='Female' ){echo "selected" ; } ?> >Female </option>
                </select>
                <input type="email" name="email" class="textfield" Placeholder="Email Address"
                    value="<?php if(isset($_POST['searchdata'])){  echo $result['email'];} ?>">
                <select class="textfield" name="department">
                    <option value="Select Department">Select Department</option>
                    <option value="IT" <?php if($result['department']=='IT' ){ echo "selected" ; }?> > IT</option>
                    <option value="HR" <?php if($result['department']=='HR' ){ echo "selected" ; } ?>
                        >HR</option>
                    <option value="Accounts" <?php if($result['department']=='Accounts' ){ echo "selected" ; } ?>
                        >Accounts</option>
                    <option value="Sales" <?php if($result['department']=='Sales' ){ echo "selected" ; } ?>>Sales
                    </option>
                    <option value="Marketing" <?php if($result['department']=='Marketing' ){ echo "selected" ; } ?>
                        >Marketing</option>
                    <option value="Buisness Development" <?php if($result['department']=='Buisness Development' ){
                        echo "selected" ; } ?>
                        >Buisness Development</option>
                </select>
                <textarea placeholder="Address" name="address"><?php if(isset($_POST['searchdata'])){  echo $result['address'];} ?></textarea>
                <input type="submit" value="Search" name="searchdata" class="btn" style="background-color:grey;">
                <input type="submit" value="Save" name="save" class="btn" style="background-color:green;">
                <input type="submit" value="Update" name="update" class="btn" style="background-color:orange;">
                <input type="submit" value="Delete" name="delete" class="btn" style="background-color:red;"
                    onclick="return checkdelete()">
                <input type="reset" value="Clear" name="clear" class="btn" style="background-color:blue;">

            </div>
        </form>
    </div>
</body>

</html>
<script>
    function checkdelete() {
        return confirm('are You sure You wan to delete this Record ');
    }
</script>
<?php
if(isset($_POST['save'])){
    $id            =$_POST['search'];
    $name          =$_POST['emp_name'];
    $gender        =$_POST['gender'];
    $email         =$_POST['email'];
    $department    =$_POST['department'];
    $address       =$_POST['address'];
    $query="INSERT INTO emp_details VALUES('$id','$name','$gender','$email','$department','$address')";
    $data=mysqli_query($conn,$query);
    if($data){
        echo "<script>alert('Data saved into Database')</script>";
    }else{
        echo "<script>alert('failed')</script>";
    }
}
?>
<?php
if(isset($_POST['delete'])){
    $id=$_POST['search'];
    $query="delete from emp_details where id='$id'";
    $data=mysqli_query($conn,$query);
    if($data){
        echo "<script>alert('Record Deleted')</script>";
    }else{
        echo "Failed To deleted";
    }
}
?>
<?php
if(isset($_POST['update'])){
    $id            =$_POST['search'];
    $name          =$_POST['emp_name'];
    $gender        =$_POST['gender'];
    $email         =$_POST['email'];
    $department    =$_POST['department'];
    $address       =$_POST['address'];
    $query="UPDATE `emp_details` set `name`='$name',`gender`='$gender',`email`='$email',`department`='$department',`address`='$address' where id='$id' ";
    $data=mysqli_query($conn,$query);
    if($data){
    echo "<script>alert('updation success')</script>";
   }else{
    echo "Data not saved";
}
}
?>