<<?php echo esc_attr( $title_tag ); ?> class="qodef-accordion-title">
	<span class="qodef-tab-title"><?php echo esc_html( $title ); ?></span>
	<span class="qodef-accordion-mark">
		<span class="qodef-icon--plus">
            <span class="qodef-icon-fontkiko kikol kiko-triangular-arrow-up qodef-icon qodef-e" style=""></span>
        </span>
		<span class="qodef-icon--minus">
            <span class="qodef-icon-fontkiko kikol kiko-triangular-arrow-down qodef-icon qodef-e" style=""></span>
        </span>
	</span>
</<?php echo esc_attr( $title_tag ); ?>>
<div class="qodef-accordion-content">
	<div class="qodef-accordion-content-inner">
		<?php echo do_shortcode( $content ); ?>
	</div>
</div>
