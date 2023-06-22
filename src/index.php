<!DOCTYPE html>
<html>
<head>
    <title>Teste de Conexão com Banco de Dados</title>
    <style>
        body {
            text-align: center;
            vertical-align: middle;
        }

        form {
            margin-top: 100px;
        }

        input[type="submit"] {
            padding: 8px 16px;
            background-color: #0056a7;
            color: white;
            border: none;
            border-radius: 40px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #e026ca;
        }
    </style>

</head>
<body>
    <h1>Teste de Conexão com Banco de Dados</h1>
    <form action="" method="post">
        <input type="submit" name="testar" value="Testar Conexão">
    </form>

    <?php
    if (isset($_POST['testar'])) {
        include 'conexao.php';
        try {
            // Teste de conexão com o banco de dados
            $conn = getDatabaseConnection();
            echo "<p>Conexão bem-sucedida!</p>";
        } catch (PDOException $e) {
            echo "<p>Erro na conexão com o banco de dados: " . $e->getMessage() . "</p>";
        } finally {
            // Fecha a conexão com o banco de dados
            $conn = null;
        }

    }
    ?>
</body>
</html>
