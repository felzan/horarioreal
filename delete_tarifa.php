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
  if($Del == "false"){

    $resultado = mysqli_query($con,"SELECT * FROM thorario WHERE CodTar = '$CodTar';");
      while ($linha = mysqli_fetch_array($resultado)){
        $CodTar = $linha["CodTar"];
        $Nome = $linha["Nome"];
        $CodEmp = $linha["CodEmp"];
        $Preco = $linha["Preco"];

        echo "<p>Deseja deletar a tarifa <b>$Nome</b> da empresa <b>$CodEmp</b>, com o preço de <b>$Preco</b></p>";
        echo "<a href=\"delete_linha.php?codtar=$CodLin&del=true\"><button type=\"button\">DELETAR</button></a>";
        echo "<a href=\"admin.php?linha=$CodLin\"><button type=\"button\">< Voltar</button></a>";
      }
  }else{
    $resultado = mysqli_query($con,"SELECT * FROM tlinha WHERE CodLin = '$CodLin';");
      while ($linha = mysqli_fetch_array($resultado)){
        $Nome = $linha["Nome"];
      }
    mysqli_query($con,"DELETE FROM tlinha WHERE CodLin = '$CodLin';");
    mysqli_query($con,"DELETE FROM thorario WHERE CodLin = '$CodLin';");
    ?><h3>Excluído!</h3>
      <a href="admin.php"><button type="button">< Voltar</button></a>
    <?php
  }
    ?>
</body>
</html>
<?php
  mysqli_close($con);
?>
