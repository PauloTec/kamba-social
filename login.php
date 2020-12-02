<?php
	include("db.php");

		if(isset($_POST['entrar'])) {
			$email = $_POST['email'];
			$pass = $_POST['pass'];
			
			$sql = "select * from usuario where email = '$email' and password = '$pass' ";
		
			$verifica = mysqli_query($connect, $sql);

			if(mysqli_num_rows($verifica) <=0){
				echo "<h3> Palavra-passe ou email errado! </h3>";
			}
			else{
				setcookie("login", $email);
				header("Location: ./");
		}
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Encontre novos amigos </title>

		<style type="text/css"> 
			*{
				font-family: 'Montserrat', cursive;
			}
			img{
				display: block; 
				margin:auto; 
				margin-top: 20px; width: 200px;
			}

			form{
				text-align: center; margin-top: 20px;
			}

			input[type="email"]{
				border:1px solid #ccc;
				width:250px; heigth:25px; 
				padding-left: 10px; border-radius:3px;
			}

			input[type="password"]{border:1px solid #ccc;
				width:250px; heigth:25px; padding-left: 10px;
				margin-top: 20px; border-radius: 3px;
			}
			input[type="submit"]{border:none; width:120px; heigth:25px; 			
			margin-top: 20px; border-radius: 3px;
			}
			input[type="submit"]:hover{
				background-color: #1E90FF; 
				color:#fff;
				cursor:pointer;
			}

			h2{text-align: center; margin-top: 20px;}
			h3{text-align: center; color: #1E90FF; margin-top: 15px;}
			a{text-decoration: none; color: #333;}
		</style>
	</head>

	<body>
		<h2> Entre na sua conta </h2>
		<form method="POST">  
			<input type="email" placeholder="endereco email" name="email" > <br /> <br />
			<input type="password" placeholder="Palavra-passe" name="pass"> <br /> <br /> 
			<input type="submit" value="Entrar" name="entrar">  
		</form>
		<h3> Sem conta? <a href="cadastrar.php"> Click aqui! </a> </h3>
	</body>
</html>