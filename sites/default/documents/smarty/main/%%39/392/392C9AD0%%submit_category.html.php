<?php /* Smarty version 2.6.33, created on 2025-08-04 07:31:22
         compiled from default/admin/submit_category.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'default/admin/submit_category.html', 4, false),array('function', 'headerTemplate', 'default/admin/submit_category.html', 26, false),array('modifier', 'text', 'default/admin/submit_category.html', 27, false),array('modifier', 'attr', 'default/admin/submit_category.html', 54, false),)), $this); ?>
<!-- main navigation -->
<?php echo smarty_function_config_load(array('file' => "lang.".($this->_tpl_vars['USER_LANG'])), $this);?>


<script src="modules/<?php echo $this->_tpl_vars['pcDir']; ?>
/pnincludes/AnchorPosition.js"></script>
<script src="modules/<?php echo $this->_tpl_vars['pcDir']; ?>
/pnincludes/PopupWindow.js"></script>
<script src="modules/<?php echo $this->_tpl_vars['pcDir']; ?>
/pnincludes/ColorPicker2.js"></script>
<script>
    var cp = new ColorPicker('window');
    // Runs when a color is clicked
    function pickColor(color) {
        document.getElementById(field).value = color;
    }

    var field;

    function pick(anchorname, target) {
        field = target;
        cp.show(anchorname);
    }
</script>

<html>
<head>
    <?php echo smarty_function_headerTemplate(array(), $this);?>

    <title><?php echo ((is_array($_tmp=$this->_tpl_vars['_EDIT_PC_CONFIG_CATDETAILS'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
</title>
</head>
<body>
<form name="cats" action="<?php echo $this->_tpl_vars['action']; ?>
" method="post" enctype="application/x-www-form-urlencoded">
<!-- GATHER NEW DATA START -->
	<table class="table table-bordered" cellpadding="5" cellspacing="0">
			<tr>
				<td>
					<table class='table table-bordered w-100'>
						<tr>
							<td colspan='5'>
								<table class="table w-100">
                  <tr>
                    <th class="text-center"><?php echo ((is_array($_tmp=$this->_tpl_vars['_PC_NEW_CAT_TITLE_S'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
</th>
                  </tr>
								</table>
							</td>
						</tr>
						<tr>
							<td>
								<table class='table' cellspacing='8' cellpadding='2'>
            						<tr>
            							<td class="align-top text-left">
            								<input type="hidden" name="newid" value=""/>
            								<?php echo ((is_array($_tmp=$this->_tpl_vars['_PC_CAT_NAME'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
:<br />
            								&nbsp;<input type="text" class="form-control" name="newname" value="" size="20"/><br />
            								<?php echo ((is_array($_tmp=$this->_tpl_vars['_PC_CAT_TYPE'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
:<br />
            								&nbsp;<select name="new<?php echo ((is_array($_tmp=$this->_tpl_vars['InputCatType'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" class="form-control">
               									<?php $_from = $this->_tpl_vars['cat_type']; if (($_from instanceof StdClass) || (!is_array($_from) && !is_object($_from))) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['repeat']):
?>
                    								<option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['repeat']['value'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" >
                    									<?php echo ((is_array($_tmp=$this->_tpl_vars['repeat']['name'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>

                    								</option>
                								<?php endforeach; endif; unset($_from); ?>
                								</select>
            							</td>
            							<td class="align-top text-left">
											<?php echo ((is_array($_tmp=$this->_tpl_vars['_PC_CAT_CONSTANT_ID'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
:<br />
											&nbsp;<input type="text" class="form-control" name="newconstantid" value="" size="20"/><br />
                							<?php echo ((is_array($_tmp=$this->_tpl_vars['_PC_CAT_COLOR'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
:<br />
                							&nbsp;<input type="color" name="newcolor" id='newcolor' value="var(--white)" size="10"/>
                                            [<a href="javascript:void(0);" onClick="pick('pick','newcolor');return false;" NAME="pick" ID="pick"><?php echo ((is_array($_tmp=$this->_tpl_vars['_PC_COLOR_PICK_TITLE'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
</a>]
            							</td>
            							<td class="align-top text-left">
                							<?php echo ((is_array($_tmp=$this->_tpl_vars['_PC_CAT_DESC'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
:<br />
                							&nbsp;<textarea class="form-control" name="newdesc" rows="3" cols="20"></textarea>
            							</td>
            							<td class="align-top text-left">
            								<?php echo ((is_array($_tmp=$this->_tpl_vars['ALL_DAY_CAT_TITLE'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
<br />
            								&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['ALL_DAY_CAT_YES'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
<input type="radio" name="new<?php echo ((is_array($_tmp=$this->_tpl_vars['InputAllDay'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['ValueAllDay'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
"/>
            								<br />
            								&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['ALL_DAY_CAT_NO'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
<input type="radio" name="new<?php echo ((is_array($_tmp=$this->_tpl_vars['InputAllDay'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['ValueAllDayNo'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" checked />
            							</td>
            							<td class="align-top text-left">
            								<?php echo ((is_array($_tmp=$this->_tpl_vars['_PC_CAT_DUR'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
:<br />
                							&nbsp;	<?php echo ((is_array($_tmp=$this->_tpl_vars['DurationHourTitle'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>

                							<input type="text" class="form-control" name="new<?php echo ((is_array($_tmp=$this->_tpl_vars['InputDurationHour'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" value="0" size="4" />
                							<br />
                							&nbsp;	<?php echo ((is_array($_tmp=$this->_tpl_vars['DurationMinTitle'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>

                							<input type="text" class="form-control" name="new<?php echo ((is_array($_tmp=$this->_tpl_vars['InputDurationMin'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" value="0" size="4" />
                						</td>
                						<td class="align-top text-left">
                							<?php echo ((is_array($_tmp=$this->_tpl_vars['_PC_ACTIVE'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
:<br />
                							<input type="radio" name="newactive" value="1"/> <?php echo ((is_array($_tmp=$this->_tpl_vars['ActiveTitleYes'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
<br />
                							<input type="radio" name="newactive" value="0"/> <?php echo ((is_array($_tmp=$this->_tpl_vars['ActiveTitleNo'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
<br />
                						</td>
                						<td class="align-top text-left">
                							<?php echo ((is_array($_tmp=$this->_tpl_vars['_PC_SEQ'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
:<br />
                							<input type="text" class="form-control" name="newsequence" value="0" size="4" />
										</td>
										<td vclass="align-top text-left">
											<?php echo ((is_array($_tmp=$this->_tpl_vars['_ACO'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
:<br />
											&nbsp;<select name="new<?php echo ((is_array($_tmp=$this->_tpl_vars['InputACO'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" class="form-control">
               									<?php $_from = $this->_tpl_vars['ACO_List']; if (($_from instanceof StdClass) || (!is_array($_from) && !is_object($_from))) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['acoGroupKey'] => $this->_tpl_vars['acoGroup']):
?>
													<optgroup label="<?php echo ((is_array($_tmp=$this->_tpl_vars['acoGroupKey'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
">
													<?php $_from = $this->_tpl_vars['acoGroup']; if (($_from instanceof StdClass) || (!is_array($_from) && !is_object($_from))) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['aco']):
?>
														<option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['aco']['value'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
">
															<?php echo ((is_array($_tmp=$this->_tpl_vars['aco']['name'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>

														</option>
													<?php endforeach; endif; unset($_from); ?>
													</optgroup>
                								<?php endforeach; endif; unset($_from); ?>
											</select>
										</td>

            						</tr>
            					</table>
            				</td>
            			</tr>
						<tr>
							<td>
            					<table class='table w-100'>
            						<tr>
                						<td colspan="4" class="align-top text-left">
                							<?php echo ((is_array($_tmp=$this->_tpl_vars['RepeatingHeader'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>

                						</td>
                					</tr>
            						<tr>
                						<td colspan="4" class="align-middle text-left">
                							<input type="radio" name="new<?php echo ((is_array($_tmp=$this->_tpl_vars['InputNoRepeat'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['ValueNoRepeat'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" />
                							<?php echo ((is_array($_tmp=$this->_tpl_vars['NoRepeatTitle'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
<br />
                							<input type="radio" name="new<?php echo ((is_array($_tmp=$this->_tpl_vars['InputRepeat'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['ValueRepeat'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
"/>
                							<?php echo ((is_array($_tmp=$this->_tpl_vars['RepeatTitle'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>

                							<input type="text" name="new<?php echo ((is_array($_tmp=$this->_tpl_vars['InputRepeatFreq'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" value="0" size="4" class="form-control" />

                							<select name="new<?php echo ((is_array($_tmp=$this->_tpl_vars['InputRepeatFreqType'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" class="form-control">
                								<?php $_from = $this->_tpl_vars['repeat_freq_type']; if (($_from instanceof StdClass) || (!is_array($_from) && !is_object($_from))) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['repeat']):
?>
                    								<option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['repeat']['value'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
">
                    									<?php echo ((is_array($_tmp=$this->_tpl_vars['repeat']['name'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>

                    								</option>
                								<?php endforeach; endif; unset($_from); ?>
                							</select>
               								<br />
	                						<input type="radio" name="new<?php echo ((is_array($_tmp=$this->_tpl_vars['InputRepeatOn'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['ValueRepeatOn'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" />
	                						 <?php echo ((is_array($_tmp=$this->_tpl_vars['RepeatOnTitle'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
:<br />
                                			<select name="new<?php echo ((is_array($_tmp=$this->_tpl_vars['InputRepeatOnNum'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" class="form-control">
                                				<?php $_from = $this->_tpl_vars['repeat_on_num']; if (($_from instanceof StdClass) || (!is_array($_from) && !is_object($_from))) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['repeat']):
?>
                    								<option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['repeat']['value'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
">
                    									<?php echo ((is_array($_tmp=$this->_tpl_vars['repeat']['name'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>

                    								</option>
                    							<?php endforeach; endif; unset($_from); ?>
                							</select>
                							<select name="new<?php echo ((is_array($_tmp=$this->_tpl_vars['InputRepeatOnDay'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" class="form-control">
               									<?php $_from = $this->_tpl_vars['repeat_on_day']; if (($_from instanceof StdClass) || (!is_array($_from) && !is_object($_from))) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['repeat']):
?>
                    								<option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['repeat']['value'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" >
                    									<?php echo ((is_array($_tmp=$this->_tpl_vars['repeat']['name'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>

                    								</option>
                								<?php endforeach; endif; unset($_from); ?>
                							</select>
                							&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['OfTheMonthTitle'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
&nbsp;
                							<input type="text" class="form-control" name="new<?php echo ((is_array($_tmp=$this->_tpl_vars['InputRepeatOnFreq'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" value="0" size="4" />
                							<?php echo ((is_array($_tmp=$this->_tpl_vars['MonthsTitle'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>

											<br />
											</td>
											<td >
											<!--End Date Start-->
											<table class='table w-100'>
												<tr>
													<td>
													<?php echo ((is_array($_tmp=$this->_tpl_vars['NoEndDateTitle'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>

                										<input type="radio" name="new<?php echo ((is_array($_tmp=$this->_tpl_vars['InputEndOn'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['ValueNoEnd'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" checked />
                										<br />
														<?php echo ((is_array($_tmp=$this->_tpl_vars['EndDateTitle'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>

                										<input type="radio" name="new<?php echo ((is_array($_tmp=$this->_tpl_vars['InputEndOn'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['ValueEnd'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
"/>
                										<br />

                										<input type="text" class="form-control" name="new<?php echo ((is_array($_tmp=$this->_tpl_vars['InputEndDateFreq'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" value="0" size="4" />

                										<select name="new<?php echo ((is_array($_tmp=$this->_tpl_vars['InputEndDateFreqType'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" class="form-control">
                											<?php $_from = $this->_tpl_vars['repeat_freq_type']; if (($_from instanceof StdClass) || (!is_array($_from) && !is_object($_from))) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['repeat']):
?>
                    											<option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['repeat']['value'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" <?php echo $this->_tpl_vars['repeat']['selected']; ?>
>
                    												<?php echo ((is_array($_tmp=$this->_tpl_vars['repeat']['name'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>

                    											</option>
                											<?php endforeach; endif; unset($_from); ?>
                										</select>
                										<br />
                									</td>
                								</tr>

                							</table>
                					 		<!-- /End Date End -->
               							 </td>

           							 </tr>

            					</table>
            				</td>
            			</tr>
            			 <tr><td class="align-bottom"><?php echo $this->_tpl_vars['FormSubmit']; ?>
</td></tr>
            		</table>
            	</td>
            </tr>
	</table>
<table class="table table-bordered" cellpadding="5" cellspacing="0">
	<!--START REPEATING SECTION -->
		<?php $_from = $this->_tpl_vars['all_categories']; if (($_from instanceof StdClass) || (!is_array($_from) && !is_object($_from))) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat']):
?>
			<tr>
				<td>
					<table class='table table-bordered w-100'>
						<tr>
							<td colspan='5'>
                <table class='table table-borderless w-100'>
                  <tr bgcolor="<?php echo $this->_tpl_vars['cat']['color']; ?>
">
                    <td class="text-left">
                      &nbsp;
                    </td>
                    <th class="text-center"><?php echo ((is_array($_tmp=$this->_tpl_vars['_PC_REP_CAT_TITLE_S'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['id'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
</th>
                    <td class="text-right">
                      <?php if ($this->_tpl_vars['cat']['id'] > 4 && $this->_tpl_vars['cat']['id'] != 8 && $this->_tpl_vars['cat']['id'] != 11 && $this->_tpl_vars['cat']['id'] != 6 && $this->_tpl_vars['cat']['id'] != 7): ?>
                      <!-- allow non-required categories to be deleted -->
                      <input type="checkbox" name="del[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['id'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
"/>
                      <?php echo ((is_array($_tmp=$this->_tpl_vars['_PC_CAT_DELETE'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>

                      <?php endif; ?>
                      &nbsp;
                    </td>
                  </tr>
                </table>
							</td>
						</tr>
						<tr>
							<td>
								<table class='table'>
            						<tr>
            							<td class="align-top text-left">
            								<input type="hidden" name="id[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['id'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
"/>
            								<?php echo ((is_array($_tmp=$this->_tpl_vars['_PC_CAT_NAME'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
:<br />
            								&nbsp;<input type="text" class="form-control" name="name[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['name'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" size="20"/><br />
            								<?php echo ((is_array($_tmp=$this->_tpl_vars['_PC_CAT_TYPE'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
:<br />
            								&nbsp;<select name="<?php echo ((is_array($_tmp=$this->_tpl_vars['InputCatType'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
[]" class="form-control">
               									<?php $_from = $this->_tpl_vars['cat_type']; if (($_from instanceof StdClass) || (!is_array($_from) && !is_object($_from))) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['repeat']):
?>
                    								<option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['repeat']['value'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" <?php if ($this->_tpl_vars['cat']['value_cat_type'] == $this->_tpl_vars['repeat']['value']): ?>selected <?php endif; ?>>
                    									<?php echo ((is_array($_tmp=$this->_tpl_vars['repeat']['name'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>

                    								</option>
                								<?php endforeach; endif; unset($_from); ?>
                								</select>
            							</td>
                          <?php if (( $this->_tpl_vars['globals']['translate_appt_categories'] && ( $_SESSION['language_choice'] > 1 ) )): ?>
                          <td class="align-top text-left"><?php echo ((is_array($_tmp=$this->_tpl_vars['_PC_CAT_NAME_XL'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
:<br />
                            <span class="text-success"><?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['nameTranslate'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
</span>
                          </td>
                          <?php endif; ?>
            							<td class="align-top text-left">
											<?php echo ((is_array($_tmp=$this->_tpl_vars['_PC_CAT_CONSTANT_ID'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
:<br />
											&nbsp;<input type="text" class="form-control" name="constantid[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['constantid'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" size="20"/><br />
                							<?php echo ((is_array($_tmp=$this->_tpl_vars['_PC_CAT_COLOR'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
:<br />
                							&nbsp;<input type="color" name="color[]" id='color<?php echo '['; ?>
<?php echo $this->_tpl_vars['cat']['id']; ?>
<?php echo ']'; ?>
' value="<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['color'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" size="10"/>
                                            [<a href="javascript:void(0);" onClick="pick('pick','color<?php echo '['; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['id'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo ']'; ?>
');return false;" NAME="pick" ID="pick"><?php echo ((is_array($_tmp=$this->_tpl_vars['_PC_COLOR_PICK_TITLE'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
</a>]
            							</td>
            							<td class="align-top text-left">
                							<?php echo ((is_array($_tmp=$this->_tpl_vars['_PC_CAT_DESC'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
:<br />
                							&nbsp;<textarea class="form-control" name="desc[]" rows="3" cols="20"><?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['desc'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
</textarea>
            							</td>
                          <?php if (( $this->_tpl_vars['globals']['translate_appt_categories'] && ( $_SESSION['language_choice'] > 1 ) )): ?>
                          <td class="align-top text-left"><?php echo ((is_array($_tmp=$this->_tpl_vars['_PC_CAT_DESC_XL'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
:<br />
                            <span class="text-success"><?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['descTranslate'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
</span>
                          </td>
                          <?php endif; ?>
            							<td class="align-top text-left">
            								<?php echo ((is_array($_tmp=$this->_tpl_vars['ALL_DAY_CAT_TITLE'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
<br />
            								<?php echo ((is_array($_tmp=$this->_tpl_vars['ALL_DAY_CAT_YES'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>

            								<input type="radio" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['InputAllDay'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo '['; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['id'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo ']'; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['ValueAllDay'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" <?php if ($this->_tpl_vars['cat']['end_all_day'] == 1): ?>checked<?php endif; ?>/>
            								<br />
            								&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['ALL_DAY_CAT_NO'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
<input type="radio" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['InputAllDay'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo '['; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['id'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo ']'; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['ValueAllDayNo'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" <?php if ($this->_tpl_vars['cat']['end_all_day'] == 0): ?>checked<?php endif; ?>/>
            							</td>
                					<td class="align-top text-left">
            								<?php echo ((is_array($_tmp=$this->_tpl_vars['_PC_CAT_DUR'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
:<br />
                							&nbsp;	<?php echo ((is_array($_tmp=$this->_tpl_vars['DurationHourTitle'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>

                							<input type="text" class="form-control" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['InputDurationHour'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo '['; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['id'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo ']'; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['event_durationh'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" size="4" />
                							<br />
                							&nbsp;	<?php echo ((is_array($_tmp=$this->_tpl_vars['DurationMinTitle'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>

                							<input type="text" class="form-control" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['InputDurationMin'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo '['; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['id'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo ']'; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['event_durationm'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" size="4" />
                					</td>
                					<td class="align-top text-left">
                							<?php echo ((is_array($_tmp=$this->_tpl_vars['_PC_ACTIVE'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
:<br />
                							<input type="radio" name="active<?php echo '['; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['id'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo ']'; ?>
" value="1" data='<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['active'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
' <?php if ($this->_tpl_vars['cat']['active'] == 1): ?>checked<?php endif; ?>/>  <?php echo ((is_array($_tmp=$this->_tpl_vars['ActiveTitleYes'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
<br />
                							<input type="radio" name="active<?php echo '['; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['id'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo ']'; ?>
" value="0" data='<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['active'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
' <?php if ($this->_tpl_vars['cat']['active'] == 0): ?>checked<?php endif; ?>/>  <?php echo ((is_array($_tmp=$this->_tpl_vars['ActiveTitleNo'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
<br />
                					</td>
                					<td class="align-top text-left">
                							<?php echo ((is_array($_tmp=$this->_tpl_vars['_PC_SEQ'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
:<br />
                							<input type="text" class="form-control" name="sequence[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['sequence'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" size="4" />
                					</td>
      										<td class="align-top text-left">
      											<?php echo ((is_array($_tmp=$this->_tpl_vars['_ACO'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
:<br />
      											&nbsp;<select name="<?php echo ((is_array($_tmp=$this->_tpl_vars['InputACO'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
[]" class="form-control">
                     									<?php $_from = $this->_tpl_vars['ACO_List']; if (($_from instanceof StdClass) || (!is_array($_from) && !is_object($_from))) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['acoGroupKey'] => $this->_tpl_vars['acoGroup']):
?>
      													<optgroup label="<?php echo ((is_array($_tmp=$this->_tpl_vars['acoGroupKey'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" >
      													<?php $_from = $this->_tpl_vars['acoGroup']; if (($_from instanceof StdClass) || (!is_array($_from) && !is_object($_from))) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['aco']):
?>
      														<option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['aco']['value'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" <?php if ($this->_tpl_vars['cat']['aco'] == $this->_tpl_vars['aco']['value']): ?>selected <?php endif; ?>>
      															<?php echo ((is_array($_tmp=$this->_tpl_vars['aco']['name'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>

      														</option>
      													<?php endforeach; endif; unset($_from); ?>
      													</optgroup>
                      								<?php endforeach; endif; unset($_from); ?>
      											</select>
      										</td>
            						</tr>
            					</table>
            				</td>
            			</tr>
						<tr>
							<td>
            					<table class='table w-100'>
            						<tr>
                						<td colspan="4" class="align-top text-left">
                							<?php echo ((is_array($_tmp=$this->_tpl_vars['RepeatingHeader'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>

                						</td>
                					</tr>
            						<tr>
                						<td colspan="4"class="align-middle text-left">
                							<input type="radio" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['InputNoRepeat'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo '['; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['id'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo ']'; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['ValueNoRepeat'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" <?php if ($this->_tpl_vars['cat']['event_repeat'] == 0): ?>checked<?php endif; ?>/>
                							<?php echo ((is_array($_tmp=$this->_tpl_vars['NoRepeatTitle'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
<br />
                							<input type="radio" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['InputRepeat'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo '['; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['id'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo ']'; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['ValueRepeat'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" <?php if ($this->_tpl_vars['cat']['event_repeat'] == 1): ?>checked<?php endif; ?> />
                							<?php echo ((is_array($_tmp=$this->_tpl_vars['RepeatTitle'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>

                							<input type="text" class="form-control" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['InputRepeatFreq'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo '['; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['id'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo ']'; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['event_repeat_freq'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" size="4" />

                							<select name="<?php echo ((is_array($_tmp=$this->_tpl_vars['InputRepeatFreqType'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo '['; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['id'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo ']'; ?>
" class="form-control">
                								<?php $_from = $this->_tpl_vars['repeat_freq_type']; if (($_from instanceof StdClass) || (!is_array($_from) && !is_object($_from))) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['repeat']):
?>
                    								<option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['repeat']['value'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" <?php if ($this->_tpl_vars['cat']['event_repeat_freq_type'] == $this->_tpl_vars['repeat']['value']): ?>selected<?php endif; ?>>
                    									<?php echo ((is_array($_tmp=$this->_tpl_vars['repeat']['name'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>

                    								</option>
                								<?php endforeach; endif; unset($_from); ?>
                							</select>
               								<br />
	                						<input type="radio" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['InputRepeatOn'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo '['; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['id'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo ']'; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['ValueRepeatOn'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
"<?php if ($this->_tpl_vars['cat']['event_repeat'] == 2): ?>checked<?php endif; ?> />
	                						 <?php echo ((is_array($_tmp=$this->_tpl_vars['RepeatOnTitle'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
:<br />
                                			<select name="<?php echo ((is_array($_tmp=$this->_tpl_vars['InputRepeatOnNum'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo '['; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['id'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo ']'; ?>
" class="form-control">
                                				<?php $_from = $this->_tpl_vars['repeat_on_num']; if (($_from instanceof StdClass) || (!is_array($_from) && !is_object($_from))) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['repeat']):
?>
                    								<option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['repeat']['value'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" <?php if ($this->_tpl_vars['cat']['event_repeat_on_num'] == $this->_tpl_vars['repeat']['value']): ?>selected<?php endif; ?>>
                    									<?php echo ((is_array($_tmp=$this->_tpl_vars['repeat']['name'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>

                    								</option>
                    							<?php endforeach; endif; unset($_from); ?>
                							</select>
                							<select name="<?php echo ((is_array($_tmp=$this->_tpl_vars['InputRepeatOnDay'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo '['; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['id'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo ']'; ?>
" class="form-control">
               									<?php $_from = $this->_tpl_vars['repeat_on_day']; if (($_from instanceof StdClass) || (!is_array($_from) && !is_object($_from))) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['repeat']):
?>
                    								<option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['repeat']['value'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" <?php if ($this->_tpl_vars['cat']['event_repeat_on_day'] == $this->_tpl_vars['repeat']['value']): ?>selected <?php endif; ?>>
                    									<?php echo ((is_array($_tmp=$this->_tpl_vars['repeat']['name'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>

                    								</option>
                								<?php endforeach; endif; unset($_from); ?>
                							</select>
                							&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['OfTheMonthTitle'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>
&nbsp;
                							<input type="text" class="form-control" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['InputRepeatOnFreq'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo '['; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['id'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo ']'; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['event_repeat_on_freq'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" size="4" />
                							<?php echo ((is_array($_tmp=$this->_tpl_vars['MonthsTitle'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>

											<br />
											</td>
											<td >
											<!--End Date Start-->
											<table class='table w-100'>
												<tr>
													<td>
														<?php echo ((is_array($_tmp=$this->_tpl_vars['NoEndDateTitle'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>

                										<input type="radio" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['InputEndOn'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo '['; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['id'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo ']'; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['ValueNoEnd'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
"  <?php if ($this->_tpl_vars['cat']['end_date_flag'] == 0): ?> checked<?php endif; ?> />
                										<br />
														<?php echo ((is_array($_tmp=$this->_tpl_vars['EndDateTitle'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>

                										<input type="radio" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['InputEndOn'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo '['; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['id'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo ']'; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['ValueEnd'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
"  <?php if ($this->_tpl_vars['cat']['end_date_flag'] == 1): ?> checked<?php endif; ?> />
                										<br />

                										<input type="text" class="form-control" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['InputEndDateFreq'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo '['; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['id'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo ']'; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['end_date_freq'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" size="4" />
                										<select name="<?php echo ((is_array($_tmp=$this->_tpl_vars['InputEndDateFreqType'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo '['; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['cat']['id'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
<?php echo ']'; ?>
" class="form-control">
                											<?php $_from = $this->_tpl_vars['repeat_freq_type']; if (($_from instanceof StdClass) || (!is_array($_from) && !is_object($_from))) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['repeat']):
?>
                    											<option value="<?php echo ((is_array($_tmp=$this->_tpl_vars['repeat']['value'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" <?php if ($this->_tpl_vars['cat']['end_date_type'] == $this->_tpl_vars['repeat']['value']): ?>selected <?php endif; ?>>
                    												<?php echo ((is_array($_tmp=$this->_tpl_vars['repeat']['name'])) ? $this->_run_mod_handler('text', true, $_tmp) : text($_tmp)); ?>

                    											</option>
                											<?php endforeach; endif; unset($_from); ?>
                										</select>
                									</td>
                								</tr>

                							</table>
                					 		<!-- /End Date End -->
               							 </td>
           							 </tr>
                       </table>
            				</td>
            			</tr>
            			<tr><td class="align-bottom"><?php echo $this->_tpl_vars['FormSubmit']; ?>
</td></tr>
            		</table>
            	</td>
            </tr>
 		<!-- /REPEATING ROWS -->
		<?php endforeach; endif; unset($_from); ?>
	</table>

<input type="hidden" name="pc_html_or_text" value="text" selected />

<?php if (! empty ( $this->_tpl_vars['FormHidden'] )): ?> <?php echo $this->_tpl_vars['FormHidden']; ?>
 <?php endif; ?>

<?php echo $this->_tpl_vars['FormSubmit']; ?>

</form>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['TPL_NAME'])."/views/footer.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>