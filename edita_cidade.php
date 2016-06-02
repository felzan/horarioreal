<?php
require("conetion.php");
#$con = conexao() or die ("Banco de dados não está acessível");

if(isset($_GET['ok'])){
  $Ok = $_GET ['ok'];
}else{
  $Ok = '';
}
if(isset($_GET['codcid'])){
  $CodCid = $_GET['codcid'];
}else{
  $CodCid = '';
}
if(isset($_GET['nome'])){
  $Nome = $_GET['nome'];
}else{
  $Nome = '';
}
if(isset($_GET['novonome'])){
  $NovoNome = $_GET['novonome'];
}else{
  $NovoNome = '';
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
  <title>Alterar cidade</title>
</head>
<body>
  <div class="all">
    <br>
<?php
  if($Ok == 'false'){
    echo "Altere a cidade.";
    ?>
    <form class="" action="edita_cidade.php?ok=ok&codcid=<?php echo "$CodCid"; ?>" method="get">
      <?php
      $resultado = mysqli_query($con,"SELECT * FROM tcidade where CodCid = '$CodCid';");
      while ($linha = mysqli_fetch_array($resultado)){
        $CodCid = $linha["CodCid"];
        $Nome = $linha["Nome"];
      ?>
      <input type="hidden" name="codcid" value="<?php echo $CodCid; ?>">
      <label>Nome: </label><input type="text" name="novonome" value="<?php echo $Nome; ?>">
      <br>
      <input type="submit" name="" value="OK">
    </form>
      <a href="panel.php?menu=8"><button type="button">< Voltar</button></a>

<?php
  }
  }else{
    mysqli_query($con,"UPDATE tcidade SET Nome = '$NovoNome' WHERE CodCid = '$CodCid';");
    ?><h3>Alterado!</h3>

      <a href="panel.php?menu=8"><button type="button">< Voltar</button></a>
    <?php
  }
    ?>
</body>
</html>
<?php
  mysqli_close($con);
?>
