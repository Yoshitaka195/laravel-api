<?php

declare(strict_types=1);

namespace App\Services;

use App\Consts\ErrorMessageConst;
use App\Consts\SuccessMessageConst;
use App\Entities\ExampleEntity;
use App\Repositories\ExampleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

/**
 * Example取得
 *
 * ExampleService class
 */
class ExampleService extends BaseService
{
    /**
     * Exampleリポジトリ
     *
     * @var ExampleRepository
     */
    private $example_repository = null;

    /**
     * コンストラクタ
     *
     * @param ExampleRepository $repository
     */
    public function __construct(ExampleRepository $example_repository)
    {
        $this->example_repository = $example_repository;
    }

    /**
     * リクエストパラメータのセット
     *
     * @param Request $request
     * @return void
     */
    private function setRequestParameter(Request $request): void
    {
        $this->_setRequestParameter($request->all(), [
            'example',
        ]);
    }

    /**
     * サービス実行関数
     *
     * @param Request $request
     * @return array
     */
    public function execute(Request $request): array
    {
        try {
            info('ExampleService execute [START]');

            // リクエストパラメータのセット
            $this->setRequestParameter($request);

            // データ取得
            $result = $this->example_repository->getDetail();

            // データ型の担保
            $entity = app(ExampleEntity::class);
            $entity->setEntity($result);

            info('ExampleService execute [END]');

            return [
                'status' => true,
                'result_data' => $entity,
                'message_code' => 'S_EXAMPLE',
                'message' => SuccessMessageConst::MESSAGE['EXAMPLE'][0]
            ];
        } catch (\Exception $e) {

            info($e);
            return [
                'status' => false,
                'result_data' => app(ExampleEntity::class),
                'message_code' => 'E_EXAMPLE',
                'message' => ErrorMessageConst::MESSAGE['EXAMPLE'][0]
            ];
        }
    }
}

