-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table plataformagestaofrotasveiculosexoticos.itinerarios: ~9 rows (approximately)
REPLACE INTO `itinerarios` (`id`, `titulo`, `descricao`, `mapa_url`) VALUES
	(1, 'TEsteeeeee', 'Percurso de Lisboa até Porto, mostrando a rota principal pela autoestrada A1.', 'https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d250607.3272815986!2d-9.1614194825707!3d38.7575699400344!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0xd1933329ca0a88f%3A0x400f1672b424c50!2sLisboa!3m2!1d38.716948!2d-9.139363!4m5!1s0xd246e1e3c2d6663%3A0xa00c7a997b0a2c0!2sPorto!3m2!1d41.1579438!2d-8.629105299999999!5e0!3m2!1spt-PT!2spt!4v1623992158492'),
	(2, 'Faro para Évora', 'Percurso de Faro até Évora, mostrando a rota principal pela autoestrada A22 e A2.', 'https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d250843.1106410025!2d-7.935046533409516!3d37.10256874355813!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0xd19331d9c59f8c1%3A0x400f1672b424c60!2sFaro!3m2!1d37.0193556!2d-7.930440499999999!4m5!1s0xd1ab1ec9ac2a29b%3A0x7f7b3d6a739f9e6c!2s%C3%89vora!3m2!1d38.5714418!2d-7.9094523!5e0!3m2!1spt-PT!2spt!4v1623992415101'),
	(5, 'Ponta Delgada para Angra do Heroísmo', 'Percurso de Ponta Delgada até Angra do Heroísmo, mostrando a rota principal pela via marítima e aérea.', 'https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d118896.16177905566!2d-25.69226794824218!3d37.74825099689817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0x339a404b4db5f1a9%3A0x8e97d8b6c05b2344!2sPonta%20Delgada!3m2!1d37.7422094!2d-25.6773018!4m5!1s0xdab63b91e75e92f%3A0x15d13e306c81ee68!2sAngra%20do%20Hero%C3%ADsmo!3m2!1d38.6609911!2d-27.2166397!5e0!3m2!1spt-PT!2spt!4v1623992921701'),
	(6, 'Guarda para Castelo Branco', 'Percurso da Guarda até Castelo Branco, mostrando a rota principal pela autoestrada A23.', 'https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d129729.20438960216!2d-7.538850950537797!3d40.27115580168564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0xd1b0b88f4b6f931%3A0x18a730d68d98ea4e!2sGuarda!3m2!1d40.5367615!2d-7.2677294!4m5!1s0xd1a4507d4083685%3A0x9f3408306e5a5d5f!2sCastelo%20Branco!3m2!1d39.8225419!2d-7.4931022!5e0!3m2!1spt-PT!2spt!4v1623993079848'),
	(7, 'Setúbal para Portimão', 'Percurso de Setúbal até Portimão, mostrando a rota principal pela autoestrada A2.', 'https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d237347.32446759524!2d-8.70759531308579!3d37.14931697076436!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0xd1a5c5c6e44a22c3%3A0x6b3f4bf9a4f0a7e6!2sSet%C3%BAbal!3m2!1d38.5245144!2d-8.8935152!4m5!1s0xd1ad938c7e43a39%3A0x9e8e0f04b4d5ebe3!2sPortim%C3%A3o!3m2!1d37.1392808!2d-8.5342142!5e0!3m2!1spt-PT!2spt!4v1623993307680'),
	(8, 'Viseu para Bragança', 'Percurso de Viseu até Bragança, mostrando a rota principal pela autoestrada A24 e A4.', 'https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d129737.20168878014!2d-7.775066882727339!3d40.52221618165026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e0!4m5!1s0xd1b0b88f4b6f931%3A0x18a730d68d98ea4e!2sViseu!3m2!1d40.6565865!2d-7.9121208!4m5!1s0xd1ad71e998a8097%3A0x8ebc146f5ce243c8!2sBragan%C3%A7a!3m2!1d41.8056516!2d-6.7570587!5e0!3m2!1spt-PT!2spt!4v1623993487838'),
	(9, 'ISLA - Manicómio Lisboa', 'O caminho de todos os estudantes', 'https://maps.app.goo.gl/78ShVddaYB6MSKo77'),
	(10, 'teste do teste 333', 'bacano', 'url marada');

-- Dumping data for table plataformagestaofrotasveiculosexoticos.marcas: ~14 rows (approximately)
REPLACE INTO `marcas` (`id`, `marca`, `diretorio_logo`) VALUES
	(1, 'Acura', '../img/marcas/acura.png'),
	(2, 'Aston Martin', '../img/marcas/astonMartin.png'),
	(3, 'Bentley', '../img/marcas/bentley.png'),
	(4, 'Bugatti', '../img/marcas/bugatti.png'),
	(5, 'Cadillac', '../img/marcas/cadillac.png'),
	(6, 'Ferrari', '../img/marcas/ferrari.png'),
	(7, 'Infiniti', '../img/marcas/infinit.png'),
	(8, 'Jaguar', '../img/marcas/jaguar.png'),
	(9, 'Lamborghini', '../img/marcas/lamborghini.png'),
	(10, 'Land Rover', '../img/marcas/landRover.png'),
	(11, 'Maserati', '../img/marcas/maserati.png'),
	(12, 'Mercedes-Benz', '../img/marcas/mercedesBenz.png'),
	(13, 'Porsche', '../img/marcas/porsche.png'),
	(14, 'Rolls-Royce', '../img/marcas/rollsRoyce.png');

