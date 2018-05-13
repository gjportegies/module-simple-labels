<?php
/**
 * Copyright © Rob Aimes - https://aimes.eu
 */

namespace Aimes\SimpleLabels\Scope;

use Magento\Framework\App\Config\ScopeConfigInterface;


class Config
{
    const GENERAL_ENABLED_PRODUCT_PAGE = 'simple_product_labels/general/show_product_page';
    const GENERAL_ENABLED_CATEGORY_PAGE = 'simple_product_labels/general/show_category_page';

    const NEW_LABEL_ENABLED_PRODUCT_PAGE = 'simple_product_labels/new_label/show_product_page';
    const NEW_LABEL_ENABLED_CATEGORY_PAGE = 'simple_product_labels/new_label/show_category_page';
    const NEW_LABEL_ID = 'simple_product_labels/new_label/id';
    const NEW_LABEL_TEXT = 'simple_product_labels/new_label/text';
    const NEW_LABEL_COLOR = 'simple_product_labels/new_label/color';
    const NEW_LABEL_BACKGROUND = 'simple_product_labels/new_label/background';
    const NEW_LABEL_WIDTH = 'simple_product_labels/new_label/width';
    const NEW_LABEL_HEIGHT = 'simple_product_labels/new_label/height';
    const SALE_LABEL_ENABLED_PRODUCT_PAGE = 'simple_product_labels/sale_label/show_product_page';
    const SALE_LABEL_ENABLED_CATEGORY_PAGE = 'simple_product_labels/sale_label/show_category_page';
    const SALE_LABEL_ID = 'simple_product_labels/sale_label/id';
    const SALE_LABEL_TEXT = 'simple_product_labels/sale_label/text';
    const SALE_LABEL_COLOR = 'simple_product_labels/sale_label/color';
    const SALE_LABEL_BACKGROUND = 'simple_product_labels/sale_label/background';
    const SALE_LABEL_WIDTH = 'simple_product_labels/sale_label/width';
    const SALE_LABEL_HEIGHT = 'simple_product_labels/sale_label/height';

    protected $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    public function isEnabledOnProductPage()
    {
        return $this->scopeConfig->isSetFlag(self::GENERAL_ENABLED_PRODUCT_PAGE);
    }

    public function isEnabledOnCategoryPage()
    {
        return $this->scopeConfig->isSetFlag(self::GENERAL_ENABLED_CATEGORY_PAGE);
    }

    public function isNewEnabledProductPage()
    {
        return $this->scopeConfig->isSetFlag(self::NEW_LABEL_ENABLED_PRODUCT_PAGE);
    }

    public function isNewEnabledCategoryPage()
    {
        return $this->scopeConfig->isSetFlag(self::NEW_LABEL_ENABLED_CATEGORY_PAGE);
    }

    public function getNewId()
    {
        return$this->scopeConfig->getValue(self::NEW_LABEL_ID);
    }

    public function getNewText()
    {
        return$this->scopeConfig->getValue(self::NEW_LABEL_TEXT);
    }

    public function getNewColor()
    {
        return$this->scopeConfig->getValue(self::NEW_LABEL_COLOR);
    }

    public function getNewBackground()
    {
        return$this->scopeConfig->getValue(self::NEW_LABEL_BACKGROUND);
    }

    public function getNewWidth()
    {
        return$this->scopeConfig->getValue(self::NEW_LABEL_WIDTH);
    }

    public function getNewHeight()
    {
        return$this->scopeConfig->getValue(self::NEW_LABEL_HEIGHT);
    }

    public function isSaleEnabledProductPage()
    {
        return $this->scopeConfig->isSetFlag(self::SALE_LABEL_ENABLED_PRODUCT_PAGE);
    }

    public function isSaleEnabledCategoryPage()
    {
        return $this->scopeConfig->isSetFlag(self::SALE_LABEL_ENABLED_CATEGORY_PAGE);
    }

    public function getSaleId()
    {
        return$this->scopeConfig->getValue(self::SALE_LABEL_ID);
    }

    public function getSaleText()
    {
        return$this->scopeConfig->getValue(self::SALE_LABEL_TEXT);
    }

    public function getSaleColor()
    {
        return$this->scopeConfig->getValue(self::SALE_LABEL_COLOR);
    }

    public function getSaleBackground()
    {
        return$this->scopeConfig->getValue(self::SALE_LABEL_BACKGROUND);
    }

    public function getSaleWidth()
    {
        return$this->scopeConfig->getValue(self::SALE_LABEL_WIDTH);
    }

    public function getSaleHeight()
    {
        return$this->scopeConfig->getValue(self::SALE_LABEL_HEIGHT);
    }
}