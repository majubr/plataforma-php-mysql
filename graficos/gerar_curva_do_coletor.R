#!/usr/bin/env php-r

# Carrega o pacote vegan
library(vegan)

# Carrega os argumentos passados pelo PHP
args <- commandArgs(TRUE)

# Extrai a lista de espécies passada como argumento
especies <- strsplit(args[1], ",")[[1]]

# Carrega a matriz de dados
matriz <- as.matrix(read.table(args[2], header = TRUE, row.names = 1))

# Gera a curva do coletor
curva <- rarecurve(t(matriz[, especies]), col = "black", lty = 1, pch = 16, main = "Curva do Coletor")

# Salva a curva em um arquivo PNG
png(args[3])
plot(curva)
dev.off()





