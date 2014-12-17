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

	//function MudaPosicao()



$id_fabricante = $_REQUEST["id"];

if($_REQUEST["cadastra"]) {

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
		
		$id_fabricante = $_POST["fabricante"];
			
		$sql = "insert into categorias (categoria,id_fabricante,posicao) values ('{$categoria}','{$id_fabricante}',{$posicao})";		
				
		if(mysql_query($sql)){
			
			//alert("Categoria cadastrada com sucesso!");
			
			redireciona("categorias_cadastra.php?cad=1&id=$id_fabricante");
		}
	} 
}

if($_REQUEST["apagar"]) {
	if($_REQUEST["cod"] > 1) {
		$sql1 = "delete from categorias where id=".$_REQUEST["cod"];
	
		if(mysql_query($sql1))
		{
			alert("Categoria apagada com sucesso!");
				redireciona("categorias_cadastra.php?cad=1&id=".$_REQUEST["apagar"]);
		}		
	}	
}

$sql = "select * from fabricantes where id={$id_fabricante}";
$result = mysql_query($sql);
$row = mysql_fetch_assoc($result);

$fabricante = " - ".$row["fabricante"];

$sql1 = "select * from categorias where id_fabricante = {$id_fabricante} order by posicao desc limit 1";  //ÚLTIMA POSIÇÃO
$res1 = mysql_query($sql1);
$linha = mysql_fetch_assoc($res1);

$posicao = ++$linha["posicao"];
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
				Cadastro de Categorias <?=$fabricante?>
			</div>
			<!-- INICIO - DIV info - Barra de informacao -->
			
		

<form method="post" action="categorias_cadastra.php?cadastra=1" enctype="multipart/form-data">
			<div id="caixa_form">
				<div id="linha_form">
					<input type="hidden" name="fabricante" value="<?=$id_fabricante?>" />
				 	<div id="label"><span class="label_fonte">Nome Categoria: </span></div>	<input type="text" size="40" autofocus name="categoria" value="<?=$categoria?>"/>
				</div>
				
				<div id="linha_form">
				 	<div id="label"><span class="label_fonte">Posição de Exibição: </span></div>	<input type="number" size="3" name="posicao" value="<?=$posicao?>"/>
				</div>
												
				<p align="center"><input type="submit" name="cadastra" style="margin-bottom: -5px;" value="Cadastrar Categoria" /></p>
			</div>
</form>

			<!-- INICIO - DIV info fim - Barra de informacao -->
			<div id="info_fim">
				&nbsp;
			</div>
			<!-- INICIO - DIV info fim - Barra de informacao -->	

			<div id="info">

				Categorias Cadastradas

			</div>

			<!-- INICIO - DIV info - Barra de informacao -->

			
			<!-- INICIO - DIV caixa_form - Div que ira englobar todo o conteudo -->

			<div id="caixa_table">

				<table width="100%" align="center" class="sortable" cellspacing="3">

					<tr height="30">
						<td align="center">Categoria</td>
						<td align="center">Posição</td>
						<td align="center">Ações</td>

					</tr>  

				<?

					$sql = "SELECT * FROM categorias where id_fabricante =". $_REQUEST["id"]." ORDER BY posicao ASC";
					$result = mysql_query($sql);


					while ($linha = mysql_fetch_assoc($result)) {

				?>					

					<tr height="30" class="cel_fonte" onMouseOver="this.className='cel_fonte_hover'" onMouseOut="this.className='cel_fonte'">
						<td align="center" ><?=$linha["categoria"]?></td>
						<td align="center" ><?=$linha["posicao"]?></td>
						<td align="center" width="1%" nowrap="nowrap">		
							<a href="categorias_cadastra_alt.php?alterar=<?=$_REQUEST["id"]?>&id=<?=$linha["id"]?>"><img src="images/icon_editar.gif" alt="Editar" border="0"></a>
							<a href="categorias_cadastra.php?apagar=<?=$_REQUEST["id"]?>&cod=<?=$linha["id"] ?>"><img src="images/icon_apagar.gif" alt="Apagar Linha" onclick="javascript: return confirm('Deseja realmente excluir a Categoria <?=$linha["categoria"]?>?')" alt="Apagar" border="0"></a>
						</td>

					</tr>

				<?

				}

				?>

				</table>

			</div>
			
			
			<!-- INICIO - DIV info fim - Barra de informacao -->
			<div id="info_fim">
				&nbsp;
			</div>
			<!-- INICIO - DIV info fim - Barra de informacao -->	
			
		</div>
		
	</div>
	<!-- FIM - DIV global - Emgloba todo o site -->	


<!-- QuickMenu Structure [Menu 0] -->


<!-- Create Menu Settings: (Menu ID, Is Vertical, Show Timer, Hide Timer, On Click, Right to Left, Horizontal Subs, Flush Left) -->
</body>
<script type="text/javascript">qm_create(0,false,0,500,false,false,false,false);</script>
</html>