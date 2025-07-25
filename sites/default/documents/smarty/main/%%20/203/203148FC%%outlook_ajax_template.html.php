<?php /* Smarty version 2.6.33, created on 2025-07-14 09:17:21
         compiled from default/views/day_print/outlook_ajax_template.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'default/views/day_print/outlook_ajax_template.html', 10, false),array('function', 'headerTemplate', 'default/views/day_print/outlook_ajax_template.html', 202, false),array('function', 'pc_sort_events', 'default/views/day_print/outlook_ajax_template.html', 279, false),array('modifier', 'date_format', 'default/views/day_print/outlook_ajax_template.html', 274, false),array('modifier', 'string_format', 'default/views/day_print/outlook_ajax_template.html', 275, false),)), $this); ?>
<?php echo smarty_function_config_load(array('file' => "default.conf"), $this);?>

<?php echo smarty_function_config_load(array('file' => "lang.".($this->_tpl_vars['USER_LANG'])), $this);?>


<?php $timeslotHeightVal=20; $timeslotHeightUnit="px"; ?>

<html>
<head>

<style>
a {
 text-decoration:none;
}
td {
 font-family: Arial, Helvetica, sans-serif;
}
div.tiny { width:1px; height:1px; font-size:1px; }

#bigCalHeader {
    height: 20%;
    font-family: Arial, Helvetica, sans-serif;
}
#bigCalText {
    float: left;
}
#provname {
    font-size: 2em;
}
#daterange {
    font-size: 1.8em;
    font-weight: bold;
}

#bigCal {
    height: 80%;
}
#bigCal table {
    border-collapse: collapse;
}

/* these are for the small datepicker DIV */
#datePicker {
    float: right;
    display: inline;
    padding: 5px;
    text-align: center;
    background-color: lightblue;
}
#datePicker td {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 0.7em;
    /* font-size: 9pt;  */
}
#datePicker table {
    border-collapse: collapse;
}
#datePicker .tdDOW-small {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 10px;
    vertical-align: top;
    background-color: lightblue;
    text-align: center;
    border: none;
    padding: 2px 3px 2px 3px;
}
#datePicker .tdDatePicker {
    cursor: pointer;
    cursor: hand;
}
#datePicker .tdWeekend-small {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 10px;
    vertical-align: top;
    border: none;
    padding: 2px 3px 2px 3px;
    background-color: #dddddd;
    color: #999999;
}

#datePicker .tdOtherMonthDay-small {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 10px;
    vertical-align: top;
    border: none;
    padding: 2px 3px 2px 3px;
    background-color: #ffffff;
    color: #999999;
}

#datePicker .tdMonthName-small {
    text-align: center;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 12px;
    font-style: normal
}

#datePicker .tdMonthDay-small {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 10px;
    vertical-align: top;
    border: none;
    padding: 2px 3px 2px 3px;
    background-color: #ffffff;
}
#datePicker .currentWeek {
    border-top: 1px solid blue;
    border-bottom: 1px solid blue;
    background-color: lightblue;
}
#datePicker .currentDate {
    border: 1px solid blue;
    background-color: blue;
    color: lightblue;
}

/* the DIV of times */
#times {
    border-right: 1px solid #999;
}
#times table {
    border-collapse: collapse;
    width: 100%;
    margin: 0px;
    padding: 0px;
}
#times table td {
    border: 0px;
    border-top: 1px solid #999;
    margin: 0px;
    padding: 0px;
    font-size: 10pt;
}
.timeslot {
    height: <?php echo $timeslotHeightVal.$timeslotHeightUnit; ?>;
    margin: 0px;
    padding: 0px;
}
.schedule {
    background-color: pink;
    vertical-align: top;
    padding: 0px;
    margin: 0px;
    border-right: 1px solid black;
}
/* types of events */
.event_in {
    position: absolute;
    background-color: white;
    width: 100%;
    font-size: 0.8em;
    color: #ddd;
    border-top: 1px dashed #ddd;
}
.event_out {
    position: absolute;
    background-color: lightgray;
    width: 100%;
    font-size: 0.8em;
    color: #ddd;
    border-top: 1px dashed #ddd;
}
.event_appointment {
    position: absolute;
    background-color: white;
    overflow: hidden;
    border: 1px solid blue;
    width: 100%;
    font-size: 0.8em;
}
.event_noshow {
    position: absolute;
    background-color: pink;
    overflow: hidden;
    border: 1px solid blue;
    width: 100%;
    font-size: 0.8em;
}
.event_reserved {
    position: absolute;
    background-color: pink;
    overflow: hidden;
    border: 1px solid blue;
    width: 100%;
    font-size: 0.8em;
}
</style>

