<?php
include '../conexao.php';
session_start();
if (!isset($_SESSION['Adm_email'])) {
  header('location:../Adm/loginAdm.php');
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
            <a href="../Adm/index.php"><li>Voltar</li></a>
        </ul>
    </header>
    <form action="cadastrarHis.php" method="post" enctype="multipart/form-data">
        <div class="qfc-container">
          <h2>Insira sua Historia</h2>
          <label>Insira as informações da história.</label>
          <form>
            <div>
              <div>
                  <input placeholder="Nome da sua história" type="text" name="His_Titulo" required>
              </div>

            <div>
                <input placeholder="Sinopse da história" type="text" name="His_Sinopse" required>
            </div>
            <div>
              <label>Coloque genero da sua historia</label>
              <select name = "His_Categoria" id = "His_Categoria">
                            <option disabled selected value="--">Escolha o gênero da história</option>
                            <option value="Ação">Ação</option>
                            <option value="Aventura">Aventura</option>
                            <option value="Comédia">Comedia</option>
                            <option value="ComédiA Romantica">Comédia Romantica</option>
                            <option value="Drama">Drama</option>
                            <option value="Ficção Cientifica">Ficção Cientifica</option>
                            <option value="Historico">Historico</option>
                            <option value="Infantil">Infantil</option>
                            <option value="Romance">Romance</option>
                            <option value="Suspense">Suspense</option>
                        </select>
            </div>
            <div>
                <label>Entre com a capa da história</label>
                <form action="gravar.php" method="POST" enctype="multipart/form-data">
                    <label for="imagem">Imagem:</label>
                    <input type="file" name="His_CapaHistoria"/>
                          </form>
                                </div>
                                    <div>
                                      <button type="submit">Submit</button>
                                    </div>
                                </div>
                          </form>
             </div>
</body>
</html>