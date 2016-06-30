<?php
require("conetion.php");
#$con = conexao() or die ("Banco de dados não está acessível");
if(isset($_GET['novatarifaemp'])){
  $Novatarifaemp = $_GET ['novatarifaemp'];
}else{
  $Novatarifaemp = '';
}
if(isset($_GET['novatarifa'])){
  $Novatarifa = $_GET ['novatarifa'];
}else{
  $Novatarifa = '';
}
if(isset($_GET['novatarifavalor'])){
  $Novatarifavalor = $_GET ['novatarifavalor'];
}else{
  $Novatarifavalor = '';
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
    if(empty($Novatarifaemp) OR empty($Novatarifa) OR empty($Novatarifavalor)){
      echo "<p>Nenhum valor pode estar vazio</p><br>";
    }else{
      echo "<p> <b>Deseja incluir a tarifa <b>$Novatarifa</b> na empresa <b>$Novatarifaemp</b> com o valor <b>$Novatarifavalor</b> ?</p><br>";
    ?>
      <a href="panel.php?menu=3"><button type=" submit" class="btn btn-lg btn-defalt">Voltar</button>
     <a href="nova_tarifa.php?novatarifaemp=<?php echo "$Novatarifaemp"; ?>&novatarifa=<?php echo "$Novatarifa"; ?>&novatarifavalor=<?php echo "$Novatarifavalor"; ?>&ok=true"><button type=" submit" class="btn btn-lg btn-defalt">Incluir</button>
<?php
    }
  }else{
    mysqli_query($con,"INSERT into ttarifa(CodEmp, Nome, Preco) Values ('$Novatarifaemp','$Novatarifa','$Novatarifavalor')");
    ?>
     <div class="alert alert-success">
        <strong>Success!</strong> Ônibus incluido com sucesso.
    </div>
           <a href="panel.php?menu=3"><button type=" submit" class="btn btn-lg btn-defalt">Voltar</button></a>
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
