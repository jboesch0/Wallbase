<script>
    function submitComment(num_img){
        var comment= $("#comment").val();
        //alert(comment);

            $.ajax({
                type: "POST",
                url: "<?php base_url(); ?>" + "C_img/postComment",
                dataType: "json",
                data: {Jcomment: comment,Jimg: num_img},
                success: function (res) {
                    console.log("lol");
                    //$("#comment").val("");
                    if(res){
                        $("#comment").val("");
                    }

                }
            });
    }

    $(document).ready(function () {
        $("#btn-login").click(function () {
            $('#connexion').modal('hide');
            var username = $("#login-username").val();
            var password = $("#login-password").val();
            $.ajax({
                type: "POST",
                url: "<?php base_url(); ?>" + "HomeController/login",
                dataType: "json",
                data: {Jname: username, Jpassword: password},
                success: function (res) {
                    if (res) {
                        $('#navConnexion').hide();
                        $('#right-nav').append(
                            $('<li>').append(
                                $('<a>').attr('href', '<?php echo base_url() ?>index.php/UserController').append(
                                    $('<span>').attr('id', 'deco').append(res['username'])
                                )));
                        $('#right-nav').append(
                            $('<li>').append(
                                $('<a>').attr('href', '<?php echo base_url(); ?>index.php/HomeController/logout').append(
                                    $('<span>').attr('id', 'deco').append("Deconnexion")
                                )));
                        var html = '<div class="alert alert-success alert-dismissable page-alert">';
                        html += '<button type="button" class="close"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>';
                        html += 'Bonjour ' + res['username'] + ', vous êtes maintenant connecté';
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
</script>
<div class="container">
    <div class="row">
        <div id="connectedUsername"></div>
        <div class="jumbotron col-md-10">
            <h2><?php echo $img_infos[0]->titre;?></h2>
            <div style="text-align: center;">

                <img src="<?php echo base_url();?>assets/wallpaper/<?php echo $img_infos[0]->titre.'.'.$img_infos[0]->extension;?>" width="500px" heigth="500px" alt="" style="margin-bottom:2%;">
            </div>

            <?php
            for($i=0; $i < sizeof($comments); $i++){
                ?>
                <pre><b><?php echo strtoupper($comments[$i]->username);?></b> le <?php echo $comments[$i]->date_post;?><br /><br /><?php echo $comments[$i]->comment;?></pre><?php
            }
            ?>
        </div>
    </div>


</div>
<div class="container">
    <div id="connectedUsername"></div>
    <div class="jumbotron">

        <h2>Poster un commentaire</h2>

        <textarea class="form-control text-area-comment" rows="3" id="comment" placeholder="Laisser un commentaire..."></textarea>
        <?php
        if($logged){
            ?>
            <input type="button" class="btn btn-default" id="submitComment" onclick="submitComment(<?php echo $this->input->get("img_id");?>)" value="Poster"/>
            <?php
        }
        else{
            ?>
            
            <a data-target="#connexion" data-toggle="modal" href="" class="btn btn-default">Se connecter pour commenter</a>
            <?php
        }
        ?>
    </div>

    
</div>