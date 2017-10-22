<?php get_header(); ?>
<div class="page-content faculty-single">
    <?php get_template_part('template-parts/page-head') ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumbs">
                    <?php echo breadcrumbs() ?>
                </div>
            </div>
        </div>
        <?php
        while ( have_posts() ) : the_post(); ?>

        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                <div class="person-card">
                    <img class="person-card__img" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );?>" alt="Person photo">
                    <div class="person-card__info">
                        <h3 class="person-card__name"><?php echo get_the_title(); ?></h3>
                        <p class="person-card__work"><?php echo get_field('placeholder_title', get_the_ID()) ?></p>
                        <p class="person-card__study"><?php echo get_field('departament', get_the_ID()) ?></p>
                        <?php if(get_field('faculty_phone', get_the_ID()) != '' ): ?>
                            <a href="tel:<?php echo get_field('faculty_phone', get_the_ID())?>" class="contact-info person-card__phone"><i class="fa fa-phone-square" aria-hidden="true"></i><span><?php echo get_field('faculty_phone', get_the_ID()); ?></span></a> <br>
                        <?php endif; ?>
                        <?php if(get_field('faculty_email', get_the_ID()) != '' ): ?>
                            <a href="mailto:<?php echo get_field('faculty_email', get_the_ID())?>" class="contact-info person-card__email"><i class="fa fa-envelope" aria-hidden="true"></i><span><?php echo get_field('faculty_email', get_the_ID()) ?></span></a>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="detail-info">
                    <h3 class="content-separation"><?php _e('Biography', 'tufts'); ?></h3>
                    <div class="content-wrap the_content the_content--small-lh">
                        <?php echo the_content(); ?>
                    </div>
                    <?php if( have_rows('publications') ): ?>
                        <h3 class="content-separation content-separation--no-margin"><?php _e('Publications', 'tufts'); ?></h3>
                        <div class="content-wrap publications-wrap">
                            <?php // loop through the rows of data
                            while ( have_rows('publications') ) : the_row(); ?>
                            <p class="content-text">
                                <span class="publication-title">
                                    <?php if (get_sub_field('publication_link')) { ?>
                                        <a href="<?php echo get_sub_field('publication_link') ?>">
                                            <?php the_sub_field('publication_title'); ?>    
                                        </a>
                                     <?php } else { ?>
                                        <?php the_sub_field('publication_title'); ?>
                                    <?php } ?>
                                </span>
                                <span class="publication-info"><?php the_sub_field('publication_name'); ?></span>
                            </p>
                                <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php get_sidebar(); ?>
        </div>

        <?php endwhile; ?>
    </div>
</div>
<?php get_footer(); ?>

