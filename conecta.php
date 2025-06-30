 <?php
    $username = 'root';
    $password = '';

    try {
        $conn = new PDO('mysql:host=localhost;dbname=bd_teste', $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Erro na conexão: ' . $e->getMessage();
    }
    ?> 
