<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJ6H2pP2eCz6Hg6p6kHUlGH7FgXrlbpNN8pPeQG9o2NzTxz3sY6lkm4Wqxdz" crossorigin="anonymous">

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

    <body <?php body_class(); ?>>
        <header>
            <a href="<?php echo home_url(); ?>" class="nav-logo-link">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/boom-logo.svg" alt="Logo" height="50" class="nav-logo">
            </a>
            <nav class="nav">
                <ul>
                    <li>
                        <a href="#">
                            <span>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/search-icon.svg" alt="search-icon" width="20">
                            </span>
                            Search
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo get_permalink(get_page_by_path('podcast-page')); ?>">
                            <span>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/podcast-icon.svg" alt="podcast-icon" width="20">
                            </span>
                            Podcasts
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="<?php echo get_permalink(get_page_by_path('community')); ?>">
                            <span>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/community-icon.svg" alt="community-icon" width="20">
                            </span>
                            Community
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo get_permalink(get_page_by_path('latest-news')); ?>">Latest News</a></li>
                            <li><a href="<?php echo get_permalink(get_page_by_path('events')); ?>">Events</a></li>
                            <li><a href="<?php echo get_permalink(get_page_by_path('giveaways')); ?>">Giveaways</a></li>
                        </ul>
                    </li>

                </ul>
            </nav>
        </header>