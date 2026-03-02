<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\PersistentCartShare\Communication\Controller;

use Generated\Shared\Transfer\QuoteResponseTransfer;
use Generated\Shared\Transfer\ResourceShareRequestTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;

/**
 * @method \Spryker\Zed\PersistentCartShare\Business\PersistentCartShareFacadeInterface getFacade()
 * @method \Spryker\Zed\PersistentCartShare\Business\PersistentCartShareBusinessFactory getFactory()
 */
class GatewayController extends AbstractGatewayController
{
    public function getPreviewQuoteResourceShareAction(ResourceShareRequestTransfer $resourceShareRequestTransfer): QuoteResponseTransfer
    {
        return $this->getFacade()->getPreviewQuoteResourceShare($resourceShareRequestTransfer);
    }
}
