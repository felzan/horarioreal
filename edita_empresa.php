<?php
require("conetion.php");
#$con = conexao() or die ("Banco de dados não está acessível");

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
  <title>Alterar tarifa</title>
</head>
<body>
    <div class="tudo">
    <div class="blank-space">
      <h2 class="">Painel administrativo</h2>
    </div>
        <div class="select-linhas">
    <br>
<?php
  if($Ok == 'false'){
    echo "Altere a tarfia.";
    ?>
    <form class="" action="edita_empresa.php?ok=ok&codemp=<?php echo "$CodEmp"; ?>" method="get">
      <?php
      $resultado = mysqli_query($con,"SELECT * FROM tempresa where CodEmp = '$CodEmp';");
      while ($linha = mysqli_fetch_array($resultado)){
        $CodEmp = $linha["CodEmp"];
        $Nome = $linha["Nome"];
      ?>
      <input type="hidden" name="codemp" value="<?php echo $CodEmp; ?>">
      <label>Nome: </label><input type="text" name="novonome" value="<?php echo $Nome; ?>">
      <br>
      <input type="submit" name="" value="OK">
    </form>
      <a href="panel.php?menu=7"><button type="button">< Voltar</button></a>

<?php
  }
  }else{
    mysqli_query($con,"UPDATE tempresa SET Nome = '$NovoNome' WHERE CodEmp = '$CodEmp';");
    ?>
    <div class="alert alert-success">
        <strong>Success!</strong> Empresa alterada com sucesso. 
    </div>
        <a href="panel.php?menu=7"><button type=" submit" class="btn btn-lg btn-defalt">Voltar</button></a>
          
    <?php
  }
    ?>
</body>
</html>
<?php
  mysqli_close($con);
?>
