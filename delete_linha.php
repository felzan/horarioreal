<?php
require("conetion.php");
#$con = conexao() or die ("Banco de dados não está acessível");
if(isset($_GET['codlin'])){
  $CodLin = $_GET ['codlin'];
}else{
  $CodLin = '';
}
#Verifica deletar OK?
if(isset($_GET['del'])){
  $Del = $_GET ['del'];
}else{
  $Del = false;
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
    <div class="tudo">
    <div class="blank-space">
      <h2 class="">Painel administrativo</h2>
    </div>
        <div class="select-linhas">
    <br>
<?php
global $CodLin;
  if($Del == "false"){

    $resultado = mysqli_query($con,"SELECT * FROM tlinha WHERE CodLin = '$CodLin';");
      while ($linha = mysqli_fetch_array($resultado)){
        $Nome = $linha["Nome"];
      }


    echo "<p>Deseja deletar a linha <b>$Nome</b></p>";
    echo "<a href=\"delete_linha.php?codlin=$CodLin&del=true\"><button type=\"button\">DELETAR</button></a>";
    echo "<a href=\"admin.php?linha=$CodLin\"><button type=\"button\">< Voltar</button></a>";

  }else{
    $resultado = mysqli_query($con,"SELECT * FROM tlinha WHERE CodLin = '$CodLin';");
      while ($linha = mysqli_fetch_array($resultado)){
        $Nome = $linha["Nome"];
      }
    mysqli_query($con,"DELETE FROM tlinha WHERE CodLin = '$CodLin';");
    mysqli_query($con,"DELETE FROM thorario WHERE CodLin = '$CodLin';");
    ?>
    <div class="alert alert-success">
        <strong>Success!</strong> Linha exclúida com sucesso. 
    </div>
        <a href="panel.php"><button type=" submit" class="btn btn-lg btn-defalt">Voltar</button></a>
    <?php
  }
    ?>
</body>
</html>
<?php
  mysqli_close($con);
?>