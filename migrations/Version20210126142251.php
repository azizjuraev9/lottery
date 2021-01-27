<?php

declare(strict_types=1);

namespace app\migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210126142251 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE log (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, amount INT NOT NULL, action VARCHAR(255) NOT NULL, time DATETIME NOT NULL, INDEX IDX_8F3F68C5A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE params (id INT AUTO_INCREMENT NOT NULL, `key` INT NOT NULL, value INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prizes (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, quantity INT NOT NULL, probability INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql("INSERT INTO `lottery`.`prizes`(`id`, `name`, `description`, `quantity`, `probability`) VALUES (1, 'Test', 'test', 50, 70)");
        $this->addSql("INSERT INTO `lottery`.`prizes`(`id`, `name`, `description`, `quantity`, `probability`) VALUES (2, 'test2', 'tes2', 10, 10)");
        $this->addSql("INSERT INTO `lottery`.`prizes`(`id`, `name`, `description`, `quantity`, `probability`) VALUES (3, 'test3', 'test3', 20, 20)");
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, money INT NOT NULL, points INT NOT NULL, token VARCHAR(255) NOT NULL, token_expire DATETIME NOT NULL, is_admin TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE log ADD CONSTRAINT FK_8F3F68C5A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE log DROP FOREIGN KEY FK_8F3F68C5A76ED395');
        $this->addSql('DROP TABLE log');
        $this->addSql('DROP TABLE params');
        $this->addSql('DROP TABLE prizes');
        $this->addSql('DROP TABLE user');
    }
}
