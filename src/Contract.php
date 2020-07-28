<?php

declare(strict_types=1);

/**
 * @copyright   Copyright 2020, CitrusContract. All Rights Reserved.
 * @author      take64 <take64@citrus.tk>
 * @license     http://www.citrus.tk/
 */

namespace Citrus;

use Citrus\Configure\Configurable;
use Citrus\Contract\Builder;
use Citrus\Contract\ContractException;
use Citrus\Http\HttpException;
use Citrus\Http\Server\Request;
use Citrus\Variable\Directories;
use Citrus\Variable\Singleton;

/**
 * コントラクトクラス
 */
class Contract extends Configurable
{
    use Singleton;

    /**
     * アクセスURLからデータを自動でパースしてオブジェクトを生成する
     *
     * @return object コントラクトファイルで型指定されたオブジェクト
     * @throws HttpException
     * @throws ContractException
     */
    public function autoParse(): object
    {
        // リクエスト
        $request = Request::generate();

        // URLのパスを取得
        $request_path = $request->requestPath();
        // パスの先頭を大文字化
        $request_path = Directories::upperFirstPath($request_path);

        // マッチするコントラクトファイルを選別
        $contract_path = $this->configures['path'] . $request_path . '.php';
        ContractException::exceptionElse(file_exists($contract_path), 'コントラクトファイルが存在しません');

        // データ取得
        $request_data = (true === $request->isJson() ? $request->jsons() : $request->posts());

        // オブジェクト生成とバリデーション、そして返却
        return Builder::execute($contract_path, $request_data);
    }



    /**
     * {@inheritDoc}
     */
    protected function configureKey(): string
    {
        return 'contract';
    }



    /**
     * {@inheritDoc}
     */
    protected function configureDefaults(): array
    {
        return [];
    }



    /**
     * {@inheritDoc}
     */
    protected function configureRequires(): array
    {
        return [
            'path',
        ];
    }
}
