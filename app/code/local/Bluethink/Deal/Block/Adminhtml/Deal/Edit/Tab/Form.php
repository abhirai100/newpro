<?php

class Bluethink_Deal_Block_Adminhtml_Deal_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('deal_form', array('legend'=>Mage::helper('deal')->__('Item information')));
     
      $fieldset->addField('sku', 'text', array(
          'label'     => Mage::helper('deal')->__('Sku'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'sku',
      ));

      $fieldset->addField('start_time', 'text', array(
          'label'     => Mage::helper('deal')->__('Start_Time(In seconds)'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'start_time',
      ));
      $fieldset->addField('end_time', 'text', array(
          'label'     => Mage::helper('deal')->__('End_Time(In seconds)'),
          'class'     => 'required-entry',
          'required'  => true,
          'name'      => 'end_time',
      ));

      $fieldset->addField('banner_name', 'file', array(
          'label'     => Mage::helper('deal')->__('Banner_Name'),
          'required'  => false,
          'name'      => 'banner_name',
	  ));
		
      /*$fieldset->addField('status', 'select', array(
          'label'     => Mage::helper('deal')->__('Status'),
          'name'      => 'status',
          'values'    => array(
              array(
                  'value'     => 1,
                  'label'     => Mage::helper('deal')->__('Enabled'),
              ),

              array(
                  'value'     => 2,
                  'label'     => Mage::helper('deal')->__('Disabled'),
              ),
          ),
      ));
     */
      /*$fieldset->addField('content', 'editor', array(
          'name'      => 'content',
          'label'     => Mage::helper('deal')->__('Content'),
          'title'     => Mage::helper('deal')->__('Content'),
          'style'     => 'width:700px; height:500px;',
          'wysiwyg'   => false,
          'required'  => true,
      ));*/
     
      if ( Mage::getSingleton('adminhtml/session')->getDealData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getDealData());
          Mage::getSingleton('adminhtml/session')->setDealData(null);
      } elseif ( Mage::registry('deal_data') ) {
          $form->setValues(Mage::registry('deal_data')->getData());
      }
      return parent::_prepareForm();
  }
}