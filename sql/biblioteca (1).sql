-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-06-2023 a las 23:29:49
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id` int(11) NOT NULL,
  `genero` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `genero`) VALUES
(1, 'Novela'),
(2, 'Poesia'),
(3, 'Ensayo'),
(4, 'Infantil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(35) NOT NULL,
  `descripcion_short` varchar(150) NOT NULL,
  `descripcion` varchar(1500) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `portada` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `titulo`, `descripcion_short`, `descripcion`, `autor`, `id_genero`, `portada`) VALUES
(55, 'El señor de los anillos', 'Una épica batalla entre el bien y el mal en la Tierra Media, donde un humilde hobbit debe llevar un anillo poderoso para destruirlo y salvar el mundo.', '\"El Señor de los Anillos\" de J.R.R. Tolkien es una obra maestra de la fantasía épica. Ambientada en la Tierra Media, sigue la peligrosa misión del hobbit Frodo Bolsón y su compañía para destruir el Anillo Único, una poderosa arma que corrompe a sus portadores y otorga un inmenso poder a Sauron, el Señor Oscuro. A lo largo de su viaje, se encuentran con personajes inolvidables como el sabio Gandalf, el valiente Aragorn y el leal Samwise Gamgee. En su lucha contra las fuerzas del mal, se enfrentan a criaturas temibles, guerras y traiciones. Tolkien crea un mundo vasto y detallado, lleno de razas, culturas y lenguajes únicos. A través de su narrativa rica y evocadora, el autor explora temas de valentía, amistad, sacrificio y la lucha contra la corrupción. \"El Señor de los Anillos\" es una historia cautivadora que sumerge al lector en un viaje épico y emocional, dejando una huella duradera en el género de la literatura fantástica.', 'J.R.R.Tolkien', 1, 'El señor de los anillos'),
(56, 'El superviviente', 'Un hombre solitario enfrenta los horrores de la guerra civil española mientras busca su propia supervivencia y sentido en un mundo caótico.', 'Resumen largo (500 caracteres): \"El superviviente\" de Ramón J. Sender es una novela que nos sumerge en la cruda realidad de la Guerra Civil Española. El protagonista, Anselmo, es un hombre solitario que busca sobrevivir en medio del caos y la destrucción. A medida que la guerra se desarrolla a su alrededor, Anselmo se encuentra con personajes diversos y vive situaciones extremas que ponen a prueba su voluntad de vivir. Sender retrata hábilmente los horrores y la deshumanización de la guerra, explorando temas como el miedo, la violencia y la pérdida de inocencia. A través de la narrativa intensa y desgarradora, el autor nos invita a reflexionar sobre la naturaleza humana y la capacidad del individuo para encontrar un sentido en medio de la tragedia. \"El superviviente\" es una poderosa obra literaria que captura la complejidad emocional y moral de un período histórico tumultuoso.', 'Ramon J.Sender', 1, 'El superviviente'),
(57, 'Antes de que mate', 'Un thriller emocionante sobre un detective persiguiendo a un asesino en serie mientras lucha contra sus propios demonios internos.', ' \"Antes de que mate\" de Blake Pierce es un trepidante thriller psicológico que sigue al detective Mackenzie White mientras se enfrenta a un despiadado asesino en serie. Mackenzie, una joven y talentosa detective, se encuentra en una carrera contrarreloj para capturar al asesino antes de que mate de nuevo. A medida que sigue las pistas y desentraña los enigmas dejados por el asesino, Mackenzie se enfrenta no solo a la presión del caso, sino también a sus propios demonios internos y a una serie de eventos perturbadores en su pasado. Blake Pierce teje una trama intrigante y llena de giros sorprendentes que mantienen al lector en vilo hasta la última página. A medida que la tensión aumenta, el lector se sumerge en la mente del asesino y en los pensamientos y emociones del detective Mackenzie White, creando una experiencia inmersiva y emocionante. \"Antes de que mate\" es una novela emocionante que combina intriga, suspenso y un retrato perspicaz de los personajes, explorando los límites de la razón y la obsesión en la búsqueda de la justicia.', 'Blake Pierce', 1, 'Antes de que mate'),
(58, 'Casi ausente', 'Un apasionante misterio de desaparición, donde una madre desesperada busca a su hija y se sumerge en un mundo de secretos oscuros.', '\"Casi ausente\" de Blake Pierce es un cautivador thriller de desaparición que sigue la angustiosa búsqueda de una madre por encontrar a su hija desaparecida. Sarah, una mujer desesperada, se embarca en una peligrosa investigación en un intento desesperado por descubrir la verdad detrás de la desaparición de su hija. A medida que sigue pistas y desentraña secretos oscuros, Sarah se adentra en un mundo lleno de engaños y traiciones, donde nada es lo que parece. Blake Pierce crea una trama intrigante y llena de suspenso, manteniendo al lector en vilo a medida que desentraña los misterios que rodean la desaparición. A través de una narrativa envolvente, el autor explora la lucha de una madre por la verdad y su determinación por enfrentar los obstáculos que se interponen en su camino. \"Casi ausente\" es un emocionante viaje lleno de giros inesperados y revelaciones impactantes, que pone al descubierto las profundidades más oscuras de la naturaleza humana y la fortaleza del vínculo materno.', 'Blake Pierce', 1, 'Casi ausente'),
(59, 'Hasta que el verano se acabe', 'Un romance de verano entre dos almas perdidas que encuentran consuelo y amor mutuo mientras enfrentan sus propios demonios internos.', ' \"Hasta que el verano se acabe\" de Connor Hamilton es una cautivadora historia de amor ambientada en un pintoresco pueblo costero. Dos almas perdidas, Emma y Jack, se cruzan en el camino mientras enfrentan sus propios desafíos y demonios internos. Emma, una joven con un pasado doloroso, busca la tranquilidad y la curación en este refugio veraniego, mientras que Jack, un espíritu libre atormentado por su pasado, encuentra en el lugar un escape temporal. A medida que el verano avanza, su encuentro fortuito se transforma en una conexión profunda y apasionada. Juntos, descubren la belleza de la compañía mutua y el poder del amor para sanar las heridas más profundas. Connor Hamilton teje una narrativa evocadora que transporta al lector a la atmósfera idílica del verano y a las complejidades emocionales de los personajes. A través de sus vividos detalles y diálogos realistas, la novela explora temas como la redención, la esperanza y la posibilidad de encontrar la felicidad incluso en medio de la adversidad. \"Hasta que el verano se acabe\" es una historia conmovedora que captura la efímera pero transformadora magia de un amor de verano y la búsqueda de redención personal.', 'Connor Hamilton', 1, 'Hasta que el verano se acabe'),
(60, 'La chica sola', 'Una joven desaparece y una valiente detective se sumerge en un peligroso caso que revela secretos oscuros y giros sorprendentes.', '\"La chica sola\" de Blake Pierce es un emocionante thriller de misterio que sigue la intrépida detective Mackenzie White en su búsqueda desesperada por encontrar a una joven desaparecida. Cuando una adolescente aparentemente común desaparece sin dejar rastro, Mackenzie se sumerge en un caso desafiante que la lleva a descubrir secretos oscuros y retorcidos en la tranquila comunidad donde se desarrolla la historia. A medida que se enfrenta a sospechosos, sigue pistas y desentraña la verdad, Mackenzie se ve arrastrada a un torbellino de peligro y traiciones inesperadas. Blake Pierce teje una trama llena de suspenso, manteniendo al lector en vilo mientras se desvelan giros sorprendentes en cada página. A través de una narrativa intensa y hábilmente construida, el autor explora temas como la lucha contra la injusticia, el poder de la determinación y la valentía de una mujer en su búsqueda por la verdad. \"La chica sola\" es un thriller cautivador que mantendrá al lector pegado al libro, deseando descubrir el desenlace de este misterio oscuro y adictivo.', 'Black Pierce', 1, 'La chica sola'),
(61, 'La esposa perfecta', 'Un inquietante thriller psicológico sobre una esposa aparentemente perfecta cuyo oscuro pasado amenaza con ser descubierto.', '\"La esposa perfecta\" de Blake Pierce es un fascinante thriller psicológico que sigue a Emily, una esposa aparentemente perfecta cuyo mundo se desmorona cuando su oscuro pasado comienza a resurgir. Casada con un exitoso abogado y madre de dos hijos, Emily lleva una vida envidiable en la superficie. Sin embargo, cuando una serie de eventos perturbadores y revelaciones inesperadas amenazan con destapar sus secretos, Emily se ve atrapada en una peligrosa red de engaños y manipulaciones. Mientras lucha por mantener las apariencias y proteger a su familia, se enfrenta a decisiones difíciles y a la posibilidad de que todo lo que ha construido se derrumbe. Blake Pierce crea una atmósfera cargada de suspenso y misterio, manteniendo al lector en vilo a medida que se adentra en la mente de una mujer en apariencia perfecta pero con un lado oscuro. A través de una narrativa ágil y llena de giros sorprendentes, el autor explora temas como la identidad, la mentira y las consecuencias de nuestros actos. \"La esposa perfecta\" es un emocionante viaje psicológico que desafía las percepciones y nos sumerge en el oscuro laberinto de los secretos de una mujer que hará lo que sea necesario para proteger su imagen.', 'Blake Pierce', 1, 'La esposa perfecta'),
(62, 'La guerra de los cielos', ' Una épica batalla celestial entre ángeles y demonios desata una guerra que amenaza con consumir tanto el cielo como la Tierra.', '\"La guerra de los cielos\" de Fernando Trujillo y César García es una apasionante novela de fantasía que narra la épica batalla entre ángeles y demonios en una lucha por el dominio del cielo y la Tierra. En un mundo donde los seres celestiales y los demoníacos coexisten, los ángeles defensores de la humanidad se enfrentan a las fuerzas del mal lideradas por el temible Lucifer. La trama se desarrolla en medio de intrigas, traiciones y alianzas inesperadas, donde los personajes principales, como Miguel y Azrael, se ven envueltos en una guerra que amenaza con desencadenar el caos y la destrucción en ambos reinos. A través de una narrativa llena de acción y tensión, los autores crean un universo rico y complejo, explorando temas de redención, libre albedrío y el eterno conflicto entre el bien y el mal. \"La guerra de los cielos\" sumerge al lector en un viaje emocionante y visualmente impactante, repleto de batallas épicas, poderes divinos y personajes fascinantes. Una historia que atrapa desde el principio y que deja una profunda reflexión sobre la naturaleza humana y la lucha por el equilibrio en un mundo dividido entre el paraíso y el abismo.', 'Fernando Trujillo y Cesar Garcia', 1, 'La guerra de los cielos'),
(63, 'El album blanco', 'Un poema introspectivo que explora las emociones y experiencias personales, utilizando metáforas y evocadoras imágenes.', '\"El álbum blanco\" es un poema de Eduardo Langagne que invita al lector a adentrarse en un viaje introspectivo a través de las emociones y experiencias personales. A través de metáforas vívidas y evocadoras imágenes, el poema nos sumerge en un universo poético en el que se exploran temas como el amor, la pérdida, la melancolía y la búsqueda de identidad. Langagne emplea un lenguaje poético y delicado para transmitir una profunda reflexión sobre la condición humana y las complejidades de la existencia. \"El álbum blanco\" nos invita a adentrarnos en los recovecos más íntimos del ser, a través de versos que nos conmueven y nos invitan a reflexionar sobre nuestras propias vivencias. Es una obra que abraza la sutileza de la poesía y que puede resonar en aquellos que buscan una experiencia literaria profunda y emotiva.', 'Eduardo Langagne', 2, 'El album blanco'),
(64, 'Palabras de diosa', ' Un compendio poético que celebra la feminidad y la divinidad femenina a través de hermosas y poderosas palabras.', ' \"Palabras de diosa\" de Carmen González Huguet es un inspirador compendio poético que rinde homenaje a la feminidad y a la divinidad femenina. A través de versos delicados y llenos de fuerza, la autora explora la esencia de la mujer y su conexión con lo sagrado. El libro nos sumerge en un viaje poético que celebra la belleza, la sabiduría y la fortaleza de la mujer en todas sus formas. Desde la fertilidad de la tierra hasta la resiliencia y el empoderamiento de las diosas mitológicas, cada poema nos invita a contemplar y apreciar la grandeza de lo femenino. Carmen González Huguet emplea un lenguaje lírico y evocador, utilizando metáforas y símbolos para transmitir la esencia divina que reside en cada mujer. \"Palabras de diosa\" es un canto poético a la feminidad, una invitación a abrazar y honrar la esencia femenina en todas sus manifestaciones. Es una obra que inspira, empodera y nos recuerda la importancia y el valor de la mujer en el mundo.', 'Carmen Gonzalez Huguet', 2, 'Palabras de diosa'),
(65, 'Partes un verso a la mitad y sangra', 'Un poemario que explora la intensidad emocional y el impacto de las palabras a través de versos cortantes y poderosos.', ' \"Partes un verso a la mitad y sangra\" de Efraín Bartolomé es un poemario que sumerge al lector en una experiencia intensa y visceral. A través de versos cortantes y poderosos, el autor explora la profundidad de las emociones y el poder de las palabras. Cada poema es una herida abierta que sangra, transmitiendo una intensidad emocional palpable y conmovedora. Bartolomé utiliza un lenguaje poético impactante y evocador para explorar temas como el amor, el dolor, la soledad y la búsqueda de significado. Sus versos capturan la fragilidad humana y la vulnerabilidad del alma, invitando al lector a sumergirse en la experiencia poética con todas sus emociones. \"Partes un verso a la mitad y sangra\" es un viaje poético profundo y catártico, en el que el autor desnuda su alma y ofrece al lector una mirada íntima a la esencia de la existencia humana. Es una obra que conmueve y despierta la sensibilidad, recordándonos el poder transformador y sanador de la poesía.', 'Efrain Bartolome', 2, 'Partes un verso a la mitad y sangra'),
(66, 'Perfil de la hoguera', ' Un poemario que explora las pasiones humanas y los conflictos internos a través de versos ardientes y evocadores.', ' \"Perfil de la hoguera\" de Ariel Montoya es un cautivador poemario que sumerge al lector en un mundo de pasiones, emociones y conflictos internos. A través de versos ardientes y evocadores, el autor explora la intensidad de las experiencias humanas y las complejidades de la existencia. Cada poema es una llama que arde en el corazón y la mente, transmitiendo una gama de emociones que van desde el amor y la esperanza hasta el dolor y la desesperación. Montoya utiliza un lenguaje poético vibrante y poderoso para dar forma a imágenes y metáforas que capturan la esencia de la hoguera interna que arde en cada ser humano. En \"Perfil de la hoguera\", el autor invita al lector a reflexionar sobre la dualidad de la naturaleza humana, explorando temas como la búsqueda de la identidad, el deseo, el sufrimiento y la redención. Es un viaje poético que nos sumerge en el fuego de las emociones más intensas y nos confronta con nuestra propia vulnerabilidad y pasión. \"Perfil de la hoguera\" es una obra poderosa y lírica que deja una profunda impresión en aquellos que se aventuran en su lectura.', 'Ariel Montoya', 2, 'Perfil de la hoguera'),
(67, 'Sublimacion de la noche', ' Un poemario que explora la oscuridad y la transformación a través de versos sublimes y evocadores.', '\"Sublimación de la noche\" de André Cruchaga es un impactante poemario que sumerge al lector en un viaje por la oscuridad y la transformación. A través de versos sublimes y evocadores, el autor explora las profundidades de la noche y los misterios que yacen en su interior. Cada poema es un paseo por los recovecos más oscuros de la mente y el alma, donde las sombras se vuelven poesía y los silencios se transforman en palabras. Cruchaga utiliza un lenguaje lírico y cargado de imágenes para explorar temas como la melancolía, el desamor, la introspección y la redención. Sus versos nos sumergen en un universo poético lleno de emociones intensas y reflexiones filosóficas, invitándonos a explorar nuestra propia oscuridad y encontrar la belleza en ella. \"Sublimación de la noche\" es una obra que invita a la contemplación y nos desafía a enfrentar nuestras sombras internas con valentía y sensibilidad. A través de la poesía, el autor nos guía en un viaje de autodescubrimiento y transformación, donde la noche se convierte en un lienzo para la exploración poética de lo más profundo de nuestra existencia.', 'Andre Cruchaga', 2, 'Sublimacion de la noche'),
(68, 'Viaje cosmico', 'Un viaje poético que nos transporta a través del cosmos, explorando la vastedad del universo y nuestra conexión con él.', '\"Viaje Cósmico\" de André Cruchaga es un fascinante poemario que nos invita a embarcarnos en un viaje poético a través del cosmos. Con versos cautivadores y llenos de imágenes celestiales, el autor nos sumerge en la vastedad del universo y nos hace reflexionar sobre nuestra conexión con él. A lo largo de las páginas, exploramos las estrellas, las galaxias y los misterios que se esconden en el espacio infinito. Cruchaga utiliza un lenguaje lírico y evocador para transmitir la grandeza y la belleza del universo, así como nuestra pequeñez en comparación. A medida que avanzamos en el viaje cósmico, somos llevados a reflexionar sobre nuestro lugar en el cosmos y nuestra búsqueda de significado en medio de tanta grandeza. El autor nos invita a contemplar la maravilla y el misterio del universo, y nos recuerda que, a pesar de nuestra insignificancia, somos parte integral de esta vasta creación. \"Viaje Cósmico\" es una obra que nos transporta más allá de los confines de la Tierra, desafiándonos a expandir nuestra percepción y a sumergirnos en la belleza infinita del cosmos.', 'Andre Cruchaga', 2, 'Viaje Cosmico'),
(69, 'Antigona Gonzalez', 'Una poderosa y contemporánea reescritura de la tragedia griega de Antígona, que aborda temas sociales y políticos en el contexto latinoamericano.', ' \"Antígona González\" de Sara Uribe es una impactante reescritura contemporánea de la tragedia griega de Antígona, adaptada al contexto latinoamericano. En esta obra, la autora aborda temas sociales y políticos relevantes, como la violencia, la corrupción y la impunidad, a través de la historia de Antígona González, una mujer que busca justicia para su hermano desaparecido en medio del caos y la violencia de la guerra contra el narcotráfico en México. Uribe utiliza un lenguaje poético y poderoso para explorar las consecuencias humanas de la violencia y las luchas por la memoria y la dignidad. A través del personaje de Antígona, la autora plantea preguntas sobre la responsabilidad moral y la resistencia ante la opresión. \"Antígona González\" es una obra que desafía los límites del género literario, combinando poesía, prosa y elementos teatrales para transmitir la intensidad y la urgencia de la historia. Es un llamado a la reflexión sobre la justicia, la memoria colectiva y los derechos humanos en un contexto marcado por la violencia y la impunidad. Esta reescritura contemporánea de Antígona resuena con la realidad latinoamericana y ofrece una nueva mirada sobre los desafíos y las luchas que enfrentan las sociedades actuales.', 'Sara Uribe', 3, 'Antigona Gonzalez'),
(70, 'Cuerpos que importan', 'Un ensayo influyente que examina la relación entre el cuerpo, el género y la identidad, cuestionando las normas sociales establecidas.', '\"Cuerpos que importan\" de Judith Butler es un ensayo fundamental que desafía las concepciones tradicionales sobre el cuerpo, el género y la identidad. En esta obra, Butler explora cómo las normas sociales y culturales influyen en la formación de la identidad de género y cómo los cuerpos son \"performativos\", es decir, se constituyen a través de prácticas y actos repetidos. La autora cuestiona la idea de que el género es algo fijo y natural, argumentando que es una construcción social y discursiva. Butler examina cómo las normas de género y las concepciones binarias del cuerpo impactan en la vida de las personas y cómo estas normas pueden ser desafiadas y subvertidas. A lo largo del libro, se exploran temas como la heterosexualidad obligatoria, la performatividad de género, la vulnerabilidad corporal y la resistencia política a las normas establecidas. \"Cuerpos que importan\" es una obra teórica profunda y compleja que ha tenido un impacto significativo en los estudios de género y en los debates sobre la identidad y la liberación sexual. Es un llamado a cuestionar y trascender las limitaciones impuestas por las normas de género, y a reconocer la diversidad y la agencia de los cuerpos que desafían las convenciones establecidas.', 'Judith Butler', 3, 'Cuerpos que importan'),
(71, 'El libro de las emociones', 'Un libro que explora las emociones humanas a través de relatos y reflexiones íntimas, ofreciendo una mirada profunda al mundo interior.', '\"Libro de las emociones\" de Laura Esquivel es una obra que nos sumerge en un viaje por el mundo de las emociones humanas. A través de relatos, reflexiones y ejercicios prácticos, la autora nos invita a explorar y comprender nuestras emociones más íntimas. Esquivel aborda una amplia gama de sentimientos, desde la alegría y el amor hasta la tristeza y el miedo, y nos ofrece una visión profunda de cómo estas emociones afectan nuestras vidas y nuestras relaciones con los demás. La autora nos guía en un proceso de autoconocimiento y nos invita a reflexionar sobre el significado y la importancia de nuestras emociones. Además, explora cómo nuestras experiencias y nuestra cultura influyen en la forma en que percibimos y expresamos nuestras emociones. \"Libro de las emociones\" nos brinda herramientas prácticas para manejar y canalizar nuestras emociones de manera saludable, y nos invita a cultivar una mayor conciencia emocional en nuestra vida cotidiana. Es un libro que nos inspira a conectar con nuestras emociones más auténticas y a reconocer la importancia de la expresión emocional en nuestro bienestar emocional y espiritual.', 'Laura Esquivel', 3, 'Libro de las emociones'),
(72, 'Historia del ojo', 'Una novela transgresora que explora la sexualidad, la violencia y la obsesión a través de una narrativa provocativa.', '\"Historia del ojo\" de Georges Bataille es una novela transgresora que desafía las convenciones sociales y literarias. A través de una narrativa provocativa y visceral, el autor nos sumerge en un mundo de sexualidad desenfrenada, violencia y obsesión. La historia sigue a un grupo de personajes que exploran límites extremos de la experiencia erótica y buscan la trascendencia a través del erotismo y la transgresión. Bataille utiliza un lenguaje crudo y provocativo para retratar escenas sexuales explícitas y violentas, que desafían las normas y las inhibiciones de la sociedad. La novela es una exploración profunda de la intersección entre la sexualidad, el deseo, la muerte y la experiencia humana en su forma más extrema. \"Historia del ojo\" es una obra que puede ser impactante y perturbadora, pero también plantea preguntas filosóficas sobre la naturaleza humana, el sentido de la moralidad y los límites de la transgresión. Es un libro que desafía al lector a confrontar sus propias inhibiciones y prejuicios, y a cuestionar las normas establecidas en torno a la sexualidad y el comportamiento humano.', 'Georges Batailles', 3, 'Historia del ojo'),
(73, 'La mudanza de los poderes', 'Una novela que explora los cambios políticos y sociales en un país ficticio, a través de la perspectiva de diversos personajes.\r\n\r\n', '\"La mudanza de los poderes\" de Salvador Gallardo Cabrera es una novela que nos sumerge en un país ficticio en medio de importantes cambios políticos y sociales. A través de la perspectiva de diversos personajes, la obra nos presenta una visión panorámica de la transformación de esta nación imaginaria. La trama se desarrolla en un contexto donde los poderes establecidos se ven amenazados y se produce un traslado de las estructuras de poder existentes. El autor utiliza una prosa hábil y envolvente para explorar las luchas de poder, las intrigas políticas y los conflictos sociales que surgen en medio de estos cambios. A medida que avanzamos en la historia, nos adentramos en la psicología de los personajes, que representan diferentes segmentos de la sociedad y nos permiten entender las complejidades y contradicciones de este entorno en constante evolución. \"La mudanza de los poderes\" es una novela que reflexiona sobre el poder, la corrupción, la identidad nacional y los desafíos que surgen en momentos de cambio político y social. Es una obra que invita a la reflexión sobre la naturaleza del poder y sus implicaciones en la vida de las personas y la sociedad en general.', 'Salvador Gallardo Cabrera', 3, 'La mudanza de los poderes'),
(74, 'Muerte de la moral burguesa', 'Un ensayo que critica los valores morales de la burguesía y reflexiona sobre la decadencia de la sociedad.', '\"Muerte de la moral burguesa\" de Emmanuel Berl es un ensayo provocador que cuestiona y critica los valores morales de la burguesía y reflexiona sobre la decadencia de la sociedad contemporánea. Berl analiza los principios y normas éticas de la clase burguesa, argumentando que se han vuelto obsoletos y han perdido su relevancia en un mundo en constante cambio. El autor examina la hipocresía, la superficialidad y las contradicciones morales de esta clase social, revelando sus debilidades y su desconexión con la realidad. Berl argumenta que la moral burguesa ha perdido su capacidad para guiar a la sociedad y se ha convertido en un obstáculo para el progreso y la autenticidad humana. A través de su análisis, el autor busca despertar una conciencia crítica en el lector y promover una reevaluación de los valores morales tradicionales. \"Muerte de la moral burguesa\" es una obra desafiante que invita a reflexionar sobre la moralidad y el papel de la burguesía en la configuración de la sociedad. Berl nos insta a buscar nuevos enfoques éticos y a superar los límites impuestos por la moral convencional para construir una sociedad más justa y auténtica.', 'Emmanuel Berl', 3, 'Muerte de la moral burguesa'),
(75, 'Organos sin cuerpo', 'Un ensayo que examina la relación entre la ideología, la política y la subjetividad en la era del capitalismo globalizado.', '\"Órganos sin cuerpo: Sobre Deleuze y Consecuencias\" de Slavoj Žižek es un ensayo filosófico que explora la relación entre la ideología, la política y la subjetividad en la era del capitalismo globalizado. A través de un análisis profundo y provocativo, Žižek examina las ideas del filósofo Gilles Deleuze y su impacto en la teoría crítica contemporánea. El autor argumenta que vivimos en una sociedad donde los \"órganos sin cuerpo\" representan una forma de dominación ideológica en la que las instituciones y las estructuras abstractas del capitalismo tienen un control total sobre nuestra vida cotidiana. Žižek desafía la noción de que el individuo puede liberarse de las estructuras ideológicas y plantea la necesidad de una intervención política y social radical para desmantelar estas formas de opresión. A través de ejemplos que abarcan desde la cultura popular hasta el cine y la política global, el autor examina cómo la lógica del capitalismo influye en nuestra subjetividad y cómo la resistencia y el cambio social pueden surgir en medio de esta opresión. \"Órganos sin cuerpo\" es una obra compleja que invita al lector a cuestionar y reevaluar las formas en que entendemos la ideología, la política y la subjetividad en el mundo contemporáneo, y ofrece una crítica contundente del capitalismo globalizado y su impacto en nuestras vidas.', 'Slavoj Zizek', 3, 'Organos sin cuerpo'),
(76, 'Alicia en el pais de las maravillas', 'Una encantadora y surrealista historia en la que Alicia se sumerge en un mundo de fantasía y personajes extravagantes.', '\"Alicia en el país de las maravillas\" de Lewis Carroll es un clásico de la literatura infantil que ha cautivado a lectores de todas las edades desde su publicación en 1865. La historia sigue las aventuras de Alicia, una niña curiosa y soñadora que cae por una madriguera y se sumerge en un mundo lleno de fantasía y personajes extravagantes. En su viaje, se encuentra con el Conejo Blanco, el Sombrerero Loco, la Reina de Corazones y muchos otros seres mágicos y excéntricos. A medida que Alicia explora este extraño mundo, se enfrenta a situaciones absurdas y desafiantes, desafiando constantemente las reglas y la lógica convencional. La narrativa de Carroll se caracteriza por su estilo ingenioso y su humor punzante, creando un universo en el que la imaginación y la creatividad reinan sin límites. A través de su travesía, Alicia descubre lecciones sobre la identidad, la realidad y el poder de la imaginación. \"Alicia en el país de las maravillas\" es una obra que invita a sumergirse en un mundo de asombro y sorpresa, desafiando las convenciones y explorando los límites de la imaginación. Es un clásico atemporal que continúa deleitando a lectores de todas las generaciones con su encanto y su capacidad para transportarnos a un mundo de maravillas.', 'Lewis Caroll', 4, 'Alicia en el pais de las maravillas'),
(77, 'El patito feo', 'Un cuento clásico sobre un patito diferente que enfrenta el rechazo y descubre su verdadera belleza interior.', '\"El patito feo\" de Hans Christian Andersen es un cuento clásico que narra la historia de un patito que nace diferente a sus hermanos y es rechazado por su apariencia. A lo largo de la historia, el patito enfrenta numerosos desafíos y rechazos, ya que no encaja en el molde establecido de lo que se considera hermoso. Sin embargo, a medida que el patito crece y se desarrolla, descubre su verdadera identidad y belleza interior. A través de su travesía, el patito feo aprende importantes lecciones sobre el valor de la aceptación y el amor propio. La historia nos enseña que la verdadera belleza no se encuentra en la apariencia externa, sino en la singularidad y la autenticidad de cada individuo. \"El patito feo\" es un cuento con un mensaje poderoso de autoaceptación y superación de las adversidades, que ha resonado en generaciones de lectores. Es una historia que nos recuerda la importancia de valorar a aquellos que son diferentes y nos inspira a celebrar nuestra propia singularidad.', 'Hans Crhistian Andersen', 4, 'El patito feo'),
(78, 'El principito', 'Un relato poético sobre un pequeño príncipe que viaja por diferentes planetas y descubre las verdades esenciales de la vida.', '\"El principito\" de Antoine de Saint-Exupéry es una obra maestra de la literatura universal que ha capturado los corazones de lectores de todas las edades. La historia comienza cuando un piloto se encuentra perdido en el desierto del Sahara y se encuentra con un niño extraordinario: el Principito. A medida que el Principito cuenta sus experiencias y aventuras en otros planetas, el lector es llevado a un viaje poético y filosófico que explora temas como el amor, la amistad, la soledad, la pérdida y el significado de la vida. A través de encuentros con personajes memorables, como el zorro y la rosa, el Principito nos brinda reflexiones profundas sobre la importancia de ver más allá de lo visible y valorar lo esencial. Con su prosa sencilla y evocadora, Saint-Exupéry nos invita a mirar el mundo con ojos de niño y a apreciar las cosas más simples y verdaderas de la existencia. \"El principito\" es una obra intemporal que nos confronta con nuestras prioridades y nos recuerda la importancia de mantener vivos nuestros sueños, nuestra imaginación y nuestra capacidad de asombro. Es una invitación a redescubrir la magia de lo cotidiano y a encontrar el equilibrio entre la responsabilidad y la libertad.', 'Antonie de Saint-Exupery', 4, 'El principito'),
(79, 'La bella y la bestia', 'Un cuento clásico sobre el amor y la redención, donde una joven encuentra la belleza interior en un ser aparentemente monstruoso.', ' \"La bella y la bestia\" de Madame Leprince de Beaumont es un cuento de hadas clásico que ha perdurado a lo largo de los siglos. La historia sigue a Bella, una joven amable y hermosa que se encuentra prisionera en un castillo encantado, habitado por una bestia aparentemente monstruosa. A medida que pasa el tiempo, Bella descubre que bajo la apariencia exterior de la bestia se esconde un ser sensible y noble. A través de la amabilidad y la comprensión, Bella y la bestia desarrollan un vínculo especial, que se convierte en una historia de amor y redención. El cuento enseña importantes lecciones sobre la belleza interior, la empatía y el poder transformador del amor verdadero. A medida que la relación entre Bella y la bestia evoluciona, el lector es testigo de cómo la bondad y la compasión pueden superar las apariencias superficiales y encontrar la verdadera belleza en los demás. \"La bella y la bestia\" es una historia intemporal que nos recuerda la importancia de mirar más allá de las apariencias externas y valorar la esencia de las personas. Es un cuento con un mensaje esperanzador sobre la redención y el poder del amor para transformar vidas.', 'Madame Leprince de Beaumont', 4, 'La bella y la bestia'),
(80, 'Peter pan', ' Un clásico cuento de hadas sobre el niño que nunca crece y sus aventuras en el mágico país de Nunca Jamás.', '\"Peter Pan\" de J.M. Barrie es un clásico de la literatura infantil que ha encantado a generaciones de lectores. La historia gira en torno a Peter Pan, un niño que nunca crece y que vive en el mágico país de Nunca Jamás. Junto con su fiel hada, Campanilla, Peter Pan lleva a los niños perdidos a vivir aventuras emocionantes y enfrentarse al temido Capitán Garfio y sus piratas. El cuento explora temas como la imaginación, la inocencia, la valentía y el deseo de escapar de las responsabilidades y el paso del tiempo. Peter Pan personifica el espíritu de la eterna juventud y la negativa a crecer, mientras que Wendy Darling, una niña normal, se convierte en su compañera de viaje y descubre la importancia de la madurez y la responsabilidad. \"Peter Pan\" nos invita a explorar el poder de la imaginación y la importancia de mantener vivo el niño interior. Es un relato lleno de aventuras, personajes memorables y un toque de magia que nos recuerda el valor de la amistad, el amor y la importancia de nunca dejar de soñar.', 'James Matthew Barrie', 4, 'Peter pan'),
(81, 'Rapunzel', 'Un cuento clásico sobre una joven princesa encerrada en una torre alta con su larga cabellera como única salvación.\r\n\r\n', ' \"Rapunzel\" de los Hermanos Grimm es un cuento de hadas popular que narra la historia de una joven princesa llamada Rapunzel, que es encerrada en una torre alta por una malvada bruja. La torre no tiene escaleras ni puertas, y la única forma de acceder a Rapunzel es a través de su larga cabellera dorada. Durante años, Rapunzel vive aislada del mundo exterior, hasta que un día un príncipe se aventura a acercarse a la torre y escucha su dulce canto. Fascinado por su belleza y su voz, el príncipe intenta salvarla y encontrar una manera de liberarla de su cautiverio. \"Rapunzel\" es un cuento que explora temas como la valentía, la esperanza y el amor verdadero. La historia destaca la importancia de la superación de obstáculos, la búsqueda de la libertad y la capacidad de encontrar la felicidad incluso en las circunstancias más difíciles. Además, \"Rapunzel\" es un cuento que ha inspirado diversas adaptaciones y reinterpretaciones a lo largo de los años, tanto en literatura como en cine y teatro, dejando una huella duradera en la cultura popular.', 'Hermanos Grimm', 4, 'Rapunzel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reseñas`
--

