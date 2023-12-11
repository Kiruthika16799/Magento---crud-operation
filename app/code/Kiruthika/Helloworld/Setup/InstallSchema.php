<?php
namespace Kiruthika\Helloworld\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface 
{

    /*
    * @param SchemaSetupInterface $setup
    * @param ModuleContextInterface $context
    * @return void
    */
    public function install (
        SchemaSetupInterface  $setup,
        ModuleContextInterface $context
    )
    {
        $this->createMyTable($setup);
    }

    protected function createMyTable(SchemaSetupInterface $setup) {
        $tableName = $setup->getTable("cars");
        $table = $setup->getConnection()->newTable(
            $tableName
        )->addColumn(
            'id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
            'entity_id'
        )->addColumn(
            'name',
            Table::TYPE_TEXT,
            100,
            ['nullable' => false]
        )->addColumn(
            'description',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false]
        )->addColumn(
            'created_at',
            Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
            'Create date'
        )->addColumn(
            'updated_at',
            Table::TYPE_TIMESTAMP,
            null,
            ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
            'Updated At'
        )->setComment(
            'cars'
        );
        $setup->getConnection()->createTable($table);
    }

}