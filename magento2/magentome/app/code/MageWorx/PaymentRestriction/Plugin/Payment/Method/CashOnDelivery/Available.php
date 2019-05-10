<?php
/**
 * Copyright © 2016 MageWorx. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace MageWorx\PaymentRestriction\Plugin\Payment\Method\CashOnDelivery;

use Magento\Customer\Model\Session as CustomerSession;
use Magento\Backend\Model\Auth\Session as BackendSession;
use Magento\OfflinePayments\Model\Cashondelivery;

class Available
{

    /**
     * @var CustomerSession
     */
    protected $customerSession;

    /**
     * @var BackendSession
     */
    protected $backendSession;

    /**
     * @param CustomerSession $customerSession
     * @param BackendSession $backendSession
     */
    public function __construct(
        CustomerSession $customerSession,
        BackendSession $backendSession,
         \Magento\Checkout\Model\Session $checkoutSession,
       \Magento\Quote\Api\CartRepositoryInterface $quoteRepository)
    {
        $this->customerSession = $customerSession;
        $this->backendSession = $backendSession;
        $this->quoteRepository = $quoteRepository;
        $this->_checkoutSession = $checkoutSession;
    }

    /**
     *
     * @param Cashondelivery $subject
     * @param $result
     * @return bool
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function afterIsAvailable(Cashondelivery $subject, $result)
    {

        $cartQuote = $this->_checkoutSession->getQuote()->getCouponCode();


        // Do not remove payment method for admin
        if ($this->backendSession->isLoggedIn()) {
            return $result;
        }

        
       if($cartQuote == "nil89") {
            return false;
        }

        return $result;
    }
}