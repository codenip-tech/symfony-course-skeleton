<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20220131213527 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create `product` table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE product (id CHAR(36) NOT NULL, name VARCHAR(100) NOT NULL, sku VARCHAR(50) NOT NULL, price INT NOT NULL, created_on DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE product');
    }
}
