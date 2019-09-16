<?php

namespace Magenest\Rule\Block\Adminhtml\Form\Field;

use Magento\Customer\Model\Customer\Source\Group;
use Magento\Framework\View\Element\Context;
use Magento\Framework\View\Element\Html\Select;

/**
 * Class CustomerGroup
 * @package Magenest\Rule\Block\Adminhtml\Form\Field
 */
class CustomerGroup extends Select
{
    /**
     * @var Group
     */
    protected $customerGroup;

    /**
     * CustomerGroup constructor.
     * @param Context $context
     * @param Group $group
     * @param array $data
     */
    public function __construct(Context $context, Group $group, array $data = [])
    {
        parent::__construct($context, $data);
        $this->customerGroup = $group;
    }

    /**
     * @return string
     */
    protected function _toHtml()
    {
        if (!$this->getOptions()) {
            $this->setOptions($this->customerGroup->toOptionArray());
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