<!--deletar.php = desenvolvido para deletar os daods de alunos cadastrados no banco de dados-->

<?php
include 'php/db.php';  //Se conecta ao tal arquivo, essa que está conectada ao banco de dados//
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM alunos WHERE id=$id";

    if ($connection->query($sql) === TRUE) {
        echo "<script>alert('Excluído com sucesso!'); window.location.href='index.php';</script>";
    } else {
        echo "Erro ao excluir! " . $connection->error;
    }
    $connection->close();
}
?>
