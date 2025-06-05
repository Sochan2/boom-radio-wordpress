<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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
        document.addEventListener("DOMContentLoaded", function() {
            const searchBtn = document.getElementById("searchBtn");
            const searchContainer = document.querySelector(".search-container");

            searchBtn.addEventListener("click", function(e) {
                e.preventDefault();
                searchContainer.classList.toggle("active");

                const input = document.getElementById("searchInput");
                if (searchContainer.classList.contains("active")) {
                    input.focus();
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

        .search-container {
            position: relative;
        }

        #searchBtn {
            background-color: transparent;
            border: none;
            cursor: pointer;
            display: flex;
            color: white;
            font-size: 13px;
            align-items: center;
            padding: 5px 10px;
        }

        .search-form {
            margin-top: 5px;
        }

        #searchInput {
            width: 0;
            opacity: 0;
            transition: all 0.4s ease;
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 999;
            margin-top: 5px;
            padding: 0;
            visibility: hidden;
        }

        .search-container.active #searchInput {
            width: 200px;
            opacity: 1;
            padding: 5px 10px;
            visibility: visible;
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