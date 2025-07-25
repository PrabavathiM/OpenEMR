<?php
/* Smarty version 4.5.5, created on 2025-07-21 13:46:25
  from '/opt/lampp/htdocs/openemr/templates/documents/general_upload.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_687e2891d70207_53227565',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'af7f1524218a613a8e4753f999bf8a492831d22b' => 
    array (
      0 => '/opt/lampp/htdocs/openemr/templates/documents/general_upload.html',
      1 => 1742713071,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_687e2891d70207_53227565 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/opt/lampp/htdocs/openemr/library/smarty/plugins/function.xlt.php','function'=>'smarty_function_xlt',),1=>array('file'=>'/opt/lampp/htdocs/openemr/library/smarty/plugins/function.xla.php','function'=>'smarty_function_xla',),2=>array('file'=>'/opt/lampp/htdocs/openemr/library/smarty/plugins/function.xl.php','function'=>'smarty_function_xl',),));
?>

<div class="col-sm-12">
    <form class="form" method="post" enctype="multipart/form-data" action="<?php echo $_smarty_tpl->tpl_vars['FORM_ACTION']->value;?>
" onsubmit="return top.restoreSession()">
        <input type="hidden" name="MAX_FILE_SIZE" value="64000000" />
        <h3><?php if (!empty($_smarty_tpl->tpl_vars['error']->value)) {
echo nl2br((string) text($_smarty_tpl->tpl_vars['error']->value), (bool) 1);
}?></h3>
        <?php if ((!($_smarty_tpl->tpl_vars['patient_id']->value > 0))) {?>
        <div class="text text-danger">
            <?php echo smarty_function_xlt(array('t'=>"IMPORTANT: This upload tool is only for uploading documents on patients that are not yet entered into the system. To upload files for patients whom already have been entered into the system, please use the upload tool linked within the Patient Summary screen."),$_smarty_tpl);?>

            <br />
        </div>
        <?php }?>
        <div class="text">
            <?php echo smarty_function_xlt(array('t'=>"NOTE: Uploading files with duplicate names will cause the files to be automatically renamed (for example, file.jpg will become file.1.jpg). Filenames are considered unique per patient, not per category."),$_smarty_tpl);?>

            <br />
        </div>
        <div class="font-weight-bold">
            <?php echo smarty_function_xlt(array('t'=>"Upload Document"),$_smarty_tpl);?>
 <?php if ($_smarty_tpl->tpl_vars['category_name']->value) {?> <?php echo smarty_function_xlt(array('t'=>"to category"),$_smarty_tpl);?>
 '<?php echo text($_smarty_tpl->tpl_vars['category_name']->value);?>
'<?php }?>
        </div>
        <div class="form-group">
            <div class="form-group">
                <p>(<small><?php echo smarty_function_xlt(array('t'=>"Multiple files can be uploaded at one time by selecting them using CTRL+Click or SHIFT+Click."),$_smarty_tpl);?>
</small>)</p>
                <span><?php echo smarty_function_xlt(array('t'=>"Source File Path"),$_smarty_tpl);?>
:</span>
                <input type="file" class="form-control-file" name="file[]" id="source-name" multiple="true" />
            </div>
            <div class="form-group">
                <span>(<small><?php echo smarty_function_xlt(array('t'=>"Click below to Zip a Directory of image slices."),$_smarty_tpl);?>
</small>)</span>
                <input type="file" class="form-control-file" name="dicom_folder[]" id="dicom_folder" multiple directory="" webkitdirectory="" moxdirectory="" />
                <input type="text" class="form-control" name="destination" placeholder='<?php echo smarty_function_xla(array('t'=>"Optional Destination or Dicom Study Name"),$_smarty_tpl);?>
' title="<?php echo smarty_function_xla(array('t'=>'Leave Blank To Keep Original Filename'),$_smarty_tpl);?>
" id="destination-name" />
            </div>
            <?php if (!$_smarty_tpl->tpl_vars['hide_encryption']->value) {?>
            <div class="form-group">
                <label role="button" title="<?php echo smarty_function_xla(array('t'=>'Check the box if this is an encrypted file'),$_smarty_tpl);?>
"><?php echo smarty_function_xlt(array('t'=>"Is The File Encrypted?"),$_smarty_tpl);?>
:
                    <input type="checkbox" class="form-check-inline" name="encrypted" title="<?php echo smarty_function_xla(array('t'=>'Check the box if this is an encrypted file'),$_smarty_tpl);?>
" id="encrypted" />
                </label>
                <input type="text" class="form-control" name="passphrase" placeholder="<?php echo smarty_function_xla(array('t'=>'Pass Phrase'),$_smarty_tpl);?>
" title="<?php echo smarty_function_xla(array('t'=>'Pass phrase to decrypt document'),$_smarty_tpl);?>
" id="passphrase" />
                <p><i><?php echo smarty_function_xlt(array('t'=>'Supports AES-256-CBC encryption/decryption only.'),$_smarty_tpl);?>
</i></p>
            </div>
            <?php }?>
            <div>
                <input type="submit" class="btn btn-primary" value="<?php echo smarty_function_xl(array('t'=>attr('Upload')),$_smarty_tpl);?>
" />
            </div>
        </div>
        <input type="hidden" name="patient_id" value="<?php echo attr($_smarty_tpl->tpl_vars['patient_id']->value);?>
" />
        <input type="hidden" name="category_id" value="<?php echo attr($_smarty_tpl->tpl_vars['category_id']->value);?>
" />
        <input type="hidden" name="process" value="<?php echo attr($_smarty_tpl->tpl_vars['PROCESS']->value);?>
" />
        <?php if (!empty($_smarty_tpl->tpl_vars['file']->value)) {?>
        <div class="form-group">
            <label class="font-weight-bold">
                <?php echo smarty_function_xlt(array('t'=>'Uploaded'),$_smarty_tpl);?>

            </label>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['file']->value, 'onefile');
$_smarty_tpl->tpl_vars['onefile']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['onefile']->value) {
$_smarty_tpl->tpl_vars['onefile']->do_else = false;
?>
            <p>
                <?php if ($_smarty_tpl->tpl_vars['error']->value) {?><i><?php echo nl2br((string) text($_smarty_tpl->tpl_vars['error']->value), (bool) 1);?>
</i><br /><?php }?>
                <?php echo smarty_function_xlt(array('t'=>'Name'),$_smarty_tpl);?>
: <?php echo text($_smarty_tpl->tpl_vars['onefile']->value->get_name());?>
<br /><br />
            </p>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
        <?php }?>
    </form>
    <!-- Drag and drop uploader -->
    <div class="row">
        <div class="col-sm mt-1" id="autouploader">
            <form method="post" enctype="multipart/form-data" action="<?php echo $_smarty_tpl->tpl_vars['GLOBALS']->value['webroot'];?>
/library/ajax/upload.php?patient_id=<?php echo attr_url($_smarty_tpl->tpl_vars['patient_id']->value);?>
&parent_id=<?php echo attr_url($_smarty_tpl->tpl_vars['category_id']->value);?>
&csrf_token_form=<?php echo attr_url($_smarty_tpl->tpl_vars['CSRF_TOKEN_FORM']->value);?>
" class="dropzone">
                <div class="dz-message" data-dz-message><span><?php echo smarty_function_xlt(array('t'=>'Drop files here to upload'),$_smarty_tpl);?>
</span></div>
                <input type="hidden" name="MAX_FILE_SIZE" value="64000000" />
            </form>
        </div>
    </div>
    <!-- Section for document template download -->
    <form class="form-inline" method='post' action='interface/patient_file/download_template.php' onsubmit='return top.restoreSession()'>
        <input type="hidden" name="csrf_token_form" value="<?php echo attr($_smarty_tpl->tpl_vars['CSRF_TOKEN_FORM']->value);?>
" />
        <input type='hidden' name='patient_id' value='<?php echo attr($_smarty_tpl->tpl_vars['patient_id']->value);?>
' />
        <div class='form-group col-sm-4'>
            <p class='my-1'><?php echo smarty_function_xlt(array('t'=>"Download document template for this patient and visit"),$_smarty_tpl);?>
</p>
            <div class="input-group">
                <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary btn-download"><?php echo smarty_function_xlt(array('t'=>"Fetch"),$_smarty_tpl);?>
</button>
                </span>
                <select class="form-control" name='form_filename'><?php echo $_smarty_tpl->tpl_vars['TEMPLATES_LIST']->value;?>
</select>
            </div>
        </div>
        <!-- Section for portal document templates -->
        <div class='for-group-group col'>
            <p class='my-1'><?php echo smarty_function_xlt(array('t'=>"Patient Document Template Forms"),$_smarty_tpl);?>
</p>
            <div class='input-group'>
                <div class="dropdown">
                    <a class="dropdown-toggle nav-link btn btn-outline-primary" href="#" role="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo smarty_function_xlt(array('t'=>"Open Patient Template"),$_smarty_tpl);?>

                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                        <?php echo $_smarty_tpl->tpl_vars['TEMPLATES_LIST_PATIENT']->value;?>

                    </div>
                </div>
                <span class="input-group-append">
                    <button type="button" class="btn btn-primary" onclick="callTemplateModule(<?php echo attr_url($_smarty_tpl->tpl_vars['patient_id']->value);?>
, '-patient-', '', 0, 0)"><?php echo smarty_function_xlt(array('t'=>"or Open Module"),$_smarty_tpl);?>
</button>
                </span>
            </div>
        </div>
    </form>
</div>
<?php }
}
