<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170222020905 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('TRUNCATE TABLE menu_parent');
        $this->addSql('TRUNCATE TABLE menu_child');
        $this->addSql('INSERT INTO `menu_parent` (`name`, `icon`, `route`, `sort_id`) VALUES (\'Home\',\'fa fa-home\', \'cornershort_mlmapp_home_page\' , \'0\')');
        $this->addSql('INSERT INTO `menu_parent` (`name`, `icon`, `route`, `sort_id`) VALUES (\'Add New Member\',\'fa fa-user-plus\', \'cornershort_mlmapp_add_new_member_page\', \'1\')');
        $this->addSql('INSERT INTO `menu_parent` (`name`, `icon`, `route`, `sort_id`) VALUES (\'Request For Upgrade\',\'fa fa-level-up\', \'cornershort_mlmapp_request_for_upgrade_page\', \'2\')');
        $this->addSql('INSERT INTO `menu_parent` (`name`, `icon`, `route`, `sort_id`) VALUES (\'Upgrade Member\',\'fa fa-key\', \'cornershort_mlmapp_upgrade_member_page\', \'3\')');
        $this->addSql('INSERT INTO `menu_parent` (`name`, `icon`, `route`, `sort_id`) VALUES (\'Family Tree\',\'fa fa-users\', \'cornershort_mlmapp_family_tree_page\', \'4\')');
        $this->addSql('INSERT INTO `menu_parent` (`name`, `icon`, `route`, `sort_id`) VALUES (\'User Account\',\'fa fa-user\', \'cornershort_mlmapp_user_account_page\', \'5\')');
        $this->addSql('INSERT INTO `menu_parent` (`name`, `icon`, `route`, `sort_id`) VALUES (\'User Management\',\'fa fa-pencil-square-o\', \'cornershort_mlmapp_user_management_page\', \'6\')');
        $this->addSql('INSERT INTO `menu_parent` (`name`, `icon`, `route`, `sort_id`) VALUES (\'Report\',\'fa fa-line-chart\', \'cornershort_mlmapp_report_page\', \'7\')');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
