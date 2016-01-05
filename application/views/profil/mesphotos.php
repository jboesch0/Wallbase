<div class="container">
  <h1>Mon album photo</h1><hr>

  <div class="row">

    <?php
        $num = 1;
        $breaker = 4;

        foreach($UserImgs as $i) {
            if ($num == 1){
              echo '<div class="row"></br>';
            }
    ?>
              <div class="col-md-3">
                <figure>
                  <a href="<?php echo base_url();?>assets/wallpaper/<?php echo $i->titre.'.'.$i->extension;?>" class="zoombox"><img src="<?php echo base_url();?>assets/wallpaper/miniatures/<?php echo $i->titre.".".$i->extension;?>"/>
                <figcaption><a href="<?php echo base_url();?>index.php/C_img?img_id=<?php echo $i->id_wallpaper;?>"><?php echo $i->titre;?></a></figcaption>
                </figure>
              </div>

    <?php
            $num++;
            if ($num > $breaker){
    ?>
              </div>
    <?php
      $num = 1;
            }
        }
    ?>

  </div>
</div>
