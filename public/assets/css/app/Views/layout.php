<!DOCTYPE html>

<html lang="fr">
    <head>
        <title><?php echo $this->e($title); ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles/reset.css" type="text/css" />
        <link rel="stylesheet" href="styles/style.css" type="text/css" />
    </head>
    <body>

	<div class="container">
		<header>
			<h1>W :: <?= $this->e($title) ?></h1>
		</header>

		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>
</body>
</html>