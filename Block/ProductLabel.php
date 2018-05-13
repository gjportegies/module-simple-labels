<?php
/**
 * Copyright © Rob Aimes - https://aimes.eu
 */

namespace Aimes\SimpleLabels\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\Serialize\Serializer\Json;
use Aimes\SimpleLabels\Scope\Config;
use Magento\Framework\Registry;

/**
 * Class RandomProduct
 * @package Aimes\RandomProduct\Block
 */
class ProductLabel extends Template
{
    /**
     * @var Json
     */
    protected $json;

    /**
     * @var Config
     */
    protected $config;

    /**
     * @var Registry
     */
    protected $registry;

    /**
     * @var \Magento\Catalog\Model\Product
     */
    protected $_product;

    /**
     * ProductLabel constructor.
     * @param Template\Context $context
     * @param Json $json
     * @param Config $config
     * @param Registry $registry
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Json $json,
        Config $config,
        Registry $registry,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->json = $json;
        $this->config = $config;
        $this->registry = $registry;
        $this->_product = $this->registry->registry('current_product');
    }

    /**
     * Check if labels are allowed to display on product pages
     *
     * @return bool
     */
    public function isEnabled()
    {
        return $this->config->isEnabledOnProductPage();
    }

    /**
     * Check if current product has an active special price
     * TODO: Check if within specified time period
     *
     * @return bool
     */
    public function isOnSale()
    {
        return $this->_product->getSpecialPrice() ? true : false;
    }

    /**
     * Check if the current product is set as new
     * TODO: Check if within specified time periodgithub
     *
     * @return bool
     */
    public function isNew()
    {
        return $this->_product->getCustomAttribute('new') ? true : false;
    }

    /**
     * Return array of active labels
     *
     * @return string
     */
    public function getJsConfig()
    {
        $labels = ['labels' => []];

        if ($this->config->isNewEnabledProductPage() && $this->isNew()) {
            array_push($labels['labels'], [
                'id' => $this->config->getNewId(),
                'text' => $this->config->getNewText(),
                'color' => $this->config->getNewColor(),
                'background' => $this->config->getNewBackground(),
                'width' => $this->config->getNewWidth(),
                'height' => $this->config->getNewHeight()
            ]);
        }

        if ($this->config->isSaleEnabledProductPage() && $this->isOnSale()) {
            array_push($labels['labels'], [
                'id' => $this->config->getSaleId(),
                'text' => $this->config->getSaleText(),
                'color' => $this->config->getSaleColor(),
                'background' => $this->config->getSaleBackground(),
                'width' => $this->config->getSaleWidth(),
                'height' => $this->config->getSaleHeight()
            ]);
        }

        return $this->json->serialize($labels);
    }
}
