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
	
	if (!($_POST["logradouro"] == "")) {
		$logradouro = $_POST["logradouro"];
	} else {
		$ok = 0;
	}
	if (!($_POST["num"] == "")) {
		$num = $_POST["num"];
	} else {
		$ok = 0;
	}	if (!($_POST["bairro"] == "")) {		$bairro = $_POST["bairro"];	} else {				$ok = 0;	}
		if (!($_POST["cidade"] == "")) {		$cidade = $_POST["cidade"];	} else {		$ok = 0;	}
    
	// Se seu campo estiver OK!
	if (!$ok) {			alert("Algum campo foi preenchido incorretamente ou está em branco, tente novamente!");	}	else {	
		$complemento = $_POST["complemento"];		$estado = $_POST["estado"];	
			// Gravando dados no banco
			$sql = "UPDATE endereco SET logradouro='$logradouro',numero='$num',complemento='$complemento',bairro='$bairro',cidade='$cidade',estado='$estado' where id=$id";
			//echo $sql;
			
			// Confirmacao de insert
			if (mysql_query($sql)) {
				alert("Endereço editado com sucesso!");
				redireciona("end_cadastra.php");  
			}
	}
  }
if($_REQUEST["edit"]){	$id = $_REQUEST["cod"];			$sql = "select * from endereco where id=$id";		$result = mysql_query($sql);		$linha = mysql_fetch_assoc($result);		$logradouro = $linha["logradouro"];	$numero = $linha["numero"];	$complemento = $linha["complemento"];	$bairro = $linha["bairro"];	$cidade = $linha["cidade"];	$estado = $linha["estado"];}
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
			
			<form action="end_cadastra_alt.php?editar=1&cod=<?=$id; ?>" method="post" name="cadastro" enctype="multipart/form-data">
			<!-- INICIO - DIV caixa_form - Div que ira englobar todo o formulario -->
			<div id="caixa_form">
				<div id="linha_form">
					<div id="label"> <span class="label_fonte">Logradouro: </span> </div><input type="text" size="50" name="logradouro" value="<?=$logradouro?>" class="form_style">
				</div>
				<div id="linha_form">
					<div id="label"> <span class="label_fonte">N&deg;: </span> </div><input type="text" size="10" name="num" value="<?=$numero?>" max-lenght="15" class="form_style">
				</div>								<div id="linha_form">					<div id="label"> <span class="label_fonte">Complemento: </span> </div><input type="text" size="50" name="complemento" placeholder="Opcional"  value="<?=$complemento?>" class="form_style">				</div>								<div id="linha_form">					<div id="label"> <span class="label_fonte">Bairro: </span> </div><input type="text" size="50" name="bairro" value="<?=$bairro?>" class="form_style">				</div>				<div id="linha_form">					<div id="label"> <span class="label_fonte">Cidade: </span> </div><input type="text" size="50" name="cidade" value="<?=$cidade?>" class="form_style">				</div>
				<div id="linha_form">					<div id="label"> <span class="label_fonte">Estado: </span> </div>					<select name="estado"  class="form_style" id="estado" value="<?=$estado?>">				    <option value="" <? if($estado == "") {echo "selected=\"selected\"";}?>>Escolha</option>				    <option value="MG" <? if($estado == "MG") {echo "selected=\"selected\"";}?>>Minas Gerais</option>				    <option value="AC" <? if($estado == "AC") {echo "selected=\"selected\"";}?>>Acre</option>				    <option value="AL" <? if($estado == "AL") {echo "selected=\"selected\"";}?>>Alagoas</option>				    <option value="AM" <? if($estado == "AM") {echo "selected=\"selected\"";}?>>Amazonas</option>				    <option value="AP" <? if($estado == "AP") {echo "selected=\"selected\"";}?>>Amap&aacute;</option>				    <option value="BA" <? if($estado == "BA") {echo "selected=\"selected\"";}?>>Bahia</option>				    <option value="CE" <? if($estado == "CE") {echo "selected=\"selected\"";}?>>Cear&aacute;</option>				    <option value="DF" <? if($estado == "DF") {echo "selected=\"selected\"";}?>>Distrito Federal</option>				    <option value="ES" <? if($estado == "ES") {echo "selected=\"selected\"";}?>>Esp&iacute;rito Santo</option>				    <option value="GO" <? if($estado == "GO") {echo "selected=\"selected\"";}?>>Goi&aacute;s</option>				    <option value="MA" <? if($estado == "MA") {echo "selected=\"selected\"";}?>>Maranh&atilde;o</option>				    <option value="MS" <? if($estado == "MS") {echo "selected=\"selected\"";}?>>Mato Grosso do Sul</option>				    <option value="MT" <? if($estado == "MT") {echo "selected=\"selected\"";}?>>Mato Grosso</option>				    <option value="PA" <? if($estado == "PA") {echo "selected=\"selected\"";}?>>Par&aacute;</option>				    <option value="PB" <? if($estado == "PB") {echo "selected=\"selected\"";}?>>Para&iacute;ba</option>				    <option value="PE" <? if($estado == "PE") {echo "selected=\"selected\"";}?>>Pernambuco</option>				    <option value="PI" <? if($estado == "PI") {echo "selected=\"selected\"";}?>>Piau&iacute;</option>				    <option value="PR" <? if($estado == "PR") {echo "selected=\"selected\"";}?>>Paran&aacute;</option>				    <option value="RJ" <? if($estado == "RJ") {echo "selected=\"selected\"";}?>>Rio de Janeiro</option>				    <option value="RN" <? if($estado == "RN") {echo "selected=\"selected\"";}?>>Rio Grande do Norte</option>				    <option value="RO" <? if($estado == "RO") {echo "selected=\"selected\"";}?>>Rond&ocirc;nia</option>				    <option value="RR" <? if($estado == "RR") {echo "selected=\"selected\"";}?>>Roaraima</option>				    <option value="RS" <? if($estado == "RS") {echo "selected=\"selected\"";}?>>Rio Grande do Sul</option>				    <option value="SC" <? if($estado == "SC") {echo "selected=\"selected\"";}?>>Santa Catarina</option>				    <option value="SE" <? if($estado == "SE") {echo "selected=\"selected\"";}?>>Sergipe</option>				    <option value="SP" <? if($estado == "SP") {echo "selected=\"selected\"";}?>>S&atilde;o Paulo</option>				    <option value="TO" <? if($estado == "TO") {echo "selected=\"selected\"";}?>>Tocantins</option>			      </select>								</div>
				<p align="center"><input type="submit" value="Cadastrar" class="form_style"></p>
			</div>
			<!-- INICIO - DIV caixa_form - Div que ira englobar todo o formulario -->			
			
			</form>
				
			<!-- INICIO - DIV info fim - Barra de informacao -->
			<div id="info_fim">
				&nbsp;
			</div>
			
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