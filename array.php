<?php 
$aprovado = 0;
$alunos = [
    (object)["nome" => "João", "nota" => 90],
    (object)["nome" => "Maria", "nota" => 100],
    (object)["nome" => "José", "nota" => 50],
    (object)["nome" => "Ana", "nota" => 80]
];
 
   foreach ($alunos as $aluno) {
     if ($aluno ->nota >= 80) {
     $aprovado ++;
 
    }
}
echo "quantos candidatos foram aprovados? $aprovado";

?>

<?php  
$aprovado = 0;
$reprovado = 0;
$alunos = [
    (object)["nome" => "João", "nota" => 90],
    (object)["nome" => "Maria", "nota" => 100],
    (object)["nome" => "José", "nota" => 50],
    (object)["nome" => "Ana", "nota" => 80]
];
 
   foreach ($alunos as $aluno) {
     if ($aluno ->nota >= 80) {
     $aprovado ++;
 
    }
    else {
        $reprovado ++;
    }
}
echo "quantos candidatos foram aprovados? $aprovado";
echo "quantos candidatos foram reprovados? $reprovado";
?>
