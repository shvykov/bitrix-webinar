<?php

use \Bitrix\Main\Localization\Loc;

$sModuleId = "ylab.webinar";
CModule::IncludeModule($sModuleId);

IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"] . BX_ROOT . "/modules/main/options.php");
IncludeModuleLangFile(__FILE__);


/**
 * @global CUser $USER
 * @global CMain $APPLICATION
 **/

if ($USER->IsAdmin()):
    $arAllOptions = [
        ["ylab_webinar_", Loc::getMessage("YLAB_WEBINAR_"), ["text", 60]]
    ];

    $aTabs = [
        [
            "DIV" => "edit1",
            "TAB" => Loc::getMessage("MAIN_TAB_SET"),
            "ICON" => "main_settings",
            "TITLE" => Loc::getMessage("MAIN_TAB_TITLE_SET")
        ]
    ];
    $tabControl = new \CAdminTabControl("tabControl", $aTabs);

    if ($_SERVER["REQUEST_METHOD"] === "POST" &&
        $_REQUEST["Update"] . $_REQUEST["Apply"] . $_REQUEST["RestoreDefaults"] != "" && check_bitrix_sessid()) {
        /**
         * Если изменены настройки, то удалим кеш, если он есть
         */
        if ($_REQUEST["RestoreDefaults"] != "") {
            COption::RemoveOption($sModuleId);
        } else {
            foreach ($arAllOptions as $arOption) {
                $sName = $arOption[0];
                $sVal = trim($_REQUEST[$sName], " \t\n\r");
                $sType = $arOption[2][0];

                if ($sType === 'heading') {
                    continue;
                }

                if ($sType === 'checkbox' && $sVal !== 'Y') {
                    $val = 'N';
                }

                \COption::SetOptionString($sModuleId, $sName, $sVal, $arOption[1]);
            }
        }

        if ($_REQUEST["back_url_settings"] != "") {
            if ($_REQUEST["Update"] != "") {
                LocalRedirect($_REQUEST["back_url_settings"]);
            }

            $sReturnUrl = $_GET["return_url"] ? urlencode($_GET["return_url"]) : "";
            LocalRedirect($APPLICATION->GetCurPage() . "?mid=" . urlencode($sModuleId) . "&lang=" .
                urlencode(LANGUAGE_ID) . "&back_url_settings=" . $sReturnUrl . "&" . $tabControl->ActiveTabParam());
        } else {
            LocalRedirect($APPLICATION->GetCurPage() . "?mid=" . urlencode($sModuleId) . "&lang=" .
                urlencode(LANGUAGE_ID) . "&" . $tabControl->ActiveTabParam());
        }
    }
    ?>
    <form method="post"
          action="<? echo $APPLICATION->GetCurPage() ?>?mid=<?= urlencode($sModuleId) ?>&lang=<?= LANGUAGE_ID ?>">
        <?
        $tabControl->Begin();
        $tabControl->BeginNextTab();

        foreach ($arAllOptions as $arOption):
            $arType = $arOption[2];
            $note = $arOption[3] ?: null; ?>
            <? if ($arType[0] === "heading"): ?>
            <tr class="heading">
                <td colspan="2"><b><? echo $arOption[1] ?></b></td>
            </tr>
        <? else: ?>
            <? $val = COption::GetOptionString($sModuleId, $arOption[0]); ?>
            <tr>
                <td width="40%">
                    <label for="<?= htmlspecialcharsbx($arOption[0]) ?>"><?= $arOption[1] ?>
                        <? if ($note !== null): ?>
                            <span class="required"><sup><?= $note ?></sup></span>
                        <? endif; ?>
                        :</label>
                </td>
                <td width="60%">
                    <? if ($arType[0] === "checkbox"): ?>
                        <input type="checkbox" name="<? echo htmlspecialcharsbx($arOption[0]) ?>"
                               id="<? echo htmlspecialcharsbx($arOption[0]) ?>" value="Y"<? if ($val == "Y") {
                            echo " checked";
                        } ?>>
                    <? elseif ($arType[0] === "text"): ?>
                        <input type="text" size="<? echo $arType[1] ?>" maxlength="255"
                               value="<? echo htmlspecialcharsbx($val) ?>"
                               name="<? echo htmlspecialcharsbx($arOption[0]) ?>"
                               id="<? echo htmlspecialcharsbx($arOption[0]) ?>">
                    <? elseif ($arType[0] === "password"): ?>
                        <input type="password" autocomplete="off" size="<? echo $arType[1] ?>" maxlength="255"
                               value="<? echo htmlspecialcharsbx($val) ?>"
                               name="<? echo htmlspecialcharsbx($arOption[0]) ?>"
                               id="<? echo htmlspecialcharsbx($arOption[0]) ?>">
                    <? elseif ($arType[0] === "textarea"): ?>
                        <textarea rows="<? echo $arType[1] ?>" cols="<? echo $arType[2] ?>"
                                  name="<? echo htmlspecialcharsbx($arOption[0]) ?>"
                                  id="<? echo htmlspecialcharsbx($arOption[0]) ?>"><? echo htmlspecialcharsbx($val) ?>
                        </textarea>
                    <? elseif ($arType[0] === "selectbox"):
                        echo SelectBoxFromArray($arOption[0], $arType[1], $val);
                    endif ?>
                </td>
            </tr>
        <? endif; ?>
        <? endforeach ?>
        <? $tabControl->Buttons(); ?>
        <input type="submit" name="Update" value="<?= Loc::getMessage("MAIN_SAVE") ?>"
               title="<?= Loc::getMessage("MAIN_OPT_SAVE_TITLE") ?>">
        <input type="submit" name="Apply" value="<?= Loc::getMessage("MAIN_OPT_APPLY") ?>"
               title="<?= Loc::getMessage("MAIN_OPT_APPLY_TITLE") ?>">
        <? if ($_REQUEST["back_url_settings"] != ""): ?>
            <input type="button" name="Cancel" value="<?= Loc::getMessage("MAIN_OPT_CANCEL") ?>"
                   title="<?= Loc::getMessage("MAIN_OPT_CANCEL_TITLE") ?>"
                   onclick="window.location='<? echo htmlspecialcharsbx(CUtil::addslashes($_REQUEST["back_url_settings"])) ?>'">
            <input type="hidden" name="back_url_settings"
                   value="<?= htmlspecialcharsbx($_REQUEST["back_url_settings"]) ?>">
        <? endif ?>
        <input type="submit" name="RestoreDefaults" title="<? echo Loc::getMessage("MAIN_HINT_RESTORE_DEFAULTS") ?>"
               onclick="return confirm('<? echo AddSlashes(Loc::getMessage("MAIN_HINT_RESTORE_DEFAULTS_WARNING")) ?>')"
               value="<? echo Loc::getMessage("MAIN_RESTORE_DEFAULTS") ?>">
        <?= bitrix_sessid_post(); ?>
        <? $tabControl->End(); ?>
    </form>
<? endif; ?>