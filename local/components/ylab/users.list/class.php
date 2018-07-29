<?php

class UsersListComponent extends \CBitrixComponent
{
    public function executeComponent()
    {
        global $APPLICATION;

        $APPLICATION->RestartBuffer();
        $this->arResult = $this->getUsersList();

        $this->includeComponentTemplate();
    }

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
