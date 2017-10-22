<?php
/**
 * Template Name: Faculty page template
 */
?>
<?php get_header(); ?>
<div class="page-content faculty">
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
            <div class="col-12">
                <div class="header-desc">
                    <span class="sub-text">
                    <?php echo get_field('faculty_head_text') ?>
                    </span>
                </div>
                <?php
                $args = array(
                    'post_type' => 'faculty',
                    'posts_per_page' => -1
                );
                $faculties = query_posts($args);
                if (count($faculties) > 0) : ?>
                <div class="faculty-list">
                    <div class="row">
                        <?php foreach ($faculties as $faculty) : ?>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-4 col-xl-3 faculty-item__wrap">
                            <?php if (get_field('make_as_link', $faculty->ID) == true) {
                                echo '<a href="'.get_post_permalink($faculty->ID).'">';
                            }  ?>
                                <div class="faculty-item">
                                    <img class="faculty-item__photo img-fluid" src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($faculty->ID) );?>" alt="Person photo">
                                    <div class="faculty-item__info">
                                        <h3 class="faculty-item__name"><?php echo $faculty->post_title; ?></h3>
                                        <p class="faculty-item__title"><?php echo get_field('placeholder_title', $faculty->ID) ?></p>
                                        <p class="faculty-item__departament"><?php echo get_field('departament', $faculty->ID) ?></p>
                                    </div>
                                </div>
                            <?php if (get_field('make_as_link', $faculty->ID) == true) {
                                echo '</a>';
                            }  ?>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
