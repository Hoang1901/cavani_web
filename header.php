<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <?php wp_head(); ?>
</head>
<body>
    <header>
        <div class="logo-container">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/LogoCavani.jpg" alt="Cavani Blinds" style="height: 70px;">
                <span style="font-size: 35px; line-height: 80px;">Cavani Blinds</span>
            </a>
        </div>
        <nav>
            <ul>
                <li><a href="<?php echo home_url('/san-pham'); ?>" style="font-size: 30px;">Sản phẩm</a></li>
                <li><a href="<?php echo home_url('/tin-tuc'); ?>" style="font-size: 30px;">Tin tức</a></li>
                <li><a href="<?php echo home_url('/ve-chung-toi'); ?>" style="font-size: 30px;">Về chúng tôi</a></li>
            </ul>
        </nav>
    </header>
