<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>">Wallbase</a>

            <div id="recherche" class="navbar-brand">
                <form method="post" action="<?php echo base_url() ?>index.php/SearchController/recherche">
                    <input type="text" placeholder="Recherche..." class="form-control" name="recherche" id="searchInput" onkeyup=""/>
                    <!--<input type="submit" value="Rechercher" class="btn btn-default" />-->
                </form>
            </div>

        </div>
        <div id="navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav navbar-right" id="right-nav">
                <?php
                if($logged) {
                    ?>
                    <li><a href="<?php echo base_url(); ?>index.php/DropzoneController">Upload</a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/UserController"><?php echo $pseudo ?></a></li>
                    <li><a href="<?php echo base_url(); ?>index.php/HomeController/logout">Deconnexion</a></li>

                    <?php
                } else {
                    ?>
                    <li><a href="" data-toggle="modal" data-target="#connexion" id="navConnexion">Connexion</a></li>
                    <li><a href="" data-toggle="modal" data-target="#inscription" id="navInscription">Inscription</a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
