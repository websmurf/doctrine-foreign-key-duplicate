## Doctrine foreign key duplicate error demo

This is a small setup of doctrine for issue #2576 (https://github.com/doctrine/dbal/issues/2576)

# Setup
1. Checkout this repo
2. Setup a database, and import the `tables.sql` file in it
3. Configure the mysql host/username/password in `bootstrap.php`
4. Run `composer install` to install all dependencies
5. Run `vendor/bin/doctrine orm:s:u --dump-sql`

Expected results:
```
ALTER TABLE documents DROP FOREIGN KEY documents_ibfk_1;
ALTER TABLE documents CHANGE document_params document_params LONGTEXT NOT NULL COMMENT '(DC2Type:json_array)', CHANGE document_state document_state TINYINT(1) NOT NULL;
ALTER TABLE documents ADD CONSTRAINT FK_A2B07288FFA0C224 FOREIGN KEY (office_id) REFERENCES offices (id) ON DELETE CASCADE;
DROP INDEX office_id ON documents;
CREATE INDEX IDX_A2B07288FFA0C224 ON documents (office_id);
ALTER TABLE documents ADD CONSTRAINT documents_ibfk_1 FOREIGN KEY (office_id) REFERENCES offices (id);
```

Actual results:
```
ALTER TABLE documents DROP FOREIGN KEY documents_ibfk_1;
ALTER TABLE documents DROP FOREIGN KEY documents_ibfk_1;
ALTER TABLE documents CHANGE document_params document_params LONGTEXT NOT NULL COMMENT '(DC2Type:json_array)', CHANGE document_state document_state TINYINT(1) NOT NULL;
ALTER TABLE documents ADD CONSTRAINT FK_A2B07288FFA0C224 FOREIGN KEY (office_id) REFERENCES offices (id) ON DELETE CASCADE;
DROP INDEX office_id ON documents;
CREATE INDEX IDX_A2B07288FFA0C224 ON documents (office_id);
ALTER TABLE documents ADD CONSTRAINT documents_ibfk_1 FOREIGN KEY (office_id) REFERENCES offices (id);
```

Notice the duplicate DROP FOREIGN KEY statement.