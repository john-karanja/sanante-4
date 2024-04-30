<div <?php echo qode_framework_class_attribute($classes);?> <?php echo qode_framework_inline_style($styles); ?>>

    <div class="qodef-extended-dropdown-opener">
        <?php echo qode_framework_icons()->render_icon( 'kiko-hamburger-menu', 'fontkiko', array( 'icon_attributes' => array( 'class' => 'qodef-e-icon qodef-e-opener' ) ) ); ?>
        <?php echo qode_framework_icons()->render_icon( 'kiko-ellipsis-menu-h', 'fontkiko', array( 'icon_attributes' => array( 'class' => 'qodef-e-icon qodef-e-opened' ) ) ); ?>
        <?php echo esc_html($opener_title);?>
    </div>

    <?php

    // Set main navigation menu as extended if extended navigation is not set
    $theme_location = has_nav_menu( 'extended-dropdown-menu' ) ? 'extended-dropdown-menu' : 'main-navigation';

    wp_nav_menu( array(
        'theme_location' => $theme_location,
        'container'      => '',
        'menu_class' => 'qodef-extended-dropdown',
        'walker'     => new PharmaCareCoreExtendedDropdownWalker()
    ) );

    ?>
</div>