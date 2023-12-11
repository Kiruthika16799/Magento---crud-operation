<?php
namespace Kiruthika\Helloworld\Block;

use Magento\Framework\View\Element\Template;
use Kiruthika\Helloworld\Model\CarFactory;
use Kiruthika\Helloworld\Model\ResourceModel\Car\Collection;

class Hello extends Template
{

    /*
    * @var Collection
    */

    private $collection;

     /**
     *
     * @var CarFactory
     */
    protected $carFactory;

    /**
     * Hello constructor.
     * @param Template\Context $context
     * @param Collection $collection
     * @param CarFactory $carFactory
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Collection $collection,
        CarFactory $carFactory,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->collection = $collection;
        $this->carFactory = $carFactory;
    }

    public function getText(){
        return "Test Helloworld module";
    }

    public function getCarCollection(){
        return $this->collection;
    }

    public function getAddUrl(){
        return $this->getUrl('helloworld/car/add');
    }

    public function getEditData(){
        $data = $this->getRequest()->getParams();
        $id = $data['id'];
        $model = $this->carFactory->create();
        $model->load($id);
        return $model->getData();

    }
}