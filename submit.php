<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    // Define o destinatário
    $para = "eletrodoacao@gmail.com";

    // Assunto do e-mail
    $assunto = "Nova mensagem de contato - Projeto de Reciclagem Eletrônica";

    // Corpo do e-mail
    $corpo = "Nome: $nome\n";
    $corpo .= "Email: $email\n";
    $corpo .= "Mensagem: $mensagem\n";

    // Cabeçalhos
    $headers = "From: $email";

    // Envia o e-mail
    if (mail($para, $assunto, $corpo, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Falha ao enviar a mensagem. Tente novamente mais tarde.";
    }
}
?>
