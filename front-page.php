<?php
/**
 * トップページ
 * 各セクションは template-parts/ に分割しています。
 *
 * @package rts
 */

get_header();
?>
<main id="main" class="site-main">
	<?php
	get_template_part( 'template-parts/section', 'hero' );
	get_template_part( 'template-parts/section', 'about' );
	get_template_part( 'template-parts/section', 'business' );
	get_template_part( 'template-parts/section', 'cycle' );
	get_template_part( 'template-parts/section', 'experience' );
	get_template_part( 'template-parts/section', 'philosophy' );
	get_template_part( 'template-parts/section', 'news' );
	get_template_part( 'template-parts/section', 'representative' );
	get_template_part( 'template-parts/section', 'company' );
	?>
</main>
<?php
get_footer();
