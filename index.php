<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<?php
// get_header(); ?>

<!-- just testing the bootstrap -->
<div class="container mt-1">
  <h1 class="text-primary">🎉 Bootstrap is Working!</h1>
  <p class="lead">This is a test page to confirm Bootstrap styles and components.</p>

  <!-- Bootstrap Button -->
  <button type="button" class="btn btn-success mb-3">Success Button</button>

  <!-- Bootstrap Alert -->
  <div class="alert alert-warning" role="alert">
    This is a Bootstrap warning alert—check it out!
  </div>

  <!-- Bootstrap Card -->
  <div class="card" style="width: 18rem;">
    <img src="https://via.placeholder.com/286x180" class="card-img-top" alt="Sample Image">
    <div class="card-body">
      <h5 class="card-title">Bootstrap Card</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
</div>
<!-- test -->



</body>
</html>
