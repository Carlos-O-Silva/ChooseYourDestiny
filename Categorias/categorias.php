<?php
include '../conexao.php';
session_start();
$_SESSION['nivel'] = 0;
$_SESSION['subnivel'] = "A";

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="categorias.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="fonts.css">
    <title>Categorias</title>
</head>

<body>
    
    <?php
    include "../conexao.php";
    try {
        $stmt = $conexao->prepare("SELECT * FROM tbl_usuario WHERE Usu_id = " . $id . ";");
        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
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
            <a href="../home/index.php">
                <h1>Choose Your <br> Destiny</h1>
            </a>
        </div>


        <ul>
            <a href="../Login/logout.php">
                <li>Sair</li>
            </a>
            <a href="../Usuario/index.php" id="inscreva-se-btn">
                <li><?php echo $Usu_nickname; ?></li>
            </a>
        </ul>
    </header>

<br><br>

<div class="container">
    <div class="row">
        <div class="col-12">
        <div class='card' style='float: left'>
            <div> <img class='card-image' src='../img/capaHistoria/pao.png'> </div>
            <h2>Pao Dourado</h2>
            <p>Aventura</p>
            <p1>O menino encontra um pao</p1>
            <a class='bottomText' href='../paginas/HisPaoDourado1.php'>Ler História</a>
        </div>

        <div class='card' style='float: left'>
            <div> <img class='card-image' src='../img/capaHistoria/lilica.png'> </div>
            <h2>Abelha lilica</h2>
            <p>Infantil</p>
            <p1>Abelha lilica e suas aventuras</p1>
            <a class='bottomText' href='../paginas/HisAbelha.php'>Ler História</a>
        </div>

    <?php
    
    try {
        $stmt = $conexao->prepare("SELECT * FROM tbl_historia ORDER BY his_id DESC LIMIT 15;");
        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $his_id = $rs->his_id;
                $His_Titulo = $rs->His_Titulo;
                $His_Sinopse = $rs->His_Sinopse;
                $His_Categoria = $rs->His_Categoria;
                $His_CapaHistoria = $rs->His_CapaHistoria;

                echo "
                        <div class='card' style='float: left'>
                            <div> <img class='card-image' src='../img/capaHistoria/$His_CapaHistoria'>  </div>
                            <h2>$His_Titulo</h2>
                            <p>$His_Categoria</p>
                            <p1>$His_Sinopse</p1>
                            <a class='bottomText' href='../paginas/index.php?cod=$his_id'>Ler História</a>
                        </div>
                       ";
            }
        }
    } catch (PDOException $erro) {
        echo "Erro na conexão:" . $erro->getMessage();
    }
    ?>
   
    

        </div>
    </div>
</div>
            




</body>

</html>