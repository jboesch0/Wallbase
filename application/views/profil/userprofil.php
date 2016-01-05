<div class="container">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <div class="profile-userpic">
                    <img src="<?php echo base_url() ?>assets/avatar/<?php echo $avatar ?>" class="img-corners" alt="">
                </div>

                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        <?php
                         echo $infos->pseudo;
                        ?>
                    </div>
                </div>

                <div class="profile-userbuttons">
                  <div class="" id="followed">

                  <?php
                    if ($follow) {
                  ?>
                      <strong>Abonné</strong>
                  <?php
                    } else {
                  ?>
                  <form class="" method="post">
                    <input type="hidden" name="hiddenId" value="<?php echo $infos->idusers; ?>" id="hiddenId">
                    <button type="button" class="btn btn-success btn-sm" value="" id="btn-follow">Follow</button>
                  </form>
                  <?php
                    }
                  ?>
                  </div>
                </div>

                <div class="profile-usermenu">
                    <ul class="nav" id="nav">
                        <li class="active"><a href="#photos" data-toggle="tab"><i class="glyphicon glyphicon-camera"></i>Photos</a></li>
                    </ul>
                    <ul class="list-group"> <br>
                      <li class="list-group-item"><?php echo $infos->nom; ?></li>
                      <li class="list-group-item"><?php echo $infos->prenom; ?></li>
                      <li class="list-group-item"><?php echo $infos->email; ?></li>
                      <li class="list-group-item">Followers <span class="badge"><?php echo $countFollowers; ?></span></li>
                      <li class="list-group-item">Photos <span class="badge"></span></li>
                  </ul><br>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="photos">
                <h2>Photos de <?= $infos->pseudo; ?></h2>
                <hr>
                <div class="row">

                  <div class="col-md-8">
                    <h3>Voir toutes les photos de <?php echo $infos->pseudo; ?></h3><br>
                      <a href="<?php echo base_url(); ?>index.php/UserController/photosFromUser?id=<?php echo $infos->idusers; ?>" class="btn btn-block btn-primary">Photos</a>

                  </div>

                </div>
            </div>

        </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function () {

        $("#btn-follow").click(function () {
            var id = $("#hiddenId").val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url();?>"+ "index.php/UserController/follow",
                dataType: "JSON",
                data: {Jid: id},
                success: function (res) {
                    if (res) {
                        $('#btn-follow').hide();
                        $('#followed').append("<strong>Abonné</strong>");

                    }
                }
            });
        });
    });
</script>
<br>
<br>
