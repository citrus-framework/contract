<?php

declare(strict_types=1);

/**
 * @copyright   Copyright 2020, CitrusContract. All Rights Reserved.
 * @author      take64 <take64@citrus.tk>
 * @license     http://www.citrus.tk/
 */

namespace Citrus\Contract;

use Citrus\Variable\Directories;

/**
 * コントラクトからオブジェクト生成するクラス
 */
class Builder
{
    /**
     * オブジェクトの生成
     *
     * @param string $contract_path コントラクトファイルパス
     * @param array  $data          POSTなどで渡されてきたデータ
     * @return object コントラクトファイルで型指定されたオブジェクト
     * @throws ContractException
     */
    public static function execute(string $contract_path, array $data): object
    {
        // コントラクトファイルパスから、コントラクト定義配列を取得
        $contract_path = Directories::suitablePath($contract_path);
        $contracts = include $contract_path;
        // オブジェクト型
        $type = ($contracts['type'] ?? null);
        ContractException::exceptionIf(is_null($type), sprintf('[%s] の type が未定義です', $contract_path));
        // 要素
        $elements = ($contracts['elements'] ?? null);
        ContractException::exceptionIf(is_null($elements), sprintf('[%s] の elements が未定義です', $contract_path));

        // オブジェクト生成
        $object = new $type();
        // 要素プロパティの設定
        foreach ($elements as $element_key => $element_define)
        {
            // 要素
            $element = new Element($element_define, ($data[$element_key] ?? null));
            // バリデーション
            $element->validate();
            // 設定
            $object_key = $element->property;
            $object->$object_key = self::valueByVarType($element);
        }

        return $object;
    }



    /**
     * 値をvar_typeの型で修正して返却
     *
     * @param Element $element
     * @return mixed
     */
    private static function valueByVarType(Element $element)
    {
        // nullか、文字列で空文字であればそのまま返却
        if (true === is_null($element->value) or (true === is_string($element->value) and '' === $element->value))
        {
            return $element->value;
        }

        // 整数系
        if ($element->var_type === ElementType::TYPE_INT)
        {
            return (int)$element->value;
        }
        // 浮動小数点数
        if (true === in_array($element->var_type, [ElementType::TYPE_FLOAT, ElementType::TYPE_NUMERIC], true))
        {
            return (float)$element->value;
        }
        return $element->value;
    }
}
