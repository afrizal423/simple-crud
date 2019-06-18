<!DOCTYPE html>
<html>
<head>
	<title>Membuat Login Dengan PHP dan MySQL</title>	
</head>
<body>
	<h1>Login Dengan PHP dan MySQLi</h1>
	<h3>Halaman Login Sederhana</h3>
	<form action="proseslogin.php" method="post">		
		<table>
			<tr>
				<td>Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="login" value="Log In"></td>
			</tr>
		</table>
	</form>
</body>
</html>