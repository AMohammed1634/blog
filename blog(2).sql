-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 06, 2020 at 09:52 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`, `category_id`) VALUES
(1, 'French', 'The French have always had an eye for beauty. One look at the T-shirts below and you\'ll see that same appreciation has been applied abundantly to their postage stamps. Below are some of our most beautiful and colorful T-shirts, so browse away! And don\'t forget to go all the way to the bottom - you don\'t want to miss any of them!', NULL, NULL, 8),
(2, 'Italian', 'The full and resplendent treasure chest of art, literature, music, and science that Italy has given the world is reflected splendidly in its postal stamps. If we could, we would dedicate hundreds of T-shirts to this amazing treasure of beautiful images, but for now we will have to live with what you see here. You don\'t have to be Italian to love these gorgeous T-shirts, just someone who appreciates the finer things in life!', NULL, NULL, 8),
(3, 'Irish', 'It was Churchill who remarked that he thought the Irish most curious because they didn\'t want to be English. How right he was! But then, he was half-American, wasn\'t he? If you have an Irish genealogy you will want these T-shirts! If you suddenly turn Irish on St. Patrick\'s Day, you too will want these T-shirts! Take a look at some of the coolest T-shirts we have!', NULL, NULL, 8),
(4, 'Animal', ' Our ever-growing selection of beautiful animal T-shirts represents critters from everywhere, both wild and domestic. If you don\'t see the T-shirt with the animal you\'re looking for, tell us and we\'ll find it!', NULL, NULL, 8),
(5, 'Flower', 'These unique and beautiful flower T-shirts are just the item for the gardener, flower arranger, florist, or general lover of things beautiful. Surprise the flower in your life with one of the beautiful botanical T-shirts or just get a few for yourself!', NULL, NULL, 8),
(6, 'Christmas', ' Because this is a unique Christmas T-shirt that you\'ll only wear a few times a year, it will probably last for decades (unless some grinch nabs it from you, of course). Far into the future, after you\'re gone, your grandkids will pull it out and argue over who gets to wear it. What great snapshots they\'ll make dressed in Grandpa or Grandma\'s incredibly tasteful and unique Christmas T-shirt! Yes, everyone will remember you forever and what a silly goof you were when you would wear only your Santa beard and cap so you wouldn\'t cover up your nifty T-shirt.', NULL, NULL, 8),
(7, 'Valentine\'s', 'For the more timid, all you have to do is wear your heartfelt message to get it across. Buy one for you and your sweetie(s) today!', NULL, NULL, 8),
(8, 'Men', 'Men Clothes', NULL, NULL, 0),
(9, 'Women', 'Women Clothes', NULL, NULL, 0),
(10, 'Kids', 'Kids Clothes', NULL, NULL, 0),
(11, 'Jackets', 'Wandarful Jackets', NULL, NULL, 9),
(12, 'Dresses', 'sowaray Dresses', NULL, NULL, 9);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_10_11_202731_create_roles_table', 2),
(5, '2019_10_11_202849_create_categories_table', 2),
(6, '2019_10_11_203041_add_roles_id_to_users', 3),
(7, '2019_10_11_203641_create_products_table', 4),
(8, '2019_10_11_204350_create_reviews_table', 5),
(9, '2019_10_11_205217_create_wish_lists_table', 6),
(10, '2019_10_11_211154_create_orders_table', 7),
(11, '2019_10_11_211840_create_shopping_carts_table', 8),
(14, '2019_10_12_110926_add_image_to_users_table', 9),
(15, '2019_10_29_221932_add_suber_category_to_categories', 10),
(16, '2019_11_28_120652_add_phone_to_user_table', 11),
(23, '2019_12_04_100354_create_updated_products_table', 12),
(24, '2019_12_04_110212_create_user_images_table', 12),
(26, '2019_12_12_085546_add_some_column_to_user_images', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` double(8,2) NOT NULL,
  `shopping_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `total_amount`, `shopping_id`, `users_id`, `created_at`, `updated_at`) VALUES
(28, 72.99, '46163665', 10, '2020-01-30 16:24:23', '2020-01-30 16:24:24'),
(29, 56.95, '7122906', 10, '2020-01-30 20:10:50', '2020-01-30 20:10:51'),
(30, 49.99, '18012606', 10, '2020-01-30 20:13:56', '2020-01-30 20:13:56'),
(31, 160.88, '20795885', 1, '2020-01-31 14:51:45', '2020-01-31 14:51:46'),
(32, 65.00, '9743737', 1, '2020-02-02 09:09:27', '2020-02-02 09:09:28'),
(33, 15.95, '97500240', 1, '2020-02-05 20:23:01', '2020-02-05 20:23:01');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `discounted_price` decimal(8,2) NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `discounted_price`, `img`, `img_2`, `thumbnail`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Arc d\'Triomphe', 'This beautiful and iconic T-shirt will no doubt lead you to your own triumph.', '14.99', '0.00', '1.jpg', 'arc-d-triomphe-2.gif', 'arc-d-triomphe-thumbnail.gif', 0, 1, NULL, NULL),
(3, 'Coat of Arms', 'There\'s good reason why the ship plays a prominent part on this shield!', '14.50', '0.00', '2.jpg', 'coat-of-arms-2.gif', 'coat-of-arms-thumbnail.gif', 0, 1, NULL, NULL),
(4, 'Gallic Cock', 'This fancy chicken is perhaps the most beloved of all French symbols. Unfortunately, there are only a few hundred left, so you\'d better get your T-shirt now!', '18.99', '16.99', '3.jpg', 'gallic-cock-2.gif', 'gallic-cock-thumbnail.gif', 0, 1, NULL, NULL),
(5, 'Marianne', 'She symbolizes the \"Triumph of the Republic\" and has been depicted many different ways in the history of France, as you will see below!', '15.95', '14.95', '4.jpg', 'marianne-2.gif', 'marianne-thumbnail.gif', 0, 1, NULL, NULL),
(6, 'Alsace', 'It was in this region of France that Gutenberg perfected his movable type. If he could only see what he started!', '16.50', '0.00', '5.jpg', 'alsace-2.gif', 'alsace-thumbnail.gif', 0, 1, NULL, NULL),
(7, 'Apocalypse Tapestry', 'One of the most famous tapestries of the Loire Valley, it dates from the 14th century. The T-shirt is of more recent vintage, however.', '20.00', '18.95', '7.jpg', 'apocalypse-tapestry-2.gif', 'apocalypse-tapestry-thumbnail.gif', 0, 1, NULL, NULL),
(8, 'Centaur', 'There were never any lady centaurs, so these guys had to mate with nymphs and mares. No wonder they were often in such bad moods!', '14.99', '0.00', '8.jpg', 'centaur-2.gif', 'centaur-thumbnail.gif', 0, 1, NULL, NULL),
(9, 'Corsica', 'Borrowed from Spain, the \"Moor\'s head\" may have celebrated the Christians\' victory over the Moslems in that country.', '22.00', '0.00', '10.jpg', 'corsica-2.gif', 'corsica-thumbnail.gif', 0, 1, NULL, NULL),
(10, 'Haute Couture', 'This stamp publicized the dress making industry. Use it to celebrate the T-shirt industry!', '15.99', '14.95', '11.jpg', 'haute-couture-2.gif', 'haute-couture-thumbnail.gif', 0, 1, NULL, NULL),
(11, 'Iris', 'Iris was the Goddess of the Rainbow, daughter of the Titans Thaumas and Electra. Are you up to this T-shirt?!', '17.50', '0.00', '12.jpg', 'iris-2.gif', 'iris-thumbnail.gif', 0, 1, NULL, NULL),
(12, 'Lorraine', 'The largest American cemetery in France is located in Lorraine and most of the folks there still appreciate that fact.', '16.95', '0.00', '13.jpg', 'lorraine-2.gif', 'lorraine-thumbnail.gif', 0, 1, NULL, NULL),
(13, 'Mercury', 'Besides being the messenger of the gods, did you know that Mercury was also the god of profit and commerce? This T-shirt is for business owners!', '21.99', '18.95', '14.jpg', 'mercury-2.gif', 'mercury-thumbnail.gif', 0, 1, NULL, NULL),
(14, 'County of Nice', 'Nice is so nice that it has been fought over for millennia, but now it all belongs to France.', '12.95', '0.00', '15.jpg', 'county-of-nice-2.gif', 'county-of-nice-thumbnail.gif', 0, 1, NULL, NULL),
(15, 'Notre Dame', 'Commemorating the 800th anniversary of the famed cathedral.', '18.50', '16.99', '16.jpg', 'notre-dame-2.gif', 'notre-dame-thumbnail.gif', 0, 1, NULL, NULL),
(16, 'Paris Peace Conference', 'The resulting treaties allowed Italy, Romania, Hungary, Bulgaria, and Finland to reassume their responsibilities as sovereign states in international affairs and thus qualify for membership in the UN.', '16.95', '15.99', '17.jpg', 'paris-peace-conference-2.gif', 'paris-peace-conference-thumbnail.gif', 0, 1, NULL, NULL),
(17, 'Sarah Bernhardt', 'The \"Divine Sarah\" said this about Americans: \"You are younger than we as a race, you are perhaps barbaric, but what of it? You are still in the molding. Your spirit is superb. It is what helped us win the war.\" Perhaps we\'re still barbaric but we\'re still winning wars for them too!', '14.99', '0.00', '18.jpg', 'sarah-bernhardt-2.gif', 'sarah-bernhardt-thumbnail.gif', 0, 1, NULL, NULL),
(18, 'Hunt', 'A scene from \"Les Tres Riches Heures,\" a medieval \"book of hours\" containing the text for each liturgical hour of the day. This scene is from a 14th century painting.', '16.99', '15.95', '19.jpg', 'hunt-2.gif', 'hunt-thumbnail.gif', 0, 1, NULL, NULL),
(19, 'Italia', 'The War had just ended when this stamp was designed, and even so, there was enough optimism to show the destroyed oak tree sprouting again from its stump! What a beautiful T-shirt!', '22.00', '18.99', '20.jpg', 'italia-2.gif', 'italia-thumbnail.gif', 0, 2, NULL, NULL),
(20, 'Torch', 'The light goes on! Carry the torch with this T-shirt and be a beacon of hope for the world!', '19.99', '17.95', '21.jpg', 'torch-2.gif', 'torch-thumbnail.gif', 0, 2, NULL, NULL),
(21, 'Espresso', 'The winged foot of Mercury speeds the Special Delivery mail to its destination. In a hurry? This T-shirt is for you!', '16.95', '0.00', '22.jpg', 'espresso-2.gif', 'espresso-thumbnail.gif', 0, 2, NULL, NULL),
(22, 'Galileo', 'This beautiful T-shirt does honor to one of Italy\'s (and the world\'s) most famous scientists. Show your appreciation for the education you\'ve received!', '14.99', '0.00', '23.jpg', 'galileo-2.gif', 'galileo-thumbnail.gif', 0, 2, NULL, NULL),
(23, 'Italian Airmail', 'Thanks to modern Italian post, folks were able to reach out and touch each other. Or at least so implies this image. This is a very fast and friendly T-shirt--you\'ll make friends with it!', '21.00', '17.99', '31.jpg', 'italian-airmail-2.gif', 'italian-airmail-thumbnail.gif', 0, 2, NULL, NULL),
(24, 'Mazzini', 'Giuseppe Mazzini is considered one of the patron saints of the \"Risorgimiento.\" Wear this beautiful T-shirt to tell the world you agree!', '20.50', '18.95', '32.jpg', 'mazzini-2.gif', 'mazzini-thumbnail.gif', 0, 2, NULL, NULL),
(25, 'Romulus & Remus', 'Back in 753 BC, so the story goes, Romulus founded the city of Rome (in competition with Remus, who founded a city on another hill). Their adopted mother is shown in this image. When did they suspect they were adopted?', '17.99', '16.95', '33.jpg', 'romulus-remus-2.gif', 'romulus-remus-thumbnail.gif', 0, 2, NULL, NULL),
(26, 'Italy Maria', 'This beautiful image of the Virgin is from a work by Raphael, whose life and death it honors. It is one of our most popular T-shirts!', '14.00', '0.00', '34.jpg', 'italy-maria-2.gif', 'italy-maria-thumbnail.gif', 0, 2, NULL, NULL),
(27, 'Italy Jesus', 'This image of Jesus teaching the gospel was issued to commemorate the third centenary of the \"propagation of the faith.\" Now you can do your part with this T-shirt!', '16.95', '0.00', '35.jpg', 'italy-jesus-2.gif', 'italy-jesus-thumbnail.gif', 0, 2, NULL, NULL),
(28, 'St. Francis', 'Here St. Francis is receiving his vision. This dramatic and attractive stamp was issued on the 700th anniversary of that event.', '22.00', '18.99', '36.jpg', 'st-francis-2.gif', 'st-francis-thumbnail.gif', 0, 2, NULL, NULL),
(29, 'Irish Coat of Arms', 'This was one of the first stamps of the new Irish Republic, and it makes a T-shirt you\'ll be proud to wear on St. Paddy\'s Day!', '14.99', '0.00', '37.jpg', 'irish-coat-of-arms-2.gif', 'irish-coat-of-arms-thumbnail.gif', 0, 3, NULL, NULL),
(30, 'Easter Rebellion', 'The Easter Rebellion of 1916 was a defining moment in Irish history. Although only a few hundred participated and the British squashed it in a week, its leaders were executed, which galvanized the uncommitted.', '19.00', '16.95', '38.jpg', 'easter-rebellion-2.gif', 'easter-rebellion-thumbnail.gif', 0, 3, NULL, NULL),
(31, 'Guiness', 'Class! Who is this man and why is he important enough for his own T-shirt?!', '15.00', '0.00', '39.jpg', 'guiness-2.gif', 'guiness-thumbnail.gif', 0, 3, NULL, NULL),
(32, 'St. Patrick', 'This stamp commemorated the 1500th anniversary of the revered saint\'s death. Is there a more perfect St. Patrick\'s Day T-shirt?!', '20.50', '17.95', '40.jpg', 'st-patrick-2.gif', 'st-patrick-thumbnail.gif', 0, 3, NULL, NULL),
(33, 'St. Peter', 'This T-shirt commemorates the holy year of 1950.', '16.00', '14.95', '41.jpg', 'st-peter-2.gif', 'st-peter-thumbnail.gif', 0, 3, NULL, NULL),
(34, 'Sword of Light', 'This was the very first Irish postage stamp, and what a beautiful and cool T-shirt it makes for the Irish person in your life!', '14.99', '0.00', '42.jpg', 'sword-of-light-2.gif', 'sword-of-light-thumbnail.gif', 0, 3, NULL, NULL),
(35, 'Thomas Moore', 'One of the greatest if not the greatest of Irish poets and writers, Moore led a very interesting life, though plagued with tragedy in a somewhat typically Irish way. Remember \"The Last Rose of Summer\"?', '15.95', '14.99', '43.jpg', 'thomas-moore-2.gif', 'thomas-moore-thumbnail.gif', 0, 3, NULL, NULL),
(36, 'Visit the Zoo', 'This WPA poster is a wonderful example of the art produced by the Works Projects Administration during the Depression years. Do you feel like you sometimes live or work in a zoo? Then this T-shirt is for you!', '20.00', '16.95', '44.jpg', 'visit-the-zoo-2.gif', 'visit-the-zoo-thumbnail.gif', 0, 4, NULL, NULL),
(37, 'Sambar', 'This handsome Malayan Sambar was a pain in the neck to get to pose like this, and all so you could have this beautiful retro animal T-shirt!', '19.00', '17.99', '45.jpg', 'sambar-2.gif', 'sambar-thumbnail.gif', 0, 4, NULL, NULL),
(38, 'Buffalo', 'Of all the critters in our T-shirt zoo, this is one of our most popular. A classic animal T-shirt for an individual like yourself!', '14.99', '0.00', '46.jpg', 'buffalo-2.gif', 'buffalo-thumbnail.gif', 0, 4, NULL, NULL),
(39, 'Mustache Monkey', 'This fellow is more than equipped to hang out with that tail of his, just like you\'ll be fit for hanging out with this great animal T-shirt!', '20.00', '17.95', '47.jpg', 'mustache-monkey-2.gif', 'mustache-monkey-thumbnail.gif', 0, 4, NULL, NULL),
(40, 'Colobus', 'Why is he called \"Colobus,\" \"the mutilated one\"? He doesn\'t have a thumb, just four fingers! He is far from handicapped, however; his hands make him the great swinger he is. Speaking of swinging, that\'s what you\'ll do with this beautiful animal T-shirt!', '17.00', '15.99', '48.jpg', 'colobus-2.gif', 'colobus-thumbnail.gif', 0, 4, NULL, NULL),
(41, 'Canada Goose', 'Being on a major flyway for these guys, we know all about these majestic birds. They hang out in large numbers on a lake near our house and fly over constantly. Remember what Frankie Lane said? \"I want to go where the wild goose goes!\" And when you go, wear this cool Canada goose animal T-shirt.', '15.99', '0.00', '49.jpg', 'canada-goose-2.gif', 'canada-goose-thumbnail.gif', 0, 4, NULL, NULL),
(42, 'Congo Rhino', 'Among land mammals, this white rhino is surpassed in size only by the elephant. He has a big fan base too, working hard to make sure he sticks around. You\'ll be a fan of his, too, when people admire this unique and beautiful T-shirt on you!', '20.00', '18.99', '68.jpg', 'congo-rhino-2.gif', 'congo-rhino-thumbnail.gif', 0, 4, NULL, NULL),
(43, 'Equatorial Rhino', 'There\'s a lot going on in this frame! A black rhino is checking out that python slithering off into the bush--or is he eyeing you? You can bet all eyes will be on you when you wear this T-shirt!', '19.95', '17.95', '1-1.jpg', 'equatorial-rhino-2.gif', 'equatorial-rhino-thumbnail.gif', 0, 4, NULL, NULL),
(44, 'Ethiopian Rhino', 'Another white rhino is honored in this classic design that bespeaks the Africa of the early century. This pointillist and retro T-shirt will definitely turn heads!', '16.00', '0.00', '2-1.jpg', 'ethiopian-rhino-2.gif', 'ethiopian-rhino-thumbnail.gif', 0, 4, NULL, NULL),
(45, 'Dutch Sea Horse', 'I think this T-shirt is destined to be one of our most popular simply because it is one of our most beautiful!', '12.50', '0.00', '3-1.jpg', 'dutch-sea-horse-2.gif', 'dutch-sea-horse-thumbnail.gif', 0, 4, NULL, NULL),
(46, 'Dutch Swans', 'This stamp was designed in the middle of the Nazi occupation, as was the one above. Together they reflect a spirit of beauty that evil could not suppress. Both of these T-shirts will make it impossible to suppress your artistic soul, too!', '21.00', '18.99', '4-1.jpg', 'dutch-swans-2.gif', 'dutch-swans-thumbnail.gif', 0, 4, NULL, NULL),
(47, 'Ethiopian Elephant', 'From the same series as the Ethiopian Rhino and the Ostriches, this stylish elephant T-shirt will mark you as a connoisseur of good taste!', '18.99', '16.95', '5-1.jpg', 'ethiopian-elephant-2.gif', 'ethiopian-elephant-thumbnail.gif', 0, 4, NULL, NULL),
(48, 'Laotian Elephant', 'This working guy is proud to have his own stamp, and now he has his own T-shirt!', '21.00', '18.99', '6-1.jpg', 'laotian-elephant-2.gif', 'laotian-elephant-thumbnail.gif', 0, 4, NULL, NULL),
(49, 'Liberian Elephant', 'And yet another Jumbo! You need nothing but a big heart to wear this T-shirt (or a big sense of style)!', '22.00', '17.50', '7-1.jpg', 'liberian-elephant-2.gif', 'liberian-elephant-thumbnail.gif', 0, 4, NULL, NULL),
(50, 'Somali Ostriches', 'Another in an old series of beautiful stamps from Ethiopia. These big birds pack quite a wallop, and so will you when you wear this uniquely retro T-shirt!', '12.95', '0.00', '8-1.jpg', 'somali-ostriches-2.gif', 'somali-ostriches-thumbnail.gif', 0, 4, NULL, NULL),
(51, 'Tankanyika Giraffe', 'The photographer had to stand on a step ladder for this handsome portrait, but his efforts paid off with an angle we seldom see of this lofty creature. This beautiful retro T-shirt would make him proud!', '15.00', '12.99', '10-1.jpg', 'tankanyika-giraffe-2.gif', 'tankanyika-giraffe-thumbnail.gif', 0, 4, NULL, NULL),
(52, 'Ifni Fish', 'This beautiful stamp was issued to commemorate National Colonial Stamp Day (you can do that when you have a colony). When you wear this fancy fish T-shirt, your friends will think it\'s national T-shirt day!', '14.00', '0.00', '11-1.jpg', 'ifni-fish-2.gif', 'ifni-fish-thumbnail.gif', 0, 4, NULL, NULL),
(53, 'Sea Gull', 'A beautiful stamp from a small enclave in southern Morocco that belonged to Spain until 1969 makes a beautiful bird T-shirt.', '19.00', '16.95', '12-1.jpg', 'sea-gull-2.gif', 'sea-gull-thumbnail.gif', 0, 4, NULL, NULL),
(54, 'King Salmon', 'You can fish them and eat them and now you can wear them with this classic animal T-shirt.', '17.95', '15.99', '13-1.jpg', 'king-salmon-2.gif', 'king-salmon-thumbnail.gif', 0, 4, NULL, NULL),
(55, 'Laos Bird', 'This fellow is also known as the \"White Crested Laughing Thrush.\" What\'s he laughing at? Why, at the joy of being on your T-shirt!', '12.00', '0.00', '19-1.jpg', 'laos-bird-2.gif', 'laos-bird-thumbnail.gif', 0, 4, NULL, NULL),
(56, 'Mozambique Lion', 'The Portuguese were too busy to run this colony themselves so they gave the Mozambique Company a charter to do it. I think there must be some pretty curious history related to that (the charter only lasted for 50 years)! If you\'re a Leo, or know a Leo, you should seriously consider this T-shirt!', '15.99', '14.95', '20-1.jpg', 'mozambique-lion-2.gif', 'mozambique-lion-thumbnail.gif', 0, 5, NULL, NULL),
(57, 'Peru Llama', 'This image is nearly 100 years old! Little did this little llama realize that he was going to be made immortal on the Web and on this very unique animal T-shirt (actually, little did he know at all)!', '21.50', '17.99', '22-1.jpg', 'peru-llama-2.gif', 'peru-llama-thumbnail.gif', 0, 5, NULL, NULL),
(58, 'Romania Alsatian', 'If you know and love this breed, there\'s no reason in the world that you shouldn\'t buy this T-shirt right now!', '15.95', '0.00', '23-1.jpg', 'romania-alsatian-2.gif', 'romania-alsatian-thumbnail.gif', 0, 5, NULL, NULL),
(59, 'Somali Fish', 'This is our most popular fish T-shirt, hands down. It\'s a beauty, and if you wear this T-shirt, you\'ll be letting the world know you\'re a fine catch!', '19.95', '16.95', '24-1.jpg', 'somali-fish-2.gif', 'somali-fish-thumbnail.gif', 0, 5, NULL, NULL),
(60, 'Trout', 'This beautiful image will warm the heart of any fisherman! You must know one if you\'re not one yourself, so you must buy this T-shirt!', '14.00', '0.00', '25-1.jpg', 'trout-2.gif', 'trout-thumbnail.gif', 0, 5, NULL, NULL),
(61, 'Baby Seal', 'Ahhhhhh! This little harp seal would really prefer not to be your coat! But he would like to be your T-shirt!', '21.00', '18.99', '27-1.jpg', 'baby-seal-2.gif', 'baby-seal-thumbnail.gif', 0, 5, NULL, NULL),
(62, 'Musk Ox', 'Some critters you just don\'t want to fool with, and if I were facing this fellow I\'d politely give him the trail! That is, of course, unless I were wearing this T-shirt.', '15.50', '0.00', '28-1.jpg', 'musk-ox-2.gif', 'musk-ox-thumbnail.gif', 0, 5, NULL, NULL),
(63, 'Suvla Bay', ' In 1915, Newfoundland sent its Newfoundland Regiment to Suvla Bay in Gallipoli to fight the Turks. This classic image does them honor. Have you ever heard of them? Share the news with this great T-shirt!', '12.99', '0.00', '29-1.jpg', 'suvla-bay-2.gif', 'suvla-bay-thumbnail.gif', 0, 5, NULL, NULL),
(64, 'Caribou', 'There was a time when Newfoundland was a self-governing dominion of the British Empire, so it printed its own postage. The themes are as typically Canadian as can be, however, as shown by this \"King of the Wilde\" T-shirt!', '21.00', '19.95', '30-1.jpg', 'caribou-2.gif', 'caribou-thumbnail.gif', 0, 5, NULL, NULL),
(65, 'Afghan Flower', 'This beautiful image was issued to celebrate National Teachers Day. Perhaps you know a teacher who would love this T-shirt?', '18.50', '16.99', '31-1.jpg', 'afghan-flower-2.gif', 'afghan-flower-thumbnail.gif', 0, 5, NULL, NULL),
(66, 'Albania Flower', 'Well, these crab apples started out as flowers, so that\'s close enough for us! They still make for a uniquely beautiful T-shirt.', '16.00', '14.95', '37-1.jpg', 'albania-flower-2.gif', 'albania-flower-thumbnail.gif', 0, 5, NULL, NULL),
(67, 'Austria Flower', 'Have you ever had nasturtiums on your salad? Try it--they\'re almost as good as having them on your T-shirt!', '12.99', '0.00', '38-1.jpg', 'austria-flower-2.gif', 'austria-flower-thumbnail.gif', 0, 5, NULL, NULL),
(68, 'Bulgarian Flower', 'For your interest (and to impress your friends), this beautiful stamp was issued to honor the George Dimitrov state printing works. You\'ll need to know this when you wear the T-shirt.', '16.00', '14.99', '39-1.jpg', 'bulgarian-flower-2.gif', 'bulgarian-flower-thumbnail.gif', 0, 5, NULL, NULL),
(69, 'Colombia Flower', 'Celebrating the 75th anniversary of the Universal Postal Union, a date to mark on your calendar and on which to wear this T-shirt!', '14.50', '12.95', '40-1.jpg', 'colombia-flower-2.gif', 'colombia-flower-thumbnail.gif', 0, 5, NULL, NULL),
(70, 'Congo Flower', 'The Congo is not at a loss for beautiful flowers, and we\'ve picked a few of them for your T-shirts.', '21.00', '17.99', '41-1.jpg', 'congo-flower-2.gif', 'congo-flower-thumbnail.gif', 0, 5, NULL, NULL),
(71, 'Costa Rica Flower', 'This national flower of Costa Rica is one of our most beloved flower T-shirts (you can see one on Jill, above). You will surely stand out in this T-shirt!', '12.99', '0.00', '42-1.jpg', 'costa-rica-flower.gif', 'costa-rica-flower-thumbnail.gif', 0, 5, NULL, NULL),
(72, 'Gabon Flower', 'The combretum, also known as \"jungle weed,\" is used in China as a cure for opium addiction. Unfortunately, when you wear this T-shirt, others may become hopelessly addicted to you!', '19.00', '16.95', '43-1.jpg', 'gabon-flower-2.gif', 'gabon-flower-thumbnail.gif', 0, 5, NULL, NULL),
(73, 'Ghana Flower', 'This is one of the first gingers to bloom in the spring--just like you when you wear this T-shirt!', '21.00', '18.99', '44-1.jpg', 'ghana-flower-2.gif', 'ghana-flower-thumbnail.gif', 0, 5, NULL, NULL),
(74, 'Israel Flower', 'This plant is native to the rocky and sandy regions of the western United States, so when you come across one, it really stands out. And so will you when you put on this beautiful T-shirt!', '19.50', '17.50', '45-1.jpg', 'israel-flower-2.gif', 'israel-flower-thumbnail.gif', 0, 5, NULL, NULL),
(75, 'Poland Flower', 'A beautiful and sunny T-shirt for both spring and summer!', '16.95', '15.99', '46-1.jpg', 'poland-flower-2.gif', 'poland-flower-thumbnail.gif', 0, 5, NULL, NULL),
(76, 'Romania Flower', 'Also known as the spring pheasant\'s eye, this flower belongs on your T-shirt this summer to help you catch a few eyes.', '12.95', '0.00', '47-1.jpg', 'romania-flower-2.gif', 'romania-flower-thumbnail.gif', 0, 5, NULL, NULL),
(77, 'Russia Flower', 'Someone out there who can speak Russian needs to tell me what this plant is. I\'ll sell you the T-shirt for $10 if you can!', '21.00', '18.95', '48-1.jpg', 'russia-flower-2.gif', 'russia-flower-thumbnail.gif', 0, 5, NULL, NULL),
(78, 'San Marino Flower', '\"A white sport coat and a pink carnation, I\'m all dressed up for the dance!\" Well, how about a white T-shirt and a pink carnation?!', '19.95', '17.99', '49-1.jpg', 'san-marino-flower-2.gif', 'san-marino-flower-thumbnail.gif', 0, 5, NULL, NULL),
(79, 'Uruguay Flower', 'The Indian Queen Anahi was the ugliest woman ever seen. But instead of living a slave when captured by the Conquistadores, she immolated herself in a fire and was reborn the most beautiful of flowers: the ceibo, national flower of Uruguay. Of course, you won\'t need to burn to wear this T-shirt, but you may cause some pretty hot glances to be thrown your way!', '17.99', '16.99', '50-1.jpg', 'uruguay-flower-2.gif', 'uruguay-flower-thumbnail.gif', 0, 5, NULL, NULL),
(80, 'Snow Deer UP', 'Tarmo has produced some wonderful Christmas T-shirts for us, and we hope to have many more soon.', '21.00', '18.95', '51-1.jpg', 'snow-deer-2.gif', 'snow-deer-thumbnail.gif', 0, 6, NULL, '2019-07-18 13:26:00'),
(81, 'Holly Cat', 'Few things make a cat happier at Christmas than a tree suddenly appearing in the house!', '15.99', '0.00', '53-1.jpg', 'holly-cat-2.gif', 'holly-cat-thumbnail.gif', 0, 6, NULL, NULL),
(82, 'Christmas Seal', 'Is this your grandmother? It could be, you know, and I\'d bet she\'d recognize the Christmas seal on this cool Christmas T-shirt.', '19.99', '17.99', '55-1.jpg', 'christmas-seal-2.gif', 'christmas-seal-thumbnail.gif', 0, 6, NULL, NULL),
(83, 'Weather Vane', 'This weather vane dates from the 1830\'s and is still showing which way the wind blows! Trumpet your arrival with this unique Christmas T-shirt.', '15.95', '14.99', '56-1.jpg', 'weather-vane-2.gif', 'weather-vane-thumbnail.gif', 0, 6, NULL, NULL),
(84, 'Mistletoe', 'This well-known parasite and killer of trees was revered by the Druids, who would go out and gather it with great ceremony. Youths would go about with it to announce the new year. Eventually more engaging customs were attached to the strange plant, and we\'re here to see that they continue with these cool Christmas T-shirts.', '19.00', '17.99', '57-1.jpg', 'mistletoe-2.gif', 'mistletoe-thumbnail.gif', 0, 6, NULL, NULL),
(85, 'Altar Piece', 'This beautiful angel Christmas T-shirt is awaiting the opportunity to adorn your chest!', '20.50', '18.50', '62-1.jpg', 'altar-piece-2.gif', 'altar-piece-thumbnail.gif', 0, 6, NULL, NULL),
(86, 'The Three Wise Men', 'This is a classic rendition of one of the season�s most beloved stories, and now showing on a Christmas T-shirt for you!', '12.99', '0.00', '66-1.jpg', 'the-three-wise-men-2.gif', 'the-three-wise-men-thumbnail.gif', 0, 6, NULL, NULL),
(87, 'Christmas Tree', 'Can you get more warm and folksy than this classic Christmas T-shirt?', '20.00', '17.95', '67-1.jpg', 'christmas-tree-2.gif', 'christmas-tree-thumbnail.gif', 0, 6, NULL, NULL),
(88, 'Madonna & Child', 'This exquisite image was painted by Filipino Lippi, a 15th century Italian artist. I think he would approve of it on a Going Postal Christmas T-shirt!', '21.95', '18.50', '69-1.jpg', 'madonna-child-2.gif', 'madonna-child-thumbnail.gif', 0, 6, NULL, NULL),
(89, 'The Virgin Mary', 'This stained glass window is found in Glasgow Cathedral, Scotland, and was created by Gabriel Loire of France, one of the most prolific of artists in this medium--and now you can have it on this wonderful Christmas T-shirt.', '16.95', '15.95', '73-1.jpg', '72-1.jpg', 'the-virgin-mary-thumbnail.gif', 0, 6, NULL, NULL),
(90, 'Adoration of the Kings', 'This design is from a miniature in the Evangelistary of Matilda in Nonantola Abbey, from the 12th century. As a Christmas T-shirt, it will cause you to be adored!', '17.50', '16.50', '74-1.jpg', 'adoration-of-the-kings-2.gif', 'adoration-of-the-kings-thumbnail.gif', 0, 6, NULL, NULL),
(91, 'A Partridge in a Pear Tree', 'The original of this beautiful stamp is by Jamie Wyeth and is in the National Gallery of Art. The next best is on our beautiful Christmas T-shirt!', '14.99', '0.00', '76-1.jpg', 'a-partridge-in-a-pear-tree-2.gif', 'a-partridge-in-a-pear-tree-thumbnail.gif', 0, 6, NULL, NULL),
(92, 'St. Lucy', 'This is a tiny detail of a large work called \"Mary, Queen of Heaven,\" done in 1480 by a Flemish master known only as \"The Master of St. Lucy Legend.\" The original is in a Bruges church. The not-quite-original is on this cool Christmas T-shirt.', '18.95', '0.00', '77-1.jpg', 'st-lucy-2.gif', 'st-lucy-thumbnail.gif', 0, 6, NULL, NULL),
(93, 'St. Lucia', 'Saint Lucia\'s tradition is an important part of Swedish Christmas, and an important part of that are the candles. Next to the candles in importance is this popular Christmas T-shirt!', '19.00', '17.95', '79-1.jpg', 'st-lucia-2.gif', 'st-lucia-thumbnail.gif', 0, 6, NULL, NULL),
(94, 'Swede Santa', 'Santa as a child. You must know a child who would love this cool Christmas T-shirt!?', '21.00', '18.50', '4-2.jpg', 'swede-santa-2.gif', 'swede-santa-thumbnail.gif', 0, 6, NULL, NULL),
(95, 'Wreath', 'Hey! I\'ve got an idea! Why not buy two of these cool Christmas T-shirts so you can wear one and tack the other one to your door?!', '18.99', '16.99', '14-2.jpg', 'wreath-2.gif', 'wreath-thumbnail.gif', 0, 6, NULL, NULL),
(96, 'Love', 'Here\'s a Valentine\'s day T-shirt that will let you say it all in just one easy glance--there\'s no mistake about it!', '19.00', '17.50', '13-2.jpg', 'love-2.gif', 'love-thumbnail.gif', 0, 7, NULL, NULL),
(97, 'Birds', 'Is your heart all aflutter? Show it with this T-shirt!', '21.00', '18.95', '12-2.jpg', 'birds-2.gif', 'birds-thumbnail.gif', 0, 7, NULL, NULL),
(98, 'Kat Over New Moon', 'Love making you feel lighthearted?', '14.99', '0.00', '10-2.jpg', 'kat-over-new-moon-2.gif', 'kat-over-new-moon-thumbnail.gif', 0, 7, NULL, NULL),
(99, 'Thrilling Love', 'This girl\'s got her hockey hunk right where she wants him!', '21.00', '18.50', '15-2.jpg', 'thrilling-love-2.gif', 'thrilling-love-thumbnail.gif', 0, 7, NULL, NULL),
(100, 'The Rapture of Psyche', 'Now we\'re getting a bit more serious!', '18.95', '16.99', '17-2.jpg', 'the-rapture-of-psyche-2.gif', 'the-rapture-of-psyche-thumbnail.gif', 0, 7, NULL, NULL),
(101, 'The Promise of Spring', 'With Valentine\'s Day come, can Spring be far behind?', '21.00', '19.50', '22-2.jpg', 'the-promise-of-spring-2.gif', 'the-promise-of-spring-thumbnail.gif', 0, 7, NULL, NULL),
(102, 'Jaket ', 'Good Jaket ', '25.00', '0.00', 'single_3.jpg', 'deal_ofthe_week.png', 'single_3_thumb.jpg', 0, 2, '2020-02-01 01:16:14', NULL),
(103, 'Jaket ', 'Good Jaket ', '25.00', '0.00', 'single_3.jpg', 'deal_ofthe_week.png', 'single_3_thumb.jpg', 0, 2, '2020-02-01 01:16:14', NULL),
(104, 'dress', 'Good Dress', '41.00', '1.00', '61.jpg', '61.jpg', '61.jpg', 0, 12, '2020-02-04 02:12:16', NULL),
(105, 'Jacket', 'life Jacket', '65.00', '0.00', '66.jpg', '66.jpg', '66.jpg', 0, 11, NULL, NULL),
(108, 'black Dress', 'sowary dress is wandrfull ', '60.00', '2.00', '69.jpg', '69.jpg', '69.jpg', 0, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(10) UNSIGNED NOT NULL,
  `products_id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `review`, `rating`, `products_id`, `users_id`, `created_at`, `updated_at`) VALUES
