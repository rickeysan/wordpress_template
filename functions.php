<?php
// 1.カスタムヘッダー画像
// 2.カスタムメニュー
// 3.ページネーション
// 4.カスタムフィールド
// 5.カスタムウィジェット

// カスタムヘッダー画像の設置
$custom_header_defaults = array(
    'default-image' => get_bloginfo('template_url').'/images/headers/logo.png',
    'header-text'=>false,
);

// カスタムヘッダー機能を有効にする
add_theme_support('custom-header',$custom_header_defaults);

// カスタムメニュー
register_nav_menu('mainmenu1','メインメニュー1');


// ページネーション
function pagination($pages='',$range=2){
    error_log('$pagesの値：'.$pages);
    error_log('$rangeの値：'.$range);

    $showitems = ($range*2)+1;

    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages==''){
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages){
            $pages = 1;
        }
    }

    error_log('$pagedの値:'.$paged);
    error_log('$pages2の値：'.$pages);

    if($pages != 1){
        echo "<div class=\"page_list-wrapper pagenation\">\n";
        echo "<ul class=\"page-list\">\n";

        if($paged > 1) echo "<li class=\"prev\"><a href='".get_pagenum_link($paged-1)."'>Prev</a></li>\n";
        error_log('$pages3の値：'.$pages);

        for ($i=1; $i <= $pages; $i++){
            error_log('$pages4の値：'.$pages);
            error_log('$iの値：'.$i);
            if($pages =! 1 && (!($i>=$paged+$range+1 || $i <=$paged-$range-1) || $pages <= $showitems)){
                error_log('入った');
                echo ($paged == $i) ? "<li class=\"active\">".$i."</li>\n" : "<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>\n";
            }
        }
        if($paged < $pages) echo "<li class=\"next\"><a href=\"".get_pagenum_link($paged+1)."\">Next</a></li>\n";
    }
    error_log('ページネーション関数終了');
}

// カスタムフィールド

// 投稿ページへ表示するカスタムボックスを定義する
add_action('admin_menu','add_custom_inputbox');
// 追加した表示項目のデータ更新・保存のためのアクションフック
add_action('save_post','save_custom_postdata');

function add_custom_inputbox(){
    add_meta_box('img_top_id','TOP画像URL入力欄','custom_area4','page','normal');
    add_meta_box('profile_id','PROFILE入力欄','custom_area1','page','normal');
    add_meta_box('charator_id','Charactor入力欄','custom_area2','page','normal');
    add_meta_box('map_id','map入力欄','custom_area3','page','normal');
}

// 管理画面に表示される内容
function custom_area1(){
    global $post;

    echo 'プロフィール :<textarea cols="50" rows="5" name="profile_msg">'.get_post_meta($post->ID,'profile',true).'</textarea>';
}
function custom_area2(){
    error_log('custom_area2関数です');
    global $post;

    echo '<table>';
    for ($i=1; $i<=4; $i++){
        error_log('get_post_metaの値；'.get_post_meta($post->ID,'charactor_info'.$i,true));
        echo '<tr><td>info'.$i.':</td><td><input value="'.get_post_meta($post->ID,'charactor_info'.$i,true).'" name="charactor_info'.$i.'"></td></tr>';
    };
    echo '</table>';
}
function custom_area3(){
    global $post;

    echo 'マップ :<textarea cols="50" rows="5" name="map_link">'.get_post_meta($post->ID,'map_link',true).'</textarea>';
}
function custom_area4(){
    global $post;

    echo 'トップ画像URL :<textarea cols="50" rows="5" name="img-top">'.get_post_meta($post->ID,'img-top',true).'</textarea>';
}



// 投稿ボタンを押した際のデータ更新と保存
function save_custom_postdata($post_id){

    $profile_msg = '';
    $charactor_data = '';
    $map = '';
    $img_top ='';

    
    if(isset($_POST['profile_msg'])){
        $profile_msg = $_POST['profile_msg'];
        
    }

    error_log('$profile_msgの値：'.$profile_msg);

    // 内容が変わっていた場合、保存していた情報を更新する
    if($profile_msg != get_post_meta($post_id,'profile',true)){
        error_log('DBの情報と異なります');
        update_post_meta($post_id,'profile',$profile_msg);
    }elseif($profile_msg == ''){
        error_log('空が入力されました');
        delete_post_meta($post_id,'profile',get_post_meta($post_id,'profile',true));
    }

    // Charactor
    for ($i = 1;$i<=4; $i++){
        if(isset($_POST['charactor_info'.$i])){
            $charactor_data = $_POST['charactor_info'.$i];
        }
        if($charactor_data != get_post_meta($post_id,'charactor_info'.$i,true)){
            update_post_meta($post_id,'charactor_info'.$i,$charactor_data);
        }elseif ($charactor_data == '') {
            delete_post_meta($post_id,'charactor_info'.$i,get_post_meta($post_id,'charactor_info'.$i,true));
            
        }
    }

    // Map
    if(isset($_POST['map_link'])){
        $map_link = $_POST['map_link'];
        
    }

    error_log('$map_linkの値：'.$map_link);

    // 内容が変わっていた場合、保存していた情報を更新する
    if($map_link != get_post_meta($post_id,'map',true)){
        error_log('DBの情報と異なります');
        update_post_meta($post_id,'map',$map_link);
    }elseif($map_link == ''){
        error_log('空が入力されました');
        delete_post_meta($post_id,'map',get_post_meta($post_id,'map',true));
    }

    // Top-img
    if(isset($_POST['img-top'])){
        $img_top = $_POST['img-top'];
        
    }

    error_log('$img-topの値：'.$img_top);

    // 内容が変わっていた場合、保存していた情報を更新する
    if($img_top != get_post_meta($post_id,'img-top',true)){
        error_log('DBの情報と異なります');
        update_post_meta($post_id,'img-top',$img_top);
    }elseif($img_top == ''){
        error_log('空が入力されました');
        delete_post_meta($post_id,'img-top',get_post_meta($post_id,'img-top',true));
    }

}



