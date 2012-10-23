<section id="form">
	<?= form_open() ?>
	<fieldset>
		<?= form_textarea(array('id' => 'text', 'name' => 'text', 'rows' => '', 'cols' => '')) ?>
	</fieldset>
	<fieldset>
		<?= form_submit(array('id' => 'partager', 'value' => 'partager', 'name' => 'partager')) ?>
	</fieldset>
	<?= form_close() ?>
</section>
<section id="posts">
	<?php foreach ($posts as $post): ?>
		<div class="post">
			<section class="img">
				<img <?= 'src="'.$post->image.'"' ?> alt="<?= $post->image ?>" />
			</section>	
			<section class="infos">
				<h2><?= $post->titre ?></h2>
				<span><?= $post->site ?></span>
				<p><?= $post->description ?></p>
			</section>	
		</div>
	<?php endforeach; ?>
</section>