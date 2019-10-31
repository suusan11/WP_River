<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package River
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta
		charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php bloginfo('name'); ?>
	</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
		integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<?php wp_head(); ?>
</head>

<body>
	<header class="header">
		<div class="header__flex container">
			<h1 class="header__left"><a
					href="<?php echo esc_url(home_url('/'))?>">River</a>
			</h1>
			<div class="header__right">
				<form id="search-form" role="search" action="/" method="get">
					<input class="search-box" name="search-box" type="text" placeholder="Search">
					<input class="search-submit fas" type="submit" value="&#xf002;">
				</form>
			</div>
			<?php
            wp_nav_menu(array(
                                'theme_location' => 'menu',
                                'container' => 'nav',
                                'container_class' => 'header__center',
                                'menu_class' => 'header-nav'
            ));
            ?>
		</div>
	</header>