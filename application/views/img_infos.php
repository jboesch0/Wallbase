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
                    //console.log(res["comments"]);
                    $("#commentBox").html("");
                    id_user = res.id_user;
                    var liens = "";
                    $.each(res.comments, function(i, val){
                        //alert(val.pseudo);
                        if(id_user==val.id_user){
                    liens = "<a href='javascript:void(0)'' class='modifSupprComment' onclick='deleteComment("+val.id_comment+")'>supprimer</a><a href='javascript:void(0)'' class='modifSupprComment' onclick='inputModif("+val.id_comment+")'>modifier</a>";
                }
                        $("#commentBox").append("<pre id='"+val.id_comment+"'><table class='noteComment'><tr><td><a href='javascript:void(0)' onclick='addLike("+val.id_comment+")'><span class='glyphicon glyphicon-thumbs-up'></span><br /></a><a href='javascript:void(0)' style='color:red' onclick='removeLike("+val.id_comment+")'><span class='glyphicon glyphicon-thumbs-down'></span></a></td><td>"+val.likes+"</td><td>"+ liens+"<b>"+(val.pseudo).toUpperCase()+"</b> le "+val.date_post+"<br /><br /><span class='spanComment'>"+val.comment+"</span></td></tr></table></pre>");
                    });
                    //$("#comment").val("");
                    $("#comment").val("");

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
                                    $('<span>').attr('id', 'deco').append(res['pseudo'])
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
                        document.location.reload(true);
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

function inputModif(idComment){
    comment = $("#"+idComment+" .spanComment").html();
    //alert(comment);
    $("#"+idComment+" .spanComment").html('<textarea class="form-control text-area-comment" rows="3" id="comment" placeholder="Laisser un commentaire...">'+comment+'</textarea><input type="button" class="btn btn-default" value="valider" onclick="modifComment('+idComment+')"/>');
}

function modifComment(idComment){
    comment = $("#"+idComment+" textarea").val();
    img_id=<?php echo $_GET["img_id"];?>;
    $.ajax({
        type: "POST",
        url: "<?php base_url(); ?>" + "C_img/modifComment",
        dataType: "json",
        data: {JidComment: idComment, Jcomment: comment,Jid_wallpaper: img_id},
        success: function (res) {

            $("#commentBox").html("");
            id_user = res.id_user;
            var liens= "";
            $.each(res.comments, function(i, val){
                if(id_user==val.id_user){
                    liens = "<a href='javascript:void(0)'' class='modifSupprComment' onclick='deleteComment("+val.id_comment+")'>supprimer</a><a href='javascript:void(0)'' class='modifSupprComment' onclick='inputModif("+val.id_comment+")'>modifier</a>"
                }
                //alert(val.pseudo);
                $("#commentBox").append("<pre id='"+val.id_comment+"'><table class='noteComment'><tr><td><a href='javascript:void(0)' onclick='addLike("+val.id_comment+")'><span class='glyphicon glyphicon-thumbs-up'></span><br /></a><a href='javascript:void(0)' style='color:red' onclick='removeLike("+val.id_comment+")'><span class='glyphicon glyphicon-thumbs-down'></span></a></td><td>"+val.likes+"</td><td>"+liens+"<b>"+(val.pseudo).toUpperCase()+"</b> le "+val.date_post+"<br /><br /><span class='spanComment'>"+val.comment+"</span></td></tr></table></pre>");
            });

        }
    });

}


function deleteComment(idComment){
    //alert("lol");
    $.ajax({
        type: "POST",
        url: "<?php base_url(); ?>" + "C_img/supprComment",
        dataType: "text",
        data: {JidComment: idComment},
        success: function (res) {
            //alert(idComment);
            $("#"+idComment).remove();

        }
    });

}

function addLike(idComment){
    $.ajax({
        type: "POST",
        url: "<?php base_url(); ?>" + "C_img/addLike",
        dataType: "json",
        data: {JidComment: idComment},
        success: function (res) {
            //alert(idComment);
            $("#"+idComment+" table tr td:nth-child(2)").html(res[0]["likes"]);

        }
    });
}

function removeLike(idComment){
    $.ajax({
        type: "POST",
        url: "<?php base_url(); ?>" + "C_img/removeLike",
        dataType: "json",
        data: {JidComment: idComment},
        success: function (res) {
            //alert(idComment);
            $("#"+idComment+" table tr td:nth-child(2)").html(res[0]["likes"]);

        }
    });
}

