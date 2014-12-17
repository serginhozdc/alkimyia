<?
// BIBLIOTECA DE FUNCOES

// Array de meses
$meses[1] = "Jan";
$meses[2] = "Fev";
$meses[3] = "Mar";
$meses[4] = "Abr";
$meses[5] = "Mai";
$meses[6] = "Jun";
$meses[7] = "Jul";
$meses[8] = "Ago";
$meses[9] = "Set";
$meses[10] = "Out";
$meses[11] = "Nov";
$meses[12] = "Dez";

// Mostra o preço em Reais.
function converte_preco($preco) {
    return "R$ " .number_format($preco, 2, ',', '.');
}

function stringParaBusca($str) {
	//Transformando tudo em minúsculas
	$str = trim(strtolower($str));

	//Tirando espaços extras da string... "tarcila  almeida" ou "tarcila   almeida" viram "tarcila almeida"
	while ( strpos($str,"  ") )
		$str = str_replace("  "," ",$str);
	
	//Agora, vamos trocar os caracteres perigosos "ã,á..." por coisas limpas "a"
	$caracteresPerigosos = array ("Ã","ã","Õ","õ","á","Á","é","É","í","Í","ó","Ó","ú","Ú","ç","Ç","à","À","è","È","ì","Ì","ò","Ò","ù","Ù","ä","Ä","ë","Ë","ï","Ï","ö","Ö","ü","Ü","Â","Ê","Î","Ô","Û","â","ê","î","ô","û","!","?",",","“","”","-","\"","\\","/");
	$caracteresLimpos    = array ("a","a","o","o","a","a","e","e","i","i","o","o","u","u","c","c","a","a","e","e","i","i","o","o","u","u","a","a","e","e","i","i","o","o","u","u","A","E","I","O","U","a","e","i","o","u",".",".",".",".",".",".","." ,"." ,".");
	$str = str_replace($caracteresPerigosos,$caracteresLimpos,$str);
	
	//Agora que não temos mais nenhum acento em nossa string, e estamos com ela toda em "lower",
	//vamos montar a expressão regular para o MySQL
	$caractresSimples = array("a","e","i","o","u","c");
	$caractresEnvelopados = array("[a]","[e]","[i]","[o]","[u]","[c]");
	$str = str_replace($caractresSimples,$caractresEnvelopados,$str);
	$caracteresParaRegExp = array(
		"(a|ã|á|à|ä|â|&atilde;|&aacute;|&agrave;|&auml;|&acirc;|Ã|Á|À|Ä|Â|&Atilde;|&Aacute;|&Agrave;|&Auml;|&Acirc;)",
		"(e|é|è|ë|ê|&eacute;|&egrave;|&euml;|&ecirc;|É|È|Ë|Ê|&Eacute;|&Egrave;|&Euml;|&Ecirc;)",
		"(i|í|ì|ï|î|&iacute;|&igrave;|&iuml;|&icirc;|Í|Ì|Ï|Î|&Iacute;|&Igrave;|&Iuml;|&Icirc;)",
		"(o|õ|ó|ò|ö|ô|&otilde;|&oacute;|&ograve;|&ouml;|&ocirc;|Õ|Ó|Ò|Ö|Ô|&Otilde;|&Oacute;|&Ograve;|&Ouml;|&Ocirc;)",
		"(u|ú|ù|ü|û|&uacute;|&ugrave;|&uuml;|&ucirc;|Ú|Ù|Ü|Û|&Uacute;|&Ugrave;|&Uuml;|&Ucirc;)",
		"(c|ç|Ç|&ccedil;|&Ccedil;)" );
	$str = str_replace($caractresEnvelopados,$caracteresParaRegExp,$str);
	
	//Trocando espaços por .*
	$str = str_replace(" ",".*",$str);
	
	//Retornando a String finalizada!
	return $str;
}

// Funcao q retorna Permissao da pagina
function permita($cod_permit,$pagina) {
	if ($cod_permit != 555) {
		$sql = "SELECT $pagina FROM ce_permissoes WHERE codigo=$cod_permit";
		$result = mysql_query($sql);
		$linha = mysql_fetch_assoc($result);
		
		if ($linha["$pagina"] == 0) {
			header("Location: alerta.php");
		}
	}
}


// Funcao q retorna Permissao da pagina
function retorna_permita($cod_permit,$pagina) {
	if ($cod_permit != 555) {
		$sql = "SELECT $pagina FROM ce_permissoes WHERE codigo=$cod_permit";
		$result = mysql_query($sql);
		$linha = mysql_fetch_assoc($result);
		
		return $linha["$pagina"];
	}else{
		return 1;
	}
	
}
// Funcao pra acionar o alert
function alert($frase) {

	echo "<script language=\"javascript\">alert('$frase');</script>";
	
}

// Funcao pra acionar o alert
function alert_return($frase) {

	return "<script language=\"javascript\">alert('$frase');</script>";
	
}

// Funcao para a tag <title>
function titulo_janela() {

	$sql_comando = "SELECT * FROM  ce_config WHERE Comando='Titulo_Janela'";
	$result_comando = mysql_query($sql_comando);
	$linha_comando = mysql_fetch_assoc($result_comando);
	return $linha_comando["exec"];
}

