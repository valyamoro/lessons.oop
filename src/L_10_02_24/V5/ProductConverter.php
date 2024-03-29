<?php
declare(strict_types=1);

namespace App\L_10_02_24\V5;


namespace App\L_10_02_24\V5;

use App\L_10_02_24\V5\PRODUCT_TYPE;

class ProductConverter
{
    private ProductFactory $factory;
    public function __construct(ProductFactory $factory) {
        $this->factory = $factory;
    }

    public function toArray(array $data): array
    {
        $result = [];

        foreach ($data as $product) {
            $product = $this->make($product);
            $type = $product['type'];
            $result[] = $this->factory->factory($this->castToType(\array_diff_key($product, ['type' => 0])), $type);
        }

        return $result;
    }

    public function make(array $item): array
    {
        $values = [];

        if ($item['type'] === PRODUCT_TYPE::TYPE_BOOK) {
            $values = \array_values(\array_diff(\array_keys($item), ['length', 'lampa']));
            $item = \array_diff_key($item, ['length' => 0]);
        } elseif ($item['type'] === PRODUCT_TYPE::TYPE_CD) {
            $values = \array_values(\array_diff(\array_keys($item), ['num_pages', 'lampa']));
            $item = \array_diff_key($item, ['num_pages' => 0]);
        } elseif ($item['type'] === PRODUCT_TYPE::TYPE_LAMPA) {
            $values = $this->arrayDiff($item, ['num_pages', 'length']);
            $item = \array_diff_key($item, ['num_pages' => 0, 'length' => 0]);
        }

        return \array_combine($values, \array_values($item));
    }

    private function arrayDiff(array $item, array $array): array
    {
        return \array_values(\array_diff(\array_keys($item), $array));
    }

    private function castToType(array $array): array
    {
        $fields = [
            'id' => 'int',
            'type' => 'string',
            'quantity' => 'int',
            'price' => 'float',
            'discount' => 'int',
            'num_pages' => 'int',
            'length' => 'int',
        ];

        $result = [];

        foreach ($array as $key => $value) {
            $result[$key] = match($key) {
                'id', 'price', 'quantity', 'discount', 'num_pages', 'length' => (int)$value,
                'title' => $value,
            };
        }

        return $result;
    }

}
