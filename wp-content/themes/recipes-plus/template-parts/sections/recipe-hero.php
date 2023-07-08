<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>

<section class="recipe-hero" 
         style="background-image: url('<?php if (has_post_thumbnail()) { the_post_thumbnail_url('full'); } ?>')">
  <div class="recipe-hero__darken">
    <div class="container container_xl">
      <h1 class="recipe-hero__title"><?php the_title(); ?></h1>
    </div>
  </div>
  
</section>