<?php

namespace TrainingHitakshi\LoginRestriction\Controller\Adminhtml\Login;

use TrainingHitakshi\LoginRestriction\Model\Ip as Ip;

class Delete extends \Magento\Backend\App\Action
{
    /**
     * Authorization level of a basic admin session
     *
     * @see _isAllowed()
     */
    const ADMIN_RESOURCE = 'TrainingHitakshi_LoginRestriction::ip';

    /**
     * Delete action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('ip_id'); 

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\TrainingHitakshi\LoginRestriction\Model\Ip::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccess(__('IP address has been deleted.'));
                // go to grid
                
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                
                // display error message
                $this->messageManager->addError($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['st_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addError(__('We can\'t find entity to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    
    }
    
}