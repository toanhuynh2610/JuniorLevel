<?php

namespace Magenest\Rule\Block\Adminhtml\Form\Field;

use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;
use Magento\Framework\DataObject;

/**
 * Class ClockType
 * @package Magenest\Rule\Block\Adminhtml\Form\Field
 */
class ClockType extends AbstractFieldArray
{
    /**
     * @var null
     */
    protected $customerGroups = null;
    /**
     * @var null
     */
    protected $clockType = null;

    /**
     * @return \Magento\Framework\View\Element\BlockInterface|null
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function getCustomerGroup()
    {
        if (!$this->customerGroups) {
            $this->customerGroups = $this->getLayout()->createBlock(
                CustomerGroup::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->customerGroups;
    }

    /**
     * @return \Magento\Framework\View\Element\BlockInterface|null
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function getClockType()
    {
        if (!$this->clockType) {
            $this->clockType = $this->getLayout()->createBlock(
                Type::class,
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }
        return $this->clockType;
    }

    /**
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _prepareToRender()
    {
        $this->addColumn(
            'customer_group',
            [
                'label' => __('Customer Group'),
                'renderer' => $this->getCustomerGroup()
            ]
        );
        $this->addColumn(
            'clock_type',
            [
                'label' => __('Clock Type'),
                'renderer' => $this->getClockType()
            ]
        );
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add Rule');
    }

    /**
     * @param DataObject $row
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function _prepareArrayRow(DataObject $row)
    {
        $customerGroup = $row->getCustomerGroup();
        $options = [];
        if ($customerGroup) {
            $options['option_' . $this->getCustomerGroup()->calcOptionHash($customerGroup)]
                = 'selected="selected"';

            $clockType = $row->getClockType();
            $options['option_' . $this->getClockType()->calcOptionHash($clockType)]
                = 'selected="selected"';
        }
        $row->setData('option_extra_attrs', $options);
    }
}