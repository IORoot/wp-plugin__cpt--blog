<div class="flex flex-col justify-center items-center w-full mt-32 mb-20">

    <?php
    // ┌─────────────────────────────────────────────────────────────────────────┐
    // │                                                                         │
    // │                                TITLE                                    │
    // │                                                                         │
    // └─────────────────────────────────────────────────────────────────────────┘
    ?>
	<div class="text-yellow-500 text-6xl"><?php echo ucwords($current_term->name); ?></div>


    <?php
    // ┌─────────────────────────────────────────────────────────────────────────┐
    // │                                                                         │
    // │                           SERIES & VIDEOS                               │
    // │                                                                         │
    // └─────────────────────────────────────────────────────────────────────────┘
    ?>

    <?php
        $count =count($posts);
        $f = new \NumberFormatter("en", NumberFormatter::SPELLOUT);
        $spelled = $f->format($count);
    ?>
	<div class="text-3xl font-thin mt-4 text-center">There is <?php echo $spelled; ?> blog post<?php if($count > 1){ echo 's';} ?> in the <?php echo $current_term->name; ?> category </p></div>

    <?php
    // ┌─────────────────────────────────────────────────────────────────────────┐
    // │                                                                         │
    // │                                BREADCRUMBS                              │
    // │                                                                         │
    // └─────────────────────────────────────────────────────────────────────────┘
    ?>
    <div class="h-9 mt-10 w-full">
        <?php do_shortcode('[breadcrumb colour="yellow-500"]'); ?>
    </div>

</div>

