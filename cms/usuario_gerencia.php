<?php include("conn.php"); ?>
<?php include("logon.php"); ?>
<?php include("library.php"); ?>
<?


// --- INICIO Efetuando a exlcusao
if ($_REQUEST['apagar']) {
	
	$sql = "DELETE FROM usuarios WHERE id=".$_REQUEST['cod'];
	if (mysql_query($sql)) {
		alert("Usuários excluido com sucesso!");
	}
	
}

// --- FIM    Efetuando a exlcusao

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
				Gerenciamento de Usuários
			</div>
			<!-- INICIO - DIV info - Barra de informacao -->
			
			
			<!-- INICIO - DIV caixa_form - Div que ira englobar todo o conteudo -->
			<div id="caixa_table">
			

				<table width="100%" align="center" class="sortable" cellspacing="3">
					<tr height="30">
						<td align="center">Nome</td>
						<td align="center">Login</td>
						<td align="center">E-mail</td>
						<td align="center">Ações</td>
					</tr> 
					
			<?
				$sql = "SELECT * FROM usuarios ORDER BY nome,sobrenome";
				$result = mysql_query($sql);
				
				while ($linha = mysql_fetch_assoc($result)) {
			
			?>					
					<tr height="30" class="cel_fonte" onMouseOver="this.className='cel_fonte_hover'" onMouseOut="this.className='cel_fonte'">
						<td align="center" ><?=$linha["nome"]?> <?=$linha["sobrenome"]?></td>
						<td align="center" ><?=$linha["login"]?> </td>
						<td align="center" ><?=$linha["email"]?> </td>
						<td align="center" width="1%" nowrap="nowrap">
							<a href="usuario_cadastra_alt.php?edit=1&cod=<?=$linha["id"]?>"><img src="images/icon_editar.gif" alt="Editar" border="0"></a>
							<a href="usuario_gerencia.php?apagar=1&cod=<?=$linha["id"]?>"><img src="images/icon_apagar.gif" onclick="javascript: return confirm('Deseja realmente excluir o usuário <?=$linha["nome"]?> <?=$linha["sobrenome"]?> ?')" alt="Apagar" border="0"></a></td>
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