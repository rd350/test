<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Signup</title>
  <link rel="stylesheet" href="<?php //echo base_url(); ?>css/reset.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/design.css" type="text/css" />

  <!-- html head --><br /><script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script><br /><script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script><br /><script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.metadata.js"></script>
<script type="text/javascript">
$(document).ready( function(){
    $('#form').validate( {'errorElement': 'div' } );
});
</script>
<!-- html head -->

  </head>
  <body>
  <div id="wrap">
  <h2>Signup form</h2>
  <?php echo validation_errors('<div class="error">', '</div>'); ?>
  <?php echo form_open('signup/process', array('id'=>'form') ); ?>
  <?php echo form_label('Name:', 'name'); ?>
  <?php echo form_input( array('name'=>'name', 'id'=>'name', 'class'=>'required', 'value'=>set_value('name') ) ); ?>
  <?php echo form_label('Email:', 'email'); ?>
  <?php echo form_input( array('name'=>'email', 'id'=>'email', 'class'=>'required email', 'value'=>set_value('email') ) ); ?>
  <?php //echo form_label('Country:', 'country'); ?>
  <?php //echo form_dropdown('country', $countries, '','id="country" class="required"' ); ?>
  <?php echo form_label('Mobile phone:', 'mobile'); ?>
  <div><?php echo form_input( array('name'=>'prefix', 'id'=>'prefix', 'value'=>set_value('prefix') ) ); ?>
  <?php echo form_input( array('name'=>'mobile', 'id'=>'mobile', 'class'=>'required digits', 'value'=>set_value('mobile') ) ); ?>
  </div>
  <div align="center"><?php echo form_submit('register', 'Register', 'class="submit"' ); ?></div>
  </div>
  </body>
  </html>

