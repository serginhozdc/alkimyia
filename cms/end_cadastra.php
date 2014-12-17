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
	
	$sql = "DELETE FROM  endereco WHERE id=".$_REQUEST['cod'];
	if (mysql_query($sql)) {
		alert("Endereço excluído com sucesso!");
		redireciona("end_cadastra.php");
	}
	
}
// --- FIM    Efetuando a exlcusao

// --- INICIO Efetuando o cadastro
if ($_REQUEST['cadastra']) {
	
	// Varificacao de campos
    
    $ok = 1;
	
	if (!($_POST["logradouro"] == "")) {
		$logradouro = $_POST["logradouro"];
	} else {
		$ok = 0;
	}
	if (!($_POST["num"] == "")) {
		$num = $_POST["num"];
	} else {
		$ok = 0;			
	}	if (!($_POST["bairro"] == "")) {		$bairro = $_POST["bairro"];	} else {		$ok = 0;	}
		if (!($_POST["cidade"] == "")) {		$cidade = $_POST["cidade"];	} else {		$ok = 0;	}
    
	// Se seu campo estiver OK!
	if (!$ok) {			alert("Algum campo foi preenchido incorretamente ou está em branco, tente novamente!");	}	else {	
		$complemento = $_POST["complemento"];		$estado = $_POST["estado"];	
			// Gravando dados no banco
			$sql = "INSERT INTO endereco (logradouro,numero,complemento,bairro,cidade,estado) VALUES ('$logradouro','$num','$complemento','$bairro','$cidade','$estado')";
			//echo $sql;
			
			// Confirmacao de insert
			if (mysql_query($sql)) {
				alert("Endereço cadastrado com sucesso!");
				redireciona("end_cadastra.php");  
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
				Cadastro de Endere&ccedil;o
			</div>
			<!-- INICIO - DIV info - Barra de informacao -->
			
			<form action="end_cadastra.php?cadastra=1" method="post" name="cadastro" enctype="multipart/form-data">
			
			<!-- INICIO - DIV caixa_form - Div que ira englobar todo o formulario -->
			<div id="caixa_form">
				<div id="linha_form">
					<div id="label"> <span class="label_fonte">Logradouro: </span> </div><input type="text" size="50" name="logradouro" value="<?=$logradouro?>" class="form_style">
				</div>
				<div id="linha_form">
					<div id="label"> <span class="label_fonte">N&deg;: </span> </div><input type="text" size="10" name="num" value="<?=$numero?>" max-lenght="15" class="form_style">
				</div>								<div id="linha_form">					<div id="label"> <span class="label_fonte">Complemento: </span> </div><input type="text" size="50" name="complemento" placeholder="Opcional"  value="<?=$complemento?>" class="form_style">				</div>								<div id="linha_form">					<div id="label"> <span class="label_fonte">Bairro: </span> </div><input type="text" size="50" name="bairro" value="<?=$bairro?>" class="form_style">				</div>				<div id="linha_form">					<div id="label"> <span class="label_fonte">Cidade: </span> </div><input type="text" size="50" name="cidade" value="<?=$cidade?>" class="form_style">				</div>
				<div id="linha_form">					<div id="label"> <span class="label_fonte">Estado: </span> </div>					<select name="estado"  class="form_style" id="estado" value="<?=$estado?>">				    <option value="" >Escolha</option>				    <option value="MG">Minas Gerais</option>				    <option value="AC">Acre</option>				    <option value="AL">Alagoas</option>				    <option value="AM">Amazonas</option>				    <option value="AP">Amap&aacute;</option>				    <option value="BA">Bahia</option>				    <option value="CE">Cear&aacute;</option>				    <option value="DF">Distrito Federal</option>				    <option value="ES">Esp&iacute;rito Santo</option>				    <option value="GO">Goi&aacute;s</option>				    <option value="MA">Maranh&atilde;o</option>				    <option value="MS">Mato Grosso do Sul</option>				    <option value="MT">Mato Grosso</option>				    <option value="PA">Par&aacute;</option>				    <option value="PB">Para&iacute;ba</option>				    <option value="PE">Pernambuco</option>				    <option value="PI">Piau&iacute;</option>				    <option value="PR">Paran&aacute;</option>				    <option value="RJ">Rio de Janeiro</option>				    <option value="RN">Rio Grande do Norte</option>				    <option value="RO">Rond&ocirc;nia</option>				    <option value="RR">Roaraima</option>				    <option value="RS">Rio Grande do Sul</option>				    <option value="SC">Santa Catarina</option>				    <option value="SE">Sergipe</option>				    <option value="SP">S&atilde;o Paulo</option>				    <option value="TO">Tocantins</option>			      </select>				</div>

				
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
				Endere&ccedil;os cadastrados
			</div>
			<!-- INICIO - DIV info - Barra de informacao -->
			
			
			<!-- INICIO - DIV caixa_form - Div que ira englobar todo o conteudo -->
			<div id="caixa_table">
			

				<table width="100%" align="center" class="sortable" cellspacing="3">
					<tr height="30">
						<td align="center">Endere&ccedil;o Completo</td>						<td align="center">A&ccedil;&otilde;es</td>
					</tr>  
					
				<?
					$sql = "SELECT * FROM endereco ORDER BY logradouro";
					$result = mysql_query($sql);
					while ($linha = mysql_fetch_assoc($result)) {			
				?>					
					<tr height="30" class="cel_fonte" onMouseOver="this.className='cel_fonte_hover'" onMouseOut="this.className='cel_fonte'">				<?			$estado = ($linha["estado"] == "" ? $linha["estado"] : ' - '.$linha["estado"]);			$complemento = ($linha["complemento"] == "" ? $linha["complemento"] : '<br />'.$linha["complemento"]);				?>
						<td align="center" ><? echo $linha["logradouro"].' - n&deg;'.$linha["numero"].$complemento.'<br /> '.$linha["bairro"].' - '.$linha["cidade"].$estado ?></td>
						<td align="center" width="1%" nowrap="nowrap">
							
							<a href="end_cadastra_alt.php?edit=1&cod=<?=$linha["id"]?>"><img src="images/icon_editar.gif" alt="Editar" border="0"></a>							
							<a href="end_cadastra.php?apagar=1&cod=<?=$linha["id"] ?>"><img src="images/icon_apagar.gif" onclick="javascript: return confirm('Deseja realmente excluir o Endere&ccedil;o <?=$linha["logradouro"] ?>?')" alt="Apagar" border="0"></a></td>
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