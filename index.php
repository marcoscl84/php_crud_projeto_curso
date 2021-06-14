<?php

// Conexão
include_once 'php_action/db_connect.php';

// Header
include_once 'includes/header.php';

// Message
include_once 'includes/message.php';

?>

<div class="row">
    <div class="col s12 m8 push-m2">
        <h3 class="light"> Clientes </h3>
        <table class="stripped">
            <thead>
                <tr>
                    <th>Nome:</th>
                    <th>Sobrenome:</th>
                    <th>E-mail:</th>
                    <th>Idade:</th>
                </tr>
            </thead>

            <tbody>
            <?php
                $sql = "SELECT * FROM clientes";
                $resultado = mysqli_query($connect, $sql);

                if(mysqli_num_rows($resultado) > 0):

                    while($dados = mysqli_fetch_array($resultado)):
            ?>
                    <tr>
                        <td><?php echo $dados['nome']; ?></td>
                        <td><?php echo $dados['sobrenome']; ?></td>
                        <td><?php echo $dados['email']; ?></td>
                        <td><?php echo $dados['idade']; ?></td>
                        
                        <!-- botão editar -->
                        <td><a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating orange">
                        <i class="material-icons">edit</i></a></td>
                        
                        <!-- botão deletar -->
                        <td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger">
                        <i class="material-icons">delete</i></a></td>

                        <!-- Modal Structure | mensagem para perguntar se usuário tem certeza da ação -->
                        <div id="modal<?php echo $dados['id']; ?>" class="modal">
                            <div class="modal-content">
                                <h4>Atenção!</h4>
                                <p>Tem certeza que deseja excluir o cliente?</p>
                            </div>
                            <div class="modal-footer">
                                <form action="php_action/delete.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                                    <button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>
                                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                </form>
                            </div>
                        </div>

                    </tr>
            <?php 
                    endwhile; 
                else:
            ?>

            <!-- Apresenta traços nos campos caso não haja resultados -->
            <tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>               
            </tr>

            <?php
                endif;
            ?>
            </tbody>
        </table>
        <br>
        <a href="adicionar.php" class="btn"> Novo cliente </a>
    </div>
</div>

<?php
include_once 'includes/footer.php';
?>