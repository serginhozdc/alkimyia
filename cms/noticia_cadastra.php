<?php
include ("conn.php");
 ?>
<?php
	include ("logon.php");
 ?>
<?php
	include ("library.php");
 ?>


<?
// --- INICIO Efetuando a exlcusao
if ($_REQUEST['apagar']) {

	$sql = "DELETE FROM noticias WHERE id=" . $_REQUEST['cod'];
	if (mysql_query($sql)) {
		alert("Notícia excluída com sucesso!");
		redireciona("noticia_cadastra.php");
	}

}
// --- FIM    Efetuando a exlcusao

// --- INICIO Efetuando o cadastro
if ($_REQUEST['cadastra']) {

	// Varificacao de campos

	$ok = 1;

	if (!($_POST["titulo"] == "")) {
		$titulo = addslashes($_POST["titulo"]);
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
		$breve = addslashes($_POST["breve"]);
	} else {
		$ok = 0;
	}

	if (!($_POST["texto"] == "")) {
		$texto = addslashes($_POST["texto"]);
	} else {
		$ok = 0;
	}

	$data = $ano . "-" . $mes . "-" . $dia;

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

			$sExt = substr(strrchr($file["name"], "."), 1);
			$sExt = strtolower($sExt);
			$arquivo = time() . "." . $sExt;

			move_uploaded_file($_FILES[img][tmp_name], $root_diretorio . "/" . $arquivo);
			// Gravando dados no banco
			$sql = "INSERT INTO noticias (titulo,data,breve,texto,img) VALUES ('$titulo','$data','$breve','$texto','$arquivo')";
			//echo $sql;

			// Confirmacao de insert
			if (mysql_query($sql)) {
				alert("Notícia cadastrada com sucesso!");
				redireciona("noticia_cadastra.php");
			}

		}

	}

}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php
	include ("header.php");
 ?>

<body>

<!-- This optional free use link disables the online purchase reminder.  Include within the body of your page -->
<div style="display: none;"><a id='qm_free' href='http://www.opencube.com'>OpenCube Drop Down Menu (www.opencube.com)</a>
<br><br><br></div>

	<!-- INICIO - DIV global - Emgloba todo o site -->
	<div id="global">
	
		<?php
		include ("topo.php");
 ?>	
		
		
		<!-- INICIO - DIV MENU - Menu do Sistema -->
		<?php
			include ("menu.php");
 ?>
		<!-- INICIO - DIV MENU - Menu do Sistema -->
		
		<!-- INICIO - DIV PRINCIPAL - Div com conteudo principal -->
		<div id="principal">
		
			<!-- INICIO - DIV info - Barra de informacao -->
			<div id="info">
				Cadastro de Noticia
			</div>
			<!-- INICIO - DIV info - Barra de informacao -->
			
			<form action="noticia_cadastra.php?cadastra=1" method="post" name="cadastro" enctype="multipart/form-data">
			
			<!-- INICIO - DIV caixa_form - Div que ira englobar todo o formulario -->
			<div id="caixa_form">
				
			
				<div id="linha_form">
					<div id="label"> <span class="label_fonte">Título:  </span> </div><input type="text" size="50" name="titulo" value="<?=$titulo ?>" class="form_style">
				</div>
				
				<div id="linha_form">
					<div id="label"> <span class="label_fonte">Data: </span> </div>
					<!-- Select de dia -->
					<select name="dia" class="form_style">
					<?
						$dia = date("d");
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
						$mes = date("m");
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
						$ano = date("Y");
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
					<div id="label"> <span class="label_fonte">Imagens (1244x500):</span> </div><input type="file" size="50" name="img" class="form_style">
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
				Gerenciamento de Noticias
			</div>
			<!-- INICIO - DIV info - Barra de informacao -->
			
			
			<!-- INICIO - DIV caixa_form - Div que ira englobar todo o conteudo -->
			<div id="caixa_table">
			

				<table width="100%" align="center" class="sortable" cellspacing="3">
					<tr height="30">
						<td align="center">Título</td>
						<td align="center">Data</td>
						<td align="center">Texto</td>
						<td align="center">Imagem</td>
						<td align="center">Ações</td>
					</tr>  
					
				<?
					$sql = "SELECT * FROM noticias ORDER BY data DESC";
					$result = mysql_query($sql);
					
					while ($linha = mysql_fetch_assoc($result)) {
				
				?>					
					<tr height="30" class="cel_fonte" onMouseOver="this.className='cel_fonte_hover'" onMouseOut="this.className='cel_fonte'">
						<td align="center" ><?=$linha["titulo"] ?> </td>
						<td align="center" ><?=$linha["data"] ?> </td>
						<td align="center" ><?=$linha["texto"] ?> </td>
						<td align="center" ><img src="..	/upload/<?=$linha["img"] ?> "height="150" border="0"></td>
						<td align="center" width="1%" nowrap="nowrap">
							<a href="noticia_cadastra_alt.php?edit=1&cod=<?=$linha["id"] ?>"><img src="images/icon_editar.gif" alt="Editar" border="0"></a>
							<a href="noticia_cadastra.php?apagar=1&cod=<?=$linha["id"] ?>"><img src="images/icon_apagar.gif" onclick="javascript: return confirm('Deseja realmente excluir <?=$linha["titulo"] ?> das notícias ?')" alt="Apagar" border="0"></a></td>
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
<script type="text/javascript">qm_create(0, false, 0, 500, false, false, false, false);</script>
</html>