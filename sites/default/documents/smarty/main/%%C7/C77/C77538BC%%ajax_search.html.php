<?php /* Smarty version 2.6.33, created on 2025-07-14 09:14:15
         compiled from default/user/ajax_search.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'default/user/ajax_search.html', 11, false),array('function', 'xlt', 'default/user/ajax_search.html', 16, false),array('function', 'xla', 'default/user/ajax_search.html', 87, false),array('modifier', 'attr', 'default/user/ajax_search.html', 63, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['TPL_NAME'])."/views/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<link rel="stylesheet" href="<?php  echo $GLOBALS['assets_static_relative']  ?>/jquery-datetimepicker/build/jquery.datetimepicker.min.css">

<script src="<?php  echo $GLOBALS['assets_static_relative']  ?>/jquery-datetimepicker/build/jquery.datetimepicker.full.min.js"></script>

<!-- main navigation -->
<?php echo smarty_function_config_load(array('file' => "lang.".($this->_tpl_vars['USER_LANG'])), $this);?>


<div class="container mt-3">
    <div class="row">
        <div class="col-12">
            <h2><?php echo smarty_function_xlt(array('t' => 'Searching for appointments'), $this);?>
</h2>
        </div>
        <div class="col-12">
            <!-- search parameters -->
            &nbsp;
            <?php 
                echo "<a href='".$GLOBALS['webroot']."/interface/main/main_info.php' class='menu text-decoration-none' onclick='top.restoreSession()'>";
             ?>
            <?php echo smarty_function_xlt(array('t' => 'Return to calendar'), $this);?>
</a>
                <form name="theform" id="theform" action="<?php echo $this->_tpl_vars['FORM_ACTION']; ?>
" method="post"> <!-- onsubmit="return top.restoreSession()"> -->
                    <!-- Keywords -->
                    <div class="form-group">
                        <label for="pc_keywords"><?php echo smarty_function_xlt(array('t' => 'Keywords'), $this);?>
:</label>
                        <input type="text" class="form-control" name="pc_keywords" id="pc_keywords" value="<?php echo attr($_POST['pc_keywords'] ?? ''); ?>" />
                    </div>
                    <!-- Condition -->
                    <div class="form-row">
                        <div class="col">
                            <select class="form-control" name="pc_keywords_andor">
                                <option value="AND"><?php echo smarty_function_xlt(array('t' => 'AND'), $this);?>
</option>
                                <option value="OR"><?php echo smarty_function_xlt(array('t' => 'OR'), $this);?>
</option>
                            </select>
                        </div>
                        <div class="col-1">
                            <?php echo smarty_function_xlt(array('t' => 'In'), $this);?>
:
                        </div>
                        <div class="col">
                            <select class="form-control" name="pc_category">
                                <option value=""><?php echo smarty_function_xlt(array('t' => 'Any Category'), $this);?>
</option>
                                <?php echo $this->_tpl_vars['CATEGORY_OPTIONS']; ?>

                            </select>
                        </div>
                    </div>
                    <!-- Topic -->
                    <?php if ($this->_tpl_vars['USE_TOPICS']): ?>
                    <div class="form-group">
                        <select name="pc_topic">
                            <option value=""><?php echo $this->_config[0]['vars']['_PC_SEARCH_ANY_TOPIC']; ?>
</option>
                            <?php echo $this->_tpl_vars['TOPIC_OPTIONS']; ?>

                        </select>
                    </div>
                    <?php endif; ?>
                    <br />
                    <!-- Between -->
                    <div class="form-row">
                        <div class="col">
                            <label for="start"><?php echo smarty_function_xlt(array('t' => 'Between'), $this);?>
:</label>
                            <input type="text" class='form-control datepicker' name="start" id="start" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['DATE_START'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" size="10"/>
                        </div>
                        <div class="col">
                            <label for="end">&nbsp;</label>
                            <input type="text" class='form-control datepicker' name="end" id="end" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['DATE_END'])) ? $this->_run_mod_handler('attr', true, $_tmp) : attr($_tmp)); ?>
" size="10"/>
                        </div>
                    </div>
                    <br />
                    <!-- For At -->
                    <div class="form-row">
                        <div class="col">
                            <label for="provider_id"><?php echo smarty_function_xlt(array('t' => 'For'), $this);?>
</label>
                            <select class="form-control" name="provider_id" id="provider_id">
                                <?php echo $this->_tpl_vars['PROVIDER_OPTIONS']; ?>

                            </select>
                        </div>
                        <div class="col">
                            <label for="pc_facility"><?php echo smarty_function_xlt(array('t' => 'At'), $this);?>
</label>
                            <select class="form-control" name="pc_facility" id="pc_facility">
                                <?php echo $this->_tpl_vars['FACILITY_OPTIONS']; ?>

                            </select>
                        </div>
                    </div>
                    <!-- Submit -->
                    <button class="btn btn-primary mt-2 btn-search" type="submit" name="submit" id="submit" value="<?php echo smarty_function_xla(array('t' => 'Submit'), $this);?>
"><?php echo smarty_function_xlt(array('t' => 'Search'), $this);?>
</button>
                    <div class="d-none" id="calsearch_status">
                        <img src='<?php  echo $GLOBALS['webroot']  ?>/interface/pic/ajax-loader.gif'> <?php echo smarty_function_xlt(array('t' => 'Searching...'), $this);?>

                    </div>
                </form>
            <!-- end of search parameters -->

            <?php if (isset ( $this->_tpl_vars['SEARCH_PERFORMED'] )): ?>
            <div class="mt-3">
                <!-- Table Header -->
                <div class="table-responsive" class="head">
                    <table class="table">
                        <tr class="table-active">
                            <th><?php echo smarty_function_xlt(array('t' => 'Date'), $this);?>
-<?php echo smarty_function_xlt(array('t' => 'Time'), $this);?>
</th>
                            <th><?php echo smarty_function_xlt(array('t' => 'Provider'), $this);?>
</th>
                            <th><?php echo smarty_function_xlt(array('t' => 'Category'), $this);?>
</th>
                            <th><?php echo smarty_function_xlt(array('t' => 'Patient'), $this);?>
</th>
                        </tr>
                    </table>
                </div>
                <!-- Table Result -->
                <div class="table-responsive">
                    <table class="table">
                    <?php 
                    /* I've given up on playing nice with the Smarty tag crap, it's pointlessly used
                    * in the original search. I mean, there's no clean separation between the code
                    * and HTML so we may as well just go full-bore PHP here -- JRM March 2008
                    */

                    $eventCount = 0;
                    foreach ($this->get_template_vars('A_EVENTS') as $eDate => $date_events) {
                        $eventdate = substr($eDate, 0, 4) . substr($eDate, 5, 2) . substr($eDate, 8, 2);

                        foreach ($date_events as $event) {
                            // pick up some demographic info about the provider
                            $provquery = "SELECT * FROM users WHERE id=?";
                            $res = sqlStatement($provquery, [$event['aid']]);
                            $provinfo = sqlFetchArray($res);

                            $eData = $event['eid']."~".$eventdate;
                            $trTitle = xl('Click to edit this event');
                            echo "<tr class='calsearch_event' id='" . attr($eData) . "' title='" . attr($trTitle) . "'>";

                            // date and time
                            $eDatetime = strtotime($eDate." ".$event['startTime']);
                            echo "<td>";
                            echo text(date("Y-m-d h:i a", $eDatetime));
                            echo "</td>";

                            // provider
                            echo "<td>" . text($event['provider_name']);
                            $imgtitle = $provinfo['fname'] . " " . xl('contact info') . ":\n";
                            $imgtitle .= $provinfo['phonew1']."\n".$provinfo['street']."\n".$provinfo['city']." ".$provinfo['state'];
                            echo " <img class'provinfo' src='". $GLOBALS['images_static_relative'] . "/info.png' title=\"" . attr($imgtitle) . "\" />";
                            echo "</td>";

                            // category
                            echo "<td>";
                            echo text($event['catname']);
                            echo " </td>";

                            // patient
                            echo "<td>";
                            echo text($event['patient_name']);
                            echo "</td>";
                    /*
                            echo "<td>";
                            echo text(print_r($event, true));
                            echo "</td>";
                    */
                            echo "</tr>\n";

                            $eventCount++;
                        }
                    }

                    /* the A_EVENTS array holds an array of dates, which in turn hold the array of events
                    * so it will always be non-zero, so we need to count the events as they are
                    * displayed and if the count is zero, then we have no search results
                    */
                    if ($eventCount == 0) {
                        echo "<tr><td colspan='4' class='text-center'>" . xlt('No Results') . "</td></tr>";
                    }

                     ?>
                    </table>
                </div>  <!-- end results-data DIV -->
            </div>  <!-- end outer results DIV -->
            <?php endif; ?>          </div>
    </div>
