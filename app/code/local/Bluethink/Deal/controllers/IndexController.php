<?php
class Bluethink_Deal_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	
    	
		$this->loadLayout();     
		$this->renderLayout();
    }


    public function skudataAction()
    {
    	$data=$this->getRequest()->getPost();
    	/*echo"<pre>";
    	print_r($data);
        exit;*/
      $cat=$data['cat'];
      $skk=$data['sk'];
      $sk=$data['sku'];


          if(isset($_FILES['fileToUpload']['name']) && $_FILES['fileToUpload']['name'] != '')
  {
     $fname1 = $_FILES['fileToUpload']['name'];

 
  // $date = date('Y-m-d H:i:s');
  
    try
    {       
        $path = Mage::getBaseDir('media').DS."images".DS;  //desitnation directory     
        $fname =$profileimage; //file name
        $uploader = new Varien_File_Uploader('fileToUpload'); //load class
        $uploader->setAllowedExtensions(array('jpeg','jpg','png')); //Allowed extension for file
        $uploader->setAllowCreateFolders(true); //for creating the directory if not exists
        $uploader->setAllowRenameFiles(true); //if true, uploaded file's name will be changed, if file with the same name already exists directory.
        $uploader->setFilesDispersion(false);
        $uploader->save($path,$fname); //save the file on the specified path
        $profileimage = $uploader->getUploadedFileName();
         
    }
    catch (Exception $e)
    {
        echo 'Error Message: '.$e->getMessage();
    }
    /*$cn = Mage::getSingleton('core/resource')->getConnection('core_write');
                 $que="INSERT INTO deal (fileToUpload) values ('".$fname1."')";
                 $execu=$cn->query($que);*/
  }
    	/*foreach ($data as  $sk)
    	{*/
          
           $con = Mage::getSingleton('core/resource')->getConnection('core_write');
          $query="INSERT INTO deal (sku,fileToUpload,cat,sk) values ('".$sk."','".$fname1."','".$cat."','".$skk."')";
            
            $execute=$con->query($query);

            echo'
            <script type="text/javascript">
              
            window.location="'.Mage::app()->getRequest()->getServer('HTTP_REFERER').';"
            </script>'; 
    	   
        //}
        
         /* for($i=0;$i<count($sk);$i++)
            {*/
              
          
            //} 
    }

    public function deleteAction()
    {
         $id = $this->getRequest()->getParam('id');
    $object = Mage::getModel('deal/deal');
    try{
            $object->setDealId($id)->delete();
            Mage::getSingleton('core/session')->addSuccess('Deleted Successfully.');
            echo'
            <script type="text/javascript">
              
            window.location="'.Mage::app()->getRequest()->getServer('HTTP_REFERER').';"
            </script>'; 

        } 
            catch (Exception $e){
            echo $e->getMessage(); 
        }
    }

   
}