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
        $this->addSql('INSERT INTO `menu_parent` (`name`, `icon`, `route`, `sort_id`) VALUES (\'Home\',\'fa fa-home\', \'cornershort_mlmapp_homepage\' , \'0\')');
        $this->addSql('INSERT INTO `menu_parent` (`name`, `icon`, `route`, `sort_id`) VALUES (\'Register Member\',\'fa fa-user-plus\', \'\', \'1\')');
        $this->addSql('INSERT INTO `menu_parent` (`name`, `icon`, `route`, `sort_id`) VALUES (\'*Request For Upgrade\',\'fa fa-level-up\', \'\', \'2\')');
        $this->addSql('INSERT INTO `menu_parent` (`name`, `icon`, `route`, `sort_id`) VALUES (\'Upgrade Member (Level)\',\'fa fa-key\', \'cornershort_mlmapp_upgrade_member_page_manual\', \'3\')');
        $this->addSql('INSERT INTO `menu_parent` (`name`, `icon`, `route`, `sort_id`) VALUES (\'*Family Tree\',\'fa fa-users\', \'cornershort_mlmapp_family_tree_page\', \'4\')');
        $this->addSql('INSERT INTO `menu_parent` (`name`, `icon`, `route`, `sort_id`) VALUES (\'User Account\',\'fa fa-user\', \'\', \'5\')');
        $this->addSql('INSERT INTO `menu_parent` (`name`, `icon`, `route`, `sort_id`) VALUES (\'Admin Tools\',\'fa fa-pencil-square-o\', \'\', \'6\')');
        $this->addSql('INSERT INTO `menu_parent` (`name`, `icon`, `route`, `sort_id`) VALUES (\'Admin Reports\',\'fa fa-line-chart\', \'\', \'7\')');

        $this->addSql('INSERT INTO `menu_child` (`menu_parent_id`, `name`, `route`, `access_level`, `sort_id`) VALUES (\'2\',\'Show My Members\', \'cornershort_mlmapp_register_member_page_show\', \'97\', \'0\')');
        $this->addSql('INSERT INTO `menu_child` (`menu_parent_id`, `name`, `route`, `access_level`, `sort_id`) VALUES (\'2\',\'Add New Member\', \'cornershort_mlmapp_register_member_page_add\', \'97\', \'1\')');
        $this->addSql('INSERT INTO `menu_child` (`menu_parent_id`, `name`, `route`, `access_level`, `sort_id`) VALUES (\'3\',\'*Auto Request\', \'cornershort_mlmapp_request_for_upgrade_page_auto\', \'97\', \'0\')');
        $this->addSql('INSERT INTO `menu_child` (`menu_parent_id`, `name`, `route`, `access_level`, `sort_id`) VALUES (\'3\',\'Manual Request\', \'cornershort_mlmapp_request_for_upgrade_page_manual\', \'97\', \'1\')');
        $this->addSql('INSERT INTO `menu_child` (`menu_parent_id`, `name`, `route`, `access_level`, `sort_id`) VALUES (\'6\',\'Show My Account\', \'cornershort_mlmapp_user_account_page_show\', \'97\', \'0\')');
        $this->addSql('INSERT INTO `menu_child` (`menu_parent_id`, `name`, `route`, `access_level`, `sort_id`) VALUES (\'6\',\'Edit My Account\', \'cornershort_mlmapp_user_account_page_edit\', \'97\', \'1\')');
        $this->addSql('INSERT INTO `menu_child` (`menu_parent_id`, `name`, `route`, `access_level`, `sort_id`) VALUES (\'7\',\'Member Info\', \'cornershort_mlmapp_admin_tools_page_member_info_show\', \'100\', \'0\')');
        $this->addSql('INSERT INTO `menu_child` (`menu_parent_id`, `name`, `route`, `access_level`, `sort_id`) VALUES (\'7\',\'Member Payment History\', \'cornershort_mlmapp_admin_tools_page_member_payment_history_show\', \'100\', \'0\')');
        $this->addSql('INSERT INTO `menu_child` (`menu_parent_id`, `name`, `route`, `access_level`, `sort_id`) VALUES (\'7\',\'Upgrade Member (Product)\', \'cornershort_mlmapp_admin_tools_page_upgrade_member_manual\', \'100\', \'1\')');
        $this->addSql('INSERT INTO `menu_child` (`menu_parent_id`, `name`, `route`, `access_level`, `sort_id`) VALUES (\'8\',\'Sales Tab 1\', \'cornershort_mlmapp_report_page_sales_tab_1\', \'100\', \'0\')');
        $this->addSql('INSERT INTO `menu_child` (`menu_parent_id`, `name`, `route`, `access_level`, `sort_id`) VALUES (\'8\',\'Sales Tab 2\', \'cornershort_mlmapp_report_page_sales_tab_2\', \'100\', \'1\')');
        $this->addSql('INSERT INTO `menu_child` (`menu_parent_id`, `name`, `route`, `access_level`, `sort_id`) VALUES (\'8\',\'Sales Tab 3\', \'cornershort_mlmapp_report_page_sales_tab_3\', \'100\', \'2\')');
        $this->addSql('INSERT INTO `menu_child` (`menu_parent_id`, `name`, `route`, `access_level`, `sort_id`) VALUES (\'8\',\'Show Bank Withdrawal\', \'cornershort_mlmapp_report_page_bank_withdraw_show\', \'100\', \'3\')');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
