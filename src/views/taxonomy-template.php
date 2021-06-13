<?php 

get_header();


$current_term = get_queried_object();
$current_term->acf = get_fields( $current_term );

/**
 * Convert all ACF meta fields to key => value pairs for the taxonomy.
 */
foreach ($current_term->acf['meta_fields'] as $meta_field)
{
    $name  = $meta_field['meta_field_name'];
    $value = $meta_field['meta_field_value'];
    $current_term->acf['meta_fields'][$name] = $value;
}

// -------------------------- TEMPLATE START ------------------------------
?>

    <main class="lg:max-w-screen-xl mx-4 lg:m-auto block pb-40 relative">

        <?php  include( __DIR__ . '/category-parts/category_hero.php'); ?>

        <ul class="grid grid-cols-4 gap-4">

            <?php 
                while (have_posts()) {
                    the_post();
                    include( __DIR__ . '/category-parts/category_item.php');
                } 
            ?>
        </ul>

    </main>

<?php

// -------------------------- TEMPLATE END --------------------------------

get_footer();

?>