<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>

	<?php
		
	?>
</head>

<style>
	body
	{
		margin: 0;
		padding: 0;
		background: #151519;
		background-size: cover;
		background-position: center;
		font-family: sans-serif;
	}
	.loginBox
	{
		width: 320px;
		height: 300px;
		background: rgba(0,0,0,0.5);
		color: #C0C0C0;
		top: 50%;
		left: 50%;
		border-top: 4px solid #FF6600;
		position: absolute;
		transform: translate(-50%,-50%);
		box-sizing: border-box;
		padding: 50px 40px;
	}
	.tag
	{
		width: 200px;
		height: 40px;
		background-color: #FF6600;
		color: #151519;
		position: absolute;
		top: -10%;
		left: 20%;
	}
	.tag p
	{
		margin: 5%;
		padding: 0;
		text-align: center;
		font-size: 20px;
	}
	h1
	{
		margin: 0;
		padding: 0 0 20px;
		text-align: center;
		font-size: 22px;
	}
	.loginBox p
	{
		margin: 0;
		padding: 6px;
		font-weight: bold;
	}
	.loginBox input
	{
		width: 100%;
		margin-bottom: 20px;
	}
	.loginBox input[type="text"], input[type="password"]
	{
		border: none;
		border-bottom: 1px solid #fff;
		background: transparent;
		outline: none;
		height: 40px;
		color: #fff;
		font-size: 16px;
	}
	.loginBox input[type="submit"]
	{
		border: none;
		outline: none;
		height: 40px;
		background: transparent;
		border: 1px solid #FF6600;
		color: #fff;
		font-size: 18px;
	}
	.loginBox input[type="text"]:focus,
	.loginBox input[type="password"]:focus
	{
		color: #dd4b39;
		border-bottom: 3px solid #ff5722;
	}
	.loginBox input[type="submit"]:hover
	{
		cursor: pointer;
		background: #FF6600;
		color: #C0C0C0;
	}
</style>
<body>
	<div class="loginBox">
		<div class="tag">
			<p>Admin Login</p>
		</div>

		<form method="POST" action="/adminpage.php">
			<p>Username</p>
			<input type="text" name="username" placeholder="Enter Username" required>
			<p>Password</p>
			<input type="password" name="password" placeholder="Enter Password" required>
			<input type="submit" name="login" value="Log me in">
		</form>
	</div>
</body>
</html>