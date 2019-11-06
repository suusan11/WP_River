<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package River
 */

get_header();
?>

<main class="container">
  <div class="thumbnail__flex">
    <?php
        if (have_posts()) :
          while (have_posts()): the_post(); ?>

    <?php if (is_first() && is_home() && !is_paged()): ?>
    <div class="summary new-post">
      <div class="summary__date">
        <p class="summary__date--item month"><?php echo get_the_date('M.'); ?>
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
        </p>
        <a href="<?php the_permalink(); ?>">
          <h1 class="summary__text--title"><?php echo get_the_title(); ?>
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
        the_post_thumbnail();
            ?>
      </a>
      <?php endif; ?>
    </div>
    <!--new post-->

    <?php else: ?>
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
    endif;
    endwhile;
        else :

        endif;
        ?>
  </div>

  <?php if (function_exists("the_pagination")) {
            the_pagination();
        } ?>

</main><!-- #main -->

<?php
get_footer();
