<?


// Arquivo para conexao com banco de dados

// Servidor
// Servidor
$server = "186.202.152.41";

// Senha
$senha = "zdc141806";

// Usuário
$user = "aikid_site";

// Banco de dados
$db = "aikidobh_site";

// Conexão com o bando
$conn = mysql_connect($server,$user,$senha) or die("Erro connection: " . mysql_error());

// Selecionando o banco
mysql_select_db($db) or die("Erro database: " . mysql_error());

$root_diretorio = "../upload/";

// Funcao pra acionar o alert
function alert2($frase) {
	echo "<script language=\"javascript\">alert('$frase');</script>";
}

function sendMail($de,$mensagem) {	
	// Destinario
	$to = "sergio@publixcomunicacao.com.br";
	$email = $de;
	
	// Assunto
	$subject = "Mural Móveis - Contato do site";

	//verifica se todos os campos estão preenchidos, se não estiverem, não envia o email
	$email_enviar = $to;
	require('class.phpmailer.php'); //carrega a classe phpmailer, altere para a pasta onde se encontra o arquivo "class.phpmailer.php"

	$mail = new PHPMailer(); //instancia a classe PHPMailer	
	$mail->IsSMTP(); //define que o email será enviado por SMTP	
	$mail->SMTPAuth = true;	
	$mail->SMTPSecure = "tls";
	$mail->CharSet = 'UTF-8';	
	$mail->Port = 587; //define a porta do servidor smtp - altere para a porta que seu servidor usa	
	$mail->Host = 'smtp.direcaobh.com.br'; //define o servidor smtp - altere para o seu servidor smtp	
	$mail->Username = 'site@direcaobh.com.br'; //define o nome de usuario do servidor smtp, altere para o seu usuário	
	$mail->Password = 'website2knet'; //define a senha do servidor smtp, altere para a sua  	
	$mail->SetFrom(''.$email.'', ''.$nome.''); //define o remetente da mensagem, altere para o real	
	$mail->AddAddress(''.$email_enviar.'', 'Site Direção'); //define o destino da mensagem, altere para o desejado
	$mail->AddAddress('contato@comex.com.br', 'Site Direção'); //define o destino da mensagem, altere para o desejado
	$mail->Subject = ''.$subject.''; //define o assunto da mensagem
	
	$body = $mensagem;

	//a variavel $body define o corpo da mensagem
	$mail->MsgHTML($body); //configura o email como HTML
	
	if($mail->Send()){
		return true;
	}else{	
		return false;
	}
}   
?> 