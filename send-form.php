<?php
header('Access-Control-Allow-Origin: *'); 
if($_POST){
	
	if(empty($_POST['nome']) || empty($_POST['email'])){
		echo '<script>
			$(document).ready(function(){
				swal("Ops...","Preencha todos os campos obrigatórios!","warning");
			});
			</script>';
	}else{
		$nome 		= utf8_decode($_POST['nome']);
		$email 		= utf8_decode($_POST['email']);
        $tel 		= utf8_decode($_POST['tel']);
        $conteudo 	= utf8_decode($_POST['conteudo']);
		$assunto 	= 'Contato enviado pelo site de Casamento';
		
		
		require_once('PHPMailer/class.phpmailer.php');
        $Email->SMTPDebug  = 1;
		$Email = new PHPMailer();
		$Email->SetLanguage("br");
		$Email->IsSMTP(); // Habilita o SMTP 
		$Email->SMTPAuth = true; //Ativa e-mail autenticado
		$Email->Host = 'smtp.gmail.com'; //Servidor de envio # verificar qual o host correto com a hospedagem as vezes fica como smtp.
		$Email->Port = '587'; // Porta de envio
		$Email->SMTPSecure = 'tls';
		$Email->Username = 'andrebmx789@gmail.com'; //e-mail que será autenticado
		$Email->Password = '312978Kb'; // senha do email
		// ativa o envio de e-mails em HTML, se false, desativa.
		$Email->IsHTML(true); 
		// email do remetente da mensagem
		$Email->From = $email;
		//$Email->SMTPDebug = 2; //mostra erros mais detalhados caso houver
		// nome do remetente do email
		$Email->FromName = ($nome);
		// Endereço de destino do emaail, ou seja, pra onde você quer que a mensagem do formulário vá?
		$Email->AddReplyTo($email, $nome);
		$Email->AddAddress("andrebmx789@gmail.com"); //  para quem será enviada a mensagem
		//$Email->AddCC('email@hotmail.com', 'Nome da pessoa'); // Copia
		//$Email->AddBCC('email@hotmail.com.br', 'Nome da pessoa'); // Cópia Oculta
		// informando no email, o assunto da mensagem
		$Email->Subject = utf8_decode($assunto);
		// Define o texto da mensagem (aceita HTML)
		$Email->Body .= "<br />
						 <strong>Nome:</strong> $nome<br />									
						 <strong>E-mail:</strong> $email<br/>
                         <strong>Telefone:</strong> $tel<br />	
                         <strong>Mensagem:</strong> $conteudo 	
						 									
						 ";	
		// verifica se está tudo ok com oa parametros acima, se nao, avisa do erro. Se sim, envia.
		if(!$Email->Send()){				
			 echo'
			<script>
				$(document).ready(function(){
					swal("Ops '.utf8_encode($nome).'...","Houve um erro ao enviar a mensagem, tente novamente!", "error");
				});
			</script>';

		}else{
			 echo'
		<script>
			$(document).ready(function(){
				swal("Sucesso '.utf8_encode($nome).'...", "O seu pedido foi registado com sucesso. \n A nossa equipa vai atribuir o seu bónus logo que possível", "success")
			});
		</script>';

		}		
	}
}
