<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170219195609 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE menu_child (id INT AUTO_INCREMENT NOT NULL, menu_parent_id INT NOT NULL, name VARCHAR(40) NOT NULL, route VARCHAR(255) NOT NULL, access_level INT NOT NULL, INDEX menu_parent_id (menu_parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (menu_id INT AUTO_INCREMENT NOT NULL, menu_type INT NOT NULL, side_menu INT NOT NULL, name VARCHAR(40) NOT NULL, description VARCHAR(255) NOT NULL, file_name VARCHAR(255) NOT NULL, access_level INT NOT NULL, image_type VARCHAR(20) NOT NULL, image_content LONGBLOB NOT NULL, INDEX menu_type (menu_type), PRIMARY KEY(menu_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_parent (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(40) NOT NULL, icon VARCHAR(255) NOT NULL, route VARCHAR(255) NOT NULL, sort_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, username_canonical VARCHAR(180) NOT NULL, email VARCHAR(180) NOT NULL, email_canonical VARCHAR(180) NOT NULL, enabled TINYINT(1) NOT NULL, salt VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, last_login DATETIME DEFAULT NULL, confirmation_token VARCHAR(180) DEFAULT NULL, password_requested_at DATETIME DEFAULT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', first_name VARCHAR(32) DEFAULT \'\' NOT NULL, last_name VARCHAR(32) DEFAULT \'\' NOT NULL, access_level INT DEFAULT 0 NOT NULL, activation_key VARCHAR(32) DEFAULT \'\' NOT NULL, last_logout DATETIME NOT NULL, UNIQUE INDEX UNIQ_1483A5E992FC23A8 (username_canonical), UNIQUE INDEX UNIQ_1483A5E9A0D96FBF (email_canonical), UNIQUE INDEX UNIQ_1483A5E9C05FB297 (confirmation_token), UNIQUE INDEX username (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE menu_child');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE menu_parent');
        $this->addSql('DROP TABLE users');
    }
}
