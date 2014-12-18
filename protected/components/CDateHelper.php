<?php

/**
 * Class CDateHelper
 *
 * Хелпер выдающий даты в нужном формате
 *
 * @package Novisse
 * @subpackage Helpers
 */
class CDateHelper
{

    public static function getDayName($unix_timestamp,$timezoneConvertStrategy = null, $get_genitive = false)
    {
        $unix_timestamp = self::timezoneConverter($unix_timestamp,$timezoneConvertStrategy);
        $pattern = ($get_genitive) ? 'ccc' : 'cccc';
        return Yii::app()->dateFormatter->format($pattern,$unix_timestamp);
    }


    public static function getMonthName($unix_timestamp, $get_genitive = false,$timezoneConvertStrategy  = null)
    {
        $unix_timestamp = self::timezoneConverter($unix_timestamp,$timezoneConvertStrategy);
        $pattern = ($get_genitive) ? 'MMMM' : 'LLLL';
        return Yii::app()->dateFormatter->format($pattern,$unix_timestamp);
    }


    public static function getDateWithStrMonth($unix_timestamp,$timezoneConvertStrategy  = null)
    {
        $unix_timestamp = self::timezoneConverter($unix_timestamp,$timezoneConvertStrategy);
        return date('d', $unix_timestamp) . ' ' . CDateHelper::getMonthName($unix_timestamp, true) . ' ' . date('Y', $unix_timestamp);
    }

    public static function getFullDate($date  = null, $pattern = 'yyyy-MM-dd' , $timezoneConvertStrategy  = null){
        $date = ($date) ? $date : time();
        $date = self::timezoneConverter($date,$timezoneConvertStrategy);
        return Yii::app()->dateFormatter->format($pattern,$date);
    }


    public static function timezoneConverter($time,$strategy){
        return time();

    }


    /**
     * @TODO move to view helper
     *
     * @param $last_activity_date
     * @return bool
     */
    public static function getActivityDate($last_activity_date)
    {
        if(Yii::app()->params['optimization'] == 'max'){
            return "";
        }

        if($last_activity_date == null){
            return "Никогда не был в сети";
        }
        $onlineRange = Yii::app()->params["onlineMinutesRange"];
        $now = time();
        if(strtotime("+$onlineRange Minutes",$last_activity_date) < $now ){

            $date1 = new DateTime();
            $date1->setTimestamp($last_activity_date);
            $date2 = new DateTime();
            $date2->setTimestamp($now);
            $interval = $date1->diff($date2);
            if($interval->y > 0){
                return "Был в сети очень давно";
            }else if($interval->h <= 0 && $interval->days == 0){
                return "Был в сети " . $interval->i . " минут назад ";
            }else  if($interval->days == 0){
                return "Был в сети сегодня в " . self::getFullDate($last_activity_date, 'hh:mm') ;
            }else if($interval->days == 1){
                return "Был в сети вчера в " . self::getFullDate($last_activity_date, 'hh:mm') ;
            }else if($interval->days > 1){
                return "Был в сети " . self::getFullDate($last_activity_date, 'dd MMMM hh:mm') ;
            }
        }else{
            return  "Сейчас в сети";;
        }

    }






}