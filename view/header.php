<?php

/*
 * AUTEUR: Fabien Meunier
 * PROJECT: Third_Type_Tapes
 * PATH: Third_Type_Tapes/view/
 * NAME: header.php
 */

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ThirdTypeTapes&nbsp;<?php echo TITLE; ?></title>
    <link href='//fonts.googleapis.com' rel='dns-prefetch'>
    <link href='http://fonts.googleapis.com/css?family=Hammersmith+One' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
    <link href="<?php echo WEBROOT; ?>images/Logo TTT.jpg" rel="shortcut icon" type="image/jpg">
<!--    <link href="--><?php //echo WEBROOT; ?><!--css/bootstrap.min.css" rel="stylesheet" type="text/css">-->
    <link href="//cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
<!--    <link href="--><?php //echo WEBROOT; ?><!--css/sharrre.min.css" rel="stylesheet" type="text/css" media="screen">-->
<!--    <link href="--><?php //echo WEBROOT; ?><!--css/TTT.min.css" rel="stylesheet" type="text/css" media="screen">-->
    <link href="<?php echo WEBROOT; ?>css/allCss.min.css" rel="stylesheet" type="text/css" media="screen">
<!--    <script src="--><?php //echo WEBROOT; ?><!--js/jquery-3.7.1.min.js" type="text/javascript"></script>-->
<!--    <script src="--><?php //echo WEBROOT; ?><!--plugIn/queryloader2/queryloader2.min.js" type="text/javascript"></script>-->
    <script src="<?php echo WEBROOT; ?>plugIn/tinymce/tinymce.min.js" type="text/javascript"></script>
    <script src="<?php echo WEBROOT; ?>js/allJs.min.js" type="text/javascript"></script>
    <meta name="title" content="THIRD TYPE TAPES">
    <meta name="description" content="THIRD TYPE TAPES beats &amp; noise tape label">
    <meta name="keywords" content="thirdtypetapes, ThirdTypeTapes, Third Type Tapes, TTT, tape, cassette, label, beats, noise, breakcore, electronique, harsh, indus, C_C, Exoterrism, Terrificolor, CCCPu">
    <meta name="layout" content="front">
    <?php
        if (isset($cassette)) {
          $artistesNames = array();
          foreach($cassette as $value){ $artistesNames[] = $value['nom']; };
          $ogTitle = $cassette[0]['code'] . " // " . implode(" ", $artistesNames) . " // " . $cassette[0]['titre'];
          $ogDescription = strip_tags(html_entity_decode($cassette[0]['description']));
          $ogImage = WEBROOT . "images/cassette/" . $cassette[0]['image_pochette'];
        } else if (isset($artiste)) {
          $ogTitle = $artiste[0]['nom'];
          $ogDescription = strip_tags(html_entity_decode($artiste[0]['bio']));
          $ogImage = WEBROOT . "images/artiste/" . $artiste[0]['image_artiste'];
        } else if (isset($event)) {
          $ogTitle = $event['date_event_fr'] . " " . $event['titre_event'];
          $ogDescription = strip_tags(html_entity_decode($event['description_event']));
          $ogImage = WEBROOT . "images/event/" . $event['image_event'];
        }
    ?>
    <?php if (isset($ogTitle) && isset($ogImage)) { ?>
        <meta property="og:title" content="<?php echo $ogTitle ?>" />
        <?php if (isset($ogDescription)) { ?>
          <meta property="og:description" content="<?php echo $ogDescription ?>" />
        <?php } ?>
        <meta property="og:image" content="<?php echo $ogImage ?>" />
    <?php } ?>

</head>
<body id="top">
    <h1 class="ref">thirdtypetapes ThirdTypeTapes Third Type Tapes TTT tape label beats noise breakcore electronique harsh dark indus C_C Exoterrism Terrificolor CCCPu N'alov cassette DJ Die Soon Le Matin Yogidata ilill Holzkopf G4Z Nah Rough Americana Mutamassik Morgan Craft 6.R.M.E. Le Syndicat Sturqen</h1>
    <header class="tAlign" id="headerAlign">
<!------------------------------------------------------------------------------newsLetter-------------------------------------------------------------------------------------------------------------------------------->
        <div class="newsLetter<?php if(isset($_SESSION['mais qui cela peut-il bien être ?'])){ echo " invisible";}?>">
			<div id="mc_embed_signup">
				<form action="https://thirdtypetapes.us4.list-manage.com/subscribe/post?u=96f9f95bea80b4e79e9ee01e8&amp;id=5d4e1e5e62" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
					<div id="mc_embed_signup_scroll">
						<div class="mc-field-group">
							<label for="mce-EMAIL">Subscribe to our mailing list</label>
							<input type="email" value="" name="EMAIL" class="required email form-control" id="mce-EMAIL" placeholder="email address" required>
						</div>
						<div id="mce-responses" class="clear">
							<div class="response" id="mce-error-response" style="display:none"></div>
							<div class="response" id="mce-success-response" style="display:none"></div>
						</div>
						<!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
						<div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_96f9f95bea80b4e79e9ee01e8_5d4e1e5e62" tabindex="-1" value=""></div>
						<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
					</div>
				</form>
			</div>
		</div>
