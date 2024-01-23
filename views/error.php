<div class="container">
    <div class="bodyConnexion">
        <div class="d-flex justify-content-center">
            <div class="fontChoice">
                <h4>CONNEXION</h4>
            </div>
        </div>
        <div class="bodyBackground">
            <form>
                <div class="form-group customInput">
                    <label for="username">Nom d'utilisateur ou E-mail :</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group customInput">
                    <label for="password">Mot de passe :</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="inscription">
                    <a class="link-light" href="/inscription">
                        Vous n'avez pas de compte ? S'inscrire ici
                    </a>
                </div>
                <div class="form-group boutton d-flex justify-content-end mt-2 customButton">
                    <form action="./home" method="get">
                        <button type="submit">Se connecter</button>
                    </form>
                </div>
            </form>
        </div>
    </div>
</div>
