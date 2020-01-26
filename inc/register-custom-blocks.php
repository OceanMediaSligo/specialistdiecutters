<?php

// Icon Heading Block
acf_register_block_type(array(
    'name'              => 'icon-heading',
    'title'             => 'Icon Heading',
    'description'       => 'A heading with a icon.',
    'render_template'   => get_template_directory() . '/blocks/icon-heading/icon-heading.php',
    'enqueue_style'     => get_template_directory_uri() . '/blocks/icon-heading/icon-heading.css',
    'mode' => 'edit',
));

// Contact Block
acf_register_block_type(array(
    'name'              => 'contact-box',
    'title'             => 'Contact Details',
    'description'       => 'Show a map and contact details for one or more business locations.',
    'render_template'   => get_template_directory() . '/blocks/contact-box/contact-box.php',
    'enqueue_style'     => get_template_directory_uri() . '/blocks/contact-box/contact-box.css',
    'enqueue_script' => get_template_directory_uri() . '/blocks/contact-box/contact-box.js',
    'mode' => 'edit',
));