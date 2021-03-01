<h1><button id="btnRetour" class="btn btn-primary" >Retour</button><img src="img/logo.png" alt="ABICOM"/>Modification du Client</h1>
    <fieldset>
    
        <form method="post" action="<?php echo $_SERVER['SCRIPT_NAME']."?idClient=".$idClient; ?>" name="formSaisie">
            <table class="matableFormulaire table table-bordered table-striped table-dark">
                <tr>
                    <td><label for="idClient"> Numéro de Client </label></td>
                    <td><input type="text" name="idClient" id="idClient" value="<?= htmlspecialchars($donnees['idClient']); ?>" disabled /></td>
                    <input type="hidden" name="idClient" id="idClient" value="<?= htmlspecialchars($donnees['idClient']); ?>" />
                </tr>
                <tr>
                    <td><label for="rais"> Raison sociale </label></td>
                    <td><input type="text" name="rais" id="rais" value="<?= $donnees['raisonSociale']; ?>" /></td>
                </tr>
                <tr>
                    <td><label for="typC"> Type Client </label></td>
                    <td><select name="typC" id="typC">
                            <option value="Public" <?php if ($donnees['typeClient'] == "Public") {
                                                        echo "selected";
                                                    } else {
                                                        echo " ";
                                                    } ?>>Public</option>
                            <option value="Privé" <?php if ($donnees['typeClient'] == "Privé") {
                                                        echo "selected";
                                                    } else {
                                                        echo " ";
                                                    } ?>>Privé</option>
                        </select></td>
                </tr>
                <tr>
                    <td><label for="tel"> Téléphone Client </label></td>
                    <td><input type="text" name="tel" id="tel" value="<?= htmlspecialchars($donnees['telephoneClient']); ?>" /></td>
                </tr>
                <tr>
                    <td><label for="numRue"> Adresse Client </label></td>
                    <td><input type="text" name="adrclient" id="adrclient" value="<?= $donnees['adresseClient']; ?>" /></td>
                </tr>
                <tr>
                    <td><label for="ville"> Ville </label></td>
                    <td><input type="text" name="ville" id="ville" value="<?= $donnees['villeClient']; ?>" /></td>
                </tr>
                <tr>
                    <td><label for="codep"> Code Postale </label></td>
                    <td><input type="text" name="codep" id="codep" value="<?= htmlspecialchars($donnees['codePostalClient']); ?>" /></td>
                </tr>
                <tr>
                    <td><label for="activite"> Activité </label></td>
                    <td><select name="activite" id="activite">
                            <?php
                            $reponse = $connexion->query('SELECT * FROM secteuractivite');

                            while ($activite = $reponse->fetch()) {
                            ?>
                                <option value="<?php echo $activite['idSect']; ?>" <?php if ($donnees['idSect'] == $activite['idSect']) {
                                                                                        echo "selected";
                                                                                    } else {
                                                                                        echo "";
                                                                                    } ?>> <?php echo $activite['activite']; ?></option>
                            <?php
                            }

                            ?>
                        </select></td>
                </tr>
                <tr>
                    <td><label for="nature"> Nature </label></td>
                    <td><select name="nature" id="nature">
                            <option value="Principale" <?php if ($donnees['natureClient'] == "Principale") {
                                                            echo " selected";
                                                        } else {
                                                            echo " ";
                                                        } ?>>Principale</option>
                            <option value="Secondaire" <?php if ($donnees['natureClient'] == "Secondaire") {
                                                            echo " selected";
                                                        } else {
                                                            echo " ";
                                                        } ?>>Secondaire</option>
                            <option value="Ancienne" <?php if ($donnees['natureClient'] == "Ancienne") {
                                                            echo " selected";
                                                        } else {
                                                            echo " ";
                                                        } ?>>Ancienne</option>
                        </select></td>
                </tr>
                <tr>
                    <td><label for="ca"> CA </label></td>
                    <td><input type="text" name="ca" id="ca" value="<?= $donnees['CA']; ?>" /></td>
                </tr>
                <tr>
                    <td><label for="effec"> Effectif </label></td>
                    <td><input type="text" name="effec" id="effec" value="<?= $donnees['effectif']; ?>" /></td>
                </tr>

                <tr>
                    <td><label for="comment"> Commentaires Commerciaux </label></td>
                    <td><textarea name="comment" id="comment" rows="5" cols="60"><?= $donnees['commentaireClient']; ?></textarea></td>
                </tr>

                <tr>
                    <td><input class="btn btn-primary" type="submit" name="btnSubmit" value="Valider"></td>
                    <td><input class="btn btn-primary" type="reset" value="Annuler"></td>
                </tr>
            </table>
        </form>
    </fieldset>
    <footer>
		<section id="bottombar">
			<article>
				<h2><img id="logofooter" src="img/logo.png" alt="ABICOM" />ABI.COM</h2>	
			</article>
			<article>
				<h2>Qui sommes-nous ?</h2>
				<ul>
                    <li>Rejoignez-nous</li>
                    <li>Actualité</li>
                    <li>Contact</li>
				</ul>
			</article>
		</section>
    </footer>