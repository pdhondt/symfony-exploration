<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210427141940 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE move (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE villain_move (villain_id INT NOT NULL, move_id INT NOT NULL, INDEX IDX_AE1FABCF363C6CE2 (villain_id), INDEX IDX_AE1FABCF6DC541A8 (move_id), PRIMARY KEY(villain_id, move_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE villain_move ADD CONSTRAINT FK_AE1FABCF363C6CE2 FOREIGN KEY (villain_id) REFERENCES villain (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE villain_move ADD CONSTRAINT FK_AE1FABCF6DC541A8 FOREIGN KEY (move_id) REFERENCES move (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE villain_move DROP FOREIGN KEY FK_AE1FABCF6DC541A8');
        $this->addSql('DROP TABLE move');
        $this->addSql('DROP TABLE villain_move');
    }
}
