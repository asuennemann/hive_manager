<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240503233226 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bee_colony (id INT AUTO_INCREMENT NOT NULL, locaton_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_1824992E110611AD (locaton_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bee_colony_check (id INT AUTO_INCREMENT NOT NULL, bee_colony_id INT DEFAULT NULL, date DATETIME NOT NULL, brood_combs INT NOT NULL, queen_bee_seen TINYINT(1) NOT NULL, review VARCHAR(255) NOT NULL, INDEX IDX_6A63AB09C8127B40 (bee_colony_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bee_colony ADD CONSTRAINT FK_1824992E110611AD FOREIGN KEY (locaton_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE bee_colony_check ADD CONSTRAINT FK_6A63AB09C8127B40 FOREIGN KEY (bee_colony_id) REFERENCES bee_colony (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bee_colony DROP FOREIGN KEY FK_1824992E110611AD');
        $this->addSql('ALTER TABLE bee_colony_check DROP FOREIGN KEY FK_6A63AB09C8127B40');
        $this->addSql('DROP TABLE bee_colony');
        $this->addSql('DROP TABLE bee_colony_check');
    }
}
