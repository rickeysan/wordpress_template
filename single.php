<?php get_header();?>

    <?php get_template_part('content','menu');?>

    <main id="main" class="one-column">
        <div class="main-content-wrap main-works-content-wrap">
            <h2 class="main-title">Blogs</h2>
            <div class="main-2columns">
                <div class="main-articles-wrapper">
                    <?php if(have_posts()):?>
                        <?php while(have_posts()):the_posts();?>
                            <article class="main-detail-article">
                            <div class="article-date-wrapper">
                                <span class="article-date"><?php the_time('Y-m-j');?></span>
                            </div>
                            <div class="article-title-wrapper">
                                <h3 class="article-title-detail">
                                    <?php get_the_title();?>
                                </h3>
                            </div>
                            <span class="article-detail-category"><?php single_cat_title_('カテゴリー：');?></span>
                            <div class="article-detail-foot">
                                <img src="" alt="" class="article-detail-foot-img">
                                
                                <p class="article-detail-foot-info">
                                    <?php the_content();?>
                                </p>
                            </div>
                            </article>  

                        <?php endwhile;?>

                        <div class="page-list-wrapper">
                            <ul class="next-page-list">
                                <li class="next-page-list-item">
                                    <?php previous_post_link('&link','前の記事へ');?>
                                </li>
                                <li class="next-page-list-item">
                                    <?php next_post_link('$link','次の記事へ');?>
                                </li>
                            </ul>
                        </div>

                        <!-- Commentes -->
                        <?php commentes_template();?>
                    <?php else:?>
                        <h2 class="title">記事が見つかりませんでした</h2>
                        <p>検索で見つかるかもしれません</p><br>
                        <?php get_search_form();?>
                    <?php endif;?>

                </div>
                <div class="main-sidebar-wrapper">
                    <?php get_sidebar();?>

                </div>        
            </div>
        </div>
        
    </main>

<?php get_footer();?>