CREATE TABLE `reseñas` (
  `id_resena` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_libro` int(11) DEFAULT NULL,
  `valoracion` int(11) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reseñas`
--

INSERT INTO `reseñas` (`id_resena`, `id_usuario`, `id_libro`, `valoracion`, `comentario`, `fecha_creacion`) VALUES
(29, 9, 57, 3, 'da de que hablas', '2023-05-26'),
(31, 14, 55, 5, 'muy bueno\r\n', '2023-06-05'),
(32, 13, 55, 5, 'me gusto\r\n', '2023-06-05'),
(33, 10, 55, 4, 'guay\r\n', '2023-06-05'),
(34, 11, 55, 4, 'interesante\r\n', '2023-06-05'),
(35, 13, 78, 5, 'muy divertido', '2023-06-05'),
(36, 13, 71, 5, 'fjhff', '2023-06-05'),
(37, 14, 71, 1, 'hvjhvhj', '2023-06-05'),
(38, 14, 64, 4, 'hjv', '2023-06-05'),
(39, 14, 58, 4, 'adasda', '2023-06-05'),
(40, 13, 61, 5, 'Buen Libro', '2023-06-05'),
(41, 13, 68, 2, 'muy bueno\r\n', '2023-06-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `correo`, `usuario`, `contraseña`) VALUES
(1, 'zorri', 'zorri', 'adripoison@gmail.com', 'zorri', '123'),
(2, 'tena', 'tena', 'adripoison@gmail.com', 'tena', '123'),
(3, 'yiss', 'yiss', 'adripoison@gmail.com', 'yiss', 'yiss'),
(4, 'gringo', 'yiss', 'adripoison@gmail.com', 'yiss', 'yiss'),
(5, 'tena', 'zorri', 'adripoison@gmail.com', 'tena', 'zorri'),
(6, 'tena', 'zorri', 'adripoison@gmail.com', 'zorri', '534'),
(7, 'marti', 'marti', 'adripoison@gmail.com', 'marti', 'marti'),
(8, 'marti', 'marti', 'adripoison@gmail.com', 'marti', '123'),
(9, 'tena', 'tena1', 'adripoison@gmail.com', 'tena1', '123'),
(10, 'adri', 'adri', 'adripoisonhard@gmail.com', 'adri', 'adri'),
(11, 'zorri', 'ppppppp', 'adripoison1@gmail.com', 'zorri1', '123'),
(12, '1', '1', 'adrian@perezoro.com', '1', '1'),
(13, 'admin', 'admin', 'Adrian@hola.wav', 'admin', '123'),
(14, 'david', 'Colilla', 'davicete45@gmail.com', 'DavidColilla', '12david12'),
(15, 'jaso', 'saez', 'davicete@gmail.com', 'jaso', 'jaso');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_genero` (`id_genero`);

--
-- Indices de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  ADD PRIMARY KEY (`id_resena`),
  ADD UNIQUE KEY `un_usuario_un_libro` (`id_usuario`,`id_libro`),
  ADD KEY `id_libro` (`id_libro`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `reseñas`
--
ALTER TABLE `reseñas`
  MODIFY `id_resena` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id`);

--
-- Filtros para la tabla `reseñas`
--
ALTER TABLE `reseñas`
  ADD CONSTRAINT `reseñas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `reseñas_ibfk_2` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
