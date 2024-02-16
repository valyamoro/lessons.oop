<?php
declare(strict_types=1);

namespace App\L_10_02_24\V4;

use App\L_10_02_24\V5\ProductFactory;
use PHPUnit\Framework\TestCase;

class ProductConverterTest extends TestCase
{
    public function testGetFieldsWithNumPages(): void
    {
//        $item = [
//            'id' => '3',
//            'type' => 'book',
//            'title' => 'Product title 3',
//            'quantity' => '1',
//            'price' => '2000',
//            'discount' => '0',
//            'length' => '34',
//            'num_pages' => '33'
//        ];

        $factory = new ProductFactory();
        $converter = new \App\L_10_02_24\V5\ProductConverter($factory);

//        $expected = [
//            'id' => '3',
//            'type' => 'book',
//            'title' => 'Product title 3',
//            'quantity' => '1',
//            'price' => '2000',
//            'discount' => '0',
//            'length' => '34',
//        ];
//        $expected = [
//            'id' => '3',
//            'type' => 'book',
//            'title' => 'Product title 3',
//            'quantity' => '1',
//            'price' => '2000',
//            'discount' => '0',
//            'num_pages' => '33'
//        ];
        $item = [
            'id' => '4',
            'type' => 'lampa',
            'title' => 'Product title 3',
            'quantity' => '1',
            'price' => '2000',
            'discount' => '0',
            'num_pages' => '33',
            'vate' => '3',
        ];

        $expected = [
            'id' => '4',
            'type' => 'lampa',
            'title' => 'Product title 3',
            'quantity' => '1',
            'price' => '2000',
            'discount' => '0',
            'vate' => '3'
        ];

        $result = $converter->make($item);
        $this->assertSame($expected, $result);
    }

    public function testCanCreateProductConverterToProduct(): void
    {
        $converter = new ProductConverter();

        $expected = [
            'id' => 1,
            'type' => 'book',
            'title' => 'Product title 1',
            'quantity' => 1,
            'price' => 500,
            'discount' => 0,
            'num_page' => 450,
        ];

        $result = $converter->make($expected);
        $this->assertSame($expected, $result);
    }

    public function testCanConverterProductToArrayWithFields(): void
    {
        $data = [
            [
                'id' => 1,
                'type' => 'book',
                'title' => 'Product title 1',
                'quantity' => 1,
                'price' => 500,
                'discount' => 0,
                'num_page' => 450,
            ],
            [
                'id' => '2',
                'type' => 'cd',
                'title' => 'Product title 2',
                'quantity' => '1',
                'price' => '1500',
                'discount' => '0',
                'length' => '1',
            ],
            [
                'id' => '3',
                'type' => 'book',
                'title' => 'Product title 3',
                'quantity' => '1',
                'price' => '2000',
                'discount' => '0',
                'num_page' => ''
            ],
        ];

        $converter = new ProductConverter();

        $result = $converter->toArray($data);

        $this->assertCount(3, $result);

    }

}
