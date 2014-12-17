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

<?php


if($_REQUEST["alterar"])
{
	$id = $_REQUEST["cod"];
	$id_case = $_REQUEST["cod"];
		
	$ok = 1;
		
	if (!($_POST["nome"] == "")) {
		$nome = $_POST["nome"];
	} else {
		$ok = 0;
	}
	
	if (!($_POST["breve"] == "")) {
		$breve = addslashes($_POST["breve"]);
	} else {
		$ok = 0;
	}
	
	if (!($_POST["desc_case"] == "")) {
		$desc_case = addslashes($_POST["desc_case"]);
	} else {
		$ok = 0;
	}
		
	if(!$ok) {
		alert("Algum campo foi preenchido incorretamente ou está em branco, tente novamente!");
	}
	else {
		
	if ($_FILES[arq1][name]) {
		$file = $_FILES[arq1][type];
						
		$sExt = substr(strrchr($file, "/"),1);
		$sExt = strtolower($sExt);
		$arquivo = 'cases_'.time() . "." . $sExt;
		move_uploaded_file($_FILES[arq1][tmp_name], $root_diretorio ."/". $arquivo);
		chmod($root_diretorio ."/". $arquivo, 0777);
		
		$sql = "update cases_sucesso set nome='$nome',breve='$breve',descricao='$desc_case',img='$arquivo' where id=$id";
	}
	else {
		$sql = "update cases_sucesso set nome='$nome',breve='$breve',descricao='$desc_case' where id=$id";
	}	
	
		//echo $sql;
	
		if(mysql_query($sql)) {
			alert("Case alterado com sucesso!");	
			redireciona("cases_cadastra.php");	
		}
	}
}

if($_REQUEST["editar"]) {
	
		$id_case = $_REQUEST["id"];
		$sql1 = "select * from cases_sucesso where id=".$_REQUEST["id"];
		$result1 = mysql_query($sql1);
		$linha1 = mysql_fetch_assoc($result1);
	
		$sql2 = "select * from categorias order by categoria asc";
		$res = mysql_query($sql2);	
		
		$desc_case = $linha1["descricao"];
		$nome = $linha1["nome"];
		$id_produto = $_REQUEST["id"];
		$breve = $linha1["breve"];

		//echo $id_case;

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
				Gerenciamento de Cases de Sucesso
			</div>
			<!-- INICIO - DIV info - Barra de informacao -->
			

			<form method="post" action="cases_cadastra_alt.php?alterar=1&cod=<?=$id_case?>" enctype="multipart/form-data">
				<div id="caixa_form">							
				<div id="linha_form">
					<input type="hidden" size="40" name="id_case" value="<?=$id_case?>"/>
				 	<div id="label"><span class="label_fonte">Nome: </span></div>	<input type="text" size="60" name="nome" value="<?=$nome?>"/>
				</div>

				<div id="linha_form_auto">
					<div id="label"><span class="label_fonte">Breve Descrição: </span></div>	<textarea cols="80" rows="3" name="breve"><?=$breve?></textarea>
				</div>

				<div id="linha_form_auto">
					<div id="label"><span class="label_fonte">Descrição: </span></div>	<textarea cols="80" rows="15" name="desc_case"><?=$desc_case?></textarea>
				</div>
				
				<div id="linha_form">								
					<div id="label"><span class="label_fonte">Editar Foto Principal: </span></div>
								
					<input type="file" size="50" name="arq1" class="form_style">
				</div>
				
				
			<!-- INICIO - DIV caixa_form - Div que ira englobar todo o formulario -->			
				<p align="center"><input type="submit" name="cadastra" style="margin-bottom: -5px;" value="Cadastrar Case" /></p>
			</div>
		</form>
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