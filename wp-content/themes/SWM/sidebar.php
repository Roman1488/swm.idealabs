<div class="sidebar-wrap col-sm-12 col-md-12 col-lg-3 col-xl-3">
    <div class="sidebar">
        <div class="sidebar_buttons__wrap">
                <a class="button button--orange" href="<?php echo get_field('apply_now_link', 'option')?>"><?php _e('Apply Now', 'tufts'); ?></a>
                <a class="button button--gray" href="<?php echo get_field('connect_with_tie_link', 'option')?>"><?php _e('Connect with TIE', 'tufts'); ?></a>
        </div>


        <?php if( have_rows('sidebar_circles') ) { ?>
                <div class="row circle-sidebar">
                <?php while ( have_rows('sidebar_circles') ) : the_row(); ?>
                <div class="col-sm-12 col-md-6 col-lg-12 col-xl-12">
                    <div class="circle" style="background-color: <?php the_sub_field('circle_color'); ?>">
                        <span class="circle__number"><?php the_sub_field('circle_number'); ?></span>
                        <span class="circle__title"><?php the_sub_field('circle_title'); ?></span>
                    </div>
                </div>
                <?php endwhile; ?>
        <?php } else if( have_rows('circle_repeter', 'option') ): ?>
                <div class="row circle-sidebar">
                <?php while ( have_rows('circle_repeter', 'option') ) : the_row(); ?>
                    <div class="col-sm-12 col-md-6 col-lg-12 col-xl-12 circle-sidebar__item">
                        <div class="circle">
                            <span class="circle__number "><?php the_sub_field('number'); ?></span>
                            <span class="circle__title"><?php the_sub_field('text'); ?></span>
                        </div>
                    </div>
                    <?php
                endwhile; ?>
                </div>
        <?php endif; ?>
        </div>
    </div>
</div>