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

<main class="container container-pc">
	<p class="main__header"><?php
foreach ((get_the_category()) as $cat) {
            echo $cat->cat_name . ' ';
        }
?>
	</p>
	<article class="post">
		<div class="post__flex">
			<div class="post__date">
				<div class="text__center">
					<p class="post__date--item month"><?php echo get_the_date('M.'); ?>
					</p>
					<p class="post__date--item day"><?php echo get_the_date('d'); ?>
					</p>
					<p class="post__date--item year"><?php echo get_the_date('Y'); ?>
					</p>
				</div>
			</div>
			<div class="post__text">
				<h1 class="post__text--title"><?php echo get_the_title(); ?>
				</h1>
				<p class="post__text--intro"><?php the_excerpt(); ?>
				</p>
			</div>
		</div>

		<?php
        if (has_post_thumbnail()) :
            the_post_thumbnail('thumbnail', array('class' => 'post__image')); ?>
		<?php endif; ?>

		<div class="post__sentence">
			<?php the_content(); ?>
		</div>

		<div class="post__tags">
			<p class="post__tags--title">Tags</p>
			<div class="post__tags--wrap">
				<p><?php the_tags(' ', ',&emsp;', ' '); ?>
				</p>
			</div>
		</div>
		<div class="border__top"></div>
		<div class="border__bottom"></div>
	</article>
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
