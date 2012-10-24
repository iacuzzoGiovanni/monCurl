<h2>
	<?= $titre ?>
</h2>
<span>
	<?= $site ?>
</span>
<p>
	<?= $description ?>
</p>
<?php 
	$data = array('id' => 'choice');
	echo form_open('curl/send',$data); 
?>	
	<?= form_fieldset('',array('class' => 'lesImages')) ?>
		<?php foreach ($img as $key => $image): ?>
			<div class="choice">
				<?= form_label('<img src="'.$image.'"alt="bo"/>', 'i'.$key) ?>
				<?php 
					$data = array('id' => 'i'.$key, 'name' => 'imgChoice', 'value' => $image, 'class' => 'imgChoice');
					echo form_radio($data);
				?>
			</div>
		<?php endforeach; ?>
	<?= form_fieldset_close() ?>
	<?= form_fieldset() ?>
		<?php 
			echo form_button(array('id' => 'prec', 'content' => 'précédente', 'name' => 'prec'));
			echo form_button(array('id' => 'suiv', 'content' => 'suivante', 'name' => 'prec'));  
		?>
		<?= form_hidden(array('description' => $description)) ?>
			<?= form_hidden(array('titre' => $titre)) ?>	
			<?= form_hidden(array('site' => $site)) ?>
	<?= form_fieldset_close() ?>
	<?= form_fieldset() ?>
		<?php 
			echo form_submit(array('id' => 'envoyer', 'name' => 'envoyer', 'value' => 'envoyer'));  
		?>
	<?= form_fieldset_close() ?>
<?= form_close() ?>