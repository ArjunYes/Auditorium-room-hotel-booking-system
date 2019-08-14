


<style type="text/css">
	
.Error_msg{
    font-family: 'Abel', sans-serif,bold;
    font-size: 15px;
    color: red;

}
   

.in1{
   	margin-top: 2%; 
    outline: 0;
    background: #f2f2f2;
    font-family: 'Abel', sans-serif;
    width: 90%;
    border: 0;
    padding: 10px;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 3px;
    font-size: 14px;
    margin-left: 5%;

}

.container2{
	width: 23%; 
 ;
    left: 0%;
    right: 0%;
    margin-left: auto;
    margin-right: auto;
    border-radius: 10px;
    background: rgba(245, 245, 220, 0.32);
   
}


.btn1{
    background: #ff1919;
    width: 90%;
    border: 0;
    font-family: 'Abel', sans-serif,bold;
    font-size: 17px;
    color: #FFFFFF;
    padding: 13px;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 3px;
    margin-left: 5%;
    margin-top: 3%;
}

.btn1:hover{
	background: #6A1B9A;
	
}



.thumbnail{
	margin: auto;
    background: #E5E8E8;
    width: 150px;
    height: 150px;
    padding: 50px 30px;
    border-top-left-radius: 100%;
    border-top-right-radius: 100%;
    border-bottom-left-radius: 100%;
    border-bottom-right-radius: 100%;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    opacity: 0.9;
    background-image: url("css2/student.gif");
    background-size: 150px 150px;
}



</style>



<script type="text/javascript">
	
function validate(){

	var x = emp_regform.ph_num.value;
	plen = x.toString().length;

	var y = emp_regform.password1.value;
	passlen = y.toString().length;

	if(emp_regform.password1.value != emp_regform.password2.value){
		alert("Password dosnt match")
		return false;
	}

	else if(plen>10 || plen<=9){
		alert("Enter valid Phone number");
		return false;
	}

	else if(passlen<=6){
		alert("Password should be minimum 6 charectars");
		return false;
	}


}


</script>







<!DOCTYPE html>
<html>
<head>
	<title>NEW STAFF ADDING</title>
	<link rel="stylesheet"  href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Abel|Montserrat|Patua+One" rel="stylesheet">
</head>
<body>


	<?php 	
	include("connection.php");

	$sql = "select * from user_details ORDER by User_ID DESC LIMIT 1";
	$result = mysqli_query($conn,$sql);

	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_assoc($result)) {
			$last_user_id = $row['User_ID'];
		}

	}else{
		$last_user_id = 0;
	}

	?>

	

	<div class="container1">
		<center><h1 class="heading">USER REGISTRATION</h1></center>
		
		<div class="container2">
		
<br>		

<form name="emp_regform" action="" method="POST" onsubmit="return validate()">

	<input class="in1" type="text" name="f_name" placeholder="FIRST NAME" pattern="[a-zA-Z]{3,}" title="No nos in name" required=""><br>
	<input class="in1" type="text" name="l_name" placeholder="LAST NAME"  pattern2="[a-zA-Z]{1,}" title="No nos in name" required=""><br>
	<input class="in1" type="number" name="emp_id" placeholder="EMPLOYEE ID"  value="<?php echo $last_user_id+1 ?>" readonly ><br>
	<input class="in1" type="email" name="email_id" placeholder="EMAIL ID" required=""><br>
	<input class="in1" type="password" name="password1" placeholder="PASSWORD"  required=""><br>
	<input class="in1" type="password" name="password2" placeholder="RE ENTER PASSWORD" required=""><br>
	<input class="in1" type="text" name="ph_num" placeholder="PHONE NUMBER" required=""><br>
	<input class="btn1" type="submit" name="register" value="REGISTER"><br><br>

</form>



<?php



if(isset($_POST['register'])){
	$f_name = $_POST['f_name'];
	$l_name = $_POST['l_name'];
	$emp_id = $_POST['emp_id'];
	$password = $_POST['password1'];
	$ph_num = $_POST['ph_num'];
	$email = $_POST['email_id'];




	$sql = "insert into user_details (First_name,Last_name,Password,Phone_number,User_ID,Email_id) values('$f_name','$l_name','$password','$ph_num','$emp_id','$email')";

	if(mysqli_query($conn,$sql)){
			echo "RECORD INSERTED";
			$message = "successfully added staff";
			echo "<script> alert('$message'); window.location.href = 'index.php' </script>";
			
		}else{
			echo "Error inserting";
		}





}




?>



	</div>
	</div>






</body>
</html>



			











