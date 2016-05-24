<?php   
require("conetion.php");
#$con = conexao() or die ("Banco de dados não está acessível");
if(isset($_GET['linha'])){
  $Linha = $_GET ['linha'];
}else{
  $Linha = '';
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
    <form method="get" action="index.php">
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
    <h2>
    <?php
      #Mostra nome da linha
      $resultado = mysqli_query($con,"SELECT Nome FROM tlinha where CodLin = '$Linha';");
      
      while ($linha = mysqli_fetch_array($resultado)){
        $NomeLinha = $linha["Nome"];
        echo "$NomeLinha";
      }
    ?>

    </h2>
    <br>
    <?php
    // Se nenhuma linha selecionada, não mostra nada
    if(strcmp($Linha,'') == 0){ 
      echo "$linha";
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
                  $Horario = $linha["Horario"];
                  $Horario = date('H:i',strtotime($Horario));
                  echo "<i class=\"material-icons\">accessible</i>$Horario<br>";
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
                  $Horario = $linha["Horario"];
                  $Horario = date('H:i',strtotime($Horario));
                  echo "<i class=\"material-icons\">accessible</i>$Horario<br>";
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
                  $Horario = $linha["Horario"];
                  $Horario = date('H:i',strtotime($Horario));
                  echo "<i class=\"material-icons\">accessible</i>$Horario<br>";
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
                  $Horario = $linha["Horario"];
                  $Horario = date('H:i',strtotime($Horario));
                  echo "<i class=\"material-icons\">accessible</i>$Horario<br>";
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
                  $Horario = $linha["Horario"];
                  $Horario = date('H:i',strtotime($Horario));
                  echo "<i class=\"material-icons\">accessible</i>$Horario<br>";
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
                  $Horario = $linha["Horario"];
                  $Horario = date('H:i',strtotime($Horario));
                  echo "<i class=\"material-icons\">accessible</i>$Horario<br>";
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
                  $Horario = $linha["Horario"];
                  $Horario = date('H:i',strtotime($Horario));
                  echo "<i class=\"material-icons\">accessible</i>$Horario<br>";
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
                  $Horario = $linha["Horario"];
                  $Horario = date('H:i',strtotime($Horario));
                  echo "<i class=\"material-icons\">accessible</i>$Horario<br>";
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
                  $Horario = $linha["Horario"];
                  $Horario = date('H:i',strtotime($Horario));
                  echo "<i class=\"material-icons\">accessible</i>$Horario<br>";
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