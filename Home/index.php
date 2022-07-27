<?php
if(!isset($_SESSION))
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../Home/fonts.css" >
    <link rel="stylesheet" type="text/css" href="../Home/Style.css" >
    <link rel="stylesheet" type="text/css" href="../Home/footer.css" >
    <title>Choose your destiny</title>

    
</head>

<body>  
    <header>
       
        <div id="title">
        <a href="../Home/index.php"><h1> Choose Your <br> Destiny</h1></a>
        </div>
        <ul>
            <a href="../home/index.php"><li>Início</li></a>
            <a href="../sobre/index.php"><li>Sobre</li></a>
            <a href="../Login/login.php" id="inscreva-se-btn"><li>Já tem uma conta?</li></a>
    </header>


    <main>
        <aside>
            <h2><span>Cadastre-se agora</span></h2>
            <h2><br|>E escolha seu destino</h2>
            <p>
            Um mundo de imaginação onde você é o protagonista, escolhendo sua própria história.
Faça seu caminho e fique no controle.
Leitura é o que importa!
            </p>
            <form>
               <a href="../Cadastro/cadastro.php"> <input type="button" value="Cadastrar"></a>
            </form>
        </aside>

        <article>
             <img src="../components/images/77d0a7c454e658833800528e748edbe9.png" alt="mulher-roxa"> 
        </article> 
    </main>
    <body>
     <!-- <footer>
        <div class="footer-bottom">
            <p>copyright &copy;2022 Choose Your destiny designed by <span>?</span></p>
        </div>
    </footer>  -->
</body>
</html>