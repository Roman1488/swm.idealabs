
<?php 


    if ( ! empty( $instance['a_section'] ) ) {
        $column_count = $instance['a_section']['column_count'];

    }

    // Ensure that the repeater is available and not empty.
    if ( ! empty( $instance['a_repeater'] ) ) {
        $repeater_items = $instance['a_repeater']; ?>
        <div class="partner-icon-widget col-count-<?php echo $column_count; ?>">
            <div class="row">
            <?php foreach( $repeater_items as $key => $repeater_item ) { ?>
                <div class="col-sm-<?php echo $column_count; ?>">
                    <div class="partner-icon-item">
                        <div class="partner-img">
                            <?php 
                                if (isset($repeater_item['some_media'])) {
                                    if (isset($repeater_item['some_media_fallback']) && trim($repeater_item['some_media_fallback']) != '') {
                                        echo "<a href='".$repeater_item['some_media_fallback']."' target='_blank'>";
                                            echo wp_get_attachment_image($repeater_item['some_media'], 'full');
                                        echo "</a>";
                                    } else {
                                        echo wp_get_attachment_image($repeater_item['some_media'], 'full');
                                    }
                                } 
                            ?>
                        </div>
                        <div>
                            <h3 class="widget-title"><?php echo $repeater_item['title']; ?></h3>
                            <h5 class="widget-subtitle"><?php echo $repeater_item['subtitle']; ?></h5>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    <?php } ?>
<script>
    function matchIconHeight() {
        jQuery('.partner-img').matchHeight();
    }
    document.addEventListener('DOMContentLoaded',matchIconHeight);
</script>