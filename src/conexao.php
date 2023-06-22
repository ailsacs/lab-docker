
<?php
    // Configurações do banco de dados
    $host = getenv('DB_HOST');
    $dbname = getenv('DB_NAME');
    $user = getenv('DB_USER');
    $password = getenv('DB_PASSWORD');


    // Função para obter a conexão com o banco de dados
    function getDatabaseConnection() {
        global $host, $dbname, $user, $password, $port;
        $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
?>
