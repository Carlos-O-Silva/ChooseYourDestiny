
<?php
session_start();
$dialogo = filter_input(INPUT_POST, 'Pag_dialogoA', FILTER_DEFAULT);
$alternativa1A = filter_input(INPUT_POST, 'Pag_Alt_1A', FILTER_DEFAULT);
$alternativa2A = filter_input(INPUT_POST, 'Pag_Alt_2A', FILTER_DEFAULT);
$Pag_fotoA = $_FILES['pag_fotoA']['name'];
$caminho_imagem = "../img/Paginas/";
move_uploaded_file($_FILES['pag_fotoA']['tmp_name'], $caminho_imagem.$_FILES['pag_fotoA']['name']);


$dialogo2 = filter_input(INPUT_POST, 'Pag_dialogoB', FILTER_DEFAULT);
$alternativa1B = filter_input(INPUT_POST, 'Pag_Alt_1B', FILTER_DEFAULT);
$alternativa2B = filter_input(INPUT_POST, 'Pag_Alt_2B', FILTER_DEFAULT);
$Pag_fotoB = $_FILES['pag_fotoB']['name'];
$caminho_imagem = "../img/Paginas/";
move_uploaded_file($_FILES['pag_fotoB']['tmp_name'], $caminho_imagem.$_FILES['pag_fotoB']['name']);

$id = filter_input(INPUT_POST, 'txtid', FILTER_DEFAULT);
$_SESSION['nivel'] += 1;



include '../conexao.php';

$sth = $conexao->prepare("INSERT INTO tbl_paginas (Pag_dialogo, Pag_Alt_1, Pag_Alt_2, Pag_Nivel, Pag_SubNivel, his_id, pag_img) VALUES (:Pag_dialogoA, :Pag_Alt_1A, :Pag_Alt_2A, :Pag_NivelA, :Pag_SubNivelA, :his_id, :pag_imgA);
                          INSERT INTO tbl_paginas (Pag_dialogo, Pag_Alt_1, Pag_Alt_2, Pag_Nivel, Pag_SubNivel, his_id, pag_img) VALUES (:Pag_dialogoB, :Pag_Alt_1B, :Pag_Alt_2B, :Pag_NivelB, :Pag_SubNivelB, :his_id, :pag_imgB);");

    
$sth->bindValue(":Pag_dialogoA", $dialogo);    
$sth->bindValue (":Pag_Alt_1A", $alternativa1A);   
$sth->bindValue (":Pag_Alt_2A", $alternativa2A);
$sth->bindValue (":Pag_NivelA", $_SESSION['nivel'] );
$sth->bindValue (":Pag_SubNivelA", "A");
$sth->bindValue (":pag_imgA", $Pag_fotoA);  



$sth->bindValue (":his_id", $id);

$sth->bindValue(":Pag_dialogoB", $dialogo2);    
$sth->bindValue (":Pag_Alt_1B", $alternativa1B);   
$sth->bindValue (":Pag_Alt_2B", $alternativa2B);
$sth->bindValue (":Pag_NivelB", $_SESSION['nivel'] );
$sth->bindValue (":Pag_SubNivelB", "B");
$sth->bindValue (":pag_imgB", $Pag_fotoB);  

$sth->bindValue (":his_id", $id);

$sth->execute();

header("LOCATION: indexPag.php");

?>