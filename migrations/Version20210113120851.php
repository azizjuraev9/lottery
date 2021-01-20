<?php

declare(strict_types=1);

namespace app\migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210113120851 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE prizes (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, quantity INT NOT NULL, probability INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB');
        $this->addSql("INSERT INTO `lottery`.`prizes`(`id`, `name`, `description`, `quantity`, `probability`) VALUES (1, 'Test', 'test', 50, 70)");
        $this->addSql("INSERT INTO `lottery`.`prizes`(`id`, `name`, `description`, `quantity`, `probability`) VALUES (2, 'test2', 'tes2', 10, 10)");
        $this->addSql("INSERT INTO `lottery`.`prizes`(`id`, `name`, `description`, `quantity`, `probability`) VALUES (3, 'test3', 'test3', 20, 20)");
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE prizes');
    }
}
