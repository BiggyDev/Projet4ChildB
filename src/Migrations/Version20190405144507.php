<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190405144507 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_22B3542919EB6921');
        $this->addSql('CREATE TEMPORARY TABLE __temp__child AS SELECT id, client_id, name, lastname, age, info, gender FROM child');
        $this->addSql('DROP TABLE child');
        $this->addSql('CREATE TABLE child (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id INTEGER DEFAULT NULL, name VARCHAR(255) NOT NULL COLLATE BINARY, lastname VARCHAR(255) NOT NULL COLLATE BINARY, age INTEGER NOT NULL, info CLOB NOT NULL COLLATE BINARY, gender VARCHAR(20) NOT NULL COLLATE BINARY, CONSTRAINT FK_22B3542919EB6921 FOREIGN KEY (client_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO child (id, client_id, name, lastname, age, info, gender) SELECT id, client_id, name, lastname, age, info, gender FROM __temp__child');
        $this->addSql('DROP TABLE __temp__child');
        $this->addSql('CREATE INDEX IDX_22B3542919EB6921 ON child (client_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__client AS SELECT id, password, token, updated_at, description, phone, localisation, name, lastname, created_at, gender, age, username FROM client');
        $this->addSql('DROP TABLE client');
        $this->addSql('CREATE TABLE client (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, password VARCHAR(255) NOT NULL COLLATE BINARY, token VARCHAR(255) NOT NULL COLLATE BINARY, updated_at DATETIME DEFAULT NULL, description CLOB DEFAULT NULL COLLATE BINARY, phone INTEGER DEFAULT NULL, localisation CLOB DEFAULT NULL COLLATE BINARY --(DC2Type:json)
        , name VARCHAR(255) DEFAULT NULL COLLATE BINARY, lastname VARCHAR(255) DEFAULT NULL COLLATE BINARY, created_at DATETIME DEFAULT NULL, gender VARCHAR(20) DEFAULT NULL COLLATE BINARY, age INTEGER DEFAULT NULL, email VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO client (id, password, token, updated_at, description, phone, localisation, name, lastname, created_at, gender, age, email) SELECT id, password, token, updated_at, description, phone, localisation, name, lastname, created_at, gender, age, username FROM __temp__client');
        $this->addSql('DROP TABLE __temp__client');
        $this->addSql('DROP INDEX IDX_9474526CA53A8AA');
        $this->addSql('DROP INDEX IDX_9474526C19EB6921');
        $this->addSql('CREATE TEMPORARY TABLE __temp__comment AS SELECT id, client_id, provider_id, title, article, score FROM comment');
        $this->addSql('DROP TABLE comment');
        $this->addSql('CREATE TABLE comment (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id INTEGER DEFAULT NULL, provider_id INTEGER DEFAULT NULL, title VARCHAR(255) DEFAULT NULL COLLATE BINARY, article VARCHAR(255) DEFAULT NULL COLLATE BINARY, score INTEGER NOT NULL, CONSTRAINT FK_9474526C19EB6921 FOREIGN KEY (client_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_9474526CA53A8AA FOREIGN KEY (provider_id) REFERENCES provider (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO comment (id, client_id, provider_id, title, article, score) SELECT id, client_id, provider_id, title, article, score FROM __temp__comment');
        $this->addSql('DROP TABLE __temp__comment');
        $this->addSql('CREATE INDEX IDX_9474526CA53A8AA ON comment (provider_id)');
        $this->addSql('CREATE INDEX IDX_9474526C19EB6921 ON comment (client_id)');
        $this->addSql('DROP INDEX IDX_F994426DD62C21B');
        $this->addSql('DROP INDEX IDX_F994426E7A1254A');
        $this->addSql('CREATE TEMPORARY TABLE __temp__contact_child AS SELECT contact_id, child_id FROM contact_child');
        $this->addSql('DROP TABLE contact_child');
        $this->addSql('CREATE TABLE contact_child (contact_id INTEGER NOT NULL, child_id INTEGER NOT NULL, PRIMARY KEY(contact_id, child_id), CONSTRAINT FK_F994426E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_F994426DD62C21B FOREIGN KEY (child_id) REFERENCES child (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO contact_child (contact_id, child_id) SELECT contact_id, child_id FROM __temp__contact_child');
        $this->addSql('DROP TABLE __temp__contact_child');
        $this->addSql('CREATE INDEX IDX_F994426DD62C21B ON contact_child (child_id)');
        $this->addSql('CREATE INDEX IDX_F994426E7A1254A ON contact_child (contact_id)');
        $this->addSql('DROP INDEX IDX_7BE5E15DA53A8AA');
        $this->addSql('DROP INDEX IDX_7BE5E15DDD62C21B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__provider_child AS SELECT provider_id, child_id FROM provider_child');
        $this->addSql('DROP TABLE provider_child');
        $this->addSql('CREATE TABLE provider_child (provider_id INTEGER NOT NULL, child_id INTEGER NOT NULL, PRIMARY KEY(provider_id, child_id), CONSTRAINT FK_7BE5E15DA53A8AA FOREIGN KEY (provider_id) REFERENCES provider (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_7BE5E15DDD62C21B FOREIGN KEY (child_id) REFERENCES child (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO provider_child (provider_id, child_id) SELECT provider_id, child_id FROM __temp__provider_child');
        $this->addSql('DROP TABLE __temp__provider_child');
        $this->addSql('CREATE INDEX IDX_7BE5E15DA53A8AA ON provider_child (provider_id)');
        $this->addSql('CREATE INDEX IDX_7BE5E15DDD62C21B ON provider_child (child_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_22B3542919EB6921');
        $this->addSql('CREATE TEMPORARY TABLE __temp__child AS SELECT id, client_id, name, lastname, age, gender, info FROM child');
        $this->addSql('DROP TABLE child');
        $this->addSql('CREATE TABLE child (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id INTEGER DEFAULT NULL, name VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, age INTEGER NOT NULL, gender VARCHAR(20) NOT NULL, info CLOB NOT NULL)');
        $this->addSql('INSERT INTO child (id, client_id, name, lastname, age, gender, info) SELECT id, client_id, name, lastname, age, gender, info FROM __temp__child');
        $this->addSql('DROP TABLE __temp__child');
        $this->addSql('CREATE INDEX IDX_22B3542919EB6921 ON child (client_id)');
        $this->addSql('CREATE TEMPORARY TABLE __temp__client AS SELECT id, name, lastname, email, password, token, created_at, updated_at, description, phone, gender, age, localisation FROM client');
        $this->addSql('DROP TABLE client');
        $this->addSql('CREATE TABLE client (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, lastname VARCHAR(255) DEFAULT NULL, password VARCHAR(255) NOT NULL, token VARCHAR(255) NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, description CLOB DEFAULT NULL, phone INTEGER DEFAULT NULL, gender VARCHAR(20) DEFAULT NULL, age INTEGER DEFAULT NULL, localisation CLOB DEFAULT NULL --(DC2Type:json)
        , username VARCHAR(255) NOT NULL COLLATE BINARY)');
        $this->addSql('INSERT INTO client (id, name, lastname, username, password, token, created_at, updated_at, description, phone, gender, age, localisation) SELECT id, name, lastname, email, password, token, created_at, updated_at, description, phone, gender, age, localisation FROM __temp__client');
        $this->addSql('DROP TABLE __temp__client');
        $this->addSql('DROP INDEX IDX_9474526C19EB6921');
        $this->addSql('DROP INDEX IDX_9474526CA53A8AA');
        $this->addSql('CREATE TEMPORARY TABLE __temp__comment AS SELECT id, client_id, provider_id, title, article, score FROM comment');
        $this->addSql('DROP TABLE comment');
        $this->addSql('CREATE TABLE comment (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, client_id INTEGER DEFAULT NULL, provider_id INTEGER DEFAULT NULL, title VARCHAR(255) DEFAULT NULL, article VARCHAR(255) DEFAULT NULL, score INTEGER NOT NULL)');
        $this->addSql('INSERT INTO comment (id, client_id, provider_id, title, article, score) SELECT id, client_id, provider_id, title, article, score FROM __temp__comment');
        $this->addSql('DROP TABLE __temp__comment');
        $this->addSql('CREATE INDEX IDX_9474526C19EB6921 ON comment (client_id)');
        $this->addSql('CREATE INDEX IDX_9474526CA53A8AA ON comment (provider_id)');
        $this->addSql('DROP INDEX IDX_F994426E7A1254A');
        $this->addSql('DROP INDEX IDX_F994426DD62C21B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__contact_child AS SELECT contact_id, child_id FROM contact_child');
        $this->addSql('DROP TABLE contact_child');
        $this->addSql('CREATE TABLE contact_child (contact_id INTEGER NOT NULL, child_id INTEGER NOT NULL, PRIMARY KEY(contact_id, child_id))');
        $this->addSql('INSERT INTO contact_child (contact_id, child_id) SELECT contact_id, child_id FROM __temp__contact_child');
        $this->addSql('DROP TABLE __temp__contact_child');
        $this->addSql('CREATE INDEX IDX_F994426E7A1254A ON contact_child (contact_id)');
        $this->addSql('CREATE INDEX IDX_F994426DD62C21B ON contact_child (child_id)');
        $this->addSql('DROP INDEX IDX_7BE5E15DA53A8AA');
        $this->addSql('DROP INDEX IDX_7BE5E15DDD62C21B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__provider_child AS SELECT provider_id, child_id FROM provider_child');
        $this->addSql('DROP TABLE provider_child');
        $this->addSql('CREATE TABLE provider_child (provider_id INTEGER NOT NULL, child_id INTEGER NOT NULL, PRIMARY KEY(provider_id, child_id))');
        $this->addSql('INSERT INTO provider_child (provider_id, child_id) SELECT provider_id, child_id FROM __temp__provider_child');
        $this->addSql('DROP TABLE __temp__provider_child');
        $this->addSql('CREATE INDEX IDX_7BE5E15DA53A8AA ON provider_child (provider_id)');
        $this->addSql('CREATE INDEX IDX_7BE5E15DDD62C21B ON provider_child (child_id)');
    }
}
