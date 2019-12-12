<?php
/**
 * Default no route handler
 *
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magenest\Rule\App\Router;

class NoRouteHandler implements \Magento\Framework\App\Router\NoRouteHandlerInterface
{
    /**
     * Check and process no route request
     *
     * @param \Magento\Framework\App\RequestInterface $request
     * @return bool
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function process(\Magento\Framework\App\RequestInterface $request)
    {
        $requestPathParams = explode('/', trim($request->getPathInfo(), '/'));
        $query = array_shift($requestPathParams);

        $moduleName = 'catalogsearch';
        $actionPath = 'result';
        $actionName = 'index';

        $request->setModuleName($moduleName)->setControllerName($actionPath)->setActionName($actionName);
        $request->setParam('q',$query);

        return true;
    }
}
