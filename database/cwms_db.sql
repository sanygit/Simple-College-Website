-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2022 at 08:59 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cwms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `article_list`
--

CREATE TABLE `article_list` (
  `id` int(30) NOT NULL,
  `title` text NOT NULL,
  `short_description` text NOT NULL,
  `content_path` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` int(30) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article_list`
--

INSERT INTO `article_list` (`id`, `title`, `short_description`, `content_path`, `status`, `delete_flag`, `user_id`, `date_created`, `date_updated`) VALUES
(1, 'Sample Article 101', 'Nullam ac egestas erat. Vivamus non dui ut enim pellentesque tempor a vitae risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed condimentum ultrices dui et vehicula. Curabitur laoreet purus vel sagittis auctor. Mauris at nulla mi. Proin nec elit et nibh pretium imperdiet. In ac nisl libero.\r\n\r\nDonec aliquam odio vel felis lacinia aliquet. Integer nec nisl vel enim ultricies posuere quis et erat. Duis urna metus, mollis non eleifend non, finibus at massa. Nunc pretium dolor leo, non posuere nulla scelerisque ut. Donec eleifend consectetur elit, eget viverra libero efficitur eget. Curabitur lacinia faucibus velit, sed porta urna aliquam vestibulum. Aenean mollis dui justo, eget facilisis orci luctus sit amet. Integer enim diam, congue vestibulum facilisis eu, accumsan et dui.', 'pages/articles/sample_article_101.html', 1, 0, 1, '2022-02-28 14:08:59', '2022-02-28 14:22:29'),
(2, 'test', 'test', 'pages/articles/test.html', 0, 1, 1, '2022-02-28 14:22:44', '2022-02-28 14:23:31'),
(3, 'Sample Article', 'Etiam velit mi, pretium in aliquam quis, sodales vitae orci. Nunc consequat non odio et varius. Praesent cursus arcu eget ultricies tempus. Donec nec facilisis neque. Ut id rhoncus mauris. Suspendisse nec felis laoreet, molestie nulla ac, lobortis leo. Suspendisse venenatis convallis mauris, ornare rhoncus quam pellentesque porttitor.\r\n\r\nFusce bibendum sed tellus sit amet tristique. Donec viverra at nunc ac tincidunt. Donec varius dolor mauris, in dapibus sem sollicitudin quis. Nunc gravida dignissim dolor, sed egestas tellus tempus non. Praesent eget nisi dignissim, ornare felis ac, dignissim urna. Proin tincidunt purus sed mattis sagittis. Nunc a leo tortor. Donec id nibh posuere, eleifend erat ut, maximus tortor. Sed bibendum ante sit amet orci sodales, nec tincidunt mi consectetur. Donec et dictum urna.', 'pages/articles/sample_article.html', 1, 0, 8, '2022-02-28 15:50:59', '2022-02-28 15:51:08');

-- --------------------------------------------------------

--
-- Table structure for table `course_list`
--

CREATE TABLE `course_list` (
  `id` int(30) NOT NULL,
  `department_id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_list`
--

INSERT INTO `course_list` (`id`, `department_id`, `name`, `description`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 2, 'AB English', 'Nulla facilisi. Sed ac dignissim quam. Sed odio quam, tincidunt finibus felis vel, posuere molestie erat. Donec condimentum congue mi non molestie. Quisque tempor, odio ac commodo faucibus, velit elit fringilla felis, vitae imperdiet sem est non erat. Etiam semper eget justo sit amet commodo. Phasellus vitae lorem in mi hendrerit dapibus ac sit amet nulla. Sed rhoncus ultrices elementum. Quisque venenatis tempus lacus, ut lacinia nunc maximus eu. Vestibulum diam nisi, sodales aliquam vulputate eu, posuere id erat. Integer sed lorem vitae lectus interdum egestas ac in sapien. Duis gravida eu odio a maximus. Fusce rutrum turpis vel augue efficitur fringilla.', 1, 0, '2022-02-28 11:12:34', NULL),
(2, 2, 'AB Social Science', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Duis semper luctus nisl ac malesuada. Aliquam nec urna ut enim fermentum aliquet at ac enim. Donec risus nisl, bibendum in sem vitae, hendrerit consectetur augue. Mauris a ligula laoreet, laoreet elit at, finibus orci. Ut sit amet blandit libero. Aenean eleifend, nulla nec blandit luctus, nisl odio cursus lorem, a fermentum neque leo a enim. Suspendisse nunc sapien, tempus placerat metus vel, tincidunt efficitur odio. Etiam mi erat, lacinia et turpis vitae, auctor mollis diam. Vestibulum euismod tortor nibh, id ullamcorper purus lobortis quis. Morbi in tincidunt felis. Pellentesque eu porttitor turpis.', 1, 0, '2022-02-28 11:12:59', NULL),
(3, 2, 'BS Psychology', 'Donec euismod lobortis erat, a venenatis dolor tincidunt consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed tempus eu lorem sit amet suscipit. Donec eleifend quam nec tellus rutrum, tincidunt porta lacus laoreet. Mauris a felis ac nisl laoreet iaculis et et neque. Pellentesque sit amet dolor ut erat lacinia faucibus. Sed interdum velit dui, ac gravida nisi bibendum sit amet. Proin ac est sed urna ultricies consequat. Ut vulputate lacinia magna, et accumsan odio interdum ut. Morbi cursus purus sed est varius aliquet. Curabitur commodo dictum arcu.', 1, 0, '2022-02-28 11:13:11', NULL),
(4, 2, 'Master in Public Administration', 'In eu egestas arcu. Ut aliquet sed dolor facilisis luctus. Nunc porttitor metus a arcu finibus aliquet. Etiam molestie augue quis tellus feugiat, ut sollicitudin mauris pharetra. Sed tincidunt ligula id aliquam posuere. Pellentesque vitae sem et libero tempus dictum. Nullam vestibulum, lectus non venenatis porttitor, turpis elit consequat neque, eget vulputate lectus tellus vel neque.', 1, 0, '2022-02-28 11:13:27', NULL),
(5, 2, 'Doctor of Public Administration', 'Mauris non mollis lectus, sit amet facilisis metus. Morbi non libero pellentesque, commodo elit vel, cursus sem. Nam eleifend ligula a tortor commodo pretium. Pellentesque sollicitudin lacinia lorem, vel lacinia tortor convallis vel. Duis ac nisi a diam ullamcorper viverra. Etiam id enim sed ex porttitor tincidunt. Phasellus sodales arcu ut tristique varius. Cras scelerisque ligula at tincidunt molestie. Proin non magna justo. Etiam tincidunt at tellus a cursus. Suspendisse sit amet euismod est, non dignissim augue. Quisque mi urna, accumsan ac vehicula id, lobortis at arcu. Aliquam euismod justo accumsan libero luctus dignissim. Quisque ornare at sapien eu luctus. Suspendisse hendrerit, tortor at egestas aliquam, arcu ipsum finibus ipsum, id malesuada eros velit eu nisl.', 1, 0, '2022-02-28 11:13:43', NULL),
(6, 4, 'BS Accountancy', 'Phasellus a faucibus elit. Nam nec dolor efficitur, euismod ante id, efficitur arcu. Praesent nec dolor ligula. Nullam ullamcorper aliquet velit vel lobortis. Nullam malesuada bibendum risus fringilla molestie. Quisque feugiat velit justo, finibus posuere ante facilisis eu. Nunc accumsan ex non metus vestibulum, et pretium orci dignissim. Aliquam sed commodo felis. Donec nec quam ac lectus cursus pulvinar pellentesque auctor eros. Etiam id erat massa. Vivamus placerat diam dolor, quis auctor augue gravida non.', 1, 0, '2022-02-28 11:14:02', NULL),
(7, 4, 'BS Accounting Technology', 'Maecenas ipsum magna, commodo sagittis nisl eget, consequat aliquam lorem. Ut vel arcu risus. Nullam id egestas nulla. Nunc non rhoncus ligula. Aenean facilisis faucibus ipsum, elementum congue ligula venenatis quis. Proin efficitur nec nisi eget elementum. Curabitur vitae volutpat arcu. Curabitur fermentum, enim vitae dignissim posuere, nulla nulla tristique metus, ac tempus metus nunc nec nisl. Curabitur maximus eu nunc vel consequat. Donec et porta justo. Sed imperdiet tristique mauris, sit amet tincidunt lorem rutrum at.', 1, 0, '2022-02-28 11:14:18', NULL),
(8, 4, 'BS Business Administration', 'Duis et magna et leo pretium rutrum varius a eros. Donec eget rhoncus metus. Aenean ultricies, lorem ut sollicitudin facilisis, justo augue eleifend leo, id ultrices velit magna eget odio. Pellentesque vel sem a enim consequat eleifend in sit amet magna. Donec id eleifend massa. Nam facilisis fringilla arcu et rutrum. Sed consectetur arcu vel ex bibendum, vel eleifend ex fermentum. Vivamus mattis lectus ut nisl laoreet blandit. Etiam egestas velit in justo pellentesque condimentum. Ut vel elit semper, tristique lacus eget, vehicula nibh.', 1, 0, '2022-02-28 11:14:35', NULL),
(9, 4, 'BS Entrepreneurship', 'Nam et convallis enim. Curabitur ultricies ipsum nec tellus sollicitudin posuere. Nulla viverra at felis sed tristique. In vulputate eros eget finibus porta. Duis a sem magna. Donec quis diam ligula. In hac habitasse platea dictumst. Donec eros arcu, pharetra eget nibh a, sagittis auctor elit. Etiam quis quam mi. Sed rhoncus eu lectus et finibus. Vivamus id justo ac ex lobortis maximus sed vitae eros.', 1, 0, '2022-02-28 11:14:56', NULL),
(10, 4, 'BS Office Administration', 'Cras ante orci, pellentesque sed gravida nec, blandit eu magna. Curabitur ut sem metus. Phasellus lectus nulla, auctor id varius eu, euismod at nisi. Proin pulvinar luctus mi, ut euismod quam scelerisque et. Donec massa erat, ultricies eu scelerisque blandit, ultrices id est. Integer commodo ipsum a lacinia fermentum. Proin rutrum magna a finibus blandit. Mauris a turpis volutpat, aliquet mi et, consectetur dolor. Praesent porta commodo sapien sit amet tincidunt. Quisque efficitur odio quis nisi auctor, sed faucibus felis malesuada. Suspendisse finibus nisi nec purus dapibus, a vehicula ligula posuere. Proin tincidunt condimentum lacus, et commodo est convallis quis. Nam nec euismod nibh, id egestas turpis.', 1, 0, '2022-02-28 11:15:15', NULL),
(11, 6, 'BS Criminology', 'Aenean eget dignissim tellus. Nam venenatis aliquam lectus ac pretium. Mauris hendrerit quis est nec pulvinar. Pellentesque iaculis odio nisl, a sagittis urna rutrum nec. Aenean dolor nisl, varius non massa sit amet, mattis tempor magna. Suspendisse sed elit orci. Donec tempor elit tristique ullamcorper consequat. Etiam id lectus et ligula vulputate eleifend sed quis nibh. Ut id nibh consequat, semper quam vitae, blandit magna. Proin sed magna eget mi dictum vestibulum. Cras eget magna sodales, tincidunt metus vel, vestibulum urna. Vestibulum vestibulum libero eros, nec iaculis risus finibus ut. Vestibulum luctus risus magna.', 1, 0, '2022-02-28 11:15:46', NULL),
(12, 8, 'BE Elementary Education', 'Nullam ac egestas erat. Vivamus non dui ut enim pellentesque tempor a vitae risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed condimentum ultrices dui et vehicula. Curabitur laoreet purus vel sagittis auctor. Mauris at nulla mi. Proin nec elit et nibh pretium imperdiet. In ac nisl libero.', 1, 0, '2022-02-28 11:16:39', NULL),
(13, 8, 'BE Secondary Education', 'Donec aliquam odio vel felis lacinia aliquet. Integer nec nisl vel enim ultricies posuere quis et erat. Duis urna metus, mollis non eleifend non, finibus at massa. Nunc pretium dolor leo, non posuere nulla scelerisque ut. Donec eleifend consectetur elit, eget viverra libero efficitur eget. Curabitur lacinia faucibus velit, sed porta urna aliquam vestibulum. Aenean mollis dui justo, eget facilisis orci luctus sit amet. Integer enim diam, congue vestibulum facilisis eu, accumsan et dui.', 1, 0, '2022-02-28 11:16:58', NULL),
(14, 8, 'BE Early Childhood Education', 'Fusce cursus diam eu erat tincidunt ultrices. Donec vel eleifend leo. Aliquam et finibus tortor. In at posuere tellus. Proin id felis rutrum, faucibus libero in, congue felis. Nam nec urna dapibus, fermentum est eu, suscipit elit. Suspendisse non tincidunt nulla. Nunc accumsan laoreet massa, a venenatis ex finibus a. Cras ultrices dolor semper, suscipit eros eu, suscipit nunc. Quisque lobortis justo ut sapien vehicula tempor. Cras porttitor sodales dapibus. Praesent ut suscipit metus. Vestibulum justo turpis, ultrices vel neque eu, euismod cursus lorem.', 1, 0, '2022-02-28 11:17:16', NULL),
(15, 8, 'BE Physical Education', 'Curabitur tristique augue enim, a pretium enim bibendum eget. Proin at enim a nunc vestibulum dapibus. Quisque leo diam, efficitur quis auctor in, placerat quis neque. Etiam lectus augue, euismod non consequat vehicula, lacinia eget ante. Nam id mi vel ex consectetur ultrices vel at quam. Duis a nulla quam. Morbi sodales est sit amet arcu sagittis fermentum. Proin eleifend eu nunc sit amet dapibus. Aenean dignissim pharetra magna ut varius. Aenean neque erat, mattis eget dignissim eu, scelerisque vel turpis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', 1, 0, '2022-02-28 11:17:41', NULL),
(16, 8, 'BE Special Needs Education', 'Nunc et sapien sed libero ultricies accumsan pretium id lorem. Nunc enim leo, lobortis ultrices quam interdum, cursus cursus purus. Aenean accumsan sollicitudin molestie. Praesent gravida odio sapien. In est nisl, maximus ac sapien a, ultricies hendrerit nibh. Quisque sapien augue, sollicitudin ut ante sagittis, facilisis commodo risus. Nam rutrum tincidunt risus eget gravida. Interdum et malesuada fames ac ante ipsum primis in faucibus. Curabitur eget nisl in justo fringilla facilisis vitae eu nibh. Mauris congue lobortis purus, a finibus arcu porttitor sit amet. Nulla facilisi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Pellentesque ultrices, lectus sed pharetra efficitur, erat tellus interdum odio, sed placerat eros felis nec metus. Maecenas maximus tempor mi, a consectetur mauris rutrum nec. Duis non pretium libero.', 1, 0, '2022-02-28 11:17:56', NULL),
(17, 8, 'BT Vocational Teacher Education', 'Mauris ornare ullamcorper elit pretium sollicitudin. Donec ipsum orci, porta et consequat id, viverra rutrum lectus. Phasellus quis urna diam. Aliquam et urna eget lorem feugiat interdum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer a tortor sapien. Praesent aliquet quam quis est scelerisque, in tempus massa viverra. Maecenas convallis odio eu laoreet egestas. Nullam quis velit at ex ullamcorper euismod. Curabitur interdum lorem eget consectetur vehicula. Suspendisse et erat eu felis interdum fringilla. Sed sagittis quis quam in varius. Nam commodo magna est, eu iaculis purus ornare eget. Maecenas elementum et purus et gravida. Etiam ultricies a nunc id scelerisque.', 1, 0, '2022-02-28 11:18:22', NULL),
(18, 1, 'BS Civil Engineering', 'Etiam velit mi, pretium in aliquam quis, sodales vitae orci. Nunc consequat non odio et varius. Praesent cursus arcu eget ultricies tempus. Donec nec facilisis neque. Ut id rhoncus mauris. Suspendisse nec felis laoreet, molestie nulla ac, lobortis leo. Suspendisse venenatis convallis mauris, ornare rhoncus quam pellentesque porttitor.', 1, 0, '2022-02-28 11:18:47', NULL),
(19, 1, 'Computer Science Enginnering', 'Fusce bibendum sed tellus sit amet tristique. Donec viverra at nunc ac tincidunt. Donec varius dolor mauris, in dapibus sem sollicitudin quis. Nunc gravida dignissim dolor, sed egestas tellus tempus non. Praesent eget nisi dignissim, ornare felis ac, dignissim urna. Proin tincidunt purus sed mattis sagittis. Nunc a leo tortor. Donec id nibh posuere, eleifend erat ut, maximus tortor. Sed bibendum ante sit amet orci sodales, nec tincidunt mi consectetur. Donec et dictum urna.', 1, 0, '2022-02-28 11:19:30', NULL),
(20, 3, 'BS Industrial Technology - Electrical', 'Nam pulvinar neque nisl, et porttitor diam cursus id. Aliquam vel risus vitae diam bibendum interdum vel sit amet tortor. In lorem dui, maximus ut sollicitudin in, lobortis non tellus. Proin vel sapien nec est fermentum efficitur. Vivamus ut iaculis felis. Pellentesque purus augue, facilisis iaculis dolor sit amet, condimentum venenatis est. Integer vehicula, arcu et consequat consequat, leo nulla fermentum libero, eu euismod sapien metus tincidunt mi. Donec vitae nunc eu orci ultrices tincidunt. Vestibulum consequat, nibh ac laoreet faucibus, erat nibh euismod enim, a congue odio magna eu dolor. Aliquam volutpat sed urna vel elementum. Suspendisse eget augue tempor, malesuada lacus nec, malesuada augue. Ut eget dolor leo.', 1, 0, '2022-02-28 11:20:14', NULL),
(21, 3, 'BS Industrial Technology - Automotive', 'Curabitur vel erat vitae velit facilisis elementum vel sit amet ante. Pellentesque at dictum mauris. Duis blandit condimentum elit, id tempor nisi aliquet nec. Nulla elementum elementum nibh, at aliquam nunc gravida id. Praesent molestie, eros at lacinia lacinia, augue purus semper turpis, id lacinia velit felis et arcu. Vestibulum laoreet pretium metus id bibendum. Curabitur iaculis, justo consectetur commodo molestie, urna justo pulvinar nisl, eget finibus ex lectus nec ipsum. Maecenas consectetur bibendum tincidunt. Donec ultricies purus eget turpis tempus egestas. Sed maximus non odio ac fermentum. Vestibulum fringilla mollis velit et porta. Nullam sagittis diam neque, eu porta justo malesuada vel. Sed sem dui, egestas vel vestibulum sed, semper eget sapien. Donec convallis auctor erat in tincidunt. Etiam ipsum libero, tincidunt vel purus id, tempor accumsan est.', 1, 0, '2022-02-28 11:20:38', NULL),
(22, 3, 'BS Industrial Technology - RAC', 'Integer consequat turpis non ante aliquam suscipit. Vivamus quis nulla aliquam, scelerisque orci fermentum, semper nibh. Pellentesque quam justo, vehicula sit amet fermentum non, dictum a eros. Maecenas vulputate nisl at feugiat eleifend. Praesent vel nisl at dolor luctus rhoncus a id tellus. Nunc molestie molestie metus vitae mattis. Vestibulum id tincidunt ex. Donec efficitur augue vel arcu tristique, quis convallis justo placerat. Praesent efficitur sapien tellus. Integer ullamcorper risus luctus ligula consectetur auctor.', 1, 0, '2022-02-28 11:21:14', NULL),
(23, 2, 'tesrt', 'test', 0, 1, '2022-02-28 11:24:40', '2022-02-28 11:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `department_list`
--

CREATE TABLE `department_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department_list`
--

INSERT INTO `department_list` (`id`, `name`, `description`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'College of Engineering', 'Integer ornare et mi consectetur fermentum. Vivamus nec commodo ex. Nam consectetur enim sit amet purus pretium venenatis. Fusce ac suscipit libero, ut blandit dolor. Donec bibendum rutrum tempus. Mauris nec turpis finibus, cursus libero a, laoreet nunc. Curabitur suscipit ex euismod viverra dapibus. Etiam non ullamcorper leo, ut porta dolor. Cras varius vulputate enim, ac cursus mauris consequat ut. Praesent sodales ornare ligula ut accumsan. Donec tempus, diam vel convallis aliquam, metus ipsum placerat risus, id tincidunt mi mauris at velit. Nullam mattis lectus leo, elementum accumsan orci maximus auctor. Nunc rhoncus augue ligula, at egestas risus malesuada vitae.', 1, 0, '2022-02-28 10:45:43', '2022-02-28 11:19:01'),
(2, 'College of Arts and Sciences', 'Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas pretium quam nec dignissim vestibulum. Donec interdum velit vel erat sodales, ut volutpat risus molestie. Sed tincidunt condimentum neque sed dictum. Vivamus fermentum urna sed ligula tincidunt, vitae hendrerit quam blandit. Sed elementum sit amet nisl sit amet pellentesque. Cras molestie nisi dolor. Curabitur at venenatis lacus. Sed efficitur, libero vel varius auctor, nisl dui auctor urna, ac gravida nibh sem at odio.', 1, 0, '2022-02-28 10:48:12', '2022-02-28 10:51:02'),
(3, 'College of Industrial Technology', 'Mauris vulputate viverra libero sit amet eleifend. Donec ut massa consectetur, molestie libero nec, iaculis leo. Etiam facilisis sapien quis odio congue, quis tristique leo blandit. Morbi convallis finibus fringilla. Aenean convallis metus vitae velit viverra volutpat. Nulla consequat neque et hendrerit aliquam. In pulvinar vehicula semper.', 1, 0, '2022-02-28 10:50:12', NULL),
(4, 'College of Business Management and Accountancy', 'Fusce laoreet arcu et sollicitudin varius. Vestibulum posuere venenatis ex, vel imperdiet metus luctus at. Aenean eros diam, suscipit vel consectetur sed, porta id tortor. Donec tempor porta mi, vehicula aliquam felis molestie sed. Quisque placerat, ligula ac lobortis interdum, odio odio mollis libero, quis dictum orci sem vehicula nibh. Aliquam tincidunt nunc eu vestibulum ultrices. Sed placerat arcu sed nunc imperdiet facilisis. Vestibulum placerat lectus urna, in finibus metus porttitor sit amet. Integer fringilla elit nunc, eu pulvinar sem aliquet in. Nullam rutrum enim orci, et elementum orci malesuada ac. Morbi tempor dapibus tincidunt. Sed ornare, velit nec ullamcorper bibendum, ipsum urna finibus tellus, sed fringilla mi nunc eu tortor. Integer dapibus arcu quis aliquet pulvinar. Nunc finibus risus diam, eget malesuada est efficitur eu. Curabitur vel mauris faucibus, vestibulum dolor sed, cursus orci.', 1, 0, '2022-02-28 10:51:17', '2022-02-28 10:51:25'),
(5, 'College of Computer Studies', 'Pellentesque gravida, neque at aliquam maximus, risus nunc feugiat felis, id sagittis justo quam vitae quam. Donec et massa feugiat, maximus ipsum vel, sodales nulla. Aenean rhoncus neque sed turpis bibendum cursus. Vivamus scelerisque sem lectus, vitae tristique urna commodo vitae. Proin feugiat elementum pellentesque. Aenean congue faucibus semper. Integer non volutpat mi.\r\n\r\nSuspendisse ultricies orci a hendrerit faucibus. Praesent consequat purus et massa vestibulum egestas. Fusce tincidunt imperdiet lectus eu rhoncus. Curabitur a placerat ligula, eu mattis nunc. Ut dolor enim, lobortis eget vulputate non, auctor ut metus. Integer placerat vel risus quis ultricies. Nunc convallis mi ut est consectetur cursus. Donec id metus at augue rutrum porttitor quis eu metus.', 1, 0, '2022-02-28 10:53:49', NULL),
(6, 'College of Criminal Justice', 'Morbi sit amet magna in justo sodales ullamcorper vel et odio. Nulla facilisi. Nulla nec auctor augue, ut lacinia sem. Curabitur pretium lacus velit. Mauris vitae mauris elementum risus congue suscipit vitae quis lectus. Vivamus id diam porttitor, vestibulum metus et, pulvinar sapien. Sed convallis hendrerit tincidunt. Sed pulvinar sem sapien, sit amet fermentum nibh fermentum quis. Morbi pretium leo vitae viverra pharetra. Nunc efficitur bibendum odio, vel semper mi commodo eu. Donec rhoncus ac nibh non hendrerit. Proin sed accumsan risus. Morbi dictum dui a eros molestie, sed luctus dolor hendrerit. Integer at commodo leo, at ullamcorper tortor. Proin sagittis felis a mollis convallis.', 1, 0, '2022-02-28 10:54:10', NULL),
(7, 'Sample', 'Test', 1, 1, '2022-02-28 10:54:28', '2022-02-28 10:55:14'),
(8, 'College of Education', 'Aenean eget dignissim tellus. Nam venenatis aliquam lectus ac pretium. Mauris hendrerit quis est nec pulvinar. Pellentesque iaculis odio nisl, a sagittis urna rutrum nec. Aenean dolor nisl, varius non massa sit amet, mattis tempor magna. Suspendisse sed elit orci. Donec tempor elit tristique ullamcorper consequat. Etiam id lectus et ligula vulputate eleifend sed quis nibh. Ut id nibh consequat, semper quam vitae, blandit magna. Proin sed magna eget mi dictum vestibulum. Cras eget magna sodales, tincidunt metus vel, vestibulum urna. Vestibulum vestibulum libero eros, nec iaculis risus finibus ut. Vestibulum luctus risus magna.', 1, 0, '2022-02-28 11:16:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'XYZ College Website'),
(6, 'short_name', 'CWMS - PHP'),
(11, 'logo', 'uploads/logo-1646012157.png?v=1646012157'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/cover-1646012157.jpg?v=1646012159'),
(15, 'school_address', 'Here Street, Brgy. There, Over Here City, Negros Occidental, 6100, Philippines'),
(16, 'school_tel_no', '+456 645 9987'),
(17, 'school_mobile', '+63 912 456 4569'),
(18, 'school_email', 'info@xyzstatecollege.com'),
(19, 'map_coords', '10.676033878642961, 122.9520835825518');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Adminstrator', 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/avatars/1.png?v=1646034408', NULL, 1, '2021-01-20 14:02:37', '2022-02-28 15:46:48'),
(7, 'Claire', 'Blake', 'cblake', '4744ddea876b11dcb1d169fadf494418', 'uploads/avatars/7.png?v=1646034368', NULL, 2, '2022-02-28 15:46:08', '2022-02-28 15:46:08'),
(8, 'Mark', 'Cooper', 'mcooper', '0c4635c5af0f173c26b0d85b6c9b398b', NULL, NULL, 2, '2022-02-28 15:49:53', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article_list`
--
ALTER TABLE `article_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `course_list`
--
ALTER TABLE `course_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `department_list`
--
ALTER TABLE `department_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article_list`
--
ALTER TABLE `article_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_list`
--
ALTER TABLE `course_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `department_list`
--
ALTER TABLE `department_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article_list`
--
ALTER TABLE `article_list`
  ADD CONSTRAINT `article_user_id_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `course_list`
--
ALTER TABLE `course_list`
  ADD CONSTRAINT `course_department_id_FK` FOREIGN KEY (`department_id`) REFERENCES `department_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
