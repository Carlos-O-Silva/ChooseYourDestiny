<?php
session_start();
$Usu_email = filter_input(INPUT_POST, 'Usu_email', FILTER_DEFAULT);
$Usu_senha = filter_input(INPUT_POST, 'Usu_senha', FILTER_DEFAULT);

include '../conexao.php';

$sth = $conexao->prepare("SELECT * FROM tbl_usuario WHERE Usu_email = :Usu_email AND Usu_senha = :Usu_senha");
$sth->bindValue(":Usu_email", $Usu_email);
$sth->bindValue (":Usu_senha", $Usu_senha);
$sth->execute();

$num = $sth->rowCount();
$rs = $sth->fetch(PDO::FETCH_OBJ);

if ($num > 0) {
    $_SESSION['Usu_email'] = $rs->Usu_email;
    $_SESSION['Usu_senha'] = $rs->Usu_senha;
    $_SESSION['Usu_id'] = $rs->Usu_id;

    header("LOCATION: ../Categorias/categorias.php");

} else {
    ?>
    <script>alert("Login ou senha errados!");
        window.location.href = "login.php";
    </script>
    <?php

}

