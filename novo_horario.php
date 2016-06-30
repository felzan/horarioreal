<?php
require("conetion.php");
#$con = conexao() or die ("Banco de dados não está acessível");
if(isset($_GET['novohorario'])){
  $Novohorario = $_GET ['novohorario'];
}else{
  $Novohorario = '';
}
if(isset($_GET['elevador'])){
  $Elevador = $_GET ['elevador'];
}else{
  $Elevador = '';
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
    <div class="tudo">
    <div class="blank-space">
      <h2 class="">Painel administrativo - Horários</h2>
    </div>
    <br>
    <div class="select-linhas">
<?php
  if($Ok == ""){
    if(empty($Novohorario) OR empty($Novohorario_dia) OR empty($Novohorario_linha)){
    echo "<p>Horário e dia não podem estar vazios</p><br>";
    ?>
      <a href="admin.php"><button type=" submit" class="btn btn-lg btn-defalt">Voltar</button></a>
    <?php
    }else {
      echo "<p <b>Deseja incluir o horário $Novohorario no dia $Novohorario_dia na linha $Novohorario_linha ?</b></p><br>";

    ?>
      <a href="admin.php"><button type=" submit" class="btn btn-lg btn-defalt">Voltar</button></a>
      <a href="novo_horario.php?linha=<?php echo "$Novohorario_linha"; ?>&novohorario=<?php echo "$Novohorario"; ?>&dia=<?php echo "$Novohorario_dia"; ?>&elevador=<?php echo "$Elevador"; ?>&ok=true"><button type=" submit" class="btn btn-lg btn-defalt">Incluir</button></a>
<?php
    }
  }else{
    mysqli_query($con,"INSERT into thorario(Horario, CodDia, CodLin, Elevador) Values ('$Novohorario','$Novohorario_dia','$Novohorario_linha', '$Elevador')");
    ?>
    <div class="alert alert-success">
        <strong>Success!</strong> Linha incluida com sucesso.
    </div>

      <a href="admin.php?linha=<?php echo "$Novohorario_linha"; ?>"><button type=" submit" class="btn btn-lg btn-defalt">Voltar</button></a>

    <?php
  }
    ?>
</body>
</html>
<?php
  mysqli_close($con);
?>
