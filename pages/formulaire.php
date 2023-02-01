<h1 class="titre">Recapitulatif</h1>
<p id="recap">
<?php
if(isset($_POST['submit_form'])){
    extract($_POST,EXTR_OVERWRITE);
    if(!empty($nom)){
        print "<br>Nom : ".$nom;
    } else {
        $erreur1 = "Nom manquant";
    }
}
if(isset($_POST['submit_form'])){
    extract($_POST,EXTR_OVERWRITE);
    if(!empty($mdp)){
        print "<br>Mot de Passe : ".$mdp;
    } else {
        $erreur2 = "Mot de passe manquant";
    }
}
if(isset($_POST['submit_form'])){
    extract($_POST,EXTR_OVERWRITE);
    if(!empty($email)){
        print "<br>Email : ".$email;
    } else {
        $erreur3 = "Email manquant";
    }
}
$consoles = array('Switch','PC','Xbox','Playstation', 'Android');
$source = array('Youtube','Discord');
if(!empty($email) && !empty($mdp) && !empty($nom) ){
    $consoles = array('Switch','PC','Xbox','Playstation', 'Android');
    $source = array('Youtube','Discord');
    @$nom = $_POST['nom'];
    @$prenom = $_POST['prenom'];
    @$email = $_POST['email'];
    @$age = $_POST['age'];
    @$mdp = $_POST['mdp'];
    @$sexe = $_POST['sexe'];
    @$langue = $_POST['langue'];
    @$jeux1 = $_POST['csgo'];
    @$jeux2 = $_POST['mc'];
    @$jeux3 = $_POST['lol'];
    @$jeux4 = $_POST['cod'];
    @$jeux5 = $_POST['aoe'];
    @$sourcee = $_POST['source'];
    @$explication = $_POST['explication'];
    $image = $_POST['pdp'];
    if(isset($_FILES['pdp'])){
        $tmpName = $_FILES['pdp']['tmp_name'];
        $name = $_FILES['pdp']['name'];
        $size = $_FILES['pdp']['size'];
        $error = $_FILES['pdp']['error'];
    }
    @$tmpName = $_FILES['pdp']['tmp_name'];
    @$name = $_FILES['pdp']['name'];
    @$size = $_FILES['pdp']['size'];
    @$error = $_FILES['pdp']['error'];
    move_uploaded_file($tmpName, './images/'.$name);

        print "<br>Prenom : ".$prenom;
        print "<br>Mot de passe : ".$mdp;
        print "<br>Age : ".$age;
        print "<br>Sexe : ".$sexe;
        print "<br>Langue : ".$langue;
        print "<br>Source : ".$sourcee;
        print "<br>liste des plateforme sélectionnés : <br> ";
        foreach(@$_POST['plateforme'] as $valeurp) {
            echo $valeurp ."<br>";
     }
        print "<br>liste des jeux sélectionnés : <br> ";
        if (isset($jeux1)) {
            print "<br>" . $jeux1;
        }
    if (isset($jeux2)) {
        print "<br>" . $jeux2;
    }
    if (isset($jeux3)) {
        print "<br>" . $jeux3;
    }
    if (isset($jeux4)) {
        print "<br>" . $jeux4;
    }
    if (isset($jeux5)) {
        print "<br>" . $jeux5;
    }
        print "<br>liste des consoles sélectionnés : <br> ";
        if(isset($_POST['console'])){
            foreach($_POST['console'] as $valeurc){
                echo $valeurc ."<br>";
            }
        }
        print "<br>Explication : ".$explication;
        print "<br>Votre photo :";
        print '<img id="pdpuser" src="./images/'.$name.'" alt="photo indisponible"  />';

        print "<br>";
        }
if (isset($_POST['submit_form'])) {
    echo "Coucou";
    $xml = new DOMDocument();
    $xml->load('./lib/XML/utilisateurs.xml');


    $utilisateurs = $xml->createElement('utilisateurs');
    $utilisateur = $xml->createElement('utilisateur');
    $nom2 = $xml->createElement('Nom', $nom);
    $prenom2 = $xml->createElement('Prenom', $prenom);
    $mdp2 = $xml->createElement('MotdePasse', $mdp);
    $email2 = $xml->createElement('Email', $email);
    $age2 = $xml->createElement('Age', $age);
    $sexe2 = $xml->createElement('Sexe', $sexe);
    $langue2 = $xml->createElement('Langue', $langue);
    $games = $xml->createElement('Jeux');
    if (isset($jeux1)) {
        $game1 = $xml->createElement('Jeu', $jeux1);
        }
    if (isset($jeux2)) {
        $game2 = $xml->createElement('Jeu', $jeux2);
        }
    if (isset($jeux3)) {
        $game3 = $xml->createElement('Jeu', $jeux3);

        }
    if (isset($jeux4)) {
        $game4 = $xml->createElement('Jeu', $jeux4);

        }
    if (isset($jeux5)) {
        $game5 = $xml->createElement('Jeu', $jeux5);

        }
    $explain = $xml->createElement('Explications', $explication);
    $picture = $xml->createElement('Images', $image);

    $xml->appendChild($utilisateurs);
    $utilisateurs->appendChild($utilisateur);
    $utilisateur->appendChild($nom2);
    $utilisateur->appendChild($prenom2);
    $utilisateur->appendChild($mdp2);
    $utilisateur->appendChild($email2);
    $utilisateur->appendChild($age2);
    $utilisateur->appendChild($sexe2);
    $utilisateur->appendChild($langue2);
    $utilisateur->appendChild($games);
    if (isset($game1)) {
        $games->appendChild($game1);
        }
    if (isset($game2)) {
        $games->appendChild($game2);
    }
    if (isset($game3)) {
        $games->appendChild($game3);
    }
    if (isset($game4)) {
        $games->appendChild($game4);
    }
    if (isset($game5)) {
        $games->appendChild($game5);
    }
    $utilisateur->appendChild($explain);
    $utilisateur->appendChild($picture);
    echo $xml->save('./lib/XML/utilisateurs.xml');
}else{
    echo "salut";
}

