<?php
if (!function_exists('translate')) {
    function translate($key, $translations, $default = '') {
        return isset($translations[$key]) ? $translations[$key] : $default;
    }
}
?>
