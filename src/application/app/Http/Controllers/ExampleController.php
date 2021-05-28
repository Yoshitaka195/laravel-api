<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\ExampleService;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\ExampleRequest;
use App\Http\Responses\ExampleResponse;

/**
 * Example取得
 * ExampleController class
 */
class ExampleController extends Controller
{
  /**
   * Example取得サービス
   *
   * @var App\Service\ExampleService
   */
  private $ExampleService = null;

    /**
     * ExampleController constructor
     *
     * @param ExampleService $ExampleService
     */
    public function __construct(ExampleService $ExampleService)
    {
        $this->ExampleService = $ExampleService;
    }

    /**
     * Exampleを取得する
     *
     * @param ExampleRequest $request
     * @return JsonResponse
     */
     public function read(ExampleRequest $request): JsonResponse
    {
        info('ExampleController read [START]');

        $result = $this->ExampleService->execute($request);

        info($result);

        info('ExampleController read [END]');

        return ExampleResponse::singleResult(
            $result['status'],
            $result['result_data'],
            $result['message_code'],
            $result['message']
        );
    }

}

