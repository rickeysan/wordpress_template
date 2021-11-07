<sidebar class="main-sidebar">
    <div class="sidebar-section">
        <?php get_search_form();?>
    </div>

    <div class="sidebar-section">
        <h3 class="sidebar-section-title">新着記事</h3>
        <div class="sidebar-section-content">
            <ul class="new-article-list">
                <li class="new-article-list-item">
                    <a href="">
                        <img src="" alt="" class="new-article-img">
                        <p class="new-article-title">サンプルサンプルサンプル</p>
                    </a>
                </li>
                <li class="new-article-list-item">
                    <a href="">
                        <img src="" alt="" class="new-article-img">
                        <p class="new-article-title">サンプルサンプルサンプル</p>
                    </a>
                </li>
                <li class="new-article-list-item">
                    <a href="">
                        <img src="" alt="" class="new-article-img">
                        <p class="new-article-title">サンプルサンプルサンプル</p>
                    </a>
                </li>
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
                <li class="month-list-item">
                    <a href="">
                        2021/10 (5)
                    </a>
                </li>
                <li class="month-list-item">
                    <a href="">
                        2021/9 (9)
                    </a>
                </li>
                <li class="month-list-item">
                    <a href="">
                        2021/8 (12)
                    </a>
                </li>
                <li class="month-list-item">
                    <a href="">
                        2021/7 (24)
                    </a>
                </li>
            </ul>
        </div>
    </div>
</sidebar>