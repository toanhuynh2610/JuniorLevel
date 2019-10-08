<?php

namespace Magenest\Rule\Block\Adminhtml;

/**
 * Class CollapseGroup
 * @package Magenest\Rule\Block\Adminhtml
 */
class CollapseGroup extends \Magento\Config\Block\System\Config\Form\Fieldset
{
    /**
     * @param \Magento\Framework\Data\Form\Element\AbstractElement $element
     * @return bool
     */
    protected function _isCollapseState($element)
    {
        return $this->isCollapsedDefault;
    }
}