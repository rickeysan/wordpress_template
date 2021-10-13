<?php
/*
Template Name: Home -トップページ-
*/
?>

<?php get_header();?>

    <?php get_template_part('content','menu');?>

    <main id="main" class="one-column">
    <div class="content-wrap">
      <h2 class="wrap-title">Profile</h2>
      <span class="profile-name">Rickye</span>
      <p class="profile-info">プロフィールテキストプロフィールテキストプロフィールテキストプロフィールテキストプロフィールテキストプロフィールテキストプロフィールテキストプロフィールテキスト
        プロフィールテキストプロフィールテキストプロフィールテキストプロフィールテキストプロフィールテキストプロフィールテキスト
      </p>
    </div>
    <div class="work-contents-wrap content-wrap">
      <h2 class="wrap-title">My Works</h2>
      <div class="works-wrap">
        
        <div class="work-area">
          <span class="work-area-title">習慣化アプリ</span>
          <p class="work-area-info">If-THenルールを公開して、習慣化をお助けするアプリです</p>
          <div class="work-area-img-wrap">
            <img src="https://placehold.jp/220x140.png" alt="" class="work-area-img">
          </div>
        </div>

        <div class="work-area">
          <span class="work-area-title">習慣化アプリ</span>
          <p class="work-area-info">If-THenルールを公開して、習慣化をお助けするアプリです</p>
          <div class="work-area-img-wrap">
            <img src="https://placehold.jp/220x140.png" alt="" class="work-area-img">
          </div>
        </div>

        <div class="work-area">
          <span class="work-area-title">習慣化アプリ</span>
          <p class="work-area-info">If-THenルールを公開して、習慣化をお助けするアプリです</p>
          <div class="work-area-img-wrap">
            <img src="https://placehold.jp/220x140.png" alt="" class="work-area-img">
          </div>
        </div>

      </div>
    </div>

    <div class="content-wrap">
      <h2 class="wrap-title">Charactor</h2>
      <div class="charactor-table-wrap">
        <table class="charactor-table">
          <tbody>

            <tr>
              <td>性格</td>
              <td>おっとり</td>
            </tr>
            <tr>
              <td>学歴</td>
              <td>関東の国立大学の工学部院卒</td>
            </tr>
            <tr>
              <td>趣味</td>
              <td>ジョギング、海外ドラマの鑑賞</td>
            </tr>
            <tr>
              <td>現在の仕事</td>
              <td>化学メーカーの製造職</td>
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