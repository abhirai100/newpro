<?php
/**
 * Magestore
 * 
 * NOTICE OF LICENSE
 * 
 * This source file is subject to the Magestore.com license that is
 * available through the world-wide-web at this URL:
 * http://www.magestore.com/license-agreement.html
 * 
 * DISCLAIMER
 * 
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 **/



class Bluethink_Deal_Block_Product_View extends Mage_Core_Block_Template
{
    
    public function _prepareLayout()
    {
         
            $productInfo = $this->getLayout()->getBlock('product.info');
            $productInfo->setTemplate('deal/product/view.phtml');
            
        
        return parent::_prepareLayout();
    }
}
