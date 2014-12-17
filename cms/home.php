<?include("conn.php");?>
<?include("logon.php");?>
<?include("library.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">	
<?include("header.php");?>
	
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
			
			</div>
			<!-- FIM - DIV global - Emgloba todo o site -->	
		
		<!-- Create Menu Settings: (Menu ID, Is Vertical, Show Timer, Hide Timer, On Click, Right to Left, Horizontal Subs, Flush Left) -->
</body>
<script type="text/javascript">qm_create(0,false,0,500,false,false,false,false);</script>  
	
</html>