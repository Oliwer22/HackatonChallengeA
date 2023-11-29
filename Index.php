<?php 
    require_once realpath(__DIR__ . '/vendor/autoload.php');
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    $host = $_ENV['SERVER'];
    $UserName = $_ENV['DB_USER_NAME_LOGIN'];
    $PassName = $_ENV['DB_USER_PASSWORD'];
    $DbName = $_ENV['DB_USER_DATA'];
    $servername = $host;
    $username = $UserName;
    $password = $PassName;
    $dbname = $DbName;
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>



    <link rel="stylesheet" type="text/css" href="src/style/index.css">
    <link rel="stylesheet" type="text/css" href="src/style/reset.css">
    <script src="src/script/index.js"></script>
