<header id="header">
  <div class="header-upper">
    <h1 class="header-site-title">
      <a href="<?php echo home_url();?>">
        <!-- <img src="<?php header_image(); ?>" class="img-responsive" alt="<?Php bloginfo('name');?>"> -->

      </a>
    </h1>
    <p class="header-site-subtitle">サブタイトルサブタイトルサブタイトルサブタイトル</p>
    <nav class="header-nav">
  
      <?php wp_nav_menu(array(
        'theme_location'=>'mainmenu1',
        'container'=>'',
        'menu_class'=>'header-list',
        'items_wrap'=>'<ul>%3$s</ul>'
        ));
      ?>
    </nav>
  </div>
  
  
</header>