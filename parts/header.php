<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo wp_get_document_title() ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <script src="wp-content/themes/boom-radio/js/bootstrap.bundle.min.js"></script>
    <script src= "<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>
       

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <a href="<?php echo home_url(); ?>" class="nav-logo-link">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/boom-logo.svg" alt="Logo" height="50" class="nav-logo">
        </a>

        <nav class="nav">
            <ul>
                <li class="search-toggle">
                    <div class="search-container">
                        <button id="searchBtn" class="" type="button">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/search-icon.svg" alt="search-icon" width="20">
                            Search
                        </button>

                        <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                            <input type="search" id="searchInput" class="search-field form-control" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s" />
                        </form>
                    </div>
                </li>

            </ul>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container_class' => 'custom-menu-class'
            ));
            ?>
        </nav>



    </header>