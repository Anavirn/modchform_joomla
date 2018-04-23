<?php

defined('_JEXEC') or die;



JHtml::stylesheet(JURI::base(). 'modules/mod_chform/assets/css/style.css');


$input_name       = $params->get('Champ nom');
$input_forname    = $params->get('Champ prénom');
$input_adr        = $params->get('Champ adresse');
$input_city       = $params->get('Champ ville');
$input_cp         = $params->get('Champ code postal');
$input_phone      = $params->get('Champ téléphone');
$input_p_phone    = $params->get('Champ téléphone portable');
$input_email      = $params->get('Champ adresse mail');

$input_job        = $params->get('Champ emploi');
$input_emp        = $params->get('Champ type');
$input_sal        = $params->get('Champ salaire');
$input_motiv      = $params->get('Champ motivation');
$input_com        = $params->get('Champ commentaire');
$input_cv         = $params->get('Champ CV');
$input_lm         = $params->get('Champ lettre de motivation');
$input_submit     = $params->get('Bouton');

$input_sender     = $params->get('Destinataire du mail');
$input_subject    = $params->get('Sujet du mail');

$job_soins        = modchform::getJobsSoins(); 
$job_social       = modchform::getJobsSocial();
$job_ingen        = modchform::getJobsIngen();
$job_logis        = modchform::getJobsLogis();
$job_qual         = modchform::getJobsQual();
$job_sys          = modchform::getJobsSys();
$job_gest         = modchform::getJobsGest();
$job_manag        = modchform::getJobsManag();
$job_medic        = modchform::getJobsMedic();


?>

<?php




if(isset($_POST['send']))
{
    // $taille_max = 500000;
    // $taille_cv = filesize($_FILES['cv']['tmp_name']);
    // $taille_lm = filesize($_FILES['lm']['tmp_name']);

    
        
    


        
    


        // Get inputs
            $nom                = htmlspecialchars($_POST['name']);
            $prenom             = htmlspecialchars($_POST['forname']);
            $adresse            = htmlspecialchars($_POST['adr']);
            $ville              = htmlspecialchars($_POST['city']);
            $code_postal        = htmlspecialchars($_POST['cp']);
            $telephone          = htmlspecialchars($_POST['phone']);
            $telephone_portable = htmlspecialchars($_POST['p_phone']);
            $adresse_mail       = htmlspecialchars($_POST['email']);

            $job_selected1      = $_POST['job1'];
            $job_selected2      = $_POST['job2'];
            $job_selected3      = $_POST['job3'];

            $type_emploi_tab    = array($_POST['emp1'], $_POST['emp2'], $_POST['emp3'], $_POST['emp4'], $_POST['emp5'], $_POST['emp6']);

            $type_emploi        = implode(', ', $type_emploi_tab);
         
          

            $pretention_sal     = htmlspecialchars($_POST['sal']);

            $motivations        = htmlspecialchars($_POST['motiv']);
            $commentaires       = htmlspecialchars($_POST['com']);


        // Mail body
            $body = "<html><body><h2>Informations personelles</h2><br>Nom : ".$nom."<br>Prénom : ".$prenom."<br>Adresse postale : ".$adresse."<br>Ville : ".$ville."<br>Code postale : ".$code_postal."<br>Téléphone : ".$telephone."<br>Téléphone portable : ".$telephone_portable."<br>E-mail : ".$adresse_mail."<br><br><h2>Informations professionnelles</h2><br>Emploi(s) désiré(s) : ".$job_selected1." , ".$job_selected2." , ".$job_selected3."<br>Type d'emploi : ".$type_emploi."<br>Prétention salariale : ".$pretention_sal."<br>Motivations : ".$motivations."<br>Commentaires : ".$commentaires."</body></html>";


    // Mail configuration
            $mailer = JFactory::getMailer();

            $config = JFactory::getConfig();
            $sender = array( 
                $config->get( 'mailfrom' ),
                $config->get( 'fromname' ) 
            );

            $mailer->setSender($sender);

            // $user = JFactory::getUser();
           

            $mailer->addRecipient($input_sender);

            
            $mailer->setSubject($input_subject);
            $mailer->setBody($body);

            $pjloc_cv = $_FILES['cv']['tmp_name'];
            $pjloc_lm = $_FILES['lm']['tmp_name'];

            $pjname_cv = $_FILES['cv']['name'];
            $pjname_lm = $_FILES['lm']['name'];

            $mailer->addAttachment($pjloc_cv, $pjname_cv);
            $mailer->addAttachment($pjloc_lm, $pjname_lm);
            $mailer->isHTML(true);
            $mailer->Encoding = 'base64';

        // Mail sending
            $send = $mailer->Send();
            if ( $send !== true ) 
            {
                echo "Erreur : ";
            }
            else 
            {
                echo "<h3 class='text-success'>Votre requête à bien été envoyée</h3>";
            }


        

}



