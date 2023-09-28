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
    <title>Adicionar atividade</title>
    <link rel="stylesheet" href="../frontEnd/css/style.css">
    <link rel="stylesheet" href="../frontEnd/css/adicionar.css">
</head>
<body>
<?php 
        if(isset($_SESSION['name']) != null){
    ?>
    <header class="header">

    <div class="content">

    <ul class="logo"><li class="logo"><a href="../principal/principal.php" class="logo">Organizador de Trabalhos</a></li></ul>
        
        <input class="mobile-btn" type="checkbox" id="mobile-btn" />
        <label class="mobile-icon" for="mobile-btn"><span class="hamburguer"></span></label>
        
        <ul class="nav">

        

        <li><a href="../index.php" class="a" title="Home">Home</a></li>
        <li><a href="../principal/principal.php" class="a" title="Name"><?php echo $nome;?></a></li>
        <li><a href="../logout.php" class="a">Logout</a></li>
        
        </ul>

    </div>

    </header>
    <section>
        <h1>Vamos adicionar uma atividade então!!</h1>
        <form action="adicionar.php" method="post" class="formLogin">
            <label for="Matéria">Matéria ou tópico:</label>
            <input type="text" name="materia" placeholder="Digite a matéria do seu trabalho, por exemplo: matematica ou relatório" autofocus required>
            <label for="Descricao">Descrição do trabalho</label>
            <textarea name="descriçao" cols="30" rows="10" placeholder="Digite uma descrição do seu trabalho, como deve ser feito e etc" required></textarea>
            <label for="dia">Dia</label>
            <input type="number" name="dia" placeholder="Digite o dia da entrega do seu trabalho" required>
            <label for="mes">Mês</label>
            <input type="number" name="mes" placeholder="Digite o mês da entrega do seu trabalho" required>
            <label for="ano">Ano</label>
            <input type="number" name="ano" placeholder="Digite o ano da entrega do seu trabalho" required>
            <input type="submit" class="btn">
        </form>
    </section>        
    <?php }else{?>
        <section>
            <h1>Você não esta logado!!</h1>
            <a href="../login/login.php">Voltar ao login</a>
        </section>
    <?php }?>
</body>
</html>

<?php 
    $materia = isset($_POST['materia']) ? $_POST['materia'] : null;
    $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
    $dia = isset($_POST['dia']) ? $_POST['dia'] : null;
    $mes = isset($_POST['mes']) ? $_POST['mes'] : null;
    $ano = isset($_POST['ano']) ? $_POST['ano'] : null;

    if($dia > 31 || $mes > 12){
        die('Algo deu errado com a data');
    }
?>