<?php

// Define as variaveis vazias.
$nome = $email = $telefone = $whatsapp = $assunto = $para = $corpo = $header = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = test_input($_POST["nome"]);
  $email = test_input($_POST["email"]);
  $telefone = test_input($_POST["telefone"]);
  $whatsapp = test_input($_POST["whatsapp"]);
  $assunto = test_input($_POST["assunto"]);
  $subject = "Contato via website";
  
  $corpo = '
  <!DOCTYPE html>
<html>
<head>
<style>
.grid-container {
  display: grid;
  grid-gap: 0px;
  background-color: #eee;
  padding: 8%;
}

.grid-item {
  background-color: #fff;
  
  padding: 20px;
  
}

.item1 {
  grid-column: 1 / span 3;
  grid-row: 1;
  background-color: #182143;
  font-size: 28px;
  color: #fff;
  text-align: center;
}

.item2 {
  grid-column: 1 / span 3;
  grid-row: 2;
  background-color: #fff;
  font-size: 18px;
}

.item3 {
  grid-column: 1 / span 3;
  grid-row: 3;
  font-size: 18px;
  background-color: #88C417;
  color: #fff;
  text-align: center;
}
</style>
</head>
<body>



<div class="grid-container">
  <div class="grid-item item1">CONTATO VIA WEBSITE</div>
  <div class="grid-item item2"><h2>Informações do Contato:</h2>
  <p><b>Nome:</b> "'.$nome.'"</p>
  <p><b>E-mail:</b> "'.$email.'"</p>
  <p><b>Telefone:</b> "'.$telefone.'"</p>
  <p><b>Whatsapp:</b> "'.$whatsapp.'"</p>
  <p><b>Assunto:</b> "'.$assunto.'"</p></div>
  <div class="grid-item item3">
  <p>Clique no número para iniciar uma conversa pelo whatsapp.</p>
  <p>Para suporte entre em contato com o administrador.</p></div>
</div>





</body>
</html>
  ';
  
  //Enviando email

 // Destinatário
 $para = 'leonardo.fcosta69824@gmail.com';
  
 // Monta o corpo da mensagem com os campos
//  $corpo = "$mensagem";

  // Cabeçalho do e-mail
  $header = "From: $nome <$para> Reply-to: $email ";
  $header .= 'MIME-Version: 1.0' . "\r\n";
  $header .= "Content-type: text/html; charset=utf-8\n";
  

  //mail($para, $assunto, $corpo, $header);
  mail($para, $subject, $corpo, $header);

 print '<center>
  <div  id="msgBoxSend" class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Successo!</strong> Mensagem enviada, agradecemos o seu contato.
  </div></center>
	<script>
		setTimeout(function(){document.getElementById("msgBoxSend").style.display = "none";  }, 4000);
	</script>
  ';

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>



<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300,700" rel="stylesheet" type="text/css">

</head>
<body>

<div class="container">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	  <div class="form-group">
		<label for="nome">Nome</label>
		<input type="text" class="form-control" name="nome" aria-describedby="Nome" placeholder="Nome">
		
	  </div>
	  <div class="form-group">
		<label for="telefone">Telefone</label>
		<input type="text" class="form-control" name="telefone" placeholder="Telefone">
	  </div>
	  
	  <div class="form-group">
		<label for="whatsapp">Whatsapp</label>
		<input type="text" class="form-control" name="whatsapp" placeholder="Whatsapp">
	  </div>
	  
	  <div class="form-group">
		<label for="email">Email</label>
		<input type="email" class="form-control" name="email" placeholder="Email">
	  </div>
	  
	  <div class="form-group">
		<label for="assunto">Mensagem</label>
		<textarea class="form-control" name="assunto" rows="3"></textarea>
	  </div>
	  
	  <button type="submit" class="btn btn-primary">Enviar</button>
	</form>
</div>
</body>
</html>
