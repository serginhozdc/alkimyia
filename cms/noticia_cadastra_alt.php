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

// --- INICIO Efetuando o cadastro
if ($_REQUEST['editar']) {
	
	// Varificacao de campos
	$id = $_REQUEST["cod"];
    
    $ok = 1;
	
	if (!($_POST["titulo"] == "")) {
		$titulo = $_POST["titulo"];
	} else {
		$ok = 0;
	}

	if (!($_POST["dia"] == "")) {
		$dia = $_POST["dia"];
	} else {
		$ok = 0;
	}

	if (!($_POST["mes"] == "")) {
		$mes = $_POST["mes"];
	} else {
		$ok = 0;
	}

	if (!($_POST["ano"] == "")) {
		$ano = $_POST["ano"];
	} else {
		$ok = 0;
	}

	if (!($_POST["breve"] == "")) {
		$breve = $_POST["breve"];
	} else {
		$ok = 0;
	}

	if (!($_POST["texto"] == "")) {
		$texto = $_POST["texto"];
	} else {
		$ok = 0;
	}

	$data = $ano . "-" . $mes . "-" . $dia;
	
	if (!($_FILES[img][name] == "")) {
		$img = $_FILES[img][name];
	} 
    
	// Se seu campo estiver OK!
	if (!$ok) {
		// Alert de ERRO!
		alert("Algum campo foi preenchido incorretamente ou est em branco, tente novamente!");
	} else {

		if ($_FILES[img][name]) {
			// Redimencionando Imagens --------------
			
			//recebendo o arquivo multipart vindo do flash...
			//$arquivo = $_FILES[img][name];
			$file = $_FILES[img];
			
			$sExt = substr(strrchr($file["name"], "."),1);
			$sExt = strtolower($sExt);
			$arquivo = time().".".$sExt;
			
			
			move_uploaded_file($_FILES[img][tmp_name], $root_diretorio . "/" . $arquivo);
			
			// Gravando dados no banco
			$sql = "UPDATE noticias SET titulo='$titulo',data='$data',breve='$breve',texto='$texto', img='$arquivo' WHERE id=$id";			
					
			// Confirmacao de insert
			if (mysql_query($sql)) {
				alert("Notícia alterada com sucesso!");
				redireciona("noticia_cadastra.php");
			}
						
		} else {
			
		}
			// Gravando dados no banco
			$sql = "UPDATE noticias SET titulo='$titulo',data='$data',breve='$breve',texto='$texto' WHERE id=$id";			
					
			// Confirmacao de insert
			if (mysql_query($sql)) {
				alert("Notícia alterada com sucesso!");
				redireciona("noticia_cadastra.php");
			}

		}

  }


if ($_REQUEST['edit']) {
    $id = $_REQUEST["cod"];
    $sql = "SELECT id, titulo, DAY(data) AS dia, MONTH(data) AS mes, YEAR(data) AS ano, breve, texto FROM noticias WHERE id=$id";
    $result = mysql_query($sql);
    $linha = mysql_fetch_assoc($result);
    
    
    $titulo = $linha["titulo"];
	$dia = $linha["dia"];	
    $mes = $linha["mes"];
    $ano = $linha["ano"];	
    $breve = $linha["breve"];	
    $texto = $linha["texto"];
 
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
				Editando Noticias
			</div>
			<!-- INICIO - DIV info - Barra de informacao -->
			
			<form action="noticia_cadastra_alt.php?editar=1&cod=<?=$id;?>" method="post" name="cadastro" enctype="multipart/form-data">
			
			<!-- INICIO - DIV caixa_form - Div que ira englobar todo o formulario -->
			<div id="caixa_form">
				
			
				<div id="linha_form">
					<div id="label"> <span class="label_fonte">Título: </span> </div><input type="text" size="50" name="titulo" value="<?=$titulo ?>" class="form_style">
				</div>
				
				<div id="linha_form">
					<div id="label"> <span class="label_fonte">Data: </span> </div>
					<!-- Select de dia -->
					<select name="dia" class="form_style">
					<?
						
						for ($i=1;$i<=31;$i++) {
							if ($dia == $i) {
								$check = "selected=\"selected\"";
							} else {
								$check = "";
							}
					?>
						<option value="<?=$i ?>" <?=$check ?>><?=$i ?></option>
					<?
					}
					?>
					</select>
					<!-- Select de dia -->
					/
					<!-- Select de mes -->
					<select name="mes" class="form_style">
					<?
						for ($i=1;$i<=12;$i++) {
							if ($mes == $i) {
								$check = "selected=\"selected\"";
							} else {
								$check = "";
							}
					?>
						<option value="<?=$i ?>" <?=$check ?>><?=ucfirst(string_mes($i)); ?></option>
					<?
					}
					?>
					</select>
					<!-- Select de mess -->
					/
					<!-- Select de ano -->
					<select name="ano" class="form_style">
					<?
						for ($i=($ano-30);$i<=($ano+30);$i++) {
							if ($ano == $i) {
								$check = "selected=\"selected\"";
							} else {
								$check = "";
							}
					?>
						<option value="<?=$i ?>" <?=$check ?>><?=$i; ?></option>
					<?
					}
					?>
					</select>
					<!-- Select de ano -->
				
				</div>
								
				<div id="linha_form_auto">
					<div id="label"> <span class="label_fonte">Breve: </span> </div><textarea rows="10" cols="80" name="breve"><?=$breve ?></textarea>
				</div>
				
				<div id="linha_form_auto">
					<div id="label"> <span class="label_fonte">Texto: </span> </div><textarea rows="10" cols="80" name="texto"><?=$texto ?></textarea>
				</div>
				
				<div id="linha_form">
					<div id="label"> <span class="label_fonte">Imagens (385x240):</span> </div><input type="file" size="50" name="img" class="form_style">
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
			
	
				
				
		</div>
		<!-- INICIO - DIV PRINCIPAL - Div com conteudo principal -->		
	
	</div>
	<!-- FIM - DIV global - Emgloba todo o site -->	


<!-- QuickMenu Structure [Menu 0] -->


<!-- Create Menu Settings: (Menu ID, Is Vertical, Show Timer, Hide Timer, On Click, Right to Left, Horizontal Subs, Flush Left) -->
</body>
<script type="text/javascript">qm_create(0,false,0,500,false,false,false,false);</script>
</html>