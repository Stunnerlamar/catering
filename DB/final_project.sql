-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 03, 2024 at 11:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_Project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cakes`
--

CREATE TABLE `cakes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `stars` float DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `restaurant` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cakes`
--

INSERT INTO `cakes` (`id`, `name`, `stars`, `price`, `restaurant`) VALUES
(1, 'Chocolate Cake', 4.5, 15.99, 'Royal Bakery'),
(2, 'Vanilla Cake', 4.2, 12.99, 'Sweet Delights'),
(3, 'Red Velvet Cake', 4.8, 18.99, 'Fancy Cakes'),
(4, 'Carrot Cake', 4, 14.99, 'Gourmet Treats'),
(5, 'Cheesecake', 4.6, 16.99, 'Creamy Delights'),
(6, 'Lemon Cake', 4.3, 13.99, 'Zesty Pastries'),
(7, 'Strawberry Shortcake', 4.7, 17.99, 'Berry Bliss Bakery'),
(8, 'Black Forest Cake', 4.4, 16.99, 'Forest Treats'),
(9, 'Mocha Cake', 4.2, 15.99, 'Café Confections'),
(10, 'Pineapple Upside-Down Cake', 4.5, 16.99, 'Tropical Sweets');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `food_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `food_id`, `quantity`) VALUES
(33, 2, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `food_id` int(11) NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `stars` int(11) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`food_id`, `restaurant_id`, `name`, `price`, `image_path`, `stars`, `category`) VALUES
(1, 2, 'Biryani', 10.99, 'biriani.png', 5, '0'),
(2, 4, 'Kebab', 7.99, NULL, NULL, '0'),
(3, 4, 'Naan', 2.49, NULL, NULL, '0'),
(4, 3, 'Grilled Chicken', 12.99, NULL, NULL, '0'),
(5, 3, 'Pasta Carbonara', 9.99, NULL, NULL, '0'),
(6, 3, 'Caesar Salad', 6.49, NULL, NULL, '0'),
(7, 2, 'Bentocake', 3.99, 'bentocake.png', NULL, '0'),
(8, 2, 'Cupcakes', 1.99, 'cupcake.png', 4, '0'),
(9, 2, 'Cookies', 0.99, 'cookie.png', 5, '0'),
(10, 2, 'Oasis High Schools', 300.00, '', 4, 'food'),
(11, 2, 'Oasis High Schools', 300.00, '', 4, 'food'),
(12, 3, 'Oasis High Schools', 300.00, '', 4, 'cakes');

-- --------------------------------------------------------

--
-- Table structure for table `for_hire_items`
--

