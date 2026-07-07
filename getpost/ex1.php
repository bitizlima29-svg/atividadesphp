<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>



<body>
<h1>resultado da Soma</h1>   
<?php
$num1 = $_POST['num1'];
$num2 = $_POST['num2'];
$num3 = $_POST['num3'];
$num4 = $_POST['num4'];


$soma = $num1 + $num2 + $num3 + $num4 ;

echo "<p>A soma dos números é: " . $soma . "</p>";

?>
</body>
</html>
 