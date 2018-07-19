-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 19 jul 2018 om 12:28
-- Serverversie: 10.1.31-MariaDB
-- PHP-versie: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `synthrent`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `naam` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefoon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rol_id` int(10) UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `admins`
--

INSERT INTO `admins` (`id`, `naam`, `email`, `password`, `remember_token`, `telefoon`, `rol_id`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Raymond (Admin)', 'ramirotrax@gmail.com', '$2y$10$leIZbftvI/gCVYnfeaATyuJcoFEju0Rz.P3kBTeR2KyYH7MwOmJjO', '2WhYAlkwJRjBrXQV0pNU1fP2Ajim2Hc44sKE5hhAV8f1xKPybxFPrUaVzTc9', NULL, 1, 'Raymond.jpg', NULL, '2018-05-31 11:20:29'),
(2, 'Wendy Jansen', 'wendy@email.com', '$2y$10$leIZbftvI/gCVYnfeaATyuJcoFEju0Rz.P3kBTeR2KyYH7MwOmJjO', NULL, NULL, 2, 'pexels-photo-762020.jpeg', '2018-04-25 07:46:18', '2018-05-31 11:26:53');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `naam` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `categories`
--

INSERT INTO `categories` (`id`, `naam`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Synthesizers', 'synthesizers', '2018-04-15 09:01:22', '2018-04-15 09:01:22'),
(2, 'Drum machines', 'drum-machines', NULL, NULL),
(3, 'Geluidskaarten', 'geluidskaarten', '2018-05-20 07:51:53', '2018-05-20 07:51:53'),
(4, 'MIDI Controller', 'midi-controller', '2018-05-23 06:59:24', '2018-05-23 06:59:24'),
(5, 'Studio monitors', 'studio-monitors', '2018-05-23 07:10:48', '2018-05-23 07:10:48');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `marks`
--

CREATE TABLE `marks` (
  `id` int(10) UNSIGNED NOT NULL,
  `naam` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `marks`
--

INSERT INTO `marks` (`id`, `naam`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Roland', 'roland', '2018-04-15 09:03:15', '2018-04-15 09:03:15'),
(2, 'Novation', 'novation', '2018-05-19 22:00:00', '2018-05-20 07:27:22'),
(3, 'Motu', 'motu', '2018-05-20 07:43:00', '2018-05-20 07:43:00'),
(4, 'Steinberg', 'steinberg', '2018-05-21 10:25:56', '2018-05-21 10:25:56'),
(5, 'Ableton', 'ableton', '2018-05-23 06:11:33', '2018-05-23 06:11:33'),
(6, 'AKAI', 'akai', '2018-05-23 06:57:29', '2018-05-23 06:57:29'),
(7, 'Native Instruments', 'native-instruments', '2018-05-23 07:05:16', '2018-05-23 07:05:16'),
(8, 'KRK', 'krk', '2018-05-23 07:11:22', '2018-05-23 07:11:22');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_24_095123_create_products_table', 1),
(4, '2018_03_24_095137_create_customers_table', 1),
(5, '2018_03_24_095149_create_categories_table', 1),
(6, '2018_03_24_095252_create_rentals_table', 1),
(7, '2018_04_08_084349_create_product_marks_table', 1),
(8, '2018_04_14_000000_create_admins_table', 2),
(9, '2014_10_12_000000_create_users_table', 3),
(10, '2018_04_25_085913_create_roles_table', 4),
(11, '2018_05_30_100918_create_reviews_table', 5);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `merk_id` int(10) UNSIGNED NOT NULL,
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `huurprijs` decimal(5,2) NOT NULL,
  `omschrijving` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `online` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `category_id`, `merk_id`, `naam`, `huurprijs`, `omschrijving`, `details`, `foto`, `online`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'SYSTEM-8 Plug-Out', '1.75', '<h3><strong>Algemeen</strong></h3>\r\n\r\n<p>Roland staat voor moderne synths en liet dit al eerder zien met de AIRA-serie waarin Rolands innovatieve ACB-technologie (Analog Circuit Behavior) verwerkt zat. Deze techniek wordt geprezen voor de authentieke reconstructie van de klank en het gedrag van historische, analoge synthesizers. De&nbsp;Roland SYSTEM-8 Plug-Out Synthesizer beschikt over een zeer geavanceerde ACB-chip, die een 8-stemmige polyfonie, drie oscillatoren, hoge-resolutie filters en polyvalente LFO&rsquo;s aanstuurt. Deze&nbsp;veelzijdige klankbron produceert dan ook alles van klassieke analoge pad-klanken, bassen en lead-synths tot frisse, dynamische klanken en ruimte-vullende structuren die begeerd worden door moderne klankontwerpers. Naast zijn eigen klankbron, heeft de SYSTEM-8 de mogelijkheid om drie Plug-Out software-synths aan te sturen, waarvan de JUPITER-8 direct mee wordt geleverd en de JUNO-106 spoedig zal volgen.</p>\r\n\r\n<p>Plug-Out: helemaal in</p>\r\n\r\n<p>Als de namen JUPITER-8 en JUNO-106 je al vrolijk maakten, dan kan je nog even doorgaan met lachen. Optionele Plug-Outs, zoals de SYSTEM-100, SH-101 en PROMARS, werken ook op de SYSTEM-8. In de performance-modus is het daarbij mogelijk om de interne synth-engine te combineren met de Plug-Outs om zo super-synths te scheppen&nbsp;met onder andere gelaagde stemmen en custom splits. Het cre&euml;ren van geluiden gaat vanzelf, dankzij het intu&iuml;tieve bedieningspaneel dat voorzien is van vele, vele knoppen en regelaars. In een handomdraai voeg je dan ook filters en effecten toe, waaronder side-band filter, overdrive, fuzz, delay, chorus, reverb en nog veel meer.</p>\r\n\r\n<p>Het juiste gereedschap</p>\r\n\r\n<p>Synthesizers zijn er om je eigen geluiden mee te cre&euml;ren en Roland weet dat als geen ander. De SYSTEM-8 bevat hiervoor dan ook allerlei leuke tools. Met de polyfone 64-step sequencer in TR-REC-stijl kun je eenvoudig loop-sequences opnemen, afspelen en bewerken. De arpeggio-functie met quick-access-knoppen maakt het mogelijk om snel van patronen en stijlen te wisselen, en dankzij chord memory speel je eenvoudig akkoorden met &eacute;&eacute;n vinger. Mocht dit nog niet genoeg zijn, dan is er zelfs een vocoder ingebouwd. Dankzij alle aanwezige aansluitingen (USB, MIDI, CV/GATE, etc.) is de SYSTEM-8 gemakkelijk te integreren in de studio. Een van de meest futuristische synths die je tegen kan komen, de&nbsp;Roland SYSTEM-8 Plug-Out Synthesizer!</p>\r\n\r\n<p><strong>Tips of opmerkingen over dit product</strong></p>\r\n\r\n<ul>\r\n	<li>Compatibel met: Roland DP-serie, Roland EV-5 (beide niet meegeleverd).</li>\r\n	<li>Meegeleverd: handleiding en&nbsp;voedings-adapter met kabel.</li>\r\n</ul>', '<h3>Productspecificaties</h3>\r\n\r\n<ul>\r\n	<li>Roland SYSTEM-8</li>\r\n	<li>Plug-Out Synthesizer</li>\r\n	<li>aantal toetsen: 49 (aanslaggevoelig)</li>\r\n	<li>klankgenerator-modellen: SYSTEM-8, PLUG-OUT1, PLUG-OUT2, PLUG-OUT3</li>\r\n	<li>maximale polyfonie: 8 stemmen bij SYSTEM-8, Plug-Out afhankelijk van software</li>\r\n	<li>geheugen:\r\n	<ul>\r\n		<li>patch: 64 (8 memories x 8 banks, per model)</li>\r\n		<li>performance: 64 (8 memories x 8 banks)</li>\r\n	</ul>\r\n	</li>\r\n	<li>LFO:\r\n	<ul>\r\n		<li>variaties: 1 (single LFO), 2 (dual LFO), 3 (resonanced pulse LFO)&nbsp;</li>\r\n		<li>golfvorm: sine, triangle, saw, square, sample&amp;hold, random</li>\r\n		<li>knoppen: fade time, rate, pitch, filter, amp</li>\r\n		<li>controllers: key trigger, trigger envelope</li>\r\n	</ul>\r\n	</li>\r\n	<li>oscillator 1:\r\n	<ul>\r\n		<li>variatie: 1, 2</li>\r\n		<li>golfvorm: saw, square, triangle, saw2, square2, triangle2</li>\r\n		<li>knoppen: color, modulation source (manual, lfo, p.env, f.env, a.env, osc 3), octave (64, 32, 16, 8, 4, 2), coarse tune, fine tune</li>\r\n		<li>modulatie: cross modulator</li>\r\n	</ul>\r\n	</li>\r\n	<li>oscillator 2:\r\n	<ul>\r\n		<li>variatie: 1, 2</li>\r\n		<li>golfvorm: saw, square, triangle, saw2, square2, triangle2</li>\r\n		<li>knoppen: color, modulation source (manual, lfo, p.env, f.env, a.env, osc 3), octave (64, 32, 16, 8, 4, 2), coarse tune, fine tune</li>\r\n		<li>modulatie: ring modulator, oscillator sync</li>\r\n	</ul>\r\n	</li>\r\n	<li>oscillator 3/sub-oscillator:\r\n	<ul>\r\n		<li>golfvorm: sine (-2 octave), sine (-1 octave), sine, triangle, triangle (-1 octave) triangle (-2 octave)</li>\r\n		<li>knoppen: color, tune</li>\r\n	</ul>\r\n	</li>\r\n	<li>mixer:\r\n	<ul>\r\n		<li>level: osc 1, osc 2, osc 3/sub osc, noise</li>\r\n		<li>noise: white noise/pink noise</li>\r\n	</ul>\r\n	</li>\r\n	<li>pitch:\r\n	<ul>\r\n		<li>knop: envelope depth</li>\r\n		<li>envelope: attack time, decay time</li>\r\n	</ul>\r\n	</li>\r\n	<li>filter:\r\n	<ul>\r\n		<li>variatie: 1, 2</li>\r\n		<li>filter type: lpf (-24 dB), lpf (-18 dB), lpf (-12 dB), hpf (-12 dB), hpf (-18 dB), hpf (-24 dB)</li>\r\n		<li>knoppen: cutoff, resonance, velocity sens, envelope depth, key follow, hpf cutoff</li>\r\n		<li>envelope: attack time, decay time, sustain level, release time</li>\r\n	</ul>\r\n	</li>\r\n	<li>amplifier:\r\n	<ul>\r\n		<li>knoppen: velocity sens, tone, level</li>\r\n		<li>envelope: attack time, decay time, sustain level, release time</li>\r\n	</ul>\r\n	</li>\r\n	<li>effecten:\r\n	<ul>\r\n		<li>type: overdrive, distortion, metal, fuzz, crusher, phaser</li>\r\n		<li>knobs: tone, depth</li>\r\n	</ul>\r\n	</li>\r\n	<li>delay/chorus:\r\n	<ul>\r\n		<li>type: delay, panning delay, chorus 1, chorus 2, flanger, delay + chorus</li>\r\n		<li>knobs: time, level</li>\r\n	</ul>\r\n	</li>\r\n	<li>reverb:\r\n	<ul>\r\n		<li>type: ambience, room, hall 1, hall 2, plate, modulation</li>\r\n		<li>knobs: time, level</li>\r\n	</ul>\r\n	</li>\r\n	<li>other:\r\n	<ul>\r\n		<li>knoppen: portamento, tempo</li>\r\n		<li>controller: legato, tempo sync</li>\r\n		<li>key mode: mono/unison/poly</li>\r\n	</ul>\r\n	</li>\r\n	<li>step sequencer:\r\n	<ul>\r\n		<li>track: 1 per patch</li>\r\n		<li>step: 1 - 64 steps</li>\r\n		<li>recording method: step recording, realtime recording</li>\r\n		<li>controllers: scale, play mode, gate, shuffle, first step, last step</li>\r\n	</ul>\r\n	</li>\r\n	<li>overige knoppen:&nbsp;volume, input volume, arpeggio, chord memory, vocoder, keyhold, velocity off, transpose, octave</li>\r\n	<li>controllers:&nbsp;pitch bend wiel, modulatie-wiel, bend sens pitch, bend sens filter, mod sens pitch, mod sens filter</li>\r\n	<li>display:&nbsp;16 karakters 2 line LCD</li>\r\n	<li>extern geheugen: SD Card (SDHC ondersteund) voor back-up/herstel</li>\r\n	<li>connectoren:\r\n	<ul>\r\n		<li>phones: 6.3 mm stereo-jack</li>\r\n		<li>output (L/MONO, R): 2 x 6.3 mm mono-jack</li>\r\n		<li>input (L/MONO, R): 2 x 6.3 mm mono-jack</li>\r\n		<li>CV/GATE output: 3.5 mm jack (+10 V)</li>\r\n		<li>trigger in: 3.5 mm jack</li>\r\n		<li>pedaal (hold, control): 6.3 mm jack</li>\r\n		<li>MIDI (in, out)</li>\r\n		<li>USB-poort: USB type B (audio/MIDI)</li>\r\n		<li>DC IN</li>\r\n	</ul>\r\n	</li>\r\n	<li>stroomvoorziening: adapter (meegeleverd)</li>\r\n	<li>stroomverbruik: 2 A</li>\r\n	<li>afmetingen (BxLxH):&nbsp;881&nbsp;x 364 x 109 mm (34-11/16 x 14-3/8 x 4-5/16 inch)</li>\r\n	<li>gewicht (zonder adapter):&nbsp;5.9 kg (13 lbs 1 oz)</li>\r\n	<li>compatibel met: Roland DP-serie, Roland EV-5 (beide niet meegeleverd)</li>\r\n	<li>meegeleverd: handleiding en&nbsp;voedings-adapter met kabel</li>\r\n</ul>', 'Roland SYSTEM-8 Plug Out.jpg', 1, '2018-04-15 09:17:01', '2018-04-15 09:17:01'),
(2, 1, 1, 'TR-8S', '0.95', '<h3><strong>Algemeen</strong></h3>\r\n\r\n<p>Roland staat voor moderne synths en liet dit al eerder zien met de AIRA-serie waarin Rolands innovatieve ACB-technologie (Analog Circuit Behavior) verwerkt zat. Deze techniek wordt geprezen voor de authentieke reconstructie van de klank en het gedrag van historische, analoge synthesizers. De&nbsp;Roland SYSTEM-8 Plug-Out Synthesizer beschikt over een zeer geavanceerde ACB-chip, die een 8-stemmige polyfonie, drie oscillatoren, hoge-resolutie filters en polyvalente LFO&rsquo;s aanstuurt. Deze&nbsp;veelzijdige klankbron produceert dan ook alles van klassieke analoge pad-klanken, bassen en lead-synths tot frisse, dynamische klanken en ruimte-vullende structuren die begeerd worden door moderne klankontwerpers. Naast zijn eigen klankbron, heeft de SYSTEM-8 de mogelijkheid om drie Plug-Out software-synths aan te sturen, waarvan de JUPITER-8 direct mee wordt geleverd en de JUNO-106 spoedig zal volgen.</p>\r\n\r\n<p>Plug-Out: helemaal in</p>\r\n\r\n<p>Als de namen JUPITER-8 en JUNO-106 je al vrolijk maakten, dan kan je nog even doorgaan met lachen. Optionele Plug-Outs, zoals de SYSTEM-100, SH-101 en PROMARS, werken ook op de SYSTEM-8. In de performance-modus is het daarbij mogelijk om de interne synth-engine te combineren met de Plug-Outs om zo super-synths te scheppen&nbsp;met onder andere gelaagde stemmen en custom splits. Het cre&euml;ren van geluiden gaat vanzelf, dankzij het intu&iuml;tieve bedieningspaneel dat voorzien is van vele, vele knoppen en regelaars. In een handomdraai voeg je dan ook filters en effecten toe, waaronder side-band filter, overdrive, fuzz, delay, chorus, reverb en nog veel meer.</p>\r\n\r\n<p>Het juiste gereedschap</p>\r\n\r\n<p>Synthesizers zijn er om je eigen geluiden mee te cre&euml;ren en Roland weet dat als geen ander. De SYSTEM-8 bevat hiervoor dan ook allerlei leuke tools. Met de polyfone 64-step sequencer in TR-REC-stijl kun je eenvoudig loop-sequences opnemen, afspelen en bewerken. De arpeggio-functie met quick-access-knoppen maakt het mogelijk om snel van patronen en stijlen te wisselen, en dankzij chord memory speel je eenvoudig akkoorden met &eacute;&eacute;n vinger. Mocht dit nog niet genoeg zijn, dan is er zelfs een vocoder ingebouwd. Dankzij alle aanwezige aansluitingen (USB, MIDI, CV/GATE, etc.) is de SYSTEM-8 gemakkelijk te integreren in de studio. Een van de meest futuristische synths die je tegen kan komen, de&nbsp;Roland SYSTEM-8 Plug-Out Synthesizer!</p>\r\n\r\n<p><strong>Tips of opmerkingen over dit product</strong></p>\r\n\r\n<ul>\r\n	<li>Compatibel met: Roland DP-serie, Roland EV-5 (beide niet meegeleverd).</li>\r\n	<li>Meegeleverd: handleiding en&nbsp;voedings-adapter met kabel.</li>\r\n</ul>', '<h3>Productspecificaties</h3>\r\n\r\n<ul>\r\n	<li>Roland SYSTEM-8</li>\r\n	<li>Plug-Out Synthesizer</li>\r\n	<li>aantal toetsen: 49 (aanslaggevoelig)</li>\r\n	<li>klankgenerator-modellen: SYSTEM-8, PLUG-OUT1, PLUG-OUT2, PLUG-OUT3</li>\r\n	<li>maximale polyfonie: 8 stemmen bij SYSTEM-8, Plug-Out afhankelijk van software</li>\r\n	<li>geheugen:\r\n	<ul>\r\n		<li>patch: 64 (8 memories x 8 banks, per model)</li>\r\n		<li>performance: 64 (8 memories x 8 banks)</li>\r\n	</ul>\r\n	</li>\r\n	<li>LFO:\r\n	<ul>\r\n		<li>variaties: 1 (single LFO), 2 (dual LFO), 3 (resonanced pulse LFO)&nbsp;</li>\r\n		<li>golfvorm: sine, triangle, saw, square, sample&amp;hold, random</li>\r\n		<li>knoppen: fade time, rate, pitch, filter, amp</li>\r\n		<li>controllers: key trigger, trigger envelope</li>\r\n	</ul>\r\n	</li>\r\n	<li>oscillator 1:\r\n	<ul>\r\n		<li>variatie: 1, 2</li>\r\n		<li>golfvorm: saw, square, triangle, saw2, square2, triangle2</li>\r\n		<li>knoppen: color, modulation source (manual, lfo, p.env, f.env, a.env, osc 3), octave (64, 32, 16, 8, 4, 2), coarse tune, fine tune</li>\r\n		<li>modulatie: cross modulator</li>\r\n	</ul>\r\n	</li>\r\n	<li>oscillator 2:\r\n	<ul>\r\n		<li>variatie: 1, 2</li>\r\n		<li>golfvorm: saw, square, triangle, saw2, square2, triangle2</li>\r\n		<li>knoppen: color, modulation source (manual, lfo, p.env, f.env, a.env, osc 3), octave (64, 32, 16, 8, 4, 2), coarse tune, fine tune</li>\r\n		<li>modulatie: ring modulator, oscillator sync</li>\r\n	</ul>\r\n	</li>\r\n	<li>oscillator 3/sub-oscillator:\r\n	<ul>\r\n		<li>golfvorm: sine (-2 octave), sine (-1 octave), sine, triangle, triangle (-1 octave) triangle (-2 octave)</li>\r\n		<li>knoppen: color, tune</li>\r\n	</ul>\r\n	</li>\r\n	<li>mixer:\r\n	<ul>\r\n		<li>level: osc 1, osc 2, osc 3/sub osc, noise</li>\r\n		<li>noise: white noise/pink noise</li>\r\n	</ul>\r\n	</li>\r\n	<li>pitch:\r\n	<ul>\r\n		<li>knop: envelope depth</li>\r\n		<li>envelope: attack time, decay time</li>\r\n	</ul>\r\n	</li>\r\n	<li>filter:\r\n	<ul>\r\n		<li>variatie: 1, 2</li>\r\n		<li>filter type: lpf (-24 dB), lpf (-18 dB), lpf (-12 dB), hpf (-12 dB), hpf (-18 dB), hpf (-24 dB)</li>\r\n		<li>knoppen: cutoff, resonance, velocity sens, envelope depth, key follow, hpf cutoff</li>\r\n		<li>envelope: attack time, decay time, sustain level, release time</li>\r\n	</ul>\r\n	</li>\r\n	<li>amplifier:\r\n	<ul>\r\n		<li>knoppen: velocity sens, tone, level</li>\r\n		<li>envelope: attack time, decay time, sustain level, release time</li>\r\n	</ul>\r\n	</li>\r\n	<li>effecten:\r\n	<ul>\r\n		<li>type: overdrive, distortion, metal, fuzz, crusher, phaser</li>\r\n		<li>knobs: tone, depth</li>\r\n	</ul>\r\n	</li>\r\n	<li>delay/chorus:\r\n	<ul>\r\n		<li>type: delay, panning delay, chorus 1, chorus 2, flanger, delay + chorus</li>\r\n		<li>knobs: time, level</li>\r\n	</ul>\r\n	</li>\r\n	<li>reverb:\r\n	<ul>\r\n		<li>type: ambience, room, hall 1, hall 2, plate, modulation</li>\r\n		<li>knobs: time, level</li>\r\n	</ul>\r\n	</li>\r\n	<li>other:\r\n	<ul>\r\n		<li>knoppen: portamento, tempo</li>\r\n		<li>controller: legato, tempo sync</li>\r\n		<li>key mode: mono/unison/poly</li>\r\n	</ul>\r\n	</li>\r\n	<li>step sequencer:\r\n	<ul>\r\n		<li>track: 1 per patch</li>\r\n		<li>step: 1 - 64 steps</li>\r\n		<li>recording method: step recording, realtime recording</li>\r\n		<li>controllers: scale, play mode, gate, shuffle, first step, last step</li>\r\n	</ul>\r\n	</li>\r\n	<li>overige knoppen:&nbsp;volume, input volume, arpeggio, chord memory, vocoder, keyhold, velocity off, transpose, octave</li>\r\n	<li>controllers:&nbsp;pitch bend wiel, modulatie-wiel, bend sens pitch, bend sens filter, mod sens pitch, mod sens filter</li>\r\n	<li>display:&nbsp;16 karakters 2 line LCD</li>\r\n	<li>extern geheugen: SD Card (SDHC ondersteund) voor back-up/herstel</li>\r\n	<li>connectoren:\r\n	<ul>\r\n		<li>phones: 6.3 mm stereo-jack</li>\r\n		<li>output (L/MONO, R): 2 x 6.3 mm mono-jack</li>\r\n		<li>input (L/MONO, R): 2 x 6.3 mm mono-jack</li>\r\n		<li>CV/GATE output: 3.5 mm jack (+10 V)</li>\r\n		<li>trigger in: 3.5 mm jack</li>\r\n		<li>pedaal (hold, control): 6.3 mm jack</li>\r\n		<li>MIDI (in, out)</li>\r\n		<li>USB-poort: USB type B (audio/MIDI)</li>\r\n		<li>DC IN</li>\r\n	</ul>\r\n	</li>\r\n	<li>stroomvoorziening: adapter (meegeleverd)</li>\r\n	<li>stroomverbruik: 2 A</li>\r\n	<li>afmetingen (BxLxH):&nbsp;881&nbsp;x 364 x 109 mm (34-11/16 x 14-3/8 x 4-5/16 inch)</li>\r\n	<li>gewicht (zonder adapter):&nbsp;5.9 kg (13 lbs 1 oz)</li>\r\n	<li>compatibel met: Roland DP-serie, Roland EV-5 (beide niet meegeleverd)</li>\r\n	<li>meegeleverd: handleiding en&nbsp;voedings-adapter met kabel</li>\r\n</ul>', 'Roland TR-8S.png', 1, '2017-04-14 22:00:00', '2017-04-15 09:33:40'),
(3, 1, 1, 'System-1m Plug-Out', '0.70', '<h3><strong>Algemeen</strong></h3>\r\n\r\n<p>De launch van de Aira-serie zorgde een nieuwe en frisse look binnen het assortiment van Roland.&nbsp; De classics TB-303 en TR-808/909 kregen een nieuw jasje en (onder de kap) nieuwe technologie. Naast deze TB3 en TR8 zag ook de System-1 het levenslicht. Dit is een &#39;plug-out&#39;-synthesizer waarin u synthesizerimplementaties kunt uploaden, een soort host voor Roland plug-ins dus. De Roland System-1m modulaire Plug-Out synthesizer borduurt voort op dit pad en biedt u de nodig extra&#39;s.</p>\r\n\r\n<p><strong>Eigenschappen van de Roland System-1m</strong></p>\r\n\r\n<p>De naam geeft het eigenlijk al aan, de System-1m is een moduleversie van de eerder uitgebrachte System-1. Aangezien (onder de kap) de implementatie variabel is bestaat het frontpaneel in feite uit (gerichte) controllers. Net als de System-1 bedient u een tweetal oscillatoren, een LFO, een mixer (waarmee u ook een sub-oscillator en noise regelt) en een filter. Het geheel benadert de oude analoge sound accuraat dankzij Rolands ACB-technologie; Analog Circuit Behaviour. Nieuw in de System-1m zijn patchgaten; hiermee wordt de System-1m een semi-modulair systeem, een soort System-100 in een nieuw jasje dus.</p>\r\n\r\n<p><strong>Verder</strong></p>\r\n\r\n<p>Ook de lampjes die de Aira-serie zo herkenbaar maken ontbreken niet op de System-1m. Zelfs de patchgaten zijn verlicht, het geeft het geheel een indrukwekkende science fiction-uitstraling. Minstens zo bijzonder zijn de rackgaten: boven en onder, de System-1m is te installeren in een Eurorack. Natuurlijk behoort de klank bovenaan te staan in het lijstje met bijzonderheden. Roland heeft op dit vlak een reputatie hoog te houden en slaagt daar met dit product ook weer in. Bent u een echte sound-tweaker en/of EDM-knutselaar? Dan is de System-1m een heerlijk product waar u eindeloos plezier van krijgt.</p>', '<h3>Productspecificaties</h3>\r\n\r\n<ul>\r\n	<li>semi-modulaire virtueel analoge synthesizer</li>\r\n	<li>ACB-technologie: Analog Circuit Behaviour</li>\r\n	<li>polyfonie: 4 (System-1m mode)</li>\r\n	<li>user memory: 8</li>\r\n	<li>host-systeem voor synthesizerimplementaties</li>\r\n	<li>oscillatoren: 1, 2, sub, noise</li>\r\n	<li>portamento</li>\r\n	<li>filter: 12/24 dB, instelbaar type</li>\r\n	<li>onafhankelijke HPF</li>\r\n	<li>amplitude-ADSR</li>\r\n	<li>filter-ADSR</li>\r\n	<li>ge&iuml;ntegreerde effecten (crusher, reverb, delay)</li>\r\n	<li>fysieke controllers met LED-verlichting</li>\r\n	<li>patchgaten</li>\r\n	<li>Eurorack-formaat (84HP)</li>\r\n	<li>ook te monteren in een 19 inch rack</li>\r\n	<li>inclusief gevlochten patchkabels</li>\r\n	<li>afmetingen: 427 x 129 x 70 mm</li>\r\n	<li>gewicht: 1.25 kg</li>\r\n	<li>kleur: zwart</li>\r\n</ul>', 'Roland SYSYEM-1m.jpg', 1, '2018-05-02 22:00:00', '2018-05-20 07:20:24'),
(4, 1, 1, 'TB-03 Bass Line', '0.55', '<p><strong>Algemeen</strong></p>\r\n\r\n<p>Vergeet basgitaren, de Roland TB-303 Bass Line Synth produceerde pas vette baslijnen! Om deze retro-rakker eer aan te doen, biedt Roland de TB-03. De TB-03 is een compacte module-uitvoering (zonder klavier) behorende bij Rolands Boutique-lijn. In tegenstelling tot het origneel, heeft de TB-03 een LED-display met maar liefst 4 karakters, waardoor gevorderd programmeren een stuk gemakkelijker gaat. Het scala aan parameters, waaronder&nbsp;tuning, cutoff, resonance, envelop mod, decay en accent, regel je rechtstreeks met de aanwezige draaiknoppen. De basis wordt nog steeds gevormd door een zaagtand of blokvorm, voor de meest dikke bas-synthesizerklanken.</p>\r\n\r\n<p><strong>TB-03: veelzijdige bas</strong></p>\r\n\r\n<p>Om de golfvorm extra schwung mee te geven, is het apparaat uitgerust met overdrive-, delay- en reverb-effecten. Naast de pitch- en time-write-modi, is er een nieuwe step-modus toegevoegd met handige tempo-regeling. Roland heeft ook aan de aansluitingen gedacht, met onder andere een trigger input, MIDI in/out, USB-poort en CV/Gate-aansluiting, om allerlei analoge apparatuur, modulaire synths en DAW&#39;s aan te sturen. Ondanks de aanwezige toetsen, wordt de TB-03 hoofdzakelijk &#39;bespeeld&#39; middels de ingebouwde step sequencer. Ben je retro-fan of op zoek naar vunzige baslijnen? De Roland TB-03 Bass Line Boutique synthesizer-module levert het!</p>\r\n\r\n<p><strong>Tips of opmerkingen over dit product</strong></p>\r\n\r\n<ul>\r\n	<li>Meegeleverd: Boutique Dock DK-01 (silver),&nbsp;handleiding, alkaline-batterij (4x).</li>\r\n</ul>', '<p><strong>Productspecificaties</strong></p>\r\n\r\n<ul>\r\n	<li>Roland TB-03 Bass Line Boutique</li>\r\n	<li>synthesizer-module</li>\r\n	<li>voorzien van ingebouwde mini-speaker</li>\r\n	<li>voorzien van 13 mini-toetsen (1 octaaf)</li>\r\n	<li>ingebouwde standaard met drie kantelstanden</li>\r\n	<li>controllers:\r\n	<ul>\r\n		<li>volume-knop</li>\r\n		<li>tuning-knop</li>\r\n		<li>cut off freq knop</li>\r\n		<li>resonance-knop</li>\r\n		<li>env mod knop</li>\r\n		<li>decay-knop</li>\r\n		<li>accent-knop</li>\r\n		<li>overdrive-knop</li>\r\n		<li>delay time knop</li>\r\n		<li>delay feedback knop</li>\r\n		<li>wave form switch</li>\r\n		<li>track patt. group&nbsp;selector</li>\r\n		<li>mode-selector</li>\r\n		<li>tempo-knop</li>\r\n		<li>value-knop</li>\r\n		<li>pattern clear&nbsp;knop</li>\r\n		<li>run/stop knop</li>\r\n		<li>pitch mode knop</li>\r\n		<li>function knop</li>\r\n		<li>time mode knop</li>\r\n		<li>transpose up/down knoppen</li>\r\n		<li>accent-knop</li>\r\n		<li>slide-knop</li>\r\n		<li>back-knop</li>\r\n		<li>tap-knop</li>\r\n	</ul>\r\n	</li>\r\n	<li>effecten: overdrive (overdrive, distortion), delay (tape echo, digital delay, reverb)</li>\r\n	<li>indicatoren: 7 segmensten, 4 karakters, pitch mode LED, normal mode LED, time mode LED</li>\r\n	<li>connectoren:\r\n	<ul>\r\n		<li>trigger in: 3.5 mm mono-jack</li>\r\n		<li>cv output: 3.5 mm mono-jack</li>\r\n		<li>gate output: 6.3 mm mono-jack</li>\r\n		<li>phones jack: 3.5 mm stereo-jack</li>\r\n		<li>output jack: 3.5 mm stereo-jack</li>\r\n		<li>mix in: 3.5 mm stereo-jack</li>\r\n		<li>MIDI (IN, OUT) connectoren</li>\r\n		<li>USB-poort: Micro-B type (audio, MIDI)</li>\r\n	</ul>\r\n	</li>\r\n	<li>stroomvoorziening:\r\n	<ul>\r\n		<li>oplaadbare Ni-MH batterij&nbsp;(AA, HR6) x 4 (niet meegeleverd)</li>\r\n		<li>alkaline-batterij&nbsp;(AA, LR6) x 4 (meegeleverd)</li>\r\n		<li>USB bus power</li>\r\n	</ul>\r\n	</li>\r\n	<li>stroomverbruik:&nbsp;500 mA (USB bus power)</li>\r\n	<li>levensduur batterijen: ongeveer 5&nbsp;uur</li>\r\n	<li>afmetingen (LxBxH):&nbsp;308&nbsp;x 130&nbsp;x 52&nbsp;mm (12-1/8&nbsp;x 5-1/8&nbsp;x 2-1/16 inch)</li>\r\n	<li>gewicht&nbsp;(inclusief batterijen):&nbsp;940 gr (2 lbs)</li>\r\n	<li>meegeleverd: Boutique Dock DK-01 (silver),&nbsp;handleiding, alkaline-batterij (4x)</li>\r\n</ul>', 'Roland TB-03.jpg', 1, '2018-05-03 22:00:00', '2018-05-20 07:21:53'),
(5, 1, 2, 'Circuit Mono Station', '0.75', '<p><strong>Algemeen</strong></p>\r\n\r\n<p>Kleurige knopjes zijn altijd leuk. Novation weet dit ook en heeft dit daarom ge&iuml;ntegreerd in een synthesizer. Het resultaat: de Novation Circuit Mono Station! Deze parafonische analoge synthesizer in desktopvorm vormt zijn klank met twee oscillatoren, waarbij je kunt kiezen uit vier golfvormen: sawtooth, triangle, square en sample + hold. Daarbij heb je beschikking over sub-oscillator, ring mod en een noise generator. Zo heb je een rijke, veelzijdige basis voor al het synthgeweld. Hier houdt het niet op, want om de basisklank lekker te kleuren, zijn er maar liefst drie distortion-modi om uit te kiezen.</p>\r\n\r\n<p><strong>Circuit Mono Station: kleurrijk synth-station</strong></p>\r\n\r\n<p>Natuurlijk wil je ook filteren, wat kan met de multi-mode filter met high-pass, low-pass of band-pass. Ook heb je per oscillator een aanpasbare sync en tuning parameter. Voor nog meer geluidsplezier is er de modulatie-matrix, waarmee je eenvoudig effecten toevoegt aan je geluid. Ook zijn er drie sequencer tracks, om met een druk op de knop muziek tevoorschijn te toveren.&nbsp;Alle opties zijn eenvoudig te bedienen middels de aanwezige regelaars en de 32 (4x8) lichtgevende, aanslaggevoelige pads. Dankzij alle connectoren past deze Circuit gemakkelijk in je huidige setup. Houd jij van synth en kleurrijke pads? Dan is de Novation Circuit Mono Station jouw droomapparaat!</p>', '<p><strong>Productspecificaties</strong></p>\r\n\r\n<ul>\r\n	<li>Novation Circuit Mono Station</li>\r\n	<li>parafonische analoge synthesizer</li>\r\n	<li>2 oscillatoren</li>\r\n	<li>4 golfvormen (sawtooth, triangle, square, sample + hold)</li>\r\n	<li>sub-oscillator</li>\r\n	<li>ring mod</li>\r\n	<li>noise generator</li>\r\n	<li>individuele sync en tuning parameter per oscillator</li>\r\n	<li>high-pass, low-pass en band-pass filters (12 en 24 dB)</li>\r\n	<li>3 distortion-modi</li>\r\n	<li>monophonic en paraphonic modi met individuele glide control</li>\r\n	<li>vier-bij-acht modulatie-matrix voor complexe alteratie en routing</li>\r\n	<li>bewaar en laad tot 64 patches</li>\r\n	<li>3 sequencer tracks (2 oscillator, 1 modulatie)</li>\r\n	<li>32 aanslaggevoelige RGB-pads</li>\r\n	<li>16 scale types</li>\r\n	<li>veranderbare sync rates</li>\r\n	<li>connectoren:\r\n	<ul>\r\n		<li>hoofdtelefoon: 3.5 mm jack</li>\r\n		<li>line out: 6.3 mm jack</li>\r\n		<li>audio in: 6.3 mm jack</li>\r\n		<li>MIDI&nbsp;in, out, thru: 3 x 3.5 mm jack</li>\r\n		<li>clock in, out: 2 x 3.5 mm jack</li>\r\n		<li>note out cv, gate: 2 x 3.5 mm jack</li>\r\n		<li>aux cv: 3.5 mm jack</li>\r\n		<li>USB</li>\r\n	</ul>\r\n	</li>\r\n	<li>voeding: 12 V DC-adapter (1A)</li>\r\n</ul>', 'Novation Circuit Mono Station.jpg', 1, '2018-05-04 22:00:00', '2018-05-20 07:33:11'),
(6, 1, 2, 'Bass Station II', '0.55', '<p><strong>Algemeen</strong></p>\r\n\r\n<p>Met de Novation Bass Station II analoge synthesizer krijgt u een &#39;wicked little synth bass&#39; in handen. Deze mono-synth heeft een volstrekt analoog signaalpad. Om te beginnen zijn er twee analoge oscillators plus een sub-oscillator, de oscillatoren ondersteunen sync, tuning en hebben vier waveforms. Er is een tweetal filters, de originele filter van de Bass Station 1 en een nieuw &#39;acid&#39;-filter. Een sectie met analoge effecten maakt het geheel af.</p>\r\n\r\n<p><strong>Meer functies</strong></p>\r\n\r\n<p>Het aanslaggevoelige keyboard heeft aftertouch, voelt goed aan en is ideaal voor de doelgroep. U kunt uw eigen klank opslaan in een van de 64 user slots. Als u weinig op heeft met het zelf maken van klanken kunt u ook een van de 64 fabrieksklanken kiezen. Verder zit er een redelijk uitgebreide step sequencer en arpeggiator in, erg interessant om uw klank mee te testen of om gewoon mee te spelen. De echte synthfreak zal zich ruim vermaken met de vele dedicated draaiknoppen en faders, ook is er het een en ander mogelijk op het gebied van modulatie; twee envelopes, twee LFOs, de Bass Station 2 is behoorlijk uitgebreid.</p>\r\n\r\n<p><strong>Een stukje geschiedenis</strong></p>\r\n\r\n<p>Als u aan het begin van de jaren 90 al met (elektronische) muziek bezig was dan zult u zich wellicht de Novation Bass Station nog kunnen herinneren. Het was de tijd waarin de wederopstanding van de analoge synthesizers centraal stond. Het was de tijd waarin synthesizers weer klein en specialistisch werden, in tegenstelling tot de workstations en ROMplers uit die tijd die alsmaar groter werden. De originele Bass Station hielp Novation groot te maken, uiteindelijk zouden de Supernova&#39;s de paradepaardjes worden.</p>', '<p><strong>Productspecificaties</strong></p>\r\n\r\n<ul>\r\n	<li>Novation Bass Station 2 analoge synthesizer</li>\r\n	<li>volledig analoog signaalpad</li>\r\n	<li>monofoon</li>\r\n	<li>oscillatoren: 2 + sub + noise</li>\r\n	<li>oscillator-waveforms: sine, triangle, saw, square/pulse</li>\r\n	<li>sync, tune, octave range, pitch bend</li>\r\n	<li>pulse width modulation</li>\r\n	<li>sub-oscillator: sine, square, narrow pulse</li>\r\n	<li>mixer: osc1, osc2, sub, noise, ring, externe input</li>\r\n	<li>filter: multi-mode (LPF, BPF, HPF, 12dB, 24dB)</li>\r\n	<li>ADSR: 2x</li>\r\n	<li>LFO: 2x (tri, saw, sqr, s&amp;h) met delay/speed, keysync en slew</li>\r\n	<li>effecten: 2x (distortion, oscillator filter mod amount)</li>\r\n	<li>arpeggiator: 32 patronen, 4-octave range, swing, latch, 6 richtingspatronen</li>\r\n	<li>step sequencer: tot 4 sequences, rusten, legato, re-trigger, presets</li>\r\n	<li>portamento</li>\r\n	<li>aantal toetsen: 25, aanslaggevoelig met aftertouch</li>\r\n	<li>pitch wheel</li>\r\n	<li>modulation wheel</li>\r\n	<li>octave +/-</li>\r\n	<li>fabrieksklanken: 64</li>\r\n	<li>ruimte voor eigen klanken: 64</li>\r\n	<li>master volume</li>\r\n</ul>\r\n\r\n<p>Aansluitingen:</p>\r\n\r\n<ul>\r\n	<li>USB-MIDI</li>\r\n	<li>traditioneel MIDI</li>\r\n	<li>mono outputs, 6.35 mm jack</li>\r\n	<li>hoofdtelefoon, 6.35 mm jack</li>\r\n	<li>externe input, 6.35 mm jack</li>\r\n	<li>sustainpedaal, 6.35 mm jack</li>\r\n	<li>AC power</li>\r\n</ul>\r\n\r\n<p>Wordt geleverd met:</p>\r\n\r\n<ul>\r\n	<li>Ableton Live Lite</li>\r\n	<li>voeding</li>\r\n	<li>USB-kabel</li>\r\n</ul>', 'Novation 	Bass Station II.jpg', 1, '2018-05-05 22:00:00', '2018-05-20 07:38:46'),
(7, 3, 3, '8M Thunderbolt en USB geluidskaart', '1.25', '<p><strong>Algemeen</strong></p>\r\n\r\n<p>De hoge kwaliteit Motu 8M is een uitgebreide en flexibele Thunderbolt- en USB-geluidskaart. Deze audio interface kunt u inzetten voor de meest uiteenlopende klussen. Aan de achterzijde bevindt zich namelijk een achttal XLR/jack combo-aansluitingen. Sluit hier op aan wat u wilt, zoals microfoons, gitaren, keyboards en externe effectapparaten. En dan hebben we het nog niet eens over de optische ADAT-in/outputs (16 kanalen)en de acht 6.3 mm-uitgangen. De krachtige ingebouwde mixer met topkwaliteit effecten is aanstuurbaar via laptop, smartphone of tablet. Routing van in- en uitgangen is kinderspel.</p>\r\n\r\n<p><strong>8M: snelheid en communicatie</strong></p>\r\n\r\n<p>Wie Thunderbolt hoort, denkt ongetwijfeld aan snelheid en dat zien we duidelijk terug. Indien uw computer beschikt over dit type aansluiting, kunt u erop rekenen dat er wel 128 kanalen (in &eacute;n uit!) zonder problemen heen en weer worden gestuurd. Daarnaast kunt u gebruikmaken van de USB-verbinding. Stel de gain (tot 53 dB) van de preamps van de 8M in met de zeer nauwkeurige draaiknoppen en voorkom clipping met de hardware limiter (V-Limit). Mocht u toch nog kanalen tekort komen, sluit dan simpelweg een tweede interface aan (de 1248 of 16A) op de ethernet-connector en drie tot vijf interfaces middels de optionele AVB Switch.</p>\r\n\r\n<p><strong>Topkwaliteit op alle vlakken</strong></p>\r\n\r\n<p>Zoals gezegd, is de 8M een hoogwaardige interface. Het is dan ook niet verwonderlijk dat we topkwaliteit converters aantreffen (de befaamde ESS Sabre32 Ultra), gekoppeld aan analoge circuits waarin maar liefst dertig jaar aan vakmanschap terug te vinden is. Verder bent u verzekerd van een daadwerkelijk dynamisch bereik van niet minder dan 123 dB op de analoge uitgangen en bezit de geluidskaart een zeer lage hardware-latency van 0.66 ms. De ingebouwde effecten tot slot, zijn nauwkeurig gemodelleerd naar legendarische effectapparaten, waaronder de LA-2A compressor en Britse analoge mengtafel-EQ&#39;s.</p>\r\n\r\n<p><strong>Tips of opmerkingen over dit product</strong></p>\r\n\r\n<ul>\r\n	<li>Voor aansluiting op een iPad heeft u de optionele Camera Connection Kit (30 pins) of USB-Lightning-adapter nodig.</li>\r\n</ul>', '<p><strong>Productspecificaties</strong></p>\r\n\r\n<ul>\r\n	<li>Thunderbolt/USB-audio interface</li>\r\n	<li>19 inch rack-monteerbaar</li>\r\n	<li>voor PC, Mac en iPad (zie opmerkingen)</li>\r\n	<li>ESS Sabre32 Ultra-converters</li>\r\n	<li>dynamisch bereik:\r\n	<ul>\r\n		<li>line out: 123 dB</li>\r\n		<li>main out: 123 dB</li>\r\n		<li>line in: 117 dB</li>\r\n		<li>mic in: 118 dB</li>\r\n	</ul>\r\n	</li>\r\n	<li>zeer lage latency</li>\r\n	<li>V-Limit overload-bescherming</li>\r\n	<li>ingebouwde DSP met 48-kanaals mixer en gemodelleerde effecten</li>\r\n	<li>DSP met zeer hoge headroom</li>\r\n	<li>2e interface (1248 of 16A) verbinden via ethernet-aansluiting</li>\r\n	<li>3 tot 5 interfaces verbinden via optionele Motu AVB Switch</li>\r\n	<li>tot 128 kanalen I/O mogelijk via Thunderbolt</li>\r\n	<li>Web app-aansturing op laptop, tablet of smartphone (bedraad of WiFi) (zie opmerkingen)</li>\r\n	<li>sample rates: 44.1 - 192 kHz</li>\r\n	<li>ingangen: 8x XLR/TRS combo-stijl mic/line/instrument</li>\r\n	<li>uitgangen: 8x 6.3 mm TRS line, 1x 6.3 mm TRS hoofdtelefoon (toewijsbaar)</li>\r\n	<li>digitale in/uitgangen:\r\n	<ul>\r\n		<li>2 banken (16 kanalen) ADAT optisch</li>\r\n		<li>1 bank (8 kanalen) SMUX optisch</li>\r\n	</ul>\r\n	</li>\r\n	<li>computer in/uit:\r\n	<ul>\r\n		<li>Thunderbolt (compatibel met 1 en 2)</li>\r\n		<li>USB 2.0</li>\r\n	</ul>\r\n	</li>\r\n	<li>word clock in en uit</li>\r\n	<li>fantoomspanning: 8x individuele +48 V</li>\r\n	<li>regelingen:\r\n	<ul>\r\n		<li>hoofdtelefoon-volume</li>\r\n		<li>microfoon preamp-gain (8x)</li>\r\n	</ul>\r\n	</li>\r\n	<li>schakelaars: 8x pad, 8x 48 V</li>\r\n	<li>324 x 324 pixel LCD-scherm voor level meters en menunavigatie</li>\r\n	<li>ethernet-aansluiting (Cat-5e)</li>\r\n	<li>inclusief:\r\n	<ul>\r\n		<li>drivers</li>\r\n		<li>Discovery App voor Mac en voor iOS</li>\r\n		<li>Control web app</li>\r\n		<li>AudioDesk 4.0 (download)</li>\r\n	</ul>\r\n	</li>\r\n</ul>\r\n\r\n<p>Systeemvereisten Mac</p>\r\n\r\n<ul>\r\n	<li>1 GHz Intel of sneller</li>\r\n	<li>2 GB RAM, 4 GB aanbevolen</li>\r\n	<li>Mac OS X 10.8 of nieuwer</li>\r\n	<li>Thunderbolt- of USB 2.0-aansluiting</li>\r\n	<li>min. 500 GB harde schijf voor opnames</li>\r\n</ul>\r\n\r\n<p>Systeemvereisten Windows</p>\r\n\r\n<ul>\r\n	<li>1 GHz Pentium of sneller</li>\r\n	<li>2 GB RAM, 4 GB aanbevolen</li>\r\n	<li>Windows 8 of nieuwer</li>\r\n	<li>Thunderbolt- of USB 2.0-aansluiting</li>\r\n	<li>min. 500 GB harde schijf voor opnames</li>\r\n</ul>', 'Motu 8M.jpg', 1, '2018-05-06 22:00:00', '2018-05-21 10:22:39'),
(8, 3, 4, 'UR22mkII audio interface', '0.25', '<p><strong>Algemeen</strong></p>\r\n\r\n<p>Met de Steinberg UR22mkII audio interface brengt u een hoogwaardig stukje techniek in uw muziekstudio. En daarbuiten overigens; steeds meer producers werken mobiel met een laptop, en ook daarvoor is deze interface erg interessant. Allereerst de keiharde cijfers: 24 bit, 192 kHz. Dat geeft u simpelweg een interface van topkwaliteit, met name omdat er D-PRE voorsterkers van Yamaha inzitten en omdat de behuizing zeer solide is. Latency is er niet, de workflow met uw muziekproject is daardoor erg comfortabel.</p>\r\n\r\n<p><strong>Steinberg UR22 mk2: de eigenschappen</strong></p>\r\n\r\n<p>De naamgever is weliswaar Steinberg, deze interface werkt met alle grote namen in de wereld van muzieksoftware. Het enige wat u nodig heeft is ondersteuning van ASIO, Core Audio of WDM. Ook kunt u dit product gebruiken met uw iPad, en met het groeiende aantal muzikale iOS-apps bent u dus goed voorbereid op de toekomst. MIDI is aanwezig in de vorm van een input en een output. En alhoewel USB-MIDI steeds vaker de norm blijkt is het toch &eacute;rg handig dat de klassieke DIN-MIDI hier ondersteund wordt.</p>\r\n\r\n<p><strong>Software</strong></p>\r\n\r\n<p>Steinberg (tegenwoordig overigens eigendom van Yamaha) is genereus als het op software aankomt. Meegeleverd is een licentie voor Cubase AI, hiermee kunt u direct uw eigen muziek opnemen, componeren, arrangeren, editen en mixen. Ook krijgt u Cubasis LE, en dit is erg leuk voor mobiele producers. Dit pakket is namelijk geschikt voor iOS, en draait dus op de iPad. AI voor in de studio en LE voor onderweg dus. Het spreekt voor zich dat deze software perfect samenwerkt met deze hoofdwaardige UR22mkII-interface.</p>', '<p><strong>Productspecificaties</strong></p>\r\n\r\n<ul>\r\n	<li>Steinberg UR22 mk2</li>\r\n	<li>audio interface</li>\r\n	<li>type interface: USB 2.0</li>\r\n	<li>signaalkwaliteit: 24 bit, 192 kHz</li>\r\n	<li>hoogwaardige D-PRE microfoonvoorversterkers van Yamaha</li>\r\n	<li>geen latency</li>\r\n	<li>werkt met audiosoftware die voldoet aan:\r\n	<ul>\r\n		<li>ASIO</li>\r\n		<li>Core Audio</li>\r\n		<li>WDM</li>\r\n	</ul>\r\n	</li>\r\n	<li>ook voor iPad/iOS</li>\r\n	<li>inputs:\r\n	<ul>\r\n		<li>mic/line 1 (XLR/jack)</li>\r\n		<li>mic/line 2 (XLR/jack)</li>\r\n	</ul>\r\n	</li>\r\n	<li>gain instelbaar voor input 1, 2</li>\r\n	<li>Hi-Z schakelbaar voor input 2</li>\r\n	<li>outputs:\r\n	<ul>\r\n		<li>line (2x jack)</li>\r\n		<li>hoofdtelefoon</li>\r\n	</ul>\r\n	</li>\r\n	<li>schakelbare fantoomvoeding</li>\r\n	<li>MIDI in/out</li>\r\n	<li>voeding:\r\n	<ul>\r\n		<li>5V DC</li>\r\n		<li>USB 2.0</li>\r\n	</ul>\r\n	</li>\r\n	<li>instelbaar:\r\n	<ul>\r\n		<li>gain input 1, input 2</li>\r\n		<li>balans input/DAW</li>\r\n		<li>hoofdtelefoon</li>\r\n		<li>output</li>\r\n	</ul>\r\n	</li>\r\n	<li>peak-indicators</li>\r\n	<li>inclusief software:\r\n	<ul>\r\n		<li>Cubase AI</li>\r\n		<li>Cubasis LE</li>\r\n	</ul>\r\n	</li>\r\n	<li>afmetingen: 158.6 x 45.4 x 158.3 mm</li>\r\n	<li>gewicht: 998 gr</li>\r\n</ul>', 'Steinberg UR22mkII.jpg', 1, '2018-05-07 22:00:00', '2018-05-21 10:28:19'),
(9, 4, 5, 'Push 2', '0.95', '<p><strong>Algemeen</strong></p>\r\n\r\n<p>Ableton Push 2 (Engels) controller voor Live is het nieuwe speeltje voor de eigentijdse EDM-producer. En dat mag je best letterlijk nemen: spelen en performen met de Push 2 staat aan de basis van je muzikale creaties. Wie de eerste Push kent ziet direct dat er her en der wat subtiele wijzigingen zijn aangebracht aan de lay-out van de Push 2. Een betere gebruikservaring, het gevolg van de verkregen gebruikers-feedback. Veel opvallender is het mooie nieuwe kleurendisplay. Ook de nieuwe RGB-pads (zachter, &#39;smoother&#39; en meer responsief) dragen bij aan het gebruiksplezier.</p>\r\n\r\n<p><strong>Ableton Push 2:&nbsp;Meegeleverde software</strong></p>\r\n\r\n<p>Je hebt eigenlijk alleen een goede computer of laptop nodig (Windows of OS X), en dan kun je aan de slag. Bij je aanschaf van Push 2 krijg je namelijk ook een licentie van Ableton Live 10 Intro. De Push 2 werkt naadloos samen met dit softwarepakket, in no-time sleutel je je eigen superieure EDM-beats in elkaar met de meegeleverde samples, audio-effecten en MIDI-effecten. Er is al heel wat mogelijk met deze Intro-versie van Ableton Live. Als je ooit meer (heel veel meer!) effecten en samples wenst kun je altijd voordelig upgraden naar de Standard- of de Suite-versie.</p>\r\n\r\n<p><strong>Het succesverhaal van Ableton Live en Push</strong></p>\r\n\r\n<p>De populariteit van Ableton Live en de Push-controller moet beslist niet onderschat worden; vele producers en DJ&#39;s zijn fervente Live-gebruikers geworden. Waar er vroeger autonome hardware en autonome software was (en dat waren ook echt twee gescheiden werelden) volgt hedendaagse hardware juist steeds meer de filosofie en de werkomgeving van software. Dit is ook precies waarom de Push punten pakt: het is een controller die naadloos is toegespitst op de populaire Ableton Live-software. Je kunt met de Push vlot en eenvoudig complete songs maken zonder de computermuis aan te hoeven raken. Hiermee heb je de snelle hands-on bediening van vroeger, maar met de computerintegratie en de mogelijkheden van nu.</p>', '<p><strong>Productspecificaties</strong></p>\r\n\r\n<ul>\r\n	<li>Ableton Push 2</li>\r\n	<li>controller voor Ableton Live</li>\r\n	<li>MPC-style workflow</li>\r\n	<li>ideaal voor het EDM-genre</li>\r\n	<li>meegeleverde documentatie: taal naar keuze instelbaar</li>\r\n	<li>pads:\r\n	<ul>\r\n		<li>gemaakt van siliconen</li>\r\n		<li>verbeterd gevoel: zachter, smoother, extra responsief</li>\r\n		<li>8x8 backlit RGB LEDs</li>\r\n	</ul>\r\n	</li>\r\n	<li>ruim kleurendisplay</li>\r\n	<li>touch strip\r\n	<ul>\r\n		<li>lengte: 7 cm</li>\r\n		<li>LEDs: 24</li>\r\n	</ul>\r\n	</li>\r\n	<li>sample-editing vanaf de Push: slicing, afspelen, bewerking</li>\r\n	<li>8 encoders voor de mixer, devices en instrumenten, en navigatie Live browser</li>\r\n	<li>inclusief licentie voor Ableton Live 10 Intro (een download)</li>\r\n	<li>behuizing: deels aluminium</li>\r\n	<li>meegeleverde externe voeding: 12V DC 1.25A (universeel: VS, Japan, Europa, UK)</li>\r\n	<li>USB-power: 5V/0.5A</li>\r\n	<li>twee inputs voor pedalen</li>\r\n	<li>Kensington Lock</li>\r\n	<li>afmetingen: 378 x 304 x 42 mm (14.88 x 11.96 x 1.65 inch) inclusief encoders</li>\r\n	<li>gewicht: 2.7 kg (6.0 lbs)</li>\r\n	<li>kleur: zwart</li>\r\n</ul>', 'Ableton Push 2.jpg', 1, '2018-05-08 22:00:00', '2018-05-23 07:00:30'),
(10, 4, 6, 'MPC X', '2.45', '<p><strong>Algemeen</strong></p>\r\n\r\n<p>Het vlaggenschip onder de muziekproductie consoles van Akai: de MPC X. Het gaat hier om een volledig zelfstandig functionerend workstation waarbij een 10.1 inch multi-touch-scherm centraal staat. Via dit scherm zijn tal van bewerkingen mogelijk. Een intu&iuml;tieve workflow is gegarandeerd door de prettige indeling van de encoders en controllers op de MPC X. Deze ervaring wordt verder versterkt door de MPC Software 2.0 dat nu ge&iuml;ntegreerd is. Naast dat de MPC X in standalone-modus werkt, fungeert de software tevens als plug-in zodat je deze kunt gebruiken in je iegen DAW.&nbsp;</p>\r\n\r\n<p><strong>Voor de intu&iuml;tieve artiest</strong></p>\r\n\r\n<p>De workflow van de MPC X is niet alleen zeer overzichtelijk en prettig, maar het herdefinieert jouw kijk op muziekproductie volledig. De naadloze integratie tussen de drukgevoelige 16 RGB pads, controlers, encoders en natuurlijk het grote touch screen in combinatie met de MPC Sofware 2.0 is subliem. Er was nog nooit zo veel ruimte voor creatieve expressie.&nbsp;Naast de pads vind je als gebruiker tevens 16 zogenaamde Q-links met OLED displays die je kunt linken aan allerlei parameters. Deze zijn geheel door jou zelf in te stellen voor een volledig gepersonifieerde ervaring.&nbsp;</p>\r\n\r\n<p><strong>Centraal in elke productieomgeving</strong></p>\r\n\r\n<p>Akai&#39;s intentie was overduidelijk: de MPC X dient centraal te staan in elke productieomgeving. Dit betekent dat er rekening is gehouden met alle in- en uitgangen die jij als producent nodig hebt. Connectiviteit met randapparatuur is mogelijk door onder meer de gecombineerde XLR/6.35 mm jack-connectoren, RCA en Hi-Z-ingangen en daarnaast 8 gebalanceerde 6.35 mm jack-uitgangen. Tevens is er 48 V fantoomvoeding beschikbaar om je condensatormicrofoons van spanning te voorzien. Alle aspecten van productieproces zijn te monitoren door middel van interactieve VU-meters. Naast dat de MPC X ge&iuml;nstalleerd is met 10 &nbsp;gigabyte aan samples, is deze verder uit te breiden met een 2,5 inch SATA SSD of HDD.</p>', '<p><strong>Productspecificaties</strong></p>\r\n\r\n<ul>\r\n	<li>standalone muziekwerkstation&nbsp;</li>\r\n	<li>ingangen:\r\n	<ul>\r\n		<li>4 x gecombineerde 6.35 mm jack/XLR-connectoren</li>\r\n		<li>+48 V fantoomvoeding</li>\r\n		<li>2 x TRS 6.35 mm jack-connectoren (1 stereopaar)</li>\r\n		<li>2 x 6.35 mm TS voetschakelaaringangen&nbsp;</li>\r\n		<li>RCA&nbsp;</li>\r\n		<li>2 x 5-pins MIDI</li>\r\n		<li>2 x USB A (3.0)</li>\r\n		<li>SD-kaartslot</li>\r\n	</ul>\r\n	</li>\r\n	<li>stroomadapter: 19 V, 3.42 A, center-positive, meegeleverd&nbsp;</li>\r\n	<li>uitgangen:\r\n	<ul>\r\n		<li>8 x 6.35 mm gebalanceerde TRS jack-connectoren &nbsp;</li>\r\n		<li>1 x 6.35 mm en 1 x 3.5 mm stereo hoofdtelefoon</li>\r\n		<li>4 x 5-pins MIDI&nbsp;</li>\r\n		<li>USB-B&nbsp;</li>\r\n	</ul>\r\n	</li>\r\n	<li>maximale opnameresolutie:&nbsp;</li>\r\n	<li>standalone-modus: 24-bit, 44.1 kHz</li>\r\n	<li>controller-modus: 24-bit, 96 kHz</li>\r\n	<li>MPC 2.0 software tevens als plug-in voor DAW in&nbsp;Mac en PC te gebruiken</li>\r\n	<li>Bluetooth 4.0</li>\r\n	<li>16&nbsp;gigabyte on-board opslag (waaronder 10 GB aan CR2, Toolroom, loopmasters, Capsun Pro Audio etc.)</li>\r\n	<li>uitbreidbaar met 2.5 inch SATA (SSD of HDD)</li>\r\n	<li>10.1 inch touch kleurenscherm (ondersteuning voor tap, double-tap, drag en pinch)</li>\r\n	<li>stroomtoevoer: stroomadapter (meegeleverd)</li>\r\n	<li>16 Q-link regelaars met OLED displays&nbsp;</li>\r\n	<li>transport: record, overdub, stop, play en play/start</li>\r\n	<li>dial: scroll wheel om door menu-opties heen te bladeren&nbsp;</li>\r\n	<li>master volume: algehele volumebeheer</li>\r\n	<li>CPU: processor: 1.8 Ghz quad-core ARM. Cortex. A17 processor</li>\r\n	<li>RAM: 2 gigabyte</li>\r\n	<li>systeemvereisten wanneer MPC Software gebruikt wordt als plug-in:\r\n	<ul>\r\n		<li>Mac: dual-core CPU, 2.5 Ghz of hoger en 4 GB RAM (8 GB aanbevolen)</li>\r\n		<li>Windows: dual-core CPU, 2.5 Ghz of hoger en 4 GB RAM (8 GB aanbevolen)</li>\r\n		<li>opslag: 2 GB vrije ruimte voor MPC Software</li>\r\n	</ul>\r\n	</li>\r\n	<li>afmetingen (B x D x H):\r\n	<ul>\r\n		<li>50.5 x 42.4 x 8.7 cm / 19.9 x 16.7 x 3.4 inch (display naar benden)</li>\r\n		<li>50.5 x 38.8 x 21.4 cm / 19.9 x 15.3 x 8.4 inch (display naar boven)</li>\r\n	</ul>\r\n	</li>\r\n	<li>gewicht: 5.66 kg / 12.57 lbs</li>\r\n	<li>meegeleverd:\r\n	<ul>\r\n		<li>voedingsadapter</li>\r\n		<li>USB-kabel</li>\r\n		<li>download-code voor software</li>\r\n		<li>quickstart</li>\r\n		<li>garantie</li>\r\n	</ul>\r\n	</li>\r\n</ul>', 'AKAI MPC X.jpg', 1, '2018-05-09 22:00:00', '2018-05-23 07:04:16'),
(11, 4, 7, 'Maschine MK3', '0.80', '<p><strong>Algemeen</strong></p>\r\n\r\n<p>We moeten even terug in de tijd voor de roots van een apparaat als de Maschine. De jaren 80 om precies te zijn; vanaf dat moment verschenen er geregeld grote machines met pads en een sequencer in de markt. Drie decennia verder is deze productiemethode nog immer aanwezig. De Native Instruments Maschine MK3 controller zwart bewijst dat er nog steeds verbeteringen mogelijk bleken. Deze MK3 is dan ook het summum voor o.a. de groove-producers: het is zowel een USB/MIDI-controller als een productiestation met eigen audio-interface!</p>\r\n\r\n<p><strong>Maschine MK3: Wat is er nieuw?</strong></p>\r\n\r\n<p>Wat gelijk in &#39;t oog springt zijn de twee grote kleurendisplays, een chique verbetering ten opzichte van de MK2. Dit is een zeer comfortabele manier om je NKS-compatibel plug-ins mee te bedienen. Er zit nu een handige controller op, een soort mix van een push-encoder en een cursor. Deze MK3 heeft nu ook een touch-strip welke je kunt gebruiken om bijvoorbeeld strumming en pichtbend toe te passen op je klanken. Leuk voor je performance: er zit een Note Repeat-button op voor snelle drumrolls en arpeggiators. Ook transport-buttons ontbreken niet, zij maken het leven van een in-the-box producer een stuk makkelijker.</p>\r\n\r\n<p><strong>Een complete studio</strong></p>\r\n\r\n<p>Hoe complex je groove ook dreigt te worden: met de Maschine MK3 behoud je het overzicht. De grooves maak je overigens met zeer hoogwaardige pads, gekleurd door RGB-LEDs. De audio-interface is er ook eentje die helemaal in deze tijd past, met een signaalkwaliteit van maximaal 96 kHz, 24 bit. Ook krijg je er Komplete 11 SELECT bij, naast de 8 GB aan o.a. drumkits en loops die er ook bij zitten. Komplete 11 SELECT is een kleine versie van het populaire Komplete 11-pakket, wie toch met de Standard- of Ultimate-versie wil werken kan investeren in een speciale upgrade vanuit de SELECT-versie.</p>', '<p><strong>Productspecificaties</strong></p>\r\n\r\n<ul>\r\n	<li>NI Maschine MK3</li>\r\n	<li>USB/MIDI controller, productiestation</li>\r\n	<li>aantal drumpads: 16, backlit RGB, aanslaggevoelig, aftertouch</li>\r\n	<li>aantal encoders: 8</li>\r\n	<li>aantal group-buttons: 8</li>\r\n	<li>touch strip (dual touch)</li>\r\n	<li>twee ruime kleurendisplays</li>\r\n	<li>speciale cursor/push-encoder</li>\r\n	<li>audio-interface\r\n	<ul>\r\n		<li>signaalkwaliteit: 96 kHz, 24 bit</li>\r\n		<li>2x 6.3 mm inputs</li>\r\n		<li>2x 6.3 mm outputs</li>\r\n		<li>microfooningang: 6.3 mm (voor een dynamische microfoon)</li>\r\n		<li>hoofdtelefoonaansluiting</li>\r\n		<li>DIN-MIDI in, out</li>\r\n		<li>aansluiting voor voetschakelaar of voetpedaal</li>\r\n	</ul>\r\n	</li>\r\n	<li>USB-gevoed (USB-kabel meegeleverd) in combinatie met een computer</li>\r\n	<li>inclusief adapter (15V 1.2A) voor stand-alone gebruik, inclusief vier reisadapters</li>\r\n	<li>inclusief software, downloads na registratie:\r\n	<ul>\r\n		<li>MASCHINE software</li>\r\n		<li>MASCHINE Factory Library</li>\r\n		<li>Komplete 11 SELECT</li>\r\n	</ul>\r\n	</li>\r\n	<li>ondersteunde interfaces:\r\n	<ul>\r\n		<li>stand-alone</li>\r\n		<li>VST</li>\r\n		<li>AU</li>\r\n		<li>AAX32</li>\r\n		<li>AAX64</li>\r\n		<li>ASIO</li>\r\n		<li>CoreAudio</li>\r\n		<li>WASAPI</li>\r\n	</ul>\r\n	</li>\r\n	<li>systeemeisen:\r\n	<ul>\r\n		<li>Mac OS X 10.11, macOS 10.12, Intel Core i5</li>\r\n		<li>Windows 7 of nieuwer, Intel Core i5 of equivalent</li>\r\n		<li>OpenGL 2.1-compatible videokaart/videochip</li>\r\n		<li>internetverbinding voor activatie en downloads</li>\r\n		<li>systeemgeheugen: 2 GB (4 GB of meer aanbevolen voor grote(re) virtuele instrumenten)</li>\r\n		<li>USB-aansluiting</li>\r\n	</ul>\r\n	</li>\r\n	<li>afmetingen: 320 x 301 x 41 mm (12.6 x 11.85 x 1.61 inch)</li>\r\n	<li>gewicht: 2.2 kg (4.85 lbs)</li>\r\n	<li>kleur: zwart</li>\r\n</ul>', 'Native Instruments MK3.jpg', 1, '2018-05-10 22:00:00', '2018-05-23 07:09:19');
INSERT INTO `products` (`id`, `category_id`, `merk_id`, `naam`, `huurprijs`, `omschrijving`, `details`, `foto`, `online`, `created_at`, `updated_at`) VALUES
(12, 5, 8, 'Rockit 6 G3 (per 2)', '0.50', '<p><strong>Algemeen</strong></p>\r\n\r\n<p>KRK is alweer toe aan de derde generatie van haar Rokits. Dit is de middelste variant, de RP6 G3. Uitgevoerd met een 6 inch woofer, die het onmiskenbare gele KRK-DNA draagt, maar van een nieuw type is. Het ontwerp van de behuizing is op diverse vlakken bijgewerkt. Zo is de vorm van de basreflexpoort versoepeld, voor een nog betere balans in de laagweergave. Daarnaast is de front baffle verfrist en gladder van vorm, ter voorkoming van diffractie. Samen met een nieuwe tweeter resulteert dit in een nog schoner geluid en een hoogwaardige afstraling. Wie midden in de sweet spot zit, hoort de mix op minutieuze wijze tot leven komen.</p>\r\n\r\n<p><strong>KRK RP6 G3: karakteristiek</strong></p>\r\n\r\n<p>De RP6 is een bijzonder gebalanceerde monitor: niet te groot, niet te klein en in staat om tal van thuis- en project-studio&rsquo;s van het benodigde geluid te voorzien. Dankzij de bi-amp versterkermodule worden woofer en tweeter afzonderlijk aangestuurd. Een must, voor wie baat heeft bij een transparante klankweergave. Zo zitten zware basfrequenties nooit in de weg van het vermogen richting tweeter. Daarbij zorgt de reflexpoort voor de nodige bas-punch en dankzij de frontale positionering ervaart u geen hinderlijke basresonanties in de buurt van muren of hoeken. De onderzijde van de monitor is afgewerkt met een neopreen-antisliplaag, die tevens een lichte trillingsdemping biedt.</p>\r\n\r\n<p><strong>KRK Rokit 6 G3: Gebruiksgemak</strong></p>\r\n\r\n<p>De RP6 G3 biedt zeer veel gebruiksgemak: het gewicht is iets meer dan 8 kilo, waarmee verplaatsen geen probleem is en positionering op kleinere tafels, planken of standaards ook geen punt is. Daarbij heeft u voor de aansluiting keuze uit RCA, XLR en 6.3 mm jack. Voor verdere afstelling van de klank is er zowel een HF- als een LF-regelaar, die in stappen van enkele dB&rsquo;s voor verzwakking of versterking zorgt. Zo reageert de RP6 G3 ook in uw ruimte zoals het hoort. Deze RP6 van de derde generatie bouwt voort op het succes en biedt onvervormd, helder geluid met een gedefinieerde sweet spot.</p>', '<p><strong>Productspecificaties</strong></p>\r\n\r\n<ul>\r\n	<li>KRK Rokit 6</li>\r\n	<li>RP6 G3</li>\r\n	<li>2 weg actieve studiomonitor</li>\r\n	<li>woofer: 6 inch Aramid Glass Composite woofer</li>\r\n	<li>tweeter: 1 inch silk dome tweeter</li>\r\n	<li>frequentierespons: 38 Hz - 35 kHz</li>\r\n	<li>crossover-frequentie: 2.3 kHz</li>\r\n	<li>versterker: Class A/B, bi-amped</li>\r\n	<li>vermogen: 73W</li>\r\n	<li>versterker tweeter: 25 W</li>\r\n	<li>versterker woofer: 48 W</li>\r\n	<li>maximale SPL: 107 dB</li>\r\n	<li>HF Level Adjust:-2dB,-1dB, 0, 1 dB</li>\r\n	<li>LF Level Adjust:-2dB,-1dB, 0, 1 dB</li>\r\n	<li>volumeregelaar: -30dB - +6 dB</li>\r\n	<li>ingangen ongebalanceerd: RCA</li>\r\n	<li>ingangen gebalanceerd: 3-pins XLR, 6.35 mm TRS jack</li>\r\n	<li>stroomvoorziening: schakelbaar tussen 110V-120V / 220V-240V (50Hz - 60Hz)</li>\r\n	<li>constructie behuizing: MDF</li>\r\n	<li>coating: zwart vinyl</li>\r\n	<li>baspoort aan de voorzijde</li>\r\n	<li>auto-standby na 30 minuten</li>\r\n	<li>afmetingen 332 x 226 x 290 mm</li>\r\n	<li>gewicht: 8.4 kg</li>\r\n</ul>', 'KRK Rockit 6 G3.jpg', 1, '2018-05-23 07:15:29', '2018-05-23 07:15:29'),
(13, 5, 8, 'Rockit 8 G3 (per 2)', '0.60', '<p><strong>Algemeen</strong></p>\r\n\r\n<p>De KRK RP8 G3 is een stevige studiomonitor en tevens de grootste tweewegvariant van de derde generatie Rokits. De gele woofers zijn niet meer weg te denken uit het hedendaagse studiolandschap en ook bij deze verder uitgewerkte generatie zal dat zo blijven. De RP8 is uitgevoerd met een 8 inch woofer, die van een nieuw ontwerp is. De monitor voelt zich hiermee ook in de grotere studio&rsquo;s op zijn gemak en u profiteert van moeiteloze weergave van ook het lagere laag. Generatie 3 wijkt cosmetisch gezien af wat betreft de front baffle, de basreflexpoort en de gemonteerde tweeter. Al deze zaken staan in het teken van een diffractie-vermindering en (daardoor) meer definitie en een betere sweet spot.</p>\r\n\r\n<p><strong>KRK RP8 G3: vorm en functie</strong></p>\r\n\r\n<p>Een monitorspeaker heeft als doel uw mix zo waarheidsgetrouw mogelijk weer te geven. In dat licht is de vorm van de behuizing, in relatie tot woofer en tweeter, van groot belang. KRK heeft bij de RP8 G3 de front baffle vernieuwd en gladder gemaakt. Zo zijn zelfs de schroeven verdwenen. Dit oogt niet alleen mooier, het resulteert uiteindelijk ook in nog minder verstoring bij het uitstralen van geluid. De tweeter is van een vernieuwd ontwerp en de vertrouwde Glass Aramid-woofer biedt dezelfde strakke basrespons als voorheen. De ronder gevormde reflexpoort biedt extra druk in het laag. De onderzijde van de RP8 G3 is afgewerkt met een antisliplaag van neopreen, wat tevens een licht-dempende werking heeft.</p>\r\n\r\n<p><strong>Techniek</strong></p>\r\n\r\n<p>Een potige monitor als de RP8 G3 heeft baat bij adequate versterking. Met 100 Watt bi-amped vermogen komt deze KRK dan ook niets tekort. De tweeter ontvangt 25 Watt, de woofer 75. Onder elk afluistervolume levert de RP8 een onvervormde klank, zodat u altijd een monitorwaardig geluid hoort, zonder oververmoeide bassen of snijdend hoog. Voor het optimaal afstellen van de hoog- en laagrespons maakt u gebruik van afzonderlijke draaiknoppen, waarmee stapsgewijs enkele dB&rsquo;s bij- of af te draaien zijn. Aansluiten kan op drie manieren: via RCA, XLR of jack.</p>', '<p><strong>Productspecificaties</strong></p>\r\n\r\n<ul>\r\n	<li>KRK RP8 G3</li>\r\n	<li>Rokit</li>\r\n	<li>2 weg actieve studiomonitor</li>\r\n	<li>woofer: 8 inch Aramid Glass Composite woofer</li>\r\n	<li>tweeter: 1 inch silk dome tweeter</li>\r\n	<li>frequentierespons: 35 Hz - 35 kHz</li>\r\n	<li>crossover-frequentie: 2 kHz</li>\r\n	<li>versterker: Class A/B, bi-amped</li>\r\n	<li>vermogen: 100W</li>\r\n	<li>versterker tweeter: 25 W</li>\r\n	<li>versterker woofer: 75 W</li>\r\n	<li>maximale SPL: 109 dB</li>\r\n	<li>HF Level Adjust:-2dB,-1dB, 0, 1 dB</li>\r\n	<li>LF Level Adjust:-2dB,-1dB, 0, 1 dB</li>\r\n	<li>volumeregelaar: -30dB - +6 dB</li>\r\n	<li>ingangen ongebalanceerd: RCA</li>\r\n	<li>ingangen gebalanceerd: 3-pins XLR, 6.35 mm TRS jack</li>\r\n	<li>stroomvoorziening: schakelbaar tussen 110V-120V / 220V-240V (50Hz - 60Hz)</li>\r\n	<li>constructie behuizing: MDF</li>\r\n	<li>coating: zwart vinyl</li>\r\n	<li>baspoort aan de voorzijde</li>\r\n	<li>auto-standby na 30 minuten</li>\r\n	<li>afmetingen 396 x 275 x 315 mm</li>\r\n	<li>gewicht: 11.2 kg</li>\r\n</ul>', 'KRK Rockit 8 G3.jpg', 1, '2018-05-23 07:20:51', '2018-05-23 07:20:51');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `rentals`
--

CREATE TABLE `rentals` (
  `id` int(10) UNSIGNED NOT NULL,
  `klant_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `begindatum` date NOT NULL,
  `einddatum` date NOT NULL,
  `dagen` int(11) NOT NULL,
  `totale_huurprijs` decimal(5,2) NOT NULL,
  `korting` decimal(5,2) NOT NULL,
  `te_betalen` decimal(5,2) NOT NULL,
  `teruggebracht` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `rentals`