(2, 'asd', 3, 38, 1, '2019-08-10 02:58:23', '2019-08-10 02:58:23'),
(3, 'asd2', 4, 38, 1, '2019-08-10 03:08:47', '2019-08-10 03:08:47'),
(4, 'asd3', 3, 38, 1, '2019-08-10 03:09:01', '2019-08-10 03:09:01'),
(5, 'asd', 3, 3, 1, '2019-08-10 03:25:25', '2019-08-10 03:25:25'),
(6, '<h2 style=\"font-style:italic;\"><q><kbd><em><strong>GOOD&nbsp;</strong></em></kbd></q></h2>', 5, 21, 1, '2019-08-10 17:16:10', '2019-08-10 17:16:10'),
(7, '<p>not good&nbsp;</p>', 1, 101, 1, '2019-08-10 18:01:12', '2019-08-10 18:01:12'),
(8, '<p>Waooo</p>', 3, 37, 1, '2019-08-12 03:41:22', '2019-08-12 03:41:22'),
(9, '<p><em><strong>GOOD</strong></em>&nbsp;</p>', 4, 31, 1, '2019-08-14 05:07:53', '2019-08-14 05:07:53'),
(10, '<p><span class=\"marker\"><em><strong>GOOD</strong></em></span></p>', 4, 3, 1, '2019-08-16 07:26:00', '2019-08-16 07:26:00'),
(11, '<p>good <s><strong><em>design&nbsp;</em></strong></s></p>', 4, 95, 1, '2019-08-16 07:44:14', '2019-08-16 07:44:14'),
(12, '<p>Soo <span class=\"marker\"><em><strong>Good</strong></em></span>&nbsp;</p>', 4, 35, 6, '2019-08-20 04:40:40', '2019-08-20 04:40:40'),
(13, '<p><s><em><strong>GOOD</strong></em></s></p>', 3, 31, 6, '2019-08-20 17:51:16', '2019-08-20 17:51:16'),
(14, 'Test', 4, 35, 1, '2020-01-26 18:48:00', '2020-01-26 18:48:00'),
(15, 'Test 2', 3, 35, 1, '2020-01-26 18:48:24', '2020-01-26 18:48:24'),
(16, 'bad', 3, 79, 9, '2020-01-27 12:02:37', '2020-01-27 12:02:37'),
(17, 'GOOd', 4, 34, 1, '2020-02-02 09:03:14', '2020-02-02 09:03:14'),
(18, 'So Bad', 2, 79, 1, '2020-02-05 20:17:17', '2020-02-05 20:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'user', NULL, NULL),
(3, 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_carts`
--

CREATE TABLE `shopping_carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `ordered` int(11) NOT NULL DEFAULT -1,
  `orders_id` bigint(20) UNSIGNED DEFAULT NULL,
  `products_id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shopping_carts`
--

INSERT INTO `shopping_carts` (`id`, `quantity`, `ordered`, `orders_id`, `products_id`, `users_id`, `created_at`, `updated_at`) VALUES
(29, 1, 0, 31, 18, 1, '2019-11-27 16:35:10', '2020-01-31 14:51:45'),
(30, 1, 0, 31, 3, 1, '2019-11-27 16:36:06', '2020-01-31 14:51:45'),
(31, 1, 0, 31, 28, 1, '2019-11-27 16:41:33', '2020-01-31 14:51:46'),
(32, 1, 0, 31, 1, 1, '2019-11-27 16:41:44', '2020-01-31 14:51:46'),
(33, 1, 0, 31, 7, 1, '2019-11-27 16:41:57', '2020-01-31 14:51:46'),
(42, 1, -1, NULL, 28, 7, '2020-01-02 18:02:31', '2020-01-02 18:02:31'),
(43, 1, -1, NULL, 42, 7, '2020-01-05 12:04:38', '2020-01-05 12:04:38'),
(44, 1, 0, 31, 21, 1, '2020-01-26 11:04:35', '2020-01-31 14:51:46'),
(47, 1, 0, 31, 35, 1, '2020-01-26 17:54:26', '2020-01-31 14:51:46'),
(48, 1, -1, NULL, 31, 7, '2020-01-27 16:24:05', '2020-01-27 16:24:05'),
(62, 1, 0, 28, 1, 10, '2020-01-30 15:32:40', '2020-01-30 16:24:23'),
(63, 1, 0, 28, 9, 10, '2020-01-30 15:32:43', '2020-01-30 16:24:23'),
(64, 1, 0, 28, 11, 10, '2020-01-30 15:32:45', '2020-01-30 16:24:23'),
(65, 1, 0, 28, 15, 10, '2020-01-30 15:32:48', '2020-01-30 16:24:24'),
(66, 1, 0, 29, 35, 10, '2020-01-30 19:53:41', '2020-01-30 20:10:50'),
(67, 1, 0, 29, 80, 10, '2020-01-30 20:08:49', '2020-01-30 20:10:50'),
(68, 1, 0, 29, 87, 10, '2020-01-30 20:08:51', '2020-01-30 20:10:51'),
(69, 1, 0, 30, 101, 10, '2020-01-30 20:13:09', '2020-01-30 20:13:56'),
(70, 1, 0, 30, 55, 10, '2020-01-30 20:13:22', '2020-01-30 20:13:56'),
(71, 1, 0, 30, 18, 10, '2020-01-30 20:13:34', '2020-01-30 20:13:56'),
(72, 1, -1, NULL, 42, 10, '2020-01-30 20:18:35', '2020-01-30 20:18:35'),
(73, 1, 0, 31, 9, 1, '2020-01-31 14:51:09', '2020-01-31 14:51:46'),
(74, 1, 0, 31, 11, 1, '2020-01-31 14:51:20', '2020-01-31 14:51:46'),
(75, 1, 0, 32, 102, 1, '2020-02-01 08:49:08', '2020-02-02 09:09:27'),
(76, 1, 0, 32, 103, 1, '2020-02-02 09:02:41', '2020-02-02 09:09:27'),
(77, 1, 0, 32, 31, 1, '2020-02-02 09:02:56', '2020-02-02 09:09:27'),
(78, 1, 0, 33, 35, 1, '2020-02-04 19:29:32', '2020-02-05 20:23:01'),
(79, 1, -1, NULL, 35, 9, '2020-02-05 20:24:10', '2020-02-05 20:24:10'),
(80, 1, -1, NULL, 18, 9, '2020-02-05 20:24:13', '2020-02-05 20:24:13');

-- --------------------------------------------------------

--
-- Table structure for table `updated_products`
--

CREATE TABLE `updated_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `discounted_price` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `updated_products`
--

INSERT INTO `updated_products` (`id`, `user_id`, `product_id`, `img`, `name`, `price`, `discounted_price`, `created_at`, `updated_at`) VALUES
(1, 10, 31, 'NewTextAdded0.6459379591341983.jpg', 'Custom Name', '30.50', '2.85', '2019-12-20 15:30:28', '2019-12-20 15:30:28'),
(2, 9, NULL, 'NewTextAdded0.6459379591341983.jpg', NULL, NULL, NULL, '2020-01-28 14:18:33', '2020-01-28 14:18:33'),
(3, 10, NULL, 'NewTextAdded0.9766870233289041.jpg', NULL, NULL, NULL, '2020-01-30 16:12:21', '2020-01-30 16:12:21'),
(4, 1, NULL, 'NewTextAdded0.4542847550075393.jpg', NULL, NULL, NULL, '2020-02-01 08:54:29', '2020-02-01 08:54:29'),
(5, 1, NULL, 'NewTextAdded0.16500351935264013.jpg', NULL, NULL, NULL, '2020-02-02 09:08:12', '2020-02-02 09:08:12'),
(6, 1, NULL, 'NewTextAdded0.45153638188650314.jpg', NULL, NULL, NULL, '2020-02-02 09:16:51', '2020-02-02 09:16:51'),
(7, 1, NULL, 'NewCustomization0.8297816374307895.jpg', NULL, NULL, NULL, '2020-02-04 10:40:10', '2020-02-04 10:40:10'),
(8, 1, NULL, 'NewCustomization0.32668865053596974.jpg', NULL, NULL, NULL, '2020-02-04 17:55:00', '2020-02-04 17:55:00'),
(9, 1, NULL, 'NewTextAdded0.40744331668669886.jpg', NULL, NULL, NULL, '2020-02-04 17:56:20', '2020-02-04 17:56:20'),
(10, 1, NULL, 'NewCustomization0.29340901849706735.jpg', NULL, NULL, NULL, '2020-02-04 18:04:53', '2020-02-04 18:04:53'),
(11, 10, NULL, 'NewCustomization0.5382787855238.jpg', NULL, NULL, NULL, '2020-02-04 18:42:52', '2020-02-04 18:42:52'),
(12, 1, NULL, 'NewTextAdded0.920773502926131.jpg', NULL, NULL, NULL, '2020-02-04 19:43:11', '2020-02-04 19:43:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'noImage.jpg',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `roles_id`, `img`, `phone`) VALUES
(1, 'Ahmed Mahrous Alex', 'AhmedMohammedMahrous@gmail.com', NULL, '$2y$10$z5S2hGWvIcSj31dOLfVRgO0F6/WsN29eehisI7N8VRmHYb1HQb8Me', 'sJ4vEVajhYPDmxV2pdYAAVpKXSkOus0dJjIxJmqoRZhChHLHYe1PWX4WuShm', '2019-08-08 14:36:53', '2019-08-21 05:06:40', 3, '! Fannan NewLook Ani.jpg', '01129674856'),
(6, 'Ahmed', 'A.Mohammed16.34@compit.au.edu.eg', NULL, '$2y$10$jnR1rTLhpolKuK.wUmdSAuTXybgaaZVh01zQQdYvcz7cxG18Hzy2u', 'sDvuHFYvasFvj7lMFHn1ulSBLjGmIAPnIfLZVlSAhFEyVWITQhEayEYqB4vm', '2019-08-16 09:10:40', '2019-08-19 07:16:10', 3, '! Fannan NewLook Ani (1).jpg', '01148180206'),
(7, 'Ahmed Mohammed (asd)', 'asd@asd.asd', NULL, '$2y$10$Nc2WS.m2BG5wvfsb9CIRpuW0Z0Trii9vq8/lGYNuI3icsa51tB/Vy', 'Ncmttl3vRganOzCIyRMPICUfEIXEZ8MXBHmcLvhnI1JVyvqGWzfX9B5hPEZw', '2019-08-16 09:17:06', '2020-01-27 16:45:58', 1, 'Image00022_1580150758.jpg', '01014236783'),
(8, 'Ahmed MAhrous', 'AhmedMahrousAbd@gmail.com', NULL, '$2y$10$6OLxhHiJQ4ISE9aU3w.TPu63sdDJjsPAbw9.rCJf7xRrB/lRkcEie', 'FyMDwm7zeZgRcNuCwZ528M2fYY3Mtuhdia6cbWWDHDUthcD164MesFVIDV62', '2019-08-19 13:41:28', '2019-08-19 13:41:28', 1, '! Fannan NewLook Ani (6).jpg', '01256987'),
(9, 'asdasd', 'asdasd@asd.asd', NULL, '$2y$10$iFWib4qYawddoduPPt.0E.zEPwHZM4Vv9j9IRLlz9dz/MXb7bxBwC', NULL, '2019-11-07 17:37:57', '2019-11-07 17:37:57', 1, '! Fannan NewLook Ani (9).jpg', '0123698525'),
(10, 'ASD', 'asdasdasdasd@asd.asd', NULL, '$2y$10$letbiUf4Jkm5.e3h0NGKRuTOFFLkapV1inT/vtRbu4hYx0f7U0aRG', NULL, '2019-11-28 10:24:52', '2020-01-30 15:38:44', 1, '! Fannan NewLook  Spidy_1580405924.jpg', '01026598745'),
(11, 'Ahmed PHP', 'Any@Any.com', NULL, '$2y$10$WM49zA5kcBeLniPX0xuj0uKkdYKwW4sEOhLTwQKl.tUYchQDuBa42', NULL, '2020-02-04 19:08:43', '2020-02-04 19:08:43', 1, 'noImage.jpg', '01129674856');

-- --------------------------------------------------------

--
-- Table structure for table `user_images`
--

CREATE TABLE `user_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `offset_x` int(11) DEFAULT -1,
  `offset_y` int(11) DEFAULT -1,
  `obj_width` int(11) DEFAULT -1,
  `obj_height` int(11) DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_images`
--

INSERT INTO `user_images` (`id`, `user_id`, `product_id`, `img`, `created_at`, `updated_at`, `offset_x`, `offset_y`, `obj_width`, `obj_height`) VALUES
(37, 9, 31, '! ! Fannan NewLook (5)_1579095869.jpg', '2020-01-15 11:44:29', '2020-01-15 18:14:17', 132, 64, 166, 77),
(38, 9, 1, '! ! Fannan NewLook (33)_1579095949.jpg', '2020-01-15 11:45:49', '2020-01-28 13:21:56', -1, -1, 166, 77),
(39, 9, 31, '! Fannan NewLook  Spidy (1)_1579103589.jpg', '2020-01-15 13:53:10', '2020-01-15 18:10:22', 155, 250, 166, 77),
(40, 1, 35, '! ! Fannan NewLook (14)_1579191207.jpg', '2020-01-16 14:13:27', '2020-02-04 19:44:55', -1, -1, 177, 106),
(41, 1, 1, '! ! Fannan NewLook (15)_1579204866.jpg', '2020-01-16 18:01:06', '2020-02-04 17:55:31', 123, 92, 186, 77),
(42, 1, 1, '! Fannan NewLook Fun (1)_1579206610.jpg', '2020-01-16 18:30:11', '2020-01-26 12:23:03', -1, -1, 166, 77),
(43, 1, 1, 'wallpaper_1579355064.jpg', '2020-01-18 11:44:24', '2020-02-02 09:08:27', -1, -1, 166, 77),
(46, 1, 1, 'Image00001_1579355450.jpg', '2020-01-18 11:50:50', '2020-01-26 12:23:05', -1, -1, 166, 77),
(47, 1, 35, 'Image00001_1580075260.jpg', '2020-01-26 19:47:40', '2020-02-04 19:30:28', -1, -1, 166, 77),
(48, 1, 99, 'Image00015_1580075444.jpg', '2020-01-26 19:50:44', '2020-01-26 19:51:18', 120, 132, 166, 77),
(49, 1, 31, 'Image00039_1580075882.jpg', '2020-01-26 19:58:02', '2020-01-26 20:09:00', 110, 194, 166, 77),
(50, 8, 31, 'Image00017_1580116593.jpg', '2020-01-27 07:16:33', '2020-01-27 07:16:51', 139, 128, 171, 85),
(51, 9, 1, 'Image00039_1580224942.jpg', '2020-01-28 13:22:23', '2020-01-28 13:26:15', 129, 148, 166, 77),
(52, 10, 31, '! Fannan NewLook  Spidy (4)_1580405991.jpg', '2020-01-30 15:39:51', '2020-01-30 15:42:37', 224, 212, 222, 130),
(53, 1, 102, '! ! Fannan NewLook (22)_1580554167.jpg', '2020-02-01 08:49:27', '2020-02-01 08:55:10', -1, -1, 166, 77),
(54, 1, 34, '! ! Fannan NewLook (5)_1580641471.jpg', '2020-02-02 09:04:31', '2020-02-02 09:15:47', 128, 256, 166, 103),
(55, 1, 24, '! Fannan NewLook Sonic (1)_1580819721.jpg', '2020-02-04 10:35:21', '2020-02-04 10:40:17', -1, -1, 146, 87),
(56, 1, 4, '! Fannan NewLook Sonic (1)_1580845987.jpg', '2020-02-04 17:53:07', '2020-02-04 17:54:12', 101, 107, 206, 115),
(57, 1, 16, '! Fannan NewLook  Spidy (4)_1580846663.jpg', '2020-02-04 18:04:23', '2020-02-04 18:04:45', 140, 138, 166, 77),
(58, 10, 108, '! ! Fannan NewLook (9)_1580848952.jpg', '2020-02-04 18:42:32', '2020-02-04 18:42:59', -1, -1, 171, 82);

-- --------------------------------------------------------

--
-- Table structure for table `wish_lists`
--

CREATE TABLE `wish_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `products_id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_shopping_id_unique` (`shopping_id`),
  ADD KEY `orders_users_id_foreign` (`users_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_products_id_foreign` (`products_id`),
  ADD KEY `reviews_users_id_foreign` (`users_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shopping_carts_products_id_foreign` (`products_id`),
  ADD KEY `shopping_carts_users_id_foreign` (`users_id`),
  ADD KEY `shopping_carts_orders_id_foreign` (`orders_id`);

--
-- Indexes for table `updated_products`
--
ALTER TABLE `updated_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `updated_products_user_id_foreign` (`user_id`),
  ADD KEY `updated_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_roles_id_foreign` (`roles_id`);

--
-- Indexes for table `user_images`
--
ALTER TABLE `user_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_images_user_id_foreign` (`user_id`),
  ADD KEY `user_images_product_id_foreign` (`product_id`);

--
-- Indexes for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wish_lists_products_id_foreign` (`products_id`),
  ADD KEY `wish_lists_users_id_foreign` (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `updated_products`
--
ALTER TABLE `updated_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_images`
--
ALTER TABLE `user_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `wish_lists`
--
ALTER TABLE `wish_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shopping_carts`
--
ALTER TABLE `shopping_carts`
  ADD CONSTRAINT `shopping_carts_orders_id_foreign` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shopping_carts_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shopping_carts_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `updated_products`
--
ALTER TABLE `updated_products`
  ADD CONSTRAINT `updated_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `updated_products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_roles_id_foreign` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_images`
--
ALTER TABLE `user_images`
  ADD CONSTRAINT `user_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_images_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wish_lists`
--
ALTER TABLE `wish_lists`
  ADD CONSTRAINT `wish_lists_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wish_lists_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
