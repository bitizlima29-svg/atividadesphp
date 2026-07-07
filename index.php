<?php
include "conexao.php";

$numero1 = 21;
$numero2 = 23;

$resultado = $numero1 + $numero2;

$sql = "INSERT INTO calculo ( numero1, numero2, resultado)
VALUES ($numero1, $numero2,$resultado)";


if ($conexao->query($sql)) {
    echo "Dados salvos com sucesso!"; 
}
else {
    echo "Erro ao salvar";
};

 ?>