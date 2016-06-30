<?php
require("conetion.php");
#$con = conexao() or die ("Banco de dados não está acessível");

global $Codtar;
if(isset($_GET['codmot'])){
  $CodMot = $_GET ['codmot'];
}else{
  $CodMot = '';
}
if(isset($_GET['ok'])){
  $Ok = $_GET ['ok'];
}else{
  $Ok = '';
}
if(isset($_GET['nome'])){
  $Nome = $_GET['nome'];
}else{
  $Nome = '';
}
if(isset($_GET['cpf'])){
  $CPF = $_GET['cpf'];
}else{
  $CPF = '';
}
if(isset($_GET['cnh'])){
  $CNH = $_GET['cnh'];
}else{
  $CNH = '';
}
if(isset($_GET['novocpf'])){
  $NovoCPF = $_GET['novocpf'];
}else{
  $NovoCPF = '';
}
if(isset($_GET['novonome'])){
  $NovoNome = $_GET['novonome'];
}else{
  $NovoNome = '';
}
if(isset($_GET['novocnh'])){
  $NovoCNH = $_GET['novocnh'];
}else{
  $NovoCNH = '';
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
<body>
    <div class="tudo">
    <div class="blank-space">
      <h2 class="">Painel administrativo</h2>
    </div>
        <div class="select-linhas">
    <br>
<?php
  if($Ok == 'false'){
    echo "Altere o motorista.";
    ?>
    <form class="" action="edita_motorista.php?ok=ok&codmot=<?php echo "$CodMot"; ?>" method="get">
      <?php
      $resultado = mysqli_query($con,"SELECT * FROM tmotorista where CodMot = '$CodMot';");
      while ($linha = mysqli_fetch_array($resultado)){
        $CodMot = $linha["CodMot"];
        $Nome = $linha["Nome"];
        $CPF = $linha["CPF"];
        $CNH = $linha["CNH"];
      ?>
      <input type="hidden" name="codmot" value="<?php echo $CodMot; ?>">
      <label>CPF: </label><input type="text" required name="novocpf" value="<?php echo $CPF; ?>">
      <br>
      <label>Nome: </label><input type="text" required name="novonome" value="<?php echo $Nome; ?>">
      <br>
      <label>CNH: </label><input type="text" required name="novocnh" value="<?php echo $CNH; ?>">
      <br>
      <input type="submit" name="" value="OK">
    </form>
      <a href="panel.php?menu=5"><button type="button">< Voltar</button></a>

<?php
  }
  }else{
    mysqli_query($con,"UPDATE tmotorista SET CPF = '$NovoCPF', Nome = '$NovoNome', CNH = '$NovoCNH' WHERE CodMot = '$CodMot';");
    ?>
        <div class="alert alert-success">
        <strong>Success!</strong> Motorista alterado com sucesso.
    </div>
        <a href="panel.php?menu=5"><button type=" submit" class="btn btn-lg btn-defalt">Voltar</button></a>

    <?php
  }
    ?>
</body>
</html>
<?php
  mysqli_close($con);
?>
