<div class="container">
    <div id="connectedUsername"></div>
    <div class="jumbotron">
        <h3>Recherche avec "<?php echo $recherche;?>"</h3>
    	<?php 
        /*var_dump($wallpapers[0]->titre);
        exit;*/
    	if(isset($wallpapers)){
    		for($i=0; $i< sizeof($wallpapers); $i++){
            ?>
            <figure>
            	<a href="<?php echo base_url();?>assets/wallpaper/<?php echo $wallpapers[$i]->titre;?>" class="zoombox"><img src="<?php echo base_url();?>assets/wallpaper/miniatures/<?php echo $wallpapers[$i]->titre;?>" alt=""/></a>
                <figcaption><?php echo $wallpapers[$i]->titre;?></figcaption>
            </figure>
            	<?php
        	}
    }
    ?>
    </div>
</div>