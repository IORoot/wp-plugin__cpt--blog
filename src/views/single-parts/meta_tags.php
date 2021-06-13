<div class="font-semibold ">Tags</div>
<div class="font-thin capitalize underline">
<?php 

    if (!empty($tags)) {
        foreach ($tags as $tag) {
            echo '<a class="mr-2 hover:text-yellow-500" href="'.get_term_link($tag).'" title="'.$tag->name.'">';
            echo $tag->name;
            echo '</a>';
        }
    } else {
        echo '<div class="mr-2">No Tags</div>';
    }

?>
</div>