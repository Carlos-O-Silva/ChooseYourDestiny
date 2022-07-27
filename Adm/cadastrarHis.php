
<?php
session_start();
$titulo = filter_input(INPUT_POST, 'His_Titulo', FILTER_DEFAULT);
$sinopse = filter_input(INPUT_POST, 'His_Sinopse', FILTER_DEFAULT);
$categoria = filter_input(INPUT_POST, 'His_Categoria', FILTER_DEFAULT);
$His_CapaHistoria = $_FILES['His_CapaHistoria']['name'];
$caminho_imagem = "../img/capaHistoria/";
$_SESSION['nivel'] = 0;
move_uploaded_file($_FILES['His_CapaHistoria']['tmp_name'], $caminho_imagem.$_FILES['His_CapaHistoria']['name']);

include '../conexao.php';


$sth = $conexao->prepare("INSERT INTO tbl_Historia (His_Titulo, His_Sinopse, His_Categoria, His_CapaHistoria) VALUES (:His_Titulo, :His_Sinopse, :His_Categoria, :His_CapaHistoria)");
    
$sth->bindValue(":His_Titulo", $titulo);    
$sth->bindValue (":His_Sinopse", $sinopse);   
$sth->bindValue (":His_Categoria", $categoria);
$sth->bindValue (":His_CapaHistoria", $His_CapaHistoria);

$sth->execute();
   


echo "<script>alert('História cadastrada com sucesso!');
        window.location.href = 'indexPag.php';
    </script>"

?>
