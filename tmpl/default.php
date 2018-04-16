<?php

defined('_JEXEC') or die;

JHtml::_('jquery.framework');

JHtml::_('bootstrap.tooltip');

JHtml::stylesheet(JURI::root().'assets/bootstrap/dist/css/bootstrap.min.css');
JHtml::stylesheet(JURI::root().'assets/bootstrap/dist/js/bootstrap.min.js');

$idmodule    	  = $module->id;
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



 <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
    <legend><h1>Informations personnelles</h1></legend>

     <div class="form-group">

      
        <div class="col">
            <label for="name"><h3><?php echo $input_name; ?></h3></label>
            <input class="form-control" type="text" name="name" required />
        </div>

        <div class="col">
            <label for="forname"><h3><?php echo $input_forname; ?></h3></label>
            <input class="form-control" type="text" name="forname" required />
        </div>

     

     </div>




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
    <input type="checkbox" name="emp1" value="Emploi">Emploi
    <br>
    <input type="checkbox" name="emp2" value="Contrat d'apprentissage">Contrat d'apprentissage
    <br>
    <input type="checkbox" name="emp3" value="Contrat de professionnalisation ">Contrat de professionnalisation (dispositif non applicable)
    <br>
    <input type="checkbox" name="emp4" value="Mobilité fonction publique">Mobilité fonction publique (mutation ou détachement)
    <br>
    <input type="checkbox" name="emp5" value="Candidature ciblée sur une offre, préciser le titre de l’offre">Candidature ciblée sur une offre, préciser le titre de l’offre
    <br>
    <input type="checkbox" name="emp6" value="Autre">Autre

    <label for="sal"><h3><?php echo $input_sal; ?></h3></label>
    <input type="text" name="sal" class="form-control" required>
    
    <label for="motiv"><h3><?php echo $input_motiv; ?></h3></label>
    <textarea class="form-control" name="motiv" required></textarea>

    <label for="com"><h3><?php echo $input_com; ?></h3></label>
    <textarea class="form-control" name="com" required></textarea>

    <label for="cv"><h3><?php echo $input_cv; ?></h3></label>
    <input type="file" name="cv" required>

    <label for="lm"><h3><?php echo $input_lm; ?></h3></label>
    <input type="file" name="lm" required>


    <br>

    
    <input class='btn btn-primary' type="submit" name="send" value="<?php echo $params->get('message_button'); ?>"/>
    </fieldset>


</form>

<script type="text/javascript">
    jQuery(document).ready(function(){


    //Postal code check
    jQuery("input[name='cp']").blur(function()
    {
        var $charcp = /^([0-9]{5})$/;

        if (jQuery("input[name='cp']").val() === "")
        {
            jQuery(this).css({backgroundColor : "#ffffff"});
            jQuery("small").empty("");
        }

        else
        {
            if ($charcp.test(jQuery(this).val()))
            {
                jQuery(this).css({backgroundColor : "#f8ffd7"});
                jQuery("small").empty("");
            }
            else
            {
                jQuery("small").empty("");
                jQuery(this).css({backgroundColor : "#ffcccb"});
                jQuery(this).after("<small class='small_err'>  Veuillez renseigner un code postal valide</small>");
                jQuery(".small_err").css({color : "red"});
            } 
        }


    });




    //Name check
    jQuery("input[name='email']").blur(function() 
    {
        var $charm = /^[a-z0-9]+([-_.]?[a-z0-9]+)*@[a-z0-9]+([-_.]?[a-z0-9]+)*\.[a-z]{2,3}$/;

        if (jQuery("input[name='email']").val() === "")
        {
            jQuery(this).css({backgroundColor : "#ffffff"});
            jQuery("small").empty("");
        }

        else
        {
            if ($charm.test(jQuery(this).val())) 
            {
                jQuery(this).css({backgroundColor : "#f8ffd7"});
                jQuery("small").empty("");
            }
            else
            {
                jQuery("small").empty("");
                jQuery(this).css({backgroundColor : "#ffcccb"});
                jQuery(this).after("<small class='small_err'>  Veuillez renseigner une addresse mail valide</small>");
                jQuery(".small_err").css({color : "red"});
            } 
        }
        
    });


    //Phone check
    jQuery("input[name='phone']").blur(function(){

        var $chart = /^0[1-68]([-/.\s]?[0-9]{2}){4}$/;

        if (jQuery("input[name='phone']").val() === "")
        {
            jQuery(this).css({backgroundColor : "#ffffff"});
            jQuery("small").empty("");
        }

        else
        {
            if ($chart.test(jQuery(this).val())) 
            {
                jQuery(this).css({backgroundColor : "#f8ffd7"});
                jQuery("small").empty("");
            }
            else
            {
                jQuery("small").empty("");
                jQuery(this).css({backgroundColor : "#ffcccb"});
                jQuery(this).after("<small class='small_err'>  Veuillez renseigner un numéro de téléphone valide</small>");
                jQuery(".small_err").css({color : "red"});
            } 
        }


    });

    //Mobile phone check
    jQuery("input[name='p_phone']").blur(function(){

        var $chartp = /^0[1-68]([-/.\s]?[0-9]{2}){4}$/;

        if (jQuery("input[name='p_phone']").val() === "")
        {
            jQuery(this).css({backgroundColor : "#ffffff"});
            jQuery("small").empty("");
        }

        else
        {
            if ($chartp.test(jQuery(this).val())) 
            {
                jQuery(this).css({backgroundColor : "#f8ffd7"});
                jQuery("small").empty("");

            }
            else
            {
                jQuery("small").empty("");
                jQuery(this).css({backgroundColor : "#ffcccb"});
                jQuery(this).after("<small class='small_err'>  Veuillez renseigner un numéro de téléphone valide</small>");
                jQuery(".small_err").css({color : "red"});
            } 
        }


    });






});
</script>

<?php

    if (isset($POST['send'])) 
    {
        echo "ok";
    }



?>







