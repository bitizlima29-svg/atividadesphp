<php

$id = $_POST ['id' ];

$ sql = "SELECT * FROM FORM WHERW id = $id";

$resultado =$conexão -> query($sql);

$cliente = $resultado -> fecth_assoc();

if (!$cliente) {
    echo 'Cliente não encontrado.';
    exit;
}
?>

<html>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
     crossorigin="anonymous"></script>
    
</head>
 <link rel="stylesheet" href="./css/style.css">
<body>
    <form class="./salvarclientes.php" method="POST">
        <h1> Editar Cliente</h1>
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Nome</label>
            <input type="text" class="form-control" id="validationCustom01" value="" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Sobrenome</label>
            <input type="text" class="form-control" id="validationCustom02" value="" required>
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustomUsername" class="form-label">Usuario</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                       Escreva o Usuario .
                    </div>
                </div>
        </div>
        <div class="col-md-6">
            <label for="validationCustom03" class="form-label">cidade</label>
            <input type="text" class="form-control" id="validationCustom03" required>
            <div class="invalid-feedback">
                Escreva a Cidade.
            </div>
        </div>
      
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                    Concorda com os termos
                </label>
                <div class="invalid-feedback">
                    You must agree before submitting.
                </div>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Enviar</button>
        </div>
    </form>
</body>

</html>

</html>