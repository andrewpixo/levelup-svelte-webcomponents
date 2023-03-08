<?php

namespace App\Utilities;

class DateFormatter
{
    public static function getShortMonthForDate(\DateTime $dateTime)
    {
        return $dateTime->format('M');
    }

    public static function getFormattedTimeFromDate(\DateTime $dateTime)
    {
        return $dateTime->format('g:i A');
    }

    public static function getDateStringFromStartAndEndDates(\DateTime $startDateTime, \DateTime $endDateTime)
    {
        $startDate = self::getDateStringFromDate($startDateTime);
        $endDate = self::getDateStringFromDate($endDateTime);

        if($startDate === $endDate)
            return $startDate;

        return "$startDate - $endDate";
    }

    public static function getDetailedDate($model)
    {
        $startDayOfWeek = $model->startDayOfWeek;
        $startDate = self::getDateStringFromDate($model->startDate);
        $dateString = $startDayOfWeek . ', ' . $startDate . ', ';

        if(!$model->isMultiDay) {
            if(!$model->isAllDay){
                $startTime = self::getFormattedTimeFromDate(new \DateTime($model->startTime));
                $endTime = self::getFormattedTimeFromDate(new \DateTime($model->endTime));

                $dateString .= $startTime . ' - ' . $endTime;
            }
            else {
                $dateString .= 'All day';
            }
        }
        else {
            $endDayOfWeek = $model->endDayOfWeek;
            $endDate = self::getDateStringFromDate($model->endDate);

            if(!$model->isAllDay){
                $startTime = self::getFormattedTimeFromDate(new \DateTime($model->startTime));
                $endTime = self::getFormattedTimeFromDate(new \DateTime($model->endTime));

                $dateString .= $startTime . ' - ' . $endDayOfWeek . ', ' . $endDate . ', ' . $endTime;
            }
            else {
                $dateString .=  ' - ' . $endDayOfWeek . ', ' . $endDate . ', ';
                $dateString .= 'All day';
            }

        }

        return $dateString;
    }

    public static function getDayOfMonth(\DateTime $dateTime)
    {
        return $dateTime->format('j');
    }

    public static function getDayOfWeek(\DateTime $dateTime)
    {
        return $dateTime->format('l');
    }

    public static function getShortDayOfWeek(\DateTime $dateTime)
    {
        return $dateTime->format('D');
    }

    public static function getDateStringFromDate(\DateTime $dateTime)
    {
        return $dateTime->format('F j, Y');
    }
}
