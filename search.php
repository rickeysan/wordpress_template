<?php get_header();?>
<?php error_log( 'searchページです' );?>
<?php 

?>
    <?php get_template_part('content','menu');?>

    <main id="main" class="one-column">
        <div class="main-content-wrap main-works-content-wrap">
            <h2 class="main-title">Blog</h2>
            <div class="main-2columns">
                <div class="main-articles-wrapper">
                    <!-- 検索結果の記事 -->
                    <?php if(have_posts()):?>
                        <?php if(!$_GET['s']){ ?>
                            <h1 class="page-title">検索キーワードが未入力です</h1>

                        <?php } else { ?>
                            <h1 class="page-title">
                                「<?php echo esc_html($_GET['s']);?>」の検索結果：<?php echo $wp_query->found_posts;?>件
                            </h1>

                            <?php while(have_posts()): the_post();?>
                                
                                <article class="main-article">
                                    <div class="article-date-wrapper">
                                        <span class="article-date"><?php the_time("Y-m-j");?></span>
                                    </div>
                                    <div class="article-title-wrapper">
                                        <h3 class="article-title">
                                            <a href="<?php the_permalink();?>" class="article-title-link"><?php the_title();?></a>
                                        </h3>
                                    </div>
                                    <span class="article-category"><?php single_cat_title('カテゴリー：');?></span>
                                    <div class="article-foot">
                                        <a href="" class="article-foot-img-link">
                                            <!-- <img src="" alt="" class="article-foot-img"> -->
                                        </a>
                                        <p class="article-foot-info">
                                            <?php the_content();?>
                                        </p>
                                    </div>
                                </article>
                            <?php endwhile;?>
                        <?php if(function_exists("pagination")) pagination($wp_query->max_num_pages);?>
                        <?php } ?>
                    <?php  else:  ?>
                        <h1 class="page-title">検索されたキーワードに該当する記事はありませんでした</h1>
                    <?php endif;?>
                   
                </div>
                
            </div>
            <div class="main-sidebar-wrapper">
                <!-- サイドバー -->
                <?php get_sidebar();?>

            </div>        
        </div>
        
    </main>

<?php get_footer();?>
