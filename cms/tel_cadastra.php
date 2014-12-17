<?php include("conn.php"); ?>
<?php include("logon.php"); ?>
<?php include("library.php"); ?>
<script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script><script src="js/jquery.js" type="text/javascript"></script><script src="js/jquery.maskedinput.min.js" type="text/javascript"></script>
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
	
	$sql = "DELETE FROM  contato_tel WHERE id=".$_REQUEST['cod'];
	if (mysql_query($sql)) {
		alert("Telefone excluído com sucesso!");
		redireciona("tel_cadastra.php");
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

	if (!($_POST["tel"] == "")) {
		$telefone = $_POST["tel"];
	} else {
		$ok = 0;
	}
	
    
	// Se seu campo estiver OK!
	if (!$ok) {
		// Alert de ERRO!
		alert("Algum campo foi preenchido incorretamente ou está em branco, tente novamente!");
	} else {
	
			// Gravando dados no banco
			$sql = "INSERT INTO contato_tel (nome,telefone) VALUES ('$nome','$telefone')";
			//echo $sql;
			
			// Confirmacao de insert
			if (mysql_query($sql)) {
				alert("Telefone cadastrado com sucesso!");
				redireciona("tel_cadastra.php");  
			}
		
		}

  }


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
				Cadastro de Telefones para contato
			</div>
			<!-- INICIO - DIV info - Barra de informacao -->
			
			<form action="tel_cadastra.php?cadastra=1" method="post" name="cadastro" enctype="multipart/form-data">
			
			<!-- INICIO - DIV caixa_form - Div que ira englobar todo o formulario -->
			<div id="caixa_form">
				
				<div id="linha_form">
					<div id="label"> <span class="label_fonte">Nome: </span> </div><input type="text" size="50" name="nome" value="<?=$nome?>" class="form_style">
				</div>
			
				<div id="linha_form">
					<div id="label"> <span class="label_fonte">Telefone: </span> </div><input type="text" size="50" name="tel" placeholder="(99) 9999.9999" id="tel1" value="<?=$telefone?>" class="form_style">
				</div>


				
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
				Telefones cadastrados para contato
			</div>
			<!-- INICIO - DIV info - Barra de informacao -->
			
			
			<!-- INICIO - DIV caixa_form - Div que ira englobar todo o conteudo -->
			<div id="caixa_table">
			

				<table width="100%" align="center" class="sortable" cellspacing="3">
					<tr height="30">
						<td align="center">Nome</td>
						<td align="center">Telefone</td>
						<td align="center">Ações</td>
					</tr>  
					
				<?
					$sql = "SELECT * FROM contato_tel ORDER BY telefone";
					$result = mysql_query($sql);
					
					while ($linha = mysql_fetch_assoc($result)) {
				
				?>					
					<tr height="30" class="cel_fonte" onMouseOver="this.className='cel_fonte_hover'" onMouseOut="this.className='cel_fonte'">
						<td align="center" ><?=$linha["nome"]?> </td>
						<td align="center" ><?=$linha["telefone"]?> </td>
						<td align="center" width="1%" nowrap="nowrap">
							<!--
							<a href="trabalhe_cadastra.php?edit=1&cod=<?=$linha["id"]?>"><img src="images/icon_editar.gif" alt="Editar" border="0"></a>
							-->
							<a href="tel_cadastra.php?apagar=1&cod=<?=$linha["id"] ?>"><img src="images/icon_apagar.gif" onclick="javascript: return confirm('Deseja realmente excluir o Telefone <?=$linha["telefone"] ?>?')" alt="Apagar" border="0"></a></td>
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
<script>	jQuery(function($){   	$("#tel1").mask("(99) 9999.9999");		});	</script>

<!-- Create Menu Settings: (Menu ID, Is Vertical, Show Timer, Hide Timer, On Click, Right to Left, Horizontal Subs, Flush Left) -->
</body>
<script type="text/javascript">qm_create(0,false,0,500,false,false,false,false);</script>
</html>