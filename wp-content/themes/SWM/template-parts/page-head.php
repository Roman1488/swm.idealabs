<?php 
 $page_head_image = get_field('page_head_image', 'option');
 if ($page_head_image = get_field('page_head_image', 'option')) {
 	$background = $page_head_image;
 } else {
 	$background = '';
 }
 ?>
<div class="page-head" <?php echo $background != '' ? 'style="background-image: url('.$background.')"' : ''; ?> >
    <div class="container">
        <?php if ($page_head_image = get_field('page_title_image', 'option')) { ?>
            <a href="<?php echo get_home_url(); ?>">
                <img src="<?php echo $page_head_image  ?>" alt="page-head-image"/>
            </a>
        <?php } ?>
<!--    	<?php /*if ($page_head_subtitle = get_field('page_head_subtitle', 'option')) { */?>
	        <p class="page-head__slogan"><?php /*echo $page_head_subtitle  */?></p>
        --><?php /*} */?>

<!--        <?php /*if ($page_head_title = get_field('page_head_title', 'option')) { */?>
	        <h3 class="page-head__title"><?php /*echo $page_head_title  */?></h3>
        --><?php /*} */?>
    </div>
</div>