--

INSERT INTO `rentals` (`id`, `klant_id`, `product_id`, `begindatum`, `einddatum`, `dagen`, `totale_huurprijs`, `korting`, `te_betalen`, `teruggebracht`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-12-01', '2017-12-11', 10, '17.50', '0.00', '17.50', 1, '2017-11-30 23:00:00', '2017-11-30 23:00:00'),
(2, 2, 4, '2017-12-10', '2017-12-21', 10, '5.50', '0.00', '5.50', 1, '2017-12-09 23:00:00', '2017-12-09 23:00:00'),
(3, 1, 9, '2017-12-15', '2017-12-25', 10, '9.50', '0.00', '9.50', 1, '2017-12-14 23:00:00', '2017-12-14 23:00:00'),
(4, 2, 6, '2018-01-01', '2018-01-11', 10, '5.50', '0.00', '5.50', 1, '2017-12-31 23:00:00', '2017-12-31 23:00:00'),
(5, 2, 11, '2018-01-10', '2018-01-20', 10, '8.00', '0.00', '8.00', 1, '2018-01-09 23:00:00', '2018-01-09 23:00:00'),
(6, 1, 7, '2018-01-20', '2018-01-30', 10, '12.50', '0.00', '12.50', 1, '2018-01-19 23:00:00', '2018-01-19 23:00:00'),
(7, 2, 8, '2018-02-01', '2018-02-11', 10, '2.50', '0.00', '2.50', 1, '2018-01-31 23:00:00', '2018-01-31 23:00:00'),
(8, 1, 10, '2018-02-10', '2018-02-28', 18, '44.10', '0.00', '44.10', 1, '2018-02-09 23:00:00', '2018-02-09 23:00:00'),
(9, 2, 5, '2018-03-01', '2018-03-11', 10, '7.50', '0.00', '7.50', 1, '2018-02-28 23:00:00', '2018-02-28 23:00:00'),
(10, 2, 2, '2018-04-01', '2018-04-11', 10, '9.50', '0.00', '9.50', 1, '2018-03-31 22:00:00', '2018-03-31 22:00:00'),
(11, 1, 11, '2018-04-15', '2018-04-25', 10, '8.00', '0.00', '8.00', 1, '2018-04-14 22:00:00', '2018-04-14 22:00:00'),
(12, 1, 6, '2018-05-01', '2018-05-11', 10, '5.50', '0.00', '5.50', 1, '2018-04-30 22:00:00', '2018-04-30 22:00:00'),
(13, 2, 1, '2018-05-11', '2018-05-31', 20, '35.00', '0.00', '35.00', 0, '2018-05-10 22:00:00', '2018-05-10 22:00:00'),
(14, 1, 13, '2018-05-30', '2018-06-03', 4, '2.40', '0.12', '2.28', 0, '2018-05-29 07:04:55', '2018-05-29 07:04:55'),
(15, 2, 3, '2018-05-30', '2018-06-10', 11, '7.70', '0.00', '7.70', 0, '2018-05-29 08:46:39', '2018-05-29 08:46:39'),
(16, 1, 10, '2018-06-04', '2018-06-17', 13, '31.85', '1.59', '30.26', 0, '2018-06-01 06:22:53', '2018-06-01 06:22:53'),
(17, 1, 12, '2018-06-04', '2018-06-17', 13, '6.50', '0.33', '6.17', 0, '2018-06-01 06:22:53', '2018-06-01 06:22:53'),
(18, 1, 10, '2018-06-18', '2018-07-01', 13, '31.85', '1.59', '30.26', 0, '2018-06-04 07:36:13', '2018-06-04 07:36:13');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `naam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beoordeling` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `waardering` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `naam`, `email`, `beoordeling`, `waardering`, `created_at`, `updated_at`) VALUES
(1, 10, 'Frits', 'email@adres.com', 'Fijne apparaat!', 4, '2018-05-30 11:45:25', '2018-05-30 11:45:25'),
(2, 10, 'Hans', 'test@gmail.com', 'Dit apparaat voldoet aan mijn wensen.', 5, '2018-05-30 11:46:34', '2018-05-30 11:46:34'),
(3, 10, 'Saskia', 'test@google.com', '<p>Leuk apparaat, maar niet gemakkelijk voor beginners</p>', 3, '2018-05-30 12:14:28', '2018-06-05 16:50:41');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `naam` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `bekijken` tinyint(1) DEFAULT NULL,
  `toevoegen` tinyint(1) DEFAULT NULL,
  `wijzigen` tinyint(1) DEFAULT NULL,
  `verwijderen` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `roles`
