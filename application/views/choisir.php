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
	echo form_open('',$data); 
?>
	
<?php foreach ($img as $key => $image): ?>
	<?= form_fieldset('',array('class' => 'lesImages')) ?>
		<?= form_label('<img src="'.$image.'" alt="bo" />', $key+1) ?>
		<?php 
			$data = array('id' => $key+1, 'name' => 'imgChoice', 'value' => $image);
			echo form_radio($data);
		?>	
	<?= form_fieldset_close() ?>
<?php endforeach; ?>
<?= form_fieldset() ?>
	<?php 
		echo form_button(array('id' => 'prec', 'content' => 'précédente', 'name' => 'prec'));
		echo form_button(array('id' => 'suiv', 'content' => 'suivante', 'name' => 'prec'));  
	?>
<?= form_fieldset_close() ?>
<?= form_fieldset() ?>
	<?php 
		echo form_submit(array('id' => 'envoyer', 'name' => 'envoyer', 'value' => 'envoyer'));  
	?>
<?= form_fieldset_close() ?>
<?= form_close() ?>