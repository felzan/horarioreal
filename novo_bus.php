<?php
require("conetion.php");
#$con = conexao() or die ("Banco de dados não está acessível");
if(isset($_GET['ano'])){
  $Ano = $_GET ['ano'];
}else{
  $Ano = '';
}
if(isset($_GET['placa'])){
  $Placa = $_GET ['placa'];
}else{
  $Placa = '';
}
if(isset($_GET['elevador'])){
  $Elevador = $_GET ['elevador'];
}else{
  $Elevador = '0';
}
if(isset($_GET['ar'])){
  $Ar = $_GET ['ar'];
}else{
  $Ar = '0';
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
  if($Ok == ''){
    echo "<p <b>Deseja incluir o ônibus de placa <b>$Placa</b>, ano <b>$Ano</b>?</p><br>";
    ?>
             
           <a href="panel.php?menu=6"><button type=" submit" class="btn btn-lg btn-defalt">Voltar</button>
      <a href="novo_bus.php?placa=<?php echo "$Placa"; ?>&ano=<?php echo "$Ano"; ?>&elevador=<?php echo "$Elevador"; ?>&ar=<?php echo "$Ar"; ?>&ok=ok"><button type=" submit" class="btn btn-lg btn-defalt">Incluir</button>
          
<?php
  }else{
    mysqli_query($con,"INSERT into tonibus(Placa, Ano, Elevador, Ar) Values ('$Placa','$Ano','$Elevador','$Ar')");
    ?>
    <div class="alert alert-success">
        <strong>Success!</strong> Ônibus incluido com sucesso.
    </div>

      <a href="panel.php?menu=6"><button type=" submit" class="btn btn-lg btn-defalt">Voltar</button></a>
    <?php
  }
    ?>
          </div>
    </div>
</body>
</html>
<?php
  mysqli_close($con);
?>
