<?php get_header(); ?>
<style>
.news-container {
    max-width: 800px;
    margin: 40px auto;
    padding: 20px;
    background: #fff;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
}

.news-title {
    font-size: 28px;
    color: #26ac45;
    text-align: center;
}

.news-meta {
    font-size: 14px;
    color: #777;
    text-align: center;
    margin-bottom: 20px;
}

.news-thumbnail img {
    width: 100%;
    height: auto;
    border-radius: 5px;
}

.news-text {
    font-size: 16px;
    line-height: 1.6;
}

.back-button {
    display: block;
    text-align: center;
    padding: 10px 15px;
    background: #26ac45;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 20px;
}

.back-button:hover {
    background: #1e8c38;
}
</style>

<div class="news-container">
    <div class="news-content">
        <?php 
        if (have_posts()) :
            while (have_posts()) : the_post(); ?>
                <h1 class="news-title"><?php the_title(); ?></h1>
                <p class="news-meta">Đăng ngày <?php the_date(); ?></p>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="news-thumbnail">
                        <?php the_post_thumbnail('large'); ?>
                    </div>
                <?php endif; ?>

                <div class="news-text">
                    <?php the_content(); ?>
                </div>

                <a href="<?php echo site_url('/tin-tuc'); ?>" class="back-button">⬅ Quay lại Tin Tức</a>
            <?php endwhile;
        else :
            echo '<p>Không tìm thấy bài viết.</p>';
        endif;
        ?>
    </div>
</div>

<?php get_footer(); ?>
