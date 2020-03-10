<?php

declare(strict_types=1);

namespace App\Service\Sylius\ShopApiPlugin\View\Product;

use Sylius\ShopApiPlugin\View\Product\ProductVariantView;


class ProductVariantViewExtended extends ProductVariantView
{
    /** @var PriceView|null */
    public $specialPrice;

    /** @var \DateTimeInterface|null */
    public $startsAt;

    /** @var \DateTimeInterface|null */
    public $endsAt;

}
