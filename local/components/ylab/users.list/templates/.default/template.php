<?php
/**
 * @global \CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

//echo json_encode($arResult);
echo json_encode($this->getComponent()->arResult);
