<html>
   <head>
	<title>Login</title>
	
	<script
  src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
  crossorigin="anonymous"></script>
   </head>
	<style>
		#para1{
			margin-left: 35%;
			margin-top: 10%;
		}
		#para2{
			margin-left: 35%;

		}
		#title{
			margin-left: 40%;
			margin-top: 5%;
		}
		#login{
			margin-left: 40%;
		}
		#insere{
			margin-left: 40%;	
		}
		#inserir{
			margin-left: 20%;	
		}
	</style>
   <script>
			$(function() {	$('#inserir').hide();	});
		</script>
	<body>
		<h2 id="title">Login</h2>
		<form action="autentica.php" method="POST">
			<p id="para1">Nome: <input type="text" name="usuario"></p>
			<p id="para2">Senha: <input type="password" name="senha"></p>
			<button type="submit" id="login">Login</button>
		</form>
		
		<button class="btn btn-secundary" onclick="$('#inserir').show()" id="insere">Inserir</button>
		<div id="inserir">
		<?php
			require_once 'cliente.php';
			$c= new cliente();
			if(isset($_POST['usuario'])){
				$c->setSenha (hash ('sha256',"666".hash('sha256',$_POST['senha'].hash ('sha256', "999").hash ('sha256', "MotherFucker"))));
				$c->setUsuario($_POST['usuario']);
				$c->inserir();
				unset($_POST['usuario']);
				header("Refresh:0");
			}
		?>
		<div id="inserir" class="container">
			<h2>Inserir Cliente</h2>
			<form method="POST">
				<p>Nome: <input type="text" name="usuario"
				  placeholder="Digite seu nome aqui" required></p>
				<p>
				<p>Senha: <input type="password" name="senha"
				  placeholder="Digite sua senha aqui" required></p>
				<input class="btn btn-primary" type="submit" value="Inserir">
				<button class="btn btn-secundary" onclick="$('#inserir').hide()">Cancelar</button>
				</p>
			</form>
		</div>
		</div>
	</body>
</html>