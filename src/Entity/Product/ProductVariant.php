<?php

declare(strict_types=1);

namespace App\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @return Collection|TranslationInterface[]
     */
    public function getTranslations(): Collection
    {
        if($this->translations == null){
            $this->translations = new \Doctrine\Common\Collections\ArrayCollection();
        }

        return $this->translations;
    }

    /**
     * {@inheritdoc}
     */
    public function getChannelPricings(): Collection
    {
        if($this->channelPricings == null){
            $this->channelPricings = new \Doctrine\Common\Collections\ArrayCollection();
        }

        return $this->channelPricings;
    }

    /**
     * {@inheritdoc}
     */
    public function getOptionValues(): Collection
    {
        if($this->optionValues == null){
            $this->optionValues = new \Doctrine\Common\Collections\ArrayCollection();
        }

        return $this->optionValues;
    }
}
