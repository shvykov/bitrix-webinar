<?php

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\ModuleManager;

Loc::loadMessages(__FILE__);

/**
 * Class ylab_webinar
 */
class ylab_webinar extends CModule
{
    /**
     * ylab_webinar constructor.
     */
    public function __construct()
    {
        $arModuleVersion = [];

        include __DIR__ . '/version.php';

        if (is_array($arModuleVersion) && array_key_exists('VERSION', $arModuleVersion)) {
            $this->MODULE_VERSION = $arModuleVersion['VERSION'];
            $this->MODULE_VERSION_DATE = $arModuleVersion['VERSION_DATE'];
        }

        $this->MODULE_ID = 'ylab.webinar';
        $this->MODULE_NAME = Loc::getMessage('MODULE_NAME');
        $this->MODULE_DESCRIPTION = Loc::getMessage('MODULE_DESCRIPTION');
        $this->MODULE_GROUP_RIGHTS = 'N';
    }

    /**
     * Установка модуля
     */
    public function doInstall()
    {
        $this->InstallDB();
        ModuleManager::registerModule($this->MODULE_ID);
    }

    /**
     * Удаление модуля
     */
    public function doUninstall()
    {
        $this->UnInstallDB();
        ModuleManager::unRegisterModule($this->MODULE_ID);
    }

    /**
     * Создание таблиц модуля
     */
    public function InstallDB()
    {
        /** @var \CMain $APPLICATION */
        /** @var \CDatabase $DB */
        global $DB, $APPLICATION;

        $oResult = $DB->RunSQLBatch(__DIR__ . '/db/' . strtolower($DB->type) . '/install.sql');
        if (is_array($oResult)) {
            $APPLICATION->ThrowException(implode("", $oResult));
        }
    }

    /**
     * Удаление таблиц модуля
     */
    public function UnInstallDB()
    {
        /** @var \CMain $APPLICATION */
        /** @var \CDatabase $DB */
        global $DB, $APPLICATION;

        $oResult = $DB->RunSQLBatch(__DIR__ . '/db/' . strtolower($DB->type) . '/uninstall.sql');
        if (is_array($oResult)) {
            $APPLICATION->ThrowException(implode("", $oResult));
        }
    }
}
