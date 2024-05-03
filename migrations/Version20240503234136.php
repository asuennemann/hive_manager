<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240503234136 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE to_do (id INT AUTO_INCREMENT NOT NULL, to_do VARCHAR(255) NOT NULL, done TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE to_do_bee_colony_check (to_do_id INT NOT NULL, bee_colony_check_id INT NOT NULL, INDEX IDX_2E91565BE9ECD7 (to_do_id), INDEX IDX_2E9156F0D8AB15 (bee_colony_check_id), PRIMARY KEY(to_do_id, bee_colony_check_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE to_do_bee_colony_check ADD CONSTRAINT FK_2E91565BE9ECD7 FOREIGN KEY (to_do_id) REFERENCES to_do (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE to_do_bee_colony_check ADD CONSTRAINT FK_2E9156F0D8AB15 FOREIGN KEY (bee_colony_check_id) REFERENCES bee_colony_check (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE to_do_bee_colony_check DROP FOREIGN KEY FK_2E91565BE9ECD7');
        $this->addSql('ALTER TABLE to_do_bee_colony_check DROP FOREIGN KEY FK_2E9156F0D8AB15');
        $this->addSql('DROP TABLE to_do');
        $this->addSql('DROP TABLE to_do_bee_colony_check');
    }
}
