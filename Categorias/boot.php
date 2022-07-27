
<?php
include '../conexao.php';
session_start();
$_SESSION['nivel'] = 0;
$_SESSION['subnivel'] = "A";

if (!isset($_SESSION['Usu_email'])) {
    header('location:../Login/login.php');
}
$id = $_SESSION['Usu_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Categorias</title>
</head>

<body>

<nav class="navbar bg-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Offcanvas navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</nav>
    
    <?php
    include "../conexao.php";
    try {
        $stmt = $conexao->prepare("SELECT * FROM tbl_usuario WHERE Usu_id = " . $id . ";");
        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $Usu_id = $rs->Usu_id;
                $Usu_foto = $rs->Usu_foto;
                $Usu_email = $rs->Usu_email;
                $Usu_nickname = $rs->Usu_nickname;
            }
        }
    } catch (PDOException $erro) {
        echo "Erro na conexão:" . $erro->getMessage();
    }
    ?>
   <!--  <header>
        <div id="title">
            <a href="../home/index.php">
                <h1>Choose Your <br> Destiny</h1>
            </a>
        </div>


        <ul>
            <a href="../Login/logout.php">
                <li>Sair</li>
            </a>
            <a href="../Usuario/index.php" id="inscreva-se-btn">
                <li><?php echo $Usu_nickname; ?></li>
            </a>
        </ul>
    </header> -->


<div class="container">
    <div class="row">
    <?php
    try {
        $stmt = $conexao->prepare("SELECT * FROM tbl_historia ORDER BY his_id DESC LIMIT 15;");
        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                $his_id = $rs->his_id;
                $His_Titulo = $rs->His_Titulo;
                $His_Sinopse = $rs->His_Sinopse;
                $His_Categoria = $rs->His_Categoria;
                $His_CapaHistoria = $rs->His_CapaHistoria;

                echo "
                        <div class='col-12 col-sm-6 col-md-4 col-xl-3 mt-3'>
                        <div class='card '>
                            <img class='img-fluid' src='../img/capaHistoria/$His_CapaHistoria'>
                            <h2 class='fs-3 text p-2 '>$His_Titulo</h2>
                            <p class='p-2'>$His_Categoria</p>
                            <p class='p-2'>$His_Sinopse</p>
                            <a class='bottomText' href='../paginas/index.php?cod=$his_id'>Ler História</a>
                        </div>
                        </div>
                       ";
            }
        }
    } catch (PDOException $erro) {
        echo "Erro na conexão:" . $erro->getMessage();
    }
    ?>

        </div>
    </div>
</div>



</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</html>