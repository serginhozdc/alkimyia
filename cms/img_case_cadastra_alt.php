<?php include("conn.php"); ?>
<?php include("logon.php"); ?>
<?php include("library.php"); ?>

<?

$id_cases = $_REQUEST['id'];


// --- INICIO Efetuando a exlcusao
if ($_REQUEST['apagar']) {
	$sql = "SELECT * FROM img_cases WHERE id={$_REQUEST["cod"]}";
	$result = mysql_query($sql);
	$linha = mysql_fetch_assoc($result);
	
	$sql = "DELETE FROM  img_cases WHERE id={$_REQUEST['cod']}";
	if (unlink("../upload/"+$linha["img"]) && mysql_query($sql)) {
		alert("Imagem excluída com sucesso!");
		redireciona("img_case_cadastra_alt.php?id=$id_cases");
	}
	
}
// --- FIM    Efetuando a exlcusao

// --- INICIO Efetuando o cadastro
if ($_REQUEST['cadastra']) {
	
	// Varificacao de campos
    
    $id_cases = $_REQUEST["id"];
	
	//echo $id_cases;
    
    $ok = 1;

	// Se seu campo estiver OK!
	if (!$ok) {
		// Alert de ERRO!
		alert("Algum campo foi preenchido incorretamente ou está em branco, tente novamente!");
	} else {

			if ($_FILES[img][name]) {
				// Redimencionando Imagens --------------
	
				//diretório destino das imagens dentro da pasta da aplicação...
				//deve ter permissão para escrita chmod(777)...
			$dir = "../upload";
				
				//recebendo o arquivo multipart vindo do flash...
				//$arquivo = $_FILES[img][name];
				$file = $_FILES[img];
				
				$sExt = substr(strrchr($file["name"], "."),1);
				$sExt = strtolower($sExt);
				$arquivo = time().".".$sExt;

				// Gravando dados no banco
				$sql = "INSERT INTO img_cases (img,id_cases) VALUES ('$arquivo','$id_cases')";	
				
				move_uploaded_file($_FILES[img][tmp_name], $dir . "/" . $arquivo);
				chmod($root_diretorio . $arquivo, 0777);

				// Confirmacao de insert
				if (mysql_query($sql)) {
					alert("Imagem cadastrada com sucesso! $id_cases");
					redireciona("img_case_cadastra_alt.php?id=$id_cases");
				}
							
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
				Cadastro de Imagens
			</div>
			<!-- INICIO - DIV info - Barra de informacao -->
			
			<form action="img_case_cadastra_alt.php?cadastra=1&id=<?=$id_cases?>" method="post" name="cadastro" enctype="multipart/form-data">
			
			<!-- INICIO - DIV caixa_form - Div que ira englobar todo o formulario -->
			<div id="caixa_form">

				<div id="linha_form">
					<div id="label"> <span class="label_fonte">Imagens:</span> </div><input type="file" size="50" name="img" class="form_style">
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
			
			
			<!-- INICIO - DIV info - Barra de informacao -->
			<div id="info">
				Gerenciamento de Imagens
			</div>
			<!-- INICIO - DIV info - Barra de informacao -->
			
			
			<!-- INICIO - DIV caixa_form - Div que ira englobar todo o conteudo -->
			<div id="caixa_table">
			

				<table width="100%" align="center" class="sortable" cellspacing="3">
					<tr height="30">
						<td align="center">Imagem</td>
						<td align="center">Ações</td>
					</tr>  
					
				<?
					$sql = "SELECT * FROM img_cases WHERE id_cases=$id_cases";
					//echo $sql;
					$result = mysql_query($sql);
				?>
				<?
					while ($linha = mysql_fetch_assoc($result)) {
				
				?>					
					<tr height="30" class="cel_fonte" onMouseOver="this.className='cel_fonte_hover'" onMouseOut="this.className='cel_fonte'">
						<td align="center" width="10%" nowrap><img src="/upload/<?=$linha["img"]?> " alt="Editar" border="0"></td>
						<td align="center" width="1%" nowrap="nowrap">
							<!--
							<a href="clientes_cadastra_alt.php?edit=1&cod=<?=$linha["id"]?>"><img src="images/icon_editar.gif" alt="Editar" border="0"></a>
							-->
							<a href="img_case_cadastra_alt.php?apagar=1&cod=<?=$linha["id"]?>&id=<?=$id_cases;?>"><img src="images/icon_apagar.gif" onclick="javascript: return confirm('Deseja realmente excluir a Imagem ?')" alt="Apagar" border="0"></a></td>
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