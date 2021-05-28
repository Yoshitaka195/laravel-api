<?php
declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Redis;

/**
 * BaseService class
 */
class BaseService
{
  /**
   * リクエストパラメータ
   *
   * @var array
   */
  protected $request_params = [];

  /**
   * リクエストパラメータをセットし直す
   *
   * @param array $request_params リクエストパラメータ
   * @param array $keys 必要とするパラメータのキー
   * @return void
   */
  protected function _setRequestParameter(array $request_params, array $keys): void
  {
    foreach ($keys as $key) {
      // offsetの場合は取得開始行数を生成する
      if ($key === 'offset') {
        $this->request_params[$key] = $this->getOffset(
          (int)$request_params['limit'],
          isset($request_params['per_page']) ? (int)$request_params['per_page'] : null
        );

        continue;
      }

      // キーに値をセットしなおす（空文字などをNULLに置き換え）
      $this->request_params[$key] = isset($request_params[$key]) ? $request_params[$key] : null;
    }
  }

  /**
   * offsetを生成する
   *
   * @param integer $limit
   * @param integer|null $per_page
   * @return integer
   */
    protected function getOffset(int $limit, ?int $per_page): int
    {
        return ($per_page) ? (($per_page) -1) * $limit : 0;
  }

  /**
   * Sentryに例外を通知する
   *
   * @param [type] $e
   * @return void
   */
  protected function pushReportToSentry($e): void
  {
    // エラーログの出力
    info($e);

    if (env('APP_ENV') !== 'local' && env('APP_ENV') !== 'test') {
      // 例外をSentryに通知
      app('sentry')->captureException($e);
    }
  }

  /**
   * ストアチェック
   *
   * @param integer $user_id
   * @return boolean
   */
    protected function isStoreByUserId(int $user_id): bool
    {
        return User::join('user_group_details', 'users.user_id','user_group_details.user_id')
            ->where('users.user_id', $user_id)
      ->whereNotNull('user_group_details.store_id')
      ->whereNull('user_group_details.deleted_at')
            ->exists();
    }
}

