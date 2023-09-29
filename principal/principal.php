<?php 
    include "../connection/conexao.php";
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
        <div class="calendario">
            <?php
                $sql="SELECT * FROM atividades WHERE id_usuario = $id";

                // Obtém o ano e o mês atuais
                $anoAtual = date("Y");
                $mesAtual = date("n");

                // Nomes dos meses
                $nomesDosMeses = [
                    "Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho",
                    "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"
                ];

                // Número de dias em cada mês
                $diasNoMes = cal_days_in_month(CAL_GREGORIAN, $mesAtual, $anoAtual);

                // Primeiro dia do mês
                $primeiroDiaDoMes = date("N", strtotime("$anoAtual-$mesAtual-01"));

                // Cabeçalho do calendário
                echo "<h1>{$nomesDosMeses[$mesAtual - 1]} $anoAtual</h1>";

                // Tabela do calendário
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>Domingo</th>";
                echo "<th>Segunda</th>";
                echo "<th>Terça</th>";
                echo "<th>Quarta</th>";
                echo "<th>Quinta</th>";
                echo "<th>Sexta</th>";
                echo "<th>Sábado</th>";
                echo "</tr>";

                // Inicia o contador de dia da semana
                $diaDaSemana = 1;

                // Preenche as células vazias até o primeiro dia do mês
                echo "<tr>";
                for ($i = 1; $i < $primeiroDiaDoMes; $i++) {
                    echo "<td></td>";
                    $diaDaSemana++;
                }

                // Loop para criar as células do calendário
                for ($dia = 1; $dia <= $diasNoMes; $dia++) {
                    echo "<td class='td-day'>$dia <div class='texto-dia'>Reunião</div></td>";

                    if ($diaDaSemana == 7) {
                        echo "</tr>";
                        if ($dia != $diasNoMes) {
                            echo "<tr>";
                        }
                        $diaDaSemana = 1;
                    } else {
                        $diaDaSemana++;
                    }
                }

                // Preenche as células vazias restantes
                while ($diaDaSemana <= 7) {
                    echo "<td></td>";
                    $diaDaSemana++;
                }

                echo "</table>";
            ?>
        </div>
    </section>        
    <?php }else{?>
        <section>
            <h1>Você não esta logado!!</h1>
            <a href="../login/login.php">Voltar ao login</a>
        </section>
    <?php }?>
</body>
</html>