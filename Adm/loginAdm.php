
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../Login/boneco.css" rel="stylesheet">
    <link href="../Login/fonts.css" rel="stylesheet">
    <link href="../Login/Style.css" rel="stylesheet">
    <title>Choose your destiny</title>
</head>

<body>
    <header>
        <div id="title">
            <h1>Choose Your</h1>
            <h1> Destiny</h1>
        </div>
        <ul>
            <a href="../home/index.php" id="inscreva-se-btn"><li>Inicio</li></a>
        </ul>
        <ul>
        </ul>
    </header>

    <main>
        <div id="login-form">
            <div class="character">
                <div class="eyes">
                    <div class="eye"></div>
                    <div class="eye"></div>
                </div>
            </div>
            <form class="col s12" method="post" id="formlogin" name="formlogin" action="../Adm/logarAdm.php">
            <input class="username" type="text" placeholder="Email" name = "Adm_email" maxlength="256">
            <input class="password" type="password" placeholder="Senha" name="Adm_senha">
            <input type="submit" value="Login">
            </form>
        </div>
    </main>

</body>




<script type="text/javascript" src="script.js"></script>



</html>