<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170303070219 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE users ADD user_id INT NOT NULL, ADD bank_acct_no INT NOT NULL, ADD date_of_birth VARCHAR(10) NOT NULL, ADD gender VARCHAR(1) NOT NULL, ADD mobile_number INT NOT NULL, ADD home_add_house_no INT NOT NULL, ADD home_addr_street VARCHAR(50) NOT NULL, ADD home_addr_brgy VARCHAR(50) NOT NULL, ADD home_addr_subd VARCHAR(50) NOT NULL, ADD home_addr_city VARCHAR(50) NOT NULL, ADD home_addr_province VARCHAR(50) NOT NULL, ADD leaders_id VARCHAR(8) NOT NULL, ADD member_id VARCHAR(8) NOT NULL, ADD acct_id VARCHAR(8) NOT NULL, ADD total_earnings INT NOT NULL, ADD acct_exp_date DATETIME NOT NULL, ADD next_leader_id VARCHAR(8) NOT NULL, ADD activation_level INT NOT NULL, ADD status VARCHAR(20) NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE users DROP user_id, DROP bank_acct_no, DROP date_of_birth, DROP gender, DROP mobile_number, DROP home_add_house_no, DROP home_addr_street, DROP home_addr_brgy, DROP home_addr_subd, DROP home_addr_city, DROP home_addr_province, DROP leaders_id, DROP member_id, DROP acct_id, DROP total_earnings, DROP acct_exp_date, DROP next_leader_id, DROP activation_level, DROP status');
    }
}
