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

  <div class="link__posts">
    <?php
        $prev_post = get_previous_post();
        if (!empty($prev_post)):
            ?>
    <div class="prev">
      <p>Previous Post</p>
      <h2><?php previous_post_link('%link', '%title'); ?>
      </h2>
    </div>
    <?php endif; ?>
    <div class="next">
      <?php
        $next_post = get_next_post();
        if (!empty($next_post)):
            ?>
      <p>Next Post</p>
      <h2><?php next_post_link('%link', '%title'); ?>
    </div>
    <?php endif; ?>
  </div>
</main>

<?php
    endwhile;
        else :

        endif;
        ?>
</div>

<?php
get_footer();
