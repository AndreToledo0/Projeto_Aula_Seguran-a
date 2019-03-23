<style>
	
	#erro{
		margin-left: 40%;
		margin-top: 10%;
	}
	#volta{
		margin-left: 40%;
		margin-top: 5%;
	}
</style>
<?php
	if(isset($_POST['usuario']) && isset($_POST['senha'])){
		$conn =new PDO("mysql:host=localhost;dbname=bancoseguranca","root","");
		$stmt=$conn->prepare("select * from cliente where ".
			"usuario=:u and senha=:s");
		$stmt->bindValue(":u",$_POST['usuario']);
		$stmt->bindValue(":s",hash ('sha256', "666".hash('sha256',$_POST['senha'].hash ('sha256', "999").hash ('sha256', "MotherFucker"))));
		$stmt->execute();
		if($stmt->rowCount()==1){
			session_start();
			$_SESSION['usuario']=$_POST['usuario'];
			header("Location:index.php");
		}else{
			?>
			<p id="erro">Usuario ou senha inválido!</p>
			<p id="volta"><a href='login.php'>Tente Novamente</a></p>
			<?php
		}		
	}else{
		?>
		<p id="erro">Usuario ou senha inválido!</p>
		<p id="volta"><a href='login.php'>Tente Novamente</a></p>
		<?php
	}
?>
