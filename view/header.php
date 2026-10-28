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
	<link rel="stylesheet" href="https://sibforms.com/forms/end-form/build/sib-styles.css">
	<link href="<?php echo WEBROOT; ?>css/brevoNL.css" rel="stylesheet" type="text/css">
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
			<div class="sib-form">
				<div id="sib-form-container" class="sib-form-container">
					<div id="error-message" class="sib-form-message-panel" style="font-family:Helvetica, sans-serif; font-size:16px; text-align:left; color:#661d1d; background-color:#ffeded; border-color:#ff4949; border-radius:3px; max-width:540px;">
					  <div class="sib-form-message-panel__text sib-form-message-panel__text--center">
						<svg viewBox="0 0 512 512" class="sib-icon sib-notification__icon">
						  <path d="M256 40c118.621 0 216 96.075 216 216 0 119.291-96.61 216-216 216-119.244 0-216-96.562-216-216 0-119.203 96.602-216 216-216m0-32C119.043 8 8 119.083 8 256c0 136.997 111.043 248 248 248s248-111.003 248-248C504 119.083 392.957 8 256 8zm-11.49 120h22.979c6.823 0 12.274 5.682 11.99 12.5l-7 168c-.268 6.428-5.556 11.5-11.99 11.5h-8.979c-6.433 0-11.722-5.073-11.99-11.5l-7-168c-.283-6.818 5.167-12.5 11.99-12.5zM256 340c-15.464 0-28 12.536-28 28s12.536 28 28 28 28-12.536 28-28-12.536-28-28-28z" />
						</svg>
						<span class="sib-form-message-panel__inner-text">Nous n&#39;avons pas pu confirmer votre inscription.</span>
					  </div>
					</div>
					<div></div>
					<div id="success-message" class="sib-form-message-panel" style="font-family:Helvetica, sans-serif; font-size:16px; text-align:left; color:#085229; background-color:#e7faf0; border-color:#13ce66; border-radius:3px; max-width:540px;">
						<div class="sib-form-message-panel__text sib-form-message-panel__text--center">
							<svg viewBox="0 0 512 512" class="sib-icon sib-notification__icon">
							  <path d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 464c-118.664 0-216-96.055-216-216 0-118.663 96.055-216 216-216 118.664 0 216 96.055 216 216 0 118.663-96.055 216-216 216zm141.63-274.961L217.15 376.071c-4.705 4.667-12.303 4.637-16.97-.068l-85.878-86.572c-4.667-4.705-4.637-12.303.068-16.97l8.52-8.451c4.705-4.667 12.303-4.637 16.97.068l68.976 69.533 163.441-162.13c4.705-4.667 12.303-4.637 16.97.068l8.451 8.52c4.668 4.705 4.637 12.303-.068 16.97z" />
							</svg>
							<span class="sib-form-message-panel__inner-text">Votre inscription est confirmée.</span>
						</div>
					</div>
					<div></div>
					<div id="sib-container" class="sib-container--large sib-container--vertical" style="max-width:540px; text-align:center; background-color:transparent; border-width:0px; border-style:solid; border-color:#C0CCD9; border-radius:3px; direction:ltr;">
						<form id="sib-form" method="POST" action="https://93b244d3.sibforms.com/serve/MUIFAO_OnEf2c-04V7lenwbKXPLPuZOUddptaGtdSMlND8NYRFMF-Nt-guh8MfMf5aKPvdl18GEYIFreIz3SzT2WHN2tbPkaTwXQ0HoeWKhk7XKx2q3g33ZND_am2AxIEttSrFZzguOKY7nXoaSDKh-2quw30MKqOrvOo5dRPFDLjOM8jbmeypXXsCwlhAwbDgTK-rh-bGExZmPqyw==" data-type="subscription">
							<div>
								<div class="sib-input sib-form-block">
									<div class="form__entry entry_block">
										<div class="form__label-row ">
											<label class="entry__label" for="EMAIL" data-required="">Newsletter</label>
											<div class="entry__field">
												<input class="input " type="text" id="EMAIL" name="EMAIL" autocomplete="off" value="" placeholder="abc@xyz.com" data-required="true" required />
											</div>
										</div>
										<label class="entry__error entry__error--primary" style="font-family:Helvetica, sans-serif; font-size:16px; text-align:left; color:#661d1d; background-color:#ffeded; border-color:#ff4949; border-radius:3px;"></label>
									</div>
								</div>
							</div>
							<div style="padding: 8px 0;">
								<div class="sib-form-block" style="text-align: left">
									<button class="sib-form-block__button sib-form-block__button-with-loader" style="color:#FFFFFF; background-color:#b0aeae; border-width:0px;" form="sib-form" type="submit">
										<svg class="icon clickable__icon progress-indicator__icon sib-hide-loader-icon" viewBox="0 0 512 512">
										<path d="M460.116 373.846l-20.823-12.022c-5.541-3.199-7.54-10.159-4.663-15.874 30.137-59.886 28.343-131.652-5.386-189.946-33.641-58.394-94.896-95.833-161.827-99.676C261.028 55.961 256 50.751 256 44.352V20.309c0-6.904 5.808-12.337 12.703-11.982 83.556 4.306 160.163 50.864 202.11 123.677 42.063 72.696 44.079 162.316 6.031 236.832-3.14 6.148-10.75 8.461-16.728 5.01z" />
										</svg>
										SUBSCRIBE
									</button>
								</div>
							</div>
							<input type="text" name="email_address_check" value="" class="input--hidden">
							<input type="hidden" name="locale" value="fr">
						</form>
					</div>
				</div>
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
