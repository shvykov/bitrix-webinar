<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/local/vendor/autoload.php';

try {
    \Bitrix\Main\Loader::includeModule('ylab.validation');
} catch (\Exception $e) {
    ShowError($e->getMessage());
}
