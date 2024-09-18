<?php
spl_autoload_register(function ($class_name) {
    $file = './' . $class_name . '.php';
    if (file_exists($file)) {
        include $file;
    } else {
        $file = './csrf/' . $class_name . '.php';
        if (file_exists($file)) {
            include $file;
        }
    }
});
?>