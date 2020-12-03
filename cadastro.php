<?php 
	include("db.php");
	if(isset($_POST['criar'])){
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$telefone = $_POST['telefone'];
		$pass = $_POST['pass'];
		$data = date("Y/m/d");

		$sql = "SELECT `email_usuario` FROM `usuario` WHERE `email_usuario`='$email' ";
		$email_check = mysqli_query($connect, $sql);
		$do_email_check = mysqli_num_rows($email_check);
		if($do_email_check >= 1){

			echo '<h3> Este email ja esta registado, faz o login <a href="login.php"> aqui </a> </h3>';
		}
		elseif ($nome == '' or strlen($nome) < 3){
			echo '<h3> Escreve o teu nome correctamente! </h3>';
		}
		elseif ($email == '' or strlen($email) < 10){
			echo '<h3> Escreve o teu email correctamente! </h3>';
		}
		elseif ($pass == '' or strlen($pass) < 3){
			echo '<h3> Escreve a tua password correctamente, deve ter mais de 8 caracteres! </h3>';
		}else
		{ 
		$query = "INSERT INTO `usuario`(`codigo_usuario`, `nome_usuario`, `email_usuario`, 
				`telefone_usuario`, `senha_usuario`, `data_cadastro_usuario`) 
				VALUES (NULL,'$nome','$email','$telefone','$pass','$data')
				";
		$data = mysqli_query($connect,$query) or die("Erro ao inserir - mysqli_error()");
		if ($data){
			setcookie("login", $email);
			header("Location: ./");
		}else{
			echo "<h3> Desculpa, erro ao registar teus dados! </h3>";
		}
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title> Cadastrando-se </title>

		<style type="text/css"> 
			img{
				display: block; 
				margin:auto; 
				margin-top: 20px; width: 200px;
			}

			form{
				text-align: center; margin-top: 20px;
			}
			input[type="text"]{border:1px solid #ccc;
				width:250px; heigth:25px; padding-left: 10px; border-radius:3px; margin-top: 10px;
			}

			input[type="email"]{border:1px solid #ccc;
				width:250px; heigth:25px; padding-left: 10px; border-radius:3px;
				margin-top: 10px;
			}

			input[type="password"]{border:1px solid #ccc;
				width:250px; heigth:25px; padding-left: 10px;
			}
			input[type="submit"]{border:none; width:80px; heigth:25px; 			margin-top: 20px; border-radius: 3px;
			}
			input[type="submit"]:hover{background-color: #1E90FF; color:#fff;cursor:pointer;
			}

			h2{text-align: center; margin-top: 20px;}
			h3{text-align: center; color: #1E90FF; margin-top: 15px;}
		</style>
	</head>

	<body>
		<img src="imagens/licenciado.png"> <br />
		<h2> Criar sua conta </h2>
		<form method="post">  
			<input type="text" placeholder="Nome" name="nome"> <br /> <br />
			<input type="email" placeholder="Endereço email" name="email"> <br /><br />
			<input type="text" placeholder="Telefone" name="telefone"> <br /> <br />
			<input type="password" placeholder="Palavra-passe" name="pass"> <br /> <br />
 
			<input type="submit" value="Guardar" name="criar">  
		</form>

		<h3> Já tens uma conta? <a href="login.php"> Click aqui para entrares nela! </a> </h3>
	</body>
</html>