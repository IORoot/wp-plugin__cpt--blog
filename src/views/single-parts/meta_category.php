<div class="font-semibold ">Category</div>
<div class="font-thin capitalize underline">
    <?php 
    if (!empty($category)) {
        echo '<a class="hover:text-Amber500" href="'.get_term_link($category[0]).'" title="'.$category[0]->name.'">';
        echo $category[0]->name;
        echo '</a>';
    } else {
        echo '<div class="mr-2">Uncategorised</div>';
    }
    ?>
</div>