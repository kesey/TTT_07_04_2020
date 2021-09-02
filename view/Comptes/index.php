<?php

/*
 * AUTEUR: Fabien Meunier
 * PROJECT: Third_Type_Tapes
 * PATH: Third_Type_Tapes/view/Comptes/
 * NAME: index.php
 */

?>
<!------------------------------------------------------------------------------infos comptes------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
<?php if(isset($_SESSION['mais qui cela peut-il bien être ?']) && in_array($_SESSION['mais qui cela peut-il bien être ?'], $admins, TRUE)){ ?>
  <?php require(ROOT.'/view/header.php'); ?>
  <link href="<?php echo WEBROOT; ?>css/comptes/index.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?php echo WEBROOT; ?>css/comptes/print.min.css" type="text/css" media="print">
  <section class="centrer contenir">
      <div class="wrapper">
        <?php if(isset($_SESSION['info'])){ ?>
            <div class="alert alert-danger informations" role="alert" ><img class="closeInfo closeInformations" src="<?php echo WEBROOT; ?>images/supprimer.png" title="fermeture" alt="crossIcon" ><?php echo $_SESSION['info']; unset($_SESSION['info']); if(isset($_SESSION['infoSave'])){ unset($_SESSION['infoSave']); } ?></div>
        <?php } else if(isset($_SESSION['infoSave'])){ ?>
            <div class="alert alert-info informations" role="alert" ><img class="closeInfo closeInformations" src="<?php echo WEBROOT; ?>images/supprimer.png" title="fermeture" alt="crossIcon" ><?php echo $_SESSION['infoSave']; unset($_SESSION['infoSave']); if(isset($_SESSION['info'])){ unset($_SESSION['info']); } ?></div>
        <?php } ?>
        <div class="alert alert-danger informations" id="jqInfos" role="alert" ><img class="closeInfo closeInformations" src="<?php echo WEBROOT; ?>images/supprimer.png" title="fermeture" alt="crossIcon" ><span></span></div>
        <article class="comptesContain">
            <span class="infoDate" ><?php echo $dateTime; ?></span>
            <h3 class="intitule" >TTT résumé comptes:</h3>
            <br/>
            <ul class="affInfos" >
                <?php foreach($ventes as $who => $value){ ?>
                    <li><?php echo $who; ?> a vendu pour: <?php if(!empty($value['somme'])){ echo $value['somme']; } else { echo '0.00'; } ?>&nbsp;&euro;</li>
                <?php } ?>
            </ul>
            <ul class="affInfos colInfos" >
                <?php foreach($compta as $who => $value){ ?>
                    <li><?php echo $who; ?> doit <?php if(!empty($value['doit']['somme'])){ echo $value['doit']['somme']; } else { echo '0.00'; } ?>&nbsp;&euro;&nbsp;à TTT</li>
                <?php } ?>
            </ul>
            <ul class="affInfos colInfos" >
                <?php foreach($compta as $who => $value){ ?>
                    <li>frais de port dus à <?php echo $who; ?>: <?php if(!empty($value['recupere']['somme'])){ echo $value['recupere']['somme']; } else { echo '0.00'; } ?>&nbsp;&euro;</li>
                <?php } ?>
            </ul>
            <br/><br/>
            <ul class="affInfos" >
                <li>Il reste <?php echo $stock['enStock']; ?> exemplaire(s).</li>
                <li><?php echo $vendus['ventes']; ?> exemplaire(s) a/ont été vendu(s).</li>
                <li><?php echo $depot['enDepot']; ?> exemplaire(s) est/sont en dépôt.</li>
                <li><?php echo $don['donnes']; ?> exemplaire(s) a/ont été donné(s).</li>
                <li><?php echo $noStock['horsStock']; ?> exemplaire(s) est/sont hors stock.</li>
            </ul>
            <ul class="affInfos colInfos">
                <li>Nombre de téléchargement(s) total: <?php echo $infosCassettes['telechargement_total']; ?></li>
                <li>Total des ventes: <?php if(!empty($total['somme'])){ echo $total['somme']; } else { echo '0.00'; } ?>&nbsp;&euro;</li>
                <li>Gains réels (total des ventes - montant fdp total): <?php echo $gainReel; ?>&nbsp;&euro;</li>
            </ul>
            <br/><br/>
            <form class="saveForm comptesPrint" id="saveFormCompta" action="#" method="POST" enctype="multipart/form-data" >
                <input type="hidden" name="action" value="updateCompta" >
                <div class="row">
                    <select class="form-control form-compta col-md-2" name="id_admin" >
                        <?php foreach($adminInfos as $admin){ ?>
                            <option value="<?php echo $admin['id_admin']; ?>"><?php echo $admin['nom']; ?></option>
                        <?php } ?>
                    </select>
                    <select class="form-control form-compta col-md-2" name="rembRec" >
                            <option value="a_recupere">récupère</option>
                            <option value="a_rembourse">rembourse</option>
                    </select>
                    <input type="text" class="form-control form-compta col-md-2" id="idCombien" name="combien" placeholder="100.00" required>
                </div>
                </br>
                <div class="row comptesPrint">
                    <input type="submit" class="btn btn-sm btn-danger btn-compta col-md-4" value="update Compta" >
                    <input type="button" class="btn btn-sm btn-success btn-compta col-md-4" id="printButt" value="print" >
                </div>
            </form>
        </article>
      </div>
    </section>
    <!------------------------------------------------------------------------------access denied------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
<?php } else { ?>
    <META HTTP-EQUIV="Refresh" Content="0; URL=<?php echo WEBROOT; ?>cassettes">
<?php }
