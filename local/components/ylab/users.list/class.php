<?php

/**
 * Class UsersListComponent
 * Компонент вывода списка пользователей
 */
class UsersListComponent extends \CBitrixComponent
{
    /**
     * @return mixed|void
     */
    public function executeComponent()
    {
        /** @global \CMain $APPLICATION */
        global $APPLICATION;

        $APPLICATION->RestartBuffer();
        $this->arResult = $this->getUsersList();

        $this->includeComponentTemplate();
    }

    /**
     * @return array
     */
    protected function getUsersList()
    {
        return [
            [
                'ID' => 1,
                'NAME' => 'Иван'
            ],
            [
                'ID' => 2,
                'NAME' => 'Петр'
            ],
            [
                'ID' => 3,
                'NAME' => 'Евгений'
            ]
        ];
    }
}
