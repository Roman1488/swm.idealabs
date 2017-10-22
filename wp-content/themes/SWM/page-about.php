<?php
/**
 * Template Name: About page template
 */
?>
<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <div class="page-content about">
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
                <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9 main-wrap">

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
                            <div class="the_content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>

                    <?php if (get_field('show_all_people')) {

                        $args = array(
                            'numberposts' => -1,
                            'post_type'   => 'faculty',
                            'suppress_filters' => true
                        );
                        $faculties = get_posts( $args );
                        $i = 1;
                        if (count($faculties)) { ?>
                            <div class="accordion-wrapper">
                                <div class="accordion">
                                    <?php if ($tie_leadership_title = get_field('tie_leadership_title')) { ?>
                                        <h3 class="accordion__title content-separation"><?php echo $tie_leadership_title ?></h3>
                                    <?php } ?>
                                    <div class="accordion__content content-wrap">
                                        <div class="row">
                                            <?php foreach($faculties as $post){ setup_postdata($post);
                                             ?>
                                                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                    <?php 
                                                        if ($make_as_link = get_field('make_as_link') == true) {
                                                            echo '<a href="'.get_post_permalink().'">';
                                                        } ?>
                                                        <div class="person <?php echo count($faculties) == $i ? 'last' : ''; ?>">
                                                            <img class="person__photo img-fluid"  src="<?php echo get_the_post_thumbnail_url();?>" alt="<?php echo str_replace('"', '\'', $post->post_title) ?>">
                                                            <div class="person__info">
                                                                <h3 class="person__name"><?php the_title() ?></h3>
                                                                <p class="person__title"><?php echo get_field('placeholder_title') ?></p>
                                                                <p class="person__departament"><?php echo get_field('departament') ?></p>
                                                            </div>
                                                        </div>
                                                        <?php if ($make_as_link) {
                                                            echo '</a>';
                                                        }
                                                        $i++
                                                    ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php }
                            wp_reset_postdata(); ?>
                    <?php } else if (have_rows('tie_leadership') || get_field('tie_leadership_title')) { ?>
                        <div class="leadership">
                            <div class="accordion">
                                <?php if ($tie_leadership_title = get_field('tie_leadership_title')) { ?>
                                    <h3 class="accordion__title content-separation"><?php echo $tie_leadership_title ?></h3>
                                <?php } ?>
                                <div class="accordion__content content-wrap the_content">
                                    <div class="row">
                                    <?php 
                                    $tie_leadership = get_field_object('tie_leadership');
                                    $tie_leadership_count = count($tie_leadership['value']);
                                    while ( have_rows('tie_leadership') ) : the_row(); 
                                        $faculty = get_sub_field('person');
                                        ?>
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                             <?php 
                                                if ($make_as_link = get_field('make_as_link', $faculty->ID) == true) {
                                                    echo '<a href="'.get_post_permalink($faculty->ID).'">';
                                                } ?>
                                                <div class="person <?php echo $tie_leadership_count == $i ? 'last' : ''; ?>">
                                                    <img class="person__photo img-fluid"  src="<?php echo get_the_post_thumbnail_url($faculty->ID);?>" alt="<?php echo str_replace('"', '\'', $faculty->post_title) ?>">
                                                    <div class="person__info">
                                                        <h4 class="person__name"><?php echo get_the_title($faculty->ID) ?></h4>
                                                        <p class="person__title"><?php echo get_field('placeholder_title', $faculty->ID) ?></p>
                                                        <p class="person__departament"><?php echo get_field('departament', $faculty->ID) ?></p>
                                                    </div>
                                                </div>
                                                <?php if ($make_as_link) {
                                                    echo '</a>';
                                                }
                                                $i++
                                            ?>
                                        </div>
                                    <?php endwhile; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <?php if (get_field('the_tie_story') || get_field('the_tie_story_title')) { ?>
                        <div class="story">
                            <div class="accordion">
                                <?php if ($the_tie_story_title = get_field('the_tie_story_title')) { ?>
                                    <h3 class="accordion__title content-separation"><?php echo $the_tie_story_title ?></h3>
                                <?php } ?>
                                <?php if ($the_tie_story = get_field('the_tie_story')) { ?>
                                    <div class="accordion__content content-wrap the_content">
                                        <?php echo apply_filters('the_content', $the_tie_story); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>


                    <?php if (get_field('history_of_water_at_tufts') || get_field('history_of_water_at_tufts_title')) { ?>
                        <div class="history">
                            <div class="accordion">
                                <?php if ($history_of_water_at_tufts_title = get_field('history_of_water_at_tufts_title')) { ?>
                                    <h3 class="accordion__title content-separation"><?php echo $history_of_water_at_tufts_title ?></h3>
                                <?php } ?>
                                <?php if ($history_of_water_at_tufts = get_field('history_of_water_at_tufts')) { ?>
                                    <div class="accordion__content content-wrap the_content">
                                        <?php echo apply_filters('the_content', $history_of_water_at_tufts); ?>
                                    </div>
                                <?php } ?>
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
