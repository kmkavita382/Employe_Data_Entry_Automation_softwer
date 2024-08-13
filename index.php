
<?php

include ("connection.php");
?>


<?php
include ("connection.php");
error_reporting(0);
if (isset($_POST['searchdata'])){
	$search=$_POST['search'];
	$query="SELECT * from  empform  where id='$search'";
	$data=mysqli_query($conn,$query);
	$result=mysqli_fetch_assoc($data);
	//$name=$result['emp_name'];
	//echo $name;


}



?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Softwer Dovelopment</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="center">
		<form method="POST" action="#">
		<h1>Employee Data Entry Automation Software</h1>
		
		<div class="form">
			
			<input type="text" class="Employeetext" placeholder="Search" name="search" value="<?php if(isset($_POST['searchdata'])){
				echo $result['id'];
			} ?>">  
<input type="text" class="Employeetext" placeholder="Employee Name" name="name" value="<?php if(isset($_POST['searchdata'])){
				echo $result['emp_name'];
			} ?>"> 
			
<select class="Employeetext" name="gender">
	<option  value="Not selected">Select Gender</option>
	<option value="Male"

<?php if($result['emp_gender']== 'Male')
{ echo "selected";}

?>

	>Male</option>
	<option value="Femail" 
<?php if($result['emp_gender']== 'Femail')
{ echo "selected";}

?>

	>Femail</option>
	<option value="Other"
<?php if($result['emp_gender']== 'Other')
{ echo "selected";}

?>
	>Other</option>
</select>



			<input type="text" class="Employeetext" placeholder="Email Address" name="email" value="<?php if(isset($_POST['searchdata'])){
				echo $result['emp_email'];
			} ?>">
			



<select class="Employeetext" name="department">
	<option value="Not Selected">Select Department</option>
	<option value="IT" <?php if($result['emp_department']== 'IT')
{ echo "selected";}

?>>IT</option>
	<option value="HR"
	<?php if($result['emp_department']== 'HR')
{ echo "selected";}

?>>HR</option>
	<option value="Sales" <?php if($result['emp_department']== 'Sales')
{ echo "selected";}

?>>Sales</option>
	<option value="Marketing" <?php if($result['emp_department']== 'Marketing')
{ echo "selected";}

?>>Marketing</option>
	<option value="Business Developer" <?php if($result['emp_department']== 'Business Developer')
{ echo "selected";} ?>>Business Development</option>

</select>

<input type="text" class="Employeetextt" placeholder="Address" name="address"  value="<?php if(isset($_POST['searchdata'])){
				echo $result['emp_address'];
			} ?>">


<input type="submit" name="searchdata" value="Search" class="btn">

<input type="submit" value="Save"  name="save" class="btnn">

<input type="submit" name="Update" value="Modify" class="btnnn">

<input type="submit" value="Delete" class="btnnm" name="delete" onclick=" return checkdelete()">

<input type="reset" value="Clear" class="btnk" >



</div>
</div>
</form>
</body>
</html>

<?php



if (isset($_POST['save']))
{
	$emp_name=$_POST['name'];
	$gender = $_POST['gender'];
	$email= $_POST['email'];
	$department= $_POST['department'];
	$address= $_POST['address'];
	
	$query="INSERT INTO empform (emp_name, emp_gender, emp_email, emp_department, emp_address) VALUES ('$emp_name','$gender','$email','$department','$address')";

 $data=mysqli_query($conn,$query);
 
 if($data){

 	echo "<script> alert('insert data sucessfully')</script>";
 }else{
 	echo "<script> alert('data insert unsuccessfully')</script>";
 }}
?>

<script >
	
	function checkdelete()
	{
		return confirm('Are you sure want to delete this recode?')
	}
</script>

<?php
if(isset($_POST['delete']))
{
	$id=$_POST['search'];
	$query="DELETE From empform  where id='$id' ";
 $data=mysqli_query($conn,$query);
 if($data){
 	//echo "recode delete";
 }
 else{
 	echo "recode not deleted";
 }
}

?>

<?php



if (isset($_POST['update']))
{
	$id=$_POST['search'];
	$emp_name=$_POST['name'];
	$gender = $_POST['gender'];
	$email= $_POST['email'];
	$department= $_POST['department'];
	$address= $_POST['address'];
	
	$query=" UPDATE  empform  from emp_name='$emp_name', emp_gender='$gender', emp_email='$email', emp_department='$department', emp_address='$address' where id='$id' ";
 $data=mysqli_query($conn,$query);
 
 if($data){

 	echo "<script> alert('update data sucessfully')</script>";
 }else{
 	echo "<script> alert('Update data not unsuccessfully')</script>";
 }}
?>