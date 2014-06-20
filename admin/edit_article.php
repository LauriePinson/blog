<?php
	$title = "modifier un article";
	
	require_once("includes/authenticated.php");
	require_once("includes/actions.php");
	include_once("includes/header.php");
	
	$query = mysql_query("SELECT title, text FROM articles WHERE id_article=" . mysql_real_escape_string($_GET['id_article']));
	$article = mysql_fetch_assoc($query);
	
	if ($article === false) {
		header("location:gestion_articles.php");
		
		}
?>

<h1>Modifier un article</h1>

<form class="edit_article.php"action="edit_article.php?id_article=<?php echo $_GET['id_article'];" method="post">

	<input type="hidden" name="action" value="edit_article" />
	<fieldset class="fields">
		<div class="row">
			<label for="title">Titre</label>
			<input type="text" name="title" value="<?php 
			if (isset($_POST['title'])) {
				echo $_POST['title'];
				}
		?>" />
		<?php 
			if (isset($messages) && isset($messages['title'])) {
				echo '<div class="error">' . $messages['title'] . '</div>';
			}
			else {
				echo $article['text'];
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

if (isset($_POST['action']) && $_POST['action'] === 'edit_article') {
	$title = $_POST['title'];
	$text = $_POST['text'];
	$idArticle = $_GET['id_article'];
	
	$messages = array();
	if (empty($title)) {
		$messages['title'] = 'Veuillez saisir un titre';
	}
	if (empty($text)) {
		$messages['text'] = 'Veuillez saisir un texte';
	}

	if (count($messages) === 0){
	mysql_query("UPDATE articles SET title='" . mysql_real_escape_string($title) . '", text=mysql_real_escape_string($text) ."'WHERE id_article=" . mysql_real_escape_string($idArticle));
		header("Location: gestion_articles.php");
	}
}