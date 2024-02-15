<?php
declare(strict_types=1);

namespace App\L_10_02_24\V4;

class ProductConverter
{
    public const FILED_NAMES = [
        'id',
        'type',
        'title',
        'quantity',
        'price',
        'discount',
    ];

    public const FILED_NAME_NUM_PAGES = 'num_page';
    public const FILED_NAME_NUM_LENGTH = 'length';
    private const TYPE_BOOK = 'book';
    private const TYPE_CD = 'cd';

    public function toArray(array $data): array
    {
        $result = [];

        foreach ($data as $product) {
            $result[] = $this->make($product);
        }

        return $result;
    }

    public function make(array $item): array
    {
        $result = [];

        if ($item['type'] === self::TYPE_BOOK) {
            $fieldKeys = $this->getFullFields([self::FILED_NAME_NUM_PAGES]);
            $result = [
                'id' => (int)$item[$fieldKeys[0]],
                'type' => $item[$fieldKeys[1]],
                'title' => $item[$fieldKeys[2]],
                'quantity' => (int)$item[$fieldKeys[3]],
                'price' => (int)$item[$fieldKeys[4]],
                'discount' => (int)$item[$fieldKeys[5]],
                'num_page' => (int)$item[$fieldKeys[6]],
            ];
        } elseif ($item['type'] === self::TYPE_CD) {
            $fieldKeys = $this->getFullFields([self::FILED_NAME_NUM_LENGTH]);

            $result = [
                'id' => (int)$item[$fieldKeys[0]],
                'type' => $item[$fieldKeys[1]],
                'title' => $item[$fieldKeys[2]],
                'quantity' => (int)$item[$fieldKeys[3]],
                'price' => (int)$item[$fieldKeys[4]],
                'discount' => (int)$item[$fieldKeys[5]],
                'length' => (int)$item[$fieldKeys[6]],
            ];
        }

        return $result;
    }

    private function getFullFields(array $fields): array
    {
        return \array_merge(self::FILED_NAMES, $fields);
    }

}
