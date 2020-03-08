<?php

declare(strict_types=1);

namespace App\Service\Sylius\ShopApiPlugin\Factory\Product;

use Sylius\Component\Core\Model\ChannelInterface;
use Sylius\Component\Core\Model\ProductVariantInterface;
use Sylius\ShopApiPlugin\Exception\ViewCreationException;
use Sylius\ShopApiPlugin\View\Product\ProductVariantView;
use Sylius\ShopApiPlugin\Factory\PriceViewFactoryInterface;
use Sylius\ShopApiPlugin\Factory\Product\ProductVariantViewFactoryInterface;

final class ProductVariantViewFactorySpecialPrice implements ProductVariantViewFactoryInterface
{
    /** @var ProductVariantViewFactoryInterface */
    private $productVariantViewFactory;

    /** @var PriceViewFactoryInterface */
    private $priceViewFactory;

    public function __construct(ProductVariantViewFactoryInterface $productVariantViewFactory, PriceViewFactoryInterface $priceViewFactory)
    {
        $this->productVariantViewFactory = $productVariantViewFactory;
        $this->priceViewFactory = $priceViewFactory;
    }

    /** {@inheritdoc} */
    public function create(ProductVariantInterface $variant, ChannelInterface $channel, string $locale): ProductVariantView
    {
        $variantView = $this->productVariantViewFactory->create($variant, $channel, $locale);
        
        $channelSpecialPricing = $variant->getChannelSpecialPricingsForChannel($channel);
        if (null === $channelSpecialPricing) {
            throw new ViewCreationException('Variant does not have pricing.');
        }

        if(!$channelSpecialPricing->isEmpty()){
            $specialPrice = $channelSpecialPricing->first()->getPrice();
            $startsAt = $channelSpecialPricing->first()->getStartsAt();
            $endsAt = $channelSpecialPricing->first()->getEndsAt();
        }
        
        // if (null !== $specialPrice) {
        //     $variantView->specialPrice = $this->priceViewFactory->create(
        //         $specialPrice,
        //         $channel->getBaseCurrency()->getCode()
        //     );
        // }

        return $variantView;
    }
}
