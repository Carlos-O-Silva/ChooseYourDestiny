<?php
session_start();
$Usu_email = filter_input(INPUT_POST, 'Usu_email', FILTER_DEFAULT);
$Usu_senha = filter_input(INPUT_POST, 'Usu_senha', FILTER_DEFAULT);
$Usu_nickname = filter_input(INPUT_POST, 'Usu_nickname', FILTER_DEFAULT);

// echo $Usu_emaill;
// echo $Usu_senha;
// echo $Usu_nickname;
include '../conexao.php';

$sth = $conexao->prepare("INSERT INTO tbl_usuario (Usu_senha, Usu_nickname, Usu_email) VALUES (:Usu_senha, :Usu_nickname, :Usu_email)");
    
$sth->bindValue(":Usu_email", $Usu_email);    
$sth->bindValue (":Usu_senha", $Usu_senha);   
$sth->bindValue (":Usu_nickname", $Usu_nickname);
$sth->execute();


echo "<script>alert('Usuario cadastrado com sucesso!');
        window.location.href = '../Login/login.php';
    </script>"

?>