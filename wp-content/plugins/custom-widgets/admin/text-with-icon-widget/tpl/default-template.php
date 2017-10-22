
<?php 


    if ( ! empty( $instance['a_section'] ) ) {
        $column_count = $instance['a_section']['column_count'];
    }



    // Ensure that the repeater is available and not empty.
    if ( ! empty( $instance['a_repeater'] ) ) {
        $repeater_items = $instance['a_repeater']; ?>
        <div class="text-with-image-widget col-count-<?php echo $column_count; ?>">
            <div class="row">
            <?php foreach( $repeater_items as $key => $repeater_item ) { ?>
                <div class="col-md-<?php echo $column_count; ?>">
                    <div class="text-with-image-item">
                    	<?php echo wp_get_attachment_image($repeater_item['some_media']); ?>
                		<div>
                            <h3 class="widget-title"><?php echo $repeater_item['title']; ?></h3>
                            <div><?php echo $repeater_item['text']; ?></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    <?php } ?>