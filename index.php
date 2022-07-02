<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: user.php");
  }
?>

<?php include_once "header.php";?>
	<body>
		<div class="wrapper">
			<section class="form signup">
				<header>Realtime chat App</header>
				<form action="#" enctype="multipart/form-data">
					<div class="error-txt"></div>
					<div class="name-details">
						<div class="field input">
							<label>First Name</label>
							<input type="text" name="fName" placeholder="Enter First Name"required>
						</div>
						
						  <div class="field input">
							<label>Last Name</label>
							<input type="text" name="lName"placeholder="Enter Last Name"required>
						  </div>
						 </div>

						<div class="field input">
							<label>Email Address</label>
							<input type="text" name="email" placeholder="Enter your email"required>
						</div>
						<div class="field input">
							<label>Password</label>
							<input type="Password" name="password" placeholder="Enter new Password"required>
							<i class="fas fa-eye"></i>
						</div>
						<div class="field image">
							<label>select Image</label>
							<input type="file" name="image">
						</div>
						<div class="field button ">
							<input type="submit" value="Continue to chat">
						</div>
				</form>
				<div class="link">Already signedup?<a href="login.php">Login now</a></div>
			</section>


		</div>
	   <script src="javascript/pass-show-hide.js"></script>
	   <script src="javascript/signup.js"></script>
	</body> 
	</html>