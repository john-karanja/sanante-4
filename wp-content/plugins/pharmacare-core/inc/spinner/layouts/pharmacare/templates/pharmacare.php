<?php
$spinner_text  = pharmacare_core_get_post_value_through_levels( 'qodef_page_spinner_text' );
?>
<div class="qodef-m-pharmacare">
    <div class="qodef-m-pill">
        <div class="qodef-m-svg">
            <?php pharmacare_render_svg_icon( 'preloader' ); ?>
        </div>
        <div class="qodef-m-text">
            <?php echo esc_html( $spinner_text ); ?>
        </div>
    </div>
</div>
