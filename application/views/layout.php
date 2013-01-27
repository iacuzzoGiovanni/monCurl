<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>link manager <?= $titre ?></title>
		<link rel="stylesheet" href="<?= site_url().CSS_DIR2 ?>">
		<link rel="stylesheet" href="<?= site_url().CSS_DIR ?>">
	</head>
	<body id="<?= $pageCourante ?>">
		<header>
			<h1>
				<img width="215" height="38.5" src="http://localhost:8888/monCurl/web/img/titleImg.png" alt="link Manager" />
			</h1>
		</header>
		<div id="content">
			<?= $vue ?>
		</div>
		<script src="<?= base_url() ?>web/js/jquery-1.8.2.js" type="text/javascript"></script>
        <script src="<?= base_url() ?>web/js/script.js" type="text/javascript"></script>
	</body>
</html>