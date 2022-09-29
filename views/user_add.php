<?php include __ROOT__."/views/header.html"; ?>

<form action="/AddUserController.php" method="POST">
                <div class="form-field">
                    <label class="#">Nom</label>
                    <input type="text" class="text-field" name="nom" placeholder="Nom" required>
                </div>
                <div class="form-field">
                    <label class="#">Prénom</label>
                    <input type="text" class="text-field" name="prenom" placeholder="Prénom" required>
                </div>
                <div class="form-field">
                    <label class="#">Adresse mail</label>
                    <input type="email" class="text-field" name="email" placeholder="Adresse mail" required>
                </div>
                <div class="form-field">
                    <label class="#">Mot de passe</label>
                    <input type="password" class="text-field" name="mdp" placeholder="Mot de passe"
                        pattern="(?=.\d)(?=.[a-z])(?=.*[A-Z]).{8,}"
                        title="Doit contenir au moins un chiffre, une lettre majuscule, une lettre minuscule et au moins 8 caractères"
                        required>
                </div>
                <div class="form-field">
                    <label class="#">Date de naissance</label><br>
                    <input type="date" name="dateDeNaissance" id="date-field" required>
                </div>
                <div class="form-field">
                    <label class="#">Sexe</label><br>
                    <input type="radio" class="#" id="h" name="sexe">
                    <label for="h">Masculin</label>
                    <input type="radio" class="#" id="f" name="sexe">
                    <label for="f">Féminin</label>
                    <input type="radio" class="#" id="a" name="sexe">
                    <label for="a">Autre</label>
                </div>
                <div class="form-field">
                    <label class="#">Taille (cm)</label>
                    <input type="range" id="#" min="0" name="taille" max="250" oninput="this.nextElementSibling.value = this.value">
                    <output class="#">150</output>
                </div>
                <div class="form-field">
                    <label class="#">Poids (kg)</label>
                    <input type="range" name="poids" id="#" min="0" max="250" oninput="this.nextElementSibling.value = this.value">
                    <output class="#">60</output>
                </div>
                <input type="submit" class="btn-basic" value="Ok">
            </form>

<?php include __ROOT__."/views/footer.html"; ?>


