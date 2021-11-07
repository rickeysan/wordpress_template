<?php if(have_posts()):?>
<?php while(have_posts()):the_post();?>
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
<?php endif;?>