<?php include_once("../assets/lib/dbconnect.php"); ?>
<?php 
session_start();
?>
	<?php
						if($_POST['perfil'] && $_POST['perfil']=="perfils"){
						$idemp = $_POST['idd'];
						$_SESSION['idbusca'] = $idemp;
						echo"".$_SESSION['idbusca'];
				header('Location: perfilDeEmpresa.php'); 	
						}

?>
<?php
							if(isset($_POST['env']) && $_POST['env'] == "pesquisar"){
							$_SESSION['pesquisa'] = $_POST['pesquisa'];
								header('Location: buscaEmpresa.php');
									}
									else{
										
											}

							?>
<?php
$pesquisa = $_SESSION['pesquisa'];
$idcandidato =  utf8_encode($_SESSION['IdCandidato']);
$email = utf8_encode($_SESSION['Email']);
$senha = utf8_encode($_SESSION['Senha']);
$NmC = utf8_encode($_SESSION['NmCandidato']);
$nomeu = utf8_encode($_SESSION['NmUsuario']);
$senha	= utf8_encode($_SESSION['Senha']);
$cep	= utf8_encode($_SESSION['cep'] );
$estado	= utf8_encode($_SESSION['estado']); 
$cidade	= utf8_encode( $_SESSION['cidade']) ;
$bairro	= utf8_encode($_SESSION['bairro'] );
$rua	= utf8_encode($_SESSION['rua'] );
$bio	= utf8_encode($_SESSION['biografia']);
$xp	= utf8_encode($_SESSION['xp'] );
$ingles	= utf8_encode($_SESSION['ingles']); 
$formacao	= utf8_encode($_SESSION['formacao']);
$profissao	= utf8_encode($_SESSION['profissao']); 

