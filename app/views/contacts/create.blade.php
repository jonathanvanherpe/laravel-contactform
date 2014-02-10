<?php
$contact = new Contact();
?>
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
      <?php 
      echo "<h1>".Lang::get('messages.formtitle')."</h1>";
      if ( $errors->count() > 0 ){ ?>
      <ul class="warning">
        <?php foreach( $errors->all() as $message ){ ?>
          <li><?= $message ?></li>
        <?php } ?>
      </ul>
    <?php } ?>
		<?php
                echo Form::model($contact, array('route' => array('contacts.store')));
                        //Form::open(array('url' => 'submit'));
                echo Form::label('email',Lang::get('messages.email'));
                echo Form::email('email');
                echo Form::label('name',Lang::get('messages.name'));
                echo Form::text('name');
                echo Form::label('message',Lang::get('messages.message'));
                echo Form::textarea('message');
                echo Form::submit(Lang::get('messages.submit'),array("class"=>"submit"));
                echo Form::close();  
                
                ?>
	</div>
</body>
</html>

