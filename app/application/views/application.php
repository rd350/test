<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Activate</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/reset.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/design.css" type="text/css" />
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.metadata.js"></script>
  <script type="text/javascript">
  $(document).ready( function(){
    $('.ok').hide().fadeIn(800);
    $('#form').validate( {'errorElement': 'div' } );
  });
  </script>
  </head>
  <body>
<div id="wrap">
  <h2>Confirm mobile phone</h2>
  <div class="ok">Your account has been created. A sms has been sent to your mobile with a 5 digit activation code. Please enter the code to complete signup:</div>
  <?php echo $error; ?>
  <?php echo form_open('signup/activate', array('id'=>'form') ); ?>
  <?php echo form_label('Code:', 'code'); ?>
  <?php echo form_input( array('name'=>'code', 'id'=>'code', 'class'=>'required digits', 'value'=>set_value('code') ) ); ?>
<div align="center"><?php echo form_submit('signup', 'Complete signup', 'class="submit"' ); ?></div>
  <hr />
  If you haven't received the sms, please <a href="#">click here</a> to send it again
</div>
</body>
</html>
