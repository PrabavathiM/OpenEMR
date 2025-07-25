<?php
/* Smarty version 4.5.5, created on 2025-07-22 07:34:08
  from '/opt/lampp/htdocs/openemr/interface/forms/ros/templates/ros/general_new.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_687f22d0aa0589_83186904',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '13bc7899f44e01b19baf62751b5481b0c04a49af' => 
    array (
      0 => '/opt/lampp/htdocs/openemr/interface/forms/ros/templates/ros/general_new.html',
      1 => 1742713070,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_687f22d0aa0589_83186904 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/opt/lampp/htdocs/openemr/library/smarty/plugins/function.xl.php','function'=>'smarty_function_xl',),1=>array('file'=>'/opt/lampp/htdocs/openemr/library/smarty/plugins/function.headerTemplate.php','function'=>'smarty_function_headerTemplate',),2=>array('file'=>'/opt/lampp/htdocs/openemr/library/smarty/plugins/function.xlt.php','function'=>'smarty_function_xlt',),3=>array('file'=>'/opt/lampp/htdocs/openemr/vendor/smarty/smarty/libs/plugins/function.html_radios.php','function'=>'smarty_function_html_radios',),));
?>
<html>
<head>

<title><?php echo smarty_function_xl(array('t'=>text('Review Of Systems')),$_smarty_tpl);?>
</title>

<?php echo smarty_function_headerTemplate(array(),$_smarty_tpl);?>


 <style>
    label {
        padding: 0px 5px !Important;
    }
    input[type=checkbox], input[type=radio] {
        margin: 4px;
    }
</style>

</head>
<body>
    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <h2><?php echo smarty_function_xlt(array('t'=>"Review Of Systems"),$_smarty_tpl);?>
</h2>
                <form name="ros" class="form-horizontal" method="post" action="<?php echo $_smarty_tpl->tpl_vars['FORM_ACTION']->value;?>
/interface/forms/ros/save.php" onsubmit="return top.restoreSession()">
                    <input type="hidden" name="csrf_token_form" value="<?php echo attr($_smarty_tpl->tpl_vars['CSRF_TOKEN_FORM']->value);?>
" />
                    <fieldset>
                        <legend><?php echo smarty_function_xlt(array('t'=>"Constitutional"),$_smarty_tpl);?>
</legend>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="weight_change" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Weight Change"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"weight_change",'id'=>"weight_change",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_weight_change(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="anorexia" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Anorexia"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"anorexia",'id'=>"anorexia",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_anorexia(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="night_sweats" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Night Sweats"),$_smarty_tpl);?>
</label>
                                <?php echo smarty_function_html_radios(array('name'=>"night_sweats",'id'=>"night_sweats",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_night_sweats(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="heat_or_cold" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Heat or Cold"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"heat_or_cold",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_heat_or_cold(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="weakness" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Weakness"),$_smarty_tpl);?>
</label>
                                <?php echo smarty_function_html_radios(array('name'=>"weakness",'id'=>"weakness",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_weakness(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="fever" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Fever"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"fever",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_fever(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="insomnia" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Insomnia"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"insomnia",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_insomnia(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="intolerance" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Intolerance"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"intolerance",'id'=>"intolerance",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_intolerance(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="fatigue" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Fatigue"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"fatigue",'id'=>"fatigue",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_fatigue(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="weight_change" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Chills"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"chills",'id'=>"chills",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_chills(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="irritability" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Irritability"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"irritability",'id'=>"irritability",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_irritability(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><?php echo smarty_function_xlt(array('t'=>"Eyes"),$_smarty_tpl);?>
</legend>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="change_in_vision" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Change in Vision"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"change_in_vision",'id'=>"change_in_vision",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_weight_change(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="irritation" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Irritation"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"irritation",'id'=>"irritation",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_irritation(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="double_vision" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Double Vision"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"double_vision",'id'=>"double_vision",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_double_vision(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="glaucoma_history" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Family History of Glaucoma"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"glaucoma_history",'id'=>"glaucoma_history",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_glaucoma_history(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="redness" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Redness"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"redness",'id'=>"redness",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_redness(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="blind_spots" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Blind Spots"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"blind_spots",'id'=>"blind_spots",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_blind_spots(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="eye_pain" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Eye Pain"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"eye_pain",'id'=>"eye_pain",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_eye_pain(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="excessive_tearing" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Excessive Tearing"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"excessive_tearing",'id'=>"excessive_tearing",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_excessive_tearing(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="photophobia" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Photophobia"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"photophobia",'id'=>"photophobia",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_photophobia(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><?php echo smarty_function_xlt(array('t'=>"Ears"),$_smarty_tpl);?>
, <?php echo smarty_function_xlt(array('t'=>"Nose"),$_smarty_tpl);?>
, <?php echo smarty_function_xlt(array('t'=>"Mouth"),$_smarty_tpl);?>
, <?php echo smarty_function_xlt(array('t'=>"Throat"),$_smarty_tpl);?>
</legend>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="hearing_loss" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Hearing Loss"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"hearing_loss",'id'=>"hearing_loss",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_hearing_loss(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="vertigo" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Vertigo"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"vertigo",'id'=>"vertigo",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_vertigo(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="sore_throat" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Sore Throat"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"sore_throat",'id'=>"sore_throat",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_sore_throat(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="nosebleed" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Nosebleed"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"nosebleed",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_nosebleed(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="discharge" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Discharge"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"discharge",'id'=>"discharge",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_discharge(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="tinnitus" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Tinnitus"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"tinnitus",'id'=>"tinnitus",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_tinnitus(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="sinus_problems" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Sinus Problems"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"sinus_problems",'id'=>"sinus_problems",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_sinus_problems(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="snoring" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Snoring"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"snoring",'id'=>"snoring",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_snoring(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="pain" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Pain"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"pain",'id'=>"pain",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_pain(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="frequent_colds" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Frequent Colds"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"frequent_colds",'id'=>"frequent_colds",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_frequent_colds(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="post_nasal_drip" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Post Nasal Drip"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"post_nasal_drip",'id'=>"post_nasal_drip",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_post_nasal_drip(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="apnea" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Apnea"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"apnea",'id'=>"apnea",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_apnea(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><?php echo smarty_function_xlt(array('t'=>"Breast"),$_smarty_tpl);?>
</legend>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="breast_mass" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Breast Mass"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"breast_mass",'id'=>"breast_mass",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_breast_mass(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="abnormal_mammogram" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Abnormal Mammogram"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"abnormal_mammogram",'id'=>"abnormal_mammogram",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_abnormal_mammogram(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="breast_discharge" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Discharge"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"breast_discharge",'id'=>"breast_discharge",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_breast_discharge(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="biopsy" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Biopsy"),$_smarty_tpl);?>
</label>
                                <?php echo smarty_function_html_radios(array('name'=>"biopsy",'id'=>"biopsy",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_biopsy(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><?php echo smarty_function_xlt(array('t'=>"Respiratory"),$_smarty_tpl);?>
</legend>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="cough" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Cough"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"cough",'id'=>"cough",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_cough(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="wheezing" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Wheezing"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"wheezing",'id'=>"wheezing",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_wheezing(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="copd" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"COPD"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"copd",'id'=>"copd",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_copd(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="sputum" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Sputum"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"sputum",'id'=>"sputum",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_sputum(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="hemoptsyis" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Hemoptysis"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"hemoptsyis",'id'=>"hemoptsyis",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_hemoptsyis(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="shortness_of_breath" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Shortness of Breath"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"shortness_of_breath",'id'=>"shortness_of_breath",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_shortness_of_breath(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="asthma" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Asthma"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"asthma",'id'=>"asthma",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_asthma(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><?php echo smarty_function_xlt(array('t'=>"Cardiovascular"),$_smarty_tpl);?>
</legend>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="chest_pain" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Chest Pain"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"chest_pain",'id'=>"chest_pain",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_chest_pain(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="pnd" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"PND"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"pnd",'id'=>"pnd",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_pnd(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="peripheal" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Peripheral"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"peripheal",'id'=>"peripheal",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_peripheal(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="history_murmur" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"History of Heart Murmur"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"history_murmur",'id'=>"history_murmur",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_history_murmur(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="palpitation" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Palpitation"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"palpitation",'id'=>"palpitation",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_palpitation(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="doe" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"DOE"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"doe",'id'=>"doe",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_doe(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="edema" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Edema"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"edema",'id'=>"edema",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_edema(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="arrythmia" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Arrythmia"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"arrythmia",'id'=>"arrythmia",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_arrythmia(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="syncope" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Syncope"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"syncope",'id'=>"syncope",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_syncope(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="orthopnea" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Orthopnea"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"orthopnea",'id'=>"orthopnea",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_orthopnea(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="legpain_cramping" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Leg Pain/Cramping"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"legpain_cramping",'id'=>"legpain_cramping",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_legpain_cramping(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="heart_problem" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Heart Problem"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"heart_problem",'id'=>"heart_problem",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_heart_problem(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><?php echo smarty_function_xlt(array('t'=>"Gastrointestinal"),$_smarty_tpl);?>
</legend>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="dysphagia" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Dysphagia"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"dysphagia",'id'=>"dysphagia",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_dysphagia(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="belching" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Belching"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"belching",'id'=>"belching",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_belching(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="vomiting" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Vomiting"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"vomiting",'id'=>"vomiting",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_vomiting(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="food_intolerance" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Food Intolerance"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"food_intolerance",'id'=>"food_intolerance",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_food_intolerance(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="hematochezia" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Hematochezia"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"hematochezia",'id'=>"hematochezia",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_hematochezia(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="constipation" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Constipation"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"constipation",'id'=>"constipation",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_constipation(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="heartburn" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Heartburn"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"heartburn",'id'=>"heartburn",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_heartburn(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="flatulence" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Flatulence"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"flatulence",'id'=>"flatulence",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_flatulence(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="hematemesis" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Hematemesis"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"hematemesis",'id'=>"hematemesis",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_hematemesis(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="name="hepatitis" " class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"H/O Hepatitis"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"hepatitis",'id'=>"hepatitis",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_hepatitis(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="name="changed_bowel" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Changed Bowel"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"changed_bowel",'id'=>"changed_bowel",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_changed_bowel(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="bloating" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Bloating"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"bloating",'id'=>"bloating",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_bloating(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="nausea" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Nausea"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"nausea",'id'=>"nausea",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_nausea(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="gastro_pain" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Pain"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"gastro_pain",'id'=>"gastro_pain",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_gastro_pain(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="jaundice" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Jaundice"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"jaundice",'id'=>"jaundice",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_jaundice(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="diarrhea" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Diarrhea"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"diarrhea",'id'=>"diarrhea",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_diarrhea(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><?php echo smarty_function_xlt(array('t'=>"Genitourinary"),$_smarty_tpl);?>
 <?php echo smarty_function_xlt(array('t'=>"General"),$_smarty_tpl);?>
</legend>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="polyuria" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Polyuria"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"polyuria",'id'=>"polyuria",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_polyuria(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="hematuria" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Hematuria"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"hematuria",'id'=>"hematuria",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_hematuria(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="incontinence" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Incontinence"),$_smarty_tpl);?>
::</label>
                                <?php echo smarty_function_html_radios(array('name'=>"incontinence",'id'=>"incontinence",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_incontinence(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="polydypsia" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Polydypsia"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"polydypsia",'id'=>"polydypsia",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_polydypsia(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="frequency" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Frequency"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"frequency",'id'=>"frequency",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_frequency(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="renal_stones" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Renal Stones"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"renal_stones",'id'=>"renal_stones",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_renal_stones(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="dysuria" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Dysuria"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"dysuria",'id'=>"dysuria",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_dysuria(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="urgency" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Urgency"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"urgency",'id'=>"urgency",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_urgency(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="utis" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"UTIs"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"utis",'id'=>"utis",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_utis(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><?php echo smarty_function_xlt(array('t'=>"Genitourinary"),$_smarty_tpl);?>
 <?php echo smarty_function_xlt(array('t'=>"Male"),$_smarty_tpl);?>
</legend>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="hesitancy" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Hesitancy"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"hesitancy",'id'=>"hesitancy",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_hesitancy(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="nocturia" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Nocturia"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"nocturia",'id'=>"nocturia",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_nocturia(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="dribbling" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Dribbling"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"dribbling",'id'=>"dribbling",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_dribbling(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="erections" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Erections"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"erections",'id'=>"erections",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_erections(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="stream" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Stream"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"stream",'id'=>"stream",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_stream(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="ejaculations" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Ejaculations"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"ejaculations",'id'=>"ejaculations",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_ejaculations(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><?php echo smarty_function_xlt(array('t'=>"Genitourinary"),$_smarty_tpl);?>
 <?php echo smarty_function_xlt(array('t'=>"Female"),$_smarty_tpl);?>
</legend>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="g" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Female G"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"g",'id'=>"g",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_g(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="lc" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Female LC"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"lc",'id'=>"lc",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_lc(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="lmp" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"LMP"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"lmp",'id'=>"lmp",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_lmp(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="f_symptoms" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Symptoms"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"f_symptoms",'id'=>"f_symptoms",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_f_symptoms(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="p" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Female P"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"p",'id'=>"p",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_p(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="mearche" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Menarche"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"mearche",'id'=>"mearche",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_mearche(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="f_frequency" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Frequency"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"f_frequency",'id'=>"f_frequency",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_f_frequency(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="abnormal_hair_growth" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Abnormal Hair Growth"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"abnormal_hair_growth",'id'=>"abnormal_hair_growth",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_abnormal_hair_growth(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="ap" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Female AP"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"ap",'id'=>"ap",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_ap(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="menopause" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Menopause"),$_smarty_tpl);?>
</label>
                                <?php echo smarty_function_html_radios(array('name'=>"menopause",'id'=>"menopause",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_menopause(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="f_flow" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Flow"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"f_flow",'id'=>"f_flow",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_f_flow(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="f_hirsutism" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"F/H Female Hirsutism/Striae"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"f_hirsutism",'id'=>"f_hirsutism",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_f_hirsutism(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><?php echo smarty_function_xlt(array('t'=>"Musculoskeletal"),$_smarty_tpl);?>
</legend>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="joint_pain" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Chronic Joint Pain"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"joint_pain",'id'=>"joint_pain",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_joint_pain(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="m_warm" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Warm"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"m_warm",'id'=>"m_warm",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_m_warm(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="m_aches" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Aches"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"m_aches",'id'=>"m_aches",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_m_aches(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="swelling" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Swelling"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"swelling",'id'=>"swelling",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_swelling(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="m_stiffness" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Stiffness"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"m_stiffness",'id'=>"m_stiffness",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_m_stiffness(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="fms" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"FMS"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"fms",'id'=>"fms",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_fms(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="m_redness" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Redness"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"m_redness",'id'=>"m_redness",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_m_redness(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="muscle" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Muscle"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"muscle",'id'=>"muscle",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_muscle(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="arthritis" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Arthritis"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"arthritis",'id'=>"arthritis",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_arthritis(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><?php echo smarty_function_xlt(array('t'=>"Neurologic"),$_smarty_tpl);?>
</legend>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="loc" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"LOC"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"loc",'id'=>"loc",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_loc(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="tia" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"TIA"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"tia",'id'=>"tia",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_tia(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="paralysis" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Paralysis"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"paralysis",'id'=>"paralysis",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_paralysis(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="dementia" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Dementia"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"dementia",'id'=>"dementia",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_dementia(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="seizures" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Seizures"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"seizures",'id'=>"seizures",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_seizures(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="n_numbness" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Numbness"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"n_numbness",'id'=>"n_numbness",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_n_numbness(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="intellectual_decline" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Intellectual Decline"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"intellectual_decline",'id'=>"intellectual_decline",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_intellectual_decline(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="n_headache" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Headache"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"n_headache",'id'=>"n_headache",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_n_headache(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="stroke" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Stroke"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"stroke",'id'=>"stroke",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_stroke(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="n_weakness" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Weakness"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"n_weakness",'id'=>"n_weakness",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_n_weakness(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="memory_problems" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Memory Problems"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"memory_problems",'id'=>"memory_problems",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_memory_problems(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><?php echo smarty_function_xlt(array('t'=>"Skin"),$_smarty_tpl);?>
</legend>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="s_cancer" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Cancer"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"s_cancer",'id'=>"s_cancer",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_s_cancer(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="s_other" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Other"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"s_other",'id'=>"s_other",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_s_other(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="psoriasis" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Psoriasis"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"psoriasis",'id'=>"psoriasis",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_psoriasis(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="s_disease" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Disease"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"s_disease",'id'=>"s_disease",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_s_disease(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="s_acne" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Acne"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"s_acne",'id'=>"s_acne",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_s_acne(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><?php echo smarty_function_xlt(array('t'=>"Psychiatric"),$_smarty_tpl);?>
</legend>
                                                <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="p_diagnosis" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Psychiatric Diagnosis"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"p_diagnosis",'id'=>"p_diagnosis",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_p_diagnosis(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="anxiety" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Anxiety"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"anxiety",'id'=>"anxiety",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_anxiety(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="p_medication" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Psychiatric Medication"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"p_medication",'id'=>"p_medication",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_p_medication(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="social_difficulties" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Social Difficulties"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"social_difficulties",'id'=>"social_difficulties",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_social_difficulties(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="depression" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Depression"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"depression",'id'=>"depression",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_depression(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><?php echo smarty_function_xlt(array('t'=>"Endocrine"),$_smarty_tpl);?>
</legend>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="thyroid_problems" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Thyroid Problems"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"thyroid_problems",'id'=>"thyroid_problems",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_thyroid_problems(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="diabetes" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Diabetes"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"diabetes",'id'=>"diabetes",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_diabetes(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="abnormal_blood" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Abnormal Blood Test"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"abnormal_blood",'id'=>"abnormal_blood",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_abnormal_blood(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><?php echo smarty_function_xlt(array('t'=>"Hematologic"),$_smarty_tpl);?>
/<?php echo smarty_function_xlt(array('t'=>"Allergic"),$_smarty_tpl);?>
/<?php echo smarty_function_xlt(array('t'=>"Immunologic"),$_smarty_tpl);?>
</legend>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="anemia" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Anemia"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"anemia",'id'=>"anemia",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_anemia(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="allergies" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Allergies"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"allergies",'id'=>"allergies",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_allergies(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="hai_status" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"HAI Status"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"hai_status",'id'=>"hai_status",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_hai_status(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="fh_blood_problems" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"F/H Blood Problems"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"fh_blood_problems",'id'=>"fh_blood_problems",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_fh_blood_problems(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="frequent_illness" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Frequent Illness"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"frequent_illness",'id'=>"frequent_illness",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_frequent_illness(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group mt-3">
                                <label for="bleeding_problems" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"Bleeding Problems"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"bleeding_problems",'id'=>"bleeding_problems",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_bleeding_problems(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                            <div class="form-group mt-3">
                                <label for="hiv" class="col-form-label"><?php echo smarty_function_xlt(array('t'=>"HIV"),$_smarty_tpl);?>
:</label>
                                <?php echo smarty_function_html_radios(array('name'=>"hiv",'id'=>"hiv",'options'=>$_smarty_tpl->tpl_vars['form']->value->get_options(),'selected'=>$_smarty_tpl->tpl_vars['form']->value->get_hiv(),'separator'=>''),$_smarty_tpl);?>

                            </div>
                        </div>

                    </fieldset>
                    <div class="form-group mt-3">
                        <div class="col-sm-12 position-override">
                            <div class="btn-group" role="group">
                                <button type="submit" class="btn btn-primary btn-save" onclick="top.restoreSession();" name="Submit"><?php echo smarty_function_xlt(array('t'=>'Save'),$_smarty_tpl);?>
</button>
                                <button type="button" class="btn btn-secondary btn-cancel" onclick="top.restoreSession(); location.href='<?php echo $_smarty_tpl->tpl_vars['DONT_SAVE_LINK']->value;?>
';"><?php echo smarty_function_xlt(array('t'=>'Cancel'),$_smarty_tpl);?>
</button>
                            </div>
                            <input type="hidden" name="id" value="<?php echo attr($_smarty_tpl->tpl_vars['form']->value->get_id());?>
" />
                            <input type="hidden" name="pid" value="<?php echo attr($_smarty_tpl->tpl_vars['form']->value->get_pid());?>
" />
                            <input type="hidden" name="process" value="true" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php }
}
