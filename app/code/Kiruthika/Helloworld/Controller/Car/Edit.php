<?php
namespace Kiruthika\Helloworld\Controller\Car;

use Kiruthika\Helloworld\Model\CarFactory;

class Edit extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

     /**
     *
     * @var CarFactory
     */
    protected $carFactory;
    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param CarFactory $carFactory
     */
    public function __construct(
       \Magento\Framework\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory,
       CarFactory $carFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->carFactory = $carFactory;
        return parent::__construct($context);
    }
    /**
     * View page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        return $this->_pageFactory->create();
    }
}
