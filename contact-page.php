<?php
/**
 * Template Name: Contact Page
 */
get_template_part('parts/header');
?>

<div class="contact-page">
  <section class="container mx-auto flex flex-col items-center justify-center text-center px-4 py-12 max-w-2xl">
    <h1 class="text-3xl font-bold mb-4"><?php the_title(); ?></h1>
    <p class="mb-6 max-w-md">Feel free to contact us using the form below.</p>

     <?php echo do_shortcode('[contact-form-7 id="6517149" title="Contact form 1"]'); ?> 
  </section>

  
</div>

<?php get_template_part('parts/footer'); ?>
