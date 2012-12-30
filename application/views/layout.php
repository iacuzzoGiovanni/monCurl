<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title><?= $titre ?></title>
		<link rel="stylesheet" href="<?= site_url().CSS_DIR2 ?>">
		<link rel="stylesheet" href="<?= site_url().CSS_DIR ?>">
	</head>
	<body id="<?= $pageCourante ?>">
		<h1>
			<img src="http://localhost:8888/monCurl/web/img/titleImg.png" alt="logo représentant un petit trombone" />
			<?= $titre ?>
		</h1>
		<div id="content">
			<?= $vue ?>
		</div>
		<script src="<?= base_url() ?>web/js/jquery-1.8.2.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>web/js/script.js" type="text/javascript"></script>
	</body>
</html>