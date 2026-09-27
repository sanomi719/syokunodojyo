<?php
/**
 * フォールバック用テンプレート（WordPressの必須ファイル）
 * 通常は front-page.php / home.php / single.php / page.php / archive.php / 404.php が使われます。
 *
 * @package rts
 */

get_header();
?>
<main id="main" class="site-main page-main">
	<div class="container">
		<?php if ( is_singular() ) : ?>
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article <?php post_class( 'entry' ); ?>>
					<header class="entry__head">
						<h1 class="entry__title"><?php the_title(); ?></h1>
					</header>
					<div class="entry__content"><?php the_content(); ?></div>
				</article>
			<?php endwhile; ?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'news-list' ); ?>
		<?php endif; ?>
	</div>
</main>
<?php
get_footer();
