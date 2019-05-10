<?php
namespace Magnet\Device\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	protected $cart;
    protected $quoteRepository;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
	   \Magento\Checkout\Model\Cart $cart,
	   \Magento\Checkout\Model\Session $checkoutSession,
       \Magento\Quote\Api\CartRepositoryInterface $quoteRepository)
	{
		$this->_pageFactory = $pageFactory;
		$this->cart = $cart;
		$this->quoteRepository = $quoteRepository;
		$this->_checkoutSession = $checkoutSession;
		return parent::__construct($context);
	}

	public function execute()
	{
		$cartQuote = $this->_checkoutSession->getQuote()->getCouponCode();
     
		echo $cartQuote;
		exit;
	}
}


