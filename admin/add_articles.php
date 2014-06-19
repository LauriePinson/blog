<?php
	$title = "Ajouter un article";
	
	require_once("includes/authenticated.php");
	require_once("includes/actions.php");
	include_once("includes/header.php");
?>

<h1>Ajouter un article</h1>

<form action="add_articles.php" method="post">
	<input type="hidden" name="action" value="add_article" />
	<fieldset class="fields">
		<div class="row">
			<label for="title">Titre</label>
			<input type="text" name="title" value="<?php if (isset($_POST['title'])) {
															echo $_POST['title'];
														}
													?>" />
		<?php 
			if (isset($messages) && isset($messages['title'])) {
				echo '<div class="error">' . $messages['title'] . '</div>';
			}
		?>
		
		</div>
		<div class="row">
			<label for="text">Texte</label>
			<textarea name="text"><?php 
				if (isset($_POST['text'])) {
					echo $_POST['text'];
				}
				?></textarea>
				
				<?php 
				if (isset($messages) && isset($messages['text'])) {
					echo '<div class="error">' . $messages['text'] . '</div>';
				}
				?>
		</div>
	</fieldset>
	
	<fieldset class="actions">
		<button type="submit">Enregistrer</button>
	</fieldset>
</form>

<?php include_once('includes/footer.php'); ?>