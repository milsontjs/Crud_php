<?php
require 'Inicia.php';
$codigo = isset($_GET['codigo']) ? (int) $_GET['codigo'] : null;
if (empty($codigo)){
    echo "O nome do usuário para alteração não foi definido";
    exit;
}
$PDO = conecta_bd();
$stmt = $PDO->prepare("SELECT codigo,nome,email,cidade,estado,cep,sexo,cartao_credito FROM cadastroagenda6 WHERE codigo= :codigo");
$stmt->bindParam(':codigo', $codigo, PDO::PARAM_INT);
$stmt->execute();
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);
if ($resultado = ""){
    echo "Esse nome não foi encontrado na tabela";
    exit;
}?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilo_cadastro.css" media="screen">
    <title>Alteração</title>
  </head>
  <body>
    <section>
        <div class="jumbotron">
            <h1 class="display-3">Alteração de Cadastro</h1>
            <p class="lead">Complete suas informações</p>
            <hr class="my-1">
    </section>

    <section>
        <form action="altera.php" method="POST">
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" name= "nome" id="nome"  required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="sobrenome">Email</label>
                <input type="email" class="form-control" name= "email" id="email"  required>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" name= "cidade" id="cidade"  required>
              </div>

              <div class="col-md-3 mb-3">
                <label for="estado">Estado</label>
                <select class="form-control" name= "estado" id="estado" required>
                  <option selected disabled value="">Escolha</option>
                  <option>SP</option>
                  <option>SC</option>
                  <option>PR</option>
                  <option>RS</option>
                  <option>RJ</option>
                </select>
              </div>

              <div class="col-md-3 mb-3">
                <label for="cep">CEP</label>
                <input type="text" class="form-control" name= "cep" id="cep" pattern="^\d{5}-\d{3}$" required>
              </div>
            </div>

            <fieldset class="form-group">
                <div class="row">
                  <legend class="col-form-label col-sm-2 pt-0">Sexo:</legend>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="sexo" id="sexo" value="feminino" checked>
                      <label class="form-check-label" for="gridRadios1">
                        Feminino
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="sexo" id="sexo" value="masculino">
                      <label class="form-check-label" for="gridRadios2">
                        Masculino
                      </label>
                    </div>
                  </div>
                </div>
              </fieldset>

              <fieldset class="form-group">
                <div class="row">
                  <legend class="col-form-label col-sm-2 pt-0">Cartao de Credito:</legend>
                </div>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="cartao_credito" id="cartao_credito" value="visa" checked>
                      <label class="form-check-label" for="gridRadios1">
                        Visa
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="cartao_credito" id="cartao_credito" value="mastercard">
                      <label class="form-check-label" for="gridRadios2">
                        Mastercard
                      </label>
                    </div>
                  </div>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="cartao_credito" id="cartao_credito" value="elo" checked>
                      <label class="form-check-label" for="gridRadios1">
                        Elo
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="cartao_credito" id="cartao_credito" value="diners club">
                      <label class="form-check-label" for="gridRadios2">
                        Diners Club
                      </label>
                    </div>
                  </div>
                </div>
              </fieldset>
            <input type="hidden" name="codigo" value="<?=$codigo ?>">
            <button class="btn btn-primary" type="submit" name="cadastrar" onsubmit="Index.php">Alterar</button>
            <button class="btn btn-primary" type="reset" name="limpar">Limpar</button>
          </form>
    </section>
    <footer>
        Rafaella Ballerini Ribeiro Gomes
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>