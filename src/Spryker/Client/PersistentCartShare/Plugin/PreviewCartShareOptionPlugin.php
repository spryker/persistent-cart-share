<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\PersistentCartShare\Plugin;

use Spryker\Client\Kernel\AbstractPlugin;
use Spryker\Client\PersistentCartShareExtension\Dependency\Plugin\CartShareOptionPluginInterface;

class PreviewCartShareOptionPlugin extends AbstractPlugin implements CartShareOptionPluginInterface
{
    protected const KEY_PREVIEW = 'PREVIEW';
    protected const GROUP_EXTERNAL = 'external';

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @return string
     */
    public function getKey(): string
    {
        return static::KEY_PREVIEW;
    }

    /**
     * @inheritDoc
     *
     * @api
     *
     * @return string
     */
    public function getShareOptionGroup(): string
    {
        return static::GROUP_EXTERNAL;
    }
}