function trierCommentaires(select){
    img_id=<?php echo $_GET["img_id"];?>;
    $.ajax({
        type: "POST",
        url: "<?php base_url(); ?>" + "C_img/trierCommentaires",
        dataType: "json",
        data: {Jselect: select, Jid_wallpaper: img_id},
        success: function (res) {

            $("#commentBox").html("");
            id_user = res.id_user;
            var liens= "";
            $.each(res.comments, function(i, val){
                if(id_user==val.id_user){
                    liens = "<a href='javascript:void(0)'' class='modifSupprComment' onclick='deleteComment("+val.id_comment+")'>supprimer</a><a href='javascript:void(0)'' class='modifSupprComment' onclick='inputModif("+val.id_comment+")'>modifier</a>"
                }
                //alert(val.pseudo);
                $("#commentBox").append("<pre id='"+val.id_comment+"'><table class='noteComment'><tr><td><a href='javascript:void(0)' onclick='addLike("+val.id_comment+")'><span class='glyphicon glyphicon-thumbs-up'></span><br /></a><a href='javascript:void(0)' style='color:red' onclick='removeLike("+val.id_comment+")'><span class='glyphicon glyphicon-thumbs-down'></span></a></td><td>"+val.likes+"</td><td>"+liens+"<b>"+(val.pseudo).toUpperCase()+"</b> le "+val.date_post+"<br /><br /><span class='spanComment'>"+val.comment+"</span></td></tr></table></pre>");
            });

        }
    });
}

    function showTags(val){
        $.ajax({
            type: "POST",
            url: "<?php base_url(); ?>" + "C_img/showTags",
            dataType: "json",
            data: {Jval: val},
            success: function (res) {

                var dataList = '';
                for(i =0; i< res.length; i++){
                    dataList += '<option  value="'+res[i].id_tag+' - '+res[i].nom+'">';
                }
                document.getElementById('assignTag').innerHTML = dataList;


            }
        });
    }

    function saveTag(){

        value = document.getElementById('searchInput').value.split(' ')[0];
        $.ajax({
            type: "POST",
            url: "<?php base_url(); ?>" + "C_img/saveTag",
            dataType: "json",
            data: {Jval: val},
            success: function (res) {



            }
        });
    }

</script>
<div class="container">
    <div class="row">
        <div id="connectedUsername"></div>
        <div class="jumbotron col-md-10">
            <span class="titre"><h2 style="display:inline"><?php echo $img_infos[0]->titre;?></h2></span><br>

            <?php
             if($img_infos[0]->idusers != $this->session->userdata['id'] ) {
            ?>
                 <a href="<?php echo base_url(); ?>index.php/HomeController/userProfil?id=<?php echo $img_infos[0]->idusers; ?>"><?php echo $img_infos[0]->pseudo;?></a>
            <?php
             }else {
             }
            ?>
          <span class="text-center"><br>
          </span><br>
            <div style="text-align: center;">

                <img src="<?php echo base_url();?>assets/wallpaper/<?php echo $img_infos[0]->titre.'.'.$img_infos[0]->extension;?>" width="500px" heigth="500px" alt="" style="margin-bottom:2%;">
            </div>
            <select name="order_comment" class="form-control order-select" onchange="trierCommentaires(this.value)">
                    <option value="likes">Top des commentaires</option>
                    <option value="date_desc" selected>Les plus vieux d'abords</option>
                    <option value="date_asc">Les plus récents d'abords</option>
            <!--<input type="text"  list="assignTag" id="inputTags" onkeyup="showTags(this.value)" list="searchByName"/><datalist id="assignTag" ></datalist>-->
                <form class="form-control">
                    <select name="selectTag">
                        <?php

                        $sql = "SELECT * FROM tag WHERE nom LIKE '%".$val."%'";
                        $res = $this->db->query($sql);
                        $res = $res->result();

                        ?>
                    </select>
                </form>
            <div id="commentBox">

                <?php
                for($i=0; $i < sizeof($comments); $i++){
                    ?>
                    <pre id="<?php echo $comments[$i]->id_comment;?>"><table class="noteComment"><tr><td><a href="javascript:void(0)" onclick="addLike(<?php echo $comments[$i]->id_comment;?>)"><span class="glyphicon glyphicon-thumbs-up"></span></a><br /><a href="javascript:void(0)" style="color:red" onclick="removeLike(<?php echo $comments[$i]->id_comment;?>)"><span class="glyphicon glyphicon-thumbs-down"></span></a></td><td><?php echo $comments[$i]->likes;?></td><td><?php if($this->session->userdata("id")==$comments[$i]->id_user){?><a href="javascript:void(0)" class="modifSupprComment" onclick="deleteComment(<?php echo $comments[$i]->id_comment;?>)">supprimer</a><a href="javascript:void(0)" class="modifSupprComment" onclick="inputModif(<?php echo $comments[$i]->id_comment;?>)">modifier</a><?php }?><b><?php echo strtoupper($comments[$i]->pseudo);?></b> le <?php echo $comments[$i]->date_post;?><br /><br /><span class='spanComment'><?php echo $comments[$i]->comment;?></span></td></tr></table></pre><?php
                }
                ?>
            </div>
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
            <input type="button" class="btn btn-default" id="submitComment" style="margin-top:2%" onclick="submitComment(<?php echo $this->input->get("img_id");?>)" value="Poster"/>
            <?php
        }
        else{
            ?>

            <a data-target="#connexion" data-toggle="modal" style="margin-top:2%" href="" class="btn btn-default">Se connecter pour commenter</a>
            <?php
        }
        ?>
    </div>


</div>