<!------------------------------------------------------------------------------Logo-------------------------------------------------------------------------------------------------------------------------------------->
        <a href="<?php echo WEBROOT; ?>cassettes">
            <img src="<?php echo WEBROOT; ?>images/headerLogo.jpg" title="logo" alt="logo_TTT" >
        </a>
<!------------------------------------------------------------------------------login/out--------------------------------------------------------------------------------------------------------------------------------->
        <div class="logMod">
            <form class="saveForm" id="logView" action="#" method="POST" enctype="multipart/form-data" >
                <table width="100%" >
                    <tbody>
                        <tr>
                            <td><label class="menu" for="idIdentifiant" >Username:&nbsp;</label></td>
                            <td><input type="text" class="form-control champsLog" id="idIdentifiant" name="identifiant" required ><br/></td>
                        </tr>
                        <tr>
                            <td><label class="menu" for="idMot_de_passe" >Password:&nbsp;</label></td>
                            <td><input type="password" class="form-control champsLog" id="idMot_de_passe" name="mot_de_passe" required ><br/></td>
                        </tr>
                        <tr>
                            <td></td><td><input class="btn btn-primary" id="submitLog" type="submit" value="connect" ></td>
                        </tr>
                    </tbody>
                </table>
                <input type="hidden" name="action" value="login" >
            </form>
            <?php if(!isset($_SESSION['mais qui cela peut-il bien être ?'])){ ?>
                <span class="logIn" id="logIn" >logIn</span>
            <?php } else { ?>
                <form id="logOut" action="#" method="POST" enctype="multipart/form-data" >
                    <input type="hidden" name="action" value="logout" >
                    <input type="submit" class="logIn" value="logOut" >
                </form>
            <?php } ?>
            <br/><br/>
<!------------------------------------------------------------------------------infos logIn------------------------------------------------------------------------------------------------------------------------------->
            <?php if(isset($_SESSION['infoLog'])){ ?>
                <div class="alert alert-danger" id="infoLog" role="alert" >
                    <img class="closeInfo" id="closeIcon" src="<?php echo WEBROOT; ?>images/supprimer.png" title="fermeture" alt="crossIcon" >
                    <?php echo $_SESSION['infoLog']; unset($_SESSION['infoLog']); ?>
                </div>
            <?php } ?>
            <div class="alert alert-danger informations" id="jqInfoLog" role="alert" >
                <img class="closeInfo closeInformations" src="<?php echo WEBROOT; ?>images/supprimer.png" title="fermeture" alt="crossIcon" >
                <span></span>
            </div>
        </div>
    </header>
    <br/>
<!------------------------------------------------------------------------------menu admin-------------------------------------------------------------------------------------------------------------------------------->
    <?php if(isset($_SESSION['mais qui cela peut-il bien être ?'])){ ?>
        <nav class="menuGeneral" >
            <ul class="list-inline" >
                <li>
                    <h4><a id="id_gestion_cassettes" href="<?php echo WEBROOT; ?>gestion_cassettes" >gestion_releases</a></h4>
                </li>
                <li>
                    <h4><a id="id_gestion_artistes" href="<?php echo WEBROOT; ?>gestion_artistes" >gestion_artistes</a></h4>
                </li>
                <li>
                    <h4><a id="id_gestion_events" href="<?php echo WEBROOT; ?>gestion_events" >gestion_events</a></h4>
                </li>
                <li>
                    <h4><a id="id_clients" href="<?php echo WEBROOT; ?>clients" >gestion_clients</a></h4>
                </li>
                <li>
                    <h4><a id="id_exemplaires" href="<?php echo WEBROOT; ?>exemplaires" >gestion_exemplaires</a></h4>
                </li>
                <li>
                    <h4><a id="id_comptes" href="<?php echo WEBROOT; ?>comptes" >comptes</a></h4>
                </li>
                <?php if($_SESSION['mais qui cela peut-il bien être ?'] === "Fabien"){ ?>
                    <li>
                        <h4><a class="menuGestionAdmin" id="id_admins" href="<?php echo WEBROOT; ?>admins" >gestion_admins</a></h4>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    <?php } ?>
<!------------------------------------------------------------------------------menu general------------------------------------------------------------------------------------------------------------------------------>
    <nav class="menuGeneral" >
        <ul class="list-inline" >
            <li>
                <h4><a class="menu" id="id_labels" href="<?php echo WEBROOT; ?>labels" >label</a></h4>
            </li>
            <li>
                <h4><a class="menu" id="id_cassettes" href="<?php echo WEBROOT; ?>cassettes" >releases</a></h4>
            </li>
            <li>
                <h4><a class="menu" id="id_artistes" href="<?php echo WEBROOT; ?>artistes" >artists</a></h4>
            </li>
            <li>
                <h4><a class="menu" id="id_events" href="<?php echo WEBROOT; ?>events">events</a></h4>
            </li>
            <li>
                <h4><a class="menu" id="id_live_archives" href="<?php echo WEBROOT; ?>live_archives">live_archives</a></h4>
            </li>
            <li>
                <h4><a class="menu" id="id_links" href="<?php echo WEBROOT; ?>links" >links</a></h4>
            </li>
            <li>
                <h4><a class="menu" id="id_contacts" href="<?php echo WEBROOT; ?>contacts">contact</a></h4>
            </li>
        </ul>
    </nav>
