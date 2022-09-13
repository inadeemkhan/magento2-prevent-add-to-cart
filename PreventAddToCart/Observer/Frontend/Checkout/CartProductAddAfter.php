<?php
declare(strict_types=1);

namespace Nadeem\PreventAddToCart\Observer\Frontend\Checkout;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Controller\ResultFactory;
use Nadeem\PreventAddToCart\Helper\Data;
use Magento\Framework\Message\ManagerInterface;

class CartProductAddAfter implements ObserverInterface  
{
    /**
     * @var Data
     */
    protected $_helper;
    /**
     * @var ManagerInterface;
     */
    protected $_messageManager;
    
    /**
     * @param Data
     * @param ManagerInterface
     */
    public function __construct(
        Data $helper,
        ManagerInterface $messageManager
    ) {
        $this->_helper = $helper;
        $this->_messageManager = $messageManager;
    }
 
    /**
     * customer register event handler
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        try{
            $cancelCartStatus = $this->_helper->isEnable();
            $cancelCartTmp = true;
            if($cancelCartStatus && !$this->_helper->isLoggedIn()){
                $cancelCartTmp = false;
            }
            if(!$cancelCartTmp){
                $wording = $this->_helper->getErrorMessage();
                $redirect = $this->_helper->getRedirectUri();
                $this->_messageManager->addErrorMessage($wording);
                $isAjax = $this->isAjax();
                if($isAjax){
                    $result['backUrl'] = $redirect;
                    echo json_encode($result);
                    exit;
                }else{
                    echo '<script>window.location.href = "'.$redirect.'";</script>';
                    exit;
                }
            }
        }catch(Exception $e){
            throw new LocalizedException(__('Could not add Product into Cart.'));
        }
    }

    /**
     *
     * @return bool
     */
    public function isAjax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
    }
}