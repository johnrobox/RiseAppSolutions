<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>
      <?php echo (isset($pageTitle)) ? $pageTitle : 'Administrator Page'; ?>
    </title>

    <link rel='stylesheet' href='<?php echo base_url(); ?>css/loginstyle.css'>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/custom.css">

  </head>

  <body>

      <div class="wrapper">

    <?php echo form_open(base_url().'admin/login-exec', array('class' => 'form-signin')); ?> 

      <h2 class="form-signin-heading">Please login
      </h2>

      <?php
      //Email field
      $login_username = array(
          'type' => 'text',
          'class' => 'form-control',
          'name' => 'username',
          'placeholder' => 'Username',
          'autofocus' => ''
        );
      echo form_error('username', '<span class="text-error">', '</span>');
      echo form_input($login_username);
      //Password field
      $password = array(
          'type' => 'password',
          'class' => 'form-control',
          'name' => 'password',
          'placeholder' => 'Password'
        );
      echo form_error('password', '<span class="text-error">', '</span>');
      echo form_input($password);

      ?>
      <label class="checkbox">
      <?php
      //Checkbox
      $checkbox = array(
          'type' => 'checkbox',
          'name' => 'rememberMe',
          'label' => 'Remember me'
        );
      echo form_checkbox($checkbox);
      ?>
          Remember Me
      </label>
      <?php
      //Submit button
      $button = array(
          'type' => 'submit',
          'class' => 'btn btn-lg btn-primary btn-block',
          'content' => 'Login'
        );
      echo form_button($button);

      echo form_close(); ?>
  </div>

  </body>
</html>
