<?php 
    include '../connection/conexao.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../frontEnd/css/style.css">
    <link rel="stylesheet" href="../frontEnd/css/login.css">
</head>
<body>
    <div class="page">
        <a href="../index.php"><img src="../imgs/homeIcon.png" alt="home"></a>
        <form method="POST" action="login.php" class="formLogin">
            <h1>Login</h1>
            <p>Digite os seus dados de acesso no campo abaixo.</p>
            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Digite seu e-mail" autofocus="true" required/>
            <label for="password">Senha</label>
            <input type="password" placeholder="Digite sua senha" name="senha" required/>
            <a href="">Esqueci minha senha</a> <a href="../cadastro/cadastro.php">Não tenho cadastro</a>
            <input type="submit" value="Acessar" class="btn" />
        </form>
    </div>
</body>
</html>

<?php 
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $senha = isset($_POST['senha']) ? $_POST['senha'] : null;

    if($email != null && $senha != null){
        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";

        $sql_query = $conexao->query($sql) or die("Falha na execução do banco de dados" . $conexao->error);

        if($sql_query->num_rows == 1){

            $ususario = $sql_query->fetch_assoc();
            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION['user'] = $ususario['id_usuario'];
            $_SESSION['name'] = $ususario['nome'];

           header("Location: ../principal/principal.php");

        }
    }
?>