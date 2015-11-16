<div class="container">
    <div id="connectedUsername"></div>
    <div id="registered"></div>
    <div class="jumbotron">
        <h1>Bienvenue sur Wallbase</h1>
        <p>
            Wallbase est de site de partage ou il est possible de visioner les plus belles images ou photos
        </p>
    </div>
    <h2>Dèrnières images</h2><br>
    <div class="row">
        <?php
            $num = 1;
            $breaker = 4; //How many cols inside a row?

            foreach($wallpapers as $w) {
                if ($num == 1){
                  echo '<div class="row"></br>';
                }
        ?>
                  <div class="col-md-3">
                    <img src="<?php echo base_url();?>assets/wallpaper/miniatures/<?php echo $w->titre;?>" id="test"/>
                  </div>

        <?php
<<<<<<< Updated upstream
=======
<<<<<<< HEAD
                $num++;
                if ($num > $breaker){
        ?>
                  </div>
        <?php
          $num = 1;
                }
            }
=======
>>>>>>> Stashed changes
         for($i=0; $i< sizeof($wallpapers); $i++){
            ?>
            <figure>
            <a href="<?php echo base_url();?>assets/wallpaper/<?php echo $wallpapers[$i]->titre;?>" class="zoombox"><img src="<?php echo base_url();?>assets/wallpaper/miniatures/<?php echo $wallpapers[$i]->titre;?>" alt="" /></a>
            <figcaption><?php echo $wallpapers[$i]->titre;?></figcaption>
            </figure><?php
        }
        

<<<<<<< Updated upstream
=======
>>>>>>> origin/master
>>>>>>> Stashed changes
        ?>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $("#btn-login").click(function () {
            $('#connexion').modal('hide');
            var pseudo = $("#login-username").val();
            var password = $("#login-password").val();
            $.ajax({
                type: "POST",
                url: "<?php base_url(); ?>" + "index.php/HomeController/login",
                dataType: "json",
                data: {Jname: pseudo, Jpassword: password},
                success: function (res) {
                    if (res) {
                        $('#navConnexion').hide();
                        $('#navInscription').hide();
                        $('#right-nav').append(
                            $('<li>').append(
                                $('<a>').attr('href', '<?php echo base_url() ?>index.php/DropzoneController').append(
                                    $('<span>').attr('id', 'upload').append("Upload")
                                )));
                        $('#right-nav').append(
                            $('<li>').append(
                                $('<a>').attr('href', '<?php echo base_url() ?>index.php/UserController').append(
                                    $('<span>').attr('id', 'username').append(res['pseudo'])
                                )));
                        $('#right-nav').append(
                            $('<li>').append(
                                $('<a>').attr('href', '<?php echo base_url(); ?>index.php/HomeController/logout').append(
                                    $('<span>').attr('id', 'deco').append("Deconnexion")
                                )));
                        var html = '<div class="alert alert-success alert-dismissable page-alert">';
                        html += '<button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>';
                        html += 'Bonjour ' + res['pseudo'] + ', vous êtes maintenant connecté';
                        html += '</div>';
                        $(html).hide().prependTo('#connectedUsername').slideDown();
                        $('.page-alert .close').click(function (e) {
                            e.preventDefault();
                            $(this).closest('.page-alert').slideUp();
                        });
                    }
                }
            });
        });

        //Creation d'un nouvel utilisateur
        $('#btn-inscription').click(function(){
            $('#inscription').modal('hide');

            var email = $('#email').val();
            var nom = $('#nom').val();
            var prenom = $('#prenom').val();
            var mdp = $('#mdp').val();
            var pseudo = $('#pseudo').val();
            $.ajax({
                type: "POST",
                url: "<?php base_url(); ?>" + "index.php/HomeController/register",
                dataType: "json",
                data: {Jemail: email, Jnom: nom, Jprenom: prenom, Jmdp: mdp, Jpseudo:pseudo},
                success: function (res) {
                    if (res) {
                        $('#navInscription').hide();
                        var html = '<div class="alert alert-success alert-dismissable page-alert">';
                        html += '<button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>';
                        html += 'Félicitation ' + res['pseudo'] + ', Inscription réussie !';
                        html += '</div>';
                        $(html).hide().prependTo('#connectedUsername').slideDown();
                        $('.page-alert .close').click(function (e) {
                            e.preventDefault();
                            $(this).closest('.page-alert').slideUp();
                        });

                    }
                }
            });
        });
    });

<<<<<<< Updated upstream
=======
<<<<<<< HEAD
</script>
=======
>>>>>>> Stashed changes


function keyWord(word){
    $.ajax({
        type: "POST",
        url: "<?php base_url();?>"+ "index.php/HomeController/keyWord",
        dataType: "json",
        data: word,
        success: function(res){
            if(res){
                /*$("#searchInput").append("div");
                res.each(function(index){
                    $("#searchInput div").append("<span class='options'>"+res[index]+"</span>");
                });*/
                
            }
        }
    })
}
<<<<<<< Updated upstream
</script>
=======
</script>
>>>>>>> origin/master
>>>>>>> Stashed changes
