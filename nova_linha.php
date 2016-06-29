<?php
require("conetion.php");
#$con = conexao() or die ("Banco de dados não está acessível");
if(isset($_GET['novalinha'])){
  $Novalinha = $_GET ['novalinha'];
}else{
  $Novalinha = '';
}
if(isset($_GET['novalinhaabr'])) {
  $Novalinhaabr = $_GET ['novalinhaabr']; #abreviatura
} else {
  $Novalinhaabr = '';
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
  <title>Cadastro: <?php echo "$Novalinha"; ?></title>
</head>
<body>
    <div class="tudo">
    <div class="blank-space">
      <h2 class="">Painel administrativo - Horários</h2>
    </div>
    <br>
    <div class="select-linhas">
<?php
  if($Ok == ""){
    echo "<p <b>Deseja incluir a linha ".$Novalinha." ?</b></p><br>";
    ?>
      <a href="admin.php"><button type=" submit" class="btn btn-lg btn-defalt">Voltar</button>
      <a href="nova_linha.php?novalinha=<?php echo "$Novalinha"; ?>&novalinhaabr=<?php echo $Novalinhaabr; ?>&ok=true"><button type=" submit" class="btn btn-lg btn-defalt">Incluir</button></a>
<?php
  }else{
    mysqli_query($con,"INSERT into tlinha(Nome,AbrLin) Values ('$Novalinha','$Novalinhaabr')");
    ?>
    <div class="alert alert-success">
        <strong>Success!</strong> Linha incluida com sucesso.
    </div>
           <a href="admin.php"><button type=" submit" class="btn btn-lg btn-defalt">Voltar</button></a>
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