CREATE TABLE `for_hire_items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `for_hire_items`
--

INSERT INTO `for_hire_items` (`id`, `item_name`, `image_path`) VALUES
(1, 'Coffee Thermos', 'fh1.jpg'),
(2, 'Tea Thermos', 'fh1.jpg'),
(3, 'Lantern', 'fh2.jpg'),
(4, 'Napkin', 'fh2.jpg'),
(5, 'Silver Glass', 'fh3.jpg'),
(6, 'Gold Glass', 'fh3.jpg'),
(7, 'Oval Platter', 'fh4.jpg'),
(8, 'Small rectangular tray', 'fh5.jpg'),
(9, 'Small long rectangular tray', 'fh5.jpg'),
(10, 'Platter', 'fh6.jpg'),
(11, 'Big platter', 'fh6.jpg'),
(12, 'Napkin ring', 'fh7.jpg'),
(13, 'Cocktail Glass', 'fh8.jpg'),
(14, 'Decantor with flute glass', 'fh8.jpg'),
(15, 'Bamboo 3tier stand', 'fh9.jpg'),
(16, 'Cake stand', 'fh9.jpg'),
(17, 'Gold hotpot', 'fh10.jpg'),
(18, 'Gold ffod warmer', 'fh10.jpg'),
(19, 'Candle holder', 'fh11.jpg'),
(20, 'tea urn', 'fh12.jpg'),
(21, 'Colored thermos', 'fh12.jpg'),
(22, 'Gold tissue stand', 'fh13.jpg'),
(23, 'Silver tissue stand', 'fh13.jpg'),
(24, 'Food warmer', 'fh14.jpg'),
(25, 'Silver cake stand', 'fh16.jpg'),
(26, '3pcs cake stand', 'fh16.jpg'),
(27, 'Gold Cocktail glass', 'fh17.jpg'),
(28, 'Clear Glass', 'fh17.jpg'),
(29, 'Plastic stand', 'fh18.jpg'),
(30, '3tier porcelian stand', 'fh18.jpg'),
(31, 'Serving spoon', 'fh19.jpg'),
(32, 'Stainless steel hotpot', 'fh20.jpg'),
(33, 'Sinia', 'fh20.jpg'),
(34, 'Dessert stand', 'fh21.jpg'),
(35, '3pcs cake stand', 'fh21.jpg'),
(36, 'Cage stand', 'fh22.jpg'),
(37, '3tier porcelian stand', 'fh22.jpg'),
(38, 'Juice dispenser', 'fh23.jpg'),
(39, 'Globe juice dispenser', 'fh24.jpg'),
(40, 'Juice dispenser', 'fh24.jpg'),
(41, 'Aluminium glass', 'fh25.jpg'),
(42, 'Gold jugs', 'fh25.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `for_sale`
--

CREATE TABLE `for_sale` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `stars` float DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `restaurant` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `for_sale`
--

INSERT INTO `for_sale` (`id`, `name`, `stars`, `price`, `restaurant`) VALUES
(1, 'Chocolate Cake', 4.5, 25.99, 'Royal Cool Cuisine'),
(2, 'Red Velvet Cake', 4.3, 22.50, 'Sweet Delights'),
(3, 'Carrot Cake', 4, 18.75, 'Bakery Bliss'),
(4, 'Cheesecake', 4.8, 30.00, 'Creamy Treats'),
(5, 'Lemon Cake', 4.2, 20.50, 'Tasty Bakes'),
(6, 'Strawberry Shortcake', 4.6, 28.99, 'Berry Bakery'),
(7, 'Vanilla Cake', 4.7, 21.99, 'Vanilla Dream'),
(8, 'Blueberry Cake', 4.4, 26.75, 'Berry Bakery'),
(9, 'Coffee Cake', 4.3, 24.25, 'Café Supreme'),
(10, 'Banana Cake', 4.5, 23.50, 'Tropical Treats');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('pending','confirmed','in_transit','delivered') NOT NULL DEFAULT 'pending',
  `name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `food_name` varchar(255) DEFAULT NULL,
  `extra_food` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `delivery_datetime` datetime DEFAULT NULL,
  `venue` text DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `order_date`, `status`, `name`, `phone_number`, `food_name`, `extra_food`, `quantity`, `delivery_datetime`, `venue`, `message`) VALUES
