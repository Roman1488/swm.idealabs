<?php
/**
 * Template Name: Curriculum page template
 */
?>
<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
    <div class="page-content curriculum">
        <div class="page-header" style="background-image: url('<?php echo get_the_post_thumbnail_url() ?>')">
            <div class="page-header__head-title">
                <div class="container">

                    <?php if ($page_head_image = get_field('page_title_image', 'option')) { ?>
                        <a href="<?php echo get_home_url(); ?>">
                            <img src="<?php echo $page_head_image  ?>" alt="page-head-image"/>
                        </a>
                    <?php } ?>
<!--                    <?php /*if ($page_head_subtitle = get_field('page_head_subtitle', 'option')) { */?>
                        <p class="page-head__slogan"><?php /*echo $page_head_subtitle  */?></p>
                    <?php /*} */?>

                    <?php /*if ($page_head_title = get_field('page_head_title', 'option')) { */?>
                        <h3 class="page-head__title"><?php /*echo $page_head_title  */?></h3>
                    --><?php /*} */?>
                </div>
            </div>
            <div class="container">
                <div class="head-bottom">
                    <div class="page-header__breadcrumbs">
                        <?php echo breadcrumbs(); ?>
                    </div>
                    <h2 class="head-title"><?php the_title(); ?></h2>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-9">
                            <div class="curriculum__content">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <div class="hidden-sm-down col-md-12 col-lg-4 col-xl-3">
                            <?php if (have_rows('steps')): ?>
                                <div class="steps">
                                    <?php while (have_rows('steps')) : the_row(); ?>
                                        <span class="steps__item"><?php the_sub_field('step'); ?></span>
                                        <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-body">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-9 col-xl-9">
                        <?php
                        $args = array(
                            'numberposts' => -1,
                            'post_type' => 'curriculum',
                            'suppress_filters' => true
                        );
                        $posts = get_posts($args);
                        if (count($posts)) { ?>
                            <h3 class="content-separation content-separation--no-margin"><?php _e('Four tracks. <span class="strong">Limitless paths.</span>', 'tufts'); ?></h3>
                            <div class="tracks">
                                <div class="row track-row">
                                    <?php foreach ($posts as $post) {
                                        setup_postdata($post); ?>
                                        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 track-col">
                                            <div class="track-item">
                                                <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url(); ?>"
                                                     alt="<?php echo str_replace('"', '\'', $post->post_title) ?>">
                                                <div class="track-content">
                                                    <a href="<?php the_permalink(); ?>"
                                                       class="track-title"><?php the_title(); ?></a>
                                                    <div class="track-desc">
                                                        <?php the_excerpt(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php }
                        wp_reset_postdata();
                        ?>                        
                        <?php if ($program_structure_title = get_field('program_structure_title')) { ?>
                            <h3 id="program-structure" class="content-separation">
                                <?php echo $program_structure_title; ?>    
                            </h3>
                        <?php } ?>
                        <div class="content-wrap the_content the_content--small-lh curr-prog">
                            <?php if ($program_structure_content = get_field('program_structure_content')) { ?>
                                <?php echo apply_filters('the_content', $program_structure_content); ?>
                            <?php } ?>

                            <?php if (have_rows('program_structure_semesters')): ?>
                                <div class="ps_semesters tables">
                                    <div class="row tables-row">
                                        <?php $program_structure_semesters = get_field_object('program_structure_semesters');
                                        $count = (count($program_structure_semesters['value']));

                                        while (have_rows('program_structure_semesters')) : the_row();
                                            ?>
                                            <div class="tables-col col-md-<?php echo($count == 1 ? '12' : '6'); ?>">
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
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; ?>


<?php get_footer(); ?>
