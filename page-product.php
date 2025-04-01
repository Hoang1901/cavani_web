<?php
/*
Template Name: Sản Phẩm
*/
get_header();
?>

<div class="container">
    <aside class="sidebar">
        <h3>Lọc sản phẩm</h3>
        <label><input type="checkbox" class="filter" value="rem-cau-vong"> Rèm Cầu Vồng</label><br>
        <label><input type="checkbox" class="filter" value="rem-cuon"> Rèm Cuốn</label><br>
    </aside>
    <main class="product-grid">
        <?php
        // Query sản phẩm từ WooCommerce
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => -1,
        );
        $loop = new WP_Query($args);
        
        while ($loop->have_posts()) : $loop->the_post();
            global $product;
        ?>
            <div class="product" data-category="<?php echo esc_attr(join(' ', wc_get_product_category_list($product->get_id(), ' ', '', ''))); ?>">
                <img src="<?php echo get_the_post_thumbnail_url($product->get_id(), 'medium'); ?>" alt="<?php the_title(); ?>">
                <h4><?php the_title(); ?></h4>
            </div>
        <?php endwhile; wp_reset_query(); ?>
    </main>
</div>

<?php get_footer(); ?>
