-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2024 at 12:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `rating` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `rating`, `created_at`, `updated_at`) VALUES
(1, 'To Kill a Mockingbird', 'Harper Lee', 3.00, NULL, '2024-09-21 04:58:25'),
(2, '1984', 'George Orwell', 4.00, NULL, NULL),
(3, 'The Great Gatsby', 'F. Scott Fitzgerald', 4.50, NULL, NULL),
(4, 'The Catcher in the Rye', 'J.D. Salinger', 4.40, NULL, NULL),
(5, 'Moby Dick', 'Herman Melville', 4.10, NULL, NULL),
(6, 'Pride and Prejudice', 'Jane Austen', 4.90, NULL, NULL),
(7, 'The Lord of the Rings', 'J.R.R. Tolkien', 4.90, NULL, NULL),
(8, 'Jane Eyre', 'Charlotte Bronte', 4.60, NULL, NULL),
(9, 'The Hobbit', 'J.R.R. Tolkien', 4.80, NULL, NULL),
(10, 'Fahrenheit 451', 'Ray Bradbury', 4.70, NULL, NULL),
(11, 'Brave New World', 'Aldous Huxley', 4.60, NULL, NULL),
(12, 'Crime and Punishment', 'Fyodor Dostoevsky', 4.80, NULL, NULL),
(13, 'War and Peace', 'Leo Tolstoy', 4.50, NULL, NULL),
(14, 'The Odyssey', 'Homer', 4.30, NULL, NULL),
(15, 'Frankenstein', 'Mary Shelley', 4.20, NULL, NULL),
(16, 'The Divine Comedy', 'Dante Alighieri', 4.60, NULL, NULL),
(17, 'The Brothers Karamazov', 'Fyodor Dostoevsky', 4.80, NULL, NULL),
(18, 'Les Misérables', 'Victor Hugo', 4.70, NULL, NULL),
(19, 'The Grapes of Wrath', 'John Steinbeck', 4.50, NULL, NULL),
(20, 'Wuthering Heights', 'Emily Bronte', 4.40, NULL, NULL),
(21, 'Don Quixote', 'Miguel de Cervantes', 4.20, NULL, NULL),
(22, 'Anna Karenina', 'Leo Tolstoy', 4.80, NULL, NULL),
(23, 'The Iliad', 'Homer', 4.30, NULL, NULL),
(24, 'Heart of Darkness', 'Joseph Conrad', 4.10, NULL, NULL),
(25, 'The Picture of Dorian Gray', 'Oscar Wilde', 4.40, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
