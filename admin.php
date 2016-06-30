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

  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <title>Horário <?php echo $Linha; ?></title>
</head>
<div class="tudo">
    <div class="all">
    <div class="blank-space">
      <h2 class="">Painel administrativo </h2>
    </div>
    <br>
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
          <button type="submit" class="btn btn-lg btn-defalt">Mostrar</button>
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
              <input type="hidden"name="novonomelinha" value="<?php echo $Linha; ?>">&nbsp;&nbsp;&nbsp;
              <input type="text" style="width:300px;" name="novonome" class="form-control"  value="<?php echo $NomeLinha; ?>">&nbsp;
              <br>
              <input type="text" style="width:100px;" name="novonomeabr" class="form-control"  value="<?php echo $Linhaabr; ?>">&nbsp;
              <input type="submit" name="" value="OK" class="btn btn-lg btn-defalt">

            <a class="delete" href="delete_linha.php?codlin=<?php echo $Linha; ?>&del=false"><i class="delete material-icons">delete_forever</i></a>
            </h2>
            </form>
    <br><br>
    <form action="novo_horario.php" method="get">
        <input type="hidden" name="linha" class="form-control" value="<?php echo $Linha; ?>">

        <p><label>Novo Horário: <input type="time" name="novohorario" class="form-control" ></label></p>

        <label class="checkbox-inline"><input type="checkbox" name="elevador" value="1">Elevador</label>&nbsp;

        <label class="checkbox-inline"><input type="checkbox" name="dia" value="1">Seg-Sex</label>&nbsp;

         <label class="checkbox-inline"><input type="checkbox" name="dia" value="2">Sábado</label>&nbsp;

        <label class="checkbox-inline"><input type="checkbox" name="dia" value="3">Domingo</label>&nbsp;

              <input type="submit" name="" value="Incluir" class="btn btn-lg btn-defalt">
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
      <form action="nova_linha.php" method="get" accept-charset="utf-8">
        <label>Inserir nova linha:</label>
        <input type="text" name="novalinha" id="usr" value="">
        <button type="submit" class="btn btn-lg btn-defalt">Ok</button>
      </form>
    </div>
    <?php
    }else{
    ?>
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
    <div class="dias">

    <ul class="nav nav-tabs">
        <li class="active">
            <a data-toggle="tab" href="#home">Seg-Sex</a>
        </li>
         <li>
             <a data-toggle="tab" href="#menu1">Sábado</a>
        </li>
         <li>
             <a data-toggle="tab" href="#menu2">Domingo/feriado</a>
        </li>
    </ul>

    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
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
                    $Elevador = $linha["Elevador"];
                    if ($Elevador == 1) {
                      echo "<i class=\"accessible material-icons\">accessible</i>";
                    }
                    echo "$Horario";

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
                    $Elevador = $linha["Elevador"];
                    if ($Elevador == 1) {
                      echo "<i class=\"accessible material-icons\">accessible</i>";
                    }
                    echo "$Horario";
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
                    $Elevador = $linha["Elevador"];
                    if ($Elevador == 1) {
                      echo "<i class=\"accessible material-icons\">accessible</i>";
                    }
                    echo "$Horario";
                    echo "<a href=\"delete.php?codhor=$CodHor&del=false\"><i class=\"delete material-icons\">delete</i></a>";
                    echo "<a href=\"update.php?codhor=$CodHor\"><i class=\"edit material-icons\">edit</i></a><br>";
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
        <div id="menu1" class="tab-pane fade">
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
                    $Elevador = $linha["Elevador"];
                    if ($Elevador == 1) {
                      echo "<i class=\"accessible material-icons\">accessible</i>";
                    }
                    echo "$Horario";
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
                    $Elevador = $linha["Elevador"];
                    if ($Elevador == 1) {
                      echo "<i class=\"accessible material-icons\">accessible</i>";
                    }
                    echo "$Horario";
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
                    $Elevador = $linha["Elevador"];
                    if ($Elevador == 1) {
                      echo "<i class=\"accessible material-icons\">accessible</i>";
                    }
                    echo "$Horario";
                    echo "<a href=\"delete.php?codhor=$CodHor&del=false\"><i class=\"delete material-icons\">delete</i></a>";
                    echo "<a href=\"update.php?codhor=$CodHor\"><i class=\"edit material-icons\">edit</i></a><br>";
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
        <div id="menu2" class="tab-pane fade">
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
                    $Elevador = $linha["Elevador"];
                    if ($Elevador == 1) {
                      echo "<i class=\"accessible material-icons\">accessible</i>";
                    }
                    echo "$Horario";
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
                    $Elevador = $linha["Elevador"];
                    if ($Elevador == 1) {
                      echo "<i class=\"accessible material-icons\">accessible</i>";
                    }
                    echo "$Horario";
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
                    $Elevador = $linha["Elevador"];
                    if ($Elevador == 1) {
                      echo "<i class=\"accessible material-icons\">accessible</i>";
                    }
                    echo "$Horario";
                    echo "<a href=\"delete.php?codhor=$CodHor&del=false\"><i class=\"delete material-icons\">delete</i></a>";
                    echo "<a href=\"update.php?codhor=$CodHor\"><i class=\"edit material-icons\">edit</i></a><br>";
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
    </div>

    <!--<div class="dias">
      <input type="radio" name="dia" id="chk1" class="chkbox1" checked="checked"></input>
      <label for="chk1">Seg-Sex</label>
      <input type="radio" name="dia" id="chk2" class="chkbox2"></input>
      <label for="chk2">Sábado</label>
      <input type="radio" name="dia" id="chk3" class="chkbox3"></input>
      <label for="chk3">Domingo</label>
      </div> -->
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
