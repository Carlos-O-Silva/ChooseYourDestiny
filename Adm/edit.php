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
      <th>Email</th>
      <th>Nickname</th>
      <th>-</th>
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
                         $stmt = $conexao->prepare("SELECT * FROM tbl_usuario ORDER BY Usu_id DESC;");
                         if($stmt->execute()){
                             while($rs = $stmt->fetch(PDO::FETCH_OBJ)){
                                echo"<tr>
                                <td>{$rs->Usu_id}</td>
                                <td>{$rs->Usu_email}</td>
                                <td>{$rs->Usu_nickname}</td>
                                <td>--</td>
                                 <td><a class='btn waves-effect waves-light' href='editaruser.php?cod={$rs->Usu_id}'>Editar</a></td>
                                 <td><a class='btn waves-effect waves-light' href='userexcluir.php?cod={$rs->Usu_id}'>Apagar</a> </td>
                                            
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