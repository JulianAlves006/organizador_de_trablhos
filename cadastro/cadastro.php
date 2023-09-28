<?php 
    include '../connection/conexao.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadastro</title>
    <link rel="stylesheet" href="../frontEnd/css/style.css">
    <link rel="stylesheet" href="../frontEnd/css/cadastro.css">
</head>
<body>
    <div class="page">
        <a href="../index.php"><img src="../imgs/homeIcon.png" alt="home"></a>
        <form method="POST" action="cadastro.php" class="formcadastro">
            <h1>Cadastro</h1>
            <p>Digite os seus dados nos campos abaixo.</p>
            <label for="nome">Nome</label>
            <input type="text" name="nome" placeholder="Digite seu nome" autofocus="true" required/>
            <label for="idade">Idade</label>
            <input type="number" name="idade" placeholder="Digite sua idade" required>
            <label for="Nivel">Nivel</label>
            <select name="nivel" id="nivel" required>
                <option value="">Escolha seu nivel</option>
                <option value="1">Escola</option>
                <option value="2">Faculdade</option>
                <option value="3">Emprego</option>
            </select>
            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Digite seu e-mail" required/>
            <label for="password">Senha</label>
            <input type="password" placeholder="Digite sua senha" name="senha" required/>
            <a href="../login/login.php">Ja tenho uma conta</a>
            <input type="submit" value="Cadastrar" class="btn" />
        </form>
    </div>
</body>
</html>

<?php 

    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;
    $idade = isset($_POST['idade']) ? $_POST['idade'] : null;
    $nivel = isset($_POST['nivel']) ? $_POST['nivel'] : null;
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $senha = isset($_POST['senha']) ? $_POST['senha'] : null;

    if ($nome !== null && $idade !== null && $nivel !== null && $email !== null && $senha !== null) {
        $sql = "INSERT INTO usuarios (nome, idade, nivel, email, senha) VALUES ('$nome', $idade, $nivel, '$email', $senha)";
        $sql_query = $conexao->query($sql) or die('Algo deu errado' . $conexao->error);

        $id = $conexao->insert_id;

        $_SESSION['user'] = $id;
        $_SESSION['name'] = $nome;

        header("Location: ../principal/principal.php");
    }

?>