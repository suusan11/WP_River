<?php
/**
 * The template for displaying contact page
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
  <?php
    if (have_posts()) :
        while (have_posts()): the_post(); ?>
  <div class="contact__form">
    <?php the_content(); ?>
  </div>

  <?php endwhile;
  else:
  endif;?>
</main>

<?php
get_footer();
