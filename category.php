<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package River
 */

get_header();
?>

<main class="container">
  <h2 class="archive_title">Category: <span><?php
foreach ((get_the_category()) as $cat) {
    echo $cat->cat_name . ' ';
}
?>
    </span>
  </h2>
  <div class="thumbnail__flex">
    <?php
        if (have_posts()) :
          while (have_posts()): the_post(); ?>

    <?php if (is_first()): ?>
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
            href="<?php the_permalink(); ?>">Read
            more</a></p>
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
        <p class="summary__text--category">
          <?php
          foreach ((get_the_category()) as $cat) {
              echo $cat->cat_name . ' ';
          } ?>
        </p>
        <a href="<?php the_permalink(); ?>">
          <h1 class="summary__text--title"><?php the_title(); ?>
          </h1>
        </a>
        <div class="summary__text--intro"><?php the_excerpt(); ?>
        </div>
        <p class="summary__text--link-post"><a
            href="<?php the_permalink(); ?>">Read
            more</a></p>
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
