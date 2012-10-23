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
	<?= form_fieldset() ?>
		<?php foreach ($img as $key => $image): ?>
			<?= form_label('<img src="'.$image.'" alt="bo" />', $key+1) ?>
			<?php 
				$data = array('id' => $key+1, 'name' => 'imgChoice', 'value' => $image);
				echo form_radio($data);
			?>	
		<?php endforeach; ?>
	<?= form_fieldset_close() ?>
<?= form_close() ?>