</div>

<script>
// jQuery stuff to make the page a little easier to use

$(function () {
    $("#pc_keywords").focus();
    $("#theform").submit(function() { SubmitForm(this); });
    $(".calsearch_event").click(function() { EditEvent(this); });

    $('.datepicker').datetimepicker({
        <?php  $datetimepicker_timepicker = false;  ?>
        <?php  $datetimepicker_showseconds = false;  ?>
        <?php  $datetimepicker_formatInput = false;  ?>
        <?php  require($GLOBALS['srcdir'] . '/js/xl/jquery-datetimepicker-2-5-4.js.php');  ?>
        <?php  // can add any additional javascript settings to datetimepicker here; need to prepend first setting with a comma  ?>
        ,format: 'm/d/Y'
    });
});

// open a pop up to edit the event
// parts[] ==>  0=eventID
const EditEvent = function (eObj) {
    objID = eObj.id;
    const parts = objID.split("~");
    dlgopen('add_edit_event.php?date=' + encodeURIComponent(parts[1]) + '&eid=' + encodeURIComponent(parts[0]), '_blank', 780, 675);
}

// show the 'searching...' status and submit the form
const SubmitForm = function(eObj) {
    $("submit").css("disabled", "true");
    $("#calsearch_status").removeClass('d-none')
    return top.restoreSession();
}

function goPid(pid) {
    top.restoreSession();
    <?php 
           echo "top.RTop.location = '../../patient_file/summary/demographics.php' " .
           			 "+ '?set_pid=' + encodeURIComponent(pid);\n";
     ?>
 }
</script>
