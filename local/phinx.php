<?php
define('NOT_CHECK_PERMISSIONS', true);
define('NO_AGENT_CHECK', true);

$GLOBALS['DBType'] = 'mysql';
$_SERVER['DOCUMENT_ROOT'] = realpath(__DIR__ . '/..');

include($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

/** @var \CDatabase $DB */
global $DB;

try {
    $oApp = \Bitrix\Main\Application::getInstance();
    $oCon = $oApp->getConnection();
    $DB->db_Conn = $oCon->getResource();
    $_SESSION['SESS_AUTH']['USER_ID'] = 1;

    $arConfig = include realpath(__DIR__ . '/../bitrix/.settings.php');
    $arConfigDB = $arConfig['connections']['value']['default'];

    return [
        'paths' => [
            'migrations' => 'migrations'
        ],
        'environments' => [
            'default_migration_table' => 'phinxlog',
            'default_database' => 'dev',
            'dev' => [
                'adapter' => 'mysql',
                'host' => $arConfigDB['host'],
                'name' => $arConfigDB['database'],
                'user' => $arConfigDB['login'],
                'pass' => $arConfigDB['password']
            ]
        ]
    ];
} catch (\Exception $e) {
    echo $e->getMessage();
}
