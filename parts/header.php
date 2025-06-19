<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boom Radio</title>
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.ico" type="image/x-icon">
    >
    <?php wp_head(); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="wp-content/themes/boom-radio/js/bootstrap.bundle.min.js"></script>


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
        <div class="logo">
            <a href="<?php echo home_url(); ?>" class="nav-logo-link">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="Logo" class="nav-logo">
            </a>
        </div>


        <nav class="nav">
            <ul>
                <li class="search-toggle">
                    <div class="search-container">
                        <button id="searchBtn" class="" type="button">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/search-icon.svg" alt="search-icon">
                            <span class="search-text">Search</span>
                        </button>

                        <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                            <input type="search" id="searchInput" class="search-field form-control" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s" />
                        </form>
                    </div>
                </li>


                <?php
                wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'container' => false,
                    'items_wrap' => '%3$s' // outputs only the <li> items
                ));
                ?>
            </ul>
        </nav>



    </header>