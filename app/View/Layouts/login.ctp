<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $title_for_layout; ?></title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css(array('login', 'bootstrap.min', 'util'));
		echo $this->Html->script(array('jQuery-2.2.0.min', 'bootstrap.min'));		

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>

</head>
<body><?php echo $this->fetch('content'); ?>
</body>
</html>
