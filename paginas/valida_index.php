<?php
if ($_POST) {
    if ($_POST['opcao'] == 1) {
        $_SESSION['subnivel'] = "A";
    } else if ($_POST['opcao'] == 2) {
        $_SESSION['subnivel'] = "B";
    }
    echo $_SESSION['subnivel'];
    //$_SESSION['nivel'] -= 1;
    $_SESSION['Pag_id'] = 0;
    $_SESSION['Pag_dialogo'] = "";
    $_SESSION['Pag_alt_1'] = "";
    $_SESSION['Pag_alt_2'] = "";
    $_SESSION['pag_img'] = "";
    //header("location: index.php");
}
