<?php
/**
 * The template for displaying all single posts
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
<main class="gallery container container-pc">
  <h1 class="gallery--title"><?php echo get_the_title(); ?>
  </h1>
  <p class="gallery--intro"><?php the_excerpt(); ?>
  </p>
  <div class="gallery--items">
    <?php the_content(); ?>
  </div>

  <?php get_template_part('template-parts/content', 'pagination')?>
</main>

<?php
    endwhile;
        else :

        endif;
        ?>
</div>

<?php
get_footer();
