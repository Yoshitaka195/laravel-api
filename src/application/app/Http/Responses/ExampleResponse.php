<?php
declare(strict_types=1);

namespace App\Http\Responses;

use App\Entities\ExampleEntity;
use Illuminate\Http\JsonResponse;

/**
 * Examples取得
 */
class ExampleResponse
{
  /**
   * 認証結果をJSONで返却する
   *
   * @param boolean $status
   * @param ExampleEntity $entity
   * @param string $message_code
   * @param string $message
   * @return JsonResponse
   */
  public static function singleResult(
    bool $status,
    ExampleEntity $entity,
    string $message_code,
    string $message
  ): JsonResponse {

    $result_data = $entity->getArray();

    // JSONに変換して返却
    return response()->json([
      'status' => $status,
      'result_data' => $result_data,
      'message_code' => $message_code,
      'message' => $message
    ])->header('Access-Control-Allow-Origin', '*');
  }
}