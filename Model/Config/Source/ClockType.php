<?php
/**
 * Created by PhpStorm.
 * User: toan
 * Date: 29/03/2019
 * Time: 13:26
 */

namespace Magenest\Rule\Model\Config\Source;
class ClockType implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [

            [
                'value' => '1',
                'label' => __('Type1')
            ],
            [
                'value' => '2',
                'label' => __('Type2')
            ],
        ];
    }
}