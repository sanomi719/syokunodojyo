<?php
/**
 * 最新情報の一覧（home.php / archive.php / index.php 共通）
 *
 * @package rts
 */
?>
<?php if ( have_posts() ) : ?>
	<div class="news__list">
		<?php
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', 'news-card' );
		endwhile;
		?>
	</div>
	<div class="pagination"><?php the_posts_pagination( array( 'mid_size' => 1 ) ); ?></div>
<?php else : ?>
	<p>現在、お知らせはありません。</p>
<?php endif; ?>
