<?include("conn.php");?>
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
<?php

if($_REQUEST["editar"])
{
	$id = $_REQUEST["cod"];
	
		$ok = 1;
		
	if (!($_POST["categoria"] == "")) {
		$categoria = $_POST["categoria"]; 
	} else {
		$ok = 0;
	}
	
	if (!($_POST["posicao"] == "")) {
		$posicao = $_POST["posicao"];
	} else {
		$ok = 0;
	}
	
	if(!$ok) {
		alert("Algum campo foi preenchido incorretamente ou está em branco, tente novamente!");
	}
	else {
		
		$sql = "update categorias set categoria='$categoria', posicao={$posicao} where id=$id";		
		
		if(mysql_query($sql)){
			
			alert("Categoria alterada com sucesso!");
			redireciona("categorias_cadastra.php?cad=1&id=".$_REQUEST["editar"]);		
		}
	}
}	

if($_REQUEST["alterar"]) {
	$id_fabricante = $_REQUEST["alterar"];	
	
	$query = "select * from categorias where id=".$_REQUEST["id"];
	$results = mysql_query($query);
	$row = mysql_fetch_assoc($results);
		
	$id_categoria = $_REQUEST["id"];
	$categoria = $row["categoria"];
	$posicao = $row["posicao"];
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
				Gerenciamento de Categorias
			</div>
			<!-- INICIO - DIV info - Barra de informacao -->
			
		
			<form method="post" action="categorias_cadastra_alt.php?editar=<?=$id_fabricante?>&cod=<?=$id_categoria?>" enctype="multipart/form-data">
				<div id="caixa_form">
				<div id="linha_form">
					<input type="hidden" size="40" name="id_cat" value="<?=$id_categoria?>"/>
				 	<div id="label"><span class="label_fonte">Nome Categoria: </span></div>	<input type="text" size="40" name="categoria" value="<?=$categoria?>" />
				</div>
				
				<div id="linha_form">
				 	<div id="label"><span class="label_fonte">Posição de Exibição: </span></div>	<input type="number" size="3" name="posicao" value="<?=$posicao?>"/>
				</div>
								
				<p align="center"><input type="submit" name="cadastra" style="margin-bottom: -5px;" value="Salvar Edição" /></p>
			</div>
			</form>
			
			<!-- INICIO - DIV info fim - Barra de informacao -->
			<div id="info_fim">
				&nbsp;
			</div>
			<!-- INICIO - DIV info fim - Barra de informacao -->	
		
	</div>
	<!-- FIM - DIV global - Emgloba todo o site -->	
	</div>

<!-- QuickMenu Structure [Menu 0] -->


<!-- Create Menu Settings: (Menu ID, Is Vertical, Show Timer, Hide Timer, On Click, Right to Left, Horizontal Subs, Flush Left) -->
</body>
<script type="text/javascript">qm_create(0,false,0,500,false,false,false,false);</script>
</html>			