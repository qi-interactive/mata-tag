<?php
 
/**
 * @link http://www.matacms.com/
 * @copyright Copyright (c) 2015 Qi Interactive Limited
 * @license http://www.matacms.com/license/
 */

use yii\db\Schema;
use yii\db\Migration;

class m150311_153039_init extends Migration {

	public function safeUp() {
		$this->createTable('{{%mata_tag}}', [
			'Id'                   => Schema::TYPE_PK,
			'Name'             => Schema::TYPE_TEXT . ' NOT NULL',
			'URI'	=> Schema::TYPE_STRING . '(255) NOT NULL'
			]);

		$this->createTable('{{%mata_tagitem}}', [
			'TagId'      => Schema::TYPE_INTEGER . ' NOT NULL',
			'DocumentId'   => Schema::TYPE_STRING . '(64) NOT NULL',
			'Order' =>  Schema::TYPE_INTEGER . ' NOT NULL'
			]);

		$this->addForeignKey('fk_matatagitem', '{{%mata_tagitem}}', 'TagId', '{{%mata_tag}}', 'Id', 'CASCADE', 'RESTRICT');

	}

	public function safeDown() {
		$this->dropTable('{{%mata_tagitem}}');
		$this->dropTable('{{%mata_tag}}');
	}
	
}