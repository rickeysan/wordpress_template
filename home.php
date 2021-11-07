<?php
/*
Template Name: Home -トップページ-
*/
?>
<?php error_log( 'Homeページです' );?>

<?php get_header();?>

    <?php get_template_part('content','menu');?>

    <div class="header-foot">
      <img src="<?php echo get_post_meta($post->ID,'img-top',true);?>" alt="">
    </div>

    <main id="main" class="one-column">
    <div class="content-wrap">
      <h2 class="wrap-title">Profile</h2>
      <span class="profile-name">Rickye</span>
      <p class="profile-info">
        <?php 
        error_log('$post_IDの値：'.$post->ID);
        echo get_post_meta($post->ID,'profile',true);?>
      </p>
    </div>

    <div class="work-contents-wrap content-wrap">
      <h2 class="wrap-title">My Works</h2>
      <div class="works-wrap">
        <?php dynamic_sidebar('作品一覧エリア');?>
      </div>
    </div>

    <div class="content-wrap">
      <h2 class="wrap-title">Charactor</h2>
      <div class="charactor-table-wrap">
        <table class="charactor-table">
          <tbody>

            <tr>
              <td>性格</td>
              <td><?php echo get_post_meta($post->ID,'charactor_info1',true);?></td>
            </tr>
            <tr>
              <td>学歴</td>
              <td><?php echo get_post_meta($post->ID,'charactor_info2',true);?></td>
            </tr>
            <tr>
              <td>趣味</td>
              <td><?php echo get_post_meta($post->ID,'charactor_info3',true);?></td>
            </tr>
            <tr>
              <td>現在の仕事</td>
              <td><?php echo get_post_meta($post->ID,'charactor_info4',true);?></td>
            </tr>
            
          </tbody>
        </table>
      </div>
    </div>

    <div class="content-wrap">
      <h2 class="wrap-title">Contact</h2>
      <div class="contact-form-wrapper">
        <form action="post" class="contact-form">
          <label for="name">NAME
            <input type="text" placeholder="hogehoge">
          </label>
          <label for="email">E-mail
            <input type="text"  placeholder="sample@gmail.com">
          </label>
          <label for="message">MESSAGE
            <textarea name="" id="" cols="" rows=""></textarea>
          </label>
          <div class="submit-button-wrap">
            <input type="submit" value="送信" class="submit-button">
          </div>
        </form>
      </div>
    </div>

  </main>

<?php get_footer();?>