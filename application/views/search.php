<div class="container col-md-10">
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
            	<a href="<?php echo base_url();?>assets/wallpaper/<?php echo $wallpapers[$i]->titre.'.'. $wallpapers[$i]->extension;?>" class="zoombox"><img src="<?php echo base_url();?>assets/wallpaper/miniatures/<?php echo $wallpapers[$i]->titre.'.'.$wallpapers[$i]->extension;?>" alt=""/></a>
                <figcaption><a href="<?php echo base_url();?>index.php/C_img?img_id=<?php echo $wallpapers[$i]->id_wallpaper;?>"><?php echo $wallpapers[$i]->titre;?></a></figcaption>
            </figure>
            	<?php
        	}
    }
    ?>
    </div>
</div>
