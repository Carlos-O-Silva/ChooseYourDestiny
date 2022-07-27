<?php
include '../conexao.php';
session_start();
$_SESSION['nivel'] += 1;

$sth = $conexao->prepare("SELECT `Pag_id`, `Pag_dialogo`, `Pag_alt_1`, `Pag_alt_2`, `Pag_Nivel`, `Pag_SubNivel`, `his_id`, `pag_img` FROM `tbl_paginas` WHERE Pag_Nivel = ? and Pag_SubNivel = ? LIMIT 1");
$sth->bindParam(1, $_SESSION['nivel']);
$sth->bindParam(2, $_SESSION['subnivel']);
$sth->execute();

$num = $sth->rowCount();
$rs = $sth->fetch(PDO::FETCH_OBJ);

if ($num > 0) {
    $_SESSION['Pag_id'] = $rs->Pag_id;
    $_SESSION['Pag_dialogo'] = $rs->Pag_dialogo;
    $_SESSION['Pag_alt_1'] = $rs->Pag_alt_1;
    $_SESSION['Pag_alt_2'] = $rs->Pag_alt_2;
    $_SESSION['Pag_Nivel'] = $rs->Pag_Nivel;
    $_SESSION['Pag_SubNivel'] = $rs->Pag_SubNivel;
    $_SESSION['his_id'] = $rs->Pag_SubNivel;
    $_SESSION['pag_img'] = $rs->Pag_SubNivel;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Paginas</title>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="../Login/fonts.css" rel="stylesheet">
</head>

<body>
    
<div class="box"><h1><?php echo $_SESSION['nivel']?></h1> </div>
    <form action="" method="post">
        <div class="container">
            <div class="nav-left"><img src="../img/paginas/gi1.gif" alt="pensante">
            </div>

            <div class="nav-right">
                <h2><?php echo $_SESSION['Pag_dialogo']?></h2>
            </div>
            
            <div class="footer">

                 <input type="submit" class="button" name="botao" value="<?php echo $_SESSION['Pag_alt_1']?>">
                 
                 <input type="submit" class="button" name="botao" value="<?php echo $_SESSION['Pag_alt_2']?>">
                 


            </div>
            
        </div>
    </form>
   <?php
    if($_POST){        
        if($_POST['botao'] == "A"){
            $_SESSION['subnivel'] = "A";
        }else if($_POST['botao'] == "B"){
            $_SESSION['subnivel'] = "B";
        }
        //$_SESSION['nivel'] -= 1;
    }
   ?>
    
</body>

</html>