?>
</p>

<h2 class="titre">Formulaire</h2>
<form action="<?php print $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
    <div>
        <label class="question"  for="nom">Nom :</label>
        <input type="text" name="nom" id="nom">
        <?php
        if(isset($erreur1)){
            print $erreur1;
        }
        ?>
    </div>
    <div>
        <label class="question" for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom">
    </div>
    <div>
        <label class="question" for="email">Email :</label>
        <input type="email" id="email" name="email">
        <?php
        if(isset($erreur2)){
            print $erreur2;
        }
        ?>
    </div>
    <div>
        <label class="question" for="mdp">Mot de Passe :</label>
        <input type="text" id="mdp" name="mdp">
        <?php
        if(isset($erreur3)){
            print $erreur3;
        }
        ?>
    </div>
    <div>
        <label class="question" for="age">Age :</label>
        <input type="number" id="age" name="age" min="12" max="120">
    </div>
    <div>
        <p class="question">Veuillez indiquer votre sexe</p>
        <label for="homme">Homme</label>
        <input type="radio" name="sexe" value="homme" id="homme"/>
        <label for="femme">Femme</label>
        <input type="radio" name="sexe" value="femme" id="femme"/>
    </div>
    <div>
        <p class="question">Comment avez-vous connu le Refuge ?</p>
        <label for="youtube">Via la chaîne Youtube</label>
        <input type="radio" name="source" value="<?php echo $source[0];?>" id="youtube"/>
        <label for="discord">Le serveur Discord</label>
        <input type="radio" name="source" value="<?php echo $source[1];?>" id="Discord"/>
    </div>
    <div>
        <label class="question" for="langue">Quelle est votre langue principale ? :</label>
        <select id="langue" name="langue">
            <option value="français">français</option>
            <option value="anglais">anglais</option>
            <option value="allemand">allemand</option>
            <option value="neerlandais">néerlandais</option>
            <option value="espagnole">espagnole</option>
            <option value="italien">italien</option>
        </select>
    </div>
    <div>
        <label class="question">Veuillez choisir votre ou vos plateforme(s) :</label>
            <select name="plateforme[]" multiple size="4">
                <option value="Steam">Steam</option>
                <option value="Origin">Origin</option>
                <option value="Epic Games">Epic Games</option>
                <option value="Ubisoft">Ubisoft Connect</option>
                <option value="Blizzard">Blizzard</option>
            </select>
    </div>
    <div>
        <p class="question">A quel(s) jeu(x) jouez-vous ?</p>
        <input type="checkbox" name="csgo" id="csgo" value="Counter Strike : Global Offensive" /> <label for="csgo">Counter Strike : Global Offensive</label><br />
        <input type="checkbox" name="mc" id="mc" value="Minecraft" /> <label for="mc">Minecraft</label><br />
        <input type="checkbox" name="lol" id="lol" value="League Of Legends" /> <label for="lol">League Of Legends</label><br />
        <input type="checkbox" name="cod" id="cod" value="Call Of Duty" /> <label for="cod">Call Of Duty</label><br />
        <input type="checkbox" name="aoe" id="aoe" value="Age Of Empire II" /> <label for="aoe">Age Of Empire II</label><br />
    </div>
    <div>
        <p class="question">Sur quelle(s) console(x) jouez-vous ?</p>
        <input type="checkbox" name="console[]" id="switch" value="<?php echo $consoles[0];?>"> <label for="switch"><?php echo $consoles[0];?></label><br />
        <input type="checkbox" name="console[]" id="pc" value="<?php echo  $consoles[1];?>" > <label for="pc"><?php echo $consoles[1];?></label><br />
        <input type="checkbox" name="console[]" id="xbox" value="<?php echo $consoles[2];?>" > <label for="xbox"><?php echo $consoles[2];?></label><br />
        <input type="checkbox" name="console[]" id="ps" value="<?php echo $consoles[3];?>" > <label for="ps"><?php echo $consoles[3];?></label><br />
        <input type="checkbox" name="console[]" id="android" value="<?php echo $consoles[4];?>" > <label for="android"><?php echo $consoles[4];?></label><br />
    </div>
    <div>
        <label class="question" for="explication">Expliquez nous pourquoi vous souhaitez vous inscrire sur notre site : </label>
        <textarea id="explication" name="explication" rows="5" cols="33"></textarea>
    </div>
    <div>
        <label class="question" for="pdp">Veuillez sélectionner une photo de profil pour votre compte :</label>
        <input type="file" name="pdp">
    </div>
    <input type="submit" name="submit_form" id="submit" value="Envoyer"/>
    &nbsp;&nbsp;
    <input type="reset" id="reset"/>
</form>