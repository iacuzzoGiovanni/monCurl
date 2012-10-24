<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?= $titre ?></title>
		<link rel="stylesheet" href="<?= site_url().CSS_DIR2 ?>">
		<link rel="stylesheet" href="<?= site_url().CSS_DIR ?>">
	</head>
	<body>
		<div id="content">
			<h1><?= $titre ?></h1>
			<?= $vue ?>
		</div>
		<script src="<?= base_url() ?>web/js/jquery-1.8.2.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>web/js/script.js" type="text/javascript"></script>
	</body>
</html>