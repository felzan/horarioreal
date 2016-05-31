<?php
require("conetion.php");
#$con = conexao() or die ("Banco de dados não está acessível");
if(isset($_GET['novalinha'])){
  $Novalinha = $_GET ['novalinha'];
  $Novalinhaabr = $_GET ['novalinhaabr']; #abreviatura
}else{
  $Novalinha = '';
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
  <div class="all">
    <br>
<?php
  if($Ok == ""){
    echo "<h2>Deseja incluir a linha ".$Novalinha." ?</h2><br>";
    ?>
      <a href="admin.php"><button type="button">< Voltar</button></a>
      <a href="nova_linha.php?novalinha=<?php echo "$Novalinha"; ?>&novalinhaabr=<?php echo $Novalinhaabr; ?>&ok=true"><button type="button">Incluir</button></a>
<?php
  }else{
    mysqli_query($con,"INSERT into tlinha(Nome,AbrLin) Values ('$Novalinha','$Novalinhaabr')");
    ?><h3>Inserido!</h3>

      <a href="admin.php"><button type="button">< Voltar</button></a>
    <?php
  }
    ?>
</body>
</html>
<?php
  mysqli_close($con);
?>
