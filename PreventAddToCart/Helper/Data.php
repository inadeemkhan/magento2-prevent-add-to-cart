<?php
declare(strict_types=1);

namespace Nadeem\PreventAddToCart\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Http\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\StoreManagerInterface;

class Data extends AbstractHelper
{

    /**
     * @var Context
     */
    private $_httpContext;
    /**
     * @var ScopeConfigInterface
     */
    private $_scopeConfig;
    /**
     * @var StoreManagerInterface
     */
    private $_storeManager;

    /**
     * @param Context $context
     * @param Context $httpContext
     * @param ScopeConfigInterface $scopeConfig
     * @param StoreManagerInterface $storeManager
     */
    public function __construct(
        \Magento\Framework\App\Helper\Context $context,
        Context $httpContext,
        ScopeConfigInterface $scopeConfig,
        StoreManagerInterface $storeManager
    ) {
        parent::__construct($context);
        $this->_httpContext = $httpContext;
        $this->_scopeConfig = $scopeConfig;
        $this->_storeManager = $storeManager;
    }

    /**
     *
     * @return bool
     */
    public function isLoggedIn()
    {
        $isLoggedIn = $this->_httpContext->getValue(
            \Magento\Customer\Model\Context::CONTEXT_AUTH
        );
        return $isLoggedIn;
    }

    /**
     *
     * @return bool
     */
    public function isEnable(){
        return $this->_scopeConfig->getValue(
            "prevent_addtocart/general/is_enable",
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $this->_storeManager->getStore()->getStoreId()
        );
    }

    /**
     *
     * @return string
     */
    public function getErrorMessage(){
        return $this->_scopeConfig->getValue(
            "prevent_addtocart/general/error_message",
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $this->_storeManager->getStore()->getStoreId()
        );
    }

    /**
     *
     * @return string
     */
    public function getRedirectUri(){
        return $this->_scopeConfig->getValue(
            "prevent_addtocart/general/redirect_uri",
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            $this->_storeManager->getStore()->getStoreId()
        );
    }
}
