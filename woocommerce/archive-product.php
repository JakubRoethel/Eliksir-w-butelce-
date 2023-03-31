<?php
require_once dirname(__DIR__, 1) . ('/lib/get-product-by-cat.php');
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');

$args  = array(
	'taxonomy' => 'product_cat'
);
$terms = wp_get_post_terms($post->ID, 'product_cat', $args);

?>
<div class="archive-wrapper">
	<div class="archive-container">
		<?php do_action('woocommerce_before_main_content'); ?>
		<section id='zestawy' class="product_cat zestawy">
			<h2 class="category-title"><?php echo __('Zestawy') ?></h2>
			<p class="category-description"><?php echo get_term_by('id', 39, 'product_cat')->description ?></p>
			<?php echo do_shortcode('[fe_widget id="314" horizontal="yes" columns="1"]');
			getProductsByCat(39);
			?>

		</section>

		<section id='eliksiry' class="product_cat eliksiry">
			<h2 class="category-title"><?php echo __('Eliksiry') ?></h2>
			<p class="category-description"><?php echo get_term_by('id', 40, 'product_cat')->description ?></p>
			<?php
			echo do_shortcode('[fe_widget id="316" horizontal="yes" columns="1"]');
			getProductsByCat(40);
			?>
		</section>
	</div>

</div>

<?php get_footer(); ?>