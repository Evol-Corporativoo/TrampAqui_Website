<?php
// Inicie a sessão (se ainda não estiver iniciada)
session_start();

// Verifique se o usuário está logado (você pode ajustar isso de acordo com sua implementação)
if (isset($_SESSION['idUsuario'])) {
    $idUsuarioLogado = $_SESSION['idUsuario'];

    // Consulta para obter o nome do usuário logado
    $query_usuario = "SELECT nomeUsuario FROM tbusuario WHERE idUsuario = :idUsuarioLogado";
    $statement_usuario = $conexao->prepare($query_usuario);
    $statement_usuario->bindParam(':idUsuarioLogado', $idUsuarioLogado, PDO::PARAM_INT);
    $statement_usuario->execute();

    // Recupere o resultado da consulta
    $row_usuario = $statement_usuario->fetch(PDO::FETCH_ASSOC);

    if ($row_usuario) {
        $nomeUsuario = $row_usuario['nomeUsuario'];
    } else {
        $nomeUsuario = "Nome de Usuário Desconhecido";
    }
} else {
    $nomeUsuario = "Visitante";
}
?>

<div class="card-body">
    <h5 class="card-title text-primary">Parabéns! 🎉 <?php echo $nomeUsuario; ?></h5>
    <p class="mb-4">
        <?php echo $nomeEmpresa; ?> teve <span class="fw-bold">72%</span> de mais visibilidade hoje. Verifique as estatísticas do seu perfil.
    </p>
</div>
