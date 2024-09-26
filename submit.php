<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Inclua o PHPMailer (ajuste o caminho conforme necessário)
require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Utilize o servidor SMTP correto
        $mail->SMTPAuth = true;
        $mail->Username = 'eletrodoacao@gmail.com'; // Seu email
        $mail->Password = 'SUA_SENHA_DE_APP'; // Sua senha ou senha de app
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Remetente e destinatário
        $mail->setFrom($email, $nome);
        $mail->addAddress('eletrodoacao@gmail.com'); // Para onde será enviado

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Nova mensagem de contato - Projeto de Reciclagem Eletrônica';
        $mail->Body    = "<strong>Nome:</strong> $nome <br><strong>Email:</strong> $email <br><strong>Mensagem:</strong> $mensagem";

        $mail->send();
        echo 'Mensagem enviada com sucesso!';
    } catch (Exception $e) {
        echo "Erro ao enviar a mensagem: {$mail->ErrorInfo}";
    }
}
?>
