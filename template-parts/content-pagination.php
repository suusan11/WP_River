<?php
/**
 * The template for displaying the pagination
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package River
 */

?>

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