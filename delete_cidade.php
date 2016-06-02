<?php
require("conetion.php");
#$con = conexao() or die ("Banco de dados não está acessível");
if(isset($_GET['codcid'])){
  $CodCid = $_GET['codcid'];
}else{
  $CodCid = '';
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
  <title>Cidade</title>
</head>
<body>
  <div class="all">
    <h2>Admin</h2>
    <br>
<?php
  if($Del == 'false'){

    $resultado = mysqli_query($con,"SELECT * FROM tcidade WHERE CodCid = '$CodCid';");
      while ($linha = mysqli_fetch_array($resultado)){
        $Nome = $linha["Nome"];
        $CodCid = $linha["CodCid"];

        echo "<p>Deseja deletar a cidade <b>$Nome</b>?</p>";
        echo "<a href=\"delete_cidade.php?codcid=$CodCid&del=true\"><button type=\"button\">DELETAR</button></a>";
        echo "<a href=\"panel.php?menu=8\"><button type=\"button\">< Voltar</button></a>";
      }
  }else{
    mysqli_query($con,"DELETE FROM tcidade WHERE CodCid = '$CodCid';");
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
