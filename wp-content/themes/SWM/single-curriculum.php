<?php get_header(); ?>
	<?php while ( have_posts() ) : the_post(); ?>
	    <div class="page-content faculty-single">
	        <?php get_template_part('template-parts/page-head') ?>
	        <div class="container">
	            <div class="row">
	                <div class="col-12">
	                    <div class="breadcrumbs">
	                        <?php echo breadcrumbs() ?>
	                    </div>
	                    <h1 class="page-title"><?php echo get_the_title();?></h1>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">

	                    <div class="head-info">
	                        <?php if ($head_images = get_field('head_images')) {
	                            $i = 1;
	                            $image_count = count($head_images);
	                         ?>
	                            <ul class="head-images">
	                                <?php foreach ($head_images as $image) { ?> 
	                                    <li class="head-images__item <?php echo ($image_count == $i ? 'hidden-sm-down' : '') ?>"><?php echo wp_get_attachment_image( $image['ID'], 'full', false, array('class'=>'img-fluid') ); ?></li>
	                                <?php $i++;
	                                } ?>
	                            </ul>
	                        <?php } ?>

	                        <div class="head-desc">
	                        <?php if ($sub_title = get_field('sub_title')) { ?>
	                            <span class="sub-title">
	                                <?php echo $sub_title; ?>
	                            </span>
	                        <?php } ?>
	                        <?php the_content(); ?>
	                        </div>
	                    </div>

	                    <?php if (have_rows('track_leaders') || get_field('track_leaders_title')) { ?>
	                        <div class="leadership">
	                            <div class="accordion">
                                    <?php if ($track_leaders_title = get_field('track_leaders_title')) { ?>
		                                <h3 class="accordion__title content-separation"><?php echo $track_leaders_title ?></h3>
	                                <?php } ?>
	                                <div class="accordion__content content-wrap the_content">
	                                    <div class="row">
	                                    <?php while ( have_rows('track_leaders') ) : the_row(); 
	                                        $faculty = get_sub_field('person');
	                                        $track_leaders = get_field_object('track_leaders');
	                                        $track_leaders_count = count($track_leaders['value']);
	                                        ?>
	                                        <div class="col-sm-12 col-md-12 <?php echo $track_leaders_count < 4 ? 'col-lg-4 col-xl-4' : 'col-lg-6 col-xl-6' ; ?>">
	                                             <?php 
	                                                if ($make_as_link = get_field('make_as_link', $faculty->ID) == true) {
	                                                    echo '<a href="'.get_post_permalink($faculty->ID).'">';
	                                                } ?>
	                                                <div class="person <?php echo $track_leaders_count < 4 ? 'person__vertical' : '' ; ?>">
	                                                    <?php if ($track_leaders_count < 4 ) { ?>
                                                            <div class="person__photo-wrap">
                                                        <?php } ?>
                                                        	<img class="person__photo img-fluid"  src="<?php echo get_the_post_thumbnail_url($faculty->ID);?>" alt="<?php echo str_replace('"', '\'', $post->post_title) ?>">
                                                    	<?php if ($track_leaders_count < 4 ) { ?>
                                                            </div>
                                                        <?php } ?>
	                                                    <div class="person__info">
	                                                        <h4 class="person__name"><?php echo get_the_title($faculty->ID) ?></h4>
	                                                        <p class="person__title"><?php echo get_field('placeholder_title', $faculty->ID) ?></p>
	                                                        <p class="person__departament"><?php echo get_field('departament', $faculty->ID) ?></p>
	                                                    </div>
	                                                </div>
	                                                <?php if ($make_as_link) {
	                                                    echo '</a>';
	                                                }
	                                            ?>
	                                        </div>
	                                    <?php endwhile; ?>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    <?php } ?>


	                    <?php if (get_field('some_block_content') || get_field('some_block_title')) { ?>
	                        <div class="story">
	                            <div class="accordion">
		                            <?php if ($some_block_title = get_field('some_block_title')) { ?>
		                                <h3 class="accordion__title content-separation"><?php echo $some_block_title ?></h3>
	                                <?php } ?>
	                                <div class="accordion__content content-wrap the_content">
	                                <?php if ($some_block_content = get_field('some_block_content')) { ?>
	                                    <?php echo apply_filters('the_content', $some_block_content); ?>
	                                <?php } ?>
	                                </div>
	                            </div>
	                        </div>
	                    <?php } ?>



	                    <?php if (get_field('program_structure_content') || 
	                    		  get_field('program_structure_title') ||
	                    		  have_rows('program_structure_semesters') ||
	                    		  get_field('program_structure_summer_semester')) { ?>
	                        <div>
	                            <div class="accordion">
		                            <?php if ($program_structure_title = get_field('program_structure_title')) { ?>
		                                <h3 class="accordion__title content-separation"><?php echo $program_structure_title ?></h3>
	                                <?php } ?>
	                                <div class="accordion__content content-wrap the_content">
		                                <?php if ($program_structure_content = get_field('program_structure_content')) { ?>
		                                    <?php echo apply_filters('the_content', $program_structure_content); ?>
	                                    <?php } ?>
	                                    <?php if (have_rows('program_structure_semesters')): ?>
			                                <div class="ps_semesters tables">
			                                    <div class="row">
			                                        <?php $program_structure_semesters = get_field_object('program_structure_semesters');
			                                        $count = (count($program_structure_semesters['value']));

			                                        while (have_rows('program_structure_semesters')) : the_row();
			                                            ?>
			                                            <div class="col-md-<?php echo($count == 1 ? '12' : '6'); ?>">
			                                                <?php echo apply_filters('the_content', get_sub_field('semester')); ?>
			                                            </div>
			                                            <?php
			                                        endwhile; ?>
			                                    </div>
			                                </div>
			                            <?php endif; ?>
			                            <?php if ($program_structure_summer_semester = get_field('program_structure_summer_semester')) { ?>
			                                <div class="ps_summer-semesters tables">
			                                    <?php echo apply_filters('the_content', $program_structure_summer_semester); ?>
			                                </div>
			                            <?php } ?>
	                                </div>
	                            </div>
	                        </div>
	                    <?php } ?>


	                    <?php if (get_field('career_objectives_content') || get_field('career_objectives_title')) { ?>
	                        <div class="story">
	                            <div class="accordion">
		                            <?php if ($career_objectives_title = get_field('career_objectives_title')) { ?>
		                                <h3 class="accordion__title content-separation"><?php echo $career_objectives_title ?></h3>
	                                <?php } ?>
	                                <div class="accordion__content content-wrap the_content">
		                                <?php if ($career_objectives_content = get_field('career_objectives_content')) { ?>
		                                    <?php echo apply_filters('the_content', $career_objectives_content); ?>
	                                    <?php } ?>
	                                </div>
	                            </div>
	                        </div>
	                    <?php } ?>
	                </div>
	                    <?php get_sidebar(); ?>
	            </div>
	        </div>
	    </div>
	<?php endwhile; ?>
<?php get_footer(); ?>
