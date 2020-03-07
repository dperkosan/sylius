<?php

declare(strict_types=1);

namespace App\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\ProductVariant as BaseProductVariant;
use Sylius\Component\Product\Model\ProductVariantTranslationInterface;
use Brille24\SyliusSpecialPricePlugin\Traits\ProductVariantSpecialPriceableTrait;
use Brille24\SyliusSpecialPricePlugin\Traits\ProductVariantSpecialPriceableInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="sylius_product_variant")
 */
class ProductVariant extends BaseProductVariant implements ProductVariantSpecialPriceableInterface
{
    use ProductVariantSpecialPriceableTrait;
    
    protected function createTranslation(): ProductVariantTranslationInterface
    {
        return new ProductVariantTranslation();
    }
}