?>



<div class="container">
 <form method="post" action="" enctype="multipart/form-data">
    <fieldset>
    <legend><h3>Informations personnelles</h3></legend>

        <div class="form-group">

            <div class="form-row">
                <div class="col-md-6 formdivchr">
                    <label class="formlabchr" for="name"><b><?php echo $input_name; ?> *</b></label>
                    <input class="forminputchr" type="text" name="name" required />
                </div>
                <div class="col-md-6 formdivchr">
                    <label class="formlabchr" for="forname"><b><?php echo $input_forname; ?> *</b></label>
                    <input class="forminputchr" type="text" name="forname" required />
                </div>

            </div>
        
      
   

 
       <div class="form-row">
           <div class="col-md-4 formdivchr">
                <label class="formlabchr" for="adr"><b><?php echo $input_adr; ?> *</b></label>
                <input class="forminputchr" type="text" name="adr" required />
           </div>
           <div class="col-md-4 formdivchr">
                <label class="formlabchr" for="city"><b><?php echo $input_city; ?> *</b></label>
                <input class="forminputchr" type="text" name="city" required />
           </div>
           <div class="col-md-4 formdivchr">
                <label class="formlabchr" for="cp"><b><?php echo $input_cp; ?> *</b></label>
                <input class="forminputchr" type="text" name="cp" required />
           </div>

       </div>

       <div class="form-row">
           <div class="col-md-4 formdivchr">
                <label class="formlabchr" for="phone"><b><?php echo $input_phone; ?> </b></label>
                <input class="forminputchr" type="text" name="phone" />
           </div>
           <div class="col-md-4 formdivchr">
                <label class="formlabchr" for="p_phone"><b><?php echo $input_p_phone; ?> *</b></label>
                <input class="forminputchr" type="text" name="p_phone" required/>
           </div>
           <div class="col-md-4 formdivchr">
                <label class="formlabchr" for="email"><b><?php echo $input_email; ?> *</b></label>
                <input class="forminputchr" type="text" name="email" required/>
           </div>
       </div>


       </div>

    </fieldset>

    <fieldset>
        <legend><h3>Informations professionnelles</h3></legend>

    <div class="form-group">

    <label class="formlabchr" for="job"><b><?php echo $input_job; ?></b></label>

    <div class="form-row">
        <div class="col-md-4 formdivchr">

    <select name="job1" required class="forminputchr"> 

    	<option selected disabled>...</option>

        <option disabled>- SOINS -</option>
        <?php foreach ($job_soins as $j){ ?>
        <option value="<?php echo $j->soins; ?>"><?php echo $j->soins;} ?></option>

        <option disabled>- SOCIAL, EDUCATIF, PSYCHOLOGIE ET CULTUREL -</option>
         <?php foreach ($job_social as $j){ ?>
        <option value="<?php echo $j->social; ?>"><?php echo $j->social;} ?></option>

        <option disabled>- INGENIERIE ET MAINTENANCE TECHNIQUE -</option>
         <?php foreach ($job_ingen as $j){ ?>
        <option value="<?php echo $j->ingen; ?>"><?php echo $j->ingen;} ?></option>

        <option disabled>- ACHAT LOGISTIQUE -</option>
         <?php foreach ($job_logis as $j){ ?>
        <option value="<?php echo $j->logis; ?>"><?php echo $j->logis;} ?></option>

        <option disabled>- QUALITE, HYGIENE, SECURITE, ENVIRONNEMENT -</option>
         <?php foreach ($job_qual as $j){ ?>
        <option value="<?php echo $j->qual; ?>"><?php echo $j->qual;} ?></option>
        
        <option disabled>- SYSTEMES D'INFORMATION -</option>
         <?php foreach ($job_sys as $j){ ?>
        <option value="<?php echo $j->sys; ?>"><?php echo $j->sys;} ?></option>

        <option disabled>- GESTION DE L'INFORMATION -</option>
         <?php foreach ($job_gest as $j){ ?>
        <option value="<?php echo $j->gest; ?>"><?php echo $j->gest;} ?></option>

        <option disabled>- MANAGEMENT, GESTION ET AIDE A LA DECISION -</option>
         <?php foreach ($job_manag as $j){ ?>
        <option value="<?php echo $j->manag; ?>"><?php echo $j->manag;} ?></option>

        <option disabled>- MEDECINS -</option>
         <?php foreach ($job_medic as $j){ ?>
        <option value="<?php echo $j->medic; ?>"><?php echo $j->medic;} ?></option>
     
    </select>

