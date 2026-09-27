<?php
/**
 * 最新情報の詳細ページ
 *
 * @package rts
 */

get_header();
?>
<main id="main" class="site-main page-main">
	<div class="container">
		<?php
		while ( have_posts() ) :
			the_post();
			$label = rts_news_label();
			?>
			<article <?php post_class( 'entry' ); ?>>
				<header class="entry__head">
					<span class="news-tag news-tag--<?php echo esc_attr( $label['slug'] ); ?>"><?php echo esc_html( $label['name'] ); ?></span>
					<time class="news-card__date" datetime="<?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?>"><?php echo esc_html( get_the_date( 'Y.m.d' ) ); ?></time>
					<h1 class="entry__title"><?php the_title(); ?></h1>
				</header>
				<?php if ( has_post_thumbnail() ) : ?>
					<figure class="entry__thumb"><?php the_post_thumbnail( 'large' ); ?></figure>
				<?php endif; ?>
				<div class="entry__content"><?php the_content(); ?></div>
				<p class="entry__back"><a href="<?php echo esc_url( rts_news_archive_url() ); ?>">← 最新情報一覧へ</a></p>
			</article>
		<?php endwhile; ?>
	</div>
</main>
<?php
get_footer();
