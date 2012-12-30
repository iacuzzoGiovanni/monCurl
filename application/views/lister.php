<section id="form">
	<?= form_open('curl/choix') ?>
	<fieldset>
		<?= form_textarea(array('id' => 'text', 'name' => 'text', 'rows' => '', 'cols' => '')) ?>
		<?= form_submit(array('id' => 'partager', 'value' => 'partager', 'name' => 'partager')) ?>
	</fieldset>
	<?= form_close() ?>
</section>
<section id="posts">
	<?php foreach ($posts as $post): ?>
		<div class="post" id="p<?= $post->id; ?>">
			<section class="img">
				<img <?= 'src="'.$post->image.'"' ?> alt="<?= $post->image ?>" />
			</section>	
			<section class="infos">
				<section class="supp">
					<?= form_open('curl/modifier') ?>
						<fieldset>
							<?= form_submit(array('class' => 'modifier', 'value' => 'modifier', 'name' => 'modifier', 'title' => 'permet de modifier le titre et la description du post')) ?>
							<?= form_hidden(array('id' => $post->id)) ?>
						</fieldset>
					<?= form_close() ?>
					<?= form_open('curl/supprimer') ?>
						<fieldset>
							<?= form_submit(array('class' => 'supprimer', 'value' => 'x', 'name' => 'supprimer', 'title' => 'supprimer')) ?>
							<?= form_hidden(array('id' => $post->id)) ?>
						</fieldset>
					<?= form_close() ?>
				</section>
				<h2><?= $post->titre ?></h2>
				<span><?= $post->site ?></span>
				<p><?= $post->description ?></p>
			</section>	
		</div>
	<?php endforeach; ?>
</section>