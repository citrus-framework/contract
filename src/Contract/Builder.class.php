<?php

declare(strict_types=1);

/**
 * @copyright   Copyright 2020, CitrusContract. All Rights Reserved.
 * @author      take64 <take64@citrus.tk>
 * @license     http://www.citrus.tk/
 */

namespace Citrus\Contract;

use Citrus\Variable\Directory;

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
        $contract_path = Directory::suitablePath($contract_path);
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
            // オブジェクトキー
            $property_key = ($element_define['property'] ?? $element_key);
            // 要素
            $element = new Element($element_define, $data[$property_key]);
            // バリデーション
            $element->validate();
            // 設定
            $object_key = $element->property;
            $object->$object_key = $element->value;
        }

        return $object;
    }
}