-- Dumping data for table plataformagestaofrotasveiculosexoticos.modelos: ~42 rows (approximately)
REPLACE INTO `modelos` (`id`, `id_marca`, `modelo`, `especificacoes`) VALUES
	(1, 1, 'NSX', NULL),
	(2, 1, 'TLX', NULL),
	(3, 1, 'RDX', NULL),
	(4, 2, 'DB11', NULL),
	(5, 2, 'Vantage', NULL),
	(6, 2, 'DBS Superleggera', NULL),
	(7, 3, 'Continental GT', NULL),
	(8, 3, 'Flying Spur', NULL),
	(9, 3, 'Bentayga', NULL),
	(10, 4, 'Chiron', NULL),
	(11, 4, 'Veyron', NULL),
	(12, 4, 'Divo', NULL),
	(13, 5, 'Escalade', NULL),
	(14, 5, 'CTS', NULL),
	(15, 5, 'XT5', NULL),
	(16, 6, '488 GTB', NULL),
	(17, 6, 'F8 Tributo', NULL),
	(18, 6, 'Roma', NULL),
	(19, 7, 'Q50', NULL),
	(20, 7, 'QX60', NULL),
	(21, 7, 'QX80', NULL),
	(22, 8, 'F-Type', NULL),
	(23, 8, 'XE', NULL),
	(24, 8, 'XF', NULL),
	(25, 9, 'Huracan', NULL),
	(26, 9, 'Aventador', NULL),
	(27, 9, 'Urus', NULL),
	(28, 10, 'Range Rover', NULL),
	(29, 10, 'Discovery', NULL),
	(30, 10, 'Defender', NULL),
	(31, 11, 'Ghibli', NULL),
	(32, 11, 'Levante', NULL),
	(33, 11, 'Quattroporte', NULL),
	(34, 12, 'C-Class', NULL),
	(35, 12, 'E-Class', NULL),
	(36, 12, 'S-Class', NULL),
	(37, 13, '911', NULL),
	(38, 13, 'Cayenne', NULL),
	(39, 13, 'Panamera', NULL),
	(40, 14, 'Phantom', NULL),
	(41, 14, 'Ghost', NULL),
	(42, 14, 'Wraith', NULL);

-- Dumping data for table plataformagestaofrotasveiculosexoticos.pontos_interesse: ~0 rows (approximately)

-- Dumping data for table plataformagestaofrotasveiculosexoticos.requisicoes: ~8 rows (approximately)
REPLACE INTO `requisicoes` (`id`, `username`, `veiculo_id`, `itinerario_id`, `data_requisicao`, `estado`, `data_devolucao`) VALUES
	(1, 'pedro', 8, 6, '2024-06-28', 'aprovado', NULL),
	(2, 'pedro', 6, 2, '2024-06-18', 'rejeitado', NULL),
	(3, 'pedro', 6, 1, '2000-12-20', 'aprovado', NULL),
	(5, 'pedro', 9, 2, '2024-06-27', 'aprovado', NULL),
	(7, 'pedro', 11, 2, '2024-06-29', 'aprovado', NULL),
	(8, 'pedro', 6, 2, '2024-06-26', 'rejeitado', NULL),
	(9, 'goncalo', 6, 6, '2024-06-26', 'aprovado', NULL),
	(10, 'pedro', 6, 2, '2024-06-26', 'rejeitado', NULL);

-- Dumping data for table plataformagestaofrotasveiculosexoticos.utilizadores: ~3 rows (approximately)
REPLACE INTO `utilizadores` (`id`, `nome`, `email`, `password`, `role`, `email_confirmado`) VALUES
	(1, 'admin', 'admin@admin.com', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'admin', 0),
	(5, 'pedro', 'pedro.varela955@gmail.com', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'user', 0),
	(6, 'goncalo', 'goncalo@gmail.com', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'user', 0);

-- Dumping data for table plataformagestaofrotasveiculosexoticos.veiculos: ~6 rows (approximately)
REPLACE INTO `veiculos` (`marca`, `modelo`, `ano`, `matricula`, `id`, `estado`) VALUES
	('9', '27', 2015, '24-10-QO', 6, 'reservado'),
	('5', '13', 2019, '54-SS-22', 8, 'disponivel'),
	('11', '31', 2023, 'AU-40-TP', 9, 'disponivel'),
	('3', '8', 2023, '24-10-QQ', 10, 'disponivel'),
	('7', '19', 2000, '00-AA-00', 11, 'reservado'),
	('10', '28', 2024, 'AU-40-QW', 13, 'disponivel');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
