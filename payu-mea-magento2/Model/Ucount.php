<?php
/**
 * PayU_EasyPlus payment method model
 *
 * @category    PayU
 * @package     PayU_EasyPlus
 * @author      Kenneth Onah
 * @copyright   PayU South Africa (http://payu.co.za)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace PayU\EasyPlus\Model;

use Magento\Framework\Exception\LocalizedException;
use Magento\Payment\Model\InfoInterface;

/**
 * Payment model for payment method Ucount
 *
 * @SuppressWarnings(PHPMD.TooManyFields)
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Ucount extends AbstractPayment
{
    const CODE = 'payumea_ucount';

    /**
     * Payment code
     *
     * @var string
     */
    protected $_code = self::CODE;

    /**
     * Order payment
     *
     * @param InfoInterface| Payment $payment
     * @param float $amount
     * @return $this
     * @throws LocalizedException
     */
    public function order(InfoInterface $payment, $amount)
    {
        $payURedirect = $this->_session->getCheckoutRedirectUrl();
        if (!$payURedirect) {
            return $this->_setupTransaction($payment, $amount);
        }

        $payment->setSkipOrderProcessing(true);

        return $this;
    }
}