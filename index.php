<?php session_start() ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>login system</title>
  <link rel="stylesheet" href="asset/css/style.css">

</head>
<body>
<!-- partial:index.partial.html -->
	<div class="form-structor">
		<div class="signup">
			<h2 class="form-title" id="signup"><span>or</span>Sign up</h2>
			<form action = "includes/signUp.php" method = "POST" class="form-holder">
				<input type="text" name="userName" class="input" required="required" placeholder="Name" />
				<input type="email" name="email" class="input" required="required" placeholder="Email" />
				<input type="password" name="password" class="input" required="required" placeholder="Password" />
				<button type="submit" name="submit" class="submit-btn">Sign up</button>
			</form>
			
		</div>
		<div class="login slide-up">
			<div class="center">
				<h2 class="form-title" id="login"><span>or</span>Log in</h2>
				<form action="includes/logIn.php" method="POST" class="form-holder">
					<input type="email" name="email" class="input" required="required" placeholder="Email" />
					<input type="password" name="password" class="input" required="required" placeholder="Password" />
					<button type="submit" name="submit" class="submit-btn" >Log in</button>
				</form>
				
			</div>
		</div>
	</div>
<!-- partial -->
	<script  src="asset/js/script.js"></script>

</body>
</html>
