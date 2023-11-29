especies <- strsplit(readLines("stdin"), ",")[[1]]

# Define a função para calcular a curva do coletor
curva_do_coletor <- function(n) {
  S <- length(unique(n))
  C <- numeric(S)
  for (i in 1:S) {
    C[i] <- sum(n >= i)
  }
  return(C)
}

# Tenta carregar a biblioteca necessária
if (!require("ggplot2")) {
  stop("A biblioteca ggplot2 não está instalada. Por favor, instale-a e tente novamente.")
}

# Carrega o arquivo CSV e calcula a curva do coletor
herpetofauna <- read.csv("herpetofauna.csv", header = TRUE)
numero_ind <- as.numeric(herpetofauna$numero_ind)
C <- curva_do_coletor(numero_ind)

# Plota a curva do coletor e salva como arquivo PNG
png("curva_do_coletor.png", width = 800, height = 600)
ggplot(data.frame(C), aes(x = 1:length(C), y = C)) + 
  geom_line() +
  xlab("Número de Espécies") +
  ylab("Número de Indivíduos") +
  ggtitle("Curva do Coletor")
dev.off()

# Verifica se o arquivo foi criado corretamente
if (file.exists("curva_do_coletor.png") && file.info("curva_do_coletor.png")$size > 0) {
  cat("Arquivo de imagem criado com sucesso.\n")
} else {
  stop("Erro ao criar o arquivo de imagem.")
}