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
     *
     * @param Element $element 要素
     * @throws ContractException
     */
    public static function varType(Element $element): void
    {
        // 入力がある場合のみチェックする。
        if (false === is_numeric($element->value) and true === Strings::isEmpty($element->value))
        {
            return;
        }

        switch ($element->var_type)
        {
            // int
            case ElementType::TYPE_INT:
                self::varTypeInt($element);
                break;

            // float
            case ElementType::TYPE_FLOAT:
                self::varTypeFloat($element);
                break;

            // numeric
            case ElementType::TYPE_NUMERIC:
                self::varTypeNumeric($element);
                break;

            // string
            case ElementType::TYPE_STRING:
                self::varTypeString($element);
                break;

            // alphabet
            case ElementType::TYPE_ALPHABET:
                self::varTypeString($element);
                self::varTypeAlphabet($element);
                break;

            // alphabet & numeric
            case ElementType::TYPE_ALPHANUMERIC:
                self::varTypeString($element);
                self::varTypeAlphanumeric($element);
                break;

            // alphabet & numeric & marks
            case ElementType::TYPE_AN_MARKS:
                self::varTypeString($element);
                self::varTypeANMarks($element);
                break;

            // date
            case ElementType::TYPE_DATE:
                self::varTypeDate($element);
                break;

            // time
            case ElementType::TYPE_TIME:
                self::varTypeString($element);
                self::varTypeTime($element);
                break;

            // datetime
            case ElementType::TYPE_DATETIME:
                self::varTypeString($element);
                self::varTypeDatetime($element);
                break;

            // tel
            case ElementType::TYPE_TEL:
                self::varTypeString($element);
                self::varTypeTel($element);
                break;

            // email
            case ElementType::TYPE_EMAIL:
                self::varTypeString($element);
                self::varTypeEmail($element);
                break;

            // other
            default:
                break;
        }
    }
}
