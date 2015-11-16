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
                    <button type="button" class="btn btn-success btn-sm">Follow</button>
                    <button type="button" class="btn btn-danger btn-sm">Message</button>
                </div>

                <div class="profile-usermenu">
                    <ul class="nav" id="nav">
                        <li class="active"><a href="#home" data-toggle="tab"><i class="glyphicon glyphicon-user"></i>Mon profil</a></li>
                        <li><a href="#about" data-toggle="tab"><i class="glyphicon glyphicon-camera"></i>Mes photos</a></li>
                        <li><a href="#contact" data-toggle="tab"><i class="glyphicon glyphicon-envelope"></i>Mes messages <span class="badge">5</span></a></li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="home">
                <h2>Informations de mon profil</h2>
                <hr>
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 personal-info">

                            <form method="post" action="<?php echo base_url() ?>index.php/UserController/setAvatar" class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Avatar:</label>
                                    <div class="col-lg-8">
                                        <input name="avatar" id="avatar" type="file" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-8">
                                        <input id="btn-upload" type="submit" class="btn btn-primary" value="Upload">
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <form class="form-horizontal" role="form">

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Pseudo:</label>
                                    <div class="col-lg-8">
                                        <input id="pseudo" class="form-control" type="text" value="<?php echo $infos->pseudo; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Nom:</label>
                                    <div class="col-lg-8">
                                        <input id="nom" class="form-control" type="text" value="<?php echo $infos->nom; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Prénom:</label>
                                    <div class="col-lg-8">
                                        <input id="prenom" class="form-control" type="text" value="<?php echo $infos->prenom; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Email:</label>
                                    <div class="col-md-8">
                                        <input id="email" class="form-control" type="text" value="<?php echo $infos->email; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Mot de passe:</label>
                                    <div class="col-md-8">
                                        <input id="mdp" class="form-control" type="password" value="<?php echo $infos->mdp; ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label"></label>
                                    <div class="col-md-8">
                                        <input id="btn-modifier" type="button" class="btn btn-primary" value="Modifier">
                                        <span></span>
                                        <input type="reset" class="btn btn-default" value="Cancel">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
            </div>
            <div class="tab-pane" id="about">
                <h2>Mes photos</h2>
                <hr>
                <div class="row">
                  <div class="col-md-4">
                    <h3>Ajouter une photo</h3><br>
                    <form action="<?php echo base_url() ?>index.php/DropzoneController">
                      <input class="btn btn-block btn-primary" type="submit" value="Upload">
                    </form>
                  </div>
                  <div class="col-md-4">
                    <h3>Voir toutes mes photos</h3><br>
                    <form action="<?php echo base_url() ?>index.php/UserController/mesPhotos">
                      <input class="btn btn-block btn-primary" type="submit" value="Mon album">
                    </form>
                  </div>

                </div>
            </div>
            <div class="tab-pane" id="contact">
                <h2>Mes messages</h2>
                <hr>
            </div>
        </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function () {
        $("#btn-modifier").click(function () {
            var pseudo = $("#pseudo").val();
            var email = $('#email').val();
            var nom = $('#nom').val();
            var prenom = $('#prenom').val();
            var mdp = $('#mdp').val();
            var avatar = $('#avatar').val();

            $.ajax({
                type: "POST",
                url: "<?php base_url(); ?>" + "UserController/update",
                dataType: "json",
                data: {Jpseudo: pseudo, Jemail: email, Jnom: nom, Jprenom: prenom, Jmdp: mdp, Javatar: avatar},
                success: function (res) {
                    if (res) {
                        alert("Success");
                    }
                }
            });
        });
    });
</script>
<br>
<br>