</div>



<div class="col-md-4 formdivchr">

    <select name="job2" class="forminputchr">
        <option selected value="">...</option>

        <option disabled>- SOINS -</option>
        <?php foreach ($job_soins as $j){ ?>
        <option value="<?php echo $j->soins; ?>"><?php echo $j->soins;} ?></option>

        <option disabled>- SOCIAL, EDUCATIF, PSYCHOLOGIE ET CULTUREL -</option>
         <?php foreach ($job_social as $j){ ?>
        <option value="<?php echo $j->social; ?>"><?php echo $j->social;} ?></option>

        <option disabled>- INGENIERIE ET MAINTENANCE TECHNIQUE -</option>
         <?php foreach ($job_ingen as $j){ ?>
        <option value="<?php echo $j->ingen; ?>"><?php echo $j->ingen;} ?></option>

        <option disabled>- ACHAT LOGISTIQUE -</option>
         <?php foreach ($job_logis as $j){ ?>
        <option value="<?php echo $j->logis; ?>"><?php echo $j->logis;} ?></option>

        <option disabled>- QUALITE, HYGIENE, SECURITE, ENVIRONNEMENT -</option>
         <?php foreach ($job_qual as $j){ ?>
        <option value="<?php echo $j->qual; ?>"><?php echo $j->qual;} ?></option>
        
        <option disabled>- SYSTEMES D'INFORMATION -</option>
         <?php foreach ($job_sys as $j){ ?>
        <option value="<?php echo $j->sys; ?>"><?php echo $j->sys;} ?></option>

        <option disabled>- GESTION DE L'INFORMATION -</option>
         <?php foreach ($job_gest as $j){ ?>
        <option value="<?php echo $j->gest; ?>"><?php echo $j->gest;} ?></option>

        <option disabled>- MANAGEMENT, GESTION ET AIDE A LA DECISION -</option>
         <?php foreach ($job_manag as $j){ ?>
        <option value="<?php echo $j->manag; ?>"><?php echo $j->manag;} ?></option>

        <option disabled>- MEDECINS -</option>
         <?php foreach ($job_medic as $j){ ?>
        <option value="<?php echo $j->medic; ?>"><?php echo $j->medic;} ?></option>

    	 
    </select>