// Funcao para redirecionar.
function redireciona($arq) {

	echo "<script language=\"javascript\">
		location.href = \"$arq\";
	</script>";
	
}

function SimNaoIcone($valor,$tabela,$campo,$codigo) {
	
	if ($valor == 1) {
		$icone = "<a href='produtos_gerencia.php?muda=1&valor=0&tabela=$tabela&campo=$campo&cod=$codigo'><img src='imagens/sim.gif' title='Sim' alt='Sim' border='0'></a>";
	}
	
	if ($valor == 0) {
		$icone = "<a href='produtos_gerencia.php?muda=1&valor=1&tabela=$tabela&campo=$campo&cod=$codigo'><img src='imagens/nao.gif' title='Não' alt='Não' border='0'></a";
	}
	
	return $icone;
	
}

// E-mail de ouvintes
function email_ouvinte($nome, $sobrenome, $email, $login, $senha) {

// Destinario
$to = "$email";

// Assunto
$subject = "Infovip - Login de acesso";

// Cabecalho
$headers = "From: Infovip Computadores <eduardo@infovip.com.br>\n";
$headers .= "Reply-To: Infovip Computadores  <eduardo@infovip.com.br>\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=utf-8";

// Corpo do E-mail
$message = "
<html>
	<head>
		<title>Infovip Computadores</title>
	</head>
	
	<body>
		<p>Ol&aacute; $nome $sobrenome,</p>
		<p>Segue abaixo a sua senha de acesso para o site do Programa Bastidores</p>
		<p><strong>Login:</strong> $login <br />
		    <strong>Senha: </strong> $senha</p>
		<p>O endere&ccedil;o para acesso &eacute;: <a href='http://www.programabastidores.com.br'>http://www.programabastidores.com.br</a></p>
		<p>Atenciosamente,</p>
		<p>Programa Bastidores</p>
	</body>
</html>
";

// Envio da mensagem
$mail_sent = @mail($to, $subject, $message, $headers);
}

// 
function email($nome, $sobrenome, $email, $login, $senha) {

// Destinario
$to = "$email";

// Assunto
$subject = "Infovip - Login de acesso";

// Cabecalho
$headers = "From: Infovip Computadores <eduardo@infovip.com.br>\n";
$headers .= "Reply-To: Infovip Computadores  <eduardo@infovip.com.br>\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=utf-8";

// Corpo do E-mail
$message = "
<html>
	<head>
		<title>Senha da Infovip Computadores - Sistema de Campanha</title>
	</head>
	
	<body>
		<p>Ol&aacute; $nome $sobrenome,</p>
		<p>Segue abaixo a sua senha de acesso para o Sistema Administrativo da Infovip Computadores:</p>
		<p><strong>Login:</strong> $login <br />
		    <strong>Senha: </strong> $senha</p>
		<p>O endere&ccedil;o para acesso &eacute;: <a href='http://www.infovip.com.br/cms'>http://www.infovip.com.br/cms</a></p>
		<p>Ao efetuar seu primeiro acesso, ser&aacute; obrigat&oacute;ria a mudan&ccedil;a da senha.</p>
		<p>Atenciosamente,</p>
		<p>Infovip Computadores</p>
	</body>
</html>
";

// Envio da mensagem
$mail_sent = @mail($to, $subject, $message, $headers);
}

// Retorna string do mes
function string_mes ($mes) {
	
	switch ($mes) {
    case 1:
        return "janeiro";
        break;
    case 2:
        return "fevereiro";
        break;
    case 3:
        return "mar&ccedil;o";
        break;
    case 4:
        return "abril";
        break;
    case 5:
        return "maio";
        break;
    case 6:
        return "junho";
        break;
    case 7:
        return "julho";
        break;
    case 8:
        return "agosto";
        break;
    case 9:
        return "setembro";
        break;
    case 10:
        return "outubro";
        break;
    case 11:
        return "novembro";
        break;
    case 12:
        return "dezembro";
        break;
	} //End IF switch
}

// Retorna string do mes
function string_dia_semana ($mes) {
	
	switch ($mes) {
    case "Sunday":
        return "Domingo";
        break;
    case "Monday":
        return "Segunda-feira";
        break;
    case "Tuesday":
        return "Terça-feira";
        break;
    case "Wednesday":
        return "Quarta-feira";
        break;
    case "Thursday":
        return "Quinta-feira";
        break;
    case "Friday":
        return "Sexta-feira";
        break;
    case "Saturday":
        return "Sábado";
        break;
	} //End IF switch
}

//Pega a idade a partir da data de nascimento no formato dd/mm/aaaa
function calc_idade( $data_nasc ){

$data_nasc = explode("/", $data_nasc);

$data = date("d/m/Y");
$data = explode("/", $data);
$anos = $data[2] - $data_nasc[2];

if ( $data_nasc[1] >= $data[1] ){

if ( $data_nasc[0] <= $data[0] ){
return $anos; break;
}else{
return $anos-1;
break;
}
}else{

return $anos;
}
} 


?>