<?php
// Inicia sess�es, para assim poder destru�-las
session_start();
session_destroy();

header("Location: index.php");
?>