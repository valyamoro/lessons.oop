<?php
declare(strict_types=1);

namespace App\L_10_02_24\V1;

class ProductFileHandler
{
    public function __construct(private readonly string $filePath)
    {
    }

    public function isExists(): bool
    {
        return \file_exists($this->filePath);
    }

    public function read(): string
    {
        return \file_get_contents($this->filePath);
    }

    public function write(Product $product): ?string
    {
        $data = $product->getId()
            . ', [' . \date('d-m-Y')
            . '] Title: ' . $product->getTitle()
            . ', Price: ' . $product->getPrice()
            . ', Quantity: ' . $product->getQuantity()
            . "\n";

        if ($this->isExists()) {
            $content = $this->read();
            $content .= $data;
        }

        $result = \file_put_contents($this->filePath, $content ?? $data);

        return $result ? $data : null;
    }

    public function remove(): bool
    {
        if ($this->isExists()) {
            \unlink($this->filePath);
            return true;
        }

        return false;
    }
}
