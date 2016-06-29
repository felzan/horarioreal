<?php
require("conetion.php");
#$con = conexao() or die ("Banco de dados não está acessível");
if(isset($_GET['codhor'])){
  $CodHor = $_GET ['codhor'];
}else{
  $CodHor = '';
}

if(isset($_GET['newhorario'])){
  $Newhorario = $_GET ['newhorario'];
}else{
  $Newhorario = '';
}
if(isset($_GET['elevador'])){
  $Elevador = $_GET ['elevador'];
}else{
  $Elevador = '';
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
    <title>Painel administrativo - Horários</title>
</head>
<body>
<div class="tudo">
    <div class="blank-space">
      <h2 class="">Painel administrativo - Horários</h2>
    </div>
    <br>
    <div class="select-linhas">
<?php
global $CodLin;
global $CodDia;
global $Horario;
global $Nome;
global $DescDia;
  if($Newhorario == ''){
    $resultado = mysqli_query($con,"SELECT * FROM thorario WHERE CodHor = '$CodHor';");
      while ($linha = mysqli_fetch_array($resultado)){
        $Horario = $linha["Horario"];
        $CodHor = $linha["CodHor"];
        $CodLin = $linha["CodLin"];
        $CodDia = $linha["CodDia"];
        $Elevador = $linha["Elevador"];
      }
    $resultado = mysqli_query($con,"SELECT DescDia FROM tdia WHERE CodDia = '$CodDia';");
      while ($linha = mysqli_fetch_array($resultado)){
        $DescDia = $linha["DescDia"];
      }
    $resultado = mysqli_query($con,"SELECT * FROM tlinha WHERE CodLin = '$CodLin';");
      while ($linha = mysqli_fetch_array($resultado)){
        $Nome = $linha["Nome"];
      }
    echo "<p>Deseja alterar o horário <b>$Horario</b> da linha <b>$Nome</b> de <b>$DescDia</b></p>";
    echo "<p></p>";
    echo "<form action=\"update.php\" method=\"get\">";
    echo "<input type=\"hidden\" name=\"codhor\" value=\"$CodHor\">";
    echo "<label>Novo Horário: <input type=\"time\" name=\"newhorario\" autofocus></label>";
    echo "&nbsp;&nbsp;&nbsp;<label class=\"checkbox-inline\"><input type=\"checkbox\" name=\"elevador\" value=\"1\" ";
    echo ($Elevador == 1) ? "checked" : "";
    echo ">Elevador</label>";

    echo "<br>";
    echo"<button type= submit class=btn btn-lg btn-defalt>Alterar</button>";
    echo"&nbsp &nbsp &nbsp";
    echo "<a href=\"admin.php?linha=$CodLin\"><button type= submit class=btn btn-lg btn-defalt>&nbspVoltar&nbsp</button></a>";
    echo "</form>";
  }else{
    $resultado = mysqli_query($con,"SELECT * FROM thorario WHERE CodHor = '$CodHor';");
      while ($linha = mysqli_fetch_array($resultado)){
        $CodLin = $linha["CodLin"];
      }

    mysqli_query($con,"UPDATE thorario SET Horario = '$Newhorario', Elevador = '$Elevador' WHERE CodHor = '$CodHor';");
    ?>
    <div class="alert alert-success">
        <strong>Success!</strong> Horário alterado com sucesso.
    </div>
    <?php

      $resultado = mysqli_query($con,"SELECT * FROM thorario WHERE CodHor = '$CodHor';");
        while ($linha = mysqli_fetch_array($resultado)){
          $Horario = $linha["Horario"];
          $CodHor = $linha["CodHor"];
          $CodLin = $linha["CodLin"];
          $CodDia = $linha["CodDia"];

          echo "<p>Novo horário <b>$Horario</b>!</p>";
        }

    ?>

      <a href="admin.php?linha=<?php echo $CodLin; ?>"><button type="button" class="btn btn-default">Voltar</button/a>
    <?php
  }
    ?>
           </p>
          </div>
        </div>
     </div>
</body>
</html>
<?php
  mysqli_close($con);
?>
