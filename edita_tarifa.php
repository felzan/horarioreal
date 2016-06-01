<?php
require("conetion.php");
#$con = conexao() or die ("Banco de dados não está acessível");

global $Codtar;
if(isset($_GET['codtar'])){
  $Codtar = $_GET ['codtar'];
}else{
  $Codtar = '';
}
if(isset($_GET['ok'])){
  $Ok = $_GET ['ok'];
}else{
  $Ok = '';
}
if(isset($_GET['codemp'])){
  $CodEmp = $_GET['codemp'];
}else{
  $CodEmp = '';
}
if(isset($_GET['nome'])){
  $Nome = $_GET['nome'];
}else{
  $Nome = '';
}
if(isset($_GET['preco'])){
  $Preco = $_GET['preco'];
}else{
  $Preco = '';
}
if(isset($_GET['novocodemp'])){
  $NovoCodEmp = $_GET['novocodemp'];
}else{
  $NovoCodEmp = '';
}
if(isset($_GET['novonome'])){
  $NovoNome = $_GET['novonome'];
}else{
  $NovoNome = '';
}
if(isset($_GET['novopreco'])){
  $NovoPreco = $_GET['novopreco'];
}else{
  $NovoPreco = '';
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
    echo "Altere a tarfia.";
    ?>
    <form class="" action="edita_tarifa.php?ok=ok&codtar=<?php echo "$Codtar"; ?>" method="get">
      <?php
      $resultado = mysqli_query($con,"SELECT * FROM ttarifa where CodTar = '$Codtar';");
      while ($linha = mysqli_fetch_array($resultado)){
        $CodTar = $linha["CodTar"];
        $CodEmp = $linha["CodEmp"];
        $Nome = $linha["Nome"];
        $Preco = $linha["Preco"];
      ?>
      <input type="hidden" name="codtar" value="<?php echo $CodTar; ?>">
      <label>Cód Emp: </label><input type="text" name="novocodemp" value="<?php echo $CodEmp; ?>">
      <br>
      <label>Nome: </label><input type="text" name="novonome" value="<?php echo $Nome; ?>">
      <br>
      <label>Preço: </label><input type="text" name="novopreco" value="<?php echo $Preco; ?>">
      <br>
      <input type="submit" name="" value="OK">
    </form>
      <a href="panel.php?menu=3"><button type="button">< Voltar</button></a>

<?php
  }
  }else{
    mysqli_query($con,"UPDATE ttarifa SET CodEmp = '$NovoCodEmp', Nome = '$NovoNome', Preco = '$NovoPreco' WHERE CodTar = '$Codtar';");
    ?><h3>Alterado!</h3>

      <a href="panel.php?menu=3"><button type="button">< Voltar</button></a>
    <?php
  }
    ?>
</body>
</html>
<?php
  mysqli_close($con);
?>
