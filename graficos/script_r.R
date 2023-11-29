library(RMySQL)
library(vegan)

# Estabelecer conexão com o banco de dados e selecionar a tabela "herpetofauna"
conexao <- dbConnect(MySQL(), user="root", password="", dbname="fauna", host="localhost")
dados <- dbGetQuery(conexao, "SELECT especie, numero_ind FROM herpetofauna")

# Criar a curva do coletor e salvar o gráfico como uma imagem
curva_coletor <- rarecurve(dados$numero_ind, step=10)
png("C:/xampp/htdocs/datatable6_v3/graficos/curva_coletor.png")
plot(curva_coletor)
dev.off()