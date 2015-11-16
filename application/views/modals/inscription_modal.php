<div class="modal fade" id="inscription" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Inscription</h4>
            </div>
            <div class="modal-body">
                <p>
                <form id="signupform" class="form-horizontal" role="form">

                    <div id="signupalert" style="display:none" class="alert alert-danger">
                        <p>Error:</p>
                        <span></span>
                    </div>


                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-md-3 control-label">Pseudo</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="pseudo" placeholder="Pseudo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="col-md-3 control-label">Nom</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="nom" placeholder="Nom">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-md-3 control-label">Prenom</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="prenom" placeholder="Prenom">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Mot de passe</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" id="mdp" placeholder="Mot de passe">
                        </div>
                    </div>

                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-md-offset-3 col-md-9">
                            <button id="btn-inscription" type="button" class="btn btn-success"><i class="icon-hand-right"></i>S'inscrire</button>
                        </div>
                    </div>
                </form>
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

