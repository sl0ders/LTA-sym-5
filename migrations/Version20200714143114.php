<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200714143114 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE address (id INT AUTO_INCREMENT NOT NULL, street VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, postal_code INT NOT NULL, country VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\'');
        $this->addSql('ALTER TABLE variety DROP FOREIGN KEY FK_38D69117DE18E50B');
        $this->addSql('DROP INDEX IDX_38D69117DE18E50B ON variety');
        $this->addSql('ALTER TABLE variety CHANGE product_id_id product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE variety ADD CONSTRAINT FK_38D691174584665A FOREIGN KEY (product_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_38D691174584665A ON variety (product_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE address');
        $this->addSql('ALTER TABLE user CHANGE roles roles LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_bin`');
        $this->addSql('ALTER TABLE variety DROP FOREIGN KEY FK_38D691174584665A');
        $this->addSql('DROP INDEX IDX_38D691174584665A ON variety');
        $this->addSql('ALTER TABLE variety CHANGE product_id product_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE variety ADD CONSTRAINT FK_38D69117DE18E50B FOREIGN KEY (product_id_id) REFERENCES product (id)');
        $this->addSql('CREATE INDEX IDX_38D69117DE18E50B ON variety (product_id_id)');
    }
}
