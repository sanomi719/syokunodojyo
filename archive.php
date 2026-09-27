<?php
/**
 * アーカイブ（カテゴリ別・月別など）
 *
 * @package rts
 */

get_header();
?>
<main id="main" class="site-main page-main">
	<div class="container">
		<header class="news__head">
			<p class="label-serif label-serif--lg">NEWS</p>
			<h1 class="news__title"><?php echo esc_html( wp_strip_all_tags( get_the_archive_title() ) ); ?></h1>
		</header>
		<?php get_template_part( 'template-parts/content', 'news-list' ); ?>
	</div>
</main>
<?php
get_footer();
