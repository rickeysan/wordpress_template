<sidebar class="main-sidebar">
    <div class="sidebar-section">
        <?php get_search_form();?>
    </div>

    <div class="sidebar-section">
        <h3 class="sidebar-section-title">新着記事</h3>
        <div class="sidebar-section-content">
            <ul class="new-article-list">
                <?php 
                $args = array(
                    'posts_per_page'=>3
                );
                $posts = get_posts($args);
                foreach($posts as $post):
                    error_log('$postの中身；'.print_r($post,true));
                setup_postdata($post);
                ?>
                <li class="new-article-list-item">
                    <a href="<?php the_permalink();?>">
                        <p class="new-article-title"><?php the_title();?></p>
                    </a>
                </li>
                <?php 
                endforeach;
                wp_reset_postdata();
                ?>
            </ul>
        </div>
    </div>

    <div class="sidebar-section">
        <h3 class="sidebar-section-title">カテゴリー</h3>
        <div class="sidebar-section-content">
            <ul class="category-list">
            <?php
            $categories = get_categories();
            foreach($categories as $category):
            ?>
                <li class="category-list-item">
                    <i class="fas fa-arrow-right"></i>
                    <a href="<?php echo esc_url(get_category_link($category->term_id));?>"><?php echo $category->name;?></a>
                </li>
            <?php endforeach;?>
            </ul>
        </div>
    </div>

    <div class="sidebar-section">
        <h3 class="sidebar-section-title">月別アーカイブ</h3>
        <div class="sidebar-section-content">
            <ul class="month-list">
                <?php wp_get_archives('post_type=post&type=monthly&show_post_count=1');?>
            </ul>
        </div>
    </div>
</sidebar>