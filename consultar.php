<?php

include_once 'php_action/db_connect.php';

include_once 'includes/header.php';

?>

<div class="section no-pad-bot" id="index-banner">
  <div class="container">
    <br /><br />
    <div class="row center">
      <div class="col s12">
        <h3 class="light ">Estoque de Carros</h3>
        <table class="striped">
          <thead>
            <tr>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Descrição</th>
              <th>Modelo/Fabricação</th>
              <th>Cor</th>
              <th>Placa</th>
              <th>Valor (R$)</th>
            </tr>
          </thead>
          <tbody>

            <?php
            $sql = "SELECT * FROM estoque";
            $result = mysqli_query($connect, $sql);

            while ($dados = mysqli_fetch_array($result)) :
            ?>
              <tr>
                <td><?php echo $dados['marca']; ?></td>
                <td><?php echo $dados['modelo']; ?></td>
                <td><?php echo $dados['descricao']; ?></td>
                <td><?php echo $dados['anofabri']; ?></td>
                <td><?php echo $dados['cor']; ?></td>
                <td><?php echo $dados['placa']; ?></td>
                <td><?php echo $dados['valor']; ?></td>
                <td><a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange">
                    <i class="material-icons"> edit</i></a>
                </td>
                <td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger">
                    <i class="material-icons"> delete</i></a>
                </td>

                <div id="modal<?php echo $dados['id']; ?>" class="modal modal-fixed-footer">
                  <div class="modal-content">
                    <h4>Tem cereteza que deseja excluir esse registro?</h4>
                    <br /><br /><br />
                    <h3>
                      <p> <?php echo $dados['marca']; ?> -
                        <?php echo $dados['modelo']; ?> -
                        <?php echo $dados['descricao']; ?> -
                        <?php echo $dados['anofabri']; ?> -
                        <?php echo $dados['cor']; ?> -
                        <?php echo $dados['placa']; ?> -
                        <?php echo $dados['valor']; ?>
                      </p>
                    </h3>
                  </div>
                  <div class="modal-footer">

                    <form action="php_action/delete.php" method="POST">
                      <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                      <a href="#!" class="modal-close waves-effect waves-green btn green">Não, não excluir.</a>
                      <button type="submit" name="btn-deletar" class="btn red">Sim, quero excluir.</button>
                    </form>

                  </div>
                </div>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
    <br /><br />
  </div>
</div>
<?php
include_once 'includes/footer.php';
?>