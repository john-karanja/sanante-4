<?php
$day   = get_the_time( 'd' );
$month   = get_the_time( 'm' ); // small 'm' required for get_month_link
$year    = get_the_time( 'Y' );
$title   = get_the_title();
$link    = empty( $title ) && ! is_single() ? get_the_permalink() : get_month_link( $year, $month );
$override_default_date_format = pharmacare_get_post_value_through_levels( 'qodef_blog_single_override_date_format' );

$classes = '';
if ( is_single() || is_page() || is_archive() ) { // This check is to prevent classes for Gutenberg block
	$classes = 'published updated';
}
?>
<div itemprop="dateCreated" class="qodef-e-info-item qodef-e-info-date entry-date <?php echo esc_attr( $classes ); ?>">
	<?php if (  pharmacare_is_installed( 'core' ) ) { ?>
		<a class="qodef-short-date" itemprop="url" href="<?php echo esc_url( $link ); ?>">
			<?php if ( $override_default_date_format === 'yes' ) { ?>
				<span class="qodef-e-info-date-day">
                <?php echo esc_html( $day ); ?>
            </span>
				<span class="qodef-e-info-date-month">
	            <?php $month = get_the_time( 'M' ); ?>
	            <?php echo esc_html( $month ); ?>
            </span>
			<?php } else { ?>
				<span class="qodef-e-info-standard-date">
                <?php the_time( get_option( 'date_format' ) ); ?>
            </span>
			<?php } ?>
		</a>
	<?php } else { ?>
		<a itemprop="url" href="<?php echo esc_url( $link ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
	<?php } ?>
	<meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number( get_the_ID() ); ?>"/>
</div>