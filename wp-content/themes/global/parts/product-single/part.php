<?php if (isset($args['container']) && $args['container']) {
    $container = true;
} else {
    $container = false;
}
?>

<?php if($container) : ?>
<div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-2 posts-sidebar-filters__post ">
<?php endif; ?>
  <a href="<?php the_permalink(); ?>">
    <div class="wrap bg-primary--grey-light">
      <div class="">
        <?php the_media_output(get_the_ID(), ['class' => 'pt-2 ph-2']); ?>
      </div>
      <div class="posts-sidebar-filters__content pt-2 pb-2 ph-2  tac">
        <h4 class="mb-half"><?php the_title(); ?></h4>
        <p class=""><?php the_excerpt(); ?></p>
      </div>
    </div>
  </a>
<?php if($container) : ?>
</div>
<?php endif; ?>
