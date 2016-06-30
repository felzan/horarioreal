<?php
require("conetion.php");
#$con = conexao() or die ("Banco de dados não está acessível");
if(isset($_GET['novacidade'])){
  $Novacidade = $_GET ['novacidade'];
}else{
  $Novacidade = '';
}
if(isset($_GET['ok'])){
  $Ok = $_GET ['ok'];
}else{
  $Ok = '';
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css.css">
  <title>Cadastro de cidade</title>
</head>
<body>
    <div class="tudo">
    <div class="blank-space">
      <h2 class="">Painel administrativo - Horários</h2>
    </div>
        <br>
    <div class="select-linhas">
<?php
  if($Ok == ''){
    if(empty($Novacidade)){
    echo "<p>Cidade não esta vazia</p><br>";
    ?>
      <a href="panel.php?menu=8"><button type=" button" class="btn btn-lg btn-defalt">Voltar</button>
    <?php
    }else {
    echo "<p> <b>Deseja incluir a cidade: <b>$Novacidade</b>?</p><br>";

    ?>
      <a href="panel.php?menu=8"><button type=" button" class="btn btn-lg btn-defalt">Voltar</button>
      <a href="nova_cidade.php?novacidade=<?php echo "$Novacidade"; ?>&ok=true"><button type=" submit" class="btn btn-lg btn-defalt">Incluir</button>
<?php
    }
  }else{
    mysqli_query($con,"INSERT into tcidade(Nome) Values ('$Novacidade')");
    ?>
    <div class="alert alert-success">
        <strong>Success!</strong> Cidade incluida com sucesso!
    </div>

      <a href="panel.php?menu=8"><button type=" submit" class="btn btn-lg btn-defalt">Voltar</button></a>
    <?php
  }
    ?>
        </div>
    </div>
</body>
</html>
<?php
  mysqli_close($con);
?>
