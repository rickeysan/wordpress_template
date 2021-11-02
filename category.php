<?php get_header();?>

    <?php get_template_part('content','menu');?>

    <main id="main" class="one-column">
        <div class="main-content-wrap main-works-content-wrap">
            <h2 class="main-title">Blogs</h2>
            <div class="main-2columns">
                <div class="main-articles-wrapper">
                    <!-- 記事のループ -->
                    <?php get_template_part('loop');?>

                    <?php if(function_exists("pagination")) pagination($additional_loop->max_num_pages);?>
                   
                </div>
                
                <div class="main-sidebar-wrapper">
                    <!-- サイドバー -->
                    <?php get_sidebar();?>

                </div>        
                
            </div>
        </div>
        
    </main>

<?php get_footer();?>