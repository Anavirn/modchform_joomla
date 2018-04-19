<?php

defined('_JEXEC') or die;

JHtml::_('jquery.framework');

JHtml::_('bootstrap.tooltip');

JHtml::stylesheet(JURI::root().'assets/bootstrap/dist/css/bootstrap.min.css');
JHtml::stylesheet(JURI::root().'assets/bootstrap/dist/js/bootstrap.min.js');

$input_name       = $params->get('input_name');
$input_forname    = $params->get('input_forname');
$input_adr        = $params->get('input_adr');
$input_city       = $params->get('input_city');
$input_cp         = $params->get('input_cp');
$input_phone      = $params->get('input_phone');
$input_p_phone    = $params->get('input_p_phone');
$input_email      = $params->get('input_email');

$input_job        = $params->get('input_job');
$input_emp        = $params->get('input_emp');
$input_sal        = $params->get('input_sal');
$input_motiv      = $params->get('input_motiv');
$input_com        = $params->get('input_com');
$input_cv         = $params->get('input_cv');
$input_lm         = $params->get('input_lm');

$input_sender     = $params->get('input_sender');
$input_subject    = $params->get('input_subject');

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



 <form method="post" action="" enctype="multipart/form-data">
    <fieldset>
    <legend><h1>Informations personnelles</h1></legend>


      
   
        <label for="name"><h3><?php echo $input_name; ?></h3></label>
        <input class="form-control" type="text" name="name" required />
 
        <label for="forname"><h3><?php echo $input_forname; ?></h3></label>
        <input class="form-control" type="text" name="forname" required />
    
        <label for="adr"><h3><?php echo $input_adr; ?></h3></label>
        <input class="form-control" type="text" name="adr" required />

        <label for="city"><h3><?php echo $input_city; ?></h3></label>
        <input class="form-control" type="text" name="city" required />

        <label for="cp"><h3><?php echo $input_cp; ?></h3></label>
        <input class="form-control" type="text" name="cp" required />

        <label for="phone"><h3><?php echo $input_phone; ?></h3></label>
        <input class="form-control" type="text" name="phone" />

        <label for="p_phone"><h3><?php echo $input_p_phone; ?></h3></label>
        <input class="form-control" type="text" name="p_phone" required/>

        <label for="email"><h3><?php echo $input_email; ?></h3></label>
        <input class="form-control" type="text" name="email" required/>



    </fieldset>

    <fieldset>
        <legend><h1>Informations professionnelles</h1></legend>

    <label for="job"><h3><?php echo $input_job; ?></h3></label>
    <select name="job1" required>

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







    <select name="job2">
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
    <select name="job3">
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


 
    <label for="emp"><h3><?php echo $input_emp; ?></h3></label>
    <input type="checkbox" name="emp1" value="Emploi" required >Emploi
    <br>
    <input type="checkbox" name="emp2" value="Contrat d'apprentissage" required >Contrat d'apprentissage
    <br>
    <input type="checkbox" name="emp3" value="Contrat de professionnalisation" required >Contrat de professionnalisation (dispositif non applicable)
    <br>
    <input type="checkbox" name="emp4" value="Mobilité fonction publique" required >Mobilité fonction publique (mutation ou détachement)
    <br>
    <input type="checkbox" name="emp5" value="Candidature ciblée sur une offre, préciser le titre de l’offre" required >Candidature ciblée sur une offre, préciser le titre de l’offre
    <br>
    <input type="checkbox" name="emp6" value="Autre" required >Autre

    <label for="sal"><h3><?php echo $input_sal; ?></h3></label>
    <input type="text" name="sal" class="form-control" required>
    
    <label for="motiv"><h3><?php echo $input_motiv; ?></h3></label>
    <textarea class="form-control" name="motiv" required></textarea>

    <label for="com"><h3><?php echo $input_com; ?></h3></label>
    <textarea class="form-control" name="com" required></textarea>

    <label for="cv"><h3><?php echo $input_cv; ?></h3></label>
    <input type="file" name="cv" id="cv" required accept=".pdf, .jpg, .jpeg">

    <label for="lm"><h3><?php echo $input_lm; ?></h3></label>
    <input type="file" name="lm" required accept=".pdf, .doc, .docx, .odt">

    <input type="hidden" name="MAX_FILE_SIZE" value="500000">


    <br>
  <!--   <div class="g-recaptcha" data-sitekey="6LdAclMUAAAAAK5wSSEMcn2pzPwheUUMcM1NYAcX"></div> -->
    <br>

    
    <input id="sub" class='btn btn-danger' type="submit" name="send" value="<?php echo $params->get('message_button'); ?>"/>
    </fieldset>


</form>

<script type="text/javascript">
    jQuery(document).ready(function(){


        var $verifcp;
        var $verifmail;
        var $verifphone;
        var $verifpphone;



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







