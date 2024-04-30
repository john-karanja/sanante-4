<?php $author_id     = get_the_author_meta('ID'); ?>

<div class="qodef-e-info-item qodef-e-info-author">
    <div class="qodef-m-image">
        <a itemprop="url" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
            <?php echo get_avatar( $author_id, 40 ); ?>
        </a>
    </div>
    <div class="qodef-m-text">
        <a itemprop="author" class="qodef-e-info-author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
            <?php the_author_meta( 'display_name' ); ?>
        </a>
        <span class="qodef-author-categories-label">
            <?php esc_html_e('in', 'pharmacare'); ?>
        </span>
        <?php
        // Include post category info
        pharmacare_template_part('blog', 'templates/parts/post-info/category');
        ?>
    </div>
</div>
