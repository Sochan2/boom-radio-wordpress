<?php get_template_part('parts/header'); ?>


<main>
  <div class="container">
    <div class="row hero-container position-relative">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/hero-image.jpg" alt="hero-image" class="img-fluid hero-img">

      <div class="hero-text col-12 col-md-6">
        <h2>Now playing:</h2>
        <h1>Boom’s Big Breakfast</h1>
        <p>On Every Morning from 7–10am, excludes weekends.</p>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/play-button.svg" alt="play button icon" class="play-button-icon">
      </div>
    </div>

   <!--carousel-->
<!--carousel start-->
<h2 class="slider-title"> Upcoming Events & Giveaways </h2>

<div class="swiper mySwiper">
  <div class="swiper-wrapper">
    <?php
    $custom_events = get_posts([
      'category_name' => 'event',
      'numberposts' => 10
    ]);

    foreach ($custom_events as $event): ?>
      <div class="swiper-slide">
        <div class="translate">
          <?php if (has_post_thumbnail($event->ID)): ?>
            <img class="card-img-top" src="<?php echo get_the_post_thumbnail_url($event->ID,); ?>" alt="<?php echo esc_attr(get_the_title($event->ID)); ?>">
          <?php endif; ?>
        </div>
       
      </div>
    <?php endforeach; ?>
  </div>


  <!-- navigation button-->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
</div>

<!--monthly artists-->

<div class=article-container>

<h2>Artist of the Month </h2>


<?php
//get the category id
$artist_category_id = 6;
//get the category id
$child_categories = get_categories([
  'child_of' => $artist_category_id,
  'hide_empty' => false,
]);

//get term id from $child_categories and make new array

$child_category_ids = wp_list_pluck($child_categories, 'term_id');

//get the post from $child_category_ids
$artist_argument = array(
  'category__in'=> $child_category_ids,
  'posts_per_page' => 2,
);
//get posting data(title, content, thumbnail, date, url and so on )
$artistQuery = new WP_Query($artist_argument);

if($artistQuery -> have_posts()){
  ?>
  <div class="container">
    <div class="row">
      <?php
      //loop each posting
  while($artistQuery->have_posts()){
    $artistQuery->the_post();
    $categories = get_the_category();
    $sub_category_name = '';
  

    foreach ($categories as $category) {
      if (in_array($category->term_id, $child_category_ids)) {
        $sub_category_name = $category->name; //put the name in sub category
    
        break;
      }
    }
?>

<div class="col-12 col-md-6 artists"> 
  <h3><?php echo esc_html($sub_category_name) ?></h3>
    <?php if (has_post_thumbnail()): ?>
    <img class="artist-card" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
  <?php endif; ?>
    <h4><?php the_title()?></h4>
    <p><?php echo get_the_excerpt(); ?> </p> <!--summary-->
 </div>
<?php
    }
?>
    </div> 
  </div> 

<?php
wp_reset_postdata();
  }

else {
  echo '<p>No artist posts found.</p>';  
}
?>
</div>

</main>
<?php get_template_part('parts/footer'); ?>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="wp-content/themes/boom-radio-wordpress/assets/js/main.js"></script>
</body>
</html>
