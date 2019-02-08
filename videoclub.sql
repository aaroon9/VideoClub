-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Temps de generació: 08-02-2019 a les 18:04:21
-- Versió del servidor: 10.1.36-MariaDB
-- Versió de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `videoclub`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcament de dades per a la taula `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_09_152955_create_movies_table', 1);

-- --------------------------------------------------------

--
-- Estructura de la taula `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `director` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `poster` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rented` tinyint(1) NOT NULL DEFAULT '0',
  `synopsis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcament de dades per a la taula `movies`
--

INSERT INTO `movies` (`id`, `title`, `year`, `director`, `poster`, `rented`, `synopsis`, `created_at`, `updated_at`) VALUES
(1, 'El padrino', '1972', 'Francis Ford Coppola', 'http://ia.media-imdb.com/images/M/MV5BMjEyMjcyNDI4MF5BMl5BanBnXkFtZTcwMDA5Mzg3OA@@._V1_SX214_AL_.jpg', 0, 'Don Vito Corleone (Marlon Brando) es el respetado y temido jefe de una de las cinco familias de la mafia de Nueva York. Tiene cuatro hijos: Connie (Talia Shire), el impulsivo Sonny (James Caan), el pusilánime Freddie (John Cazale) y Michael (Al Pacino), que no quiere saber nada de los negocios de su padre. Cuando Corleone, en contra de los consejos de \'Il consigliere\' Tom Hagen (Robert Duvall), se niega a intervenir en el negocio de las drogas, el jefe de otra banda ordena su asesinato. Empieza entonces una violenta y cruenta guerra entre las familias mafiosas.', '2019-01-10 19:48:27', '2019-01-10 19:48:27'),
(2, 'El Padrino. Parte II', '1900', 'Francis Ford Coppola', 'http://www.caratulasylogos.com/sites/default/files/el_padrino_parte_ii.jpg', 0, 'Continuación de la historia de los Corleone por medio de dos historias paralelas: la elección de Michael Corleone como jefe de los negocios familiares y los orígenes del patriarca, el ya fallecido Don Vito, primero en Sicilia y luego en Estados Unidos, donde, empezando desde abajo, llegó a ser un poderosísimo jefe de la mafia de Nueva York.', '2019-01-10 19:48:27', '2019-01-24 18:41:43'),
(3, 'La lista de Schindler', '1994', 'Steven Spielberg', 'http://ia.media-imdb.com/images/M/MV5BMzMwMTM4MDU2N15BMl5BanBnXkFtZTgwMzQ0MjMxMDE@._V1_SX214_AL_.jpg', 0, 'Segunda Guerra Mundial (1939-1945). Oskar Schindler (Liam Neeson), un hombre de enorme astucia y talento para las relaciones públicas, organiza un ambicioso plan para ganarse la simpatía de los nazis. Después de la invasión de Polonia por los alemanes (1939), consigue, gracias a sus relaciones con los nazis, la propiedad de una fábrica de Cracovia. Allí emplea a cientos de operarios judíos, cuya explotación le hace prosperar rápidamente. Su gerente (Ben Kingsley), también judío, es el verdadero director en la sombra, pues Schindler carece completamente de conocimientos para dirigir una empresa.', '2019-01-10 19:48:27', '2019-02-04 17:29:32'),
(4, 'Pulp Fiction', '1994', 'Quentin Tarantino', 'http://ia.media-imdb.com/images/M/MV5BMjE0ODk2NjczOV5BMl5BanBnXkFtZTYwNDQ0NDg4._V1_SY317_CR4,0,214,317_AL_.jpg', 1, 'Jules y Vincent, dos asesinos a sueldo con muy pocas luces, trabajan para Marsellus Wallace. Vincent le confiesa a Jules que Marsellus le ha pedido que cuide de Mia, su mujer. Jules le recomienda prudencia porque es muy peligroso sobrepasarse con la novia del jefe. Cuando llega la hora de trabajar, ambos deben ponerse manos a la obra. Su misión: recuperar un misterioso maletín. ', '2019-01-10 19:48:27', '2019-01-10 19:48:27'),
(5, 'Cadena perpetua', '1994', 'Frank Darabont', 'http://ia.media-imdb.com/images/M/MV5BODU4MjU4NjIwNl5BMl5BanBnXkFtZTgwMDU2MjEyMDE@._V1_SX214_AL_.jpg', 1, 'Acusado del asesinato de su mujer, Andrew Dufresne (Tim Robbins), tras ser condenado a cadena perpetua, es enviado a la cárcel de Shawshank. Con el paso de los años conseguirá ganarse la confianza del director del centro y el respeto de sus compañeros de prisión, especialmente de Red (Morgan Freeman), el jefe de la mafia de los sobornos.', '2019-01-10 19:48:27', '2019-01-10 19:48:27'),
(6, 'El golpe', '1973', 'George Roy Hill', 'https://static.fnac-static.com/multimedia/Images/ES/NR/ce/8a/00/35534/1540-1.jpg', 0, 'Chicago, años treinta. Redford y Newman son dos timadores que deciden vengar la muerte de un viejo y querido colega, asesinado por orden de un poderoso gángster (Robert Shaw). Para ello urdirán un ingenioso y complicado plan con la ayuda de todos sus amigos y conocidos.', '2019-01-10 19:48:27', '2019-01-10 19:48:27'),
(25, 'La vida es bella', '1997', 'Roberto Benigni', 'https://images-na.ssl-images-amazon.com/images/I/51iggHFltnL.jpg', 1, 'En 1939, a punto de estallar la Segunda Guerra Mundial (1939-1945), el extravagante Guido llega a Arezzo (Toscana) con la intención de abrir una librería. Allí conoce a Dora y, a pesar de que es la prometida del fascista Ferruccio, se casa con ella y tiene un hijo. Al estallar la guerra, los tres son internados en un campo de exterminio, donde Guido hará lo imposible para hacer creer a su hijo que la terrible situación que están padeciendo es tan sólo un juego.', '2019-01-11 15:36:16', '2019-01-11 15:36:16'),
(26, 'Uno de los nuestros', '1990', 'Martin Scorsese', 'https://images-na.ssl-images-amazon.com/images/I/51vLLaqn8dL._SY445_.jpg', 0, 'Henry Hill, hijo de padre irlandés y madre siciliana, vive en Brooklyn y se siente fascinado por la vida que llevan los gángsters de su barrio, donde la mayoría de los vecinos son inmigrantes. Paul Cicero, el patriarca de la familia Pauline, es el protector del barrio. A los trece años, Henry decide abandonar la escuela y entrar a formar parte de la organización mafiosa como chico de los recados; muy pronto se gana la confianza de sus jefes, gracias a lo cual irá subiendo de categoría. ', '2019-01-11 15:36:16', '2019-01-11 15:36:16'),
(27, 'Alguien voló sobre el nido del cuco', '1975', 'Milos Forman', 'http://ia.media-imdb.com/images/M/MV5BMTk5OTA4NTc0NF5BMl5BanBnXkFtZTcwNzI5Mzg3OA@@._V1_SY317_CR12,0,214,317_AL_.jpg', 0, 'Randle McMurphy (Jack Nicholson), un hombre condenado por asalto, y un espíritu libre que vive contracorriente, es recluido en un hospital psiquiátrico. La inflexible disciplina del centro acentúa su contagiosa tendencia al desorden, que acabará desencadenando una guerra entre los pacientes y el personal de la clínica con la fría y severa enfermera Ratched (Louise Fletcher) a la cabeza. La suerte de cada paciente del pabellón está en juego.', '2019-01-11 15:36:16', '2019-01-11 15:36:16'),
(28, 'American History X', '1998', 'Tony Kaye', 'http://ia.media-imdb.com/images/M/MV5BMjMzNDUwNTIyMF5BMl5BanBnXkFtZTcwNjMwNDg3OA@@._V1_SY317_CR17,0,214,317_AL_.jpg', 0, 'Derek (Edward Norton), un joven \"skin head\" californiano de ideología neonazi, fue encarcelado por asesinar a un negro que pretendía robarle su furgoneta. Cuando sale de prisión y regresa a su barrio dispuesto a alejarse del mundo de la violencia, se encuentra con que su hermano pequeño (Edward Furlong), para quien Derek es el modelo a seguir, sigue el mismo camino que a él lo condujo a la cárcel.', '2019-01-11 15:36:16', '2019-01-11 15:36:16'),
(29, 'Sin perdón', '1992', 'Clint Eastwood', 'https://images-na.ssl-images-amazon.com/images/I/61ELZIraHbL._SY679_.jpg', 0, 'William Munny (Clint Eastwood) es un pistolero retirado, viudo y padre de familia, que tiene dificultades económicas para sacar adelante a su hijos. Su única salida es hacer un último trabajo. En compañía de un viejo colega (Morgan Freeman) y de un joven inexperto (Jaimz Woolvett), Munny tendrá que matar a dos hombres que cortaron la cara a una prostituta.', '2019-01-11 15:36:16', '2019-01-11 15:36:16'),
(30, 'El precio del poder', '1983', 'Brian De Palma', 'http://ia.media-imdb.com/images/M/MV5BMjAzOTM4MzEwNl5BMl5BanBnXkFtZTgwMzU1OTc1MDE@._V1_SX214_AL_.jpg', 0, 'Tony Montana es un emigrante cubano frío y sanguinario que se instala en Miami con el propósito de convertirse en un gángster importante. Con la colaboración de su amigo Manny Rivera inicia una fulgurante carrera delictiva con el objetivo de acceder a la cúpula de una organización de narcos.', '2019-01-11 15:36:16', '2019-01-11 15:36:16'),
(31, 'El pianista', '2002', 'Roman Polanski', 'http://ia.media-imdb.com/images/M/MV5BMTc4OTkyOTA3OF5BMl5BanBnXkFtZTYwMDIxNjk5._V1_SX214_AL_.jpg', 1, 'Wladyslaw Szpilman, un brillante pianista polaco de origen judío, vive con su familia en el ghetto de Varsovia. Cuando, en 1939, los alemanes invaden Polonia, consigue evitar la deportación gracias a la ayuda de algunos amigos. Pero tendrá que vivir escondido y completamente aislado durante mucho tiempo, y para sobrevivir tendrá que afrontar constantes peligros.', '2019-01-11 15:36:16', '2019-01-11 15:36:16'),
(32, 'Seven', '1994', 'David Fincher', 'https://static.posters.cz/image/750/poster/seven-movie-i13562.jpg', 0, 'El veterano teniente Somerset (Morgan Freeman), del departamento de homicidios, está a punto de jubilarse y ser reemplazado por el ambicioso e impulsivo detective David Mills (Brad Pitt). Ambos tendrán que colaborar en la resolución de una serie de asesinatos cometidos por un psicópata que toma como base la relación de los siete pecados capitales: gula, pereza, soberbia, avaricia, envidia, lujuria e ira. Los cuerpos de las víctimas, sobre los que el asesino se ensaña de manera impúdica, se convertirán para los policías en un enigma que les obligará a viajar al horror y la barbarie más absoluta.', '2019-01-11 15:36:16', '2019-01-28 17:56:21'),
(33, 'El silencio de los corderos', '1991', 'Jonathan Demme', 'http://ia.media-imdb.com/images/M/MV5BMTQ2NzkzMDI4OF5BMl5BanBnXkFtZTcwMDA0NzE1NA@@._V1_SX214_AL_.jpg', 0, 'El FBI busca a \"Buffalo Bill\", un asesino en serie que mata a sus víctimas, todas adolescentes, después de prepararlas minuciosamente y arrancarles la piel. Para poder atraparlo recurren a Clarice Starling, una brillante licenciada universitaria, experta en conductas psicópatas, que aspira a formar parte del FBI. Siguiendo las instrucciones de su jefe, Jack Crawford, Clarice visita la cárcel de alta seguridad donde el gobierno mantiene encerrado a Hannibal Lecter, antiguo psicoanalista y asesino, dotado de una inteligencia superior a la normal. Su misión será intentar sacarle información sobre los patrones de conducta de \"Buffalo Bill\".', '2019-01-11 15:36:16', '2019-01-11 15:36:16'),
(34, 'La naranja mecánica', '1971', 'Stanley Kubrick', 'http://ia.media-imdb.com/images/M/MV5BMTY3MjM1Mzc4N15BMl5BanBnXkFtZTgwODM0NzAxMDE@._V1_SY317_CR0,0,214,317_AL_.jpg', 0, 'Gran Bretaña, en un futuro indeterminado. Alex (Malcolm McDowell) es un joven muy agresivo que tiene dos pasiones: la violencia desaforada y Beethoven. Es el jefe de la banda de los drugos, que dan rienda suelta a sus instintos más salvajes apaleando, violando y aterrorizando a la población. Cuando esa escalada de terror llega hasta el asesinato, Alex es detenido y, en prisión, se someterá voluntariamente a una innovadora experiencia de reeducación que pretende anular drásticamente cualquier atisbo de conducta antisocial.', '2019-01-11 15:36:16', '2019-01-11 15:36:16'),
(35, 'La chaqueta metálica', '1987', 'Stanley Kubrick', 'https://images-na.ssl-images-amazon.com/images/I/5130SZS3CxL._SY450_.jpg', 1, 'Un grupo de reclutas se prepara en Parish Island, centro de entrenamiento de la marina norteamericana. Allí está el sargento Hartman, duro e implacable, cuya única misión en la vida es endurecer el cuerpo y el alma de los novatos, para que puedan defenderse del enemigo. Pero no todos los jóvenes están preparados para soportar sus métodos. ', '2019-01-11 15:36:16', '2019-01-11 15:36:16'),
(36, 'Blade Runner', '1982', 'Ridley Scott', 'https://images-na.ssl-images-amazon.com/images/I/61EVlwySk%2BL.jpg', 1, 'A principios del siglo XXI, la poderosa Tyrell Corporation creó, gracias a los avances de la ingeniería genética, un robot llamado Nexus 6, un ser virtualmente idéntico al hombre pero superior a él en fuerza y agilidad, al que se dio el nombre de Replicante. Estos robots trabajaban como esclavos en las colonias exteriores de la Tierra. Después de la sangrienta rebelión de un equipo de Nexus-6, los Replicantes fueron desterrados de la Tierra. Brigadas especiales de policía, los Blade Runners, tenían órdenes de matar a todos los que no hubieran acatado la condena. Pero a esto no se le llamaba ejecución, se le llamaba \"retiro\". ', '2019-01-11 15:36:16', '2019-01-11 15:36:16'),
(37, 'Taxi Driver', '1976', 'Martin Scorsese', 'https://imgc.allpostersimages.com/img/print/u-g-Q12OXAB0.jpg?w=338&h=450', 0, 'Para sobrellevar el insomnio crónico que sufre desde su regreso de Vietnam, Travis Bickle (Robert De Niro) trabaja como taxista nocturno en Nueva York. Es un hombre insociable que apenas tiene contacto con los demás, se pasa los días en el cine y vive prendado de Betsy (Cybill Shepherd), una atractiva rubia que trabaja como voluntaria en una campaña política. Pero lo que realmente obsesiona a Travis es comprobar cómo la violencia, la sordidez y la desolación dominan la ciudad. Y un día decide pasar a la acción.', '2019-01-11 15:36:16', '2019-01-21 17:27:14'),
(38, 'El club de la lucha', '1999', 'David Fincher', 'https://mm3.vistoenpantalla.com/imagenes-productos/poster2-large2.jpg', 1, 'Un joven hastiado de su gris y monótona vida lucha contra el insomnio. En un viaje en avión conoce a un carismático vendedor de jabón que sostiene una teoría muy particular: el perfeccionismo es cosa de gentes débiles; sólo la autodestrucción hace que la vida merezca la pena. Ambos deciden entonces fundar un club secreto de lucha, donde poder descargar sus frustaciones y su ira, que tendrá un éxito arrollador.', '2019-01-11 15:36:16', '2019-01-11 15:36:16');

-- --------------------------------------------------------

--
-- Estructura de la taula `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bolcament de dades per a la taula `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Adrian', 'avalera@gmail.com', NULL, '$2y$10$jVqeoTAFlYDrk1HdltwxMOy1RvIiIWHUQnwmxnK1cWxVvFSWCSiRS', 'K9GbM3xp1kN7KwP8r4zLmPfiqmMJ3p6uCYYjd3mrDfO84fwu0LD343g1lXdU', '2019-01-16 14:47:58', '2019-01-16 14:47:58'),
(4, 'Paco', 'pMartinez@gmail.com', NULL, '$2y$10$se92qbALBV/lp.b9AYN40u8903KiE4lNQ1tPnnOj0Xgx4VKEmgZAG', NULL, '2019-01-16 14:47:58', '2019-01-16 14:47:58');

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índexs per a la taula `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la taula `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT per la taula `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
