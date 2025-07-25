<?php /* Smarty version 2.6.33, created on 2025-07-14 08:08:34
         compiled from default/views/day/ajax_template.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'config_load', 'default/views/day/ajax_template.html', 11, false),array('function', 'xla', 'default/views/day/ajax_template.html', 166, false),array('function', 'xlt', 'default/views/day/ajax_template.html', 166, false),array('function', 'pc_sort_events', 'default/views/day/ajax_template.html', 376, false),array('modifier', 'date_format', 'default/views/day/ajax_template.html', 371, false),array('modifier', 'string_format', 'default/views/day/ajax_template.html', 372, false),)), $this); ?>
<?php echo smarty_function_config_load(array('file' => "default.conf"), $this);?>

<?php echo smarty_function_config_load(array('file' => "lang.".($this->_tpl_vars['USER_LANG'])), $this);?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['TPL_NAME'])."/views/header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php 
/* if you change these be sure to change their matching values in
 * the CSS for the calendar, found in interface/themes/ajax_calendar.css
 */
$timeslotHeightVal=20;
$timeslotHeightUnit="px";
 ?>

<script>

 // This is called from the event editor popup.
 function refreshme() {
  top.restoreSession();
  document.forms[0].submit();
 }

 function newEvt(startampm, starttimeh, starttimem, eventdate, providerid, catid) {
  dlgopen('add_edit_event.php?startampm=' + encodeURIComponent(startampm) +
   '&starttimeh=' + encodeURIComponent(starttimeh) + '&userid=' + encodeURIComponent(providerid) + '&starttimem=' + encodeURIComponent(starttimem) +
   '&date=' + encodeURIComponent(eventdate) + '&catid=' + encodeURIComponent(catid)
   ,'_blank', 780, 675, '', '', {onClosed: 'refreshme'});
 }

 function oldEvt(eventdate, eventid, pccattype) {
  dlgopen('add_edit_event.php?date=' + encodeURIComponent(eventdate) + '&eid=' + encodeURIComponent(eventid) + '&prov=' + encodeURIComponent(pccattype), '_blank', 780, 650);
 }

 function oldGroupEvt(eventdate, eventid, pccattype){
  top.restoreSession();
  dlgopen('add_edit_event.php?group=true&date=' + encodeURIComponent(eventdate) + '&eid=' + encodeURIComponent(eventid) + '&prov=' + encodeURIComponent(pccattype), '_blank', 780, 675);
 }

 function goPid(pid) {
  top.restoreSession();
<?php 
  		echo "  top.RTop.location = '../../patient_file/summary/demographics.php' " .
   		"+ '?set_pid=' + encodeURIComponent(pid);\n";
 ?>
 }

 function goGid(gid) {
  top.restoreSession();
<?php 
        echo "  top.RTop.location = '" . $GLOBALS['rootdir'] . "/therapy_groups/index.php' " .
        "+ '?method=groupDetails&group_id=' + encodeURIComponent(gid) \n ";
 ?>
 }

 function GoToToday(theForm){
  var todays_date = new Date();
  var theMonth = todays_date.getMonth() + 1;
  theMonth = theMonth < 10 ? "0" + theMonth : theMonth;
  theForm.jumpdate.value = todays_date.getFullYear() + "-" + theMonth + "-" + todays_date.getDate();
  top.restoreSession();
  theForm.submit();
 }

 function ShowImage(src)
 {
     var img = document.getElementById('popupImage');
     var div = document.getElementById('popup');
     img.src = src;
     div.style.display = "block";
 }

 function HideImage()
 {
     document.getElementById('popup').style.display = "none";
 }
</script>

<?php 
 // this is my proposed setting in the globals config file so we don't
 // need to mess with altering the pn database AND the config file
 //pnModSetVar(__POSTCALENDAR__, 'pcFirstDayOfWeek', $GLOBALS['schedule_dow_start']);

  $openhour= $GLOBALS['schedule_start'];
  $closehour= $GLOBALS['schedule_end'];


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
 // echo "<!-- A_CATEGORY = "; print_r($this->_tpl_vars['A_CATEGORY']); echo " -->\n"; // debugging
 // echo "<!-- A_EVENTS = "; print_r($this->_tpl_vars['A_EVENTS']); echo " -->\n"; // debugging

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
 $PREV_MONTH_URL = $this->_tpl_vars['PREV_MONTH_URL'];
 $NEXT_MONTH_URL = $this->_tpl_vars['NEXT_MONTH_URL'];

 $Date =  postcalendar_getDate();
 if (!isset($y)) $y = substr($Date, 0, 4);
 if (!isset($m)) $m = substr($Date, 4, 2);
 if (!isset($d)) $d = substr($Date, 6, 2);

 // echo "<!-- There are " . count($A_EVENTS) . " A_EVENTS days -->\n";

 $MULTIDAY = count($A_EVENTS) > 1;

//==================================
//FACILITY FILTERING (CHEMED)
$facilities = getUserFacilities($_SESSION['authUserID']); // from users_facility
if ( $_SESSION['pc_facility'] ) {
  $provinfo = getProviderInfo('%', true, $_SESSION['pc_facility']);
} else {
  $provinfo = getProviderInfo();
}
//EOS FACILITY FILTERING (CHEMED)
//==================================