(8, 1, '2024-03-28 12:27:46', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 1, '2024-03-28 12:31:23', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 1, '2024-03-28 12:31:41', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 1, '2024-04-03 07:32:31', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 1, '2024-04-03 07:32:35', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 1, '2024-04-03 07:33:55', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 1, '2024-04-03 08:01:50', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 1, '2024-04-03 08:01:54', 'pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `food_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_item_id`, `order_id`, `food_id`, `quantity`) VALUES
(1, 8, 7, 2),
(2, 8, 8, 1),
(3, 8, 7, 1),
(4, 8, 7, 1),
(8, 10, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_statuses`
--

CREATE TABLE `order_statuses` (
  `status_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `status` enum('pending','confirmed','in_transit','delivered') NOT NULL,
  `status_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(2000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `restaurant_id`, `name`, `description`, `price`, `image`) VALUES
(1, 2, 'Family Feast', 'A hearty feast for the whole family including various starters, mains, and desserts.', 120.00, 'https://www.bdtask.com/blog/assets/plugins/ckfinder/core/connector/php/uploads/images/categorize-your-food-combo.jpg'),
(2, 2, 'Weekend Special', 'Enjoy our special weekend package with a selection of appetizers, main courses, and beverages.', 90.00, 'https://img.pikbest.com/origin/09/14/03/80ppIkbEsT9Gs.jpg!f305cw'),
(3, 2, 'Date Night Delight', 'Perfect for a romantic evening, this package offers a choice of entrees, main courses, and a dessert.', 70.00, 'https://www.bdtask.com/blog/assets/plugins/ckfinder/core/connector/php/uploads/images/categorize-your-food-combo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `restaurant_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `stars` int(11) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`restaurant_id`, `name`, `image_path`, `stars`, `category`) VALUES
(2, 'ROYAL COOL CUISINE', 'logoc.jpg', 0, NULL),
(3, 'ALAMIN BAKERS SHOP', 'weddingcake.png', 0, NULL),
(4, 'SHARIFF CATERING', 'biriani.png', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `image`, `name`, `comment`) VALUES
(1, 'path_to_image1.jpg', 'John Doe', 'Great experience with the cake! Highly recommended.'),
(2, 'path_to_image2.jpg', 'Alice Smith', 'Delicious snacks and friendly staff. Will definitely visit again.'),
(3, 'path_to_image3.jpg', 'Emily Johnson', 'The cakes here are amazing! Perfect for any occasion.'),
(4, 'path_to_image4.jpg', 'Michael Brown', 'I love the variety of snacks available. Something for everyone!'),
(5, 'path_to_image5.jpg', 'Sarah Wilson', 'The desserts are heavenly. A must-try for anyone with a sweet tooth.');

-- --------------------------------------------------------

--
-- Table structure for table `snacks`
--

CREATE TABLE `snacks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `stars` float DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `restaurant` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `snacks`
--

INSERT INTO `snacks` (`id`, `name`, `stars`, `price`, `restaurant`) VALUES
(1, 'Potato Chips', 4.2, 3.99, 'Snack Haven'),
(2, 'Popcorn', 4, 2.50, 'Movie Munchies'),
(3, 'Pretzels', 4.1, 1.99, 'Twist N\' Crunch'),
(4, 'Trail Mix', 4.5, 4.75, 'Healthy Bites'),
(5, 'Granola Bars', 4.3, 3.25, 'Healthy Bites'),
(6, 'Cheese Sticks', 4.4, 5.99, 'Dairy Delights'),
(7, 'Mixed Nuts', 4.6, 6.50, 'Healthy Bites'),
(8, 'Fruit Snacks', 4.3, 3.99, 'Fruity Treats'),
(9, 'Chocolate Bars', 4.7, 2.75, 'Sweet Temptations'),
(10, 'Crackers', 4.2, 1.75, 'Crunchy Munch');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'leston', 'jimleston35@gmail.com', 'Leston35?'),
(2, 'jimleston', 'jimleston35@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `user_favorite`
--

CREATE TABLE `user_favorite` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `food_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cakes`
--
ALTER TABLE `cakes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `food_id` (`food_id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`food_id`),
  ADD KEY `restaurant_id` (`restaurant_id`);

--
-- Indexes for table `for_hire_items`
--
ALTER TABLE `for_hire_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `for_sale`
--
ALTER TABLE `for_sale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `food_id` (`food_id`);

--
-- Indexes for table `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`status_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`restaurant_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `snacks`
--
ALTER TABLE `snacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_favorite`
--
ALTER TABLE `user_favorite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `food_id` (`food_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cakes`
--
ALTER TABLE `cakes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `for_hire_items`
--
ALTER TABLE `for_hire_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `for_sale`
--
ALTER TABLE `for_sale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `restaurant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `snacks`
--
ALTER TABLE `snacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_favorite`
--
ALTER TABLE `user_favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_favorite`
--
ALTER TABLE `user_favorite`
  ADD CONSTRAINT `user_favorite_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_favorite_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `foods` (`food_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
