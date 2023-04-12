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
$page_id = wc_get_page_id('shop');
// $args  = array(
// 	'taxonomy' => 'product_cat'
// );
// $terms = wp_get_post_terms($post->ID, 'product_cat', $args);

?>
<div class="shop_page">

	<div class="archive-wrapper">
		<div class="archive-container">
			<?php do_action('woocommerce_before_main_content'); ?>
			<section id='zestawy' class="product_cat zestawy">
				<h2 class="category-title"><?php echo __('Zestawy') ?></h2>
				<p class="category-description"><?php echo get_term_by('id', 39, 'product_cat')->description ?></p>
				<?php echo do_shortcode('[fe_widget id="314" horizontal="yes" columns="1"]');
				getProductsByCat(39, 6);
				?>

			</section>

			<section id='eliksiry' class="product_cat eliksiry">
				<h2 class="category-title"><?php echo __('Eliksiry') ?></h2>
				<p class="category-description"><?php echo get_term_by('id', 40, 'product_cat')->description ?></p>
				<?php
				echo do_shortcode('[fe_widget id="316" horizontal="yes" columns="1"]');
				getProductsByCat(40, 6);
				?>
			</section>

			<section id='dodatki' class="product_cat dodatki">
				<h2 class="category-title"><?php echo __('Dodatki') ?></h2>
				<p class="category-description"><?php echo get_term_by('id', 41, 'product_cat')->description ?></p>
				<?php
				getProductsByCat(41, 3);
				?>
			</section>
		</div>

	</div>

	<?php
	// get_template_part('views/b2b', 'why-eliksir-2');
	$title = get_field('why_eliksir_section', $page_id)['title'];

	$image_id = get_field('why_eliksir_section', $page_id)['image'];
	$description = get_field('why_eliksir_section', $page_id)['description'];
	$cta_button = get_field('why_eliksir_section', $page_id)['cta_button'];
	$background_color = get_field('why_eliksir_section', $page_id)['background_color'];
	$title_color = get_field('why_eliksir_section', $page_id)['title_color'];
	?>


	<div class="container why_eliksir_section" style="background: <?php echo $background_color; ?>">

		<div class="text_and_button_wrapper">
			<p class="title" style="color: <?php echo $title_color ?>"><?php echo $title ?></p>
			<p class="description"><?php echo $description ?></p>
			<a href="<?php echo $cta_button['url'] ?>" class="cta_button button"><?php echo $cta_button['title'] ?></a>
		</div>
		<div class="image_wrapper">
			<div class="img_container"> <?php echo wp_get_attachment_image($image_id, 'full'); ?> </div>
		</div>
	</div>
</div>

<?php
get_footer(); ?>