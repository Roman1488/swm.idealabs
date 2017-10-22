<?php
/**
 * Template Name: Admissions page template
 */
?>
<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
<div class="page-content admissions">
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

                <?php if( have_rows('accordions') ) { ?>
                    <div class="accordion-wrapper">
                    <?php while ( have_rows('accordions') ) : the_row();
                        ?>
                        <div class="accordion">
                            <h3 class="accordion__title content-separation"><?php the_sub_field('accordion_title'); ?></h3>
                            <div class="accordion__content content-wrap the_content the_content--small-lh">
                                <?php
                                $accordion_text = get_sub_field('accordion_text');
                                $accordion_table = get_sub_field('accordion_table_editor');
                                if (get_sub_field('add_table') == true) { ?>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <?php echo apply_filters('the_content', $accordion_text); ?>
                                        </div>
                                        <div class="content-table col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                            <?php echo apply_filters('the_content', $accordion_table); ?>
                                        </div>
                                    </div>
                                <?php } else {
                                    echo apply_filters('the_content', $accordion_text);
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    endwhile; ?>
                    </div>
                <?php } ?>

            </div>
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>
