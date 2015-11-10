<div class="container tags">
    <div class="jumbotron">
        <?php
        for($i=0; $i< sizeof($tags); $i++){
        ?>
            <a href="<?php echo base_url();?>index.php/SearchController/searchByTag?tag=<?php echo $tags[$i]->nom;?>">-<?php echo $tags[$i]->nom;?></a><br /><?php
        }
            

        ?>
    </div>
</div>