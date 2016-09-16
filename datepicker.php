<?php
$myCalendar = new tc_calendar("date2");
$myCalendar->setIcon("calendar/images/iconCalendar.gif");
$myCalendar->setDate(date('d'), date('m'), date('Y'));
$myCalendar->setPath("calendar/");
$myCalendar->setYearInterval(1890, 2080);
	
$myCalendar->dateAllow('1890-01-01', '2045-05-01', false);
	
$myCalendar->setSpecificDate(array("2039-01-10", "2039-01-13", "2039-01-23"), 0, 'month');
	
$myCalendar->startMonday(true);
$myCalendar->showWeeks(true);
	
//Tooltips
$myCalendar->setToolTips(array("2013-07-02", "2013-07-15", "2013-07-25"), 'Р•С›Р•СћР”вЂљР“Р‹Р“вЂљ Р•СџР•Р€Р”С“Р“В®Р“Сћ Р§С’Р§в„ў Р§С’Р§В¤Р§В©Р§РЃ test!', '');
$myCalendar->setToolTips(array("2013-06-06", "2013-06-01", "2013-06-05"), 'Р§С’Р§в„ў Р§С’Р§В¤Р§В©Р§РЃ Р§СљР§вЂР§вЂ”Р§вЂўР§РЃ Р§Р„Р§С’Р§РЃР§в„ўР§С™ Р§вЂ“Р§вЂќ', 'month');
$myCalendar->setToolTips(array("1969-07-06", "2040-07-01", "2013-06-05"), 'РћвЂќРћВµРћР… РћВµРџР‚Рћв„–РџвЂћРџРѓРћВ­РџР‚РћВµРџвЂћРћВµ РћВ· РћВµРџР‚Рћв„–РћВ»РћС—РћС–РћВ® РћВ±РџвЂ¦РџвЂћРћВ®РџвЂљath("calendar/calendar/")');
$myCalendar->setYearInterval(1960, 2017);
$myCalendar->dateAllow("2010-01-01","2017-03-01");
//$myCalendar->setHeight(350);
//$myCalendar->autoSubmit(true, "form1");
$myCalendar->setSpecificDate(array("2011-04-01", "2011-04-13", "2011-04-25"), 0, 'month');
$myCalendar->setOnChange("myChanged('test')");
$myCalendar->writeScript();
?>
