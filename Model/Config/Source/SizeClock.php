<?php

namespace Magenest\Rule\Model\Config\Source;
/**
 * Class SizeClock
 * @package Magenest\Rule\Model\Config\Source
 */
class SizeClock implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        return [

            [
                'value' => '1',
                'label' => __('Small')
            ],
            [
                'value' => '2',
                'label' => __('Big')
            ],
        ];
    }
}