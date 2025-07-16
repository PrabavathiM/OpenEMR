<?php
/* Smarty version 4.5.5, created on 2025-07-15 06:48:25
  from '/opt/lampp/htdocs/openemr/templates/documents/general_list.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6875dd99dd32b8_32228951',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '973be7dd6527c17f84ca30155301f4409ed098d4' => 
    array (
      0 => '/opt/lampp/htdocs/openemr/templates/documents/general_list.html',
      1 => 1742713071,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6875dd99dd32b8_32228951 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'/opt/lampp/htdocs/openemr/library/smarty/plugins/function.headerTemplate.php','function'=>'smarty_function_headerTemplate',),1=>array('file'=>'/opt/lampp/htdocs/openemr/library/smarty/plugins/function.xlt.php','function'=>'smarty_function_xlt',),2=>array('file'=>'/opt/lampp/htdocs/openemr/library/smarty/plugins/function.xla.php','function'=>'smarty_function_xla',),3=>array('file'=>'/opt/lampp/htdocs/openemr/library/smarty/plugins/function.xlj.php','function'=>'smarty_function_xlj',),4=>array('file'=>'/opt/lampp/htdocs/openemr/library/smarty/plugins/function.datetimepickerSupport.php','function'=>'smarty_function_datetimepickerSupport',),));
?>
<html>
<head>

<?php echo smarty_function_headerTemplate(array('assets'=>'datetime-picker|select2'),$_smarty_tpl);?>


<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['GLOBALS']->value['assets_static_relative'];?>
/dropzone/dist/dropzone.css">

<style>
.select2-selection {
height: 35px!important;
border-radius: 4px 0 0 4px!important;
}
.warn_diagnostic {
    margin: 10px auto 10px auto;
    color: rgb(255, 0, 0);
    font-size: 1.5rem;
}
.fixed-height {
    min-width: 200px;
    padding: 1px;
    max-height: 35%;
    overflow: auto;
}
.select2-container {
	min-width: 20vw !important;
}
</style>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['GLOBALS']->value['webroot'];?>
/library/js/DocumentTreeMenu.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['GLOBALS']->value['assets_static_relative'];?>
/dropzone/dist/dropzone.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
	function callTemplateModule(patient_id, cuser, templateName, id, edit) {
		top.restoreSession();
        let callUrl = '<?php echo $_smarty_tpl->tpl_vars['GLOBALS']->value['webroot'];?>
/portal/patient/onsitedocuments?is_module=1' +
            '&catid=' + <?php echo js_url($_smarty_tpl->tpl_vars['category_id']->value);?>
 +
            '&pid=' + encodeURIComponent(patient_id) +
            '&cuser=' + encodeURIComponent(cuser) +
            '&recid=' + encodeURIComponent(id) +
            '&edit=' + encodeURIComponent(edit) +
            '&new=' + encodeURIComponent(templateName) +
            '&referer_flag=' + encodeURIComponent(isNewRefererFlag)
		location.assign(callUrl);
	}
<?php echo '</script'; ?>
>
<title id="new-doc-title"><?php echo smarty_function_xlt(array('t'=>'Documents'),$_smarty_tpl);?>
</title>
</head>
<!-- ViSolve - Call expandAll function on loading of the page if global value 'expand_document' is set -->
<?php if ($_smarty_tpl->tpl_vars['GLOBALS']->value['expand_document_tree']) {?>
  <body onload="javascript:objTreeMenu_1.expandAll();return false;">
<?php } else { ?>
  <body>
<?php }?>
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-sm-2">
            <div class="title">
                <h2 id="new-title"><?php echo smarty_function_xlt(array('t'=>'Documents'),$_smarty_tpl);?>

                    <a class="new-doc-hide" href='interface/patient_file/summary/demographics.php' onclick='top.restoreSession()' title="<?php echo smarty_function_xla(array('t'=>'Go Back'),$_smarty_tpl);?>
">
                        <i id='advanced-tooltip' class='fa fa-solid fa-backward fa-sm' aria-hidden='true'></i>
                    </a>
                </h2>
            </div>
        </div>
        <div class="form-inline float-right col-sm-10" id="patientSearch">
            <label for="selectPatient" class="mr-2"><h5><?php echo smarty_function_xlt(array('t'=>'Search and Select Patient'),$_smarty_tpl);?>
</h5></label>
            <div class="input-group">
                <select id="selectPatient" class="form-control" type="text" data-placeholder="<?php echo attr($_smarty_tpl->tpl_vars['place_hld']->value);?>
">
                    <option></option>
                </select>
                <div class="input-group-append">
                    <button id="pid" type="button" class="btn btn-primary pBtn">&times;</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
		<div class="col-sm-3">
			<div id="documents_list">
				<fieldset>
                    <legend><?php echo smarty_function_xlt(array('t'=>'Documents List'),$_smarty_tpl);?>
</legend>
                    <div class="pl-3">
                        <a id="list_collapse" href="#" onclick="javascript:objTreeMenu_1.collapseAll();return false;">&nbsp;(<?php echo smarty_function_xlt(array('t'=>'Collapse all'),$_smarty_tpl);?>
)</a>
                        <?php echo $_smarty_tpl->tpl_vars['tree_html']->value;?>

                    </div>
			    </fieldset>
            </div>
		</div>
		<div class="col-sm-9">
			<div id="documents_actions">
				<fieldset>
					<legend><?php echo smarty_function_xlt(array('t'=>'Document Uploader/Viewer'),$_smarty_tpl);?>
</legend>
                    <div style="padding: 0 10px">
						<?php if (!empty($_smarty_tpl->tpl_vars['message']->value)) {?>
							<div class='text' style="margin-bottom:-10px; margin-top:-8px; padding:10px;"><i><?php echo text($_smarty_tpl->tpl_vars['message']->value);?>
</i></div><br />
						<?php }?>
						<?php if (!empty($_smarty_tpl->tpl_vars['messages']->value)) {?>
							<div class='text' style="margin-bottom:-10px; margin-top:-8px; padding:10px;"><i><?php echo text($_smarty_tpl->tpl_vars['messages']->value);?>
</i></div><br />
						<?php }?>
                        <?php if (!empty($_smarty_tpl->tpl_vars['activity']->value)) {
echo $_smarty_tpl->tpl_vars['activity']->value;
}?>
					</div>
				</fieldset>
			</div>
		</div>
	</div>
</div><!--end of container div-->

<?php echo '<script'; ?>
>
const curpid = <?php echo js_escape($_smarty_tpl->tpl_vars['cur_pid']->value);?>
;
const curpat = <?php echo js_escape($_smarty_tpl->tpl_vars['place_hld']->value);?>
;
const newVersion = <?php echo js_escape($_smarty_tpl->tpl_vars['is_new']->value);?>
;
const demoPid = <?php echo js_escape($_smarty_tpl->tpl_vars['demo_pid']->value);?>
;
const inUseMsg = <?php echo js_escape($_smarty_tpl->tpl_vars['used_msg']->value);?>
;
const newTitle= <?php echo js_escape($_smarty_tpl->tpl_vars['new_title']->value);?>
;
let isNewRefererFlag = <?php echo js_escape($_smarty_tpl->tpl_vars['is_new_referer']->value);?>
;

if(curpid == demoPid && !newVersion && !isNewRefererFlag){
    $("#patientSearch").hide();
} else{
    isNewRefererFlag = 1;
    $("#pid").text(curpid + ' ' + curpat);
    $(".new-doc-hide").hide();
    $("#new-doc-title").text(newTitle);
    $("#new-title").text(newTitle);
}
$(function () {
    $("#selectPatient").select2({
        ajax: {
            url: "<?php echo $_smarty_tpl->tpl_vars['GLOBALS']->value['webroot'];?>
/library/ajax/document_helpers.php",
            dataType: 'json',
            data: function(params) {
                return {
                  csrf_token_form: <?php echo js_escape($_smarty_tpl->tpl_vars['CSRF_TOKEN_FORM']->value);?>
,
                  term: params.term
                }
            },
            processResults: function(data) {
                return  {
                    results: $.map(data, function(item, index) {
                        return {
                            text: item.label,
                            id: index,
                            value: item.value,
                            label: item.label
                        }
                    })
                };
                return x;
            },
            cache: true
        },
        minimumInputLength: 3
    });

    $('#selectPatient').on('select2:select', function (e) {
        e.preventDefault();
        if (e.params.data.value == '00' && !e.params.data.label.match(<?php echo smarty_function_xlj(array('t'=>"Reset"),$_smarty_tpl);?>
)){
            alert(inUseMsg);
            location.reload();
        }
        $(this).val(e.params.data.label);
        location.href  = "<?php echo $_smarty_tpl->tpl_vars['GLOBALS']->value['webroot'];?>
/controller.php?document&list&patient_id=" + encodeURIComponent(e.params.data.value) + "&patient_name=" + encodeURIComponent(e.params.data.label);
    });

    $(".pBtn").click(function(event) {
        location.href  = "<?php echo $_smarty_tpl->tpl_vars['GLOBALS']->value['webroot'];?>
/controller.php?document&list&patient_id=00"; // reset
    });
});
$("#list_collapse").detach().appendTo("#objTreeMenu_1_node_1 nobr");

// functions to view and pop out documents as needed.
$(function () {
    $("img[id^='icon_objTreeMenu_']").tooltip({
        items: $("img[src*='file3.png']"),
        content: <?php echo smarty_function_xlj(array('t'=>"Double Click on this icon to pop up document in a new viewer."),$_smarty_tpl);?>

    });

    $("img[id^='icon_objTreeMenu_']").on('dblclick', function (e) {
        let popsrc = $(this).next("a").attr('href') || '';
        let diview = $(this).next("a").text();
        let dflg = false;
        if (!popsrc.includes('&view&')) {
            return false;
        } else if (diview.toLowerCase().includes('.dcm') || diview.toLowerCase().includes('.zip')) {
            popsrc = "<?php echo $_smarty_tpl->tpl_vars['GLOBALS']->value['webroot'];?>
/library/dicom_frame.php?web_path=" + popsrc;
            dflg = true;
        }
        popsrc = popsrc.replace('&view&', '&retrieve&') + 'as_file=false';
        let poContentModal = function () {
            let wname = '_' + Math.random().toString(36).substr(2, 6);
            let opt = "menubar=no,location=no,resizable=yes,scrollbars=yes,status=no";
            window.open(popsrc, wname, opt);
        };

        let btnText = <?php echo smarty_function_xlj(array('t'=>"Full Screen"),$_smarty_tpl);?>
;
        let btnClose = <?php echo smarty_function_xlj(array('t'=>"Close"),$_smarty_tpl);?>
;
        let size = 'modal-xl';
        dlgopen(popsrc, 'popdoc', size, 700, '', '', {
            buttons: [
                { text: btnText, close: true, style: 'primary btn-sm', click: poContentModal },
                { text: btnClose, close: true, style: 'secondary btn-sm' }
            ],
            allowResize: true,
            allowDrag: true,
            dialogId: '',
            type: 'iframe'
        });
        return false;
    });
});

$(function () {
    <?php echo smarty_function_datetimepickerSupport(array(),$_smarty_tpl);?>

});

<?php echo '</script'; ?>
>
</body>
</html>
<?php }
}
