             <?php include_once 'init-login.php' ;
             include_once 'header.php';
             include 'rodape.php';
             ?>
             <!DOCTYPE html>
             <html lang="en">
             <head>
             	<title>Balada Top </title>

             	<link rel="stylesheet" type="text/css" href="css/index_login.css">

             </head>
             <body >

             	<meta name="viewport" content="width=device-width, initial-scale=1">
             	<link rel="stylesheet" type="text/css" href="css/index_login.css">
             </head>

             <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

             <div id="mySidenav" class="sidenav">
             	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
             	<a href="#" data-toggle="modal" data-target="#editModal" >Editar conta</a>
             	<?php if (balada()): ?>
             		<a href="#">baladas da semana</a>
             		<a href="carregar.php">Cadastrar baladas</a> 
             	<?php endif ?>
             	<a href="logout.php">Sair</a>
             </div>

             <script>
             	function openNav() {
             		document.getElementById("mySidenav").style.width = "250px";
             	}

             	function closeNav() {
             		document.getElementById("mySidenav").style.width = "0";
             	}
             </script>


<div id="map"></div>


             	<style>
             		#map {
             			height: 50%;
             			width: 40%;
             			margin-top:30px ;
             			border-radius: 20px 20px;

             		}
             		embed {
             			margin: 0;
             			padding: 0;
             			height: 50px;
             		}
             		.header{
             			font-size: 40px;
             			padding: 2px 2px;
             			text-align: center;
             			background-color: grey;
             			color:#000000;

             		}
             		html, body {
             			height: 100%;
             			/*margin: 0;*/
             			/*padding: 0;*/
             			width:100%;
             		}

             		body{
             			background:url('css/abalada.jpg') no-repeat;
             			background-size: cover;
             			background-attachment: fixed;
             		}



             		#comment-container {
             			max-height: 230px;
             			position: absolute;
             			left:1300px;
             			top:160px;
             			background-color:white;
             		}
             		#comments {
             			left:1300px;
             			top:160px;
             		}
             	</style>

             </head>
             <body >

             	<meta name="viewport" content="width=device-width, initial-scale=1">
             	<style>
             		body {
             			font-family: "Lato", sans-serif;
             		}

             		.sidenav {
             			height: 100%;
             			width: 0;
             			position: fixed;
             			z-index: 1;
             			top: 0;
             			right: 0;
             			background-color: #111;
             			overflow-x: hidden;
             			transition: 0.5s;
             			padding-top: 60px;
             		}

             		.sidenav a {
             			padding: 8px 8px 8px 32px;
             			text-decoration: none;
             			font-size: 25px;
             			color: #818181;
             			display: block;
             			transition: 0.3s;
             		}

             		.sidenav a:hover {
             			color: #f1f1f1;
             		}

             		.sidenav .closebtn {
             			position: absolute;
             			top: 0;
             			right: 25px;
             			font-size: 36px;
             			margin-left: 50px;
             		}

             		@media screen and (max-height: 450px) {
             			.sidenav {padding-top: 15px;}
             			.sidenav a {font-size: 18px;}
             		}
             	</style>
             </head>
      


         </ul>
     </div>
 </div>
</nav>

<br>
<br>





<div id="rolamento">


	<label> <div class="w3-container w3-white">
		<h2 style=" position: absolute;top: 50px; left: 1000px; text-shadow:1px 1px 0 #444 ">Baladas cadastradas:</h2>



		<td>

		</div>
		<div class="dropdown" style="position: absolute; left:1000px; top:120px;">
			<a class="dropdown-toggle btn btn-primary" data-toggle="dropdown" href="#">Visualizar <span class="caret"></span></a>
			<ul class="dropdown-menu">
			<form action="index-login.php" method="POST" name="meuForm">
				<select name="balada" id="balad" class="form-control" onchange="this.form.submit();">
					<option value="default">Selecione</option>
					<option value="Uk Pub">UK</option>
					<option value="Manny Deck">Manny Deck</option>
					<option value="Winner">Winner</option>
					<option value="Liverpool">Liverpool</option>
				</select>

				
			</form>
			</ul>
		</div>


				
			</form>
				
			</ul>
		</div>

	</div>
