<?php

/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
$installer->startSetup();

/* @var $table Varien_Db_Ddl_Table */
$table =
$installer->getConnection()->newTable($installer->getTable('magentostudy_news/item'))    ->addColumn('item_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
		'unsigned' => true,
		'identity' => true,
		'nullable' => false,
		'primary'  => true
	), 'News article id')
	->addColumn('title', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
		'nullable' => true
	), 'Article title')
	->addColumn('author', Varien_Db_Ddl_Table::TYPE_TEXT, 63, array(
		'nullable' => true,
		'default'  => null,
	), 'The author name')
	->addColumn('content', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
		'nullable' => true,
		'default'  => null
	), 'Article content')
	->addColumn('image', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(
		'nullable' => true,
		'default'  => null
	), 'Article image')
	->addColumn('time_published', Varien_Db_Ddl_Table::TYPE_DATE, null, array(
		'nullable' => true,
		'default'  => null
	), 'Date of article creation')
	->addColumn('time_created', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(
		'nullable' => true,
		'default'  => null
	), 'Time of article creation')
	->addIndex($installer->getIdxName($installer->getTable('magentostudy_news/item'),
array('time_published'),
			Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX),
			array('time_published'),
			array('type' => Varien_Db_Adapter_Interface::INDEX_TYPE_INDEX)
		)
		->setComment('News articles');

$installer->getConnection()->createTable($table);
$installer->endSetup();

//die ('Trying to Upgrade');
