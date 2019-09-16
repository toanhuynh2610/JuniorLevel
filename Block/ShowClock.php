<?php


namespace Magenest\Rule\Block;

use Magento\Framework\View\Element\Template;

/**
 * Class ShowClock
 * @package Magenest\Rule\Block
 */
class ShowClock extends Template
{
    /**
     * @var \Magento\Framework\App\Config\ScopeConfigInterface
     */
    protected $scopeConfig;
    protected $cacheTypeList;

    /**
     * ShowClock constructor.
     * @param Template\Context $context
     * @param array $data
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     */
    public function __construct(Template\Context $context,
                                \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig,
                                \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList,
                                array $data = [])
    {
        parent::__construct($context, $data);
        $this->scopeConfig = $scopeConfig;
        $this->cacheTypeList = $cacheTypeList;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->scopeConfig->getValue('clock_config/general/title_clock');
    }

    /**
     * @return mixed
     */
    public function getTitleColor()
    {
        return $this->scopeConfig->getValue('clock_config/general/text_clock');
    }

    /**
     * @return mixed
     */
    public function getClockColor()
    {
        return $this->scopeConfig->getValue('clock_config/general/color_clock');
    }

    public function clearCache(){
        $this->cacheTypeList->cleanType(\Magento\Framework\App\Cache\Type\Block::TYPE_IDENTIFIER);
    }
}