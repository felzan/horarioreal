<?php
require("conetion.php");
#$con = conexao() or die ("Banco de dados não está acessível");
if(isset($_GET['codtar'])){
  $CodTar = $_GET['codtar'];
}else{
  $CodTar = '';
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

    $resultado = mysqli_query($con,"SELECT * FROM ttarifa WHERE CodTar = '$CodTar';");
      while ($linha = mysqli_fetch_array($resultado)){
        $CodTar = $linha["CodTar"];
        $Nome = $linha["Nome"];
        $CodEmp = $linha["CodEmp"];
        $Preco = $linha["Preco"];

        echo "<p>Deseja deletar a tarifa <b>$Nome</b> da empresa <b>$CodEmp</b>, com o preço de <b>$Preco</b></p>";
        echo "<a href=\"delete_tarifa.php?codtar=$CodTar&del=true\"><button type=\"button\">DELETAR</button></a>";
        echo "<a href=\"panel.php?menu=3\"><button type=\"button\">< Voltar</button></a>";
      }
  }else{
    mysqli_query($con,"DELETE FROM ttarifa WHERE CodTar = '$CodTar';");
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
