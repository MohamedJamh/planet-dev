-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 26, 2023 at 08:33 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `planetdev`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id_article` int(10) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `read_time` int(10) NOT NULL,
  `id_categorie` int(10) NOT NULL,
  `id_author` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  PRIMARY KEY (`id_article`),
  KEY `id_categorie` (`id_categorie`),
  KEY `id_author` (`id_author`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=206 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id_article`, `title`, `content`, `date`, `read_time`, `id_categorie`, `id_author`, `id_user`) VALUES
(202, 'How to Install Chat GPT locally v', 'Yes, you can install ChatGPT locally on your machine. ChatGPT is a variant of the GPT-3 (Generative Pre-trained Transformer 3) language model, which was developed by OpenAI. It is designed to generate human-like text in a conversational style, and can be used for a variety of natural language processing tasks such as chatbots, language translation, and question answering.\n\nTo install ChatGPT, you will need to install the OpenAI API client and set up an API key. You will also need to install the Python programming language and the required libraries.\n\nHere are the steps you can follow to install ChatGPT locally:\nInstall Python 3.7 or later. You can download Python from the official website (https://www.python.org/) and follow the instructions to install it on your machine.\nInstall the OpenAI API client. You can do this by running the following command: pip install openai\nSet up an API key. To use the OpenAI API, you will need to sign up for an account and obtain an API key. You can sign up for an API key at the OpenAI website (https://beta.openai.com/signup/).\nInstall the required libraries. ChatGPT requires several libraries to be installed, including requests, numpy, and tqdm. You can install these libraries by running the following command: pip install requests numpy tqdm\nYou can now use ChatGPT by importing it in your Python code and using the openai.Completion.create() method. Here is an example of how to generate text using ChatGPT:\nAttention all lazy people and efficiency junkies! Are you tired of wasting time on tedious tasks? Do you dream of a world where your computer does all the work for you? Look no further, because we have 5 Python scripts that will revolutionize your life and turn you into an automation superhero (or supervillain, depending on your motives). Get ready to say goodbye to manual labor and hello to infinite free time (or at least a few more hours in the day to procrastinate). Let the automation begin!\n\nAutomation is not the enemy of the human worker, it is the ally. Automation liberates the worker from drudgery, giving him the opportunity to do more creative and rewarding work. - Robert Noyce\n\nAfter reading this article, you will have a better understanding of many kind of python scripts which you can use to automate your daily boring tasks.\n\nPython is a powerful language that is widely used for automating various tasks. Whether you re a developer, system administrator, or just someone who wants to save time by automating mundane tasks, Python has you covered.\n\n1). File transfer script:\nA file transfer script in Python is a set of instructions or a program that is written in the Python programming language and is used to automate the process of transferring files over a network or between computers.', '2023-01-24', 2, 1, 1, 1),
(203, '5 killer Python scripts for automationâ€Šâ€”â€ŠPart1', 'Attention all lazy people and efficiency junkies! Are you tired of wasting time on tedious tasks? Do you dream of a world where your computer does all the work for you? Look no further, because we have 5 Python scripts that will revolutionize your life and turn you into an automation superhero (or supervillain, depending on your motives). Get ready to say goodbye to manual labor and hello to infinite free time (or at least a few more hours in the day to procrastinate). Let the automation begin!\n\nAutomation is not the enemy of the human worker, it is the ally. Automation liberates the worker from drudgery, giving him the opportunity to do more creative and rewarding work. - Robert Noyce\n\nAfter reading this article, you will have a better understanding of many kind of python scripts which you can use to automate your daily boring tasks.\n\nPython is a powerful language that is widely used for automating various tasks. Whether you re a developer, system administrator, or just someone who wants to save time by automating mundane tasks, Python has you covered.\n\n1). File transfer script:\nA file transfer script in Python is a set of instructions or a program that is written in the Python programming language and is used to automate the process of transferring files over a network or between computers.\n\nPython provides several libraries and modules that can be used to create a file transfer script, such as socket, ftplib, smtplib, and paramiko, etc.\n\nHere is an example of a simple file transfer script in Python that uses the socket module to transfer a file over the network:\n\nThis script runs a server that listens for incoming connections on address localhost and port 12345. When a client connects, the server receives the file name from the client and then reads and sends the contents of the file in chunks to the client. If the file is not found, the server sends an appropriate message to the client.\n\nAs mentioned above, there are other libraries and modules that can be used to create file transfer script in python, such as ftplib to connect and transfer file using ftp protocol and paramiko for SFTP (SSH File Transfer Protocol) transfer.\nThe script can be tailored to match with specific requirement or scenario.\n\n2). System monitoring script:\nA system monitoring script is a type of Python script that is used to monitor the performance and status of a computer or network. The script can be used to track various metrics, such as CPU usage, memory usage, disk space, network traffic, and system uptime. The script can also be used to monitor certain events or conditions, such as the occurrence of an error or the availability of a specific service. For example:\nThis script uses the cpu_percent, virtual_memory, and disk_usage functions from the psutil module to retrieve the current CPU usage, memory usage, and disk usage, respectively. The virtual_memory function returns an object with various properties, such as the total amount of memory and the amount of used and free memory. The disk_usage function takes a path as an argument and returns an object with properties such as the total amount of space on the disk and the amount of used and free space.', '2023-01-23', 3, 3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `id_author` int(10) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id_author`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id_author`, `f_name`, `l_name`) VALUES
(1, 'Harry', 'Clarison'),
(2, 'Amine', 'Quaresma');

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `name`) VALUES
(1, 'Technologie'),
(2, 'Science'),
(3, 'Coding');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `f_name`, `l_name`, `adress`, `password`, `role`) VALUES
(1, 'Mohamed', 'Jamh', 'jehmum@youcode.ma', '1234', 'Admin');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`id_author`) REFERENCES `author` (`id_author`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id_categorie`),
  ADD CONSTRAINT `article_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
