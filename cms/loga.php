<?include("conn.php");?>
<?include("library.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">	
	<head>
		<title>CMS - Mural Móveis Representações - PubliX Comunicação</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<meta name="author" content="PubliX Comunicação - Comunicação e Propaganda - http://www.publixcomunicacao.com.br" />
		<meta name="language" content="pt-br" />
	</head>
	
	<body>
<?php
	// Inicia sess�es
	session_start();
	
	// Recupera o login
	$login = isset($_POST["login"]) ? addslashes(trim($_POST["login"])) : FALSE;
	// Recupera a senha, a criptografando em MD5
	$senha = isset($_POST["senha"]) ? md5(trim($_POST["senha"])) : FALSE;
	
	// Usu�rio n�o forneceu a senha ou o login
	if(!$login || !$senha)
	{
	    echo  "<script language=\"javascript\">alert(' Você deve digitar sua senha e login!')
	    location.href = \"index.php\"; 
	    </script>";
	}
	
	/**
	* Executa a consulta no banco de dados.
	* Caso o n�mero de linhas retornadas seja 1 o login � v�lido,
	* caso 0, inv�lido.
	*/
$SQL = "SELECT *
        FROM usuarios
        WHERE login ='$login' "; 
	$result_id = @mysql_query($SQL) or die("Erro no banco de dados!");
	$total = @mysql_num_rows($result_id);
	
	// Caso o usu�rio tenha digitado um login v�lido o n�mero de linhas ser� 1..
	if($total)
	{
	    // Obt�m os dados do usu�rio, para poder verificar a senha e passar os demais dados para a sess�o
	    $dados = @mysql_fetch_array($result_id);
	
	    // Agora verifica a senha
	    if(!strcmp($senha, $dados["senha"]))
	    {
	        // TUDO OK! Agora, passa os dados para a sess�o e redireciona o usu�rio
	        $_SESSION["id_usuario_adm"]   = $dados["id"];
	        $_SESSION["nome_usuario_adm"] = stripslashes($dados["nome"]);
	        $_SESSION["sobrenome_usuario_adm"] = stripslashes($dados["sobrenome"]);
	        $_SESSION["login_adm"] = stripslashes($dados["login"]);
	        $cod_user = $dados["id"];
	        
	        $data = date("Y-m-d H:i:s");
	        $sql = "UPDATE usuarios SET UltimoLogon='$data' WHERE id='$cod_user'";
	        mysql_query($sql);
	        
	    	header("Location: home.php");
	    	exit;	        
	    }
	    // Senha inv�lida
	    else
	    {
	    alert("Senha Inválida!");
	    echo  "<script language=\"javascript\">
	    location.href = \"index.php\"; 
	    </script>";
	    }
	}
	// Login inv�lido
	else
	{
		alert("O usuário fornecido por você é inexistente!");
	    echo  "<script language=\"javascript\">
	    location.href = \"index.php\"; 
	    </script>";
	} 
?>
	</body>
</html> 