<?php

declare(strict_types=1);

/**
 * @copyright   Copyright 2020, CitrusContract. All Rights Reserved.
 * @author      take64 <take64@citrus.tk>
 * @license     http://www.citrus.tk/
 */

namespace Citrus\Contract\Validator;

use Citrus\Contract\ContractException;
use Citrus\Contract\Element;

/**
 * コントラクトプロパティの検証(その他)
 */
trait Other
{
    /**
     * 電話番号チェック
     *
     * @param Element $element 要素
     * @throws ContractException
     */
    public static function varTypeTel(Element $element): void
    {
        ContractException::exceptionIf(
            (0 === preg_match('/^[0-9]{2,3}-[0-9]{1,4}-[0-9]{2,4}$/', $element->value)),
            sprintf('「%s」には電話番号を入力してください。', $element->name),
        );
    }



    /**
     * メールアドレスチェック
     *
     * @param Element $element 要素
     * @throws ContractException
     */
    public static function varTypeEmail(Element $element): void
    {
        ContractException::exceptionIf(
            (0 === preg_match('/^([*+!.&#$|\'\\%\/0-9a-z^_`{}=?> :-]+)@(([0-9a-z-]+\.)+[0-9a-z]{2,})$/i', $element->value)),
            sprintf('「%s」にはメールアドレスを入力してください。', $element->name),
        );
    }
}
