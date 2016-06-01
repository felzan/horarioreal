<?php
require("conetion.php");
#$con = conexao() or die ("Banco de dados não está acessível");
if(isset($_GET['codmot'])){
  $CodMot = $_GET['codmot'];
}else{
  $CodMot = '';
}
#Verifica deletar OK?
if(isset($_GET['del'])){
  $Del = $_GET['del'];
}else{
  $Del = '';
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
  <title>Horário</title>
</head>
<body>
  <div class="all">
    <h2>Admin</h2>
    <br>
<?php
global $CodLin;
  if($Del == 'false'){

    $resultado = mysqli_query($con,"SELECT * FROM tmotorista WHERE CodMot = '$CodMot';");
      while ($linha = mysqli_fetch_array($resultado)){
        $CodMot = $linha["CodMot"];
        $Nome = $linha["Nome"];
        $CPF = $linha["CPF"];
        $CNH = $linha["CNH"];

        echo "<p>Deseja deletar o motorista <b>$Nome</b> de CPF:<b>$CPF</b> e de CNH:<b>$CNH</b></p>";
        echo "<a href=\"delete_motorista.php?codmot=$CodMot&del=true\"><button type=\"button\">DELETAR</button></a>";
        echo "<a href=\"panel.php?menu=5\"><button type=\"button\">< Voltar</button></a>";
      }
  }else{
    mysqli_query($con,"DELETE FROM tmotorista WHERE CodMot = '$CodMot';");
    ?>
      <h3>Excluído!</h3>
      <a href="panel.php"><button type="button">< Voltar</button></a>
    <?php
  }
    ?>
</body>
</html>
<?php
  mysqli_close($con);
?>
