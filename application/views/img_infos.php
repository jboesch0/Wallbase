<script>
    function submitComment(){
        var comment= $("#comment").value;

        $.ajax({
            type: "POST",
            url: "<?php base_url(); ?>" + "C_img/postComment",
            dataType: "json",
            data: comment,
            success: function (res) {

            }
        });
    }
</script>
<div class="container">
    <div id="connectedUsername"></div>
    <div class="jumbotron">

        <div style="text-align: center;">
            <img src="<?php echo base_url();?>assets/wallpaper/<?php echo $img_infos[0]->titre;?>" width="500px" heigth="500px" alt="">
        </div>


    </div>


</div>
<div class="container">
    <div id="connectedUsername"></div>
    <div class="jumbotron">

        <h2>Poster un commentaire</h2>

        <textarea class="form-control" rows="3" id="comment"></textarea>
        <input type="button" class="btn btn-default" id="submitComment" onclick="submitComment()" value="Poster"/>
    </div>

    
</div>