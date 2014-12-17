<?include("conn.php");?> 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">	
	<head>
		<title>CMS - Dojo Katsu Hayabi - PubliX Comunicação</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<meta name="author" content="PubliX Comunicação - Comunicação e Propaganda - http://www.publixcomunicacao.com.br" />
		<meta name="language" content="pt-br" />
	</head>
	 
	<body>
		
		<div id="global">
			
			<div class="logo_empresa">
				<img src="images/logo_empresa.png"  />
			</div>
			
			<div class="box_login">

				<form action="loga.php" method="post">
					<div class="div_usuario">
						<input type="text" name="login" class="campo_login" />
					</div>
					
					<div class="div_senha">
						<input type="password" name="senha" class="campo_senha" />
					</div>
					
					<div class="div_bt">
						<input type="image" src="images/bt_enviar.png" alt="Enviar" class="bt_enviar" onclick="submit();"  />
					</div>
				</form>
				
			</div>
			
			<div class="autor">
				<a href="http://www.publixcomunicacao.com" target="_blank">
					<img src="images/logo_publix_dev.png" alt="Desenvolvido por PubliX Comunicação" />
				</a>
			</div>
			
		</div>
		
	</body>
	
</html>