<?php
include 'conexção.php'; 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $nikname = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['password'] ?? '';
    $data_de_nascimento = $_POST['birthdate'] ?? '';

    
    if (!empty($nikname) && !empty($email) && !empty($senha) && !empty($data_de_nascimento)) {
        
        
        // Prepara a consulta SQL
        $stmt = $conn->prepare("INSERT INTO cadastro (Nikname, Email, senha, DATA_DE_NACIMENTO) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nikname, $email, $senha, $data_de_nascimento);

      
        //if ($stmt->execute()) {
        //    echo "Cadastro realizado com sucesso!";
        //} else {
        //    echo "Erro ao cadastrar: " . $stmt->error;
        //}

 
        $stmt->close();
    } else {
        echo "Por favor, preencha todos os campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="arts.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Login</h2>
        <form action="index.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Digite seu nome" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Digite seu email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Digite sua senha" required>
            </div>
            <div class="mb-3">
                <label for="birthdate" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</body>
</html>
