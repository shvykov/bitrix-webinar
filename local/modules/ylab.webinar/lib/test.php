<?php

namespace YLab\Webinar;

use Bitrix\Main\Entity\DataManager;

/**
 * Class TestTable
 * Пример
 * @package YLab\Webinar
 */
class TestTable extends DataManager
{
    /**
     * @return string
     */
    public static function getFilePath()
    {
        return __FILE__;
    }

    /**
     * @return string
     */
    public static function getTableName()
    {
        return 'b_ylab_test';
    }

    /**
     * @return array
     */
    public static function getMap()
    {
        return [
            'ID' => [
                'data_type' => 'integer',
                'primary' => true,
                'autocomplete' => true,
            ],
            'NAME' => [
                'data_type' => 'integer',
                'required' => true
            ]
        ];
    }
}