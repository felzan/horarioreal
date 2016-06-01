<?php
require("conetion.php");
#$con = conexao() or die ("Banco de dados não está acessível");
if(isset($_GET['menu'])){
  $Menu = $_GET ['menu'];
}else{
  $Menu = '';
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
  <title>Painel administrativo</title>
</head>
<body>
  <div class="container-fluid">
    <div class="blank-space">
      <h2 class="">Painel administrativo</h2>
    </div>
    <div class="row">
      <div class="sidebar col-sm-3">
        <ul class="nav nav-sidebar">
          <li><a href="panel.php?menu=1">Linhas</a></li>
          <li><a><del>Horários</del></a></li>
          <li><a href="panel.php?menu=3">Tarifas</a></li>
          <li><a href="panel.php?menu=4">Tabelas</a></li>
          <li><a href="panel.php?menu=5">Motoristas</a></li>
          <li><a href="panel.php?menu=6">Ônibus</a></li>
          <li><a href="panel.php?menu=7">Empresas</a></li>
          <li><a href="panel.php?menu=8">Cidades</a></li>
        </ul>
      </div>
      <div class="col-sm-offset-3 mr-15">
        <?php
          switch ($Menu) {
            case 1:
            ?>

            <h3 class="">Manuteção de linhas</h3>

            <div class="panel panel-primary">
              <div class="panel-heading">
                <span>Incluir: </span>


                <form class="novalinha" action="nova_linha.php" method="get" accept-charset="utf-8">
                  <input type="text" name="novalinha" class="" value="" placeholder="Nome da linha">
                  <input type="text" name="novalinhaabr" class="" value="" placeholder="Abreviatura da linha">
                  <input type="submit" name="" value="OK">
                </form>
              </div>

                <table class="table">

                <? #SELECIONA AS LINHAS
                $resultado = mysqli_query($con,"SELECT CodLin,AbrLin,Nome FROM tlinha order by Nome;");
                while ($linha = mysqli_fetch_array($resultado)){
                  $CodLin = $linha["CodLin"];
                  $AbrLin = $linha["AbrLin"];
                  $Nome = $linha["Nome"];
                ?>

                  <tr>
                    <td>
                      <p><a class="nsize" href="delete_linha.php?codlin=<?php echo $CodLin; ?>&del=false">X</a> | <a class="nsize" href="admin.php?linha=<?php echo $CodLin; ?>">D</a></p>
                    </td>
                    <td>
                      <p><?php echo "$Nome"; ?></p>
                    </td>
                    <td>
                      <p><?php echo "$AbrLin"; ?></p>
                    </td>
                  </tr>

                <?
                }
                ?>
                </table>
              </div>

            <?php

            break;

            case 2:

            break;

            case 3:
            ?>
              <h3 class="">Manuteção de tarifas</h3>

              <div class="panel panel-primary">
                <div class="panel-heading">
                  <span>Incluir: </span>
                  <form class="novalinha" action="nova_tarifa.php" method="get" accept-charset="utf-8">
                    <input type="number" min="0" style="width:135px;" name="novatarifaemp" class="novatarifa" value="" placeholder="Cód da empresa">
                    <input type="text" name="novatarifa" class="novatarifa" value="" placeholder="Nome da tarifa">
                    <input type="text" style="width:100px;" name="novatarifavalor" class="novatarifa" value="" placeholder="Valor">
                    <input type="submit" name="" value="OK">
                  </form>
                </div>

                  <table class="table">

                  <? #SELECIONA AS TARIFAS
                  $resultado = mysqli_query($con,"SELECT CodTar,CodEmp,Nome,Preco FROM ttarifa order by Preco DESC;");
                  while ($linha = mysqli_fetch_array($resultado)){
                    $CodTar = $linha["CodTar"];
                    $CodEmp = $linha["CodEmp"];
                    $Nome = $linha["Nome"];
                    $Preco = $linha["Preco"];
                  ?>

                    <tr>
                      <td>
                        <p><a class="nsize" href="delete_tarifa.php?codtar=<?php echo $CodTar; ?>&del=false">X</a> | <a class="nsize" href="admin.php">D</a></p>
                      </td>
                      <td>
                        <p><?php echo $CodEmp; ?></p>
                      </td>
                      <td>
                        <p><?php echo $Nome; ?></p>
                      </td>
                      <td>
                        <p><?php echo $Preco; ?></p>
                      </td>
                    </tr>

                  <?
                  }
                  ?>
                  </table>
                </div>

            <?php
            break;

            case 4:

            break;

            case 5:
            ?>
              <h3 class="">Manuteção de motoristas</h3>

              <div class="panel panel-primary">
                <div class="panel-heading">
                  <span>Incluir: </span>
                  <form class="novalinha" action="nova_tarifa.php" method="get" accept-charset="utf-8">
                    <input type="text" name="novatarifa" class="novatarifa" value="novatarifa">
                    <input type="submit" name="" value="OK">
                  </form>
                </div>

                  <table class="table">

                  <? #SELECIONA AS TARIFAS
                  $resultado = mysqli_query($con,"SELECT CPF,Nome,CNH FROM tmotorista order by Nome DESC;");
                  while ($linha = mysqli_fetch_array($resultado)){
                    $CPF = $linha["CPF"];
                    $CNH = $linha["CNH"];
                    $Nome = $linha["Nome"];
                  ?>

                    <tr>
                      <td>
                        <p>X | D</p>
                      </td>
                      <td>
                        <p><?php echo $CPF; ?></p>
                      </td>
                      <td>
                        <p><?php echo $CNH; ?></p>
                      </td>
                      <td>
                        <p><?php echo $Nome; ?></p>
                      </td>
                    </tr>

                  <?
                  }
                  ?>
                  </table>
                </div>

            <?php
            break;

            case 6:
            ?>
              <h3 class="">Manuteção de ônibus</h3>

              <div class="panel panel-primary">
                <div class="panel-heading">
                  <span>Incluir: </span>
                  <form class="novalinha" action="nova_tarifa.php" method="get" accept-charset="utf-8">
                    <input type="text" name="novatarifa" class="novatarifa" value="novatarifa">
                    <input type="submit" name="" value="OK">
                  </form>
                </div>

                  <table class="table">

                  <? #SELECIONA AS TARIFAS
                  $resultado = mysqli_query($con,"SELECT CodBus,Ano,Placa,Elevador,Ar FROM tonibus order by CodBus DESC;");
                  while ($linha = mysqli_fetch_array($resultado)){
                    $CodBus = $linha["CodBus"];
                    $Ano = $linha["Ano"];
                    $Placa = $linha["Placa"];
                    $Elevador = $linha["Elevador"];
                    $Ar = $linha["Ar"];
                  ?>

                    <tr>
                      <td>
                        <p>X | D</p>
                      </td>
                      <td>
                        <p><?php echo $Placa; ?></p>
                      </td>
                      <td>
                        <p><?php echo $Ano; ?></p>
                      </td>
                      <td>
                        <p><?php echo $Elevador; ?></p>
                      </td>
                      <td>
                        <p><?php echo $Ar; ?></p>
                      </td>
                    </tr>

                  <?
                  }
                  ?>
                  </table>
                </div>

            <?php
            break;
            case 7:
            ?>
              <h3 class="">Manuteção de empresas</h3>

              <div class="panel panel-primary">
                <div class="panel-heading">
                  <span>Incluir: </span>
                  <form class="novalinha" action="nova_tarifa.php" method="get" accept-charset="utf-8">
                    <input type="text" name="novatarifa" class="novatarifa" value="novatarifa">
                    <input type="submit" name="" value="OK">
                  </form>
                </div>

                  <table class="table">

                  <? #SELECIONA AS TARIFAS
                  $resultado = mysqli_query($con,"SELECT CodEmp,Nome FROM tempresa order by CodEmp DESC;");
                  while ($linha = mysqli_fetch_array($resultado)){
                    $CodEmp = $linha["CodEmp"];
                    $Nome = $linha["Nome"];
                  ?>

                    <tr>
                      <td>
                        <p>X | D</p>
                      </td>
                      <td>
                        <p><?php echo $CodEmp; ?></p>
                      </td>
                      <td>
                        <p><?php echo $Nome; ?></p>
                      </td>
                    </tr>

                  <?
                  }
                  ?>
                  </table>
                </div>

            <?php
            break;
            case 8:
            ?>
              <h3 class="">Manuteção de ônibus</h3>

              <div class="panel panel-primary">
                <div class="panel-heading">
                  <span>Incluir: </span>
                  <form class="novalinha" action="nova_tarifa.php" method="get" accept-charset="utf-8">
                    <input type="text" name="novatarifa" class="novatarifa" value="novatarifa">
                    <input type="submit" name="" value="OK">
                  </form>
                </div>

                  <table class="table">

                  <? #SELECIONA AS TARIFAS
                  $resultado = mysqli_query($con,"SELECT CodCid,Nome FROM tcidade order by CodCid DESC;");
                  while ($linha = mysqli_fetch_array($resultado)){
                    $CodCid = $linha["CodCid"];
                    $Nome = $linha["Nome"];
                  ?>

                    <tr>
                      <td>
                        <p>X | D</p>
                      </td>
                      <td>
                        <p><?php echo $CodCid; ?></p>
                      </td>
                      <td>
                        <p><?php echo $Nome; ?></p>
                      </td>
                    </tr>

                  <?
                  }
                  ?>
                  </table>
                </div>

            <?php
            break;

            default:
              # code...
              break;
          }
         ?>

        </div>
    </div>
  </div>


  <?php
  mysqli_close($con);
  ?>
</body>
</html>
