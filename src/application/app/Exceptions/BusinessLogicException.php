<?php
declare(strict_types=1);

namespace App\Exceptions;

use Throwable;
use Illuminate\Support\Facades\Log;

/**
 * 業務ロジック例外
 * BusinessLogicException class.
 */
class BusinessLogicException extends \Exception
{
  /**
   * BusinessLogicException constructor.
   *
   * @param string $message
   * @param integer $code
   * @param Throwable $previous
   */
  public function __construct(string $message="", int $code=0, Throwable $previous=null)
  {
    parent::__construct($message, $code, $previous);
    Log::error(__CLASS__ . ': ' . $message);
  }
}
