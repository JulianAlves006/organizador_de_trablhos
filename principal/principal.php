<?php 
    session_start();
    $id = isset($_SESSION['user']) ? $_SESSION['user'] : null;

    

    $nome = isset($_SESSION['name']) ? $_SESSION['name'] : null;

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizador</title>
    <link rel="stylesheet" href="../frontEnd/css/style.css">
    <link rel="stylesheet" href="../frontEnd/css/principal.css">
</head>
<body>
    <?php 
        if(isset($_SESSION['name']) != null){
    ?>
    <header class="header">

    <div class="content">

    <ul class="logo"><li class="logo"><a href="./principal.php" class="logo">Organizador de Trabalhos</a></li></ul>
        
        <input class="mobile-btn" type="checkbox" id="mobile-btn" />
        <label class="mobile-icon" for="mobile-btn"><span class="hamburguer"></span></label>
        
        <ul class="nav">

        

        <li><a href="../index.php" class="a" title="Home">Home</a></li>
        <li><a href="" class="a" title="Name"><?php echo $nome;?></a></li>
        <li><a href="../logout.php" class="a">Logout</a></li>
        
        </ul>

    </div>

    </header>
    <section>
        <h1>Olá <?php echo $nome?> como vai você?? Gostaria de dar uma olhada em suas atividades próximas?? Ou talvez adicionar uma nova?</h1>
        <a href="../adicionar/adicionar.php"><button class="btn">Adicionar</button></a>
    </section>        
    <?php }else{?>
        <section>
            <h1>Você não esta logado!!</h1>
            <a href="../login/login.php">Voltar ao login</a>
        </section>
    <?php }?>
</body>
</html>