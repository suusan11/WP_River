<?php
/**
 * The template for displaying the page gallery
 *
 * Template Name: gallery
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package River
 */

get_header();
?>

<main class="container container-pc">
	<div class="main__header">
		<p>Gallery</p>
	</div>

	<?php $args = array(
        'numberposts' => 5,
        'post_type' => 'gallery'
    );
    $posts = get_posts($args);
    if ($posts) : foreach ($posts as $post) : setup_postdata($post); ?>

	<div class="gallery__thumbnail">
		<a href="<?php the_permalink(); ?>">
			<h1 class="gallery__thumbnail--title"><?php echo get_the_title(); ?>
			</h1>
		</a>
		<?php the_excerpt(); ?>
		<a href="<?php the_permalink(); ?>">
			<?php
        if (has_post_thumbnail()) :
            the_post_thumbnail('thumbnail', array('class' => 'post__image')); ?>
			<?php endif; ?>
		</a>
	</div>

	<?php
    endforeach;
      else:
    endif;
    wp_reset_postdata();?>

	<?php if (function_exists("the_pagination")) {
        the_pagination();
    } ?>

</main><!-- #main -->

<?php
get_footer();
