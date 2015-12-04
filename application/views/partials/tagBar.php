<div class="container tags col-md-2">
    <div class="jumbotron">
        <?php
        for($i=0; $i< sizeof($tags); $i++){
        ?>
            <a href="<?php echo base_url();?>index.php/SearchController/searchByTag?tag=<?php echo $tags[$i]->nom;?>">-<?php echo $tags[$i]->nom;?></a><br /><?php
        }
        ?>

        <a href="<?php echo base_url();?>index.php/SearchController/allTags">-tous les tags</a>
    </div>
</div>
