<?php

namespace Magenest\Rule\Ui\DataProvider\Product\Form\Modifier;

use Magento\Catalog\Ui\DataProvider\Product\Form\Modifier\AbstractModifier;
use Magento\Ui\Component\Form\Fieldset;
use Magento\Ui\Component\Form\Field;
use Magento\Ui\Component\Form\Element\Select;
use Magento\Ui\Component\Form\Element\DataType\Text;

class CustomProductFields extends AbstractModifier
{
    public function modifyMeta(array $meta)
    {
        $meta = array_replace_recursive(
            $meta,
            [
//                'product-details' => [
//                    'arguments' => [
//                        'data' => [
//                            'config' => [
//                                'sortOrder' => 6,
//                                'label' => __('Product Details'),
//                                'componentType' => Fieldset::NAME,
//                            ],
//                        ],
//                    ]
//                ],
                //fieldset name
                'customproductfield' => [
                    'arguments' => [
                        'data' => [
                            'config' => [
                                'label' => __('Magenest Custom Fields'),
                                'collapsible' => true,
                                'componentType' => Fieldset::NAME,
                                'dataScope' => 'data.magenest',
                                'sortOrder' => 1
                            ],
                        ],
                    ],
                    'children' => $this->getFields()
                ]
            ]
        );

        return $meta;
    }

    public function modifyData(array $data)
    {
        return $data;
    }
    protected function getFields()
    {
        return [
            'clock_type'    => [
                'arguments' => [
                    'data' => [
                        'options'  => [
                            ['value' => '0', 'label' => __('44mm')],
                            ['value' => '1', 'label' => __('40mm')]
                        ],
                        'config' => [
                            'label'         => __('Clock Type'),
                            'componentType' => Field::NAME,
                            'formElement'   => Select::NAME,
                            'dataScope'     => 'clock_type',
                            'dataType'      => Text::NAME,
                            'sortOrder'     => 100,
                            'default'       => 0
                        ],
                    ],
                ],
            ]
        ];
    }
}