<div id="form">
	<?= form_open('curl/choix') ?>
		<?=  form_fieldset() ?>
			<?= form_textarea(array('id' => 'text', 'name' => 'text', 'rows' => '', 'cols' => '')) ?>
			<?= form_submit(array('id' => 'partager', 'value' => 'partager', 'name' => 'partager')) ?>
		<?= form_fieldset_close() ?>
	<?= form_close() ?>
</div>
<div id="posts">
	<?php if(count($posts)): ?>
		<?php foreach ($posts as $post): ?>
			<div class="post" id="p<?= $post->id; ?>">
				<section class="img">
					<img <?= 'src="'.$post->image.'"' ?> alt="<?= $post->image ?>" />
				</section>	
				<section class="infos">
					<section class="supp">
						<?= form_open('curl/modifier') ?>
							<?=  form_fieldset() ?>
								<?= form_submit(array('class' => 'modifier', 'value' => 'modifier', 'name' => 'modifier', 'title' => 'permet de modifier le titre et la description du post')) ?>
								<?= form_hidden(array('id' => $post->id)) ?>
							<?= form_fieldset_close() ?>
						<?= form_close() ?>
						<?= form_open('curl/supprimer') ?>
							<?=  form_fieldset() ?>
								<?= form_submit(array('class' => 'supprimer', 'value' => 'x', 'name' => 'supprimer', 'title' => 'supprimer')) ?>
								<?= form_hidden(array('id' => $post->id)) ?>
							<?= form_fieldset_close() ?>
						<?= form_close() ?>
					</section>
					<h2><?= $post->titre ?></h2>
					<span><?= $post->site ?></span>
					<p><?= $post->description ?></p>
				</section>	
			</div>
		<?php endforeach; ?>
	<?php else: ?>
		<p>vous n'avez encore enregistré aucuns liens, si vous venez de vous inscrire cela signifie que votre inscription s'est passé avec succès. Au cas contraire il serait dommage de laisser cette page vide&nbsp;!</p>
	<?php endif; ?>
</div>