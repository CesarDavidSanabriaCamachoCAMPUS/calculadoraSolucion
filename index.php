<?php
    session_start();
    if (isset($_POST['numero']) || isset($_POST['operator'])) {
        if($_POST['operator'] == "c"){
            $_SESSION['num1'] = null;
        }else if($_POST['operator'] == "←"){
            $_SESSION['num1'] = substr($_SESSION['num1'],0, -1);
        }else if ($_POST['operator'] == "+" || $_POST['operator'] == "-" || $_POST['operator'] == "*" || $_POST['operator'] == "/" || $_POST['operator'] == "%" || $_POST['operator'] == "√" || $_POST['operator'] == "x²"){
            $_SESSION['number1'] = $_POST['num1'];
            $_SESSION['operatorItem'] = $_POST['operator'];
            $_SESSION['num1'] = null;
        }else{
            if (isset($_SESSION['num1'])) {
                $_SESSION['num1'] .= $_POST['numero'];
            } else {
                $_SESSION['num1'] =  $_POST['numero'];
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="sp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="resultado" value="<?php echo isset($_SESSION['num1']) ? $_SESSION['num1'] :0;?>">
        <button type="submit" name="numero" value="1">1</button>
        <button type="submit" name="numero" value="2">2</button>
        <button type="submit" name="numero" value="3">3</button>
        <button type="submit" name="operator" value="c">c</button>
        <button type="submit" name="operator" value="←">←</button>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>