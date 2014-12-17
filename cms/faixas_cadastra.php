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
	
	$sql = "DELETE FROM faixas WHERE id=".$_REQUEST['cod'];
	if (mysql_query($sql)) {
		alert("Faixas excluído com sucesso!");
		redireciona("faixas_cadastra.php");
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

			// Gravando dados no banco
			$sql = "INSERT INTO faixas(nome,nome_desc,descricao,cor) VALUES('$nome','$nome_desc','$texto','$cor')";			
					
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
			
			<form action="faixas_cadastra.php?cadastra=1" method="post" name="cadastro" enctype="multipart/form-data">
			
			<!-- INICIO - DIV caixa_form - Div que ira englobar todo o formulario -->
			<div id="caixa_form">
				
	
				<div id="linha_form">
					<div id="label"> <span class="label_fonte">Nome P/ Exibição : </span> </div><input type="text" size="50" name="nome" class="form_style">
				</div>
				
				<div id="linha_form">
					<div id="label"> <span class="label_fonte">Nome : </span> </div><input type="text" size="50" name="nome_desc" class="form_style">
				</div>
				
				<div id="linha_form">
					<div id="label"> <span class="label_fonte">Cor(RGB ou O Nome da cor em Inglês): </span> </div><input type="text" size="50" name="cor" placeholder="Ex: #FFFFFF ou WHITE" class="form_style">
				</div>
				
				
				<div id="linha_form_auto">
					<div id="label"> <span class="label_fonte">Texto: </span> </div><textarea rows="15" cols="100" name="texto"></textarea>
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
			
			<!-- INICIO - DIV info - Barra de informacao -->
			<div id="info">
				Gerenciamento de Faixas
			</div>
			<!-- INICIO - DIV info - Barra de informacao -->
			
			
			<!-- INICIO - DIV caixa_form - Div que ira englobar todo o conteudo -->
			<div id="caixa_table">
			

				<table width="100%" align="center" class="sortable" cellspacing="3">
					<tr height="30">
						<td align="center">Nome</td>
						<td align="center">Ações</td>
					</tr>  
					
				<?
					$sql = "SELECT * FROM faixas ORDER BY id";
					$result = mysql_query($sql);
					
					while ($linha = mysql_fetch_assoc($result)) {
				
				?>					
					<tr height="30" class="cel_fonte" onMouseOver="this.className='cel_fonte_hover'" onMouseOut="this.className='cel_fonte'">
						<td align="center" width="10%" nowrap><?=$linha['nome']?></td>
						<td align="center" width="1%" nowrap="nowrap">
							<a href="faixas_cadastra_alt.php?edit=1&cod=<?=$linha["id"]?>"><img src="images/icon_editar.gif" alt="Editar" border="0"></a>
							<a href="faixas_cadastra.php?apagar=1&cod=<?=$linha["id"]?>"><img src="images/icon_apagar.gif" onclick="javascript: return confirm('Deseja realmente excluir a imagem?')" alt="Apagar" border="0"></a></td>
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