</div>
<div class="col-md-4 formdivchr">
    <select name="job3" class="forminputchr">
        <option selected value="">...</option>

        <option disabled>- SOINS -</option>
        <?php foreach ($job_soins as $j){ ?>
        <option value="<?php echo $j->soins; ?>"><?php echo $j->soins;} ?></option>

        <option disabled>- SOCIAL, EDUCATIF, PSYCHOLOGIE ET CULTUREL -</option>
         <?php foreach ($job_social as $j){ ?>
        <option value="<?php echo $j->social; ?>"><?php echo $j->social;} ?></option>

        <option disabled>- INGENIERIE ET MAINTENANCE TECHNIQUE -</option>
         <?php foreach ($job_ingen as $j){ ?>
        <option value="<?php echo $j->ingen; ?>"><?php echo $j->ingen;} ?></option>

        <option disabled>- ACHAT LOGISTIQUE -</option>
         <?php foreach ($job_logis as $j){ ?>
        <option value="<?php echo $j->logis; ?>"><?php echo $j->logis;} ?></option>

        <option disabled>- QUALITE, HYGIENE, SECURITE, ENVIRONNEMENT -</option>
         <?php foreach ($job_qual as $j){ ?>
        <option value="<?php echo $j->qual; ?>"><?php echo $j->qual;} ?></option>
        
        <option disabled>- SYSTEMES D'INFORMATION -</option>
         <?php foreach ($job_sys as $j){ ?>
        <option value="<?php echo $j->sys; ?>"><?php echo $j->sys;} ?></option>

        <option disabled>- GESTION DE L'INFORMATION -</option>
         <?php foreach ($job_gest as $j){ ?>
        <option value="<?php echo $j->gest; ?>"><?php echo $j->gest;} ?></option>

        <option disabled>- MANAGEMENT, GESTION ET AIDE A LA DECISION -</option>
         <?php foreach ($job_manag as $j){ ?>
        <option value="<?php echo $j->manag; ?>"><?php echo $j->manag;} ?></option>

        <option disabled>- MEDECINS -</option>
         <?php foreach ($job_medic as $j){ ?>
        <option value="<?php echo $j->medic; ?>"><?php echo $j->medic;} ?></option>

    	 
    </select>
</div>
</div>

    <div class="formdivchr">
        <label class="formlabchr" for="emp"><b><?php echo $input_emp; ?></b></label>
        <input class="formcheckchr" type="checkbox" name="emp1" value="Emploi" required >Emploi
        <br>
        <input class="formcheckchr" type="checkbox" name="emp2" value="Contrat d'apprentissage" required >Contrat d'apprentissage
        <br>
        <input class="formcheckchr" type="checkbox" name="emp3" value="Contrat de professionnalisation" required >Contrat de professionnalisation (dispositif non applicable)
        <br>
        <input class="formcheckchr" type="checkbox" name="emp4" value="Mobilité fonction publique" required >Mobilité fonction publique (mutation ou détachement)
        <br>
        <input class="formcheckchr" type="checkbox" name="emp5" value="Candidature ciblée sur une offre, préciser le titre de l’offre" required >Candidature ciblée sur une offre, préciser le titre de l’offre
        <br>
        <input class="formcheckchr" type="checkbox" name="emp6" value="Autre" required >Autre
    </div>

    <div class="formdivchr">
        <label class="formlabchr" for="sal"><b><?php echo $input_sal; ?></b></label>
        <input type="text" name="sal" class="form-control" required>
    </div>


    <div class="formdivchr">
        <label class="formlabchr" for="motiv"><b><?php echo $input_motiv; ?></b></label>
        <textarea class="formareachr" name="motiv" required></textarea>

        <label class="formlabchr" for="com"><b><?php echo $input_com; ?></b></label>
        <textarea class="formareachr" name="com" required></textarea>
    </div>

    <label class="formlabchr" for="cv"><b><?php echo $input_cv; ?></b></label>
    <input class="formfilechr" type="file" name="cv" id="cv" required accept=".pdf, .jpg, .jpeg">

    <label class="formlabchr" for="lm"><b><?php echo $input_lm; ?></b></label>
    <input class="formfilechr" type="file" name="lm" required accept=".pdf, .doc, .docx, .odt">

    <input type="hidden" name="MAX_FILE_SIZE" value="9000000">


    
    <div class="g-recaptcha formdivchr" data-sitekey="6LdAclMUAAAAAK5wSSEMcn2pzPwheUUMcM1NYAcX"></div>
    

    
    <input id="sub" class='btn btn-danger' type="submit" name="send" value="<?php echo $input_submit ?>"/>

    </div>
    </fieldset>


