<?php
    session_start();
    if (isset($_POST['numero']) || isset($_POST['operator'])) {
        if($_POST['numero'] == "c"){
            $_SESSION = null;
        }else if($_POST['numero'] == "←"){
            $_SESSION['num1'] = substr($_SESSION['num1'],0, -1);
        }else if ($_POST['operator'] == "+" || $_POST['operator'] == "-" || $_POST['operator'] == "*" || $_POST['operator'] == "/" || $_POST['operator'] == "%" || $_POST['operator'] == "√" || $_POST['operator'] == "x²"){
            $_SESSION['number1'] = $_SESSION['num1'];
            $_SESSION['operatorItem'] = $_POST['operator'];
            $_SESSION['num1'] = null;
        }else{
            if (isset($_SESSION['num1'])) {
                $_SESSION['num1'] .= $_POST['numero'];
            } else {
                $_SESSION['num1'] =  $_POST['numero'];
            }
        }
    };
    if(isset($_SESSION['operatorItem'])){
        if ($_POST['equal'] == "="){
            $_SESSION['number2'] = $_SESSION['num1'];
            $_SESSION['num1'] = null;
        };
    };
    switch($_SESSION["operatorItem"]){
        case"+":$answer = $_SESSION["number1"] + $_SESSION["number2"];break;
        case"-":$answer = $_SESSION["number1"] - $_SESSION["number2"];break;
        case"*":$answer = $_SESSION["number1"] * $_SESSION["number2"];break;
        case"/":if($_SESSION["number2"] != 0){
            $answer = $_SESSION["number1"] / $_SESSION["number2"];
        }else{
            $answer = "Syntax ERROR";
        };break;
        case"%":$answer = $_SESSION["number1"] % $_SESSION["number2"];break;
        case"√":$answer = sqrt($_SESSION["number1"]);
        case"x²":$answer = $_SESSION["number1"] ** $_SESSION["number2"];break;
    };
?>

<!DOCTYPE html>
<html lang="sp">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
    <form method="POST" class="form">
        <input type="text" name="resultado" value="<?php if(isset($_SESSION['num1'])){
                                                            echo $_SESSION['num1'];
                                                        }else if ($_POST["equal"] == "="){
                                                            echo $answer;
                                                        }else{
                                                            echo "0";
                                                        };
                                                        ?>">
        </br>
        <div class="buttonContainer">
            <button class="number" type="submit" name="numero" value="1">1</button>
            <button class="number"type="submit" name="numero" value="2">2</button>
            <button class="number" type="submit" name="numero" value="3">3</button>
            <button class="operator" type="submit" name="operator" value="+">+</button>
            <button class="operator" type="submit" name="operator" value="-">-</button>
        </div>
        </br>
        <div class="buttonContainer">
            <button class="number" type="submit" name="numero" value="4">4</button>
            <button class="number" type="submit" name="numero" value="5">5</button>
            <button class="number" type="submit" name="numero" value="6">6</button>
            <button class="operator" type="submit" name="operator" value="*">*</button>
            <button class="operator" type="submit" name="operator" value="/">/</button>
        </div>
        </br>
        <div class="buttonContainer">
            <button class="number" type="submit" name="numero" value="7">7</button>
            <button class="number" type="submit" name="numero" value="8">8</button>
            <button class="number" type="submit" name="numero" value="9">9</button>
            <button class="operator" type="submit" name="operator" value="√">√</button>
            <button class="operator" type="submit" name="operator" value="x²">x²</button>
        </div>
        </br>
        <div class="buttonContainer">
            <button class="deleteItem" type="submit" name="numero" value="←"><</button>
            <button class="number" type="submit" name="numero" value="0">0</button>
            <button class="deleteAll" type="submit" name="numero" value="c">c</button>
            <button class="operator" type="submit" name="operator" value="%">%</button>
            <button class="equal" type="submit" name="equal" value="=">=</button>
        </div>
    </form>
</body>
</html>