$chevron_icon_left = $_SESSION['language_direction'] == 'ltr' ? 'fa-chevron-circle-left' : 'fa-chevron-circle-right';
$chevron_icon_right = $_SESSION['language_direction'] == 'ltr' ? 'fa-chevron-circle-right' : 'fa-chevron-circle-left';
 ?>
<div id="wrapper">
    <form name='theform' id='theform' action='index.php?module=PostCalendar&func=view&tplview=default&pc_category=&pc_topic=' method='post' onsubmit='return top.restoreSession()'>
      <div class="container-fluid sticky-top">
        <div id="topToolbarRight" class="bgcolor2">
            <div id="functions">
                <a id="menu-toggle" href="#" class="btn btn-outline-dark"><i class="fas fa-bars"></i></a>
                <input type="hidden" name="jumpdate" id="jumpdate" value="" />
                <input type="hidden" name="viewtype" id="viewtype" value="<?php echo attr($viewtype); ?>" />
                <?php  echo "<a href='#' title='" . xla("New Appointment") . "' onclick='newEvt(1, 9, 00, " . attr_js($Date) . ", 0, 0)' class='btn btn-primary'><i class='fa fa-plus'></i></a>\n";
                echo "<a href='#' title='" . xla("Search Appointment") . "' onclick='top.restoreSession();location=\"index.php?module=PostCalendar&func=search\"' class='btn btn-primary'><i class='fa fa-search'></i></a>\n";
                if ($Date <> date('Ymd')) {
                 ?>
                <a href='#' name='bnsubmit' value='<?php echo smarty_function_xla(array('t' => 'Today'), $this);?>
' onClick='GoToToday(theform);' class='btn btn-primary'><?php echo smarty_function_xlt(array('t' => 'Today'), $this);?>
</a>
                <?php 
    }
 ?>

</div>
<div id="dateNAV">
<?php 
echo "   <a id='prevday' href='$PREV_DAY_URL' onclick='top.restoreSession()' title='" . xla("Previous Day") . "'>
            <i class='fa " . attr($chevron_icon_left) . " chevron_color'></i></a>\n";
$atmp = array_keys($A_EVENTS);
echo text(dateformat(strtotime($atmp[0]),true));
echo "   <a id='nextday' href='$NEXT_DAY_URL' onclick='top.restoreSession()' title='" . xla("Next Day") . "'>
            <i class= 'fa " . attr($chevron_icon_right) . " chevron_color'></i></a>\n";
 ?>
</div>
<div id="viewPicker">
<?php 
echo "   <a href='#' id='printview' title='" . xla("View Printable Version") . "' class='btn btn-primary'>
            <i class='fa fa-print' aria-hidden='true'></i></a>\n";
echo "   <a href='#' title='" . xla("Refresh") . "' onclick='javascript:refreshme()' class='btn btn-primary'>
            <i class='fa fa-sync' aria-hidden='true'></i></a>\n";
echo "   <a href='#' type='button' id='dayview' title='" . xla('Day View') . "' class='btn btn-primary'>" . xlt('Day') . "</a>\n";
echo "   <a href='#' type='button' id='weekview' title='" . xla('Week View') . "' class='btn btn-primary'>" . xlt('Week') . "</a>\n";
echo "   <a href='#' type='button' id='monthview' title='" . xla('Month View') . "' class='btn btn-primary'>" . xlt('Month') . "</a>\n";
 ?>
</div>
</div> <!-- end topToolbarRight -->
</div>
<div class="sticky-top">
<div id="bottomLeft" class="sidebar-wrapper">
<div id="datePicker">
<?php 
$atmp = array_keys($A_EVENTS);
$caldate = strtotime($atmp[0]);
$cMonth = date("m", $caldate);
$cYear = date("Y", $caldate);
$cDay = date("d", $caldate);

include_once($GLOBALS['fileroot'].'/interface/main/calendar/modules/PostCalendar/pntemplates/default/views/monthSelector.php');
echo "\n";
 ?>
<div class="table-responsive">
<table class='table table-sm table-borderless'>
<tbody><tr>
<?php 

// compute the previous month date
// stay on the same day if possible
$pDay = $cDay;
$pMonth = $cMonth - 1;
$pYear = $cYear;
if ($pMonth < 1) { $pMonth = 12; $pYear = $cYear - 1; }
while (! checkdate($pMonth, $pDay, $pYear)) { $pDay = $pDay - 1; }
$prevMonth = sprintf("%d%02d%02d",$pYear,$pMonth,$pDay);

// compute the next month
// stay on the same day if possible
$nDay = $cDay;
$nMonth = $cMonth + 1;
$nYear = $cYear;
if ($nMonth > 12) { $nMonth = 1; $nYear = $cYear + 1; }
while (! checkdate($nMonth, $nDay, $nYear)) { $nDay = $nDay - 1; }
$nextMonth = sprintf("%d%02d%02d",$nYear,$nMonth,$nDay);
 ?>
