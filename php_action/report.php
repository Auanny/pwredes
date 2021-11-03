<?php

include_once 'db_connect.php';

?>

<!DOCTYPE html>
<html lang="pt">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1.0"
    />
    <title>Tcar</title>

    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link
      href="../css/materialize.css"
      type="text/css"
      rel="stylesheet"
      media="screen,projection"
    />
    <link
      href="../css/style.css"
      type="text/css"
      rel="stylesheet"
      media="screen,projection"
    />
    <script src="https://code.jquery.com/jquery-2.1.1.min.js">
      defer
    </script>
    <script src="../js/materialize.js"> defer </script>
    <script src="../js/init.js"> defer </script>
  </head>
  <body>

 <div class="btn-large orange"><a href="" onclick="window.print()"> Imprimir</a>
 </div>
 <div class="section no-pad-bot" id="index-banner">
      <div class="container">
        <br /><br />
        <div class="row center">
        <img src="../assets/images/Logo.png" width="305px"/>
          <div class="col s12">
            <h3 class="light "> Relatório </h3>

            <?php

            if (isset($_POST['btn-relatorio'])) :
              $marcaselecionada =$_POST['marcaselecionada'];
            endif;
            ?>
            <h4 class="light"> <?php echo $marcaselecionada; ?></h4>
            <table class= "striped">
              <thead>
                <tr>
                  <th>Marca</th>
                  <th>Modelo</th>
                  <th>Descrição</th>
                  <th>Modelo/Fabricação</th>
                  <th>Cor</th>
                  <th>Placa</th>
                  <th>Valor(R$)</th>
                </tr>
              </thead>
              <tbody>

            <?php
            if (isset($_POST['btn-relatorio'])) :

              if($marcaselecionada == "Todas as Marcas") :
              $sql= "SELECT * FROM estoque ORDER BY marca,modelo,anofabri";

              else :
                $sql= "SELECT * FROM estoque WHERE marca = '$marcaselecionada'ORDER BY marca,modelo,anofabri";
             endif;
          
                $resultado = mysqli_query($connect, $sql);
                while($dados = mysqli_fetch_array($resultado)) :
            ?>
                <tr>
                  <td><?php echo $dados['marca'];?></td>
                  <td><?php echo $dados['modelo'];?></td>
                  <td><?php echo $dados['descricao'];?></td>
                  <td><?php echo $dados['anofabri'];?></td>
                  <td><?php echo $dados['cor'];?></td>
                  <td><?php echo $dados['placa'];?></td>
                  <td><?php echo $dados['valor'];?></td>
                </tr>            
               <?php endwhile; 
                endif;?>
              </tbody>
            </table>            
          </div>
        </div>
        <br /><br />
      </div>
    </div>
</body>
</html>