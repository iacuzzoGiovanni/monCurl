<div id="form">
	<?= form_open('curl/choix', array("class" => "linkSearch")) ?>
		<?=  form_fieldset() ?>
			<?= form_textarea(array('id' => 'text', 'name' => 'text', 'rows' => '', 'cols' => '', 'placeholder' => 'vous pouvez mettre un lien ou alors un petit commentaire a retenir')) ?>
			<?= form_submit(array('id' => 'partager', 'value' => 'partager', 'name' => 'partager')) ?>
		<?= form_fieldset_close() ?>
	<?= form_close() ?>
</div>
<div id="posts">
	<?php if(count($posts)): ?>
		<?php foreach ($posts as $post): ?>
		<div class="postContainer">
			<div class="post" id="p<?= $post->id; ?>">
				<div class="img">
					<img <?= 'src="'.$post->image.'"' ?> alt="<?= $post->image ?>" />
				</div>	
				<div class="infos">
					<div class="supp">
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
					</div>
					<h2><?= $post->titre ?></h2>
					<span><a href="<?= $post->site ?>" title="voir le site <?= $post->site ?>"><?= $post->site ?></a></span>
					<p><?= $post->description ?></p>
				</div>	
			</div>
		</div>
		<?php endforeach; ?>
	<?php else: ?>
		<p>vous n'avez encore enregistré aucuns liens, si vous venez de vous inscrire cela signifie que votre inscription s'est passé avec succès. Au cas contraire il serait dommage de laisser cette page vide&nbsp;!</p>
	<?php endif; ?>
</div>