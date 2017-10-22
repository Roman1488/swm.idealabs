<?php
/**
 * Template Name: Contact page template
 */
?>
<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <div class="page-content contact">
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
                            <div class="the_content the_content--small-lh">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="page-body">
                        <?php if (get_field('contact') || get_field('contact_title')) { ?>
                            <div class="contact">
                                <?php if ($contact_title = get_field('contact_title')) { ?>
                                    <h3 class="content-separation"><?php echo $contact_title ?></h3>
                                <?php } ?>
                                <?php if ($contact_form = get_field('contact_form')) { ?>
                                    <div class="content-wrap content-wrap__contact">
                                        <?php echo do_shortcode('[contact-form-7 id="'.$contact_form.'"]'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                    <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
<?php endwhile; ?>
<?php get_footer(); ?>
