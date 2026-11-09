-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: mysql_db
-- Tiempo de generación: 21-01-2026 a las 10:53:36
-- Versión del servidor: 8.3.0
-- Versión de PHP: 8.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canciones`
--

CREATE TABLE `canciones` (
  `id` int NOT NULL,
  `archivo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `LISTAS_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `canciones`
--

INSERT INTO `canciones` (`id`, `archivo`, `LISTAS_id`) VALUES
(856, 'Lu Decker - Tiempo Perdido (Videoclip Oficial).mp3', 208),
(857, 'Sin-querer-yt1s-dot-lol-84667.mp3', 208),
(876, 'Lu Decker - Tiempo Perdido (Videoclip Oficial).mp3', 224),
(881, 'Emilia - IConic.mp3 (Letra_Lyrics)-(480p).mp3', 226),
(883, 'Sin-querer-yt1s-dot-lol-84667.mp3', 226),
(886, 'Full Romance (Video Oficial).mp3', 224),
(887, 'Emilia - IConic.mp3 (Letra_Lyrics)-(480p).mp3', 224),
(888, 'Deep Emotion - Don t Go There [Audio Visualizer].mp3', 224),
(889, 'Tove Lo - Grapefruit (Official Music Video) (320).mp3', 224),
(890, 'Lu Decker - Tiempo Perdido (Videoclip Oficial).mp3', 226),
(892, 'Deepside Deejays - Zummer ZU (Vara asta este ZU).mp3', 224),
(893, 'Deep Emotion - Don t Go There [Audio Visualizer].mp3', 224);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contraseñas`
--

