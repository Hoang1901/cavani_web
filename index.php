<?php get_header(); ?>
<style>
/* Container chứa cả 3 slider */
.main-slider-container {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 50px; /* Khoảng cách giữa các slider */
    margin-bottom: 30px;
    margin-top: 30px;
}

/* Slider chính giữa */
.center-slider {
    width: 600px;
    height: 300px;
    overflow: hidden;
    position: relative;
    
}

/* Slider bên trái & phải */
.side-slider {
    width: 300px;
    height: 300px;
    overflow: hidden;
    position: relative;
}

/* Định dạng slider */
.slider {
    position: relative;
    width: 100%;
    height: 100%;
}

/* Định dạng từng slide */
.slide {
    position: absolute;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 1s ease-in-out;
}

.slide:first-child {
    opacity: 1;
}

/* Định dạng ảnh */
.slide img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 8px;
}


/* Tạo animation */
@keyframes slideAnimation {
    0% { transform: translateX(0%); }
    33% { transform: translateX(-100%); }
    66% { transform: translateX(-200%); }
    100% { transform: translateX(0%); }
}

/* Bố cục 2 cột */
.home-layout {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
    align-items: start;
}

/* Cột trái: Ảnh banner */
.home-banner img {
    width: 90%;
    border-radius: 8px;
    margin-left: 10%;
}

/* Cột phải: Danh sách bài viết */
.home-posts h2 {
    font-size: 22px;
    margin-bottom: 15px;
}

.home-posts ul {
    list-style: none;
    padding: 0;
}

.home-posts li {
    margin-bottom: 10px;
}

.home-posts a {
    text-decoration: none;
    color: #333;
    font-size: 18px;
    font-weight: 500;
    transition: color 0.3s ease;
}

.home-posts a:hover {
    color: #007bff;
}

/* button: xem thêm */
.home-posts .home-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: #26ac45; /* Màu xanh lá cây */
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    color: #f0f0f0;
    transition: background 0.3s;
    border: none;
}

.home-posts .home-button:hover {
    background-color: #218838; /* Màu xanh đậm hơn khi hover */
    color: #f0f0f0;
}

/* home-featured-products */
.featured-products {
    text-align: center;
    padding: 30px 0;
}

.featured-products h2 {
    font-size: 26px;
    margin-bottom: 20px;
}

.home-products-list {
    display: flex;
    justify-content: center;
    gap: 20px;
    font-size: 30px;
}

.home-product-item {
    width: 200px;
    text-align: center;
    background: #f9f9f9;
    padding: 10px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 350px; 
}

.home-product-item img {
    width: 100%;  
    aspect-ratio: 1 / 1; 
    object-fit: cover; 
    border-radius: 5px;
}

.home-product-item:hover img{
	transform: scale(1.2); /* Phóng to ảnh */
	transition: transform 0.4s ease-in-out; /* Hiệu ứng zoom mượt */
}

.home-product-name {
    font-size: 24px;
    font-weight: bold;
    margin: 10px 0 5px;
}

.home-more-products {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #28a745;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    transition: background 0.3s;
    font-size: 20px;
}

.home-more-products:hover {
    background-color: #218838;
}
</style>
<div class="home-container">
    <!-- Phần hiển thị 3 ảnh -->
    <div class="main-slider-container">
    <!-- Slider bên trái -->
    <div class="side-slider left" style="width: 500px;">
        <div class="slider">
            <?php
            $left_images = array('left1.jpg', 'left2.jpg', 'left3.jpg');
            foreach ($left_images as $image) {
                echo '<div class="slide"><img src="' . get_template_directory_uri() . '/assets/images/' . $image . '" alt="Ảnh bên trái"></div>';
            }
            ?>
        </div>
    </div>

    <!-- Slider chính giữa -->
    <div class="center-slider">
        <div class="slider">
            <?php
            $images = array('image1.jpg', 'image2.jpg', 'image3.jpg');
            foreach ($images as $image) {
                echo '<div class="slide"><img src="' . get_template_directory_uri() . '/assets/images/' . $image . '" alt="Ảnh chính"></div>';
            }
            ?>
        </div>
    </div>

    <!-- Slider bên phải -->
    <div class="side-slider right" style="width: 500px;">
        <div class="slider">
            <?php
            $right_images = array('right1.jpg', 'right2.jpg', 'right3.jpg');
            foreach ($right_images as $image) {
                echo '<div class="slide"><img src="' . get_template_directory_uri() . '/assets/images/' . $image . '" alt="Ảnh bên phải"></div>';
            }
            ?>
        </div>
    </div>
    </div>

    <!-- Bố cục 2 cột -->
    <div class="home-layout">
        <!-- Cột trái: Banner -->
        <div class="home-banner">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-banner.jpg" alt="Home Banner"">
        </div>

        <!-- Cột phải: Danh sách bài viết -->
        <div class="home-posts">
            <h2>Bài viết mới</h2>
            <ul>
                <?php
                $query = new WP_Query(array(
                    'post_type'      => 'post',
                    'posts_per_page' => 5
                ));
                if ($query->have_posts()) :
                    while ($query->have_posts()) : $query->the_post();
                ?>
                        <li>
                            <a href="<?php the_permalink(); ?>">
                                <h3><?php the_title(); ?></h3>
                            </a>
                        </li>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    echo '<p>Không có bài viết nào.</p>';
                endif;
                ?>
            </ul>
            <a href="<?php echo site_url('/tin-tuc'); ?>" class="home-button">Xem Thêm Tin Tức</a>
            </div>
    </div>

    <!-- Một số sản phẩm nổi bật -->
    <div class="featured-products">
    <h2>Sản Phẩm Nổi Bật</h2>
    <div class="home-products-list">
        <div class="home-product-item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/remcauvong.jpg" alt="Sản phẩm 1">
            <p class="home-product-name">Rèm cầu vồng</p>
        </div>
        <div class="home-product-item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/remcuontron.jpg" alt="Sản phẩm 2">
            <p class="home-product-name">Rèm cuốn trơn</p>
        </div>
        <div class="home-product-item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/remtoong.jpg" alt="Sản phẩm 3">
            <p class="home-product-name">Rèm tổ ong</p>
        </div>
        <div class="home-product-item">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/remkhongkhoan.jpg" alt="Sản phẩm 4">
            <p class="home-product-name">Rèm không khoan</p>
        </div>
    </div>
    <a href="<?php echo site_url('/san-pham'); ?>" class="home-more-products">Xem thêm sản phẩm</a>
    </div>
</div>

<?php get_footer(); ?>
