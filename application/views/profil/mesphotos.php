<div class="container">
  <h1>Mon album photo</h1><hr>

  <div class="row">

    <?php
        $num = 1;
        $breaker = 4; //How many cols inside a row?

        foreach($UserImgs as $i) {
            if ($num == 1){
              echo '<div class="row"></br>';
            }
    ?>
              <div class="col-md-3">
                <img src="<?php echo base_url();?>assets/wallpaper/miniatures/<?php echo $i->titre;?>" id="test"/>
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