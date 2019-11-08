<?php
/**
 * The template for displaying aout page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package River
 */

get_header();
?>

<main class="contact container container-pc">
  <div class="main__header">
    <p>Contact</p>
  </div>
  <?php if (have_posts()):
    while (have_posts()): the_post(); ?>
  <p class="contact__text">Feel free to contact me about posts, me or anything! I’m happy to hear from you.</p>
  <!-- <form class="contact__form" action="">
    <input class="contact__form--text" type="text" placeholder="Name">
    <input class="contact__form--text" type="text" placeholder="Email address">
    <textarea name="" id="" cols="30" rows="10" placeholder="Messages"></textarea>
    <button type="submit" name="submit">SEND</button>
  </form> -->
</main>
<?php endwhile;
  else:
  endif;?>

<?php
get_footer();
