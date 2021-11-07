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
                    <h1 class="page-title">ページが存在しません</h1>
                </div>
                
            </div>
            <div class="main-sidebar-wrapper">
                <!-- サイドバー -->
                <?php get_sidebar();?>

            </div>        
        </div>
        
    </main>

<?php get_footer();?>
