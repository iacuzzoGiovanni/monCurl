<?= form_open('curl/maj') ?>
	<?= form_fieldset() ?>
		<h2>Titre&nbsp;: <?= form_input(array('name' => 'titre', 'value' => $post->titre)) ?></h2>
		<h2>
			Url du site&nbsp;:
			<?= $post->url ?>
			<?= form_hidden(array('url' => $post->url)) ?>
		</h2>

		<h2>
			Description du site&nbsp;:
			<?= form_input(array('name' => 'description', 'value' => $post->description)) ?>
		</h2>
		<img src="<?= $post->img ?>" alt="#" />
		<?= form_hidden(array('img' => $post->img)) ?>
		<?= form_hidden(array('id' => $post->id)) ?>
		<?= form_submit(array('class' => 'modifier', 'value' => 'Envoyer les modifications', 'name' => 'modifier')) ?>
	<?= form_fieldset_close() ?>
<?= form_close() ?>