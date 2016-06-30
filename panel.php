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
    <div class="bg">
  <div class="container-fluid">
    <div class="blank-space">
      <h2 class="">Painel administrativo</h2>
    </div>
    <div class="row">
      <div class="sidebar col-sm-3">
        <ul class="nav nav-sidebar">
          <li><a href="panel.php?menu=1">Linhas</a></li>
          <li class="none"><a><del>Horários</del></a></li>
          <li><a href="panel.php?menu=3">Tarifas</a></li>
          <li class="none"><a href="panel.php?menu=4">Tabelas</a></li>
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

    <div class="form-group"><input type="text" name="novalinha" placeholder="Nome da linha"class="form-control" id="usr"></div>&nbsp&nbsp

    <div class="form-group"><input type="text" name="novalinhaabr" placeholder="Abreviatura da linha" class="form-control" id="usr">
    </div>&nbsp&nbsp

         <div class="form-group"><input type="submit" name="Ok" value="OK" class="form-control" id="usr">
</div>
                </form>
              </div>

                <table class="table">
                  <tr>
                    <td>
<span class="glyphicon glyphicon-cog"></span>

                    </td>
                    <td>
                      Linhas
                    </td>
                    <td>
                      Abreviaturas
                    </td>
                  </tr>
                <? #SELECIONA AS LINHAS
                $resultado = mysqli_query($con,"SELECT CodLin,AbrLin,Nome FROM tlinha order by Nome;");
                while ($linha = mysqli_fetch_array($resultado)){
                  $CodLin = $linha["CodLin"];
                  $AbrLin = $linha["AbrLin"];
                  $Nome = $linha["Nome"];
                ?>

                  <tr>
                    <td>
                      <p><a class="nsize" href="delete_linha.php?codlin=<?php echo $CodLin; ?>&del=false"><span class="glyphicon glyphicon-trash"></span></a> | <a class="nsize" href="admin.php?linha=<?php echo $CodLin; ?>"><span class="glyphicon glyphicon-edit"></span></a></p>
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
                    <div class="form-group"><input type="text" name="novatarifaemp" placeholder="Cód da empresa"class="form-control" id="usr"></div>&nbsp&nbsp

                     <div class="form-group"><input type="text" name="novatarifa" placeholder="Nome da tarifa"class="form-control" id="usr"></div>&nbsp&nbsp

                    <div class="form-group"><input type="text" name="novatarifavalor"placeholder="Valor"class="form-control" id="usr"></div>&nbsp&nbsp


                     <div class="form-group"><input type="submit" value="OK"class="form-control" id="usr"></div>
                  </form>
                </div>

                  <table class="table">
                    <tr>
                      <td>
                        <span class="glyphicon glyphicon-cog"></span>
                      </td>
                      <td>
                        Empresa
                      </td>
                      <td>
                        Cód. Empresa
                      </td>
                      <td>
                        Nome
                      </td>
                      <td>
                        Preço
                      </td>
                    </tr>
                  <? #SELECIONA AS TARIFAS
                  $resultado = mysqli_query($con,"SELECT CodTar,CodEmp,Nome,Preco FROM ttarifa order by Preco DESC;");
                  while ($linha = mysqli_fetch_array($resultado)){
                    $CodTar = $linha["CodTar"];
                    $CodEmp = $linha["CodEmp"];
                    $Nome = $linha["Nome"];
                    $Preco = $linha["Preco"];

                    $resultado2 = mysqli_query($con,"SELECT Nome FROM tempresa where CodEmp = '$CodEmp'");
                    while ($linha2 = mysqli_fetch_array($resultado2)){
                      $NomeEmp = $linha2["Nome"];}
                  ?>

                    <tr>
                      <td>
                        <p><a class="nsize" href="delete_tarifa.php?codtar=<?php echo $CodTar; ?>&del=false"><span class="glyphicon glyphicon-trash"></span></a> | <a class="nsize" href="edita_tarifa.php?codtar=<?php echo $CodTar; ?>&ok=false"><span class="glyphicon glyphicon-edit"></span></a></p>
                      </td>
                      <td>
                        <p><?php echo $NomeEmp; ?></p>
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
                  <form class="novalinha" action="novo_motorista.php" method="get" accept-charset="utf-8">
                    <div class="form-group"><input type="text" name="nome" placeholder="Nome"class="form-control" id="usr"></div>&nbsp&nbsp

                    <div class="form-group"><input type="text" name="CPF" placeholder="CPF"class="form-control" id="usr"></div>&nbsp&nbsp

                     <div class="form-group"><input type="text" name="CNH" placeholder="CNH"class="form-control" id="usr"></div>&nbsp&nbsp

                    <div class="form-group"><input type="submit" value="OK" class="form-control" id="usr"></div>
                  </form>
                </div>

                  <table class="table">
                    <tr>
                      <td>
                        <span class="glyphicon glyphicon-cog"></span>
                      </td>
                      <td>
                        Nome
                      </td>
                      <td>
                        CPF
                      </td>
                      <td>
                        CNH
                      </td>
                    </tr>
                  <? #SELECIONA AS TARIFAS
                  $resultado = mysqli_query($con,"SELECT * FROM tmotorista order by Nome DESC;");
                  while ($linha = mysqli_fetch_array($resultado)){
                    $CPF = $linha["CPF"];
                    $CodMot = $linha["CodMot"];
                    $CNH = $linha["CNH"];
                    $Nome = $linha["Nome"];
                  ?>

                    <tr>
                      <td>
                        <p><a class="nsize" href="delete_motorista.php?codmot=<?php echo $CodMot; ?>&del=false"><span class="glyphicon glyphicon-trash"></span></a> | <a class="nsize" href="edita_motorista.php?codmot=<?php echo $CodMot; ?>&ok=false"><span class="glyphicon glyphicon-edit"></span></a></p>
                      </td>
                      <td>
                        <p><?php echo $Nome; ?></p>
                      </td>
                      <td>
                        <p><?php echo $CPF; ?></p>
                      </td>
                      <td>
                        <p><?php echo $CNH; ?></p>
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
                  <form class="novalinha" action="novo_bus.php" method="get" accept-charset="utf-8">
        <div class="form-group"><input type="text" name="placa" placeholder="Placa"class="form-control" id="usr"></div>&nbsp&nbsp

                    <div class="form-group"><input type="number" min="0" name="ano" placeholder="Ano" class="form-control" id="usr"></div>&nbsp&nbsp

<label>Elevador:&nbsp</label><input type="checkbox" name="elevador" value="1">&nbsp&nbsp
                    <label>Ar:&nbsp</label><input type="checkbox" name="ar" value="1">&nbsp&nbsp
                    <div class="form-group"><input type="submit" value="OK"class="form-control" id="usr"></div>
                  </form>
                </div>

                  <table class="table">
                      <td>
                        <span class="glyphicon glyphicon-cog"></span>
                      </td>
                      <td>
                        Placa
                      </td>
                      <td>
                        Ano
                      </td>
                      <td>
                        Elevador
                      </td>
                      <td>
                        Ar
                      </td>
                    </tr>
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
                        <p><a class="nsize" href="delete_bus.php?codbus=<?php echo $CodBus; ?>&del=false"><span class="glyphicon glyphicon-trash"></span></a> | <a class="nsize" href="edita_bus.php?codbus=<?php echo $CodBus; ?>&ok=false"><span class="glyphicon glyphicon-edit"></span></a></p>
                      </td>
                      <td>
                        <p><?php echo $Placa; ?></p>
                      </td>
                      <td>
                        <p><?php echo $Ano; ?></p>
                      </td>
                      <td>
                        <p><?php if($Elevador){echo "Sim";}else{echo "Não";} ?></p>
                      </td>
                      <td>
                        <p><?php if($Ar){echo "Sim";}else{echo "Não";} ?></p>
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
                  <form class="novalinha" action="nova_empresa.php" method="get" accept-charset="utf-8">

                    <div class="form-group"><input type="text" name="novaemp"    placeholder="Nome da empresa" class="form-control" id="usr"></div>&nbsp&nbsp

                    <div class="form-group"><input type="submit" name="" value="OK"class="form-control" id="usr"></div>
                  </form>
                </div>

                  <table class="table">
                      <td>
                        <span class="glyphicon glyphicon-cog"></span>
                      </td>
                      <td>
                        Cód. empresa
                      </td>
                      <td>
                        Nome
                      </td>
                    </tr>
                  <? #SELECIONA AS TARIFAS
                  $resultado = mysqli_query($con,"SELECT CodEmp,Nome FROM tempresa order by CodEmp DESC;");
                  while ($linha = mysqli_fetch_array($resultado)){
                    $CodEmp = $linha["CodEmp"];
                    $Nome = $linha["Nome"];
                  ?>

                    <tr>
                      <td>
                        <p><a class="nsize" href="delete_empresa.php?codemp=<?php echo $CodEmp; ?>&del=false"><span class="glyphicon glyphicon-trash"></span></a> | <a class="nsize" href="edita_empresa.php?codemp=<?php echo $CodEmp; ?>&ok=false"><span class="glyphicon glyphicon-edit"></span></a></p>
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
              <h3 class="">Manuteção de cidades</h3>

              <div class="panel panel-primary">
                <div class="panel-heading">
                  <span>Incluir: </span>
                  <form class="novalinha" action="nova_cidade.php" method="get" accept-charset="utf-8">

                    <div class="form-group"><input type="text" name="novacidade" placeholder="Nome da cidade"class="form-control" id="usr"></div>&nbsp&nbsp

                      <div class="form-group"><input type="submit" name="" value="OK" class="form-control" id="usr"></div>
                  </form>
                </div>

                  <table class="table">
                    <tr>
                      <td>
        <span class="glyphicon glyphicon-cog"></span>
                      </td>
                      <td>
                        Cód. cidade
                      </td>
                      <td>
                        Nome
                      </td>
                    </tr>
                  <? #SELECIONA AS TARIFAS
                  $resultado = mysqli_query($con,"SELECT * FROM tcidade order by CodCid DESC;");
                  while ($linha = mysqli_fetch_array($resultado)){
                    $CodCid = $linha["CodCid"];
                    $Nome = $linha["Nome"];
                  ?>
                    <tr>
                      <td>
                        <p><a class="nsize" href="delete_cidade.php?codcid=<?php echo $CodCid; ?>&del=false"><span class="glyphicon glyphicon-trash"></span></a> | <a class="nsize" href="edita_cidade.php?codcid=<?php echo $CodCid; ?>&ok=false"><span class="glyphicon glyphicon-edit"></span></a></p>
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
</div>

  <?php
  mysqli_close($con);
  ?>
</body>
</html>
