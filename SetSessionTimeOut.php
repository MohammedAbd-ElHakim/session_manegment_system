<?php
include_once './SessionOperation.php';

class SetSessionTimeOut implements SessionOperation
{
    public static function execute($timeout = '3600')
    {
        // تعيين إعدادات الجلسة
        ini_set('session.gc_maxlifetime', (int) $timeout); // تعيين الوقت الذي تعتبر فيه الجلسة غير نشطة
        ini_set('session.cookie_lifetime', (int) $timeout); // تعيين الوقت الذي تبقى فيه الكوكيز صالحة
    }
}
?>