<?php

/**
 * Template Name: Contact Page
 */



get_template_part('parts/header');
?>



<div class = "contact-form">
<h1>Contact</h1>
<?php echo do_shortcode('[wpforms id="287"]') ?>
</div>

<?php get_template_part('parts/footer'); ?>
