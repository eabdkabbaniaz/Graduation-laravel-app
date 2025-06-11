-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2025 at 12:51 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_experment1`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'فئة 1', '2025-05-02 15:32:10', '2025-05-02 15:32:10'),
(2, 'فئة 2', '2025-05-02 15:32:10', '2025-05-02 15:32:10'),
(3, 'فئة 1', '2025-05-02 15:33:53', '2025-05-02 15:33:53'),
(4, 'فئة 2', '2025-05-02 15:33:53', '2025-05-02 15:33:53'),
(5, 'فئة 1', '2025-05-02 15:35:24', '2025-05-02 15:35:24'),
(6, 'فئة 2', '2025-05-02 15:35:24', '2025-05-02 15:35:24'),
(7, 'فئة 1', '2025-05-02 15:36:28', '2025-05-02 15:36:28'),
(8, 'فئة 2', '2025-05-02 15:36:28', '2025-05-02 15:36:28');

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drug_sessions`
--

CREATE TABLE `drug_sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `drug_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_questions` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Final_grade` double NOT NULL,
  `Start_date` date NOT NULL,
  `End_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_questions`
--

CREATE TABLE `exam_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `answer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_subjects`
--

CREATE TABLE `exam_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `exam_users`
--

CREATE TABLE `exam_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED NOT NULL,
  `grade` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `before_instruction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `after_instruction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 is active and 0 non active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `name`, `before_instruction`, `after_instruction`, `status`, `created_at`, `updated_at`) VALUES
(1, 'rabbit', 'اغسل االمعي خمس مرات', 'اغسل االمعي خمس مرات', 1, '2025-05-01 19:51:40', '2025-05-03 21:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `experience_drugs`
--

CREATE TABLE `experience_drugs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `drug_id` bigint(20) UNSIGNED NOT NULL,
  `experience_id` bigint(20) UNSIGNED NOT NULL,
  `effect` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `failed_jobs`
--

INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(1, '778d51ca-150a-4ac6-aa06-63ec15ad1deb', 'redis', 'default', '{\"uuid\":\"778d51ca-150a-4ac6-aa06-63ec15ad1deb\",\"displayName\":\"Modules\\\\Student\\\\App\\\\Jobs\\\\ImportStudentsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Modules\\\\Student\\\\App\\\\Jobs\\\\ImportStudentsJob\",\"command\":\"O:42:\\\"Modules\\\\Student\\\\App\\\\Jobs\\\\ImportStudentsJob\\\":4:{s:11:\\\"\\u0000*\\u0000filePath\\\";s:53:\\\"imports\\/GKje5LY0ZyaKaKsZOTtXfOnE9LHchYCJzWGf0ARB.xlsx\\\";s:11:\\\"\\u0000*\\u0000category\\\";a:2:{i:0;i:3;i:1;i:4;}s:21:\\\"\\u0000*\\u0000distributionMethod\\\";s:6:\\\"random\\\";s:18:\\\"\\u0000*\\u0000category_number\\\";s:1:\\\"2\\\";}\"},\"id\":\"835Vx9I3toEEhP6jRq3g0zYqhhd2maL0\",\"attempts\":0}', 'Spatie\\Permission\\Exceptions\\RoleDoesNotExist: There is no role named `student` for guard `web`. in C:\\Users\\vision\\Graduation-laravel-app\\vendor\\spatie\\laravel-permission\\src\\Exceptions\\RoleDoesNotExist.php:11\nStack trace:\n#0 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\spatie\\laravel-permission\\src\\Models\\Role.php(105): Spatie\\Permission\\Exceptions\\RoleDoesNotExist::named(\'student\', \'web\')\n#1 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\spatie\\laravel-permission\\src\\Traits\\HasRoles.php(411): Spatie\\Permission\\Models\\Role::findByName(\'student\', \'web\')\n#2 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\spatie\\laravel-permission\\src\\Traits\\HasRoles.php(131): App\\Models\\User->getStoredRole(\'student\')\n#3 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\Traits\\EnumeratesValues.php(791): App\\Models\\User->Spatie\\Permission\\Traits\\{closure}(Array, \'student\', 0)\n#4 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\spatie\\laravel-permission\\src\\Traits\\HasRoles.php(139): Illuminate\\Support\\Collection->reduce(Object(Closure), Array)\n#5 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\spatie\\laravel-permission\\src\\Traits\\HasRoles.php(150): App\\Models\\User->collectRoles(Array)\n#6 C:\\Users\\vision\\Graduation-laravel-app\\Modules\\Student\\Repository\\Imports\\StudentsImport.php(48): App\\Models\\User->assignRole(\'student\')\n#7 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(100): Modules\\Student\\Repository\\Imports\\StudentsImport->model(Array)\n#8 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(148): Maatwebsite\\Excel\\Imports\\ModelManager->toModels(Object(Modules\\Student\\Repository\\Imports\\StudentsImport), Array, 2)\n#9 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\Traits\\EnumeratesValues.php(240): Maatwebsite\\Excel\\Imports\\ModelManager->Maatwebsite\\Excel\\Imports\\{closure}(Array, 2)\n#10 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(173): Illuminate\\Support\\Collection->each(Object(Closure))\n#11 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(82): Maatwebsite\\Excel\\Imports\\ModelManager->singleFlush(Object(Modules\\Student\\Repository\\Imports\\StudentsImport))\n#12 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelImporter.php(114): Maatwebsite\\Excel\\Imports\\ModelManager->flush(Object(Modules\\Student\\Repository\\Imports\\StudentsImport), false)\n#13 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelImporter.php(95): Maatwebsite\\Excel\\Imports\\ModelImporter->flush(Object(Modules\\Student\\Repository\\Imports\\StudentsImport), 1, 2)\n#14 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Sheet.php(254): Maatwebsite\\Excel\\Imports\\ModelImporter->import(Object(PhpOffice\\PhpSpreadsheet\\Worksheet\\Worksheet), Object(Modules\\Student\\Repository\\Imports\\StudentsImport), 2)\n#15 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Reader.php(116): Maatwebsite\\Excel\\Sheet->import(Object(Modules\\Student\\Repository\\Imports\\StudentsImport), 2)\n#16 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\ManagesTransactions.php(30): Maatwebsite\\Excel\\Reader->Maatwebsite\\Excel\\{closure}(Object(Illuminate\\Database\\MySqlConnection))\n#17 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Transactions\\DbTransactionHandler.php(30): Illuminate\\Database\\Connection->transaction(Object(Closure))\n#18 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Reader.php(130): Maatwebsite\\Excel\\Transactions\\DbTransactionHandler->__invoke(Object(Closure))\n#19 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Excel.php(155): Maatwebsite\\Excel\\Reader->read(Object(Modules\\Student\\Repository\\Imports\\StudentsImport), \'C:\\\\Users\\\\vision...\', \'Xlsx\', NULL)\n#20 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Facade.php(355): Maatwebsite\\Excel\\Excel->import(Object(Modules\\Student\\Repository\\Imports\\StudentsImport), \'C:\\\\Users\\\\vision...\')\n#21 C:\\Users\\vision\\Graduation-laravel-app\\Modules\\Student\\App\\Jobs\\ImportStudentsJob.php(51): Illuminate\\Support\\Facades\\Facade::__callStatic(\'import\', Array)\n#22 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Modules\\Student\\App\\Jobs\\ImportStudentsJob->handle()\n#23 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#24 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#25 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#26 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#27 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#28 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Modules\\Student\\App\\Jobs\\ImportStudentsJob))\n#29 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Modules\\Student\\App\\Jobs\\ImportStudentsJob))\n#30 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#31 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Modules\\Student\\App\\Jobs\\ImportStudentsJob), false)\n#32 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Modules\\Student\\App\\Jobs\\ImportStudentsJob))\n#33 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Modules\\Student\\App\\Jobs\\ImportStudentsJob))\n#34 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#35 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\RedisJob), Object(Modules\\Student\\App\\Jobs\\ImportStudentsJob))\n#36 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\RedisJob), Array)\n#37 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#38 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'redis\', Object(Illuminate\\Queue\\Jobs\\RedisJob), Object(Illuminate\\Queue\\WorkerOptions))\n#39 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\RedisJob), \'redis\', Object(Illuminate\\Queue\\WorkerOptions))\n#40 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon(\'redis\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#41 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'redis\', \'default\')\n#42 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#43 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#44 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#45 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#46 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#47 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#48 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\symfony\\console\\Command\\Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#49 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#50 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\symfony\\console\\Application.php(1096): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#51 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\symfony\\console\\Application.php(324): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#52 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\symfony\\console\\Application.php(175): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#53 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#54 C:\\Users\\vision\\Graduation-laravel-app\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#55 {main}', '2025-05-02 15:33:59'),
(2, '03e9b491-6d76-40c2-8d07-19ef4dac37ea', 'redis', 'default', '{\"uuid\":\"03e9b491-6d76-40c2-8d07-19ef4dac37ea\",\"displayName\":\"Modules\\\\Student\\\\App\\\\Jobs\\\\ImportStudentsJob\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Modules\\\\Student\\\\App\\\\Jobs\\\\ImportStudentsJob\",\"command\":\"O:42:\\\"Modules\\\\Student\\\\App\\\\Jobs\\\\ImportStudentsJob\\\":4:{s:11:\\\"\\u0000*\\u0000filePath\\\";s:53:\\\"imports\\/ZTHF5eENksOu8u66CorBvnN2jANWoBIlG69F0cG4.xlsx\\\";s:11:\\\"\\u0000*\\u0000category\\\";a:2:{i:0;i:7;i:1;i:8;}s:21:\\\"\\u0000*\\u0000distributionMethod\\\";s:6:\\\"random\\\";s:18:\\\"\\u0000*\\u0000category_number\\\";s:1:\\\"2\\\";}\"},\"id\":\"g90uqt7OQ3ocpICLTbvUHT2l4x8Ui8y4\",\"attempts\":0}', 'PDOException: SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry \'6303293303293\' for key \'users_email_unique\' in C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\MySqlConnection.php:45\nStack trace:\n#0 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\MySqlConnection.php(45): PDOStatement->execute()\n#1 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(816): Illuminate\\Database\\MySqlConnection->Illuminate\\Database\\{closure}(\'insert into `us...\', Array)\n#2 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(783): Illuminate\\Database\\Connection->runQueryCallback(\'insert into `us...\', Array, Object(Closure))\n#3 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\MySqlConnection.php(50): Illuminate\\Database\\Connection->run(\'insert into `us...\', Array, Object(Closure))\n#4 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\MySqlProcessor.php(35): Illuminate\\Database\\MySqlConnection->insert(\'insert into `us...\', Array, \'id\')\n#5 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php(3549): Illuminate\\Database\\Query\\Processors\\MySqlProcessor->processInsertGetId(Object(Illuminate\\Database\\Query\\Builder), \'insert into `us...\', Array, \'id\')\n#6 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1982): Illuminate\\Database\\Query\\Builder->insertGetId(Array, \'id\')\n#7 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1334): Illuminate\\Database\\Eloquent\\Builder->__call(\'insertGetId\', Array)\n#8 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1299): Illuminate\\Database\\Eloquent\\Model->insertAndSetId(Object(Illuminate\\Database\\Eloquent\\Builder), Array)\n#9 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1138): Illuminate\\Database\\Eloquent\\Model->performInsert(Object(Illuminate\\Database\\Eloquent\\Builder))\n#10 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1025): Illuminate\\Database\\Eloquent\\Model->save()\n#11 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\helpers.php(320): Illuminate\\Database\\Eloquent\\Builder->Illuminate\\Database\\Eloquent\\{closure}(Object(App\\Models\\User))\n#12 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1026): tap(Object(App\\Models\\User), Object(Closure))\n#13 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\ForwardsCalls.php(23): Illuminate\\Database\\Eloquent\\Builder->create(Array)\n#14 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(2335): Illuminate\\Database\\Eloquent\\Model->forwardCallTo(Object(Illuminate\\Database\\Eloquent\\Builder), \'create\', Array)\n#15 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(2347): Illuminate\\Database\\Eloquent\\Model->__call(\'create\', Array)\n#16 C:\\Users\\vision\\Graduation-laravel-app\\Modules\\Student\\Repository\\Imports\\StudentsImport.php(42): Illuminate\\Database\\Eloquent\\Model::__callStatic(\'create\', Array)\n#17 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(100): Modules\\Student\\Repository\\Imports\\StudentsImport->model(Array)\n#18 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(148): Maatwebsite\\Excel\\Imports\\ModelManager->toModels(Object(Modules\\Student\\Repository\\Imports\\StudentsImport), Array, 2)\n#19 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\Traits\\EnumeratesValues.php(240): Maatwebsite\\Excel\\Imports\\ModelManager->Maatwebsite\\Excel\\Imports\\{closure}(Array, 2)\n#20 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(173): Illuminate\\Support\\Collection->each(Object(Closure))\n#21 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(82): Maatwebsite\\Excel\\Imports\\ModelManager->singleFlush(Object(Modules\\Student\\Repository\\Imports\\StudentsImport))\n#22 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelImporter.php(114): Maatwebsite\\Excel\\Imports\\ModelManager->flush(Object(Modules\\Student\\Repository\\Imports\\StudentsImport), false)\n#23 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelImporter.php(95): Maatwebsite\\Excel\\Imports\\ModelImporter->flush(Object(Modules\\Student\\Repository\\Imports\\StudentsImport), 1, 2)\n#24 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Sheet.php(254): Maatwebsite\\Excel\\Imports\\ModelImporter->import(Object(PhpOffice\\PhpSpreadsheet\\Worksheet\\Worksheet), Object(Modules\\Student\\Repository\\Imports\\StudentsImport), 2)\n#25 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Reader.php(116): Maatwebsite\\Excel\\Sheet->import(Object(Modules\\Student\\Repository\\Imports\\StudentsImport), 2)\n#26 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\ManagesTransactions.php(30): Maatwebsite\\Excel\\Reader->Maatwebsite\\Excel\\{closure}(Object(Illuminate\\Database\\MySqlConnection))\n#27 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Transactions\\DbTransactionHandler.php(30): Illuminate\\Database\\Connection->transaction(Object(Closure))\n#28 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Reader.php(130): Maatwebsite\\Excel\\Transactions\\DbTransactionHandler->__invoke(Object(Closure))\n#29 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Excel.php(155): Maatwebsite\\Excel\\Reader->read(Object(Modules\\Student\\Repository\\Imports\\StudentsImport), \'C:\\\\Users\\\\vision...\', \'Xlsx\', NULL)\n#30 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Facade.php(355): Maatwebsite\\Excel\\Excel->import(Object(Modules\\Student\\Repository\\Imports\\StudentsImport), \'C:\\\\Users\\\\vision...\')\n#31 C:\\Users\\vision\\Graduation-laravel-app\\Modules\\Student\\App\\Jobs\\ImportStudentsJob.php(51): Illuminate\\Support\\Facades\\Facade::__callStatic(\'import\', Array)\n#32 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Modules\\Student\\App\\Jobs\\ImportStudentsJob->handle()\n#33 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#34 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#35 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#36 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#37 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#38 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Modules\\Student\\App\\Jobs\\ImportStudentsJob))\n#39 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Modules\\Student\\App\\Jobs\\ImportStudentsJob))\n#40 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#41 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Modules\\Student\\App\\Jobs\\ImportStudentsJob), false)\n#42 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Modules\\Student\\App\\Jobs\\ImportStudentsJob))\n#43 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Modules\\Student\\App\\Jobs\\ImportStudentsJob))\n#44 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#45 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\RedisJob), Object(Modules\\Student\\App\\Jobs\\ImportStudentsJob))\n#46 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\RedisJob), Array)\n#47 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#48 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'redis\', Object(Illuminate\\Queue\\Jobs\\RedisJob), Object(Illuminate\\Queue\\WorkerOptions))\n#49 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\RedisJob), \'redis\', Object(Illuminate\\Queue\\WorkerOptions))\n#50 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon(\'redis\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#51 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'redis\', \'default\')\n#52 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#53 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#54 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#55 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#56 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#57 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#58 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\symfony\\console\\Command\\Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#59 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#60 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\symfony\\console\\Application.php(1096): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#61 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\symfony\\console\\Application.php(324): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#62 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\symfony\\console\\Application.php(175): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#63 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#64 C:\\Users\\vision\\Graduation-laravel-app\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#65 {main}\n\nNext Illuminate\\Database\\UniqueConstraintViolationException: SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry \'6303293303293\' for key \'users_email_unique\' (Connection: mysql, SQL: insert into `users` (`name`, `email`, `password`, `updated_at`, `created_at`) values (eabd, 6303293303293, $2y$12$CgrbhfUQcRn09QXVUTbkcOI0JWQL9WmvwOL3gcmNxAwZINk0Ix25y, 2025-05-02 18:36:29, 2025-05-02 18:36:29)) in C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php:824\nStack trace:\n#0 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Connection.php(783): Illuminate\\Database\\Connection->runQueryCallback(\'insert into `us...\', Array, Object(Closure))\n#1 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\MySqlConnection.php(50): Illuminate\\Database\\Connection->run(\'insert into `us...\', Array, Object(Closure))\n#2 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Processors\\MySqlProcessor.php(35): Illuminate\\Database\\MySqlConnection->insert(\'insert into `us...\', Array, \'id\')\n#3 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Query\\Builder.php(3549): Illuminate\\Database\\Query\\Processors\\MySqlProcessor->processInsertGetId(Object(Illuminate\\Database\\Query\\Builder), \'insert into `us...\', Array, \'id\')\n#4 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1982): Illuminate\\Database\\Query\\Builder->insertGetId(Array, \'id\')\n#5 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1334): Illuminate\\Database\\Eloquent\\Builder->__call(\'insertGetId\', Array)\n#6 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1299): Illuminate\\Database\\Eloquent\\Model->insertAndSetId(Object(Illuminate\\Database\\Eloquent\\Builder), Array)\n#7 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(1138): Illuminate\\Database\\Eloquent\\Model->performInsert(Object(Illuminate\\Database\\Eloquent\\Builder))\n#8 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1025): Illuminate\\Database\\Eloquent\\Model->save()\n#9 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\helpers.php(320): Illuminate\\Database\\Eloquent\\Builder->Illuminate\\Database\\Eloquent\\{closure}(Object(App\\Models\\User))\n#10 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Builder.php(1026): tap(Object(App\\Models\\User), Object(Closure))\n#11 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Traits\\ForwardsCalls.php(23): Illuminate\\Database\\Eloquent\\Builder->create(Array)\n#12 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(2335): Illuminate\\Database\\Eloquent\\Model->forwardCallTo(Object(Illuminate\\Database\\Eloquent\\Builder), \'create\', Array)\n#13 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Eloquent\\Model.php(2347): Illuminate\\Database\\Eloquent\\Model->__call(\'create\', Array)\n#14 C:\\Users\\vision\\Graduation-laravel-app\\Modules\\Student\\Repository\\Imports\\StudentsImport.php(42): Illuminate\\Database\\Eloquent\\Model::__callStatic(\'create\', Array)\n#15 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(100): Modules\\Student\\Repository\\Imports\\StudentsImport->model(Array)\n#16 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(148): Maatwebsite\\Excel\\Imports\\ModelManager->toModels(Object(Modules\\Student\\Repository\\Imports\\StudentsImport), Array, 2)\n#17 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Collections\\Traits\\EnumeratesValues.php(240): Maatwebsite\\Excel\\Imports\\ModelManager->Maatwebsite\\Excel\\Imports\\{closure}(Array, 2)\n#18 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(173): Illuminate\\Support\\Collection->each(Object(Closure))\n#19 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelManager.php(82): Maatwebsite\\Excel\\Imports\\ModelManager->singleFlush(Object(Modules\\Student\\Repository\\Imports\\StudentsImport))\n#20 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelImporter.php(114): Maatwebsite\\Excel\\Imports\\ModelManager->flush(Object(Modules\\Student\\Repository\\Imports\\StudentsImport), false)\n#21 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Imports\\ModelImporter.php(95): Maatwebsite\\Excel\\Imports\\ModelImporter->flush(Object(Modules\\Student\\Repository\\Imports\\StudentsImport), 1, 2)\n#22 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Sheet.php(254): Maatwebsite\\Excel\\Imports\\ModelImporter->import(Object(PhpOffice\\PhpSpreadsheet\\Worksheet\\Worksheet), Object(Modules\\Student\\Repository\\Imports\\StudentsImport), 2)\n#23 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Reader.php(116): Maatwebsite\\Excel\\Sheet->import(Object(Modules\\Student\\Repository\\Imports\\StudentsImport), 2)\n#24 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Database\\Concerns\\ManagesTransactions.php(30): Maatwebsite\\Excel\\Reader->Maatwebsite\\Excel\\{closure}(Object(Illuminate\\Database\\MySqlConnection))\n#25 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Transactions\\DbTransactionHandler.php(30): Illuminate\\Database\\Connection->transaction(Object(Closure))\n#26 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Reader.php(130): Maatwebsite\\Excel\\Transactions\\DbTransactionHandler->__invoke(Object(Closure))\n#27 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\maatwebsite\\excel\\src\\Excel.php(155): Maatwebsite\\Excel\\Reader->read(Object(Modules\\Student\\Repository\\Imports\\StudentsImport), \'C:\\\\Users\\\\vision...\', \'Xlsx\', NULL)\n#28 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Facade.php(355): Maatwebsite\\Excel\\Excel->import(Object(Modules\\Student\\Repository\\Imports\\StudentsImport), \'C:\\\\Users\\\\vision...\')\n#29 C:\\Users\\vision\\Graduation-laravel-app\\Modules\\Student\\App\\Jobs\\ImportStudentsJob.php(51): Illuminate\\Support\\Facades\\Facade::__callStatic(\'import\', Array)\n#30 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Modules\\Student\\App\\Jobs\\ImportStudentsJob->handle()\n#31 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#32 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#33 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#34 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#35 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#36 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Modules\\Student\\App\\Jobs\\ImportStudentsJob))\n#37 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Modules\\Student\\App\\Jobs\\ImportStudentsJob))\n#38 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#39 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Modules\\Student\\App\\Jobs\\ImportStudentsJob), false)\n#40 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Modules\\Student\\App\\Jobs\\ImportStudentsJob))\n#41 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Modules\\Student\\App\\Jobs\\ImportStudentsJob))\n#42 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#43 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\RedisJob), Object(Modules\\Student\\App\\Jobs\\ImportStudentsJob))\n#44 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\RedisJob), Array)\n#45 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#46 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'redis\', Object(Illuminate\\Queue\\Jobs\\RedisJob), Object(Illuminate\\Queue\\WorkerOptions))\n#47 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\RedisJob), \'redis\', Object(Illuminate\\Queue\\WorkerOptions))\n#48 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon(\'redis\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#49 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'redis\', \'default\')\n#50 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#51 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#52 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#53 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#54 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#55 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#56 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\symfony\\console\\Command\\Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#57 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#58 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\symfony\\console\\Application.php(1096): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#59 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\symfony\\console\\Application.php(324): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#60 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\symfony\\console\\Application.php(175): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#61 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#62 C:\\Users\\vision\\Graduation-laravel-app\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#63 {main}', '2025-05-02 15:36:29');
INSERT INTO `failed_jobs` (`id`, `uuid`, `connection`, `queue`, `payload`, `exception`, `failed_at`) VALUES
(3, '5f5e5f62-6ffb-4ee5-acaa-f795668c7365', 'redis', 'default', '{\"uuid\":\"5f5e5f62-6ffb-4ee5-acaa-f795668c7365\",\"displayName\":\"Modules\\\\Student\\\\App\\\\Jobs\\\\SendTeacherCredentialsEmail\",\"job\":\"Illuminate\\\\Queue\\\\CallQueuedHandler@call\",\"maxTries\":null,\"maxExceptions\":null,\"failOnTimeout\":false,\"backoff\":null,\"timeout\":null,\"retryUntil\":null,\"data\":{\"commandName\":\"Modules\\\\Student\\\\App\\\\Jobs\\\\SendTeacherCredentialsEmail\",\"command\":\"O:52:\\\"Modules\\\\Student\\\\App\\\\Jobs\\\\SendTeacherCredentialsEmail\\\":2:{s:7:\\\"\\u0000*\\u0000user\\\";O:45:\\\"Illuminate\\\\Contracts\\\\Database\\\\ModelIdentifier\\\":5:{s:5:\\\"class\\\";s:15:\\\"App\\\\Models\\\\User\\\";s:2:\\\"id\\\";i:24;s:9:\\\"relations\\\";a:0:{}s:10:\\\"connection\\\";s:5:\\\"mysql\\\";s:15:\\\"collectionClass\\\";N;}s:16:\\\"\\u0000*\\u0000plainPassword\\\";s:10:\\\"1q4lFoEUyb\\\";}\"},\"id\":\"JUy4gHvPN1czzWjWTwebkedsalMcuVWj\",\"attempts\":0}', 'Symfony\\Component\\Mailer\\Exception\\TransportException: Unable to connect with STARTTLS: stream_socket_enable_crypto(): SSL: Handshake timed out in C:\\Users\\vision\\Graduation-laravel-app\\vendor\\symfony\\mailer\\Transport\\Smtp\\Stream\\SocketStream.php:171\nStack trace:\n#0 [internal function]: Symfony\\Component\\Mailer\\Transport\\Smtp\\Stream\\SocketStream->Symfony\\Component\\Mailer\\Transport\\Smtp\\Stream\\{closure}(2, \'stream_socket_e...\', \'C:\\\\Users\\\\vision...\', 174)\n#1 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\symfony\\mailer\\Transport\\Smtp\\Stream\\SocketStream.php(174): stream_socket_enable_crypto(Resource id #1368, true)\n#2 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\symfony\\mailer\\Transport\\Smtp\\EsmtpTransport.php(152): Symfony\\Component\\Mailer\\Transport\\Smtp\\Stream\\SocketStream->startTLS()\n#3 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\symfony\\mailer\\Transport\\Smtp\\EsmtpTransport.php(118): Symfony\\Component\\Mailer\\Transport\\Smtp\\EsmtpTransport->doEhloCommand()\n#4 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(254): Symfony\\Component\\Mailer\\Transport\\Smtp\\EsmtpTransport->executeCommand(\'HELO [127.0.0.1...\', Array)\n#5 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(277): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->doHeloCommand()\n#6 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(210): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->start()\n#7 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\symfony\\mailer\\Transport\\AbstractTransport.php(69): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->doSend(Object(Symfony\\Component\\Mailer\\SentMessage))\n#8 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\symfony\\mailer\\Transport\\Smtp\\SmtpTransport.php(137): Symfony\\Component\\Mailer\\Transport\\AbstractTransport->send(Object(Symfony\\Component\\Mime\\Email), Object(Symfony\\Component\\Mailer\\DelayedEnvelope))\n#9 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(573): Symfony\\Component\\Mailer\\Transport\\Smtp\\SmtpTransport->send(Object(Symfony\\Component\\Mime\\Email), Object(Symfony\\Component\\Mailer\\DelayedEnvelope))\n#10 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(335): Illuminate\\Mail\\Mailer->sendSymfonyMessage(Object(Symfony\\Component\\Mime\\Email))\n#11 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\Mailer.php(224): Illuminate\\Mail\\Mailer->send(NULL, Array, Object(Closure))\n#12 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Mail\\MailManager.php(592): Illuminate\\Mail\\Mailer->raw(\'your email info...\', Object(Closure))\n#13 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Support\\Facades\\Facade.php(355): Illuminate\\Mail\\MailManager->__call(\'raw\', Array)\n#14 C:\\Users\\vision\\Graduation-laravel-app\\Modules\\Student\\App\\Jobs\\SendTeacherCredentialsEmail.php(31): Illuminate\\Support\\Facades\\Facade::__callStatic(\'raw\', Array)\n#15 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Modules\\Student\\App\\Jobs\\SendTeacherCredentialsEmail->handle()\n#16 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#17 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#18 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#19 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#20 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(128): Illuminate\\Container\\Container->call(Array)\n#21 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Bus\\Dispatcher->Illuminate\\Bus\\{closure}(Object(Modules\\Student\\App\\Jobs\\SendTeacherCredentialsEmail))\n#22 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Modules\\Student\\App\\Jobs\\SendTeacherCredentialsEmail))\n#23 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Bus\\Dispatcher.php(132): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#24 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(124): Illuminate\\Bus\\Dispatcher->dispatchNow(Object(Modules\\Student\\App\\Jobs\\SendTeacherCredentialsEmail), false)\n#25 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(144): Illuminate\\Queue\\CallQueuedHandler->Illuminate\\Queue\\{closure}(Object(Modules\\Student\\App\\Jobs\\SendTeacherCredentialsEmail))\n#26 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php(119): Illuminate\\Pipeline\\Pipeline->Illuminate\\Pipeline\\{closure}(Object(Modules\\Student\\App\\Jobs\\SendTeacherCredentialsEmail))\n#27 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(126): Illuminate\\Pipeline\\Pipeline->then(Object(Closure))\n#28 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\CallQueuedHandler.php(70): Illuminate\\Queue\\CallQueuedHandler->dispatchThroughMiddleware(Object(Illuminate\\Queue\\Jobs\\RedisJob), Object(Modules\\Student\\App\\Jobs\\SendTeacherCredentialsEmail))\n#29 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Jobs\\Job.php(102): Illuminate\\Queue\\CallQueuedHandler->call(Object(Illuminate\\Queue\\Jobs\\RedisJob), Array)\n#30 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(439): Illuminate\\Queue\\Jobs\\Job->fire()\n#31 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(389): Illuminate\\Queue\\Worker->process(\'redis\', Object(Illuminate\\Queue\\Jobs\\RedisJob), Object(Illuminate\\Queue\\WorkerOptions))\n#32 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Worker.php(176): Illuminate\\Queue\\Worker->runJob(Object(Illuminate\\Queue\\Jobs\\RedisJob), \'redis\', Object(Illuminate\\Queue\\WorkerOptions))\n#33 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(138): Illuminate\\Queue\\Worker->daemon(\'redis\', \'default\', Object(Illuminate\\Queue\\WorkerOptions))\n#34 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Queue\\Console\\WorkCommand.php(121): Illuminate\\Queue\\Console\\WorkCommand->runWorker(\'redis\', \'default\')\n#35 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(36): Illuminate\\Queue\\Console\\WorkCommand->handle()\n#36 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php(41): Illuminate\\Container\\BoundMethod::Illuminate\\Container\\{closure}()\n#37 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(93): Illuminate\\Container\\Util::unwrapIfClosure(Object(Closure))\n#38 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php(37): Illuminate\\Container\\BoundMethod::callBoundMethod(Object(Illuminate\\Foundation\\Application), Array, Object(Closure))\n#39 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php(662): Illuminate\\Container\\BoundMethod::call(Object(Illuminate\\Foundation\\Application), Array, Array, NULL)\n#40 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(211): Illuminate\\Container\\Container->call(Array)\n#41 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\symfony\\console\\Command\\Command.php(326): Illuminate\\Console\\Command->execute(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#42 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php(181): Symfony\\Component\\Console\\Command\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Illuminate\\Console\\OutputStyle))\n#43 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\symfony\\console\\Application.php(1096): Illuminate\\Console\\Command->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#44 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\symfony\\console\\Application.php(324): Symfony\\Component\\Console\\Application->doRunCommand(Object(Illuminate\\Queue\\Console\\WorkCommand), Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#45 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\symfony\\console\\Application.php(175): Symfony\\Component\\Console\\Application->doRun(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#46 C:\\Users\\vision\\Graduation-laravel-app\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php(201): Symfony\\Component\\Console\\Application->run(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#47 C:\\Users\\vision\\Graduation-laravel-app\\artisan(37): Illuminate\\Foundation\\Console\\Kernel->handle(Object(Symfony\\Component\\Console\\Input\\ArgvInput), Object(Symfony\\Component\\Console\\Output\\ConsoleOutput))\n#48 {main}', '2025-05-02 17:48:31');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_04_08_194600_create_categories_table', 1),
(6, '2025_04_08_223040_create_students_table', 1),
(7, '2025_04_14_063143_create_permission_tables', 1),
(8, '2025_04_14_081305_create_experiences_table', 1),
(9, '2025_04_16_203223_create_teachers_table', 1),
(10, '2025_04_18_105134_create_subjects_table', 1),
(11, '2025_04_18_105158_create_exams_table', 1),
(12, '2025_04_18_105234_create_questions_table', 1),
(13, '2025_04_18_105304_create_answers_table', 1),
(14, '2025_04_18_105409_create_exam_users_table', 1),
(15, '2025_04_18_105435_create_exam_questions_table', 1),
(16, '2025_04_19_092422_create_exam_subjects_table', 1),
(17, '2025_04_22_212223_create_drugs_table', 1),
(18, '2025_04_22_212322_create_experience_drugs_table', 1),
(19, '2025_04_25_171426_create_sessions_table', 1),
(20, '2025_04_25_171957_create_drug_sessions_table', 1),
(21, '2025_04_25_172217_create_session_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 18),
(1, 'App\\Models\\User', 21),
(1, 'App\\Models\\User', 23),
(1, 'App\\Models\\User', 24),
(1, 'App\\Models\\User', 129),
(2, 'App\\Models\\User', 57),
(2, 'App\\Models\\User', 104),
(2, 'App\\Models\\User', 113),
(2, 'App\\Models\\User', 114),
(2, 'App\\Models\\User', 116),
(2, 'App\\Models\\User', 133);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'add_assignments', 'web', '2025-05-02 15:35:09', '2025-05-02 15:35:09'),
(2, 'evaluate_students', 'web', '2025-05-02 15:35:09', '2025-05-02 15:35:09'),
(3, 'export_grades', 'web', '2025-05-02 15:35:09', '2025-05-02 15:35:09'),
(4, 'view_experiments', 'web', '2025-05-02 15:35:09', '2025-05-02 15:35:09'),
(5, 'view_profile', 'web', '2025-05-02 15:35:09', '2025-05-02 15:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'teacher', 'web', '2025-05-02 15:35:09', '2025-05-02 15:35:09'),
(2, 'student', 'web', '2025-05-02 15:35:09', '2025-05-02 15:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 2),
(5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `session_users`
--

CREATE TABLE `session_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `mark` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `category_id`, `user_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(27, 1, 57, NULL, '2025-05-03 11:29:35', '2025-05-03 11:29:35'),
(65, 1, 104, NULL, '2025-05-03 18:44:51', '2025-05-03 18:44:51'),
(70, 1, 113, NULL, '2025-05-03 18:53:06', '2025-05-03 18:53:06'),
(71, 1, 114, NULL, '2025-05-03 18:54:16', '2025-05-03 18:54:16');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `is_active`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-05-01 19:27:39', '2025-05-03 19:29:09'),
(2, 1, 2, '2025-05-01 19:34:43', '2025-05-01 19:34:43'),
(3, 1, 3, '2025-05-01 19:55:04', '2025-05-01 19:55:04'),
(4, 1, 4, '2025-05-02 12:55:01', '2025-05-02 12:55:01'),
(5, 1, 17, '2025-05-02 16:01:08', '2025-05-02 16:01:08'),
(6, 0, 18, '2025-05-02 16:02:57', '2025-05-03 21:05:42'),
(9, 1, 21, '2025-05-02 17:10:33', '2025-05-03 21:06:03'),
(11, 1, 23, '2025-05-02 17:13:48', '2025-05-03 20:20:48'),
(12, 1, 24, '2025-05-02 17:47:24', '2025-05-03 20:20:40'),
(32, 1, 121, '2025-05-03 20:02:03', '2025-05-03 20:02:03'),
(33, 1, 122, '2025-05-03 20:02:38', '2025-05-03 20:02:38'),
(34, 1, 123, '2025-05-03 20:04:09', '2025-05-03 20:04:09'),
(40, 1, 129, '2025-05-03 20:12:58', '2025-05-03 20:12:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'eabd kabbani', 'walaar.alehawe@gmail.comsss', NULL, '$2y$12$eW4iXm/GRPsKHX/0P7oQ4.ut.ju9l9febjyOSG3ROcZPYOb5AiOLa', NULL, '2025-05-01 19:27:39', '2025-05-01 19:27:39'),
(2, 'eabd kabbani', 'walaar.aleeehawe@gmail.comsss', NULL, '$2y$12$bIGUH1KO3XkQNcIJk6cbbeEozYaNYWoc5NJbp8j0E2vBTsmMup6rm', NULL, '2025-05-01 19:34:43', '2025-05-01 19:34:43'),
(3, 'eabd kabbani', 'walaar.aleeeharwe@gmail.comsss', NULL, '$2y$12$TlLMoV8oT6tMjJOQLEZ3UuZgN4SyOIJIBdh67S3rUKWWQDah6yjA.', NULL, '2025-05-01 19:55:04', '2025-05-01 19:55:04'),
(4, 'eabd kabbani', 'walaar.aleeeharwte@gmail.comsss', NULL, '$2y$12$A2IEFgKhz0yf2ka8J3oyseZkYM5ZU8U2Uos2Y.vvZz/2Z/a/8ZYJC', NULL, '2025-05-02 12:55:01', '2025-05-02 12:55:01'),
(17, 'eabd kabbani', 'walaar.aleeehrtarwte@gmail.comsss', NULL, '$2y$12$47TlA6EOizeUk6u2T2eFb.7f1fNpNVcV180gL7rFhgEUmXKgCdm.K', NULL, '2025-05-02 16:01:08', '2025-05-02 16:01:08'),
(18, 'eabd kabbani', 'walaar.aleeehertarwte@gmail.comsss', NULL, '$2y$12$FDAv0EZyxhQfAgm6xVRfreNYDzc2WH1gIYae6nFE0P3kSqihoYk.y', NULL, '2025-05-02 16:02:57', '2025-05-03 19:57:04'),
(21, 'غسان', 'eabdkabbani@gmail.com', NULL, '$2y$12$e.nWSat9rMPb/Gfx1Iz2MuZtMVqvkJ2W8yTasjzNAHfM673LBlBLy', NULL, '2025-05-02 17:10:33', '2025-05-03 21:06:08'),
(23, 'eabd kabbani', 'walaar.aleeedhertarrwte@gmail.comsss', NULL, '$2y$12$TYN8IU/SEnNNq4YkqgFjouaibByWQLI/LZ8wKaz/rKPYouwKnWFPe', NULL, '2025-05-02 17:13:48', '2025-05-02 17:13:48'),
(24, 'eabd kabbani', 'walaar.aleeedherdtarrwte@gmail.comsss', NULL, '$2y$12$ubSFEFTdFZYY0P5.NROIgu.IHjd8BdkyVv9xPuicivBC.kBLvirX2', NULL, '2025-05-02 17:47:24', '2025-05-02 17:47:24'),
(57, 'yamn1232212', 'yamn', NULL, '$2y$12$t.EQid4mdoWyqrKN0MfXZepn5SiMLKT2pe3rVKwRQ3CXGfx80L9pK', NULL, '2025-05-03 11:29:35', '2025-05-03 12:28:52'),
(104, 'عامير', '3423', NULL, '$2y$12$PevJ.BZC5OwghPh6ExIQG.y.kWvJK9xJ5xH40jVkG0LYdSZv6ftFq', NULL, '2025-05-03 18:44:51', '2025-05-03 18:44:51'),
(113, 'عمر73', '7خ432', NULL, '$2y$12$pDKWhFNRjJzJyg1thr1Cre8AYhZRiXsD71aybmqyeKOZ5ucc6DglK', NULL, '2025-05-03 18:53:06', '2025-05-03 18:53:06'),
(114, 'ulv', '98723', NULL, '$2y$12$cBeljwNhTCPBaOHf9MtAj.zJwEH2mCWZWrTJFqTOuazovULoVuOSS', NULL, '2025-05-03 18:54:16', '2025-05-03 18:54:16'),
(121, 'eabd kabbani12', 'walaar.aleeedhewesssيبdrdtarrwte@gmail.comssss', NULL, '$2y$12$twzR3RuT8kokYT7E4SpCW.hegyGZ6SDwU/2WxeG.MJV8nWH1AiCN6', NULL, '2025-05-03 20:02:03', '2025-05-03 20:02:03'),
(122, 'eabd kabbani12', 'walaar.aleeedheewesssيبdrdtarrwte@gmail.comssss', NULL, '$2y$12$1NsSggXxbE/nCb1XQzejr.lvCmfbz3EsJi5D.Ofvb/N4yZmk/VDiW', NULL, '2025-05-03 20:02:38', '2025-05-03 20:02:38'),
(123, 'eabd kabbani12', 'walaar.aleeedheewesssيبdrdtadrrwte@gmail.comssss', NULL, '$2y$12$9Mz5G4QMpWfEwIWTaO2OV.wmg8KCjwDu0EPvF9d71SXuHuFVQSi5W', NULL, '2025-05-03 20:04:09', '2025-05-03 20:04:09'),
(129, 'ghasan', 'g@gmail.com', NULL, '$2y$12$smqyw/3t6HtGMA1yHf/6k.Gzhs.mtn7382MAwnG1/vB4DaJRNTmO2', NULL, '2025-05-03 20:12:58', '2025-05-03 20:12:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_question_id_foreign` (`question_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drug_sessions`
--
ALTER TABLE `drug_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `drug_sessions_session_id_foreign` (`session_id`),
  ADD KEY `drug_sessions_drug_id_foreign` (`drug_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exams_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `exam_questions`
--
ALTER TABLE `exam_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_questions_answer_id_foreign` (`answer_id`),
  ADD KEY `exam_questions_question_id_foreign` (`question_id`),
  ADD KEY `exam_questions_exam_id_foreign` (`exam_id`);

--
-- Indexes for table `exam_subjects`
--
ALTER TABLE `exam_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_subjects_subject_id_foreign` (`subject_id`),
  ADD KEY `exam_subjects_exam_id_foreign` (`exam_id`);

--
-- Indexes for table `exam_users`
--
ALTER TABLE `exam_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_users_user_id_foreign` (`user_id`),
  ADD KEY `exam_users_exam_id_foreign` (`exam_id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience_drugs`
--
ALTER TABLE `experience_drugs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `experience_drugs_drug_id_foreign` (`drug_id`),
  ADD KEY `experience_drugs_experience_id_foreign` (`experience_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_experience_id_foreign` (`experience_id`),
  ADD KEY `sessions_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `session_users`
--
ALTER TABLE `session_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `session_users_session_id_foreign` (`session_id`),
  ADD KEY `session_users_user_id_foreign` (`user_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_category_id_foreign` (`category_id`),
  ADD KEY `students_user_id_foreign` (`user_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `drug_sessions`
--
ALTER TABLE `drug_sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_questions`
--
ALTER TABLE `exam_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_subjects`
--
ALTER TABLE `exam_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_users`
--
ALTER TABLE `exam_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `experience_drugs`
--
ALTER TABLE `experience_drugs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `session_users`
--
ALTER TABLE `session_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `drug_sessions`
--
ALTER TABLE `drug_sessions`
  ADD CONSTRAINT `drug_sessions_drug_id_foreign` FOREIGN KEY (`drug_id`) REFERENCES `drugs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `drug_sessions_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `exam_questions`
--
ALTER TABLE `exam_questions`
  ADD CONSTRAINT `exam_questions_answer_id_foreign` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `exam_questions_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exam_users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_questions_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exam_subjects`
--
ALTER TABLE `exam_subjects`
  ADD CONSTRAINT `exam_subjects_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`),
  ADD CONSTRAINT `exam_subjects_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `exam_users`
--
ALTER TABLE `exam_users`
  ADD CONSTRAINT `exam_users_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`),
  ADD CONSTRAINT `exam_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `experience_drugs`
--
ALTER TABLE `experience_drugs`
  ADD CONSTRAINT `experience_drugs_drug_id_foreign` FOREIGN KEY (`drug_id`) REFERENCES `drugs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `experience_drugs_experience_id_foreign` FOREIGN KEY (`experience_id`) REFERENCES `experiences` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_experience_id_foreign` FOREIGN KEY (`experience_id`) REFERENCES `experiences` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sessions_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `session_users`
--
ALTER TABLE `session_users`
  ADD CONSTRAINT `session_users_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `session_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
