library(tidyr)

# Criando a tabela original
tabela <- data.frame(
  especie = c("Sp1", "Sp1", "Sp2", "Sp1", "Sp1", "Sp2", "Sp2", "Sp3", "Sp3", "Sp3", "Sp4", "Sp5", "Sp5", "Sp3", "Sp3", "Sp6", "Sp1"),
  numero_ind = c(3, 3, 1, 1, 1, 1, 1, 4, 1, 1, 5, 1, 1, 1, 2, 1, 1)
)

# Pivotando a tabela
tabela_pivot <- pivot_wider(tabela, names_from = especie, values_from = numero_ind)

# Preenchendo células faltantes com zero
tabela_preenchida <- complete(tabela_pivot, fill = list(Sp1 = 0, Sp2 = 0, Sp3 = 0, Sp4 = 0, Sp5 = 0, Sp6 = 0))

# Criando a matriz com zeros
matriz <- matrix(0, nrow = max(tabela_preenchida$numero_ind), ncol = length(unique(tabela$especie)))

# Preenchendo a matriz com os valores corretos
for (i in 1:nrow(tabela)) {
  matriz[tabela$numero_ind[i], match(tabela$especie[i], colnames(matriz))] <- matriz[tabela$numero_ind[i], match(tabela$especie[i], colnames(matriz))] + 1
}

# Exibindo a matriz final
print(matriz)







