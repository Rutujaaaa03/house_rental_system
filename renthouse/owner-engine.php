<?php 
$owner_id='';
$full_name='';
$email='';
$password='';
$phone_no='';
$address='';
$id_type='';
$id_photo='';
$errors=array();
$db = new mysqli('localhost','root','root@2003','renthouse');

if($db->connect_error){
	echo "Error connecting database";
}

if(isset($_POST['owner_register'])){
	owner_register();
}

if(isset($_POST['owner_login'])){
	owner_login();
}

function owner_register(){
	global $owner_id,$full_name,$email,$password,$phone_no,$address,$id_type,$id_photo,$errors,$db;

	$full_name=validate($_POST['full_name']);
	$email=validate($_POST['email']);
	$password=validate($_POST['password']);
	$phone_no=validate($_POST['phone_no']);
	$address=validate($_POST['address']);
	$id_type=validate($_POST['id_type']);

	if(isset($_FILES['id_photo']) && !empty($_FILES['id_photo']['name'])) {
		$id_photo='owner-photo/'.$_FILES['id_photo']['name'];
		$path = "owner-photo/" . basename($_FILES['id_photo']['name']);
		if(move_uploaded_file($_FILES['id_photo']['tmp_name'], $path)) {
			echo "The file ". basename($_FILES['id_photo']['name']). " has been uploaded";
		} else {
			echo "There was an error uploading the file, please try again!";
		}
	}

	$password = md5($password); // Encrypt password
	$sql = "INSERT INTO owner(full_name,email,password,phone_no,address,id_type,id_photo) VALUES('$full_name','$email','$password','$phone_no','$address','$id_type','$id_photo')";
	if($db->query($sql) === TRUE) {
		header("location:owner-login.php");
	} else {
		echo "Error: " . $sql . "<br>" . $db->error;
	}
}

function owner_login(){
	global $email,$db;
	$email=validate($_POST['email']);
	$password=validate($_POST['password']);

	$password = md5($password); 
	$sql = "SELECT * FROM owner where email='$email' AND password='$password' LIMIT 1";
	$result = $db->query($sql);
	if($result->num_rows==1){
		$data = $result->fetch_assoc();
		$logged_user = $data['email'];
		session_start();
		$_SESSION['email']=$email;
		header('location:owner/owner-index.php');
	} else {
		// Display error message
	}
}

function validate($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
