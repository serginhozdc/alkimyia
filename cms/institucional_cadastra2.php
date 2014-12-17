<?php include("conn.php"); ?>
<?php include("logon.php"); ?>
<?php include("library.php"); ?>
<script type="text/javascript" src="tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
        "link ",
        "searchreplace wordcount fullscreen",
        //"insertdatetime nonbreaking save  contextmenu ",
        "textcolor colorpicker"
    ],
    toolbar1: "undo redo |  bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link",
    toolbar2: "print preview | forecolor",
    image_advtab: false,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
</script>

<?


// --- INICIO Efetuando o cadastro
if ($_REQUEST['cadastra']) {
	
	// Varificacao de campos
    
    $ok = 1;

	
	if (!($_POST["texto"] == "")) {
		$texto = addslashes($_POST["texto"]);
	} else {
		$ok = 0;
	}

    
	// Se seu campo estiver OK!
	if (!$ok) {
		// Alert de ERRO!
		alert("Algum campo foi preenchido incorretamente ou est em branco, tente novamente!");
	} else {

			// Gravando dados no banco
			$sql = "UPDATE institucional2 SET  texto='$texto' WHERE id=1";			
					
			// Confirmacao de insert
			if (mysql_query($sql)) {
				alert("Texto Institucional atualizado com sucesso!");
				redireciona("institucional_cadastra2.php?alterar=1");
			}
	}


  }


 
// --- FIM    Efetuando o cadastro

if ($_REQUEST["alterar"]) {
    
    
    $sql = "SELECT * FROM institucional2 WHERE id=1";
    $result = mysql_query($sql);
    $linha = mysql_fetch_assoc($result);

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
				Gerenciamento de Institucional
			</div>
			<!-- INICIO - DIV info - Barra de informacao -->
			
			<form action="institucional_cadastra2.php?cadastra=1" method="post" name="cadastro" enctype="multipart/form-data">
			
			<!-- INICIO - DIV caixa_form - Div que ira englobar todo o formulario -->
			<div id="caixa_form">

				<div id="linha_form_auto">
					<div id="label"> <span class="label_fonte">Texto: </span> </div><textarea rows="15" cols="100" name="texto"><?=$texto?></textarea>
				</div>			
				
				<p align="center"><input type="submit" value="Salvar" class="form_style"></p>
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