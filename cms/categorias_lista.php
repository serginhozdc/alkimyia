<?include("conn.php");?>
<?php include("logon.php"); ?>
<?php include("library.php"); ?>

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
			
			<div id="info">

				Categorias por Fabricante

			</div>

			<!-- INICIO - DIV info - Barra de informacao -->

			
			<!-- INICIO - DIV caixa_form - Div que ira englobar todo o conteudo -->

			<div id="caixa_table">

				<table width="100%" align="center" class="sortable" cellspacing="3">

					<tr height="30">
						<td align="center">Fabricante</td>
						<td align="center">Categoria</td>
						<td align="center">Posição de Exibição</td>
						<td align="center">Ações</td>

					</tr>  

				<?

					$sql = "SELECT * FROM categorias ORDER BY id_fabricante,posicao ASC";
					$result = mysql_query($sql);

					while ($linha = mysql_fetch_assoc($result)) {

						$query = "select * from fabricantes where id={$linha['id_fabricante']}";
						$res = mysql_query($query);
						$row = mysql_fetch_assoc($res);
				?>					

					<tr height="30" class="cel_fonte" onMouseOver="this.className='cel_fonte_hover'" onMouseOut="this.className='cel_fonte'">
						<td align="center" ><?=$row["fabricante"]?></td>
						<td align="center" ><?=$linha["categoria"]?></td>
						<td align="center" ><?=$linha["posicao"]?></td>
						<td align="center" width="1%" nowrap="nowrap">		
							<a href="categorias_cadastra_alt.php?alterar=<?=$row["id"]?>&id=<?=$linha["id"]?>"><img src="images/icon_editar.gif" alt="Editar" border="0"></a>
							<a href="categorias_cadastra.php?apagar=1&cod=<?=$linha["id"] ?>"><img src="images/icon_apagar.gif" alt="Apagar Linha" onclick="javascript: return confirm('Deseja realmente excluir a Categoria <?=$linha["categoria"]?>?')" alt="Apagar" border="0"></a>
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
	<!-- FIM - DIV global - Emgloba todo o site -->	
	</div>

<!-- QuickMenu Structure [Menu 0] -->


<!-- Create Menu Settings: (Menu ID, Is Vertical, Show Timer, Hide Timer, On Click, Right to Left, Horizontal Subs, Flush Left) -->
</body>
<script type="text/javascript">qm_create(0,false,0,500,false,false,false,false);</script>
</html>		