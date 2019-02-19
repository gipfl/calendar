<?php

namespace gipfl\Tests\Html;

use gipfl\Calendar\Calendar;

class CalendarTest extends TestCase
{
    public function testSomething()
    {
        $this->assertTrue(true);
    }

    public function testGivesCorrectWeekDaysWhenFirstOfWeekIsMonday()
    {
        $calendar = new Calendar(Calendar::FIRST_IS_MONDAY);
        $this->assertEquals([
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday',
        ], $calendar->listWeekDayNames());
    }

    public function testGivesCorrectWeekDaysWhenFirstOfWeekIsSunday()
    {
        $calendar = new Calendar(Calendar::FIRST_IS_SUNDAY);
        $this->assertEquals([
            'Sunday',
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
        ], $calendar->listWeekDayNames());
    }

    public function testFirstDayOfWeek()
    {
        $calendar = new Calendar(Calendar::FIRST_IS_SUNDAY);
        $this->assertEquals('2019-02-03', $calendar->getFirstDayOfWeek('2019-02-07'));
        $calendar->setFirstOfWeek(Calendar::FIRST_IS_MONDAY);
        $this->assertEquals('2019-02-04', $calendar->getFirstDayOfWeek('2019-02-07'));
    }

    public function testLastWeekOfFebruary2020GivesCorrectDays()
    {
        $calendar = new Calendar(Calendar::FIRST_IS_MONDAY);
        $this->assertEquals([
            1 => '2020-02-24',
            2 => '2020-02-25',
            3 => '2020-02-26',
            4 => '2020-02-27',
            5 => '2020-02-28',
            6 => '2020-02-29',
            7 => '2020-03-01',
        ], $calendar->getDaysForWeek(strtotime('2020-02-27 12:00:00')));
        // print_r($calendar->getWeeksForMonth(strtotime('2018-08-07 12:00:00')));
    }

    public function testLastWeekOfFebruary2016GivesCorrectWorkingDays()
    {
        $calendar = new Calendar(Calendar::FIRST_IS_MONDAY);
        $this->assertEquals([
            1 => '2016-02-29',
            2 => '2016-03-01',
            3 => '2016-03-02',
            4 => '2016-03-03',
            5 => '2016-03-04',
        ], $calendar->getWorkingDaysForWeek(strtotime('2016-02-29 12:00:00')));
        // print_r($calendar->getWeeksForMonth(strtotime('2018-08-07 12:00:00')));
    }

    public function testGetSomeDays()
    {
        $this->assertTrue(true);
        $calendar = new Calendar();
        // print_r($calendar->getWeeksForMonth(strtotime('2018-08-07 12:00:00')));
    }
}
