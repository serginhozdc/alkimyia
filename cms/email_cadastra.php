<?php include("conn.php"); ?>
<?php include("logon.php"); ?>
<?php include("library.php"); ?>
<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
// Creates a new plugin class and a custom listbox
tinymce.create('tinymce.plugins.ExamplePlugin', {
        createControl: function(n, cm) {
                switch (n) {
                        case 'mymenubutton':
                                var c = cm.createMenuButton('mymenubutton', {
                                        title : 'My menu button',
                                        image : 'img/example.gif',
                                        icons : false
                                });

                                c.onRenderMenu.add(function(c, m) {
                                        var sub;

                                        m.add({title : 'Some item 1', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 'Some item 1');
                                        }});

                                        m.add({title : 'Some item 2', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 'Some item 2');
                                        }});

                                        sub = m.addMenu({title : 'Some item 3'});

                                        sub.add({title : 'Some item 3.1', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 'Some item 3.1');
                                        }});

                                        sub.add({title : 'Some item 3.2', onclick : function() {
                                                tinyMCE.activeEditor.execCommand('mceInsertContent', false, 'Some item 3.2');
                                        }});
                                });

                                // Return the new menu button instance
                                return c;
                }

                return null;
        }
});

// Register plugin with a short name
tinymce.PluginManager.add('example', tinymce.plugins.ExamplePlugin);

// Initialize TinyMCE with the new plugin and menu button
tinyMCE.init({
        plugins : '-example', // - tells TinyMCE to skip the loading of the plugin
        mode : "textareas",
        theme : "advanced",
        theme_advanced_buttons1 : "bold,italic,underline,separator,strikethrough,justifyleft,justifycenter,justifyright,justifyfull,bullist,numlist,undo,redo,link,unlink",
        theme_advanced_buttons2 : "",
        theme_advanced_buttons3 : "",
        theme_advanced_toolbar_location : "top",
        theme_advanced_toolbar_align : "left",
        theme_advanced_statusbar_location : "bottom"
});
</script>
 
<?
// --- INICIO Efetuando a exlcusao
if ($_REQUEST['apagar']) {
	
	$sql = "DELETE FROM  contato_email WHERE id=".$_REQUEST['cod'];
	if (mysql_query($sql)) {
		alert("E-mail excluído com sucesso!");
		redireciona("email_cadastra.php");
	}
	
}
// --- FIM    Efetuando a exlcusao

// --- INICIO Efetuando o cadastro
if ($_REQUEST['cadastra']) {
	
	// Varificacao de campos
    
    $ok = 1;
	
	if (!($_POST["nome"] == "")) {
		$nome = $_POST["nome"];
	} else {
		$ok = 0;
	}

	if (!($_POST["email"] == "")) {
		$email = $_POST["email"];
	} else {
		$ok = 0;
	}
	
    
	// Se seu campo estiver OK!
	if (!$ok) {
		// Alert de ERRO!		alert("Algum campo foi preenchido incorretamente ou está em branco, tente novamente!");
	} else {
		$visivel = $_POST["visivel"];
			// Gravando dados no banco
			$sql = "INSERT INTO contato_email (nome,email,visivel) VALUES ('$nome','$email','$visivel')";
			//echo $sql;
			
			// Confirmacao de insert
			if (mysql_query($sql)) {
				alert("E-mail cadastrado com sucesso!");
				redireciona("email_cadastra.php");  
			}		

		}

  }
if ($_REQUEST["mostrar"] == "off") {		$cod = $_REQUEST["cod"];	$sql = "UPDATE contato_email SET visivel=0 WHERE id={$cod}";	mysql_query($sql);}if ($_REQUEST["mostrar"] == "on") {	$cod = $_REQUEST["cod"];	$sql = "UPDATE contato_email SET visivel=1 WHERE id={$cod}";	mysql_query($sql);}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php include("header.php"); ?>

<body>