add_action('widgets_init','my_widgets_area');

// Foo_Widget ウィジェットを登録
function register_foo_widget() {
    register_widget( 'my_widgets_item1' );
}
add_action( 'widgets_init', 'register_foo_widget' );

// ウィジェットエリアを作成する
function my_widgets_area(){

    register_sidebar(array(
        'name'=>'作品一覧エリア',
        'id'=>'widget_works_info',
        'before_widget'=>'<div>',
        'after_widget'=>'</div>'
    ));
    register_sidebar(array(
        'name'=>'右端のサイドバー',
        'id'=>'my_sidebar',
        'before_widget'=>'<div>',
        'after_widget'=>'</div>',
        'before_title'=>'<h2 class="sidebar-item">',
        'after_title'=>'</h2>'
    ));
}

// // カスタムウィジェット
// // ウィジェットエリアを作成する関数がどれなのかを登録する
// add_action('widgets_init','my_widgets_area');
// // ウィジェット自体の作成するクラスがどれなのかを登録する
// add_action('widgets_init',register_widget("my_widgets_item1"));
/**
 * Adds Foo_Widget widget.
 */
class my_widgets_item1 extends WP_Widget {
	/**
	 * WordPress でウィジェットを登録
	 */
	function __construct() {
		parent::__construct(
			'my_widget_item1', // Base ID
			'作品紹介のウィジェット', // Name
			array( 'description' => '作品紹介用のウィジェット「my_widgets_item1」です。' ) // Args
		);
	}

	/**
	 * ウィジェットのフロントエンド表示
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     ウィジェットの引数
	 * @param array $instance データベースの保存値
	 */
	public function widget( $args, $instance ) {
		// echo $args['before_widget'];
		// if ( ! empty( $instance['title'] ) ) {
		// 	echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		// }
		// echo __( '世界のみなさん、こんにちは', 'text_domain' );
		// echo $args['after_widget'];
            error_log('$argsの中身：'.print_r($args,true));
            error_log('$instanceの中身：'.print_r($instance,true));
        ?>
        <div class="work-area">
        <span class="work-area-title"><?php echo $instance['title'];?></span>
        <p class="work-area-info"><?php echo $instance['body'];?></p>
        <div class="work-area-img-wrap">
        <a href="<?php echo $instance['url'];?>">
            <img src="<?php echo $instance['img'];?>" alt="" class="work-area-img">
        </a>
        </div>
    </div>
        <?php

	}

	/**
	 * バックエンドのウィジェットフォーム
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance データベースからの前回保存された値
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '新しいタイトル';
		$body = ! empty( $instance['body'] ) ? $instance['body'] : '';
		$img = ! empty( $instance['img'] ) ? $instance['img'] : 'http://localhost:8888/wordpress/wp-content/uploads/2021/11/1327-300x300-1.jpeg';
		$url = ! empty( $instance['url'] ) ? $instance['url'] : '';
        
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo 'タイトル: '; ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        <label for="<?php echo $this->get_field_id( 'body' ); ?>"><?php echo '内容: '; ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'body' ); ?>" name="<?php echo $this->get_field_name( 'body' ); ?>" type="text" value="<?php echo esc_attr( $body ); ?>">
        <label for="<?php echo $this->get_field_id( 'img' ); ?>"><?php echo '画像パス: '; ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'img' ); ?>" name="<?php echo $this->get_field_name( 'img' ); ?>" type="text" value="<?php echo esc_attr( $img ); ?>">
        <label for="<?php echo $this->get_field_id( 'url' ); ?>"><?php echo 'リンクURL: '; ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'url' ); ?>" name="<?php echo $this->get_field_name( 'url' ); ?>" type="text" value="<?php echo esc_attr( $url ); ?>">
		</p>
		<?php 
	}

	/**
	 * ウィジェットフォームの値を保存用にサニタイズ
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance 保存用に送信された値
	 * @param array $old_instance データベースからの以前保存された値
	 *
	 * @return array 保存される更新された安全な値
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['body'] = ( ! empty( $new_instance['body'] ) ) ? strip_tags( $new_instance['body'] ) : '';
		$instance['img'] = ( ! empty( $new_instance['img'] ) ) ? strip_tags( $new_instance['img'] ) : 'http://localhost:8888/wordpress/wp-content/uploads/2021/11/1327-300x300-1.jpeg';
		$instance['url'] = ( ! empty( $new_instance['url'] ) ) ? strip_tags( $new_instance['url'] ) : '';

		return $instance;
	}

} // class Foo_Widget


// 検索対象を投稿ページだけにするための関数
function search_filter($query){
    if($query->is_search){
        $query->set('post_type','post');
    }
    return $query;
}
add_filter('pre_get_posts','search_filter');


