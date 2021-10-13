<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="<?php bloginfo('charset');?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title();?></title>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri().'/reset.css';?>">
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri();?>">
  <?php wp_head();?>
</head>

<body <?php body_class();?>>

