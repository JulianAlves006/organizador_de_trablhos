<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizador de trabalhos</title>
    <link rel="stylesheet" href="./frontEnd/css/style.css">
</head>
<body>
    <header class="header">

    <div class="content">

    <ul class="logo"><li class="logo"><a href="" class="logo">Organizador de Trabalhos</a></li></ul>
        
        <input class="mobile-btn" type="checkbox" id="mobile-btn" />
        <label class="mobile-icon" for="mobile-btn"><span class="hamburguer"></span></label>
        
        <ul class="nav">
        <?php if(isset($_SESSION['name']) == null){?>
            <li><a href="" class="a" title="Home">Home</a></li>
            <li><a href="login/login.php" class="a" title="Login">Login</a></li>
            <li><a href="cadastro/cadastro.php" class="a" title="Cadastro">Cadastro</a></li>
        <?php }else{?>
            <li><a href="./index.php" class="a" title="Home">Home</a></li>
            <li><a href="" class="a" title="Name"><?php echo $_SESSION['name'];?></a></li>
            <li><a href="./logout.php" class="a">Logout</a></li>
        <?php }?>
        </ul>

    </div><!--content-->

    </header>

    <section>
        <h1>Ola seja bem vindo ao seu melhor organizador de trabalhos!!</h1>
        <h2>Aqui você podera organizar seus trabalhos da escola, faculdade, emprego, etc...</h2>
    </section>
    <script src="./frontEnd/js/main.js"></script>
</body>
</html>