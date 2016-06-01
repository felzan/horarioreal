<?php
require("conetion.php");
#$con = conexao() or die ("Banco de dados não está acessível");
if(isset($_GET['linha'])){
  $Linha = $_GET ['linha'];
}else{
  $Linha = '';
}
global $CodLin;
if(isset($_GET['novonome'])){
  $Novonome = $_GET['novonome'];
  $Novonomelinha = $_GET['novonomelinha'];
  mysqli_query($con,"UPDATE tlinha SET Nome = '$Novonome' WHERE CodLin = '$Novonomelinha';");
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
  <title>Horário <?php echo $Linha; ?></title>
</head>
<body>
  <div class="all">
    <h2>Admin</h2>
    <form method="get" action="admin.php">
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
          <button type="submit" class="btn btn-lg btn-success">Mostrar</button>
      </div>
    </form>

    <br>
    <hr>
    <?php

      if($Linha != ''){

        echo "<div class=\"nomelinha\">";

        #Mostra nome da linha
        $resultado = mysqli_query($con,"SELECT * FROM tlinha where CodLin = '$Linha';");

        while ($linha = mysqli_fetch_array($resultado)){
          $NomeLinha = $linha["Nome"];
          $Linhaabr = $linha["AbrLin"];
          ?>
          <h2>
            <form class="novalinha" action="admin.php" method="get" accept-charset="utf-8">
              <input type="hidden"name="novonomelinha" value="<?php echo $Linha; ?>">
              <input type="text" style="width:300px;" name="novonome" class="linhaoculta" value="<?php echo $NomeLinha; ?>">
              <br>
              <input type="text" style="width:100px;" name="novonomeabr" class="linhaoculta" value="<?php echo $Linhaabr; ?>">
              <input type="submit" name="" value="OK">
            <a class="delete" href="delete_linha.php?codlin=<?php echo $Linha; ?>&del=false"><i class="delete material-icons">delete_forever</i></a>
            </h2>
            </form>
            <form action="novo_horario.php" method="get">
              <input type="hidden" name="linha" value="<?php echo $Linha; ?>">
              <label>Novo Horário: <input type="time" name="novohorario"></label>
              <label>Seg. a Sex.<input type="radio" name="dia" value="1"></label>
              <label>Sábado<input type="radio" name="dia" value="2"></label>
              <label>Domingo<input type="radio" name="dia" value="3"></label>
              <button type="sumbit">Incluir</button>
            </form>
            <br>
          <?php
        }
      }
    ?>

    </h2>
    <br>
    <?php
    // Se nenhuma linha selecionada, mostrar incluir
    if(strcmp($Linha,'') == 0){
    ?>
      <form class="" action="nova_linha.php" method="get" accept-charset="utf-8">
        <label>Nova linha:</label>
        <input type="text" name="novalinha" class="" value="">
        <input type="submit" name="" value="OK">
      </form>
    </div>
    <?php
    }else{
    ?>
    <div class="dias">
      <input type="radio" name="dia" id="chk1" class="chkbox1" checked="checked"></input>
      <label for="chk1">Seg-Sex</label>
      <input type="radio" name="dia" id="chk2" class="chkbox2"></input>
      <label for="chk2">Sábado</label>
      <input type="radio" name="dia" id="chk3" class="chkbox3"></input>
      <label for="chk3">Domingo</label>

      <div class="horario">
        <?php
          $manha = "04:00";
          $Ameio = "11:59";
          $meio = "12:00";
          $Atarde = "17:59";
          $tarde = "18:00";
          $noite = "23:59";
        ?>
      <br>
        <div class="box" id="chkbox1">
          <div class="turnos">
            <div class="manha">
              <?php
                #Lista horarios MANHA
                # SELECT * FROM `thorario` WHERE `CodLin` = 3 AND `CodDia` = 1 AND `Horario` BETWEEN '04:00' AND '12:00'
                $resultado = mysqli_query($con,"SELECT * FROM thorario WHERE CodLin = '$Linha' AND CodDia = 1 AND Horario BETWEEN '$manha' AND '$Ameio' order by Horario;");
                $manha = mysqli_real_escape_string($con,$manha);
                $Ameio = mysqli_real_escape_string($con,$Ameio);
                while ($linha = mysqli_fetch_array($resultado)){
                  $CodHor = $linha["CodHor"];
                  $Horario = $linha["Horario"];
                  $Horario = date('H:i',strtotime($Horario));
                  echo "<i class=\"accessible material-icons\">accessible</i>$Horario";
                  echo "<a href=\"delete.php?codhor=$CodHor&del=false\"><i class=\"delete material-icons\">delete</i></a>";
                  echo "<a href=\"update.php?codhor=$CodHor\"><i class=\"edit material-icons\">edit</i></a><br>";
                }
              ?>
            </div>
            <div class="tarde">
              <?php
                #Lista horarios TARDE
                $resultado = mysqli_query($con,"SELECT * FROM thorario WHERE CodLin = '$Linha' AND CodDia = 1 AND Horario BETWEEN '$meio' AND '$Atarde' order by Horario;");
                $meio = mysqli_real_escape_string($con,$meio);
                $Atarde = mysqli_real_escape_string($con,$Atarde);
                while ($linha = mysqli_fetch_array($resultado)){
                  $CodHor = $linha["CodHor"];
                  $Horario = $linha["Horario"];
                  $Horario = date('H:i',strtotime($Horario));
                  echo "<i class=\"accessible material-icons\">accessible</i>$Horario";
                  echo "<a href=\"delete.php?codhor=$CodHor&del=false\"><i class=\"delete material-icons\">delete</i></a>";
                  echo "<a href=\"update.php?codhor=$CodHor\"><i class=\"edit material-icons\">edit</i></a><br>";
                }
              ?>
            </div>
            <div class="noite">
              <?php
                #Lista horarios NOITE
                $resultado = mysqli_query($con,"SELECT * FROM thorario WHERE CodLin = '$Linha' AND CodDia = 1 AND Horario BETWEEN '$tarde' AND '$noite' order by Horario;");
                $tarde = mysqli_real_escape_string($con,$tarde);
                $noite = mysqli_real_escape_string($con,$noite);
                while ($linha = mysqli_fetch_array($resultado)){
                  $CodHor = $linha["CodHor"];
                  $Horario = $linha["Horario"];
                  $Horario = date('H:i',strtotime($Horario));
                  echo "<i class=\"accessible material-icons\">accessible</i>$Horario";
                  echo "<a href=\"delete.php?codhor=$CodHor&del=false\"><i class=\"delete material-icons\">delete</i></a>";
                  echo "<a href=\"update.php?codhor=$CodHor\"><i class=\"edit material-icons\">edit</i></a><br>";
                }
              ?>
            </div>
          </div>
        </div>
        <div class="box" id="chkbox2">
          <div class="turnos">
            <div class="manha">
              <?php
                #Lista horarios MANHA
                # SELECT * FROM `thorario` WHERE `CodLin` = 3 AND `CodDia` = 1 AND `Horario` BETWEEN '04:00' AND '12:00'
                $resultado = mysqli_query($con,"SELECT * FROM thorario WHERE CodLin = '$Linha' AND CodDia = 2 AND Horario BETWEEN '$manha' AND '$meio' order by Horario;");
                $manha = mysqli_real_escape_string($con,$manha);
                $meio = mysqli_real_escape_string($con,$meio);
                while ($linha = mysqli_fetch_array($resultado)){
                  $CodHor = $linha["CodHor"];
                  $Horario = $linha["Horario"];
                  $Horario = date('H:i',strtotime($Horario));
                  echo "<i class=\"accessible material-icons\">accessible</i>$Horario";
                  echo "<a href=\"delete.php?codhor=$CodHor&del=false\"><i class=\"delete material-icons\">delete</i></a>";
                  echo "<a href=\"update.php?codhor=$CodHor\"><i class=\"edit material-icons\">edit</i></a><br>";
                }
              ?>
            </div>
            <div class="tarde">
              <?php
                #Lista horarios TARDE
                $resultado = mysqli_query($con,"SELECT * FROM thorario WHERE CodLin = '$Linha' AND CodDia = 2 AND Horario BETWEEN '$meio' AND '$tarde' order by Horario;");
                $meio = mysqli_real_escape_string($con,$meio);
                $tarde = mysqli_real_escape_string($con,$tarde);
                while ($linha = mysqli_fetch_array($resultado)){
                  $CodHor = $linha["CodHor"];
                  $Horario = $linha["Horario"];
                  $Horario = date('H:i',strtotime($Horario));
                  echo "<i class=\"accessible material-icons\">accessible</i>$Horario";
                  echo "<a href=\"delete.php?codhor=$CodHor&del=false\"><i class=\"delete material-icons\">delete</i></a>";
                  echo "<a href=\"update.php?codhor=$CodHor\"><i class=\"edit material-icons\">edit</i></a><br>";
                }
              ?>
            </div>
            <div class="noite">
              <?php
                #Lista horarios NOITE
                $resultado = mysqli_query($con,"SELECT * FROM thorario WHERE CodLin = '$Linha' AND CodDia = 2 AND Horario BETWEEN '$tarde' AND '$noite' order by Horario;");
                $tarde = mysqli_real_escape_string($con,$tarde);
                $noite = mysqli_real_escape_string($con,$noite);
                while ($linha = mysqli_fetch_array($resultado)){
                  $CodHor = $linha["CodHor"];
                  $Horario = $linha["Horario"];
                  $Horario = date('H:i',strtotime($Horario));
                  echo "<i class=\"accessible material-icons\">accessible</i>$Horario";
                  echo "<a href=\"delete.php?codhor=$CodHor&del=false\"><i class=\"delete material-icons\">delete</i></a>";
                  echo "<a href=\"update.php?codhor=$CodHor\"><i class=\"edit material-icons\">edit</i></a><br>";
                }
              ?>
            </div>
          </div>
        </div>
        <div class="box" id="chkbox3">
          <div class="turnos">
            <div class="manha">
              <?php
                #Lista horarios MANHA
                # SELECT * FROM `thorario` WHERE `CodLin` = 3 AND `CodDia` = 1 AND `Horario` BETWEEN '04:00' AND '12:00'
                $resultado = mysqli_query($con,"SELECT * FROM thorario WHERE CodLin = '$Linha' AND CodDia = 3 AND Horario BETWEEN '$manha' AND '$meio' order by Horario;");
                $manha = mysqli_real_escape_string($con,$manha);
                $meio = mysqli_real_escape_string($con,$meio);
                while ($linha = mysqli_fetch_array($resultado)){
                  $CodHor = $linha["CodHor"];
                  $Horario = $linha["Horario"];
                  $Horario = date('H:i',strtotime($Horario));
                  echo "<i class=\"accessible material-icons\">accessible</i>$Horario";
                  echo "<a href=\"delete.php?codhor=$CodHor&del=false\"><i class=\"delete material-icons\">delete</i></a>";
                  echo "<a href=\"update.php?codhor=$CodHor\"><i class=\"edit material-icons\">edit</i></a><br>";
                }
              ?>
            </div>
            <div class="tarde">
              <?php
                #Lista horarios TARDE
                $resultado = mysqli_query($con,"SELECT * FROM thorario WHERE CodLin = '$Linha' AND CodDia = 3 AND Horario BETWEEN '$meio' AND '$tarde' order by Horario;");
                $meio = mysqli_real_escape_string($con,$meio);
                $tarde = mysqli_real_escape_string($con,$tarde);
                while ($linha = mysqli_fetch_array($resultado)){
                  $CodHor = $linha["CodHor"];
                  $Horario = $linha["Horario"];
                  $Horario = date('H:i',strtotime($Horario));
                  echo "<i class=\"accessible material-icons\">accessible</i>$Horario";
                  echo "<a href=\"delete.php?codhor=$CodHor&del=false\"><i class=\"delete material-icons\">delete</i></a>";
                  echo "<a href=\"update.php?codhor=$CodHor\"><i class=\"edit material-icons\">edit</i></a><br>";
                }
              ?>
            </div>
            <div class="noite">
              <?php
                #Lista horarios NOITE
                $resultado = mysqli_query($con,"SELECT * FROM thorario WHERE CodLin = '$Linha' AND CodDia = 3 AND Horario BETWEEN '$tarde' AND '$noite' order by Horario;");
                $tarde = mysqli_real_escape_string($con,$tarde);
                $noite = mysqli_real_escape_string($con,$noite);
                while ($linha = mysqli_fetch_array($resultado)){
                  $CodHor = $linha["CodHor"];
                  $Horario = $linha["Horario"];
                  $Horario = date('H:i',strtotime($Horario));
                  echo "<i class=\"accessible material-icons\">accessible</i>$Horario";
                  echo "<a href=\"delete.php?codhor=$CodHor&del=false\"><i class=\"delete material-icons\">delete</i></a>";
                  echo "<a href=\"update.php?codhor=$CodHor\"><i class=\"edit material-icons\">edit</i></a><br>";
                }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php
}
?>
<?php
  mysqli_close($con);
?>
</body>
</html>
