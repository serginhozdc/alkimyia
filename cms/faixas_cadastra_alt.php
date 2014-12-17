<?php include("conn.php"); ?>
<?php include("logon.php"); ?>
<?php include("library.php"); ?>
<script type="text/javascript" src="tinymce/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen",
        "insertdatetime media nonbreaking save table contextmenu directionality",
        "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor emoticons",
    image_advtab: true,
    templates: [
        {title: 'Test template 1', content: 'Test 1'},
        {title: 'Test template 2', content: 'Test 2'}
    ]
});
</script>

<?

// --- INICIO Efetuando a exlcusao
if ($_REQUEST['apagar']) {
	
	$sql = "DELETE FROM sensei WHERE id=".$_REQUEST['cod'];
	if (mysql_query($sql)) {
		alert("Perfil excluído com sucesso!");
		redireciona("perfil_cadastra.php");
	}
	
}
// --- FIM    Efetuando a exlcusao

// --- INICIO Efetuando o cadastro
if ($_REQUEST['cadastra']) {
	
	// Varificacao de campos
    
    $ok = 1;

	if (!($_POST["nome"] == "")) {
		$nome = addslashes($_POST["nome"]);
	} else {
		$ok = 0;
	}
	
	if (!($_POST["nome_desc"] == "")) {
		$nome_desc = addslashes($_POST["nome_desc"]);
	} else {
		$ok = 0;
	}
	
	if (!($_POST["cor"] == "")) {
		$cor = addslashes($_POST["cor"]);
	} else {
		$ok = 0;
	}
	
	if (!($_POST["texto"] == "")) {
		$texto = addslashes($_POST["texto"]);
	} else {
		$ok = 0;
	}

    
	// Se seu campo estiver OK!
	if (!$ok) {
		// Alert de ERRO!
		alert("Algum campo foi preenchido incorretamente ou está em branco, tente novamente!");
	} else {
			
			$id = $_REQUEST['cod'];
			
			// Gravando dados no banco
			$sql = "UPDATE faixas SET nome='$nome' , nome_desc='$nome_desc' , descricao='$texto' , cor='$cor' WHERE id=$id";			
					
			// Confirmacao de insert
			if (mysql_query($sql)) {
				alert("Faixa Cadastrada com Sucesso!");
				redireciona("faixas_cadastra.php");
			}
			else{
				alert("Falha ao cadastrar!");

			}		

 	 }
  }

if($_REQUEST['edit']){
	$id = $_REQUEST['cod'];
	$sql = "SELECT * FROM faixas WHERE id=$id";
	$result = mysql_query($sql);
	$linha = mysql_fetch_assoc($result);
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
				Gerenciamento de Faixas
			</div>
			<!-- INICIO - DIV info - Barra de informacao -->
			
			<form action="faixas_cadastra_alt.php?cadastra=1&cod=<?=$id?>" method="post" name="cadastro" enctype="multipart/form-data">
			
			<!-- INICIO - DIV caixa_form - Div que ira englobar todo o formulario -->
			<div id="caixa_form">
				
	
				<div id="linha_form">
					<div id="label"> <span class="label_fonte">Nome P/ Exibição : </span> </div><input type="text" size="50" name="nome" value="<?=$linha['nome']?>" class="form_style">
				</div>
				
				<div id="linha_form">
					<div id="label"> <span class="label_fonte">Nome : </span> </div><input type="text" size="50" name="nome_desc"  value="<?=$linha['nome_desc']?>" class="form_style">
				</div>
				
				<div id="linha_form">
					<div id="label"> <span class="label_fonte">Cor(RGB ou O Nome da cor em Inglês): </span> </div><input type="text" size="50" name="cor" value="<?=$linha['cor']?>" placeholder="Ex: #FFFFFF ou WHITE" class="form_style">
				</div>
				
				
				<div id="linha_form_auto">
					<div id="label"> <span class="label_fonte">Texto: </span> </div><textarea rows="15" cols="100" name="texto"><?=$linha['descricao']?></textarea>
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