<?php echo smarty_function_headerTemplate(array('assets' => 'no_bootstrap|no_fontawesome|no_main-theme|no_dialog'), $this);?>


</head>
<body>

<?php 

 // build a day-of-week (DOW) list so we may properly build the calendars later in this code
 $DOWlist = array();
 $tmpDOW = pnModGetVar(__POSTCALENDAR__, 'pcFirstDayOfWeek');
 // bound check and auto-correction
 if ($tmpDOW <0 || $tmpDOW >6) {
    pnModSetVar(__POSTCALENDAR__, 'pcFirstDayOfWeek', '0');
    $tmpDOW = 0;
 }
 while (count($DOWlist) < 7) {
    array_push($DOWlist, $tmpDOW);
    $tmpDOW++;
    if ($tmpDOW > 6) $tmpDOW = 0;
 }

 // A_CATEGORY is an ordered array of associative-array categories.
 // Keys of interest are: id, name, color, desc, event_duration.
 //

 $A_CATEGORY  =& $this->_tpl_vars['A_CATEGORY'];

 $A_EVENTS  =& $this->_tpl_vars['A_EVENTS'];
 $providers =& $this->_tpl_vars['providers'];
 $times     =& $this->_tpl_vars['times'];
 $interval  =  $this->_tpl_vars['interval'];
 $viewtype  =  $this->_tpl_vars['VIEW_TYPE'];
 $PREV_WEEK_URL = $this->_tpl_vars['PREV_WEEK_URL'];
 $NEXT_WEEK_URL = $this->_tpl_vars['NEXT_WEEK_URL'];
 $PREV_DAY_URL  = $this->_tpl_vars['PREV_DAY_URL'];
 $NEXT_DAY_URL  = $this->_tpl_vars['NEXT_DAY_URL'];

 $Date =  postcalendar_getDate();
 if (!isset($y)) $y = substr($Date, 0, 4);
 if (!isset($m)) $m = substr($Date, 4, 2);
 if (!isset($d)) $d = substr($Date, 6, 2);

 ?>

<?php 
    echo "<div id='bigCalHeader'>";

    echo "<div id='bigCalText'>";
    // output the date range
    echo "<span id='daterange'>";
    $atmp = array_keys($A_EVENTS);
    echo date('d F Y', strtotime($atmp[0]));
    echo "<br /><span style='font-size:0.8em;font-weight:normal'>" . xlt(date('l', strtotime($atmp[0]))) . "</span>";
    echo "</span>";
    echo "</div>";

    // output a calendar for the subsequent month
    list($nyear, $nmonth, $nday) = explode(" ", date("Y m d", strtotime($atmp[0])));
    $nmonth++;
    if ($nmonth > 12) { $nyear++; $nmonth=1; }
    echo "<div id='datePicker'>";
    PrintDatePicker(strtotime($nyear."-".$nmonth."-1"), $DOWlist, $this->_tpl_vars['A_SHORT_DAY_NAMES']);
    echo "</div>";

    // output a small calendar for the chosen month
    echo "<div id='datePicker'>";
    PrintDatePicker(strtotime($atmp[0]), $DOWlist, $this->_tpl_vars['A_SHORT_DAY_NAMES']);
    echo "</div>";

    echo "</div>"; // end the bigCalHeader
 ?>

