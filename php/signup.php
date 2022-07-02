<?php
session_start();
include_once"config.php";
$fName = mysqli_real_escape_string($conn,$_POST['fName']);
$lName = mysqli_real_escape_string($conn,$_POST['lName']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$password = mysqli_real_escape_string($conn,$_POST['password']);

if(!empty($fName) && !empty($lName) && !empty($email) && !empty($password)){
	if(filter_var($email,FILTER_VALIDATE_EMAIL)){
		$sql = mysqli_query($conn,"SELECT email FROM users WHERE email = '{$email}'");
		if(mysqli_num_rows($sql) > 0){
			echo "$email - This email already exist !";

		}

	}else
	{
		echo "$email - this is a not valid email!";
	}
	if(isset($_FILES['image'])){
		$img_name = $_FILES['image']['name'];
		$tmp_name = $_FILES['image']['tmp_name'];
		$img_explode = explode('.', $img_name);
		$img_ext = end($img_explode);
		$extention = ['png','jpeg','jpg'];
		if(in_array($img_ext, $extention) === true){

			$time = time();
			$new_img_name = $time.$img_name;
			if(move_uploaded_file($tmp_name, "images/".$new_img_name)){

				$status = "Active Now";
				$random_id = rand(time(),10000000);
				//inserting data of user

				$sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status) VALUES({$random_id},'{$fName}','{$lName}','{$email}','{$password}','{$new_img_name}','{$status}')");
				if($sql2){
					$sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
					if(mysqli_num_rows($sql3) > 0){
						$row = mysqli_fetch_assoc($sql3);
						$_SESSION['unique_id'] = $row['unique_id'];
						echo "success";
					}
				}else{
					echo "Something went wrong !";
				}
			}
			
		}else{
			echo "please select an Image file - jpeg, jpg, png!";

		}

	}else{
		echo "please select an Image file!";

	}

}else
{
	echo"All input field are required";
}

?>