<!-- This optional free use link disables the online purchase reminder.  Include within the body of your page -->
<div style="display: none;"><a id='qm_free' href='http://www.opencube.com'>OpenCube Drop Down Menu (www.opencube.com)</a>
<br><br><br></div>

	<!-- INICIO - DIV global - Emgloba todo o site -->
	<div id="global">
	
		<?php include("topo.php"); ?>	
		
		
		<!-- INICIO - DIV MENU - Menu do Sistema -->
		<?php include("menu.php"); ?>
		<!-- INICIO - DIV MENU - Menu do Sistema -->
		
		<!-- INICIO - DIV PRINCIPAL - Div com conteudo principal -->
		<div id="principal">
		
			<!-- INICIO - DIV info - Barra de informacao -->
			<div id="info">
				Cadastro de E-mails para contato
			</div>
			<!-- INICIO - DIV info - Barra de informacao -->
			
			<form action="email_cadastra.php?cadastra=1" method="post" name="cadastro" enctype="multipart/form-data">
			
			<!-- INICIO - DIV caixa_form - Div que ira englobar todo o formulario -->
			<div id="caixa_form">
				
				<div id="linha_form">
					<div id="label"> <span class="label_fonte">Nome: </span> </div><input type="text" size="50" name="nome" value="<?=$nome?>" class="form_style">
				</div>
			
				<div id="linha_form">
					<div id="label"> <span class="label_fonte">E-mail: </span> </div><input type="text" size="50" name="email" value="<?=$email?>" class="form_style">
				</div>								<div id="linha_form">					<div id="label"> <span class="label_fonte">Ficar vis&iacute;vel no site? </span> </div>					<input type="radio" name="visivel" value="1"><a  class="label_fonte">Sim</a></input><input type="radio" name="visivel" value="0" checked="checked"><a  class="label_fonte">N&atilde;o</a></input>				</div>							
				<p align="center"><input type="submit" value="Cadastrar" class="form_style"></p>
			</div>
			<!-- INICIO - DIV caixa_form - Div que ira englobar todo o formulario -->			
			
			</form>
				
			<!-- INICIO - DIV info fim - Barra de informacao -->
			<div id="info_fim">
				&nbsp;
			</div>
			<!-- INICIO - DIV info fim - Barra de informacao -->			
			
			
			
			<!-- INICIO - DIV info - Barra de informacao -->
			<div id="info">
				E-mails cadastrados para receber o formulário de contato
			</div>
			<!-- INICIO - DIV info - Barra de informacao -->
			
			
			<!-- INICIO - DIV caixa_form - Div que ira englobar todo o conteudo -->
			<div id="caixa_table">
			

				<table width="100%" align="center" class="sortable" cellspacing="3">
					<tr height="30">
						<td align="center">Nome</td>
						<td align="center">E-mail</td>												<td align="center">Vis&iacute;ivel</td>
						<td align="center">Ações</td>
					</tr>  
					
				<?
					$sql = "SELECT * FROM contato_email ORDER BY email";
					$result = mysql_query($sql);
					
					while ($linha = mysql_fetch_assoc($result)) {
				
				?>					
					<tr height="30" class="cel_fonte" onMouseOver="this.className='cel_fonte_hover'" onMouseOut="this.className='cel_fonte'">
						<td align="center" ><?=$linha["nome"]?> </td>
						<td align="center" ><?=$linha["email"]?> </td>												<?						if ($linha["visivel"] == 1) {						?>						<td align="center" ><a href="email_cadastra.php?mostrar=off&cod=<?=$linha["id"]?>"><img src="images/icon_ver.gif" alt="Mostrar" border="0"></a>  </td>								<?							} else {						?>						<td align="center" ><a href="email_cadastra.php?mostrar=on&cod=<?=$linha["id"]?>"><img src="images/icon_ver_off.gif" alt="Mostrar" border="0"></a>  </td>						<?						}						?>
						<td align="center" width="1%" nowrap="nowrap">
							<!--
							<a href="trabalhe_cadastra.php?edit=1&cod=<?=$linha["id"]?>"><img src="images/icon_editar.gif" alt="Editar" border="0"></a>
							-->
							<a href="email_cadastra.php?apagar=1&cod=<?=$linha["id"] ?>"><img src="images/icon_apagar.gif" onclick="javascript: return confirm('Deseja realmente excluir o E-mail <?=$linha["email"] ?>?')" alt="Apagar" border="0"></a></td>
					</tr>
				<?
				}
				?>
				</table>


			</div>
			<!-- INICIO - DIV caixa_form - Div que ira englobar todo o conteudo -->			  

				
			<!-- INICIO - DIV info fim - Barra de informacao -->
			<div id="info_fim">
				&nbsp;
			</div>
			<!-- INICIO - DIV info fim - Barra de informacao -->	
				
				
		</div>
		<!-- INICIO - DIV PRINCIPAL - Div com conteudo principal -->		
	
	</div>
	<!-- FIM - DIV global - Emgloba todo o site -->	


<!-- QuickMenu Structure [Menu 0] -->


<!-- Create Menu Settings: (Menu ID, Is Vertical, Show Timer, Hide Timer, On Click, Right to Left, Horizontal Subs, Flush Left) -->
</body>
<script type="text/javascript">qm_create(0,false,0,500,false,false,false,false);</script>
</html>