<?php
declare(strict_types=1);

namespace App\Models;

/**
 * Example class
 */
class Example extends BaseModel
{

  /**
   * モデルで使用するコネクション名
   *
   * @var string
   */
  protected $connection = null;

  /**
   * 操作テーブル
   *
   * @var string
   */
  protected $table = 'examples';

  /**
   * 日付へキャストする属性
   *
   * @var array
   */
  protected $dates = ['created_at', 'updated_at', 'deleted_at'];

  /**
   * 内部の主キー設定
   *
   * @var string
   */
  public $primaryKey = 'example_id';

  /**
   * 複数代入する属性
   *
   * @var array
   */
  protected $fillable = [];

  /**
   * Article constructor
   *
   * @param array $attributes
   * @param string|null $connection
   */
  public function __construct(array $attributes = [], ?string $connection = null)
  {
    // スーパークラスのコンストラクタの呼び出し
    parent::__construct($attributes);
    // DBのコネクションをセット
    $this->connection = is_null($connection) ? env('DB_CONNECTION') : $connection;
  }

  /**
   * 登録
   *
   * @param array $insert_data
   * @return array
   */
  public function insert(array $insert_data): array
  {
    $model = $this->fill($insert_data);
    $result = $model->save();
    
    return [
      'result' => $result,
      'result_data' => $model
    ];
  }

  /**
   * 更新
   *
   * @param array $insert_data
   * @return array
   */
  public function upsert(array $id, array $insert_data): array
  {
    $model = $this->updateOrCreate($id, $insert_data);
    $result = $model->save();
    
    return [
      'result' => $result,
      'result_data' => $model
    ];
  }
}