</form>
</div>

<script type="text/javascript">
    jQuery(document).ready(function(){


        var $verifcp;
        var $verifmail;
        var $verifphone;
        var $verifpphone;


 jQuery("input[name='name']").blur(function()
    {

        if (jQuery("input[name='name']").val() != "")
        {
            jQuery(this).css({backgroundColor : "#f8ffd7"});
        }
        else
        {
            jQuery(this).css({backgroundColor : "#ffffff"}); 
        }

    });

 jQuery("input[name='forname']").blur(function()
    {

        if (jQuery("input[name='forname']").val() != "")
        {
            jQuery(this).css({backgroundColor : "#f8ffd7"});
        }
        else
        {
            jQuery(this).css({backgroundColor : "#ffffff"}); 
        }
    });

 jQuery("input[name='adr']").blur(function()
    {

        if (jQuery("input[name='adr']").val() != "")
        {
            jQuery(this).css({backgroundColor : "#f8ffd7"});
        }
        else
        {
            jQuery(this).css({backgroundColor : "#ffffff"}); 
        }
    });

 jQuery("input[name='city']").blur(function()
    {

        if (jQuery("input[name='city']").val() != "")
        {
            jQuery(this).css({backgroundColor : "#f8ffd7"});
        }
        else
        {
            jQuery(this).css({backgroundColor : "#ffffff"}); 
        }
    });

 jQuery("input[name='sal']").blur(function()
    {

        if (jQuery("input[name='sal']").val() != "")
        {
            jQuery(this).css({backgroundColor : "#f8ffd7"});
        }
        else
        {
            jQuery(this).css({backgroundColor : "#ffffff"}); 
        }
    });






    //Postal code check
    jQuery("input[name='cp']").blur(function()
    {
        var $charcp = /^([0-9]{5})$/;

        if (jQuery("input[name='cp']").val() === "")
        {
            jQuery(this).css({backgroundColor : "#ffffff"});
            jQuery("small").empty("");
            $verifcp=0;
                if ($verifcp == 1 && $verifmail == 1 && $verifphone == 1 && $verifpphone == 1)
                {
                    jQuery("#sub").removeClass("btn btn-danger");
                    jQuery("#sub").addClass("btn btn-success");
                }
                else
                {
                    jQuery("#sub").removeClass("btn btn-success");
                    jQuery("#sub").addClass("btn btn-danger");

                }
        }

        else
        {
            if ($charcp.test(jQuery(this).val()))
            {
                jQuery(this).css({backgroundColor : "#f8ffd7"});
                jQuery("small").empty("");
                $verifcp=1;
                if ($verifcp == 1 && $verifmail == 1 && $verifphone == 1 && $verifpphone == 1)
                {
                    jQuery("#sub").removeClass("btn btn-danger");
                    jQuery("#sub").addClass("btn btn-success");
                }
                else
                {
                    jQuery("#sub").removeClass("btn btn-success");
                    jQuery("#sub").addClass("btn btn-danger");
                }
              
                
           
               
              
              
            }
            else
            {
                jQuery("small").empty("");
                jQuery(this).css({backgroundColor : "#ffcccb"});
                jQuery(this).after("<small class='small_err'>  Veuillez renseigner un code postal valide</small>");
                jQuery(".small_err").css({color : "red"});
                $verifcp=0;
                if ($verifcp == 1 && $verifmail == 1 && $verifphone == 1 && $verifpphone == 1)
                {
                    jQuery("#sub").removeClass("btn btn-danger");
                    jQuery("#sub").addClass("btn btn-success");
                }
                else
                {
                    jQuery("#sub").removeClass("btn btn-success");
                    jQuery("#sub").addClass("btn btn-danger");
                }
                
                
              
            } 
        }


    });




    //Email check
    jQuery("input[name='email']").blur(function() 
    {
        var $charm = /^[a-z0-9]+([-_.]?[a-z0-9]+)*@[a-z0-9]+([-_.]?[a-z0-9]+)*\.[a-z]{2,3}$/;

        if (jQuery("input[name='email']").val() === "")
        {
            jQuery(this).css({backgroundColor : "#ffffff"});
            jQuery(".small_err").empty("");
            $verifmail=0;
                if ($verifcp == 1 && $verifmail == 1 && $verifphone == 1 && $verifpphone == 1)
                {
                    jQuery("#sub").removeClass("btn btn-danger");
                    jQuery("#sub").addClass("btn btn-success");
                }
                else
                {
                    jQuery("#sub").removeClass("btn btn-success");
                    jQuery("#sub").addClass("btn btn-danger");
                }
        }

        else
        {
            if ($charm.test(jQuery(this).val())) 
            {
                jQuery(this).css({backgroundColor : "#f8ffd7"});
                jQuery(".small_err").empty("");
                $verifmail=1;
                if ($verifcp == 1 && $verifmail == 1 && $verifphone == 1 && $verifpphone == 1)
                {
                    jQuery("#sub").removeClass("btn btn-danger");
                    jQuery("#sub").addClass("btn btn-success");
                }
                else
                {
                    jQuery("#sub").removeClass("btn btn-success");
                    jQuery("#sub").addClass("btn btn-danger");
                }
               
                
              
            
            }
            else
            {
                jQuery(".small_err").empty("");
                jQuery(this).css({backgroundColor : "#ffcccb"});
                jQuery(this).after("<small class='small_err'>  Veuillez renseigner une addresse mail valide</small>");
                jQuery(".small_err").css({color : "red"});
                $verifmail=0;
                if ($verifcp == 1 && $verifmail == 1 && $verifphone == 1 && $verifpphone == 1)
                {
                    jQuery("#sub").removeClass("btn btn-danger");
                    jQuery("#sub").addClass("btn btn-success");
                }
                else
                {
                    jQuery("#sub").removeClass("btn btn-success");
                    jQuery("#sub").addClass("btn btn-danger");
                }
                
              
            } 
        }
        
    });


    //Phone check
    jQuery("input[name='phone']").blur(function(){

        var $chart = /^0[1-68]([-/.\s]?[0-9]{2}){4}$/;

        if (jQuery("input[name='phone']").val() === "")
        {
            jQuery(this).css({backgroundColor : "#ffffff"});
            jQuery(".small_err").empty("");
            $verifphone=0;
                if ($verifcp == 1 && $verifmail == 1 && $verifphone == 1 && $verifpphone == 1)
                {
                    jQuery("#sub").removeClass("btn btn-danger");
                    jQuery("#sub").addClass("btn btn-success");
                }
                else
                {
                    jQuery("#sub").removeClass("btn btn-success");
                    jQuery("#sub").addClass("btn btn-danger");
                }
        }

        else
        {
            if ($chart.test(jQuery(this).val())) 
            {
                jQuery(this).css({backgroundColor : "#f8ffd7"});
                jQuery(".small_err").empty("");
                $verifphone=1;
                if ($verifcp == 1 && $verifmail == 1 && $verifphone == 1 && $verifpphone == 1)
                {
                    jQuery("#sub").removeClass("btn btn-danger");
                    jQuery("#sub").addClass("btn btn-success");
                }
                else
                {
                    jQuery("#sub").removeClass("btn btn-success");
                    jQuery("#sub").addClass("btn btn-danger");
                }
            
                
              
             
            }
            else
            {
                jQuery(".small_err").empty("");
                jQuery(this).css({backgroundColor : "#ffcccb"});
                jQuery(this).after("<small class='small_err'>  Veuillez renseigner un numéro de téléphone valide</small>");
                jQuery(".small_err").css({color : "red"});
                $verifphone=0;
                if ($verifcp == 1 && $verifmail == 1 && $verifphone == 1 && $verifpphone == 1)
                {
                    jQuery("#sub").removeClass("btn btn-danger");
                    jQuery("#sub").addClass("btn btn-success");
                }
                else
                {
                    jQuery("#sub").removeClass("btn btn-success");
                    jQuery("#sub").addClass("btn btn-danger");
                }
                
         
            } 
        }


    });

    //Mobile phone check
    jQuery("input[name='p_phone']").blur(function(){

        var $chartp = /^0[1-68]([-/.\s]?[0-9]{2}){4}$/;

        if (jQuery("input[name='p_phone']").val() === "")
        {
            jQuery(this).css({backgroundColor : "#ffffff"});
            jQuery(".small_err").empty("");
            $verifpphone=0;
                if ($verifcp == 1 && $verifmail == 1 && $verifphone == 1 && $verifpphone == 1)
                {
                    jQuery("#sub").removeClass("btn btn-danger");
                    jQuery("#sub").addClass("btn btn-success");
                }
                else
                {
                    jQuery("#sub").removeClass("btn btn-success");
                    jQuery("#sub").addClass("btn btn-danger");
                }
        }

        else
        {
            if ($chartp.test(jQuery(this).val())) 
            {
                jQuery(this).css({backgroundColor : "#f8ffd7"});
                jQuery(".small_err").empty("");
                $verifpphone=1;
                if ($verifcp == 1 && $verifmail == 1 && $verifphone == 1 && $verifpphone == 1)
                {
                    jQuery("#sub").removeClass("btn btn-danger");
                    jQuery("#sub").addClass("btn btn-success");
                }
                else
                {
                    jQuery("#sub").removeClass("btn btn-success");
                    jQuery("#sub").addClass("btn btn-danger");
                }
            

                              
               
             

            }
            else
            {
                jQuery(".small_err").empty("");
                jQuery(this).css({backgroundColor : "#ffcccb"});
                jQuery(this).after("<small class='small_err'>  Veuillez renseigner un numéro de téléphone valide</small>");
                jQuery(".small_err").css({color : "red"});
                $verifpphone=0;
                if ($verifcp == 1 && $verifmail == 1 && $verifphone == 1 && $verifpphone == 1)
                {
                    jQuery("#sub").removeClass("btn btn-danger");
                    jQuery("#sub").addClass("btn btn-success");
                }
                else
                {
                    jQuery("#sub").removeClass("btn btn-success");
                    jQuery("#sub").addClass("btn btn-danger");
                }
              
                
            } 
        }




    });




    // Require group of checkboxes
    var $requiredCheckboxes = jQuery(':checkbox[required]');

    $requiredCheckboxes.change(function(){

        if($requiredCheckboxes.is(':checked')) 
        {
            $requiredCheckboxes.removeAttr('required');
        }

        else 
        {
            $requiredCheckboxes.attr('required', 'required');
        }

    });

    
    // Final confirmation
    jQuery("#sub").click(function(event){
        if (jQuery(this).hasClass("btn-success")) 
        {
            jQuery(".small_err").empty("");
            console.log("ok");
        }
        else
        {
            jQuery(".small_err").empty("");
            event.preventDefault();
            jQuery(this).after("<small class='small_err'>    Veuillez remplir tout les champs correctement </small>");
            jQuery(".small_err").css({color : "red"});
            console.log("non");
        }

    });

   








});
</script>

<!-- <?php
    // ! RECAPTCHA EN LOCAL !
    // // Ma clé privée
    // $secret = "6LdAclMUAAAAALqFtMpOXB0izGQfbSjS4gJnTREw";

    // // Paramètre renvoyé par le recaptcha
    // $response = $_POST['g-recaptcha-response'];

    // // On récupère l'IP de l'utilisateur
    // $remoteip = $_SERVER['REMOTE_ADDR'];

    // $api_url = "https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$response."&remoteip=".$remoteip;


    // // Interprétation de la réponse
    // $decode = json_decode(file_get_contents($api_url), true);

    // if ($decode['success'] == true) 
    // {
    //    echo "ok"; 
    // }
    // else
    // {
    //     echo "vous êtes un robot";
    // }

    


?> -->







