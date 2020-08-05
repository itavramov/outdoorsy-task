<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200803110145 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rental_images ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE rentals ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE rentals ALTER created TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE rentals ALTER created DROP DEFAULT');
        $this->addSql('ALTER TABLE rentals ALTER updated TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE rentals ALTER updated DROP DEFAULT');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE rentals_id_seq');
        $this->addSql('SELECT setval(\'rentals_id_seq\', (SELECT MAX(id) FROM rentals))');
        $this->addSql('ALTER TABLE rentals ALTER id SET DEFAULT nextval(\'rentals_id_seq\')');
        $this->addSql('ALTER TABLE rentals ALTER created TYPE TIMESTAMP(0) WITH TIME ZONE');
        $this->addSql('ALTER TABLE rentals ALTER created DROP DEFAULT');
        $this->addSql('ALTER TABLE rentals ALTER updated TYPE TIMESTAMP(0) WITH TIME ZONE');
        $this->addSql('ALTER TABLE rentals ALTER updated DROP DEFAULT');
        $this->addSql('CREATE SEQUENCE rental_images_id_seq');
        $this->addSql('SELECT setval(\'rental_images_id_seq\', (SELECT MAX(id) FROM rental_images))');
        $this->addSql('ALTER TABLE rental_images ALTER id SET DEFAULT nextval(\'rental_images_id_seq\')');
    }
}
