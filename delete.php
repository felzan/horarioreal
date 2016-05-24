<?php
require("conetion.php");
#$con = conexao() or die ("Banco de dados não está acessível");
if(isset($_GET['codhor'])){
  $CodHor = $_GET ['codhor'];
}else{
  $CodHor = '';
}
$Del = $_GET ['del'];
#Verifica deletar OK?
/*
if(isset($_GET['del'])){
  $Del = $_GET ['del'];
}else{
  $Del = false;
}
*/
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
global $CodDia;
global $Horario;
global $Nome;
global $DescDia;
  if($Del == "false"){

    $resultado = mysqli_query($con,"SELECT * FROM thorario WHERE CodHor = '$CodHor';");
      while ($linha = mysqli_fetch_array($resultado)){
        $Horario = $linha["Horario"];
        $CodHor = $linha["CodHor"];
        $CodLin = $linha["CodLin"];
        $CodDia = $linha["CodDia"];
      }
    $resultado = mysqli_query($con,"SELECT DescDia FROM tdia WHERE CodDia = '$CodDia';");
      while ($linha = mysqli_fetch_array($resultado)){
        $DescDia = $linha["DescDia"];
      }
    $resultado = mysqli_query($con,"SELECT * FROM tlinha WHERE CodLin = '$CodLin';");
      while ($linha = mysqli_fetch_array($resultado)){
        $Nome = $linha["Nome"];
      }


    echo "<p>Deseja deletar o horário <b>$Horario</b> da linha <b>$Nome</b> de <b>$DescDia</b></p>";
    echo "<a href=\"delete.php?codhor=$CodHor&del=true\"><button type=\"button\">DELETAR</button></a>";
    echo "<a href=\"admin.php?linha=$CodLin\"><button type=\"button\">< Voltar</button></a>";

  }else{
    $resultado = mysqli_query($con,"SELECT * FROM thorario WHERE CodHor = '$CodHor';");
      while ($linha = mysqli_fetch_array($resultado)){
        $CodLin = $linha["CodLin"];
      }
    mysqli_query($con,"DELETE FROM thorario WHERE CodHor = '$CodHor';");
    ?><h3>Excluído!</h3>
      <a href="admin.php?linha=<?php echo $CodLin; ?>"><button type="button">< Voltar</button></a>
    <?php
  }
    ?>
</body>
</html>
<?php
  mysqli_close($con);
?>