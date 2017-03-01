<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170301113346 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE member_info (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, bank_acct_no INT NOT NULL, date_of_birth VARCHAR(10) NOT NULL, gender VARCHAR(1) NOT NULL, mobile_number INT NOT NULL, home_add_house_no INT NOT NULL, home_addr_street VARCHAR(50) NOT NULL, home_addr_brgy VARCHAR(50) NOT NULL, home_addr_subd VARCHAR(50) NOT NULL, home_addr_city VARCHAR(50) NOT NULL, home_addr_province VARCHAR(50) NOT NULL, leaders_id VARCHAR(8) NOT NULL, member_id VARCHAR(8) NOT NULL, acct_id VARCHAR(8) NOT NULL, total_earnings INT NOT NULL, acct_exp_date DATETIME NOT NULL, next_leader_id VARCHAR(8) NOT NULL, activation_level INT NOT NULL, status VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE member_info');
    }
}
