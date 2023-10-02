<?php 
    include "../connection/conexao.php";
    session_start();
    $id = isset($_SESSION['user']) ? $_SESSION['user'] : null;
    $nome = isset($_SESSION['name']) ? $_SESSION['name'] : null;
    // Recebe os valores das variáveis da URL
    $dia = $_GET['dia'];
    $mes = $_GET['mes'];
    $ano = $_GET['ano'];

    $sql = "SELECT * FROM atividades WHERE id_usuario = $id AND dia = $dia AND mes = $mes AND ano = $ano";

    $sql_query = $conexao->query($sql) or die('Algo deu errado!!' . $conexao->error);

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
        <li><a href="../principal/principal.php" class="a" title="Name"><?php echo $nome;?></a></li>
        <li><a href="../logout.php" class="a">Logout</a></li>
        
        </ul>

    </div>

    </header>
    <section>
        <h1>Atividades para o dia <?php echo $dia?>/<?php echo $mes?>/<?php echo $ano?>:</h1>

        <?php 
            if ($sql_query->num_rows > 0) {
                echo "<h1>Atividades do dia $dia/$mes/$ano:</h1>";
                echo "<ul>";
            
                // Loop para exibir as matérias e descrições
                while ($row = $sql_query->fetch_assoc()) {
                    $materia = htmlspecialchars($row['materia']);
                    $descricao = htmlspecialchars($row['descricao']);
                    echo "<li><strong>Matéria:</strong> $materia - <strong>Descrição:</strong> $descricao</li>";
                }
            
                echo "</ul>";
            } else {
                echo "<p>Nenhuma atividade encontrada para o dia $dia/$mes/$ano.</p>";
            }
        ?>
    </section>        
    <?php }else{?>
        <section>
            <h1>Você não esta logado!!</h1>
            <a href="../login/login.php">Voltar ao login</a>
        </section>
    <?php }?>
</body>
</html>