</label> 
</div>
<div style="background-color: white; width: 40%;height: 13%;">

	<?php
	if (isset ($_POST['balada'])) {
		$balada = $_POST['balada'];


		// $sql= "SELECT * FROM baladas WHERE balada='$balada'";
		$sql = "SELECT * FROM `baladas` WHERE `balada` ='" . $balada . "'";
		$result = $conn->query($sql);
	    foreach ($result as $row) {
	        echo $row['balada'] . "<br>";
	        echo $row['endereco'] . "<br>";
	        echo $row['telefone'] . "<br>";
	        echo "<a href='" . $row['link'] . "' target='_blank'>" . $row['link'] . "</a><br>";
	        echo $row['descricao'] . "<br>";
	        echo $row['horario'] . "<br>";
	    }
		unset($_POST['balada']);

}
?>

</div>



<title></title>
<style type="text/css">
	li{
		color: black;
	}
</style>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">

	

	<?php

												$data = file('usuarios.csv'); // lê o arquivo para um array
												// $usuarios = trim($data[$linha]); // pega a linha específica do array e coloca em $livro
												$dados_usuarios = explode(',', $data); // pega os dados do livro e coloca no array $dados_livro
												$name = $_SESSION['user-logged'];

												foreach ($data as $user) {
													$user = trim($user);
													$arr = explode(',', $user);
													if ($arr[0] == $name) {
														$senha = $arr[1];
														$balada = $arr[2];
														break;
													}
												}

												?>
												<div class="modal-dialog" role="document" >
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title" id="loginModalLabel">Editar conta</h5>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<form action="update.php" method="POST">
																<div class="form-group">
																	<label for="name">Name:</label>
																	<input type="text" name="user" class="form-control" value="<?=$name?>">
																</div>
																<div class="form-group">
																	<label for="pass">Password:</label>
																	<input type="password" name="password" class="form-control" value="<?=$senha?>">
																</div>
																<div class="form-group">
																	<input type="hidden" name="balada" value="<?= $balada?>">
																	<input class="btn btn-danger" type="submit" name='delete' value="Excluir">	
																	<input class="btn btn-success" type="submit" name="salvar" value="Salvar">	
																</div>
															</form>
														</div>
													</div>
												</div>
											</div> <!-- <Modal Login > -->
											<div id="comment-container"  style ="display: block; background-color: transparent; border:1px solid black; height: 250px; width: 550px;">
												<h1 style="background-color: #264899;color: white">Comentários sobre a balada </h1>
												<div id="comments" style="width: inherit; height: 160px; overflow-y: scroll; background-color: transparent;">	

													<?php 
													$consult = $conn->prepare('select * from comentarios');
													$consult->execute();
													$i = 0;
													$results=$consult->fetchAll();

													foreach ($results as $result) {
														$user = $result['usuarios_id'];
														$consulta = $conn->prepare("select usuario from usuarios where id = '$user'");
														$consulta->execute();
														$res = $consulta->fetch(PDO::FETCH_ASSOC);
														echo "<p><b>" .$res['usuario'] . "</b>: " . $result['texto'] . "</p>";
														$i++;
													}

													?>
												</div>
											</div>
											<form method="POST" action="coment.php">
												<input type="text"   name="texto"  placeholder="Comentários " maxlength="30" style="height: 50px; position: absolute; left:1300px; top:400px; width: 500px; background-color: transparent; border:1px solid black;" required="e preciso adicinar comentarios para enviar.">
												<input type="submit" value="Enviar" style="position: absolute; left:1800px; top:415px;"">

											</form>
											<style>
												#comentarios::-webkit-input-placeholder{
													color:#C4C;
													background-color: #4C4;
													text-transform: uppercase;
													font-style: bold;
												</style>


												<style >
													#map {
														height: 600px;
														width: 40%;
													}
												</style>

												

												
											 
											<script>
												function initMap() {

													var recife = {lat: -8.1148764, lng: -34.8963423};
													var manny = {lat:-8.014136, lng: -34.84473};
													var uk = {lat: -8.1148764, lng: -34.8963423};
													var liverpool = {lat: -8.0948747, lng: -34.8861826};
													var winner = {lat:-8.0472278, lng:-34.8959251};
													var map = new google.maps.Map(document.getElementById('map'), {
														zoom: 15,
														center: recife
													});
													var marker = new google.maps.Marker({
														position: recife,
														map: map
													});
													var loc = new google.maps.Marker({
														position: uk,
														map: map
													});
													var deck = new google.maps.Marker({
														position: manny,
														map: map
													});
													var pool = new google.maps.Marker({
														position: liverpool,
														map:map

													});
													var win = new google.maps.Marker({
														position:winner,
														map:map
													});
												}
											</script>
											<script  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCGgwMp0kjMkByacOFITQOWz-7mH43dPnM&callback=initMap"
											async defer></script>

		</body>
	</html>





										

