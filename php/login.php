<?php
session_start();
include 'conexaoDb.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $passwordHash = hash('sha256', $password);

    $query = "SELECT * FROM utilizadores WHERE nome = ? AND password = ? AND role = ?";
    $stmt = mysqli_prepare($liga, $query);
    mysqli_stmt_bind_param($stmt, 'sss', $username, $passwordHash, $role);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $user['nome'];
        $_SESSION['role'] = $user['role'];

        if ($user['role'] == 'admin') {
            header('Location: painelAdmin.php');
        } else {
            header('Location: painelUsuario.php');
        }
        exit();
    } else {
        echo 'Nome de utilizador ou palavra-passe incorretos.';
    }
}
?>
