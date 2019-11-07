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

<?php
    if (have_posts()) :
        while (have_posts()): the_post(); ?>
<main class="about container container-pc">
  <div class="main__header">
    <p>About</p>
  </div>
  <!-- <h2 class="profile__name"><?php the_title(); ?>
  </h2> -->
  <?php get_h2(); ?>
  <a href="<?php the_permalink(); ?>">
    <?php
        if (has_post_thumbnail()) :
            the_post_thumbnail('thumbnail', array('class' => 'profile__image')); ?>
    <?php endif; ?>
  </a>
  <div class="profile__text">
    <?php get_p(); ?>
  </div>
</main>
<?php
  endwhile;
  else:
  endif;?>

<?php
get_footer();
