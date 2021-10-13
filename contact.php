<?php
/*
Template Name: Contact -お問い合わせ-
*/
?>

<?php get_header();?>
  
  <?php get_template_part('content','menu');?>

    <main id="main" class="one-column">
        <div class="main-content-wrap">
            <h2 class="main-title"><?php echo get_the_title();?></h2>
            <?php if(have_posts()):
              while (have_posts()):the_post();?>
                <div id="post-<?php the_ID();?>" <?php post_class();?>>
                  <?php the_content();?>
                </div>
              <?php endwhile;
            else: ?>
                <div class="post">
                  <h2>記事はありません</h2>
                  <p>お探しの記事はありませんでした。</p>
                </div>
            <?php endif;?>

        </div>
        
    </main>

<?php get_footer();?>