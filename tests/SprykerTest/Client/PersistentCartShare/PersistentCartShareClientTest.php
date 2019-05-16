<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Client\PersistentCartShare;

use Codeception\Test\Unit;
use Generated\Shared\Transfer\CustomerTransfer;
use Spryker\Client\PersistentCartShare\Dependency\Client\PersistentCartShareToCustomerClientInterface;
use Spryker\Client\PersistentCartShare\PersistentCartShareDependencyProvider;
use Spryker\Client\PersistentCartShareExtension\Dependency\Plugin\CartShareOptionPluginInterface;

/**
 * Auto-generated group annotations
 * @group SprykerTest
 * @group Client
 * @group PersistentCartShare
 * @group PersistentCartShareClientTest
 * Add your own group annotations below this line
 */
class PersistentCartShareClientTest extends Unit
{
    protected const VALUE_SHARE_OPTION_GROUP = 'VALUE_SHARE_OPTION_GROUP';
    protected const VALUE_KEY = 'VALUE_KEY';
    protected const VALUE_IS_ALLOWED_FOR_CUSTOMER = true;

    /**
     * @var \SprykerTest\Client\PersistentCartShare\PersistentCartShareClientTester
     */
    protected $tester;

    /**
     * @return void
     */
    public function testGetCartShareOptionsShouldReturnCorrectStructure(): void
    {
        // Arrange
        $this->tester->setDependency(
            PersistentCartShareDependencyProvider::PLUGINS_CART_SHARE_OPTION,
            [
                $this->createShareOptionPluginMock(),
            ]
        );
        $this->tester->setDependency(
            PersistentCartShareDependencyProvider::CLIENT_CUSTOMER,
            $this->createCustomerClientMock()
        );

        // Act
        $cartShareOptions = $this->tester->getPersistentCartShareClient()->getCartShareOptions();

        // Assert
        $this->assertArrayHasKey(static::VALUE_SHARE_OPTION_GROUP, $cartShareOptions);
        $this->assertContains(static::VALUE_KEY, $cartShareOptions[static::VALUE_SHARE_OPTION_GROUP]);
    }

    /**
     * @return \Spryker\Client\PersistentCartShareExtension\Dependency\Plugin\CartShareOptionPluginInterface|\PHPUnit\Framework\MockObject\MockObject $cartShareOptionPluginMock
     */
    protected function createShareOptionPluginMock()
    {
        $cartShareOptionPluginMock = $this->getMockBuilder(CartShareOptionPluginInterface::class)
            ->setMethods(['getKey', 'getShareOptionGroup', 'isAllowedForCustomer'])
            ->getMock();

        $cartShareOptionPluginMock
            ->method('getKey')
            ->willReturn(static::VALUE_KEY);

        $cartShareOptionPluginMock
            ->method('getShareOptionGroup')
            ->willReturn(static::VALUE_SHARE_OPTION_GROUP);

        $cartShareOptionPluginMock
            ->method('isAllowedForCustomer')
            ->willReturn(static::VALUE_IS_ALLOWED_FOR_CUSTOMER);

        return $cartShareOptionPluginMock;
    }

    /**
     * @return \Spryker\Client\PersistentCartShare\Dependency\Client\PersistentCartShareToCustomerClientInterface|\PHPUnit\Framework\MockObject\MockObject
     */
    protected function createCustomerClientMock()
    {
        $customerTransfer = new CustomerTransfer();

        $customerClientMock = $this->getMockBuilder(PersistentCartShareToCustomerClientInterface::class)->getMock();
        $customerClientMock->method('getCustomer')->willReturn($customerTransfer);

        return $customerClientMock;
    }
}
