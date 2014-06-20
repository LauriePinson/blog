<!--html dans ce fichier pour alléger les autres-->


<h2>Gestion des articles</h2>

<div class="actions">
	<a href="add_articles.php">Ajouter un article</a>
</div>

<table class="articles">
	<thead>
	
		<th style="width: 40px;">ID</th>
		<th style="width: 200px;">Titre</th>
		<th>Date</th>
		<th>Actions</th>
		
	</thead>
	
	<?php while ($row = mysql_fetch_assoc($articles)) { ?>
		<tr>
			<td><?php echo $row['id_articles'] ?></td>
			<td><?php echo $row['title'] ?></td>
			<td><?php echo $row['date']  ?></td>
			<td>
	 			<a href="gestion_articles.php?action=delete_article&id_article=<?php echo $row['id_articles'] ?>">
					Supprimer
				</a>
			</td>
		</tr>
	<?php } ?>
	
</table>