<?php
include_once './autoload.php';
// تنفيذ مجموعة من العمليات الخاصه ببدا الجلسه
function executeOperations(array $operations, $parameter = null)
{
    foreach ($operations as $operation) {
        if ($operation instanceof SessionOperation) {
            $operation::execute($parameter);
        }
    }
}

// إعدادات الجلسة
$config = new ConnfigOfSession([
    'session.gc_maxlifetime' => '3600', // 1 ساعة
    'session.cookie_lifetime' => '3600' // 1 ساعة
]);

// إعداد التشفير
$encryptionKey = 'c7a2e1b5d4f9c8a7b9e1d4f5a3c6e7b8f9a1c2d3e4f6b7a9c0d1e2a3f4b5c6d';
$encryptor = new EncryptSessionID($encryptionKey);

// بيانات الجلسة
$data = [
    'user_id' => '12345',
    'user_role' => 'admin'
];

// قائمة العمليات
$operations = [
    $config,        // إعدادات الجلسة
    new StartSession(),  // بدء الجلسة
    new ChangeSessionId(), // تغيير معرف الجلسة
    new SaveSessionData($data, $encryptor), // تخزين البيانات
    new SetSessionTimeOut() // تعيين توقيت الجلسة
];

// تنفيذ العمليات
executeOperations($operations);
?>