<?php

namespace Magenest\Rule\Block\Adminhtml\Form\Field;

use Magenest\Movie\Model\Config\Source\ClockType;
use Magento\Framework\View\Element\Context;
use Magento\Framework\View\Element\Html\Select;

/**
 * Class Type
 * @package Magenest\Rule\Block\Adminhtml\Form\Field
 */
class Type extends Select
{
    /**
     * @var ClockType
     */
    protected $clockType;

    /**
     * Type constructor.
     * @param Context $context
     * @param ClockType $clockType
     * @param array $data
     */
    public function __construct(Context $context, ClockType $clockType, array $data = [])
    {
        parent::__construct($context, $data);
        $this->clockType = $clockType;
    }

    /**
     * @return string
     */
    protected function _toHtml()
    {
        if (!$this->getOptions()) {
            $this->setOptions($this->clockType->toOptionArray());
        }
        return parent::_toHtml();
    }

    /**
     * @param $value
     * @return mixed
     */
    public function setInputName($value)
    {
        return $this->setName($value);
    }
}