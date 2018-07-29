<?php

/** @global \CMain $APPLICATION */
global $APPLICATION;

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Список пользователей");
?>

<?$APPLICATION->IncludeComponent('ylab:users.list', '', []);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>