<td class="tdDOW-small tdDatePicker" id="<?php echo attr($prevMonth) ?>" title="<?php echo xla(date("F", strtotime($prevMonth))); ?>">&lt;</td>
<td colspan="5" class="tdMonthName-small">
<?php 
echo xl(date('F', $caldate));
 ?>
</td>
<td class="tdDOW-small tdDatePicker" id="<?php echo attr($nextMonth) ?>" title="<?php echo xla(date("F", strtotime($nextMonth))); ?>">&gt;</td>
</tr><tr>
<?php 
foreach ($DOWlist as $dow) {
    echo "<td class='tdDOW-small'>" . text($this->_tpl_vars['A_SHORT_DAY_NAMES'][$dow]) . "</td>";
}
 ?>
</tr>
<?php 
$atmp = array_keys($A_EVENTS);
$caldate = strtotime($atmp[0]);
$caldateEnd = strtotime($atmp[6] ?? '');

// to make a complete week row we need to compute the real
// start and end dates for the view
list ($year, $month, $day) = explode(" ", date('Y m d', $caldate));
$startdate = strtotime($year.$month."01");
$enddate = strtotime($year.$month.date("t", $startdate)." 23:59");
while (date('w', $startdate) != $DOWlist[0]) { $startdate -= 60*60*24; }
while (date('w', $enddate) != $DOWlist[6]) { $enddate += 60*60*24; }

