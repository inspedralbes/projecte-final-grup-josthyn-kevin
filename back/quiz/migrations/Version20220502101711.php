<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220502101711 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE preguntas (id INT AUTO_INCREMENT NOT NULL, id_quiz_id INT NOT NULL, enunciado VARCHAR(255) NOT NULL, r1 VARCHAR(255) NOT NULL, r2 VARCHAR(255) NOT NULL, r3 VARCHAR(255) NOT NULL, r4 VARCHAR(255) NOT NULL, r5 VARCHAR(255) NOT NULL, INDEX IDX_387948555BA17805 (id_quiz_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE preguntas ADD CONSTRAINT FK_387948555BA17805 FOREIGN KEY (id_quiz_id) REFERENCES quiz (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE preguntas');
    }
}
