<?php

declare(strict_types=1);

namespace App\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Sylius\Component\Resource\Model\TranslationInterface;
use Sylius\Component\Product\Model\ProductOptionValueInterface;
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
    // TODO bug with generating variants
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

    /**
     * {@inheritdoc}
     */
    public function hasOptionValue(ProductOptionValueInterface $optionValue): bool
    {
        if($this->optionValues == null){
            return false;
        }

        return $this->optionValues->contains($optionValue);
    }

    /**
     * {@inheritdoc}
     */
    public function addOptionValue(ProductOptionValueInterface $optionValue): void
    {
        if (!$this->hasOptionValue($optionValue) && $this->optionValues != null) {
            $this->optionValues->add($optionValue);
        }
    }

    public function getTranslation(?string $locale = null): TranslationInterface
    {
        $locale = $locale ?: $this->currentLocale;
        if (null === $locale) {
            throw new \RuntimeException('No locale has been set and current locale is undefined.');
        }

        if (isset($this->translationsCache[$locale])) {
            return $this->translationsCache[$locale];
        }

        if($this->translations == null){
            $translation = null;
        }else{
            $translation = $this->translations->get($locale);
        }

        if (null !== $translation) {
            $this->translationsCache[$locale] = $translation;

            return $translation;
        }

        if ($locale !== $this->fallbackLocale) {
            if (isset($this->translationsCache[$this->fallbackLocale])) {
                return $this->translationsCache[$this->fallbackLocale];
            }

            $fallbackTranslation = $this->translations->get($this->fallbackLocale);
            if (null !== $fallbackTranslation) {
                $this->translationsCache[$this->fallbackLocale] = $fallbackTranslation;

                return $fallbackTranslation;
            }
        }

        $translation = $this->createTranslation();
        $translation->setLocale($locale);

        $this->addTranslation($translation);

        $this->translationsCache[$locale] = $translation;

        return $translation;
    }

    public function hasTranslation(TranslationInterface $translation): bool
    {
        if($this->translations == null){
            return false;
        }

        return isset($this->translationsCache[$translation->getLocale()]) || $this->translations->containsKey($translation->getLocale());
    }

    public function addTranslation(TranslationInterface $translation): void
    {
        if (!$this->hasTranslation($translation) && $this->translations != null) {
            $this->translationsCache[$translation->getLocale()] = $translation;

            $this->translations->set($translation->getLocale(), $translation);
            $translation->setTranslatable($this);
        }
    }

}
