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

$job = modchform::getJobs(); 



?>



 <form method="post" action="">
    <fieldset>
    <legend><h1>Informations personnelles</h1></legend>

     <div class="form-group">

      
        <div class="col">
            <label for="name"><h3><?php echo $input_name; ?></h3></label>
            <input class="form-control" type="text" name="name" />
        </div>

        <div class="col">
            <label for="forname"><h3><?php echo $input_forname; ?></h3></label>
            <input class="form-control" type="text" name="forname" />
        </div>

     

     </div>




        <label for="adr"><h3><?php echo $input_adr; ?></h3></label>
        <input class="form-control" type="text" name="adr" />

        <label for="city"><h3><?php echo $input_city; ?></h3></label>
        <input class="form-control" type="text" name="city" />

        <label for="cp"><h3><?php echo $input_cp; ?></h3></label>
        <input class="form-control" type="text" name="cp" />

        <label for="phone"><h3><?php echo $input_phone; ?></h3></label>
        <input class="form-control" type="text" name="phone" />

        <label for="p_phone"><h3><?php echo $input_p_phone; ?></h3></label>
        <input class="form-control" type="text" name="p_phone" />

        <label for="email"><h3><?php echo $input_email; ?></h3></label>
        <input class="form-control" type="text" name="email" />



    </fieldset>

    <fieldset>
        <legend><h1>Informations professionnelles</h1></legend>

    <label for="job"><h3><?php echo $input_job; ?></h3></label>
    <select name="job1">
    	<option selected>...</option>
      
        <?php foreach ($job as $j){ ?>
      
        <option value="<?php echo $j->name; ?>"><?php echo $j->name;} ?></option>
     
    </select>
    <select name="job2">
        <option selected>...</option>

    	  <?php foreach ($job as $j){ ?>
      
        <option value="<?php echo $j->name; ?>"><?php echo $j->name;} ?></option>
    </select>
    <select name="job3">
        <option selected>...</option>

    	  <?php foreach ($job as $j){ ?>
      
        <option value="<?php echo $j->name; ?>"><?php echo $j->name;} ?></option>
    </select>

    <label for="emp"><h3><?php echo $input_emp; ?></h3></label>
    <input type="radio" name="emp1">Emploi
    <br>
    <input type="radio" name="emp2">Contrat d'apprentissage
    <br>
    <input type="radio" name="emp3">Contrat de professionnalisation (dispositif non applicable)
    <br>
    <input type="radio" name="emp4">Mobilité fonction publique (mutation ou détachement)
    <br>
    <input type="radio" name="emp5">Candidature ciblée sur une offre, préciser le titre de l’offre
    <br>
    <input type="radio" name="emp6">Autre
    
    <label for="motiv"><h3><?php echo $input_motiv; ?></h3></label>
    <textarea class="form-control" name="motiv"></textarea>

    <label for="com"><h3><?php echo $input_com; ?></h3></label>
    <textarea class="form-control" name="com"></textarea>

    <label for="cv"><h3><?php echo $input_cv; ?></h3></label>
    <input type="file" name="cv">

    <label for="lm"><h3><?php echo $input_lm; ?></h3></label>
    <input type="file" name="lm">


    <br>

    
    <input class='btn btn-primary' type="submit" name="send" value="<?php echo $params->get('message_button'); ?>"/>
    </fieldset>


</form>

<script type="text/javascript">
    jQuery(document).ready(function(){

    //Name check
    jQuery("input[name='email']").blur(function() 
    {
        var $charm = /^[a-z0-9]+([-_.]?[a-z0-9]+)*@[a-z0-9]+([-_.]?[a-z0-9]+)*\.[a-z]{2,3}$/;
        if (jQuery("input[name='email']").val() === "")
        {
            jQuery(this).css({backgroundColor : "#ffffff"});
        }

        else
        {
            if ($charm.test(jQuery(this).val())) 
            {
                jQuery(this).css({backgroundColor : "#f8ffd7"});
            }
            else
            {
                jQuery(this).css({backgroundColor : "#ffcccb"});
            } 
        }
        
    });

    // var $tel = jQuery("input[name='phone']");

    // var $chart = /^0[1-68]([-/.\s]?[0-9]{2}){4}$/;

    // $tel.blur(function checktel($tel));

    // function checktel(obj) 
    // {
      
    //    if (this.val() === "")
    //     {
    //         jQuery(this).css({backgroundColor : "#ffffff"});
    //     }

    //     else
    //     {
    //         if ($chart.test(jQuery(this).val())) 
    //         {
    //             jQuery(this).css({backgroundColor : "#f8ffd7"});
    //         }
    //         else
    //         {
    //             jQuery(this).css({backgroundColor : "#ffcccb"});
    //         } 
    //     }
    // }


});
</script>







