<?php
require("conetion.php");
#$con = conexao() or die ("Banco de dados não está acessível");
if(isset($_GET['nome'])){
  $Nome = $_GET ['nome'];
}else{
  $Nome = '';
}
if(isset($_GET['CPF'])){
  $CPF = $_GET ['CPF'];
}else{
  $CPF = '';
}
if(isset($_GET['CNH'])){
  $CNH = $_GET ['CNH'];
}else{
  $CNH = '';
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
  <div class="all">
    <br>
<?php
  if($Ok == ''){
    echo "<h2>Deseja incluir o motorista <b>$Nome</b> de CPF:<b>$CPF</b> e de CNH:<b>$CNH</b> ?</h2><br>";
    ?>
      <a href="panel.php?menu=5"><button type="button">< Voltar</button></a>
      <a href="novo_motorista.php?nome=<?php echo "$Nome"; ?>&CPF=<?php echo "$CPF"; ?>&CNH=<?php echo "$CNH"; ?>&ok=ok"><button type="button">Incluir</button></a>
<?php
  }else{
    mysqli_query($con,"INSERT into tmotorista(Nome, CPF, CNH) Values ('$Nome','$CPF','$CNH')");
    ?><h3>Inserido!</h3>

      <a href="panel.php?menu=5"><button type="button">< Voltar</button></a>
    <?php
  }
    ?>
</body>
</html>
<?php
  mysqli_close($con);
?>
