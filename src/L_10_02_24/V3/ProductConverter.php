<?php
declare(strict_types=1);

namespace App\L_10_02_24\V3;

class ProductConverter
{
    public static function convertProduct(array $data): array
    {
        $result = [];
        $count = \count($data);

        if ($data['type'] === 'book') {
            $keys = [
                'type',
                'id',
                'title',
                'quantity',
                'price',
                'discount',
                'numPage',
            ];

            if (!static::checkExistenceOfTheKey($keys, $data, $count)) {
                throw new \Exception('Такого ключа не существует!');
            }

            $result = [
                'type' => $data[$keys[0]],
                'id' => (int)$data[$keys[1]],
                'title' => $data[$keys[2]],
                'quantity' => (int)$data[$keys[3]],
                'price' => (int)$data[$keys[4]],
                'discount' => (int)$data[$keys[5]],
                'numPage' => (int)$data[$keys[6]],
            ];
        } elseif ($data['type'] === 'cd') {
            $keys = [
                'type',
                'id',
                'title',
                'quantity',
                'price',
                'discount',
                'length',
            ];

            if (!static::checkExistenceOfTheKey($keys, $data, $count)) {
                throw new \Exception('Такого ключа не существует!');
            }

            $result = [
                'type' => $data[$keys[0]],
                'id' => (int)$data[$keys[1]],
                'title' => $data[$keys[2]],
                'quantity' => (int)$data[$keys[3]],
                'price' => (int)$data[$keys[4]],
                'discount' => (int)$data[$keys[5]],
                'length' => (int)$data[$keys[6]],
            ];
        }

        return $result;
    }

    public static function convertProducts(array $data): array
    {
        $result = [];

        foreach ($data as $product) {
            $result[] = self::convertProduct($product);
        }

        return $result;
    }

    private static function checkExistenceOfTheKey(array $keys, array $data, int $count): bool
    {
        for ($i = 0; $i < $count; $i++) {
            if (!\array_key_exists($keys[$i], $data)) {
                return false;
            }
        }

        return true;
    }

}
