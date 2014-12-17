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
		
	if (!($_POST["fabricante"] == "")) {
		$fabricante = $_POST["fabricante"];
	} else {
		$ok = 0;
	}
	
	if (!($_POST["desc_fab"] == "")) {
		$desc_fab = addslashes($_POST["desc_fab"]);
	} else {
		$ok = 0;
	}
	
	if(!$ok) {
		alert("Algum campo foi preenchido incorretamente ou está em branco, tente novamente!");
	}
	else {
		
		if (!($_FILES[arq_fab][name] == "")) {
		$file = $_FILES[arq_fab][type];	
		$sExt = substr(strrchr($file, "/"),1);
		$sExt = strtolower($sExt);
		$arquivo = 'fabricantes_'.time() . "." . $sExt;
		move_uploaded_file($_FILES[arq_fab][tmp_name], $root_diretorio ."/". $arquivo);
		chmod($root_diretorio ."/". $arquivo, 0777);	
		
		$sql = "update fabricantes set fabricante='$fabricante',descricao='$desc_fab',img='$arquivo' where id=$id";		
		}
		else {
		$sql = "update fabricantes set fabricante='$fabricante',descricao='$desc_fab' where id=$id";	
		}
		
		if(mysql_query($sql)){
			
			alert("Fabricante cadastrada com sucesso!");
			redireciona("fabricantes_cadastra.php");
		}
	}
}	

if($_REQUEST["alterar"]) {
	$query = "select * from fabricantes where id=".$_REQUEST["id"];
	$results = mysql_query($query);
	$row = mysql_fetch_assoc($results);
		
	$id_fabricante = $_REQUEST["id"];
	$fabricante = $row["fabricante"];
	$desc_fab = $row["descricao"];
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
				Gerenciamento de Fabricantes
			</div>
			<!-- INICIO - DIV info - Barra de informacao -->
			
		
			<form method="post" action="fabricantes_cadastra_alt.php?editar=1&cod=<?=$id_fabricante?>" enctype="multipart/form-data">
				<div id="caixa_form">
				<div id="linha_form">
					<input type="hidden" size="40" name="id_fab" value="<?=$id_fabricante?>"/>
				 	<div id="label"><span class="label_fonte">Nome Fabricante: </span></div>	<input type="text" size="40" name="fabricante" value="<?=$fabricante?>"  <?if($id_fabricante == 1) {?>disabled<?}?>/>
				</div>
				
				<div id="linha_form_auto">
					<div id="label"><span class="label_fonte">Breve Descrição: </span></div>	<textarea cols="80" rows="10" name="desc_fab" ><?=$desc_fab?></textarea>
				</div>
				
				<div id="linha_form">
					<div id="label"><span class="label_fonte">Imagem: </span></div>	<input type="file" size="50" name="arq_fab" class="form_style"  <?if($id_fabricante == 1) {?>disabled<?}?>>
				</div>
				
				<p align="center"><input type="submit" <?if($id_fabricante == 1) {?>disabled<?}?> name="cadastra" style="margin-bottom: -5px;" value="Salvar Edição" /></p>
			</div>
			</form>
		
	</div>
	<!-- FIM - DIV global - Emgloba todo o site -->	
	</div>

<!-- QuickMenu Structure [Menu 0] -->


<!-- Create Menu Settings: (Menu ID, Is Vertical, Show Timer, Hide Timer, On Click, Right to Left, Horizontal Subs, Flush Left) -->
</body>
<script type="text/javascript">qm_create(0,false,0,500,false,false,false,false);</script>
</html>			