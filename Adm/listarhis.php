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
      <th>Nome da Historia</th>
      <th>Sinopse</th>
      <th>Genero</th>
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
                         $stmt = $conexao->prepare("SELECT * FROM tbl_historia ORDER BY his_id DESC;");
                         if($stmt->execute()){
                             while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                                echo"<tr>
                                <td>{$rs->his_id}</td>
                                <td>{$rs->His_Titulo}</td>
                                <td>{$rs->His_Sinopse}</td>
                                <td>{$rs->His_Categoria}</td>
                                <td><a class='btn waves-effect waves-light' href='editarHis.php?cod={$rs->his_id}'>Editar</a> </td>
                                 <td><a class='btn waves-effect waves-light' href='delethis.php?cod={$rs->his_id}'>Apagar</a> </td>
                                            
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