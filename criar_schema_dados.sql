SELECT individuo, especie, modelo, data_, hora, latitude, longitude, temperatura, obs
                    FROM dados_colar_lobo;CREATE TABLE `dados_colar_lobo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `individuo` varchar(255) DEFAULT NULL,
  `especie` varchar(255) DEFAULT NULL,
  `modelo` varchar(255) DEFAULT NULL,
  `id_colar` varchar(255) DEFAULT NULL,
  `data_` varchar(255) DEFAULT NULL,
  `hora` varchar(255) DEFAULT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `temperatura` float NOT NULL,
  `obs` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2333 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
