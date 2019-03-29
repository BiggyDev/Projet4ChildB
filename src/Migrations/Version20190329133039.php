<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190329133039 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__child AS SELECT id, name, lastname, age, gender, info FROM child');
        $this->addSql('DROP TABLE child');
        $this->addSql('CREATE TABLE child (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, lastname VARCHAR(255) NOT NULL COLLATE BINARY, age INTEGER NOT NULL, info CLOB NOT NULL COLLATE BINARY, gender VARCHAR(20) NOT NULL)');
        $this->addSql('INSERT INTO child (id, name, lastname, age, gender, info) SELECT id, name, lastname, age, gender, info FROM __temp__child');
        $this->addSql('DROP TABLE __temp__child');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('CREATE TEMPORARY TABLE __temp__child AS SELECT id, name, lastname, age, gender, info FROM child');
        $this->addSql('DROP TABLE child');
        $this->addSql('CREATE TABLE child (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, age INTEGER NOT NULL, info CLOB NOT NULL, gender VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO child (id, name, lastname, age, gender, info) SELECT id, name, lastname, age, gender, info FROM __temp__child');
        $this->addSql('DROP TABLE __temp__child');
    }
}
