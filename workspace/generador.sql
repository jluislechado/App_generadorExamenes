-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2015 a las 12:48:55
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `generador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE IF NOT EXISTS `asignatura` (
`codA` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`codA`, `nombre`) VALUES
(1, 'MATEMÁTICAS'),
(2, 'QUÍMICA'),
(3, 'FÍSICA'),
(10, 'HISTORIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio`
--

CREATE TABLE IF NOT EXISTS `ejercicio` (
`codE` int(11) NOT NULL,
  `enunciado` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `solucion` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `dificultad` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `codT` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ejercicio`
--

INSERT INTO `ejercicio` (`codE`, `enunciado`, `solucion`, `dificultad`, `codT`) VALUES
(1, 'Calcula la primitiva de f(x)=x.sen(x)', 'F(x)=-x.cos(x)+sen(x)', 'media', 2),
(2, 'Calcula la primitiva de f(x)=x.Ln(x)', 'F(x)=(x2.Ln(x))/2  -  x2/4', 'media', 2),
(3, 'Halla la función f:R->R sabiendo que f''''(x)=12x-6 y que la recta tangente a la gráfica de f en el punto de abcisa x=2 tiene de ecuación 4x - y - 7.', 'f(x)=2x^3 - 3x^2-8x+13', 'media', 2),
(4, 'Hallar la función f(x) tal que f''''(x)=1/x^2, f(1)=0 y f(e)=-1.', 'f(x)=-Ln|x|', 'media', 2),
(5, 'Halla el área encerrada entre la función f(x)=-x^2 + 3x + 4, el eje X y las rectas x=-2 y x=5', 'Area= 53/2', 'media', 2),
(6, 'Halla el área comprendida entre las gráficas de las funciones f(x)=-x^2 + 9 y g(x)=(x+1)^2 - 4', 'Area=125/3', 'media', 2),
(7, 'Calcule el área de la región del plano limitada por el eje X y la curva y= x^3 - 9x', 'Área=81/2', 'media', 2),
(8, 'Calcula la primitiva de f(x)=Ln|x+1|', 'F(x)=(x+1)Ln|x+1| - x + k', 'media', 2),
(9, 'Calcula la primitiva de la función f(x)=e^(x + e^x). (Sugerencia: utiliza el cambio de variable t=e^x).', 'F(x) = e^(e^x)+k', 'media', 2),
(10, 'Halla la primitiva de la función f(x)=e^(x).sen(x)', 'F(x)=(-e^(x).cos(x)+ e^(x).sen(x))/2 + k', 'media', 2),
(11, 'Calcula la masa de una molécula de agua', 'm = 2.98 *10^-23 g', 'media', 8),
(12, 'Calcula las asíntotas de la siguiente función: f(x)= x.e^(1/x)', 'A.V x=0; A.O. y=x+1', 'media', 1),
(13, 'Dada la función f(x)=Ln( x^(2) + 1 ). Determina los intervalos de crecimiento y decrecimiento', 'f creciente (0,+infinito); f decreciente de (-infinito,0)', 'media', 1),
(14, 'Dada la función f(x)=2x^3 + ax^2 + bx + c. Encontrar los valores de a, b y c para los cuales f(x) tenga extremos en x=1 y x=2 y pase por el punto P(1,6)', 'a=-9, b=12, c=1', 'media', 1),
(15, 'Halla dos números reales positivos, sabiendo que su suma es 10 y que el producto de sus cuadrados es máximo.', 'x=5 e y=5', 'media', 1),
(16, 'Con un trozo de alambre de 12cm de longitud se pueden formar distintos rectángulos.¿Cúal de ellos tiene la superficie máxima?', 'x=3; y=3', 'media', 1),
(17, 'Estudia los intervalos de crecimiento y decrecimiento de la función: f(x)=x^(2).e^x', 'f creciente (-infinito,-2)U(0,+infinito). f decreciente (-2,0)', 'media', 1),
(18, 'El nitrógeno reacciona con hidrógeno para dar nitrógeno. Si reaccionan 22,4L de nitrógeno medidos en condiciones normales, qué masa de amoníaco se obtendrá? Dato: Mm(NH3)=17g/mol', '34g de NH3', 'media', 8),
(19, 'Nombra los siguientes compuestos: HCl, AgNO3, BH3', 'Ácido clorhídrico, nitrato de plata y borano.', 'baja', 8),
(20, 'Se dispone de una disolución de HCl al 33% masa y 1056g/L de densidad. Calcula su molaridad.', 'M=3M', 'media', 9),
(21, 'El hierro reacciona con ácido sulfúrico para dar sulfato de hierro(II) e hidrógeno. Si reaccionan 55,8 g de hierro  con 3 L de una disolución ácido sulfúrico 0,5 M. ¿Qué volumen de hidrógeno medido en condiciones normales se desprenderá?', 'V = 22,4L', 'media', 8),
(29, '¿Qué volumen de una disolución de HCl 45% en masa y 1,056 g/mL se necesita para preparar 250 mL de una disolución 0,2M?', 'V = 22,5 mL', 'media', 9),
(31, 'Si en la combustión del eteno se queman 200g de eteno, ¿qué volumen de CO2 medidos a 42ºC y 720mmHg?', 'V= 1,4 L', 'media', 8),
(32, 'La descomposición térmica de 5 g de\r\nKClO 3\r\ndel 95% de pureza da lugar a la formación de\r\nKCl\r\ny\r\nO (g) 2\r\n. Sabiendo que el rendimiento de la reacción es del 83%, calcule los gramos de\r\nKCl\r\nque se formarán.', '2''39 g KCl', 'media', 8),
(33, 'Un recipiente de 1 litro de capacidad está lleno de dióxido de carbono gaseoso a 27ºC. Se hace\r\nvacío hasta que la presión del gas es de 10 mmHg. Determine  el número total de átomos contenidos en el recipiente.', '9''85 10 átomos', 'media', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE IF NOT EXISTS `tema` (
`codT` int(11) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `codA` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tema`
--

INSERT INTO `tema` (`codT`, `nombre`, `codA`) VALUES
(1, 'LÍMITES Y DERIVADAS', 1),
(2, 'INTEGRALES', 1),
(3, 'GEOMETRÍA', 1),
(4, 'TRIGONOMETRÍA', 1),
(5, 'ECUACIONES Y SISTEMAS', 1),
(7, 'NUMEROS COMPLEJOS', 1),
(8, 'ESTEQUIOMETRÍA', 2),
(9, 'DISOLUCIONES', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignatura`
--
ALTER TABLE `asignatura`
 ADD PRIMARY KEY (`codA`);

--
-- Indices de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
 ADD PRIMARY KEY (`codE`), ADD KEY `codT` (`codT`);

--
-- Indices de la tabla `tema`
--
ALTER TABLE `tema`
 ADD PRIMARY KEY (`codT`), ADD KEY `codA` (`codA`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignatura`
--
ALTER TABLE `asignatura`
MODIFY `codA` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
MODIFY `codE` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `tema`
--
ALTER TABLE `tema`
MODIFY `codT` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
ADD CONSTRAINT `codT` FOREIGN KEY (`codT`) REFERENCES `tema` (`codT`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tema`
--
ALTER TABLE `tema`
ADD CONSTRAINT `codA` FOREIGN KEY (`codA`) REFERENCES `asignatura` (`codA`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
