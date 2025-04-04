<?php
/*
Template Name: Sản phẩm
*/
get_header(); 
?>
<style>
.page-product-container {
    display: flex;
    max-width: 2000px;
    margin: 20px auto;
}

.sidebar {
    width: 15%;
    font-size: 20px;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.products-container {
    width: 85%;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
    padding: 20px;
}

.product-item {
    background: white;
    padding: 10px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.product-item img {
    width: 80%; /* Thu nhỏ ảnh còn 80% */
    max-width: 200px; /* Giới hạn chiều rộng tối đa */
    height: auto; /* Giữ tỷ lệ ảnh */
    border-radius: 10px;
}

.product-item:hover img{
    transform: scale(1.2); /* Phóng to ảnh */
	transition: transform 0.4s ease-in-out; /* Hiệu ứng zoom mượt */
}
</style>

<div class="page-product-container">
    <aside class="sidebar">
        <h3>Danh mục sản phẩm</h3>
        <ul>
			<li><input type="checkbox" name="category" value="rem-cau-vong" onchange="filterProducts()"> Rèm cầu vồng</li>
            <li><input type="checkbox" name="category" value="rem-cuon" onchange="filterProducts()"> Rèm cuốn</li>
            
            <li><input type="checkbox" name="category" value="rem-go" onchange="filterProducts()"> Rèm gỗ</li>
            <li><input type="checkbox" name="category" value="rem-tu-dong" onchange="filterProducts()"> Rèm tự động</li>
        </ul>
    </aside>

    <section class="products-container">
        <?php
        $args = array(
            'post_type' => 'product', // Nếu sử dụng WooCommerce
            'posts_per_page' => -1
        );
        $query = new WP_Query($args);
        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                $categories = get_the_terms(get_the_ID(), 'product_cat');
                $category_slug = '';
                if ($categories && !is_wp_error($categories)) {
                    $category_slug = $categories[0]->slug;
                }
        ?>
                <div class="product-item" data-category="<?php echo esc_attr($category_slug); ?>">
                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'); ?>" alt="<?php the_title(); ?>">
                    <h4 style="font-size: 30"><?php the_title(); ?></h4>
                    <p style="font-size: 26"><?php the_excerpt(); ?></p>
                </div>
        <?php
            endwhile;
            wp_reset_postdata();
        endif;
        ?>
    </section>
</div>

<script>
function filterProducts() {
    const checkboxes = document.querySelectorAll(".sidebar input[type='checkbox']:checked");
    const selectedCategories = Array.from(checkboxes).map(cb => cb.value);
    const products = document.querySelectorAll(".product-item");
    
    products.forEach(product => {
        const category = product.getAttribute("data-category");
        if (selectedCategories.length === 0 || selectedCategories.includes(category)) {
            product.style.display = "block";
        } else {
            product.style.display = "none";
        }
    });
}
</script>

<?php get_footer(); ?>
