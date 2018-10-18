

<?php
$installer = $this;
$installer->startSetup();
 
$identifier="bluethink_deal";
$title="bluethink_deal";
$content="<div id=\"storybloks-cms-block\">This is the bluethink CMS block</div>";
 
$sql = "SELECT `block_id` FROM {$this->getTable('cms_block')} WHERE `identifier`='".$identifier."'";
 
if (!$installer->getConnection()->fetchOne($sql)) {
 
    $installer->run("INSERT INTO {$installer->getTable('cms_block')}
    (`identifier`,`title`,`content`,`creation_time`,`update_time`,`is_active`)
    VALUES ('".$identifier."','".$title."','".$content."',NOW(),NOW(),1);");
 
    $block_id = $installer->getConnection()->fetchOne("SELECT `block_id`
    FROM {$this->getTable('cms_block')} WHERE `identifier`='".$identifier."'");
 
    $installer->run("INSERT INTO {$installer->getTable('cms_block_store')}(block_id,store_id)
    VALUES (".$block_id.",".Mage_Core_Model_App::ADMIN_STORE_ID.");");
 
} else {
    $installer->run("UPDATE `{$installer->getTable('cms_block')}` SET
    `title`='".$title."',`content`='".$content."' WHERE `identifier`='".$identifier."';");
}




?>