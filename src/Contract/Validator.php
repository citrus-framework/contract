<?php

declare(strict_types=1);

/**
 * @copyright   Copyright 2020, CitrusContract. All Rights Reserved.
 * @author      take64 <take64@citrus.tk>
 * @license     http://www.citrus.tk/
 */

namespace Citrus\Contract;

use Citrus\Contract\Validator\Datetime;
use Citrus\Contract\Validator\Other;
use Citrus\Contract\Validator\Size;
use Citrus\Contract\Validator\VarType;
use Citrus\Variable\Strings;

/**
 * コントラクト検証クラス
 */
class Validator
{
    // 検証(サイズ)
    use Size;
    // 検証(変数型)
    use VarType;
    // 検証(日時)
    use Datetime;
    // 検証(その他)
    use Other;

    /**
     * 型チェック
     * @param Element $element 要素
     * @throws ContractException
     */
    public static function varType(Element $element): void
    {
        // 入力がある場合のみチェックする。
        if (false === is_numeric($element->value)
            and false === is_bool($element->value)
            and true === Strings::isEmpty($element->value))
        {
            return;
        }

        switch ($element->var_type)
        {
            case ElementType::TYPE_INT:
                // int
                self::varTypeInt($element);
                break;
            case ElementType::TYPE_FLOAT:
                // float
                self::varTypeFloat($element);
                break;
            case ElementType::TYPE_NUMERIC:
                // numeric
                self::varTypeNumeric($element);
                break;
            case ElementType::TYPE_STRING:
                // string
                self::varTypeString($element);
                break;
            case ElementType::TYPE_ALPHABET:
                // alphabet
                self::varTypeString($element);
                self::varTypeAlphabet($element);
                break;
            case ElementType::TYPE_ALPHANUMERIC:
                // alphabet & numeric
                self::varTypeString($element);
                self::varTypeAlphanumeric($element);
                break;
            case ElementType::TYPE_AN_MARKS:
                // alphabet & numeric & marks
                self::varTypeString($element);
                self::varTypeANMarks($element);
                break;
            case ElementType::TYPE_DATE:
                // date
                self::varTypeDate($element);
                break;
            case ElementType::TYPE_TIME:
                // time
                self::varTypeString($element);
                self::varTypeTime($element);
                break;
            case ElementType::TYPE_DATETIME:
                // datetime
                self::varTypeString($element);
                self::varTypeDatetime($element);
                break;
            case ElementType::TYPE_TEL:
                // tel
                self::varTypeString($element);
                self::varTypeTel($element);
                break;
            case ElementType::TYPE_EMAIL:
                // email
                self::varTypeString($element);
                self::varTypeEmail($element);
                break;
            default:
                // other
                break;
        }
    }
}
