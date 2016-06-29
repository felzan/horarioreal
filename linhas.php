<?php   
require("conetion.php");
#$con = conexao() or die ("Banco de dados não está acessível");
if(isset($_GET['linha'])){
  $Linha = $_GET ['linha'];
  $Dia = $_GET ['dia'];
}else{
  $Linha = '';
  $Dia = '';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css.css">
  <title>Horário <?php echo $Linha; ?></title>
</head>
<body>
    <div class="tudo">
        <div class="all">
    <div class="blank-space">
      <h2 class=""></h2>
    </div>
        <div class="select-linhas">
    <br>
  <form method="get" action="linhas.php">
    <div class="select-linhas">
      <select name="linha">
          <?php
          #Lista linhas cadastradas
          $resultado = mysqli_query($con,"SELECT CodLin,AbrLin,Nome FROM tlinha order by Nome;");
          while ($linha = mysqli_fetch_array($resultado)){
            $CodLin = $linha["CodLin"];
            $AbrLin = $linha["AbrLin"];
            $Nome = $linha["Nome"];
          ?>
        <option value="<?php echo "$CodLin"; ?>"><?php echo "$Nome"; ?></option>
        <?php } ?>
      </select>
        <button type="submit" class="btn btn-lg btn-default">Pesquisar</button>
    </div>
    <div class="radio-dias">
        <?php
        #Lista dias possíveis
        $resultado = mysqli_query($con,"SELECT CodDia,DescDia FROM tdia order by CodDia;");
        while ($linha = mysqli_fetch_array($resultado)){
          $CodDia = $linha["CodDia"];
          $DescDia = $linha["DescDia"];
        ?>
        <input type="radio" name="dia" value="<?php echo "$CodDia"; ?>" <?php if ($CodDia == 1) echo "checked=\"checked\""; ?>\><label for="<?php echo "$CodDia"; ?>"> <?php echo "$DescDia"; ?></label>

        <?php } ?>
        </div>
        <br>
    </form>
    <br>
    <hr>
    <h2>
    <?php
        #Mostra nome da linha
        $resultado = mysqli_query($con,"SELECT Nome FROM tlinha where CodLin = '$Linha';");
        while ($linha = mysqli_fetch_array($resultado)){
          $NomeLinha = $linha["Nome"];
        ?>
        <?php echo "$NomeLinha"; ?>
        <?php } ?>
    </h2>
    <br>
    <div class="horario">
    <?php
        #Lista horarios
        $resultado = mysqli_query($con,"SELECT * FROM thorario where CodDia = '$Dia' and CodLin = '$Linha' order by CodHor;");
        while ($linha = mysqli_fetch_array($resultado)){
          $Horario = $linha["Horario"];
        ?>
      <table>
        <tr>
          <td><?php echo "$Horario"; ?></td>
        </tr>
      </table>
        <?php } ?>

        <br>

    </div>
    </div>
</body>
</html>