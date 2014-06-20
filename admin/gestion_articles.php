<?php

	$title = 'Gestion des articles';
	
	require_once('includes/authenticated.php');
	include_once('includes/header.php');
	include_once('includes/actions.php');
	
	//requete sql pour afficher les articles
	$query = mysql_query('SELECT id_articles, title, date FROM articles');
	
?>


<h1>Gestion des articles</h1>

<div class="actions">
	<a href= "add_articles.php">Ajouter un article</a>
</div>

<table>
		<tr>
			<td>ID</td>
			<td>Titre</td>
			<td>Date</td>
			<td>Actions</td>
		</tr>
		
		<?php	
			while ($row = mysql_fetch_assoc($query)) {
			echo '
				<tr>
				<td>' . $row['id_articles'] . '</td>
				<td>' . $row['title'] . '</td>
				<td>' . $row['date'] . '</td>
				
				<td>
					<a href="edit_article.php?id_article=' . $row['id_articles'] . '">Modifier</a>
				</td>
			</tr>
		';
	}
?>
	
</table>

	
<?php include_once('includes/footer.php');?>