<div class="container">
    <div class="row">
        <div id="connectedUsername"></div>
        <div>
           <?php
           foreach($tags as $key => $tag){
            echo "<h2>".$key."</h2><hr>";

            foreach($tag as $a_tag){
                ?>

                <a href="<?php echo base_url();?>index.php/SearchController/searchByTag?tag=<?php echo $a_tag->nom;?>"><?php echo $a_tag->nom;?></a>&nbsp;&nbsp;&nbsp;
                <?php
            }
            echo "<br />";
           }
           ?>

        </div>
    </div>
</div>