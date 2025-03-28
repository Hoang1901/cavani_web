<?php
/*
Template Name: Tin Tức
*/
get_header(); ?>

<div class="page-news-container">
    <h1 class="page-title">Tin tức</h1>
    <div class="news-grid">
        <?php
        $query = new WP_Query(array(
            'post_type'      => 'post', // Lấy bài viết từ post
            'posts_per_page' => 6, // Hiển thị 6 bài viết
        ));

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); ?>
                <div class="news-item">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>">
                        <?php else : ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/banner-hr-page.jpg" alt="No Image" style="width: 100%; height: auto;">
                        <?php endif; ?>
                    </a>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p><?php the_excerpt(); ?></p>
                </div>
            <?php endwhile;
            wp_reset_postdata();
        else :
            echo '<p>Chưa có bài viết nào.</p>';
        endif;
        ?>
    </div>
</div>

<?php get_footer(); ?>
