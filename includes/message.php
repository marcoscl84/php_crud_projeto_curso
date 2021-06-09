<?php
// Sessão pra exibir mensagem ao cadastrar
session_start();
if(isset($_SESSION['mensagem'])): ?>

<!-- Mensagem com animação do materilizecss pra dizer se foi cadastrado com sucesso -->
<script>
    window.onload = function(){
        M.toast({html: '<?php echo $_SESSION['mensagem']; ?>'})
    }
</script>

<?php
endif;
session_unset();

?>