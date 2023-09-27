<?php 
    session_start();
    $id = isset($_SESSION['user']) ? $_SESSION['user'] : null;

    if($id == null){
        die("Algo deu errado");
    }

    $nome = isset($_SESSION['name']) ? $_SESSION['name'] : null;

    if($nome == null){
        die("Algo deu errado");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizador</title>
</head>
<body>
    <h1>Ola <?php echo $nome?></h1>
</body>
</html>