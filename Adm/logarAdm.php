<?php
session_start();
$Adm_email = filter_input(INPUT_POST, 'Adm_email', FILTER_DEFAULT);
$Adm_senha = filter_input(INPUT_POST, 'Adm_senha', FILTER_DEFAULT);

include '../conexao.php';

$sth = $conexao->prepare("SELECT * FROM tbl_administrador WHERE Adm_email = :Adm_email AND Adm_senha = :Adm_senha");
$sth->bindValue(":Adm_email", $Adm_email);
$sth->bindValue (":Adm_senha", $Adm_senha);
$sth->execute();

$num = $sth->rowCount();

if ($num > 0) {
    $rs = $sth->fetch(PDO::FETCH_OBJ);
    $_SESSION['Adm_email'] = $Adm_email;
    $_SESSION['Adm_senha'] = $Adm_senha;
    $_SESSION['id'] = $rs->his_id;
    
    header("LOCATION: index.php");

} else {
    ?>
    <script>alert("Login ou senha errados!");
        window.location.href = "LoginAdm.php";
    </script>

    
    <?php

}

?>