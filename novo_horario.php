<?php   
require("conetion.php");
#$con = conexao() or die ("Banco de dados não está acessível");
if(isset($_GET['novohorario'])){
  $Novohorario = $_GET ['novohorario'];
}else{
  $Novohorario = '';
}
if(isset($_GET['dia'])){
  $Novohorario_dia = $_GET ['dia'];
}else{
  $Novohorario_dia = '';
}
if(isset($_GET['linha'])){
  $Novohorario_linha = $_GET ['linha'];
}else{
  $Novohorario_linha = '';
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
    echo "<h2>Deseja incluir o horário $Novohorario no dia $Novohorario_dia na linha $Novohorario_linha ?</h2><br>";
    ?>
      <a href="admin.php"><button type="button">< Voltar</button></a>
      <a href="novo_horario.php?linha=<?php echo "$Novohorario_linha"; ?>&novohorario=<?php echo "$Novohorario"; ?>&dia=<?php echo "$Novohorario_dia"; ?>&ok=true"><button type="button">Incluir</button></a>
<?php
  }else{
    mysqli_query($con,"INSERT into thorario(Horario, CodDia, CodLin) Values ('$Novohorario','$Novohorario_dia','$Novohorario_linha')");
    ?><h3>Inserido!</h3>
      
      <a href="admin.php?linha=<?php echo "$Novohorario_linha"; ?>"><button type="button">< Voltar</button></a>
    <?php
  }
    ?>
</body>
</html>
<?php
  mysqli_close($con);
?>