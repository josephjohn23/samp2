<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170301105644 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE member_payment_history (id INT AUTO_INCREMENT NOT NULL, leader_id VARCHAR(8) NOT NULL, member_id VARCHAR(8) NOT NULL, membership_option VARCHAR(4) NOT NULL, activation_level INT NOT NULL, product_amount INT NOT NULL, level_amount INT NOT NULL, date_requested DATETIME NOT NULL, date_level_upgraded DATETIME NOT NULL, is_level_paid TINYINT(1) NOT NULL, date_product_upgraded DATETIME NOT NULL, is_product_paid TINYINT(1) NOT NULL, date_completed DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_info (id INT AUTO_INCREMENT NOT NULL, product_id INT NOT NULL, product_desc VARCHAR(20) NOT NULL, product_name VARCHAR(20) NOT NULL, product_amount INT NOT NULL, activation_level INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE level_info (id INT AUTO_INCREMENT NOT NULL, level_id INT NOT NULL, level_desc VARCHAR(20) NOT NULL, level_name VARCHAR(20) NOT NULL, level_amount INT NOT NULL, activation_level INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bank_withdrawal_history (id INT AUTO_INCREMENT NOT NULL, `desc` VARCHAR(20) NOT NULL, transfer_to_name VARCHAR(20) NOT NULL, amount INT NOT NULL, membership_option VARCHAR(4) NOT NULL, transfer_by VARCHAR(20) NOT NULL, date_transfered DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE member_payment_history');
        $this->addSql('DROP TABLE product_info');
        $this->addSql('DROP TABLE level_info');
        $this->addSql('DROP TABLE bank_withdrawal_history');
    }
}
