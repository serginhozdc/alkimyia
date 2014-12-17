<?php include("conn.php"); ?>
<?php include("logon.php"); ?>
<?php include("library.php"); ?>
<?php include("wideimage-lib/WideImage.php");?>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="js/maskedinput.js"></script>
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
if ($_REQUEST['edita']) {
	
	$sql = "SELECT * FROM  eventos WHERE id=".$_REQUEST['cod'];
	$result = mysql_query($sql);
	$linha = mysql_fetch_assoc($result);
	
	$data = implode('/' , array_reverse(explode('-', $linha['data'])));
}
// --- FIM    Efetuando a exlcusao

// --- INICIO Efetuando o cadastro
if ($_REQUEST['edit']) {
	
	// Varificacao de campos
    
    $ok = 1;
	
	if (!($_FILES[img][name] == "")) {
		$img = $_FILES[img][name];
	} /*else {
		$ok = 0;
	}*/
    
	
	if (!($_POST["data"] == "")) {
			
		$data = implode("-",array_reverse(explode("/",$_POST["data"])));

	}else {
		$ok = 0;
	}
	
	if (!($_POST["nome"] == "")) {
			
		$nome = $_POST['nome'];

	}else {
		$ok = 0;
	}
	
	if (!($_POST["descricao"] == "")) {
			
		$descricao = $_POST['descricao'];

	}else {
		$ok = 0;
	}
	if (!($_POST["breve"] == "")) {
			
		$breve = $_POST['breve'];

	}else {
		$ok = 0;
	}
	
	
	// Se seu campo estiver OK!
	if (!$ok) {
		// Alert de ERRO!
		alert("Algum campo foi preenchido incorretamente ou está em branco, tente novamente!");
	} else {
		if ($_FILES[img][name]) {
			// Redimencionando Imagens --------------
			
			//diretório destino das imagens dentro da pasta da aplicação...
			//deve ter permissão para escrita chmod(777)...
			$file = $_FILES[img][type];
				
			$sExt = substr(strrchr($file, "/"),1);

			$sExt = strtolower($sExt);

			$arquivo = time() . "." . $sExt;


			move_uploaded_file($_FILES[img][tmp_name], $root_diretorio ."/". $arquivo);
			chmod($root_diretorio ."/". $arquivo, 0777);
			
	//PARA REDIMENSIONAR IMAGENS >>>>   WideImage::loadFromFile($dir."\\".$arquivo)->resize(964,400,'fill','any')->saveToFile($dir."\\".$arquivo);
			
			$update_img = " img='$arquivo' ";
						
		}
		else{
			 $update_img = "";
		}
		
			// Gravando dados no banco
			$sql = "UPDATE eventos SET nome='$nome' , descricao='$descricao', breve='$breve', data='$data', $update_img WHERE id=".$_REQUEST['cod'];			
					
			// Confirmacao de insert
			if (mysql_query($sql)) {
				alert("Evento cadastrado com sucesso!");
				redireciona("eventos_cadastra.php");
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
				Cadastro de Banner
			</div>
			<!-- INICIO - DIV info - Barra de informacao -->
			
			<form action="eventos_cadastra_alt.php?edit=1&cod=<?=$_REQUEST['cod']?>" method="post" name="cadastro" enctype="multipart/form-data">
			
			<!-- INICIO - DIV caixa_form - Div que ira englobar todo o formulario -->
			<div id="caixa_form">
				
				<div id="linha_form">
					<div id="label"> <span class="label_fonte">Imagens (984 x 362): </span> </div><input type="file" size="50" name="img" class="form_style">
				</div>
				
				<div id="linha_form">
					<div id="label"> <span class="label_fonte">Nome: </span> </div><input type="text" size="50" name="nome" value="<?=$linha['nome']?>" class="form_style">
				</div>
				
				<div id="linha_form">
					<div id="label"> <span class="label_fonte">Breve: </span> </div><input type="text" size="50" maxlength="255" name="breve" value="<?=$linha['breve']?>" class="form_style">
				</div>
				
				<div id="linha_form">
					<div id="label"> <span class="label_fonte">Data: </span> </div><input type="text" size="10" id="date" name="data" value="<?=$data?>" class="form_style">
				</div>
				
				<div id="linha_form">
					<div id="label"> <span class="label_fonte">Descrição: </span> </div><textarea rows="8" cols="50"  name="descricao" class="form_style"><?=$linha['nome']?></textarea>
				</div>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<br/>
				<p align="center"><input type="submit" value="Cadastrar" class="form_style"></p>
			</div>
			<!-- INICIO - DIV caixa_form - Div que ira englobar todo o formulario -->			
			
			</form>
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

<script type="text/javascript">
	jQuery(function($){
		//alert('jquery ok');
	   $("#date").mask("99/99/9999");

	});
</script>
<script type="text/javascript">qm_create(0,false,0,500,false,false,false,false);</script>
</html>