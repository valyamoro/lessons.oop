<?php
declare(strict_types=1);

namespace App\L_10_02_24\V3;

class ProductConverter
{
    public static function convertProduct(array $data): array
    {
        $result = [];

        if ($data['type'] === 'book') {
            $result = [
                'type' => $data['type'],
                (int)$data['id'],
                $data['title'],
                (int)$data['quantity'],
                (int)$data['price'],
                (int)$data['discount'],
                (int)$data['numPage'],
            ];
        } elseif ($data['type'] === 'cd') {
            $result = [
                'type' => $data['type'],
                (int)$data['id'],
                $data['title'],
                (int)$data['quantity'],
                (int)$data['price'],
                (int)$data['discount'],
                (int)$data['length'],
            ];
        }

        return $result;
    }

}
