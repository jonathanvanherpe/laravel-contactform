<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo Lang::get('messages.formtitle'); ?></title>
	<!-- <link rel="stylesheet" href="css/main.css" /> -->
        <?php echo HTML::style('css/reset.css'); ?>
        <?php echo HTML::style('css/main.css'); ?>
</head>
<body>
	<div class="wrapper">
            <?php if ( $errors->count() > 0 ){ ?>
      <p>The following errors have occurred:</p>

      <ul>
        <?php foreach( $errors->all() as $message ){ ?>
          <li><?= $message ?></li>
        <?php } ?>
      </ul>
    <?php } else { ?>
      <p><?= Lang::get('messages.thanks'); ?></p>
    <?php } ?>

</div>
</body>
</html>