<?php $this->assign('dayname', ((is_array($_tmp=$this->_tpl_vars['DATE'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%w") : smarty_modifier_date_format($_tmp, "%w"))); ?>
<?php $this->assign('day', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['DATE'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d") : smarty_modifier_date_format($_tmp, "%d")))) ? $this->_run_mod_handler('string_format', true, $_tmp, "%1d") : smarty_modifier_string_format($_tmp, "%1d"))); ?>
<?php $this->assign('month', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['DATE'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m") : smarty_modifier_date_format($_tmp, "%m")))) ? $this->_run_mod_handler('string_format', true, $_tmp, "%1d") : smarty_modifier_string_format($_tmp, "%1d"))); ?>
<?php $this->assign('year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['DATE'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")))) ? $this->_run_mod_handler('string_format', true, $_tmp, "%4d") : smarty_modifier_string_format($_tmp, "%4d"))); ?>

<?php echo smarty_function_pc_sort_events(array('var' => 'S_EVENTS','sort' => 'time','order' => 'asc','value' => $this->_tpl_vars['A_EVENTS']), $this);?>


<div id="bigCal">
<?php 

echo "<table border='0' cellpadding='1' cellspacing='0' width='100%'>\n";

// output the TD with the times DIV
echo "<tr>";
echo "<td id='times' style='width:2em;'><div><table>\n";
echo "<td class='timeslot' style='text-align: center; background-color:#ddd;'>&nbsp;</td>";

if ($GLOBALS['time_display_format'] == 1) {
    $timeformat = 12;
} else {
    $timeformat = 0;
}


foreach ($times as $slottime) {
    $startampm = ($slottime['mer']) == "pm" ? 2 : 1;
    $starttimeh = $slottime['hour'];
    $disptimeh = ($starttimeh > 12) ? ($starttimeh - $timeformat) : $starttimeh;
    $starttimem = $slottime['minute'];
    $slotendmins = $starttimeh * 60 + $starttimem + $interval;

    echo "<tr><td class='timeslot'>";
    if ($starttimem == "00") { echo "<b>" . text($disptimeh.":".$starttimem) . "</b>"; }
    else { echo text($disptimeh.":".$starttimem); }
    echo "</td></tr>\n";
}
echo "</table></div></td>";


// This loops once for each provider to be displayed.
//
foreach ($providers as $provider) {
    $providerid = $provider['id'];

    // to specially handle the IN/OUT events I'm doing something new here
    // for each IN event it will have a duration lasting until the next
    // OUT event or until the end of the day
    $tmpTime = $times[0];
    $calStartMin = ($tmpTime['hour'] * 60) + $tmpTime['minute'];
    $tmpTime = $times[count($times)-1];
    $calEndMin = ($tmpTime['hour'] * 60) + $tmpTime['minute'];

    // having a 'title' for the TD makes the date appear by the mouse pointer
    // this is nice when all you see are times on the left side and no head
    // row with the dates or day-of-week (DOW)
    echo "<td class='schedule' style='border: 1px solid #999;' title='" . attr($provider['fname']) . " " . attr($provider['lname']) . "'>";
    echo "<div class='timeslot' style='font-size: 0.8em; text-align: center; background-color:#ddd; width: 100%; overflow: hidden; border-bottom: 1px solid lightgray;'>";
    echo text($provider['fname']) . " " . text($provider['lname']) . "</div>";
    echo "<div style='position: relative; height: 100%; width: 100%;'>\n";

    // For each event...
    // output a TD with an inner containing DIV positioned 'relative'
    // within that DIV we place our event DIVs using 'absolute' positioning
    foreach ($A_EVENTS as $date => $events) {
        $eventdate = substr($date, 0, 4) . substr($date, 5, 2) . substr($date, 8, 2);

        // determine if events overlap and adjust their width and left position as needed
        // 26 Feb 2008 - This needs fine tuning or total replacement
        //             - it doesn't work as well as I'd like - JRM
        $eventPositions = array();
        foreach ($times as $slottime) {
            $starttimeh = $slottime['hour'];
            $starttimem = $slottime['minute'];

            $slotstartmins = $starttimeh * 60 + $starttimem;
            $slotendmins = $starttimeh * 60 + $starttimem + $interval;

            $events_in_timeslot = array();
            foreach ($events as $e1) {
                // ignore IN and OUT events
                if (($e1['catid'] == 2) || ($e1['catid'] == 3)) { continue; }
                // skip events without an ID (why they are in the loop, I have no idea)
                if ($e1['eid'] == "") { continue; }
                // skip events for other providers
                if ($providerid != $e1['aid']) { continue; }

                // specially handle all-day events
                if ($e1['alldayevent'] == 1) {
                    $tmpTime = $times[0];
                    if (strlen($tmpTime['hour']) < 2) { $tmpTime['hour'] = "0".$tmpTime['hour']; }
                    if (strlen($tmpTime['minute']) < 2) { $tmpTime['minute'] = "0".$tmpTime['minute']; }
                    $e1['startTime'] = $tmpTime['hour'].":".$tmpTime['minute'].":00";
                    $e1['duration'] = ($calEndMin - $calStartMin) * 60;  // measured in seconds
                }

                // create a numeric start and end for comparison
                $starth = substr($e1['startTime'], 0, 2);
                $startm = substr($e1['startTime'], 3, 2);
                $e1Start = ($starth * 60) + $startm;
                $e1End = $e1Start + $e1['duration']/60;

                // three ways to overlap:
                // start-in, end-in, span
                if ((($e1Start >= $slotstartmins) && ($e1Start < $slotendmins)) // start-in
                   || (($e1End > $slotstartmins) && ($e1End <= $slotendmins)) // end-in
                   || (($e1Start < $slotstartmins) && ($e1End > $slotendmins))) // span
                {
                    array_push($events_in_timeslot, $e1['eid']);
                }
            }

            $leftpos = 0;
            $width = 100;
            if (!empty($events_in_timeslot)) {
                $width = 100 / count($events_in_timeslot);

                // loop over the events in this timeslot and adjust their width
                foreach ($events_in_timeslot as $eid) {
                    $eventPositions[$eid] = new stdClass();

                    // set the width if not already set or if the current width is smaller
                    // than was was previously set
                    if (! isset($eventPositions[$eid]->width)) { $eventPositions[$eid]->width = $width; }
                    else if ($eventPositions[$eid]->width > $width) { $eventPositions[$eid]->width = $width; }

                    // set the left position if not already set or if the current left is
                    // greater than what was previously set
                    if (! isset($eventPositions[$eid]->leftpos)) { $eventPositions[$eid]->leftpos = $leftpos; }
                    else if ($eventPositions[$eid]->leftpos < $leftpos) { $eventPositions[$eid]->leftpos = $leftpos; }

                    // increment the leftpos by the width
                    $leftpos += $width;
                }
            }
        } // end overlap detection

        // now loop over the events for the day and output their DIVs
        foreach ($events as $event) {
            // skip events for other providers
            // yeah, we've got that sort of overhead here... it ain't perfect
            if ($providerid != $event['aid']) { continue; }

            // skip events without an ID (why they are in the loop, I have no idea)
            if ($event['eid'] == "") { continue; }

            // specially handle all-day events
            if ($event['alldayevent'] == 1) {
                $tmpTime = $times[0];
                if (strlen($tmpTime['hour']) < 2) { $tmpTime['hour'] = "0".$tmpTime['hour']; }
                if (strlen($tmpTime['minute']) < 2) { $tmpTime['minute'] = "0".$tmpTime['minute']; }
                $event['startTime'] = $tmpTime['hour'].":".$tmpTime['minute'].":00";
                $event['duration'] = ($calEndMin - $calStartMin) * 60;  // measured in seconds
            }

            // figure the start time and minutes (from midnight)
            $starth = substr($event['startTime'], 0, 2);
            $startm = substr($event['startTime'], 3, 2);
            $eStartMin = $starth * 60 + $startm;
            $dispstarth = ($starth > 12) ? ($starth - $timeformat) : $starth;

            // determine the class for the event DIV based on the event category
            $evtClass = "event_appointment";
            switch ($event['catid']) {
                case 1:  // NO-SHOW appt
                    $evtClass = "event_noshow";
                    break;
                case 2:  // IN office
                    $evtClass = "event_in";
                    break;
                case 3:  // OUT of office
                    $evtClass = "event_out";
                    break;
                case 4:  // VACATION
                    $evtClass = "event_reserved";
                    break;
                case 6:  // HOLIDAY
                    $evtClass = "event_holiday";
                    break;
                case 8:  // LUNCH
                    $evtClass = "event_reserved";
                    break;
                case 11: // RESERVED
                    $evtClass = "event_reserved";
                    break;
                default: // some appointment
                    $evtClass = "event_appointment";
                    break;
            }
            // eventViewClass allows the event class to override the template (such as from a dispatched system event).
            $evtClass = $event['eventViewClass'] ?? $evtClass;

            // if this is an IN or OUT event then we have some extra special
            // processing to be done
            // the IN event creates a DIV until the OUT event
            // or, without an OUT DIV matching the IN event
            // then the IN event runs until the end of the day
            if ($event['catid'] == 2) {
                // locate a matching OUT for this specific IN
                $found = false;
                $outMins = 0;
                foreach ($events as $outevent) {
                    // skip events for other providers
                    if ($providerid != $outevent['aid']) { continue; }
                    // skip events with blank IDs
                    if ($outevent['eid'] == "") { continue; }

                    if ($outevent['eid'] == $event['eid']) { $found = true; continue; }
                    if (($found == true) && ($outevent['catid'] == 3)) {
                        // calculate the duration from this event to the outevent
                        $outH = substr($outevent['startTime'], 0, 2);
                        $outM = substr($outevent['startTime'], 3, 2);
                        $outMins = ($outH * 60) + $outM;
                        $event['duration'] = ($outMins - $eStartMin) * 60; // duration is in seconds
                        $found = 2;
                        break;
                    }
                }
                if ($outMins == 0) {
                    // no OUT was found so this event's duration goes
                    // until the end of the day
                    $event['duration'] = ($calEndMin - $eStartMin) * 60; // duration is in seconds
                }
            }

            // calculate the TOP value for the event DIV
            // diff between event start and schedule start
            $eMinDiff = $eStartMin - $calStartMin;
            // diff divided by the time interval of the schedule
            $eStartInterval = $eMinDiff / $interval;
            // times the interval height
            $eStartPos = $eStartInterval * $timeslotHeightVal;
            $evtTop = $eStartPos.$timeslotHeightUnit;

            // calculate the HEIGHT value for the event DIV
            // diff between end and start of event
            $eEndMin = $eStartMin + ($event['duration']/60);
            $eMinDiff = $eEndMin - $eStartMin;
            // diff divided by the time interval of the schedule
            $eEndInterval = $eMinDiff / $interval;
            // times the interval height
            $eHeight = $eEndInterval * $timeslotHeightVal;
            $evtHeight = $eHeight.$timeslotHeightUnit;

            // determine the DIV width based on any overlapping events
            // see further above for the overlapping calculation code
            $divWidth = "";
            $divLeft = "";
            if (isset($eventPositions[$event['eid']])) {
                $divWidth = "width: ".$eventPositions[$event['eid']]->width."%";
                $divLeft = "left: ".$eventPositions[$event['eid']]->leftpos."%";
            }

            $eventid = $event['eid'];
            $patientid = $event['pid'];
            $commapos = strpos($event['patient_name'], ",");
            $lname = substr($event['patient_name'], 0, $commapos);
	        $fname = substr($event['patient_name'], $commapos + 2);
            $patient_dob = $event['patient_dob'];
            $patient_age = $event['patient_age'];
            $catid = $event['catid'];
            $comment = $event['hometext'];
            $catname = $event['catname'];
            $title = "Age $patient_age ($patient_dob)";

            $content = "";

            if ($comment && $GLOBALS['calendar_appt_style'] < 4) $title .= " " . $comment;

            if ($catid == 2 || $catid == 3 || $catid == 4 || $catid == 8 || $catid == 11) {
                if      ($catid ==  2) $catname = xl("IN");
                else if ($catid ==  3) $catname = xl("OUT");
                else if ($catid ==  4) $catname = xl("VACATION");
                else if ($catid ==  8) $catname = xl("LUNCH");
                else if ($catid == 11) $catname = xl("RESERVED");

                $atitle = $catname;
                if ($event['recurrtype'] == 1) $content .= "<img src='$TPL_IMAGE_PATH/repeating8.png' border='0' style='margin:0px 2px 0px 2px;' title='Repeating event' alt='Repeating event'>";
                if ($comment) $atitle .= " $comment";
                $content .= text($catname);
                if ($comment) $content .= " " . text($comment);
            }
            else {
                // some sort of patient appointment
                $content .= "<span class='appointment" . attr($apptToggle ?? "") . "'>";
                $content .= text($dispstarth.':'.$startm);
                if ($event['recurrtype'] == 1) $content .= "<img src='$TPL_IMAGE_PATH/repeating8.png' border='0' style='margin:0px 2px 0px 2px;' title='Repeating event' alt='Repeating event'>";
                $content .= text($event['apptstatus']);

                if ($patientid) {
                    if ($catid == 1) $content .= "<s>";
                    $content .= text($lname);
                    if ($GLOBALS['calendar_appt_style'] != 1) {
                        $content .= "," . text($fname);
                        if ($event['title'] && $GLOBALS['calendar_appt_style'] >= 3) {
                            $content .= "(" . text($event['title']);
                            if ($event['hometext'] && $GLOBALS['calendar_appt_style'] >= 4)
                                $content .= ": <span class='text-success'>" . text(trim($event['hometext'])) . "</span>";
                            $content .= ")";
                        }
                    }
                    if ($catid == 1) $content .= "</s>";
                }
                else {
                    // no patient id, just output the category name
                    $content .= text($catname);
                }
                $content .= "</span>";
            }

            $divTitle = (!empty($divTitle)) ? $divTitle . "\n(double click to edit)" : "\n(double click to edit)";

            // a special case for the 'IN' event so it doesn't overlap another
            // event DIV and include the time
            if ($event['catid'] == 2) {
                $inTop = ($eStartPos - $timeslotHeightVal).$timeslotHeightUnit;
                echo "<div data-eid='" . attr($eventid) . "'class='" . attr($evtClass) . " event' style='top:".$inTop.
                    "; height:".$timeslotHeightVal.$timeslotHeightUnit.
                    "; $divWidth".
                    "; $divLeft".
                    "; background:transparent".
                    "; border: none".
                    "'".
                    ">";
                $content = text($dispstarth) . ':' . text($startm) . " " . text($content);
                echo $content;
                echo "</div>\n";
            }

            // output the DIV and content
            echo "<div data-eid='" . attr($eventid) . "' class='" . attr($evtClass) . " event' style='top:".$evtTop."; height:".$evtHeight.
                    "; background-color:".$event["catcolor"].
                    "; $divWidth".
                    "; $divLeft".
                    "'".
                    " id='" . attr($eventdate) . "-" . attr($eventid) . "'".
                    ">";
            // second part for the special IN event
            if ($event['catid'] != 2) { echo $content; }
            echo "</div>\n";
        } // end EVENT loop

        echo "</div>";

    } // end date

    echo "</td>\n";

} // end provider loop

echo " </tr>\n";
echo "</table>\n";
echo "<P>";

/* output a small calendar, based on the date-picker code from the normal calendar */
function PrintDatePicker($caldate, $DOWlist, $daynames) {

    $cMonth = date("m", $caldate);
    $cYear = date("Y", $caldate);
    $cDay = date("d", $caldate);

    echo '<table>';
    echo '<tr>';
    echo '<td colspan="7" class="tdMonthName-small">';
    echo text(date('F Y', $caldate));
    echo '</td>';
    echo '</tr>';
    echo '<tr>';
    foreach ($DOWlist as $dow) {
        echo "<td class='tdDOW-small'>" . text($daynames[$dow]) . "</td>";
    }
    echo '</tr>';

    // to make a complete week row we need to compute the real
    // start and end dates for the view
    list ($year, $month, $day) = explode(" ", date('Y m d', $caldate));
    $startdate = strtotime($year.$month."01");
    while (date('w', $startdate) != $DOWlist[0]) { $startdate -= 60*60*24; }

    $enddate = strtotime($year.$month.date("t", $month));
    while (date('w', $enddate) != $DOWlist[6]) { $enddate += 60*60*24; }

    $currdate = $startdate;
    while ($currdate <= $enddate) {
        if (date('w', $currdate) == $DOWlist[0]) {
            echo "<tr>";
        }

        // we skip outputting some days
        $skipit = false;

        // set the TD class
        $tdClass = "tdMonthDay-small";
        if (date('m', $currdate) != $month) {
            $tdClass = "tdOtherMonthDay-small";
            $skipit = true;
        }
        if ((date('w', $currdate) == 0) || (date('w', $currdate) == 6)) {
            $tdClass = "tdWeekend-small";
        }

        if (!empty($Date) && (date('Ymd',$currdate) == $Date)) {
            // $Date is defined near the top of this file
            // and is equal to whatever date the user has clicked
            $tdClass .= " currentDate";
        }

        // add a class so that jQuery can grab these days for the 'click' event
        $tdClass .= " tdDatePicker";

        // output the TD
        $td = "<td ";
        $td .= "class=\"" . attr($tdClass) . "\" ";
        //$td .= "id=\"" . attr(date("Ymd", $currdate)) . "\" ";
        $td .= "id=\"" . attr(date("Ymd", $currdate)) . "\" ";
        $td .= "title=\"Go to week of " . attr(date('M d, Y', $currdate)) . "\" ";
        $td .= "> " . text(date('d', $currdate)) . "</td>\n";
        if ($skipit == true) { echo "<td></td>"; }
        else { echo $td; }

        // end of week row
        if (date('w', $currdate) == $DOWlist[6]) echo "</tr>\n";

        // time correction = plus 1000 seconds, for some unknown reason
        $currdate += (60*60*24)+1000;
    }
    echo "</table>";
}

 ?>
</div>  <!-- end bigCal DIV -->

</body>

<script>
$(function () {
    var win = top.printLogPrint ? top : opener.top;
    win.printLogPrint(window);
});
</script>

</html>