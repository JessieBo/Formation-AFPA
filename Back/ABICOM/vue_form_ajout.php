<h1><button id="btnRetour" class="btn btn-primary" >Retour</button><img id="logofooter" src="img/logo.png" alt="ABICOM" /><?= $titre; ?></h1>
	<fieldset>
        <form method="post" action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" name="formSaisie">
            <table class="matableFormulaire table table-bordered table-striped table-dark">
                <?php
                if(isset($_GET['idClient'])){ ?>
                     <tr>
                    <td><label for="idClient"> Numéro de Client </label></td>
                    <td><input type="text" name="idClient" id="idClient" value="<?= $_GET['idClient']; ?>" disabled /></td>
                    <input type="hidden" name="idClient" id="idClient" value="<?= $_GET['idClient']; ?>" />
                    <td></td>
                </tr>
                <?php }?>
                <tr>
                    <td><label for="rais"> Raison sociale </label></td>
                    <td><input type="text" name="rais" id="rais" value="<?php if(!empty($_POST["rais"])){echo $_POST["rais"];}?>"/></td>
                    <td class="erreurajout"><?php if(!empty($erreurs["rais"])){echo $erreurs["rais"];}?></td>
                </tr>
                <tr>
                    <td><label for="typC"> Type Client </label></td>
                    <td><select name="typC" id="typC">
                        <option value="Public" <?php if (!empty($_POST["typC"])&&$_POST["typC"]=="Public") {
                                                            echo " selected";
                                                    } else {
                                                            echo " ";
                                                    } ?>>Public</option>
                        <option value="Privé" <?php if (!empty($_POST["typC"])&&$_POST["typC"]=="Privé") {
                                                            echo " selected";
                                                    } else {
                                                            echo " ";
                                                    } ?>>Privé</option>
                        </select>
                    </td>
                    <td class="erreurajout"><?php if(!empty($erreurs["typC"])){echo $erreurs["typC"];}?></td>
                </tr>
                <tr>
                    <td><label for="tel"> Téléphone Client </label></td>
                    <td><input type="text" name="tel" id="tel" value="<?php if(!empty($_POST["tel"])){echo $_POST["tel"];}?>"/></td>
                    <td class="erreurajout"><?php if(!empty($erreurs["tel"])){echo $erreurs["tel"];}?></td>
                </tr>
                <tr>
                    <td><label for="adrclient"> Adresse Client </label></td>
                    <td><input type="text" name="adrclient" id="adrclient" value="<?php if(!empty($_POST["adrclient"])){echo $_POST["adrclient"];}?>" placeholder="25 Rue des Allouettes"/></td>
                    <td class="erreurajout"><?php if(!empty($erreurs["adrclient"])){echo $erreurs["adrclient"];}?></td>
                </tr>
                <tr>
                    <td><label for="ville"> Ville </label></td>
                    <td><input type="text" name="ville" id="ville" value="<?php if(!empty($_POST["ville"])){echo $_POST["ville"];}?>" /></td>
                    <td class="erreurajout"><?php if(!empty($erreurs["ville"])){echo $erreurs["ville"];}?></td>
                </tr>
                <tr>
                    <td><label for="codep"> Code Postale </label></td>
                    <td><input type="text" name="codep" id="codep" value="<?php if(!empty($_POST["codep"])){echo $_POST["codep"];}?>" /></td>
                    <td class="erreurajout"><?php if(!empty($erreurs["codep"])){echo $erreurs["codep"];}?></td>
                </tr>
                <tr>
                    <td><label for="activite"> Activité </label></td>
                    <td><select name="activite" id="activite">
                        <?php
                            $reponse = $connexion->query("SELECT * FROM secteuractivite");
                            while ($activite = $reponse->fetch()) { ?>
                                <option value="<?php 
                                if(isset($_POST["activite"])){
                                    if($_POST["activite"]===$activite['idSect'])
                                    { 
                                        echo $activite['idSect'].'"'." selected ";
                                    }else{
                                        echo $activite['idSect'];

                                    } ?>"><?php echo $activite['activite']; 
                                }else{
                                    echo $activite['idSect'];

                                ?>"><?php echo $activite['activite'];

                                }?>
                                </option>	
                        <?php } ?>
                        </select>
                    </td>
                    <td class="erreurajout"><?php if(!empty($erreurs["activite"])){echo $erreurs["activite"];}?></td>
                </tr>
                <tr>
                    <td><label for="nature"> Nature </label></td>
                    <td><select name="nature" id="nature">
                            <option value="Principale" <?php if (!empty($_POST["nature"])&&$_POST["nature"]=="Principale") {
                                                            echo " selected";
                                                    } else {
                                                            echo " ";
                                                    } ?>>Principale</option>
                            <option value="Secondaire" <?php if (!empty($_POST["nature"])&&$_POST["nature"]=="Secondaire") {
                                                            echo " selected";
                                                    } else {
                                                            echo " ";
                                                    } ?>>Secondaire</option>
                            <option value="Ancienne"  <?php if (!empty($_POST["nature"])&&$_POST["nature"]=="Ancienne") {
                                                            echo " selected";
                                                    } else {
                                                            echo " ";
                                                    } ?>>Ancienne</option>
                        </select>
                    </td>
                    <td class="erreurajout"><?php if(!empty($erreurs["nature"])){echo $erreurs["nature"];}?></td>
                </tr>
                <tr>
                    <td><label for="ca"> CA </label></td>
                    <td><input type="text" name="ca" id="ca" value="<?php if(!empty($_POST["ca"])){echo $_POST["ca"];}?>"/></td>
                    <td class="erreurajout"><?php if(!empty($erreurs["ca"])){echo $erreurs["ca"];}?></td>
                </tr>
                <tr>
                    <td><label for="effec"> Effectif </label></td>
                    <td><input type="text" name="effec" id="effec" value="<?php if(!empty($_POST["effec"])){echo $_POST["effec"];}?>"/></td>
                    <td class="erreurajout"><?php if(!empty($erreurs["effec"])){echo $erreurs["effec"];}?></td>
                </tr>
                <tr>
                    <td><label for="comment"> Commentaires Commerciaux </label></td>
                    <td><textarea name="comment" id="comment" value="" rows="5" cols="60"><?php if(!empty($_POST["comment"])){echo $_POST["comment"];}?></textarea></td>
                    <td class="erreurajout"><?php if(!empty($erreurs["comment"])){echo $erreurs["comment"];}?></td>
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