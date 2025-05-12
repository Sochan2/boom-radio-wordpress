<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <script src="wp-content/themes/boom-radio/js/bootstrap.bundle.min.js"></script>
</head>

<body <?php body_class(); ?>>
    <header>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/boom-logo.svg" alt="Logo" height="50" class="nav-logo">
        <nav class="nav">
            <li><span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/search-icon.svg" alt="search-icon" width="20"></span> Search</li>
            <li><span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/podcast-icon.svg" alt="podcast-icon" width="20"></span> Podcasts</li>
            <li><span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/community-icon.svg" alt="community-icon" widh="20"></span>Community</li>
        </nav>
    </header>