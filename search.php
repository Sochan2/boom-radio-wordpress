<?php get_template_part('parts/header'); ?>

<div class="container py-5">
    <h2 class="mb-4 latest-news-title">Search Results for: "<?php echo get_search_query(); ?>"</h2>

    <?php if (have_posts()) : ?>
        <div class="row">
            <?php while (have_posts()) : the_post(); ?>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card h-100">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('medium', [
                                        'class' => 'card-img-top',
                                        'style' => 'border-top-left-radius: 0.5rem; border-top-right-radius: 0.5rem; height: 18rem; object-fit: cover;',
                                    ]);
                                } ?>
                            </a>
                        <?php endif; ?>

                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h5>
                            <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                        </div>

                        <div class="card-footer text-muted">
                            Posted on <?php the_time('F j, Y'); ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="mt-4">
            <?php the_posts_pagination(); ?>
        </div>
    <?php else : ?>
        <p>No results found. Try another search.</p>
    <?php endif; ?>
</div>

<?php get_template_part('parts/footer'); ?>