<?php
    // Bloco if que recupera as informações no formulário, etapa utilizada pelo Update
    // Verifica se foi enviando dados via GET
    if ($_GET) {
        $id = (isset($_GET["cod"]) && $_GET["cod"] != null) ? $_GET["cod"] : "";
        //echo "<script>alert('".$id."');</script>";
        include "../conexao.php";
        try {
            $stmt = $conexao->prepare("SELECT * FROM tbl_paginas WHERE Pag_id  = ?");
            $stmt->bindParam(1, $id);
            if ($stmt->execute()) {
                $rs = $stmt->fetch(PDO::FETCH_OBJ);
                $id = $rs->Pag_id ;
                $Pag_alt_1 = $rs->Pag_alt_1;
                $Pag_alt_2 = $rs->Pag_alt_2;
                $dialogo = $rs->Pag_dialogo ;   
                //echo "<script>alert('".$marca."');</script>";
            } else {
                throw new PDOException("Erro: Não foi possível executar a declaração sql");
            }
        } catch (PDOException $erro) {
            echo "Erro: ".$erro->getMessage();
        }
    }
?>
<?php
    if($_POST){
        $id = $_POST['txtid'];
        $categoria = $_POST['txtmarca'];
        $sinopse = $_POST['txtmodelo'];
        $titulo = $_POST['txtpreco'];
        
        include "../conexao.php";

        try {
            $stmt = $conexao->prepare("UPDATE tbl_paginas SET Pag_alt_1 =?, Pag_alt_2 =?, Pag_dialogo =?, WHERE Pag_id =?");
            $stmt->bindParam(1, $Pag_alt_1); 
            $stmt->bindParam(2, $Pag_alt_2);
            $stmt->bindParam(3, $dialogo);
            $stmt->bindParam(4, $id);
            if($stmt->execute()){
                if($stmt->rowCount()>0){
                    header('location: listarhis.php');
                }else{
                    //throw new PDOException("Erro: Não foi possível executar a declaração sql");
                    echo "Erro: Não foi possível executar a declaração sql";
                }
            }else{
                echo "Erro na execução do cadastro!";
            }            
        } catch (PDOException $erro) {
            echo "Erro na conexão:" . $erro->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar</title>
    <!--Materialize-->
    <link rel="stylesheet" href="materialize/css/materialize.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
 <link type="text/css">
 
    <!--Icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <style type="text/css">
* {
  color:white;
  text-align: center; 
  color: black;
}
.bc {
    margin-left: 35px;
    margin-right: 45px;
}
</style>
</head>
<body>
       <!-- Barra de tarefas -->
       <header>
        <div id="title">
        <a href="#"><h1>Choose Your <br> Destiny</h1></a>
         <link href="style.css" rel="stylesheet">
        </div>
        

        <ul>
            <a href="../adm/index.php"><li>Painel Admin</li></a>
            
        </ul>
    </header>

<br>
<br>
<br>
<br>
<br>
<div class="bc">  
  <div class="row">
  <form action="" method="post" class="col s12">
  <input type="hidden" name="txtid" value = '<?php echo "{$id}";?>'/>
      <div class="row">
        <div class="input-field col s12 center">
        <input id="txtmodelo" type="text" name="txtmodelo" class="validate"  value = '<?php echo "{$Pag_alt_1}";?>'>
          <label for="modelo">Categoria</label>
        </div>
        <div class="input-field col s12 center">
        <input id="txtmarca" type="text" name="txtmarca" class="validate"  value = '<?php echo "{$Pag_alt_2}";?>'>
          <label for="marca">Sinopse</label>
        </div>
        <div class="input-field col s12 center">
        <input id="txtpreco" type="text" step="0.02" name="txtpreco" class="validate"  value = '<?php echo "{$dialogo}";?>'>
          <label for="">Titulo</label>
        </div>
    
      <div class="row">
                <button class="btn waves-effect waves-light" type="submit" name="action">Alterar</button>
                <a href="editpag.php"><button class="btn waves-effect waves-light" type="button" name="action">Cancelar</button></a>
            </div>
            </form>
  </div>
    <!--JavaScript-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="materialize/js/materialize.js"></script>
    <script>
        M.AutoInit();
    </script>
</body>
</html>

<?php
    if($_POST){
        $id = $_POST['txtid'];
        $Pag_alt_1 = $_POST['txtmarca'];
        $Pag_alt_2 = $_POST['txtmodelo'];
        $dialogo = $_POST['txtpreco'];
        
        include "../conexao.php";

        try {
         
            $stmt = $conexao->prepare("UPDATE tbl_paginas SET Pag_alt_1 =?, Pag_alt_2 =?, Pag_dialogo =?, WHERE Pag_id =?");
            $stmt->bindParam(1, $Pag_alt_1); 
            $stmt->bindParam(2, $Pag_alt_2);
            $stmt->bindParam(3, $dialogo);
            $stmt->bindParam(4, $id);
            if($stmt->execute()){
                if($stmt->rowCount()>0){
                    header('location: editpag.php');
                }else{

                    echo "Erro: Não foi possível executar a declaração sql";
                }
            }else{
                echo "Erro na execução do cadastro!";
            }            
        } catch (PDOException $erro) {
            echo "Erro na conexão:" . $erro->getMessage();
        }
    }
?>
