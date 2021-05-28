<?php

declare(strict_types=1);

namespace App\Entities;

/**
 * 取得
 */
class ExampleEntity
{
    /**
     * example_data
     *
     * @var string
     */
    private $example_data = null;
    

    /**
     * exampleを取得する
     *
     * @return string|null
     */
    public function getExampleData(): ?string
    {
        return $this->example_data;
    }

    /**
     * exampleを設定する
     *
     * @param $example_data
     */
    public function setExampleData(string $example_data): void
    {
        $this->example_data = $example_data;
    }

    /**
     * 配列から設定する
     *
     * @param object $data
     * @return void
     */
    public function setEntity(object $data): void
    {
        $this->example_data = isset($data->example_data) ? $data->example_data : null;
    }

    /**
     * 配列から取得する
     *
     * @return array
     */
    public function getArray(): array
    {
        return [
            'example_data' => $this->example_data
        ];
    }
}

