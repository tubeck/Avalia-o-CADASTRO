<!--index.php = desenvolvido para ser a principal parte visível do código, possuindo um formulário e a listagem dos alunos cadastrados-->

<?php
include 'php/db.php';  //Se conecta ao tal arquivo, essa que está conectada ao banco de dados//
?>

<!DOCTYPE html>  <!--DICA: inserir 'html:5' permitirá a formação automática de tal trecho-->
<html lang="pt-BR">  <!--Linguagem em português-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA DE ALUNOS</title>
    <link rel="stylesheet" href="css/style.css">  
</head>
<body>  <!--Corpo do código-->
    <div class="cad-container">  <!--Formulário de Cadastro-->
        <h1>CADASTRO DO ALUNO</h1>            
        <form action="cadastro.php" method="POST" class="form-cadastro">  <!--Formulário de Cadastro-->
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>

            <label for="idade">Idade:</label>
            <input type="number" name="idade" id="idade" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="curso">Curso:</label>
            <input type="text" name="curso" id="curso" required>

            <button type="submit">Cadastrar</button>
        </form>
    </div>
    <div class="tab-container">  <!--Formulário de Pesquisa-->
            <form method="GET" action="" class="form-pesquisa">  

                <?php                
                $pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';
                ?>

                <input type="text" name="pesquisa" placeholder="Pesquisar por Nome ou Curso:" value="<?php echo htmlspecialchars($pesquisa); ?>">
                <button type="submit">Pesquisar</button>

            </form>
            <h2>ALUNOS CADASTRADOS</h2>  <!--Tabela de Alunos-->
            <table class="table-alunos">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>Email</th>
                        <th>Curso</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    if ($pesquisa) {  //Consultar//                        
                        $sql = "SELECT * FROM alunos WHERE nome LIKE '%$pesquisa%' OR curso LIKE '%$pesquisa%'";
                    } else {
                        $sql = "SELECT * FROM alunos";  //Lista todos os alunos cadastrados//
                    }
                    $result = $connection->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['nome']}</td>
                                    <td>{$row['idade']}</td>
                                    <td>{$row['email']}</td>
                                    <td>{$row['curso']}</td>
                                    <td><a href='deletar.php?id={$row['id']}' class='btn-delete'>Excluir</a></td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>Nenhum aluno encontrado</td></tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </body>
</html>  <!--Fechamento de todo o código-->
