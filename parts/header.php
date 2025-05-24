<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="wp-content/themes/boom-radio/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const header = document.querySelector("header");

            window.addEventListener("scroll", function() {
                if (window.scrollY > 50) {
                    header.classList.add("scrolled");
                } else {
                    header.classList.remove("scrolled");
                }
            });
        });
    </script>

    <style>
        body {
            background-image: url('<?php echo get_template_directory_uri(); ?>/assets/img/paper-background.jpg');
            background-repeat: repeat;
            background-size: cover;
            background-attachment: fixed;
            position: relative;
            z-index: 0;
            background-color: #fdfcf8;

        }
    </style>

</head>

    <body <?php body_class(); ?>>
        <header>
            <a href="<?php echo home_url(); ?>" class="nav-logo-link">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/boom-logo.svg" alt="Logo" height="50" class="nav-logo">
            </a>

        <nav class="nav">
            <ul>
                <li>
                <a href="#"><span><img src="<?php echo get_template_directory_uri(); ?>/assets/img/search-icon.svg" alt="search-icon" width="20"></span>Search</a>
                 </li>
            </ul>
            <?php
            wp_nav_menu(array(
            'theme_location' => 'main-menu',
            'container_class'=> 'custom-menu-class'));
            ?>
            </nav>


           
        </header>