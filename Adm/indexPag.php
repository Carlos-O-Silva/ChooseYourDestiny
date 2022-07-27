
<?php
include '../conexao.php';
session_start();
if (!isset($_SESSION['Adm_email'])) {
  header('location:../Adm/loginAdm.php');
}


//Pegar ID Historia
$sth = $conexao->prepare("SELECT max(his_id) as his_id FROM tbl_historia;");
$sth->execute();
$num = $sth->rowCount();
if ($num > 0) {
    $rs = $sth->fetch(PDO::FETCH_OBJ);
    $id = $rs->his_id;
}
?>

<!DOCTYPE html>
<?php
include '../conexao.php';
?>
<html>
<head>
  <title>Admin</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="../Adm/dark.css">
  <link href="../cadastro/style.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="qfc-light.css"> -->

</head>

<body>
<header>

        <div id="title">
        <a href="../Home/index.php"><h1> Choose Your  <br> Destiny</h1></a>
        </div>

        <ul>
            <a href="../adm/index.php"><li>Painel Admin</li></a>
        </ul>
    </header>
    <form action="cadastrarPag.php" method="post" enctype="multipart/form-data">
        <div class="qfc-container">
          <h2>Insira a página A</h2>    
          <label>Insira as informações das páginas.</label>
          <br>
          <b>Insira o Sub nivel A.</b>
          
          <input type="hidden" name="txtid" value="<?php echo $id?>">
            <div>
              <div>
                  <input placeholder="Diálogo" type="text" name="Pag_dialogoA" required>
              </div>

            <div>
                <input placeholder="Alternativa A" type="text" name="Pag_Alt_1A" required>
            </div>
            <div>
                <input placeholder="Alternativa B" type="text" name="Pag_Alt_2A" required>
            </div>
            
            <div>
                <label>Entre com a página</label>
                
                    <label for="imagem">:</label>
                    <input type="file" name="pag_fotoA"/>

                    <h2>Insira a página B</h2>   
                    
                      <div>
                        <div>
                            <input placeholder="Diálogo" type="text" name="Pag_dialogoB" required>
                        </div>

                      <div>
                          <input placeholder="Alternativa A" type="text" name="Pag_Alt_1B" required>
                      </div>
                      <div>
                          <input placeholder="Alternativa B" type="text" name="Pag_Alt_2B" required>
                      </div>
                      
                      <div>
                          <label>Entre com a página</label>

                              <label for="imagem">:</label>
                              <input type="file" name="pag_fotoB"/>
             </div>
                    
                          <div>
                                <button type="submit">Submit</button>
                          </div>
                    </form>
             </div>

             
</body>
</html>