-- Adicione uma nova coluna para armazenar temporariamente os valores do ano como strings
ALTER TABLE resgate ADD COLUMN ano_temp VARCHAR(4);

-- Atualize a nova coluna com os valores convertidos da coluna 'ano' original
UPDATE resgate SET ano_temp = YEAR(ano);

-- Remova a coluna original 'ano'
ALTER TABLE resgate DROP COLUMN ano;

-- Adicione a coluna 'ano' com o tipo VARCHAR
ALTER TABLE resgate ADD COLUMN ano VARCHAR(4);

-- Atualize a coluna 'ano' com os valores da coluna temporária
UPDATE resgate SET ano = ano_temp;

-- Remova a coluna temporária
ALTER TABLE resgate DROP COLUMN ano_temp;
-- Adicione uma nova coluna para armazenar temporariamente os valores do ano como strings
ALTER TABLE resgate ADD COLUMN ano_temp VARCHAR(4);

-- Atualize a nova coluna com os valores convertidos da coluna 'ano' original
UPDATE resgate SET ano_temp = YEAR(ano);

-- Remova a coluna original 'ano'
ALTER TABLE resgate DROP COLUMN ano;

-- Adicione a coluna 'ano' com o tipo VARCHAR
ALTER TABLE resgate ADD COLUMN ano VARCHAR(4);

-- Atualize a coluna 'ano' com os valores da coluna temporária
UPDATE resgate SET ano = ano_temp;

-- Remova a coluna temporária
ALTER TABLE resgate DROP COLUMN ano_temp;
