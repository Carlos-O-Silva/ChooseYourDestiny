<?php
include '../conexao.php';
session_start();
if (!isset($_SESSION['Usu_email'])) {
  header('location:../Login/login.php');
}
$id = $_SESSION['Usu_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="../Categorias/fonts.css">
    <link rel="stylesheet" href="navbar.css">
    <script src="https://kit.fontawesome.com/d37c5443c6.js" crossorigin="anonymous"></script>
    

    <title></title>
</head>


<body>
<?php
            include "../conexao.php";
            try {
                $stmt = $conexao->prepare("SELECT * FROM tbl_usuario WHERE Usu_id = ".$id.";");
                if($stmt->execute()){
                    while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                      $Usu_id = $rs->Usu_id;
                      $Usu_foto = $rs->Usu_foto;
                      $Usu_email = $rs->Usu_email;
                      $Usu_nickname = $rs->Usu_nickname;
                    }
                }
            } catch (PDOException $erro) {
                echo "Erro na conexão:" . $erro->getMessage();
            }
        ?>
<header>
        <div id="title">
        <a href="#"><h1>Choose Your <br> Destiny</h1></a>
        </div>
        

        <ul>
            <a href="../Login/logout.php"><li>Sair</li></a>
            <a href="../categorias/categorias.php"><li>Historias</li></a>
            <a href="../Usuario/index.php" id="inscreva-se-btn"><li><?php echo $Usu_nickname; ?></li></a>
        </ul>
    </header>
    <article class="profile">
	<div class="profile-image">
		<img src="../img/user.jpg" />
	</div>
	<h2 class="profile-username"> <?php echo $Usu_nickname;?> </h2>
	<small class="profile-user-handle"><?php echo $Usu_email;?></small>
	<div class="profile-actions">
		<button class="btn btn--primary">Suas Histórias</button>
	<div class="profile-links">
	</div>
</article> 
</body>

</html>