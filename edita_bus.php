<?php
require("conetion.php");
#$con = conexao() or die ("Banco de dados não está acessível");

global $Codtar;
if(isset($_GET['codbus'])){
  $CodBus = $_GET ['codbus'];
}else{
  $CodBus = '';
}
if(isset($_GET['ok'])){
  $Ok = $_GET ['ok'];
}else{
  $Ok = '';
}
if(isset($_GET['placa'])){
  $Placa = $_GET['placa'];
}else{
  $Placa = '';
}
if(isset($_GET['ano'])){
  $Ano = $_GET['ano'];
}else{
  $Ano = '';
}
if(isset($_GET['elevador'])){
  $Elevador = $_GET['elevador'];
}else{
  $Elevador = '';
}
if(isset($_GET['ar'])){
  $Ar = $_GET['ar'];
}else{
  $Ar = '';
}
if(isset($_GET['novaplaca'])){
  $NovaPlaca = $_GET['novaplaca'];
}else{
  $NovaPlaca = '';
}
if(isset($_GET['novoano'])){
  $NovoAno = $_GET['novoano'];
}else{
  $NovoAno = '';
}
if(isset($_GET['novoelevador'])){
  $NovoElevador = $_GET['novoelevador'];
}else{
  $NovoElevador = '';
}
if(isset($_GET['novoar'])){
  $NovoAr = $_GET['novoar'];
}else{
  $NovoAr = '';
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
  <title>Alterar tarifa</title>
</head>
<body>
  <div class="all">
    <br>
<?php
  if($Ok == 'false'){
    echo "Altere o ônibus.";
    ?>
    <form class="" action="edita_bus.php?ok=ok&codbus=<?php echo "$CodBus"; ?>" method="get">
      <?php
      $resultado = mysqli_query($con,"SELECT * FROM tonibus where CodBus = '$CodBus';");
      while ($linha = mysqli_fetch_array($resultado)){
        $CodMot = $linha["CodBus"];
        $Placa= $linha["Placa"];
        $Ano = $linha["Ano"];
        $Elevador = $linha["Elevador"];
        $Ar = $linha["Ar"];
      ?>
      <input type="hidden" name="codbus" value="<?php echo $CodBus; ?>">
      <label>Placa: </label><input type="text" name="novaplaca" value="<?php echo $Placa; ?>">
      <br>
      <label>Ano: </label><input type="number" min="1500" max="2100" name="novoano" value="<?php echo $Ano; ?>">
      <br>
      <label>Elevador: </label><input type="checkbox" name="novoelevador" value="1" <?php if($Elevador){echo "checked";} ?>>
      <br>
      <label>Ar: </label><input type="checkbox" name="novoar" value="1" <?php if($Ar){echo "checked";} ?>>
      <br>
      <input type="submit" name="" value="OK">
    </form>
      <a href="panel.php?menu=6"><button type="button">< Voltar</button></a>

<?php
  }
  }else{
    mysqli_query($con,"UPDATE tonibus SET Placa = '$NovaPlaca', Ano = '$NovoAno', Elevador = '$NovoElevador', Ar = '$NovoAr' WHERE CodBus = '$CodBus';");
    ?><h3>Alterado!</h3>

      <a href="panel.php?menu=6"><button type="button">< Voltar</button></a>
    <?php
  }
    ?>
</body>
</html>
<?php
  mysqli_close($con);
?>