--

INSERT INTO `roles` (`id`, `naam`, `admin`, `bekijken`, `toevoegen`, `wijzigen`, `verwijderen`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 1, 1, 1, 1, 1, '2018-04-25 07:00:34', '2018-05-29 11:26:12'),
(2, 'Editor', 0, 1, 1, 1, 0, '2018-04-25 07:09:23', '2018-05-29 11:26:52'),
(3, 'Bekijken', 0, 1, 0, 0, 0, '2018-04-25 07:09:38', '2018-05-29 11:27:03');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `voornaam` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `achternaam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `straat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `huisnummer` int(11) DEFAULT NULL,
  `postcode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `woonplaats` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefoon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rekeningnummer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identificatie` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `korting` int(11) DEFAULT NULL,
  `opmerking` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `voornaam`, `achternaam`, `email`, `password`, `remember_token`, `straat`, `huisnummer`, `postcode`, `woonplaats`, `telefoon`, `rekeningnummer`, `identificatie`, `korting`, `opmerking`, `created_at`, `updated_at`) VALUES
(1, 'Raymond', 'van Kouwen', 'r.van.kouwen@gmail.com', '$2y$10$ds4IzKn9SJOdeWIY9.E0d.qIpcMnUvSD2nJgTnCj6OeMk.2iZdpDi', 'v7duMYwM6Wr1pl2JPlTF1eg7ls3glv6nuvW4PwOo4BQZEgIY2x4bc5LSOQPD', 'Henri Hermanslaan', 356, '6162 GP', 'Geleen', '+31654934632', 'NL09RABO0123456789', NULL, 5, '', '2018-04-20 16:39:46', '2018-07-19 08:24:21'),
(2, 'Jan', 'Bakker', 'j.bakker@gmail.com', '$2y$10$Fv2diaYR.3/jCPVrnANvm.evaUd5rT2nwiOgWInOlRcmBFn/eVmEe', 'KZt1xzsDfrIMwF8thRAl47Vuz0O0UzQMrQA4uNJo3CFYy1ladg3JIacy4p82', '', 0, '', '', '', '', '', 0, '', '2018-05-29 05:55:37', '2018-05-29 05:55:37');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `role` (`rol_id`);

--
-- Indexen voor tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `product_mark_id` (`merk_id`);

--
-- Indexen voor tabel `rentals`
--
ALTER TABLE `rentals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `klant_id` (`klant_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexen voor tabel `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexen voor tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `rentals`
--
ALTER TABLE `rentals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT voor een tabel `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);

--
-- Beperkingen voor tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`merk_id`) REFERENCES `marks` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Beperkingen voor tabel `rentals`
--
ALTER TABLE `rentals`
  ADD CONSTRAINT `rentals_ibfk_1` FOREIGN KEY (`klant_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `rentals_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Beperkingen voor tabel `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
