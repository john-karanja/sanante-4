<?php
$day   = get_the_time( 'd' );
$month   = get_the_time( 'M' );
$year    = get_the_time( 'Y' );
$title   = get_the_title();
$link    = empty( $title ) && ! is_single() ? get_the_permalink() : get_month_link( $year, $month );

$classes = '';
if ( is_single() || is_page() || is_archive() ) { // This check is to prevent classes for Gutenberg block
    $classes = 'published updated';
}
?>
<div itemprop="dateCreated" class="qodef-e-info-item qodef-e-info-custom-date entry-date <?php echo esc_attr( $classes ); ?>">
    <?php if (  pharmacare_is_installed( 'core' ) ) { ?>
        <a class="qodef-short-date" itemprop="url" href="<?php echo esc_url( $link ); ?>">
                <span class="qodef-e-info-date-day">
                <?php echo esc_html( $day ); ?>
            </span>
                <span class="qodef-e-info-date-month">
                <?php echo esc_html( $month ); ?>
            </span>
        </a>
    <?php } ?>
    <meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number( get_the_ID() ); ?>"/>
</div>
