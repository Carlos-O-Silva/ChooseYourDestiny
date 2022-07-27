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
<title>Inicio</title>
 <!-- Compiled and minified CSS -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
 <link type="text/css">
 <link href="style.css" rel="stylesheet">
 
</head>

<body>
    <!-- Barra de tarefas -->
    <header>
        <div id="title">
        <a href="#"><h1>Choose Your <br> Destiny</h1></a>
        </div>
        

        <ul>
            <a href="../adm/index.php"><li>Painel Admin</li></a>
            
        </ul>
    </header>
  <!-- Inicio do Formulario-->
<br>
<br>
<br>
<br>
<br>
<div class="bc">  
<section class="container">
 <table>
        <thead>
  <tr>
      <th>id</th>
      <th>Alternativa A</th>
      <th>Alternativa B</th>
      <th>Dialogo</th>
      <th>Editar</th>
      <th>Excluir</th>
      
  </tr>
  <br>
  <br>
  </thead>
        <tbody>
        <?php
                     include "../conexao.php";
                     try {
                         $stmt = $conexao->prepare("SELECT * FROM tbl_paginas ORDER BY Pag_id DESC;");
                         if($stmt->execute()){
                             while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                                echo"<tr>
                                <td>{$rs->Pag_id}</td>
                                <td>{$rs->Pag_alt_1}</td>
                                <td>{$rs->Pag_alt_2 }</td>
                                <td>{$rs->Pag_dialogo}</td>
                                <td><a class='btn waves-effect waves-light'>Editar</a> </td>
                                 <td><a class='btn waves-effect waves-light' href='deletpag.php?cod={$rs->Pag_id}'>Apagar</a> </td>
                                            
                                </tr>";
                             }
                         }
                     } catch (PDOException $erro) {
                         echo "Erro na conexão:" . $erro->getMessage();
                     }
        ?>
        </tbody>
      </table>

  </tbody>
  
  <table>
      </table>

        </tbody>
</body>
  <!--                       -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</html>