CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `primeironome` varchar(45) NOT NULL,
  `sobrenome` varchar(45) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `senha` varchar(100) NOT NULL COMMENT '''',
  `genero` varchar(45) NOT NULL,
  `imagemperfil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;  


BLOB