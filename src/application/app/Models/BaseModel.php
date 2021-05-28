<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * BaseModel class
 */
class BaseModel extends Model
{
  use SoftDeletes;

  /**
   * 新規登録
   *
   * @param array $insert_data
   * @return void
   */
  protected function _insert(array $insert_data)
  {
    return $this->fill($insert_data)->save();
  }
}

