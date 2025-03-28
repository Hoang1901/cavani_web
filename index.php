<?php get_header(); ?>

<div class="home-container">
    <!-- Phần hiển thị 3 ảnh -->
    <div class="main-slider-container">
    <!-- Slider bên trái -->
    <div class="side-slider left">
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
    <div class="side-slider right">
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
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-banner.jpg" alt="Home Banner">
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
            <a href="<?php echo site_url('/tin-tuc'); ?>" class="home-button">Xem Thêm</a>
            </div>
    </div>

    <!-- Một số sản phẩm nổi bật -->
    <div class="featured-products">
    <h2>Sản phẩm Nổi Bật</h2>
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
    <a href="#" class="home-more-products">Xem thêm sản phẩm</a>
    </div>
</div>

<?php get_footer(); ?>