$sql = "select * from TbCandidatos  where Email = '$email' and Senha = '$senha';";
$sql2 = mysqli_query($conn, $sql);
while($rowss = mysqli_fetch_array($sql2)){

	$bday = utf8_encode($rowss['bdat']);
	$nascimento = implode("/", array_reverse(explode("-", $bday)));
	
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../assets/images/favicon.ico">
    <title>NeoService - Busca</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
        crossorigin="anonymous">
    <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="../assets/css/custom.css">
    <link rel="stylesheet" href="../assets/css/custom-themes.css">
	<link rel="stylesheet" href="../assets/css/buscaCandidato.css">
</head>

<body>
    <div class="page-wrapper chiller-theme sidebar-bg bg1 toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="#">PERFIL</a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="../assets/images/user.jpg" alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name"><?php echo"$NmC"?>
                        </span>
                        <span class="user-role">Candidato</span>
                    </div>
                </div>
                <!-- sidebar-header  -->
                <div class="sidebar-search">
                    <div>
                    <form method="post" action="buscaEmpresa.php">
                       <div class="input-group">
						
                            <input type="text" name="pesquisa" class="form-control search-menu" list="historico" placeholder="Pesquise..."/>
					
                            <div class="input-group-append">
                                <span class="input-group-text">
                                <button type="hidden" class="fa fa-search" aria-hidden="true" style="background:transparent;border:none;color:gray;"></button>
                                </span>
                            </div>
							<input type="hidden" name="env" value="pesquisar"/>
							
							<datalist id="historico">
							<?php
							$sqli = "select * from TbEmpresas;";
							$sqli2 = mysqli_query($conn, $sqli);
							while($row = mysqli_fetch_array($sqli2)){
							$Usuario = $row['NmUsuario'];
							echo"<option value='$Usuario'></option>";
							}
							?>
							</datalist>
                           
							</form>
							
                        </div>
                    </div>
                </div>
                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>Painel Geral</span>
                        </li>
                        <li class="sidebar">
                            <a href="telaInicialCandidato.php">
                                <i class="fa fa-globe"></i>
                                <span>Início</span>
                            </a>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <span>Perfil</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="perfilCandidato.php">Resumo

                                        </a>
                                    </li>
                                    <li>
                                        <a href="editarPerfilCandidato.php">Editar Perfil</a>
                                    </li>
									
									<li>
                                        <a href="cadastrarCompetencias.php">Cadastrar competências</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
<!-- sidebar-content  -->
            <div class="sidebar-footer">
                <div class="dropdown">

                    <a href="" class="" id="dropdownMenuNotification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-bell"></i>
                        <span class="badge badge-pill badge-warning notification">
						<?php
						$slqs = mysqli_query($conn,"select a.NmCandidato,
a.IdCandidato,
b.NmEmpresa,
b.IdEmpresa,
c.IdSolicitacao

from tbcandidatos a
inner join tbsolicitacao c
on a.IdCandidato = c.fk_IdCandidato
inner join tbempresas b
on b.IdEmpresa = c.fk_IdEmpresa where fk_IdEmpresa=$idempresa") or die (mysqli_error());
						$lins = mysqli_num_rows($slqs);
						echo"$lins";
						?>
						</span>
                    </a>
                     <div class="dropdown-menu notifications" aria-labelledby="dropdownMenuMessage">
                        <div class="notifications-header">
                            <i class="fa fa-bell"></i>
                            Notificações
                        </div>
                        <div class="dropdown-divider"></div>
                     <?php

$slq = mysqli_query($conn,"select a.NmCandidato,
a.IdCandidato,
b.NmEmpresa,
b.IdEmpresa,
c.IdSolicitacao

from tbcandidatos a
inner join tbsolicitacao c
on a.IdCandidato = c.fk_IdCandidato
inner join tbempresas b
on b.IdEmpresa = c.fk_IdEmpresa") or die (mysqli_error());
echo"Notificações";

while($lc = @mysqli_fetch_array($slq) ){
	$idemp = $lc['IdEmpresa'];
	$idcand = $lc['IdCandidato'];
	$idsoli = $lc['IdSolicitacao'];
	$nmcandidato = utf8_encode($lc['NmCandidato']);
	$nmempresa= utf8_encode($lc['NmEmpresa']);
	
	$sqlil = mysqli_query($conn,"select * from TbContatos where fk_IdCandidato = '$idcand' and fk_IdEmpresa='$idempresa'");
	$echo = mysqli_num_rows($sqlil);
	
	if($echo==0){
	
	}
		
	else{
	
	?>

                        <a class="dropdown-item" href="chatEmpresa.php">
                            <div class="notification-content">
                                <div class="icon">
                                    <i class="fas fa-exclamation-triangle text-warning border border-warning"></i>
                                </div>
                                <div class="content">
                                    <div class="notification-detail">
										
	<?php
	echo"<br>$nmcandidato Solicitou um contato$echo!<br>";
	


?>
</div>
                                    <div class="notification-time">
                                       <form method="Post">
									<input type="hidden" name="pegar" value="<?php echo"$idcand";?>"/>
									<input type="submit" name="a" value="iniciar contato"/>
									<input type="hidden" name="env2" value="clicou"/>
	
									</form>
									
									
                                    </div>
                                </div>
                            </div>
							<?php
										}
}
	


?>


<?php
$iddocan = $_POST["pegar"];


if(isset($_POST['env2']) && $_POST['env2'] == "clicou"){
	
	
	
	$sqlil = mysqli_query($conn,"select * from TbContatos where fk_IdCandidato = '$iddocan' and fk_IdEmpresa='$fkid'");
	$echo = mysqli_num_rows($sqlil);
	
	if($echo>=1){
		
	}
	else{
	if(mysqli_query($conn,"insert into TbContatos(fk_IdEmpresa,fk_IdCandidato) values('$fkid','$iddocan')")){
		$sqlill = mysqli_query($conn,"delete from TbSolicitacao where fk_IdCandidato = '$iddocan' and fk_IdEmpresa='$fkid'");
		header("Location: chatEmpresa.php");
			echo"<script>
		alert('$iddocan  $fkid');
		</script>";
			
	}
	else{
		echo"<script>
		alert('aaaaa');
		</script>";
	}
	}
}
else{
	
}

?>
                        </a>
                        <div class="dropdown-divider"></div>
                   
                    </div>
					
					
					
                </div>
                <div class="dropdown">
                    <a href="#" class="" id="dropdownMenuMessage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <a href="chatEmpresa.php"><i class="fa fa-envelope"></i></a>
                </div>
                <div class="dropdown">
                    <a href="#" class="" id="dropdownMenuMessage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-cog"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuMessage">
                        <a class="dropdown-item" href="#">Ajuda</a>
                    </div>
                </div>
                <div>
                    <a href="logoutEmpresa.php">
                        <i class="fa fa-power-off"></i>
                    </a>
                </div>
            </div>
        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid">
					<div class="container"><br>
				<div class="jumbotron p-3 text-center">
				  <h1 class="display-4">Busca de Empresas</h1><hr>
				  <p class="lead">Resultados pela busca: "<?php echo"$pesquisa";?>"</p>
				  <p class="lead">
				  </p>
				</div>
				
				
				
				
		
				<div class="row">	
			<?php 
		$sqlpesquisa = "select * from TbEmpresas where NmEmpresa = '$pesquisa'";
		$sqlpesquisa2 = mysqli_query($conn,$sqlpesquisa);
		
		while($lc = @mysqli_fetch_array($sqlpesquisa2) ){
		$nmempresa = $lc['NmEmpresa'];
		$idempresa = $lc['IdEmpresa'];
		?>				
		
				  <div class="col-sm-6">
					<div class="card">
					  <h4 class="card-header text-right bg-dark text-white"><?php echo"$nmempresa";?>
					  <div class="float-left small">
					  <form method="post" >
						<input type="submit" class="btn btn-raised btn-danger" title="Ver perfil de EMPRESA" value="Perfil"/>
						<input type="hidden" name="perfil" value="perfils"/>
						<input type="hidden" name="idd" value="<?php echo"$idempresa"?>">
						</form>
					
							
						 
						  
					  </div>
					  </h4>
					  <div class="card-body">
						  <div class="image float-right user-r">
							<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQlzMdhwbQezvSU8ZGqUWZEJXPG7cdEGyCvs-4M3CHLHLHMrpZa6w" class="img-thumbnail" alt="avatar"/>
						  </div>
						  <br>
						<h4 class="card-title">Vagas</h4>
						

                           
                             <div class="col-md-6">
								<?php
							$if = "select * from tbvagas where fk_IdEmpresa = '$idempresa';";
							$if2 = mysqli_query($conn,$if);
							while($ifrow = mysqli_fetch_array($if2)){
							$vag = utf8_encode($ifrow['vaga']);
							$sal = utf8_encode($ifrow['salario']);
							$desc = utf8_encode($ifrow['descricao']);
							$horario = utf8_encode($ifrow['horario']);
                           
							
                            
                    ?>
						  <p class="card-text"><center><strong><?php echo"$vag";?></strong></center></p>
						  <p><strong>Remuneração: </strong><?php echo"R$ $sal"?></p>
						  <p><strong>Horário: </strong><?php echo"$horario"?> </p>
						 <p><strong>Descrição: </strong><?php echo"$desc";?></p><?php
						  echo"</br></br></br>";
						 
					  }
							?>
						
					</div>
				  </div>

				</div>
		
				
				
				
				<br>

				</div>
				

				
				  <?php
				  
					  }
							?>
				  </hr>
					
					</div>
	
				
					<!-- jQuery first, then Bootstrap JS. -->
            </div>
        </main>
        <!-- page-content" -->
    </div>
    <!-- page-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../assets/js/custom.js"></script>
	<script src="https://unpkg.com/popper.js@1.12.5/dist/umd/popper.js"></script>
	<script src="https://unpkg.com/bootstrap-material-design@4.0.0-beta.3/dist/js/bootstrap-material-design.js"></script>
</body>

</html>
