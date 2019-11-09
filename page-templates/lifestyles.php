<?php
/**
 * The template for displaying the page gallery
 *
 * Template Name: lifestyles
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package River
 */

get_header();
?>

<main class="container">
  <div class="thumbnail__flex">
    <?php
      $cat = get_the_category();
      $args = array(
          'post_type' => 'post',
          'posts_per_page' => 10,
      );
      $the_query = new WP_Query($args);
    ?>
    <?php
        if ($the_query -> have_posts()) :
          while ($the_query -> have_posts()): $the_query -> the_post(); ?>

    <div class="summary">
      <div class="summary__date">
        <p class="summary__date--item month">
          <?php echo get_the_date('M.'); ?>
        </p>
        <p class="summary__date--item day"><?php echo get_the_date('d'); ?>
        </p>
        <p class="summary__date--item year"><?php echo get_the_date('Y'); ?>
        </p>
      </div>
      <div class="summary__text">
        <p class="summary__text--category"><?php
          foreach ((get_the_category()) as $cat) {
              echo $cat->cat_name . ' ';
          }
          ?>
          <a href="<?php the_permalink(); ?>">
            <h1 class="summary__text--title"><?php the_title(); ?>
            </h1>
          </a>
          <div class="summary__text--intro"><?php the_excerpt(); ?>
          </div>
          <p class="summary__text--link-post"><a
              href="<?php the_permalink(); ?>">Read more</a></p>
      </div>
      <a class="post__image" href="<?php the_permalink(); ?>">
        <?php
        if (has_post_thumbnail()) :
        the_post_thumbnail('thumbnail', array('class' => 'post__image'));
            ?>
      </a>
      <?php endif; ?>
    </div>

    <?php
    endwhile;
        else :
        endif;
        wp_reset_postdata();
        ?>
  </div>

  <?php if (function_exists("the_pagination")) {
            the_pagination();
        } ?>

</main><!-- #main -->
<?php
get_footer();
