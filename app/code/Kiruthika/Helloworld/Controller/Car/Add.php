<?php
namespace Kiruthika\Helloworld\Controller\Car;

use Kiruthika\Helloworld\Model\Car as Model;
use Kiruthika\Helloworld\Model\CarFactory as ModelFactory;
use Kiruthika\Helloworld\Model\ResourceModel\Car as ResourceModel;
class Add extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @var Model
     */
    protected $model;

    /**
     * @var ResourceModel
     */
    protected $resourceModel;

    protected $modelFactory;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
       \Magento\Framework\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory,
       Model $model,
       ModelFactory $modelFactory,
       ResourceModel $resourceModel
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->model = $model;
        $this->resourceModel = $resourceModel;
        $this->modelFactory = $modelFactory;
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
        // set the data in car model
        if(isset($data['id']) && $data['id']){
            try{
                $id = $data['id'];
                $carModelFactroy = $this->modelFactory->create();
                $carModelFactroy->load($id);
                $carModelFactroy->setData($data);
                $carModelFactroy->save();
                $this->messageManager->addSuccessMessage("Updated successfully");
            } catch (\Exception $exception){
            $this->messageManager->addErrorMessage("Error updating data.");
            }
        } else{
            $carModel = $this->model;
            try{
                // set the data in model
                $carModel->setData($data);
                 // save the data to resource model
                $this->resourceModel->save($carModel);
                $this->messageManager->addSuccessMessage("Car added successfully");
            } catch (\Exception $exception){
                $this->messageManager->addErrorMessage("Error saving data.");
            }
        }
       
        $redirect = $this->resultRedirectFactory->create();
        $redirect->setPath('helloworld');
        return $redirect;
        // return $this->_pageFactory->create();
    }
}
