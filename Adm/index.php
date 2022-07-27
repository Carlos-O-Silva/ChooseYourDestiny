<?php
include '../conexao.php';
session_start();
if (!isset($_SESSION['Adm_email'])) {
    header('location:../Adm/logarAdm.php');
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="../Adm/dark.css">
    <link rel="stylesheet" href="../Adm/test.css">
    <link href="../Login/fonts.css" rel="stylesheet">
    <link href="../cadastro/style.css" rel="stylesheet">
    <link rel="stylesheet" href="testt.css">



    <!-- <link rel="stylesheet" href="qfc-light.css"> -->

</head>

<body>
    <?php
    include "../conexao.php";
    try {
        $stmt = $conexao->prepare("SELECT * FROM tbl_administrador WHERE Adm_id;");
        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $Usu_nickname = $rs->Adm_email;
            }
        }
    } catch (PDOException $erro) {
        echo "Erro na conexão:" . $erro->getMessage();
    }
    ?>
    <header>

        <div id="title">
            <a href="../Home/index.php">
                <h1>Choose Your <br> Destiny</h1>
            </a>
        </div>

        <ul>
            <a href="../adm/index.php">
                <li>Bem vindo Administrador, <span1><?php echo $Usu_nickname; ?></span1>
                </li>
            </a>
        </ul>
    </header>

    <br><br><br><br><br><br><br>

    <html>

    <head>
    <div class="dropdown">
  <button>Opções da história</button>
  <div>
  <a href="../adm/indexhis.php">Cadastrar História</a>
    <a href="../adm/listarhis.php">Modificar Historia</a>
    <a href="../adm/editpag.php">Modificar Sinopse</a>
  </div>
</div>
<br><br><br><br><br><br>
<div class="dropdown">
  <button>Opções de Usuario</button>
  <div>
  <a href="../adm/edit.php">Modificar Usuario</a>
  <a href="../adm/edit.php">Excluir Usuario</a>
  </div>
</div>

    </body>

    </html>