<?php
include_once("conexao.php");

if(isset($_POST['email']) && !empty($_POST['email'])) {

$nome = $_POST['nome'];
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];



// manda para o email

$to = "zarosthais@gmail.com"; 
$subject = "Contato - Cupomania";
$body = "Nome: " .$nome. "\rn\n";
          "Email: " .$email. "\rn\n";
         "Mensagem: ".$mensagem;

$header = "From: zarosthais@gmail.com"."\rn\n"."Reply-To:".$email."\r\n"."X=Mailer:PHP/".phpversion();

if (mail($to,$subject,$body,$header)) {
        // adiciona no banco de dados
        $result_msg_contato = "INSERT into contato_mensagens(nome, email, mensagem) VALUES ('$nome', '$email', '$mensagem')";
        $resultado_msg_contato = mysqli_query($conn, $result_msg_contato);
        echo  "<script>alert('Mensagem enviada com sucesso!');</script>";
        header('Refresh: 0; URL= index.html');      
 } else {
        echo  "(<script>alert('Mensagem não foi enviada!');</script>)";
        header('Refresh: 0; URL= index.html');
}

}

?>