$currdate = $startdate;
while ($currdate <= $enddate) {
    if (date('w', $currdate) == $DOWlist[0]) {
        // start of week row
        $tr = "<tr>";
        echo $tr;
    }

    // set the TD class
    $tdClass = "tdMonthDay-small";
    if (date('m', $currdate) != $month) {
        $tdClass = "tdOtherMonthDay-small";
    }
    if (is_weekend_day(date('w', $currdate))) {
        $tdClass = "tdWeekend-small";
    }
    if (is_holiday(date('Y-m-d', $currdate))) {
        $tdClass = "tdHoliday-small";
    }

    if (date('Ymd',$currdate) == $Date) {
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
    $td .= "title=\"" . xla('Go to') . " " . attr(date('M d, Y', $currdate)) . "\" ";
    $td .= "> " . text(date('d', $currdate)) . "</td>\n";
    echo $td;

    // end of week row
    if (date('w', $currdate) == $DOWlist[6]) echo "</tr>\n";

    // time correction = plus 1000 seconds, for some unknown reason
    //$currdate += (60*60*24)+1000;

    ////////
    $currdate = strtotime("+1 day", $currdate);
    ////////
}
 ?>
</tbody>
</table>
</div>
</div>

<div id="bigCalHeader">
</div>

<div id="providerPicker">
<?php echo smarty_function_xlt(array('t' => 'Providers'), $this);?>

<div>
<?php 
// ==============================
// FACILITY FILTERING (lemonsoftware)
/*********************************************************************
$facilities = getFacilities();
*********************************************************************/
if (!empty($_SESSION['authorizeduser']) && ($_SESSION['authorizeduser'] == 1)) {
  $facilities = getFacilities();
} else {
  $facilities = getUserFacilities($_SESSION['authUserID']); // from users_facility
  if (count($facilities) == 1)
    OpenEMR\Common\Session\SessionUtil::setSession('pc_facility', key($facilities));
}
/********************************************************************/
if (count($facilities) > 1) {
    echo "   <select name='pc_facility' id='pc_facility' class='view1 form-control' >\n";
    if ( !$_SESSION['pc_facility'] ) $selected = "selected='selected'";
    // echo "    <option value='0' $selected>"  . xlt('All Facilities') . "</option>\n";
    if (!$GLOBALS['restrict_user_facility']) echo "    <option class='bg-info' value='0' $selected>" . xlt('All Facilities') . "</option>\n";
    foreach ($facilities as $fa) {
        $selected = ( $_SESSION['pc_facility'] == $fa['id']) ? "selected='selected'" : "" ;
        echo "    <option class='bg-info' value='" . attr($fa['id']) . "' $selected>" . text($fa['name']) . "</option>\n";
    }
    echo "   </select>\n";
}
 // EOS FF
 // ==============================
 echo "</div>";
 echo "   <select multiple size='5' name='pc_username[]' id='pc_username' class='view2 form-control'>\n";
 echo "    <option value='__PC_ALL__'>"  . xlt("All Users") . "</option>\n";
 foreach ($provinfo as $doc) {
    $username = $doc['username'];
    echo "    <option value='" . attr($username) . "'";
    foreach ($providers as $provider)
        if ($provider['username'] == $username) echo " selected";
    echo ">" . text($doc['lname']) . ", " . text($doc['fname']) . "</option>\n";
 }
 echo "   </select>\n";
 ?>
</div>
<?php 
if($_SESSION['pc_facility'] == 0){
 ?>
<ul class="list-group list-group-flush" id="facilityColor">
<?php 
foreach ($facilities as $f){
    echo "<li class='list-group-item' style='border-left: 35px solid ".$f['color'].";'>" . text($f['name'])."</li>";
}
 ?>
</ul>
<?php 
}
 ?>
<?php $this->assign('dayname', ((is_array($_tmp=$this->_tpl_vars['DATE'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%w") : smarty_modifier_date_format($_tmp, "%w"))); ?>
<?php $this->assign('day', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['DATE'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d") : smarty_modifier_date_format($_tmp, "%d")))) ? $this->_run_mod_handler('string_format', true, $_tmp, "%1d") : smarty_modifier_string_format($_tmp, "%1d"))); ?>
<?php $this->assign('month', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['DATE'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m") : smarty_modifier_date_format($_tmp, "%m")))) ? $this->_run_mod_handler('string_format', true, $_tmp, "%1d") : smarty_modifier_string_format($_tmp, "%1d"))); ?>
<?php $this->assign('year', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['DATE'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y") : smarty_modifier_date_format($_tmp, "%Y")))) ? $this->_run_mod_handler('string_format', true, $_tmp, "%4d") : smarty_modifier_string_format($_tmp, "%4d"))); ?>

<?php echo smarty_function_pc_sort_events(array('var' => 'S_EVENTS','sort' => 'time','order' => 'asc','value' => $this->_tpl_vars['A_EVENTS']), $this);?>


<div id="popup" class="pop-up">
    <img id="popupImage" alt="" />
</div>
</div><!-- end bottomLeft -->
</div>
<div class="page-content-wrapper">
<div class="container-fluid calsearch_body">
<div id="bigCal">
<?php 
/* used in debugging
    foreach ($A_EVENTS as $date => $events) {
        echo $date." = ";
        foreach ($events as $oneE) {
            echo text(print_r($oneE, true));
            echo "<br /><br />";
        }
        echo "<hr class='w-100'>";
    }
*/

echo "<div class='table-responsive'>";
echo "<table class='table border-0'>\n";

// output the TD with the times DIV
echo "<tr>";
echo "<td id='times'><div class='table-responsive'><table class='table'><tr>\n";
echo "<td class='timeslot providerXbtn' data-username='__PC_ALL__'><i class='fa fa-lg fa-user-md'></i></td></tr>";
//============================================================================================================================
// Check global time preference so that 24 and 12hour preference is displayed properly

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

    // default to the first displayed provider
    $providerid = $providers[0]['id'];

    echo "<tr><td class='timeslot'>";
    echo "<a href='javascript:newEvt(" . attr_js($startampm) . "," . attr_js($starttimeh) . "," . attr_js($starttimem) . "," . attr_js($Date) . "," . attr_js($providerid) . ",0)' title='" . xla('New Appointment') . "' alt='" . xla('New Appointment') . "'>";
    echo text($disptimeh) . ":" . text($starttimem);
    echo "</a>";
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
    $classForWeekend = is_weekend_day(date('w', $caldate)) ? 'weekend-day' : 'work-day';
    $provfl = trim($provider['fname'].' '.$provider['lname']);
    echo "<td class='schedule $classForWeekend' title='" . attr($provfl) . "' date='" . attr(date("Ymd",$caldate)) . "' provider='" . attr($providerid) . "'>";
    echo "<div class='providerheader providerday'>" . text($provfl) . "<a class='providerXbtn userClose' data-username='" . attr($provider['username']) . "'></a></div>";
    echo "<div class='calendar_day'>";

    // For each event...
    // output a TD with an inner containing DIV positioned 'relative'
    // within that DIV we place our event DIVs using 'absolute' positioning
    foreach ($A_EVENTS as $date => $events) {
        $eventdate = substr($date, 0, 4) . substr($date, 5, 2) . substr($date, 8, 2);

        // determine if events overlap and adjust their width and left position as needed
        // 26 Feb 2008 - This needs fine tuning or total replacement
        //             - it doesn't work as well as I'd like - JRM
        foreach ($times as $slottime) {
            $starttimeh = $slottime['hour'];
            $starttimem = $slottime['minute'];

            $slotstartmins = $starttimeh * 60 + $starttimem;
            $slotendmins = $starttimeh * 60 + $starttimem + $interval;

            $events_in_timeslot = array();
            foreach ($events as $e1) {
                // ignore IN event
                if (($e1['catid'] == 2)) { continue; }

				// skip events without an ID (why they are in the loop, I have no idea)
                if ($e1['eid'] == "") { continue; }

                // skip events for other providers
                // $e1['aid']!=0 :With the holidays we included clinic events, they have provider id =0
                // we dont want to exclude those events from being displayed
                if ($providerid != $e1['aid'] && $e1['aid'] != 0) { continue; }

                // specially handle all-day events
                if ($e1['alldayevent'] == 1) {
                    $tmpTime = $times[0];
                    if (strlen($tmpTime['hour']) < 2) { $tmpTime['hour'] = "0".$tmpTime['hour']; }
                    if (strlen($tmpTime['minute']) < 2) { $tmpTime['minute'] = "0".$tmpTime['minute']; }
                    $e1['startTime'] = $tmpTime['hour'].":".$tmpTime['minute'].":00";
                    $e1['duration'] = ($calEndMin - $calStartMin) * 60;  // measured in seconds
                }

                // create a numeric start and end for comparison
                $starth = (int) substr($e1['startTime'], 0, 2);
                $startm = (int) substr($e1['startTime'], 3, 2);
                $e1Start = ($starth * 60) + $startm;
                $e1End = $e1Start + $e1['duration']/60;

                // three ways to overlap:
                // start-in, end-in, span
                if ((($e1Start >= $slotstartmins) && ($e1Start < $slotendmins)) // start-in
                   || (($e1End > $slotstartmins) && ($e1End <= $slotendmins)) // end-in
                   || (($e1Start < $slotstartmins) && ($e1End > $slotendmins))) // span
                {
					array_push($events_in_timeslot, $e1['eid']);
					if($e1['catid'] == 3)
					{
						array_pop($events_in_timeslot);
						array_unshift($events_in_timeslot, $e1['eid']);
					}
                }

            }
            $leftpos = 0;
            $width = 100;
            if (!empty($events_in_timeslot)) {
                $width = 100 / count($events_in_timeslot);

                // loop over the events in this timeslot and adjust their width
                foreach ($events_in_timeslot as $eid) {
                    // set the width if not already set or if the current width is smaller
                    // than was was previously set
                    if (!isset($eventPositions[$eid]->width))
                    {
                        $eventPositions[$eid] = new stdClass();
                        $eventPositions[$eid]->width = $width;
                    } else if ($eventPositions[$eid]->width > $width)
                    {
                        $eventPositions[$eid]->width = $width;
                    }

                    // set the left position if not already set or if the current left is
                    // greater than what was previously set
                    if (!isset($eventPositions[$eid]->leftpos))
                    {
                        $eventPositions[$eid]->leftpos = $leftpos;
                    } else if ($eventPositions[$eid]->leftpos < $leftpos)
                    {
                        $eventPositions[$eid]->leftpos = $leftpos;
                    }

                    // increment the leftpos by the width
                    $leftpos += $width;
                }
            }
        } // end overlap detection

        // now loop over the events for the day and output their DIVs
        foreach ($events as $event) {
            // skip events for other providers
            // yeah, we've got that sort of overhead here... it ain't perfect
            if ($providerid != $event['aid'] && $event['aid']!=0) { continue; }

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
            $starth = (int) substr($event['startTime'], 0, 2);
            $startm = (int) substr($event['startTime'], 3, 2);
            $eStartMin = $starth * 60 + $startm;
            $dispstarth = ($starth > 12) ? ($starth - $timeformat) : $starth; // used to display the hour


             //fix bug 456 and 455
             //check to see if the event is in the clinic hours range, if not it will not be displayed
             if  ( (int)$starth < (int)$openhour || (int)$starth > (int)$closehour ){ continue; }

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
                    $evtClass = 'event_appointment';
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
                        $outMins = (intval($outH) * 60) + intval($outM);
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
            // prevent the overall height of the event from going beyond the bounds
            // of the time table
            if ($eEndMin > $calEndMin) { $eEndMin = $calEndMin + $interval; }
            $eMinDiff = $eEndMin - $eStartMin;
            // diff divided by the time interval of the schedule
            $eEndInterval = $eMinDiff / $interval;
            // times the interval height
            $eHeight = $eEndInterval * $timeslotHeightVal;
            if($event['catid']==3)
            {
                // An "OUT" that is "zero duration" still needs height so we can click it.
                $eHeight = $eEndInterval==0 ? $timeslotHeightVal : $eHeight ;
            }
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
            $eventtype = sqlQuery("SELECT pc_cattype FROM openemr_postcalendar_categories as oc LEFT OUTER JOIN openemr_postcalendar_events as oe ON oe.pc_catid=oc.pc_catid WHERE oe.pc_eid=?", [$eventid]);
            $pccattype = '';
            if($eventtype['pc_cattype']==1)
            $pccattype = 'true';
            $patientid = $event['pid'];
            $commapos = strpos(($event['patient_name'] ?? ''), ",");
            $lname = substr(($event['patient_name'] ?? ''), 0, $commapos);
            $fname = substr(($event['patient_name'] ?? ''), $commapos + 2);
            $patient_dob = oeFormatShortDate($event['patient_dob']);
            $patient_age = $event['patient_age'];
            $catid = $event['catid'];
            $comment = $event['hometext'];
            $catname = $event['catname'];
            $title = "Age $patient_age ($patient_dob)";

            //Variables for therapy groups
            $groupid = $event['gid'];
            $groupname = $event['group_name'];
            $grouptype = $event['group_type'];
            $groupstatus = $event['group_status'];
            $groupcounselors = '';
            foreach($event['group_counselors'] as $counselor){
                $groupcounselors .= getUserNameById($counselor) . " \n ";
            }
            $content = "";

            if ($comment && $GLOBALS['calendar_appt_style'] < 4) $title .= " " . $comment;

            // the divTitle is what appears when the user hovers the mouse over the DIV
            if($groupid)
                $divTitle = xl('Counselors') . ": \n" . $groupcounselors . " \n";
            else
                $divTitle = $provider["fname"] . " " . $provider["lname"];
            $result = sqlStatement("SELECT name,id,color FROM facility WHERE id=(SELECT pc_facility FROM openemr_postcalendar_events WHERE pc_eid=?)", [$eventid]);
            $row = sqlFetchArray($result);
            $color=$event["catcolor"];
            if($GLOBALS['event_color']==2)
            $color=$row['color'];
            $divTitle .= "\n" . $row['name'];

            if ($catid == 2 || $catid == 3 || $catid == 4 || $catid == 8 || $catid == 11) {
                if      ($catid ==  2) $catname = xl("IN");
                else if ($catid ==  3) $catname = xl("OUT");
                else if ($catid ==  4) $catname = xl("VACATION");
                else if ($catid ==  8) $catname = xl("LUNCH");
                else if ($catid == 11) $catname = xl("RESERVED");

                $atitle = $catname;
                if ($comment) $atitle .= " $comment";
                $divTitle .= "\n[".$atitle ."]";
                $content .= text($catname);
                if ($event['recurrtype'] > 0) {
                    $content .= "<img class='border-0' src='{$this->_tpl_vars['TPL_IMAGE_PATH']}/repeating8.png' style='margin: 0 2px 0 2px;' title='" . xla("Repeating event") . "' alt='" . xla("Repeating event") . "' />";
                }
                if ($comment) {

                    $content .= " " . text($comment);
                }
            }
            else {
                // some sort of patient appointment
                if($groupid)
                    $divTitle .= "\r\n[" . $catname . ' ' . $comment . "]" . $groupname;
                else
                    $divTitle .= "\r\n[" . $catname . ' ' . $comment . "]" . $fname . " " . $lname;
                $content .= "<span class='appointment'>";
                $content .= create_event_time_anchor($dispstarth . ":" . sprintf("%02s", $startm));
                if ($event['recurrtype'] > 0) $content .= "<img src='{$this->_tpl_vars['TPL_IMAGE_PATH']}/repeating8.png' border='0' style='margin:0px 2px 0px 2px;' title='" . xla("Repeating event") . "' alt='" . xla("Repeating event") . "'>";
                $content .= '&nbsp;' . text($event['apptstatus']);
                if ($patientid) {
                    // include patient name and link to their details
                    $link_title = attr($fname) . " " . attr($lname) . " \n";
                    // note we don't escape comment as its already been escaped in pnuserapi
                    $link_title .= xla('Age') . ": " . attr($patient_age) . "\n" . xla('DOB') . ": " . attr($patient_dob) . " $comment" . "\n";
                    $link_title .= "(" . xla('Click to view') . ")";
                    $content .= "<a class='link_title' data-pid='". attr($patientid) . "' href='javascript:goPid(" . attr_js($patientid) . ")' title='" . $link_title . "'>";
                    $content .= "<i class='fas fa-user text-success' onmouseover=\"javascript:ShowImage(" . attr_js($GLOBALS['webroot']."/controller.php?document&retrieve&patient_id=".urlencode($patientid)."&document_id=-1&as_file=false&original_file=true&disable_exit=false&show_original=true&context=patient_picture") . ");\" onmouseout=\"javascript:HideImage();\" title='" . $link_titles . "'></i>";
                    if ($catid == 1) $content .= "<s>";
                    $content .= text($lname);
                    if ($GLOBALS['calendar_appt_style'] != 1) {
                        $content .= "," . text($fname);
                        if ($event['title'] && $GLOBALS['calendar_appt_style'] >= 3) {
                            $content .= "(" . text($event['title']);
                            if ($event['hometext'] && $GLOBALS['calendar_appt_style'] >= 4) {
                                // note hometext is already escaped in pnuserapi.php via the pcVarPrepHTMLDisplay function
                                // we don't double escape it here.
                                $content .= ": <span class='text-success'>" . trim($event['hometext']) . "</span>";
                            }
                            $content .= ")";
                        }
                    }
                    if ($catid == 1) $content .= "</s>";
                    $content .= "</a>";
                }
                elseif($groupid){
                    $divTitle .= "\n" . getTypeName($grouptype) . "\n";
                    $link_title = '';
                    $link_title .= $divTitle ."\n";
                    $link_title .= "(" . xl('Click to view') . ")";
                    $content .= "<a href='javascript:goGid(" . attr_js($groupid) . ")' title='" . attr($link_title) . "'>";
                    $content .= "<i class='fas fa-user text-primary' title='" . attr($link_title) . "'></i>";
                    if ($catid == 1) $content .= "<s>";
                    $content .= text($groupname);
                    if ($GLOBALS['calendar_appt_style'] != 1) {
                        if ($event['title'] && $GLOBALS['calendar_appt_style'] >= 3) {
                            $content .= "(" . text($event['title']);
                            if ($event['hometext'] && $GLOBALS['calendar_appt_style'] >= 4) {
                                // note hometext is already escaped in pnuserapi.php via the pcVarPrepHTMLDisplay function
                                // we don't double escape it here.
                                $content .= ": <span class='text-success'>" . trim($event['hometext']) . "</span>";
                            }
                            $content .= ")";
                        }
                    }
                    if ($catid == 1) $content .= "</s>";
                    $content .= "</a>";

                    //Add class to wrapping div so EditEvent js function can differentiate between click on group and patient
                    $evtClass .= ' groups ';
                }
                else {
                      //Category Clinic closaed or holiday take the event title
                    if ( $catid ==6  || $catid == 7){
                         $content = xlt($event['title']);
                    }else{
                        // no patient id, just output the category name
                        $content .= text(xl_appt_category($catname));
                    }
                }
                $content .= "</span>";
            }

            $divTitle .= "\n(" . xl('double click to edit') . ")";

       if($_SESSION['pc_facility'] == 0){
          // a special case for the 'IN' event this puts the time ABOVE
          // the normal DIV so it doesn't overlap another event DIV and include the time
          if ($event['catid'] == 2) {
              $inTop = 20+($eStartPos - $timeslotHeightVal).$timeslotHeightUnit;
              echo "<div data-eid='" . attr($eventid) . "' class='" . attr($evtClass) . " event in_start' style='top:".$inTop.
                  "; height:".$timeslotHeightVal.$timeslotHeightUnit.
                  "; $divWidth".
                  "; $divLeft".
                  "; border: none".
                  "' title='" . attr($divTitle) . "'".
                  " id='" . attr($eventdate) . "-" . attr($eventid) . "-" . attr($pccattype) . "'".
                  ">";
              $content = text($dispstarth) . ':' . text(sprintf("%02s", $startm)) . " " . $content;
              echo $content;
              echo "</div>\n";
          }

          // output the DIV and content
          // For "OUT" events, applying the background color in CSS.

            if ($event['catid'] != "6") {
              $background_string = "; background-color:" . attr($color);
              echo "<div data-eid='" . attr($eventid) . "' class='" . attr($evtClass) . " event' style='top:".$evtTop."; height:".$evtHeight.
              $background_string.
              "; $divWidth".
              "; $divLeft".
              "' title='" . attr($divTitle) . "'".
              " id='" . attr($eventdate) . "-" . attr($eventid) . "-" . attr($pccattype) . "'".
              ">";
            } else {
              $background_string= "; background-color:" . attr($color);
              echo "<div data-eid='" . attr($eventid) . "' class='" . attr($evtClass) . " hiddenevent' style='top:".$evtTop."; height:".$evtHeight.
              $background_string.
              "; $divWidth".
              "; $divLeft".
              "' title='" . attr($divTitle) . "'".
              " id='" . attr($eventdate) . "-" . attr($eventid) . "-" . attr($pccattype) . "'".
              ">";
            }
          // second part for the special IN event
          if ($event['catid'] != 2) { echo $content; }
          echo "</div>\n";
       }
       elseif($_SESSION['pc_facility'] == $row['id']){
           if ($event['catid'] == 2) {
               $inTop = 20+($eStartPos - $timeslotHeightVal).$timeslotHeightUnit;
               echo "<div data-eid='" . attr($eventid) . "' class='" . attr($evtClass) . " event in_start' style='top:".$inTop.
                   "; height:".$timeslotHeightVal.$timeslotHeightUnit.
                   "; $divWidth".
                   "; $divLeft".
                   "; border: none".
                   "' title='" . attr($divTitle) . "'".
                   " id='" . attr($eventdate) . "-" . attr($eventid) . "-" . attr($pccattype) . "'".
                   ">";
               $content = text($dispstarth) . ':' . text($startm) . " " . $content;
               echo $content;
               echo "</div>\n";
           }

           // output the DIV and content
           // For "OUT" events, applying the background color in CSS.
          $background_string= "; background-color:".$event["catcolor"];
          echo "<div data-eid='" . attr($eventid) . "' class='" . attr($evtClass) . " event' style='top:".$evtTop."; height:".$evtHeight.
               $background_string.
               "; $divWidth".
               "; $divLeft".
               "' title='" . attr($divTitle) . "'".
               " id='" . attr($eventdate) . "-" . attr($eventid) . "-" . attr($pccattype) . "'".
               ">";
           // second part for the special IN event
           if ($event['catid'] != 2) { echo $content; }
           echo "</div>\n";
       }
       else{

           if ($event['catid'] == 2) {
               $inTop = 20+($eStartPos - $timeslotHeightVal).$timeslotHeightUnit;
               echo "<div data-eid='" . attr($eventid) . "' class='" . attr($evtClass) ." event in_start' style='top:".$inTop.
                   "; height:".$timeslotHeightVal.$timeslotHeightUnit.
                   "; $divWidth".
                   "; $divLeft".
                   "; background: var(--gray300)".
                   "; border: none".
                   "' title='" . attr($divTitle) . "'".
                   " id='" . attr($eventdate) . "-" . attr($eventid) . "-" . attr($pccattype) . "'".
                   ">";
               $content = "<span class='text-danger text-center font-weight-bold'>" . text($row['name']) . "</span>";
               echo $content;
               echo "</div>\n";
           }

           // output the DIV and content
           echo "<div data-eid='" . attr($eventid) . "' class='" . attr($evtClass) . " event' style='top:".$evtTop."; height:".$evtHeight.
               "; background-color: var(--gray300)".
               "; $divWidth".
               "; $divLeft".
               "' title='" . attr($divTitle) . "'".
               " id='" . attr($eventdate) . "-" . attr($eventid) . "-" . attr($pccattype) . "'".
               ">";
           // second part for the special IN event
           if ($event['catid'] != 2) { echo "<span class='text-danger text-center font-weight-bold'>" . text($row['name']) . "</span>"; }
           echo "</div>\n";
       }
  } // end EVENT loop

   echo "</div>";

   } // end date

    echo "</td>\n";

} // end provider loop
//============================================================================================================================
echo " </tr>\n";
echo "</table>\n";
echo "</div>\n";
 ?>
</div>  <!-- end bigCal DIV -->
</div>  <!-- end bottom DIV -->
</div>
</form>
</div>

<script>
    var tsHeight=<?php  echo js_escape($timeslotHeightVal.$timeslotHeightUnit);  ?>;
    var tsHeightNum=<?php  echo js_escape($timeslotHeightVal);  ?>;

    function providerXclick(e) {
        var username=$(this).data('username');
        if (username=='__PC_ALL__') {
            $("#pc_username option:gt(0)").prop("selected", true);
        } else {
            $("#pc_username option[value="+username+"]").prop("selected", false);
            // $(this).closest('td').remove();
        }
        ChangeProviders($("#pc_username"));
    }

    $(function () {
        setupDirectTime();
        $("#pc_username").change(function() { ChangeProviders(this); });
        $("#pc_facility").change(function() { ChangeProviders(this); });
        //$("#dayview").click(function() { ChangeView(this); });
        $("#weekview").click(function() { ChangeView(this); });
        $("#monthview").click(function() { ChangeView(this); });
        //$("#yearview").click(function() { ChangeView(this); });
        $(".tdDatePicker").click(function() { ChangeDate(this); });
        $("#datePicker .tdDatePicker").mouseover(function() {
          $(this).toggleClass("tdDatePickerHighlightCurrent");
        });
        $("#datePicker .tdDatePicker").mouseout(function() {
          $(this).toggleClass("tdDatePickerHighlightCurrent");
        });
        $("#printview").click(function() { PrintView(this); });
        $(".event").dblclick(function() { EditEvent(this); });
        $(".event").mouseover(function() { $(this).toggleClass("event_highlight"); });
        $(".event").mouseout(function() { $(this).toggleClass("event_highlight"); });
        $(".tdMonthName-small").click(function() {

            dpCal = $("#datePicker > table");
            mp = $("#monthPicker");
            mp.width(dpCal.width());
            mp.toggle();
        });

        //$('div.providerheader').find('*').css('font-size', $('div.providerheader:first').css('font-size')).addClass(' mx-1 p-0 border-0 align-middle');
        $('.providerXbtn').on('click', providerXclick);

    });

    /* edit an existing event */
    var EditEvent = function(eObj) {
        //alert ('editing '+eObj.id);
        // split the object ID into date and event ID
        objID = eObj.id;
        var parts = new Array();
        parts = objID.split("-");
        editing_group = $(eObj).hasClass("groups");
        if(editing_group){
            oldGroupEvt(parts[0], parts[1], parts[2]);
            return true;
        }
        // call the oldEvt function to bring up the event editor
        oldEvt(parts[0], parts[1], parts[2]);
        return true;
    }

    /* change the current date based upon what the user clicked in
     * the datepicker DIV
     */
    var ChangeDate = function(eObj) {
        baseURL = "<?php echo pnModURL(__POSTCALENDAR__,'user','view',
                        array('tplview'=>($template_view ?? ''),
                        'viewtype'=>$viewtype,
                        'Date'=> '~REPLACEME~',
                        'pc_username'=>($pc_username ?? ''),
                        'pc_category'=>($category ?? ''),
                        'pc_topic'=>($topic ?? ''))); ?>";
        newURL = baseURL.replace(/~REPLACEME~/, eObj.id);
        document.location.href=newURL;
    }

    /* pop up a window to print the current view
     */
    var PrintView = function (eventObject) {
        printURL = "<?php echo pnModURL(__POSTCALENDAR__,'user','view',
                        array('tplview'=>($template_view ?? ''),
                        'viewtype'=>$viewtype,
                        'Date'=> $Date,
                        'print'=> 1,
                        'pc_username'=>($pc_username ?? ''),
                        'pc_category'=>($category ?? ''),
                        'pc_topic'=>($topic ?? ''))); ?>";
        window.open(printURL,'printwindow','width=740,height=480,toolbar=no,location=no,directories=no,status=no,menubar=yes,scrollbars=yes,copyhistory=no,resizable=yes');
        return false;
    }

    /* change the provider(s)
     */
    var ChangeProviders = function (eventObject) {
        $('#theform').submit();
    };

    /* change the calendar view */
    var ChangeView = function (eventObject) {
        if (eventObject.id == "dayview") {
            $("#viewtype").val('day');
        }
        else if (eventObject.id == "weekview") {
            $("#viewtype").val('week');
        }
        else if (eventObject.id == "monthview") {
            $("#viewtype").val('month');
        }
        else if (eventObject.id == "yearview") {
            $("#viewtype").val('year');
        }
        $('#theform').submit();
    };

    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>

</body>
</html>