CREATE TABLE `contraseñas` (
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `token` varchar(900) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `contraseñas`
--

INSERT INTO `contraseñas` (`email`, `token`) VALUES
('fran@gmail.com', '82e22631db92552da3db351856325bde49e445dc60d68b1ecf7a20960b9d1ce4d86ffe8e12e41729c8a4183bcd8afff05353'),
('franjccrespo@gmail.com', 'cbf75ac370b143c55b6c7b4e962f6ed089282d47b9f46ef3d517c329d478f0c1d5c52f80fa4c15bc33bee877ddd2a470d51b'),
('franjccrespo@gmail.com', '3072b0c89d6d0d34e7f77abe968954bcfac5cf5550d0ed184ce8e80df3c72f156f65172a3fe738500f494bd05d01866dbaf6'),
('franjccrespo@gmail.com', 'c69562ef9061c2daf555da5adc4e04e2c30db94040a7de8606a06dd8eebba925b4e8e2f1b0fa4ce24e9d1847d10a0f5d563b'),
('franjccrespo@gmail.com', 'ecd92f99445bbb01b6990a08594c4a1f784f1e2078a0bd86a547c8f42804bd517023d21fddf353aebea7aad13451133b8cc1'),
('franjccrespo@gmail.com', '4798031b377633077db7d6ab4d2381574601bf3024a640610a4e62bdcaaeb47fdc8467af369a7591eda55af964372389f841'),
('franjccrespo@gmail.com', '2a48173ba077f78d7cb71e8c20eb5107f565d88e1b6d124b57ccc5f2c99f2bc5fe1a8c306b7164dd518379878cb6d025b21a'),
('franjccrespo@gmail.com', '8aea887a941bdecffa370fed6c611d8b12b58c294ee23bab0a180ad197faeeddca29104236d7cdcccf92635c32c6a6e8f68b'),
('franjccrespo@gmail.com', '2b508e0d5a5a3b424aa5f03c011b8bc30bd76b8044bded9dc4d9c7320335b7dd0c0e3470e808d605e084d167bf1f72153111'),
('franjccrespo@gmail.com', '1a2a18e56777a4763a772d871bdb79c68cc19ef368f622a474863224c38ae92045d91e0cf634d929a9f5303e5308ef93543a'),
('franjccrespo@gmail.com', 'a74b7018bd22fee034ba5695de8c69f8471b3b73a4cd55a0fa678286355fc3ddf1615c5e89c08cf119d7d0d72a7c970d99b0'),
('franjccrespo@gmail.com', '4fd6a1a3d879b4c66c22155f4128ec877fc1ee8dd499af2dbb9474404c4cc54e15d92be5f0a14f1dd15ad53ef046f5092556'),
('franjccrespo@gmail.com', '259a163accf549c207482c12f0eebabb93945b34eef12c870da640374239f6ffe2ed9ec55ef7609195fb68eec7baac366241'),
('franjccrespo@gmail.com', '9b6f5f331970924bbf49dde2320f6eab16ade088aa562c94d8d6551c93992e3903e2ffb3333b56ac5b383448bc4bc8558cbe'),
('franjccrespo@gmail.com', 'c1c48cf6e7b81de90fc3e8b37f7618eb548246f35bf3f32b12876fca58fa1f20716b1ccfe2e5c5d614b2c9b5e1f448c21e85'),
('franjccrespo@gmail.com', '3c77147ed324881bd461dd10246a72741a87a081934fcf389c081d73b7682f6d16ebfcb1011ee1755d66516851f23c67a467'),
('franjccrespo@gmail.com', 'b0fcdfb72e21092b6656c2fce5723250e69958b6feb120308f2dac08a1e649969d644ec4f5ccfea642bb5e5099e58e44d9ce'),
('franjccrespo@gmail.com', 'a9c4f9ed8a126206d0a5a94258a58dc9ac39d98c8df9df6d4da30d307d9954be8a722994539002d561182834e960a8505ebf'),
('franjccrespo@gmail.com', '1d4baaafae4ab1221c3edd820b9f5c07553c544c98d938823613028a1b760f393051790218a39f1b1f1f479f20f8cacda768'),
('franjccrespo@gmail.com', '77659aeb14a132885b5ebc0ebf1a69bb1cb403ac3381e652421da46021ba83d7db71f2bf6c4002cebd37e1df3eafea69b69f'),
('franjccrespo@gmail.com', 'a9fa210b11e969897922ee69c595e08c0c8b852845da84f17bfe68bcfa79e28232d8d57b213aad2a86a20b3798295be336ab'),
('franjccrespo@gmail.com', '51ddaf08205fef7a649b3f56626ccd7e286ca4bb860bc079fbea25ffab71516a2ce80a56e24569ef4daacae254a1544e2b95'),
('franjccrespo@gmail.com', '7dc5228c9aa9da1c7f13415ae07d0d887018876cb3cd467244a328d63c96bf59501285227e1af44f4d3cb2fc515dbc4ba8a8'),
('franjccrespo@gmail.com', '7a03b86ead90505d4d07df227d76274306e299de7c7b7968bf16ee808918f018ea11520b99ad040f703f04808241f9878d4d'),
('franjccrespo@gmail.com', '6dfd50475e5d2b17bcaf3628695bc8be02708ea17e4ca758ac0831ac0ffcb52970a516afad14aacf8f33f81bfbe6295e01b7'),
('franjccrespo@gmail.com', '35de6ec9d118f77a41e1b4d8ecbea208ffa558468b418c8c1913fe0dd70c13ee5877a2a8c59d81070485a35f728b878600db'),
('franjccrespo@gmail.com', '9436c24d8597584b88dab4dd68d5a3f4df162099d9db11ca5c8139cbd804347eccf25e97541de29f1edeb6fa4ab5e83eea82'),
('franjccrespo@gmail.com', 'c474642b2d4b6f7fde74b18e49997dc64373dd82469ff331be2267d888a1f5bff3130c889a988480ab74eeb827e1bfac879e'),
('franjccrespo@gmail.com', '4ae4854dc209c01b53b4d02fdfa245d86d6bb05164facd5d1bfeb2673b2d710de771d961e05115ff9445c154ba1469a24db0'),
('franjccrespo@gmail.com', '9db3ee76540e1538314591b864b8dd5010dc63812b852ee359f11e3bd5ba235de37b5a9434a32d040fb48b7bff1ba5ed8b40'),
('franjccrespo@gmail.com', '25da2927437e4f5ef081c05c11526810b264cb0b1bf6fbb16e6123fbc9c160ed59da480dad74fc8ca7cec94bd0a9a91ae855'),
('franjccrespo@gmail.com', '482479e5041552a8a13ffb429eb702412dba3677ffa34526cd65e9f5e34c29eddc1a5cbdaf3561939af278b9d8723ac15ed3'),
('franjccrespo@gmail.com', '5eb4ed266c10e7c170441f009b4d2c21a5a38212c8a39205cfebbcca5487a520d3b46f25b947fa94ec715540ba5a274ea18c'),
('franjccrespo@gmail.com', '4e3af0e9f015eb8df9826da348746fcdc3e4dff1785c1e5fcd0f47e953a0f5b02b06f213832912c230921ba5e5686babe009'),
('franjccrespo@gmail.com', 'a7f8437abd7573db45f6106e9b814e88f39da50e0247a7635f6ccd055c0da2202d213bc307526178cdf8e30dcb2996f9cdb5'),
('franjccrespo@gmail.com', 'e48b3ce8ea7e2bd6b446d5c1595693f636f34204aa17eafd275d4e54cedddea183238cd58ba4f1cc4e8f6242e84fb548cc8e'),
('franjccrespo@gmail.com', '38f8f357b1c6b30f3c782b99f5ccade7c072ba81b37403606fb8d5af85853334c381a2e87128e52b3a9f0bda1bc4fcb237e6'),
('franjccrespo@gmail.com', 'cb851c28826f852884e650fe30b1681c732d19fd7bf634d81bbf851132937e4b0ee16bcbe909d79607693358f989339aaecd'),
('franjccrespo@gmail.com', 'f40abbf2e38a28eb8e85078e4cd3f1481dd872010f7de90ff99ec1390212f22f9c6c1ad195f0751c1d5c141b6ea87a03720c'),
('franjccrespo@gmail.com', '23b9d441caa41e31a724e5cea9a012fd309ce579a5506e5e6ce34f628acf6187af7b2bfa354c86e18db17c4ac4664938f1f1'),
('franjccrespo@gmail.com', '3943629c415723b0a1798be316932078380d86787cf6647837d004175a3f95ad89f3c0e16be430b998cddb353ab237531d87'),
('franjccrespo@gmail.com', '27fd10345daeb8333ca510255688d5aadfc62b0d14a6c72f446477d18dd8f76b83273eb08ed308cabd0c86473b6e599c1302'),
('franjccrespo@gmail.com', '15c96a1dbd22c58fc2a0c37a374728a0e243223b05e01617b36472044f900e023f64ceac96512dfbd092739908563e29c625'),
('franjccrespo@gmail.com', '9164d4a8c48db87d414ff73447bda8358fd32d0ab07e6ad7b755f6338e9967cabe0301b54c1b4d6d00f4bbe095ce56356844'),
('fran@hotmail.es', 'a76c1fb8ec1864dedea11f73e7625123e330bf305f2403297a1f76aa838842e02906eda575ff32d5ac067b35f03fea66894f'),
('fran@hotmail.es', '1be581f98efd76da8451a3d669f83907483403aa8001223f75a1688787755e7266723083159458807240b244344940b4324e'),
('fran@hotmail.es', 'a69da60bfdb821b4097808cb1f2e29ef0180cff0cd171135f5f02b8e8de6d923216854eac4007e81f734bb553e45ffdd18e7'),
('fran@hotmail.es', '07311d56badb637f37d3c8c7033455f2b807f80f909ff25b1a679ce4556d074c7d942a98393a5f818cd3692f0cfed5ed9f1b'),
('fran@hotmail.es', '2c649a58c840102015612f1a2591ee18cd37de3fb8fae7fe164d99c88ad2dd13dc3a12cbbfafbead31109946a450ca7d9eb8'),
('fran@hotmail.es', 'e962c5f2e67133e56e276eb3a526d32f1c43c616012aa705ea1401f20ac121015d3e19b70201ca452b0db5241f50d1836c5a'),
('fran@hotmail.es', '7c82f7d9b942d02e7e31bb2bd0a3029df5a8431ce2b09d7e371ed89a4805084cfc26cc115b9f8f1423fe92f3d569f5e51b5a'),
('fran@hotmail.es', 'fa4b55837d6bd702b339daf7f818b62681bfd80b7d6572bd37ed20c8d5ffa0c4c6c1896d67acb514520d2604f2eb750c189b'),
('fran@hotmail.es', '0cb846f4ea69c598f917eb2f100d76dfd7217d6be350164f57c3e9772b367977f7b704ba8b278a86f560264c0e44ea201ccd'),
('fran@hotmail.es', '6c4c71fd8b0efb789eb06fe28e68c8c5c0840943371de3d09dea0ad0f722b6b19d2a2c4bb71bef529f7d1da2e65827013824'),
('fran@gmail.com', '4afa8d5d2dc4bb816f625670d772727693b38558209c2bab97d21bc422a1c0ba7f00f10b79eadc880df08c2e3cc93cee855e'),
('fran@gmail.com', '895e4b15c202a319f777698a0a1188f637cf4e5c6cda02069072f9f16ab6167f6908f957fdb334d252471a1479d1139b377a'),
('fran@gmail.com', '83f38043d466d47303dd61bf38b0510fc6e12e4fb18be4d7bbeff9e664d591c93d48583b60e8785e7de8e4978e24eb1650a6'),
('fran@gmail.com', 'b7db8a93caa73cc12acd019133c3ca7cddd438320b32d651cd7ae694db79d4d9c8ad7721c6347e148a26c08cb9057f29de7b'),
('fran@gmail.com', '6ee6bcae32a610158d1a3112221cb64be638e16fc6ce9c9f24952e5d92e18a24568dcedff2b2f9726fe0907060a36cc05a38'),
('fran@gmail.com', '0d492fae16264cca3d8a072a29d0de75b885e6ebe4910637545186a5a3acf12df6da35e0681865bd6d8c32b9b2fb8a4203bc'),
('fran@gmail.com', '4b36547964807e5f7b39707d8ac2be37e249fd6f56b041fc0df094ec941267527e4959e10c7a49d270bfb6891168038275d5'),
('fran@gmail.com', '37d2894ba6d69cd77b20aabe76677abb5e5593bba97435bee250155550f5f5c30f873ddff410b9494b73ce8847d93454ebf0'),
('fran@gmail.com', '612549828449abf78d9ee19c717b59cb4cc8da3e08e48ddb93d041de24710ec3ba4374a92e530fe7fb3aa631343da4a66d76'),
('fran@gmail.com', 'ca195182819ccf94f4fe40a3911bdd61790c795bc4473c9483bdc158c64c5cd137a9d646ae669ad6ea32a2b21cd486e6ef6e'),
('fran@gmail.com', '7d8f294c54ffd817ef8995d778cf77d94d6c4ddd54674ba83c977287abfc9690ffa0d17e879655e0605905eba7dd4c4d6ba5'),
('', 'b53a34581c821a7ac6b5d155c1da434a307485e243dabb5f5c5af17ad4c461c33f49ae8ecdcb12b733e4c0b537048f961e3b'),
('', '01d2d388b15b90c0c5295d719bc817d01d632bc88ea1dc821521c38d34e4180315468d36964ca751a00adf82975a5eff9976'),
('fran@gmail.com', 'c5765446585cf992a5fffd220a9afab92b08731d4a34961a87aaf0054cfe0ec10589e9678367a84abd386682fa99f173dfd8'),
('fran@gmail.com', '1345984f800b25abf9662a5217cc348cddfabe90a887b95e56e86f40c76ff2fca12181689d71aebcfa0c069404d980a77edc'),
('fran@gmail.com', '8a8f041eda90403a03afe36d738746e7081c683631fcdda919732139ee2e5fe9c71fd243f0ea87f96c79fbd8b7accc993e9d'),
('fran@gmail.com', 'dbae4bad527f0d3f8331c7579f47f6d54fc5480f7667348dd40ca281e1119c5cd0a419b69c93ab303b8e543a8c464305245e'),
('fran@gmail.com', 'fb4d23b1e93c4f953a1680f9d54454574f2cca37d323053f19e512034b840e05056f8cbd6f0f3886323e98bd24885c3318f8'),
('fran@gmail.com', '939ee3149bcd9cb9be0a66ed72481a5db5636d7a077a18d8f94da3bda788a3b5c6c5a7fe83b54c576784bfb464ac14a8a9ad'),
('fran@gmail.com', '9a124193832bf0ddaecd99fc9238048c4d2df341de28ddc11d8d4be91698b2172e340911e016d2f5899ec3014c7c265e2f50'),
('fran@gmail.com', '574d04eb312b5e6c5a4cce8964ea49d1df2446921e1ecbe988bcf9ddd0cba46259051978f5b487214962a2a99e991577f150'),
('fran@gmail.com', '45587aa240570e7620acc52020099ce1c36bd53f1acb7b29e9844eee7a104b92150bd7e58f3ecf47904c13804f45f2a759a3'),
('fran@gmail.com', 'ca9ed381533397093fc31aa501f6d90cc37e04fde5f82b0180fd28a9f29604db1fdfaff79a8e19dbf7622c5d03aecb57bd45'),
('fran@gmail.com', '401143c68f5cbd7282b9c3b936b5751f1f4f74dd426b2f320fdf9ae5c25dc31232f56ffdd61338368696bb5dd1305caba121'),
('fran@gmail.com', 'a0f68ce8ded82a2737a57946eb234b8058b22effaa5ef4d92ba39a68bf990fa6a128ea2a672030961033e8d0263ecc8b7afe'),
('', '47a1500e4cdf155afbbcee8b781b0063f061d723edf2764e25fe1e475a9c5d2b6fa30943fdd7d8e255ce0eafe2b4479234ff'),
('fran@gmail.com', '8de24eb0763b364d4a6f852dc5c2a74548820526bf5f4ce5ed9e21ac3adc9f575b2f6e06e5d5dd96c52d245ef4f479ccc40a'),
('fran@gmail.com', 'bfe1629d8c9dd02ce93f239e0e5a059933d1b2f75ac694f40cb60b54e0d4b4b60e983129ee9116804f5bc1dad916ca83dc93'),
('fran@gmail.com', 'c834607c0afe07aa3d952290a0c5f97cf1677d3bca84811d6383cefd12ea3a78ab3ab99d46028b290ea05cb4f629bce27a6b'),
('franjccrespo@gmail.com', 'd32c006dd4e76a0836313f7f5d9d245bad5d4f6c0b26c4e9a2af08e49e45ae03d3175399db0e40541d8ab5f2d492ed0af9f5'),
('franjccrespo@gmail.com', '4fa801e09dc198bfa610cee1afad898f741ac28d4faa6220e43f80615a0081880e0a68480cb5080b1afa883753974215df3e'),
('franjccrespo@gmail.com', 'be74d2bbb4ad96273d89b486fb974a289d005d37ce2fddcc51b024090d20cf65d21add9b0582cbfa406c3db5f5e9c0093f3b'),
('franjccrespo@gmail.com', '62728cd049db42a70dfdfd8c0d501b406892ae740a89771763f5935f7a86745a3408e2e43c2cf1fe6c5a6ba1eab035b330e0'),
('fran@gmail.com', '43dda513c4ad8de4b2dbd2a32efae7259e19bebc78bfb7d4c9a851fea2cba82893624cf77e25aecc546b537614437b02f432'),
('fran@gmail.com', '70926b9d243566086e311e46853fefa929b5810afac9344511a13df343ed70a5d005fea3a074cf7cce4a642f0de9240ad48c'),
('fran@gmail.com', '2f1d28e20bd63edd3a82f61ed1ef258d60f66fc96f7c88111866d1c1a806ec32b2a6daf129e91e10c8f05b469753df7242cf'),
('fran@gmail.com', 'd4f2f6aabaa689d5368bdeca3f367d59bff65e58d1d6487386225e5be593691e29ae6792100b3b483110eea2516701904eb6'),
('fran@gmail.com', 'cd4b82d3cf89ed9bbd7a88b70e7009868041f3f13202cd0566c3aa12b4c9d354b4f5278a03c16ff15b2a7c0945ee33003c05'),
('fran@gmail.com', '14e5a54ebeec9ceee53f57f1ffd30e524c6b36d4c0752b6c28c43858fe414816074394dda8e2f1d328ee7027d0fd744908c0'),
('fran@gmail.com', '09e91859ea85ec5fb769f1972d1997dae18c45294e59d5a552d118fb3bb59e19001a495f1ba99bfad27b72562d5c46f7257d'),
('fran@gmail.com', '9a99855184f8777c6e76806898ee53604ceb3bca409b9bf524a6feb66e289d2bc5e863dc257023ff698598dfb9dff1374836'),
('fran@gmail.com', '4d73ee75422f82f9d8b8e4f9503b58919bcc6c456e2bc11e99480f7290f9d13cc49b6f83e606835716b655b833da360ee951'),
('fran@gmail.com', '829a3c714e63f362043f8eed8d2f8f06fb70ceebba98aa4b09a0659cc0b7fd51b7052035c5ff26b7086b81f00dcd88937c2a'),
('fran@gmail.com', '856ab6b32a0bb4e2c4d80b6d77e7da6789d9d1fe3e38ca8bb87046b94181bc29fd853968dbc5124d6d120582c87af2b13b39'),
('fran@gmail.com', 'a6339d45ee9f0063ac584230752464a9970b0fe6a6c4108961ed12506c10cd4a4e7d435573308d601e617ac7f55733af5b92'),
('fran@gmail.com', 'bf338396e3e1fbac727b4e9bf31a9b4a6df2e8e99052277bea0152be06d3834b44d79b059736eb31e764e5ba9bfdd46e8634'),
('fran@gmail.com', '1af5cd9e0d7da695c7249a06093195a135e1e05972a9c5fff0873543a730aa522f123bc80fc94e8926d75e94c022a0084f1c'),
('fran@gmail.com', 'f4998bc3fc5b60ec477ae9e72bfafd97af9c247c7d09827b3fa9b036d4bdd934bcf9e1102d4ec0ddd1ed0742b0ae0f816f05'),
('fran@gmail.com', '09c2708b8c1c2eaa421d1bd365786ab201c248195512198779ee57004cfad1f90245d17f75332ffc7f0ae620929bc91eeab3'),
('fran@gmail.com', 'e45b8ed016f3e05b7ddfeff1ff7de9a9cdee020f0dae4e9cbaf4493b2dc70147b024a2f39b0ba8a22a96886c74cfae2ac68b'),
('fran@gmail.com', '31f8b09071708a48f7298fbeeccc423f26a05f619b9a43616e428407d4474cfb67193dfb0d5c9ea5a37cdb0b1bd89d7ffc07'),
('fran@gmail.com', 'ab0374bab6c282c798ff99b659ca3d88554eb9ee09db118349c819920bd9b6a1ef2c138df4443899574260767681cc33a903'),
('fran@gmail.com', '3383786ec6105a703374cf95f9381a93c429e70d0c9baa8327bbc9b99768ac05ef2282909a53d4c3b15ca4a33cab96286105'),
('fran@gmail.com', '0e361f2e29172af07473c8790824bb395097063c296e2a7fbce84cc6683dbcbc109211000218ddbe5832664f207dcaeb9aeb'),
('fran@gmail.com', 'cb4d905a30995221c6306d0fb8b555f38cbed7535392f5f1af5d7e54a516a1d17da46ed859cc55f7fab9cca2d3145484457d'),
('fran@gmail.com', '89eb4d50c73600f948e7cb379b5109112ed8cbd9f83e644554102035777afe433a827a63dfc8b7ee73c362c01064503afbda'),
('fran@gmail.com', '7670d9175ee08febb71e999692669dc7d588dcb54443761754cc114bb4a4e7a2ba0339c75efcbb4d2400f2bc3e06469ac73e'),
('fran@gmail.com', 'abbf568683fb1078ce1eabdbd2798806a65469e126725a39071cad68396f0da8c2b757c380e5c59bb54f54817256e87bc1e2'),
('fran@gmail.com', 'c6cf7d5db7ae78d26296e2271fd57446e4105d60816d277d3507bcc08cbaf33ed82d135d13bd86949d397fd8a76eb5890c62'),
('fran@gmail.com', '4284a83f7c2085eb72f7b8ee27356dacb9c545438b1130eea605c0aa95852ea55df7646c921f8c648a8eca850500d31af1a8'),
('fran@gmail.com', 'c7bbbb404d0342bbcc984cd473fcc4cf2f67e2eaa3d00d5b2e18d80a0bdf4eb813b301396299bb20d59a0b2992614156f55d'),
('fran@gmail.com', 'c68adab54cd1c01a615a44ae624ccc1dba8b0bbef4941fa88244ac8ba68bbc9b23ab6953c68637ea6dd86b90158baf6f2d4f'),
('fran@gmail.com', 'e1548690e55a6bd14cbca712f78a9dc6fceaf18ebd6ee2fb86695c2a377fba676d4c4045fbb7afe9ce2bf6977c6421f2138d'),
('fran@gmail.com', '0b47fe5f9b17c561d4ebdf01bf65ef679055ef7c79318d2391b50739fadccee6a6f019d8d79747c878f96091031b2e340de2'),
('fran@gmail.com', '9353d7b9a392a26ea3d5a5a905fdaf5bcc5501a83bf5958937bd6b117a373662b8bbe75eedc04f0c5c3c62bcafe5c4bec486'),
('fran@gmail.com', '49ca8c223d0cd185a1562d9830c36679397ce48017617bdc80e8ba18597ed7c6a3c49a55e7a792c91943001f56ad34e40f35'),
('fran@gmail.com', 'b58ea15d3d7f916e5c469410d66a82a1b542a5cd7e7479fbb97818a5bce1df6da2383babc4cad612d2d5ac0226edf82f0a25'),
('fran@gmail.com', '5636c7360f7d9bd294f667f87c7ac745788b78793923aca0fb756aaede68c395ba598ab4e3983f358ef2260af944a3b56964'),
('fran@gmail.com', '989ddbd8246775471f04510410315413701e2220c0f94b2ef1234e1374f3759ef369d10956c44b00a3dbc0db01bf06e074d6'),
('fran@gmail.com', '8358183b77e2571178b03fc539613a6324eafef2e03aaeb1e5917073e4b9a692cbf083f014e4a9e85cc50340bac083cd693d'),
('fran@gmail.com', '29a4bc74181ca909c3a438252740fa5908126fafe6ee4c5c17603b3b26d0ccd9fe73c6e4c245b40e94e3dffc03b0f4dd9244'),
('fran@gmail.com', '499b20d6b32f8e7d2dc5dae241cd3da1bcd89c571a7bb694cf84faaf5bbe50d6bd1a2cc70e0ab11e7c7448efdd6d35501943'),
('fran@gmail.com', '252bca241d63b79803558dc5a5e939b26d6eb5351ee2d592a8354777fc1648a1d203a5c641e5b49d06cb6b6cdcbe421d5f0c'),
('fran@gmail.com', '24748f9968902c8f5ac38ddf29d2642a1956005c4411a972032d935866c165a51736a2a7da2de4cbdaaee660702469431685'),
('fran@gmail.com', 'beacc5b084c859f269323ea4bbf4a31ef352763ef0a6cbf914286b0eb0ad24c7b9f8e3f94a89a6901e8ed60ef453a4c2df90'),
('fran@gmail.com', '65da34aaf005d2eed30bbb7e21b550be78d6951e71c37ee3f671c524472d4e0d87d8e379e51800578aa821778c7ff757dcac'),
('fran@gmail.com', '860624538bbdb95eec1050bc0ab62f222107a15ed89414d20ebc093ef65bae34e60a8c026df7b71700f28e0f1c4438a76bea'),
('fran@gmail.com', 'efa08e10ce59df0bb68587f8519ee716ddf7aad8a366856a8341bdf292734cb2cd3cb2cf515352250a378bd750cd94c64941'),
('fran@gmail.com', '1b5b0bd8e96e195d3fccd86e2e89266c3ca68ce105dd2aefc3aac908ab9938a08d743a42c6bd945bb5670e896b95d8a7d113'),
('fran@gmail.com', '0eba6ed587bb5f04dc308264b81a5150ed54b38df3061484362ad989a7a761a1bdf5f50a60efff570ab515629719d9272342'),
('fran@gmail.com', '75df4fa7f5025f39e3605f682d413586cfef5e334ad38d367cce4277c1b160a7c16667ebb7573a589bb87fbe26e51c941bfe'),
('fran@gmail.com', 'b3d71fb762a7e74ab96f88e40271af583387f844cc60c0c1adce5d39596ca2dfeae9f7300e5671c71094dc997807036f0eb9'),
('fran@gmail.com', '59a9c61bd41a135e6f190972f9b96e0fc5fceb6386cebdb3e9322d25f2be029da0855907c7e9f132d0166b0894eef2cc59a7'),
('fran@gmail.com', 'daaaf533b48b23cb4aee8374664ebc158f3ee3c77e08cb3a2e8dd4b9f0e27ca7743f386df95045b0a60ecd120b7b990af47e'),
('fran@gmail.com', '46cbf45efcb5b380ad60af9caa1c1678e20477e7ae4ba56d0219d34c93659635abcccd72ab72fdd3832fa7398fd45148d352'),
('fran@gmail.com', 'd728dc16c117902d6aa6676d685ae45d1e23a719c078bdde05c93c5505d3de7241e04d6ed489899c4c4da35eeecf5a0e2139'),
('fran@gmail.com', '20b2de74eec0c33a5fa58d8a2fea7e7f334f1fea5502e90b049195338eeccf87263b03c0f21a258e50904c4e6d35c3f45b2c'),
('fran@gmail.com', '33567aaefc2b56dd8e01ae67e4e2670dc01fd625a026d44e192f58aeeb682e005597d20768d803d6dc4a53fe3a07aa39c975'),
('fran@gmail.com', '49f81ade7969009277ad6e8d945e59897040c8d5dffa50cb8b871840539db2e261c6835f751ff03a533fd28d3391e1d61597'),
('fran@gmail.com', 'b13ff9e6fd7955809bda65457518de0fd2a08b8946c1277ec77bf55b60949fbf35444b05d5c22df42a6fa8fc9afc9aeb1cf3'),
('fran@gmail.com', 'beff37743881899a60445459b2dc6a5af9956743751b19de94fecea62275f84e4a3c4f2e73f95d5344ba59863863b37bfab2'),
('fran@gmail.com', '69590cdd5bab55ede985b83235e939f950858dcd89f15bb67f91bccb8bc99033f4a68aabc00cc8cdf32290105f45e9815612'),
('fran@gmail.com', 'fdd183889bc4ada41c656fe95bdcfc3e84dfb0f62eb4267cd8da2a8f57d6a40656ced4c0675ad65f0f9550ad99edddf86a75'),
('fran@gmail.com', 'f1be9d051e3de92cd5aa6183d339ac4cca0e25357dc4710228d2eb32933e44e6db7b484e6920a3c9703603610f771ded83a4'),
('fran@gmail.com', 'd1b50c3492f2e611ff5effdbd7cf45ddf3610c60215e08691401b179fee5660398c57437822d8c633ee0e408d4d37953362d'),
('fran@gmail.com', '45ec3e5f6381d593aacedc12c7b10f226f5e66d4eb59099f9dbe21de3c1168d0d40f00fdb8817cbdaefc285f7e67d8eb7706'),
('fran@gmail.com', 'a7dca6b76520a941e4b0c90c48274a1871e6257e932714911fdfc890aca26c599444241f69ed0a0c225e711d5c03d75cd696'),
('fran@gmail.com', '7edcc79b2e21f7c1c91438abf4f0fb502d0c61a69cf9aa539de4b7dabe8c17f8dc32395e34574ac2d9a1272c9dddcbff9843'),
('fran@gmail.com', '3b3da92e8cb9f5e4ef760b5d8a5005912ac798351753f99e46f7b5ade9ed2e98cfc240ea8da7c45827e11b4bc5a1325f6ceb'),
('fran@gmail.com', 'aa142dd8dec192e090143f8cc294da1b620b9d201f1bc89111b974684a7b348e7b12a61aac3d22b7df8e67e0786e308ef57a'),
('fran@gmail.com', 'a425c0f690e045a13184a54359aee4a94277e2ed5394198f99b073188b763ad056b576d9ecaa7c4224d9b92e2ffb95b2cfa6'),
('fran@gmail.com', '6c410776a00b4a575e3ae765743e386c4383c75bc821b7da2c069643d9d40599dab44c16516b776c3236b737f39d3f44fdb3'),
('fran@gmail.com', '1ce76c46313f61e11eed074ef428e8a972117bd8e33b2bb1ef7d1f68375ea219920c31f76e24d2c60e5cf685404195c28bb9'),
('fran@gmail.com', '98e8e79292274e98755d0cc5b54f16e448dc697ff879c9634f57a1fbdab49f6d45bfbf5ffbe60a037b7b573d63bd472aa14d'),
('fran@gmail.com', 'f3d864be20977c03b976bfb04f57c3c47fd5c0e5b9c4004a7107c386b12c565969e9b534452fef95c80b1b56290adcc9aac3'),
('fran@gmail.com', 'fffe1d4c0bb5583ab91a865f2a2d930237620be4cfba775a9c02bddfee9c261b33172e6a8cb5af688bc6162c19c968079145'),
('fran@gmail.com', 'b1e1cfb31bb11eec22c6d982cfa152b2c6a878f885b1f641f2c4a017fc3dacc4b566516bfeb512d254be1c70fa44dcafeb83'),
('franjose2004@hotmail.com', 'e5cc780dc19d2c9821b899c7b2dab9e4fcfadb44c65e6be824e050da20676d15e6fcd30b532c5a527f1642acbb05bdb01062'),
('franjose2004@hotmail.com', '4a16e28a223b5d71d9d673e06ef72bdd4e4058c90c359a73f65356c7aaca7c9f24a0f30fa3bc92ea4b076a7bc074530ccf85'),
('franjose2004@hotmail.com', 'c8bfef58fecef55f6bb66b31d95f0171aa2cb97a2535ca0ba1d7cd1dba4999a8d2c64bf4d94e1783c4ec416db79c5902f301'),
('f', '51b6ed65a593b8a09a5786d32d888eb4c9a8a33c473878743c9dd1579106eef1432a02ce46e42db7cd21760291551daf5218'),
('franjccrespo@gmail.com', 'a2fee4ba01e3543aad27a8593ef665f2997de7cbfdaed977c3ddf28e5fe6117fe3deb8af7b38dd1b969694ce5f2a8c2e6426'),
('franjccrespo@gmail.com', 'babffb44ec03f1f4da7e203efd23b53692021937b9bf68295d28e5639583a9477b2b5ec140c8ac73715d3a0b000b18d39ce8'),
('franjccrespo@gmail.com', '6fb2e9fd313bb9eedfe30ddf7481e7277eed6ed595a8132de3d0ae3c6c15c6c3ddf2b7b940d6935c7fcfb8bf1fb1b255aa66'),
('franjccrespo@gmail.com', '8732145d0031880aa2f7974ea508813f32caeb1334fce1b463a581d309e7d10b0dae1097c198f9df2ce9d8100742520c36f8'),
('franjccrespo@gmail.com', '797e8a4539345e9d5c078013c9473cce747934302e25bf706f5949e0dbe0bfeba87a799454a19f91fbb88127b469015c657e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listas`
--

CREATE TABLE `listas` (
  `id` int NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usuarios_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `listas`
--

INSERT INTO `listas` (`id`, `nombre`, `usuarios_id`) VALUES
(106, 'trendy', 460),
(208, 'lista05', 458),
(219, 'playlist', 458),
(220, 'lista03', 458),
(224, 'lista02', 46),
(226, 'playlist', 46),
(229, 'lista03', 46);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repositorio_canciones`
--

CREATE TABLE `repositorio_canciones` (
  `id` int NOT NULL,
  `nombre_cancion` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `repositorio_canciones`
--

INSERT INTO `repositorio_canciones` (`id`, `nombre_cancion`) VALUES
(1, '../canciones/Deep Emotion - Don t Go There [Audio Visualizer].mp4'),
(2, '../canciones/Full Romance (Video Oficial).mp4'),
(3, '../canciones/Bow Anderson - Fail (Official Lyric Video) (mp3cut.net).m4a'),
(10, '../canciones/Lu Decker - Tiempo Perdido (Videoclip Oficial).mp3'),
(11, '../canciones/Tove Lo - Grapefruit (Official Music Video) (320).mp3'),
(13, '../canciones/Naiara Lopez - Lunes X la Mañana (Official Video).mp3'),
(16, '../canciones/Deepside Deejays - Zummer ZU (Vara asta este ZU).mp4'),
(18, '../canciones/Tove Lo - Grapefruit (Official Music Video) (320).mp3'),
(19, '../canciones/Tove Lo - Grapefruit (Official Music Video) (320).mp3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `usuario` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contraseña` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tipo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contraseña`, `fecha_nacimiento`, `email`, `tipo`) VALUES
(46, 'fran2333', 'fran1222', '2004-05-27', 'fran@gmail.com', 'administrador'),
(458, 'fran2719', 'fran2719', '2000-04-23', 'franjccrespo@gmail.com', 'administrador'),
(460, 'Juan2234', 'juan2345', '2010-04-23', 'juan@gmail.com', 'usuario'),
(472, 'Jose2312', 'jose2312', '2001-03-20', 'jose@gmail.com', 'usuario'),
(478, 'Raul2345', 'raul2345', '2000-04-23', 'raulfernandez@gmail.com', 'usuario'),
(479, 'jess2314', 'jess2314', '1999-04-23', 'jessica@gmail.com', 'usuario'),
(480, 'Rocio1234', 'roci1234', '1990-02-12', 'rocio@gmail.com', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `LISTAS_id` (`LISTAS_id`) USING BTREE;

--
-- Indices de la tabla `listas`
--
ALTER TABLE `listas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarios` (`usuarios_id`);

--
-- Indices de la tabla `repositorio_canciones`
--
ALTER TABLE `repositorio_canciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `canciones`
--
ALTER TABLE `canciones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=897;

--
-- AUTO_INCREMENT de la tabla `listas`
--
ALTER TABLE `listas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT de la tabla `repositorio_canciones`
--
ALTER TABLE `repositorio_canciones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=481;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD CONSTRAINT `cancion` FOREIGN KEY (`LISTAS_id`) REFERENCES `listas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `listas`
--
ALTER TABLE `listas`
  ADD CONSTRAINT `usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
