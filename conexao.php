
<?php 
try { 
     $conexao = new PDO("mysql:host=localhost;dbname=bancotcc", "root", "");
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     //P METODO setAttribute () NOS PERMITE ADICIONAR  ATRITOS NO OBJETOS    
      $conexao->exec("set names utf8"); 
         } catch (PDOException $eroo) {
          echo "ERRO NA CONEXAO:" . $ERRO ->getMessage();
         }


         
    ?>




