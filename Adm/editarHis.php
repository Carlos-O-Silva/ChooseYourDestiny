<?php
    // Bloco if que recupera as informações no formulário, etapa utilizada pelo Update
    // Verifica se foi enviando dados via GET
    if ($_GET) {
        $id = (isset($_GET["cod"]) && $_GET["cod"] != null) ? $_GET["cod"] : "";
        //echo "<script>alert('".$id."');</script>";
        include "../conexao.php";
        try {
            $stmt = $conexao->prepare("SELECT * FROM tbl_historia WHERE his_id = ?");
            $stmt->bindParam(1, $id);
            if ($stmt->execute()) {
                $rs = $stmt->fetch(PDO::FETCH_OBJ);
                $id = $rs->his_id;
                $categoria = $rs->His_Categoria;
                $sinopse = $rs->His_Sinopse;
                $titulo = $rs->His_Titulo;   
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
        $categoria = $_POST['txtmodelo'];
        $sinopse = $_POST['txtmarca'];
        $titulo = $_POST['txtpreco'];
        
        include "../conexao.php";

        try {
            $stmt = $conexao->prepare("UPDATE tbl_historia SET His_Categoria=?, His_Sinopse=?, His_Titulo=? WHERE his_id=?");
            $stmt->bindParam(1, $categoria); 
            $stmt->bindParam(2, $sinopse);
            $stmt->bindParam(3, $titulo);
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
        <input id="txtmodelo" type="text" name="txtmodelo" class="validate"  value = '<?php echo "{$categoria}";?>'>
          <label for="modelo">Genero</label>
        </div>
        <div class="input-field col s12 center">
        <input id="txtmarca" type="text" name="txtmarca" class="validate"  value = '<?php echo "{$sinopse}";?>'>
          <label for="marca">Sinopse</label>
        </div>
        <div class="input-field col s12 center">
        <input id="txtpreco" type="text" step="0.02" name="txtpreco" class="validate"  value = '<?php echo "{$titulo}";?>'>
          <label for="">Titulo</label>
        </div>
    
      <div class="row">
                <button class="btn waves-effect waves-light" type="submit" name="action">Alterar</button>
                <a href="edit.php"><button class="btn waves-effect waves-light" type="button" name="action">Cancelar</button></a>
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
        $categoria = $_POST['txtmodelo'];
        $sinopse = $_POST['txtmarca'];
        $titulo = $_POST['txtpreco'];
        
        include "../conexao.php";

        try {
         
            $stmt = $conexao->prepare("UPDATE tbl_historia SET His_Categoria=?, His_Sinopse=?, His_Titulo=? WHERE his_id=?");
            $stmt->bindParam(1, $categoria); 
            $stmt->bindParam(2, $sinopse);
            $stmt->bindParam(3, $titulo);
            $stmt->bindParam(4, $id);
            if($stmt->execute()){
                if($stmt->rowCount()>0){
                    header('location: edit.php');
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
