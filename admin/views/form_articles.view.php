<form class="form_articles" action="" method="post">
	<input type="hidden" name="action" value="form_articles" />
	<fieldset class="fields">
		<div class="row">
			<label for="title">Titre</label>
			<input type="text" name="title" value="<?php echo $articleTitle; ?>"/> 
			
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