<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20220207195323 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create `category` table and its relationships';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE category (id CHAR(36) NOT NULL, name VARCHAR(100) NOT NULL, created_on DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product ADD category_id CHAR(36) NOT NULL');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_product_category_id FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('CREATE INDEX IDX_product_category_id ON product (category_id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_product_category_id');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP INDEX IDX_product_category_id ON product');
        $this->addSql('ALTER TABLE product DROP category_id');
    }
}
