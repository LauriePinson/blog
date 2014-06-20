<?php
	require_once('includes/authenticated.php');
	require_once('includes/actions.php');
	$title = "Mon espace d'administration";
	Include_once('includes/header.php');
?>
	Mon administration
	<br> Bonjour <?php echo $_SESSION['user']['username']; ?>
<?php include_once('includes/footer.php'); ?>