library(RMySQL)
library(reshape2)

conexao <- dbConnect(MySQL(), user = "root", password = "", dbname = "fauna", host = "localhost")
dados <- dbGetQuery(conexao, "SELECT especie, numero_ind FROM herpetofauna")



nova_tabela <- dcast(dados, formula = especie ~ ., value.var = "numero_ind")
