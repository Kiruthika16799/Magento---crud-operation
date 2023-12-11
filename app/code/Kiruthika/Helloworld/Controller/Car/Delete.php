<?php
namespace Kiruthika\Helloworld\Controller\Car;

use Kiruthika\Helloworld\Model\CarFactory;
class Delete extends \Magento\Framework\App\Action\Action
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
        $data = $this->getRequest()->getParams();
        try {
            $carModel = $this->carFactory->create();
            $carModel->load($data['id']);
            $carModel->delete();
            $this->messageManager->addSuccessMessage("Record Deleted successfully...");
        } catch(\Exception $exception){
            $this->messageManager->addErrorMessage("Error...");
        }
        $redirect = $this->resultRedirectFactory->create();
        $redirect->setPath('helloworld');
        return $redirect;
    }
}
