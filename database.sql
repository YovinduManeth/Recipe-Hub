-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2026 at 06:18 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `recipe_hub`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`, `created_at`) VALUES
(1, 'dinundu', 'dinu@gmail.com', 'test 1', '2026-08-06 17:25:31'),
(2, 'yovindu', 'yovi@gmail.com', 'test2', '2026-08-06 17:26:13'),
(3, 'vihanga', 'vi@gmail.com', 'test3', '2026-08-06 17:29:35'),
(4, 'vihanga', 'vi@gmail.com', 'test3', '2026-08-06 17:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `recipe_key` varchar(100) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `ingredients` text NOT NULL,
  `instructions` text NOT NULL,
  `prep_time` varchar(50) DEFAULT NULL,
  `cook_time` varchar(50) DEFAULT NULL,
  `total_time` varchar(50) DEFAULT NULL,
  `servings` varchar(50) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `recipe_key`, `title`, `description`, `image`, `ingredients`, `instructions`, `prep_time`, `cook_time`, `total_time`, `servings`, `user_id`) VALUES
(1, 'chickenkottu', 'Sri Lankan Chicken Kottu', 'Sri Lankan Chicken Kottu is one of the country\'s most popular street foods. It is prepared by chopping soft Godamba roti into small pieces and stir-frying it with juicy chicken, fresh vegetables, eggs, aromatic spices, and flavorful sauces. The famous rhythmic chopping sound made while preparing Kottu has become a symbol of Sri Lankan street food culture.', 'Images/Recipes/Koththu.webp', 'Godamba roti, chicken, onion, leeks, cabbage, carrot, eggs, curry powder, chilli, salt and pepper.', '\r\n        Cut the Godamba roti into thin strips or small bite-sized pieces.,\r\n\r\n        Heat oil in a large pan or flat griddle and sauté garlic, ginger, onions, curry leaves, and green chilies until fragrant.,\r\n\r\n        Add the chicken pieces and cook until they are golden brown and fully cooked.,\r\n\r\n        Mix in the carrots, cabbage, and leeks, then stir-fry for about 3–4 minutes.,\r\n\r\n        Push the vegetables to one side of the pan, crack the eggs, scramble them, and combine with the vegetables.,\r\n\r\n        Add the chopped Godamba roti and mix thoroughly.,\r\n\r\n        Season with curry powder, chili powder, black pepper, soy sauce, tomato sauce, and salt.,\r\n\r\n        Continue tossing and chopping the mixture until everything is evenly coated and heated through.,\r\n\r\n        Serve hot with spicy chicken curry, chili paste, or a refreshing soft drink.', '20 min', '25 min', '45 min', '4 Servings', NULL),
(2, 'stringhoppers', 'Sri Lankan String Hoppers', 'Sri Lankan String Hoppers are a traditional steamed food made from rice flour dough pressed into thin noodle-like strands. They are soft, light, and commonly enjoyed as a breakfast or dinner meal in Sri Lankan households. String hoppers are usually served with coconut sambol, dhal curry, or different types of spicy curries, making them a popular and healthy traditional dish.', 'Images/Recipes/String_hoppers.jpg', 'Rice flour,\r\nWarm water,\r\nSalt,\r\nCoconut sambol,\r\nCoconut milk\r\n\r\n', 'Mix rice flour with warm water and salt to prepare a soft dough.\r\n\r\nKnead the dough until it becomes smooth and easy to press.\r\n\r\nPlace the dough into a string hopper press and create thin noodle strands.\r\n\r\nArrange the strands on circular mats or plates.\r\n\r\nSteam the string hoppers until they are fully cooked.\r\n\r\nServe hot with dhal curry, coconut sambol, or other Sri Lankan curries.\r\n', '30 min', '20 min', '50 min', '4 Servings', NULL),
(3, 'hoppers', 'Sri Lankan Hoppers', 'Sri Lankan Hoppers are a traditional bowl-shaped pancake made with fermented rice flour batter and coconut milk. They are crispy around the edges with a soft, fluffy center and are commonly enjoyed as a breakfast or dinner dish. Hoppers are usually served with coconut sambol, spicy curries, or a fried egg placed in the middle, making them one of the most loved foods in Sri Lankan cuisine.', 'Images/Recipes/Hoppers.jpg', 'Rice flour,\r\nCoconut milk,\r\nYeast,\r\nSugar,\r\nSalt,\r\nCoconut water', 'Prepare the hopper batter by mixing rice flour, coconut milk, yeast, sugar, and salt.\r\nAllow the batter to ferment for several hours to develop the flavour.\r\nHeat a hopper pan and pour a small amount of batter into it.\r\nSpread the batter around the pan to create a thin crispy edge.\r\nCook until the edges become golden and the center becomes soft.\r\nServe hot with coconut sambol, curry, or a fried egg.', '30 min', '20 min', '50 min', '10 Pieces', NULL),
(4, 'fish', 'Fish Ambul Thiyal', 'Fish Ambul Thiyal is a famous traditional Sri Lankan dry fish curry known for its unique sour and spicy flavour. This dish is prepared by cooking fish pieces with goraka, black pepper, and aromatic spices until the flavours are deeply absorbed. Originally popular in the southern coastal areas of Sri Lanka, Ambul Thiyal is usually served with steamed rice and is loved for its rich taste and long shelf life.', 'Images/Recipes/Malu.jpg', 'Fish pieces,\r\nGoraka,\r\nBlack pepper,\r\nGarlic,\r\nCinnamon,\r\nTurmeric powder,\r\nSalt,\r\nCurry leaves\r\n', 'Wash and clean the fish pieces properly.\r\n\r\nPrepare a spice mixture using goraka, black pepper, turmeric, garlic, and salt.\r\n\r\nCoat the fish pieces with the spice mixture and allow them to absorb the flavours.\r\n\r\nArrange the fish pieces in a clay pot and cook slowly with a small amount of water.\r\n\r\nSimmer until the fish becomes tender and the mixture turns into a thick dry curry.\r\n\r\nServe hot with steamed rice and traditional Sri Lankan side dishes.\r\n', '20 min', '30 min', '50 min', '4 Servings', NULL),
(5, 'dhal', 'Sri Lankan Dhal Curry', 'Sri Lankan Dhal Curry is a popular traditional dish made with red lentils, creamy coconut milk, and aromatic spices. It is a simple yet flavorful curry that is enjoyed in many Sri Lankan households. With its rich texture and mild spicy taste, dhal curry is commonly served with steamed rice, roti, string hoppers, or other traditional meals.', 'Images/Recipes/Dhal.jpg', 'Red lentils,\r\nCoconut milk,\r\nOnion,\r\nGarlic,\r\nGreen chilli,\r\nCurry leaves,\r\nTurmeric powder,\r\nSri Lankan spices,\r\nSalt\r\n', 'Wash the red lentils and cook them with water until they become soft.\r\nAdd turmeric powder, salt, and spices to the cooked lentils.\r\nPrepare the tempering by frying onion, garlic, green chilli, and curry leaves.\r\nMix the tempering with the cooked lentils to enhance the flavour.\r\nAdd coconut milk and simmer until the curry becomes creamy.\r\nServe hot with rice, roti, or string hoppers.', '10 min', '20 min', '30 min', '4 Servings', NULL),
(6, 'watalappan', 'Watalappam', 'Watalappam is a traditional Sri Lankan coconut custard dessert with a rich and creamy texture. It is made using coconut milk, jaggery, eggs, and aromatic spices such as cardamom. This popular dessert has strong cultural connections with Sri Lankan Muslim cuisine and is commonly served during special occasions, celebrations, and festivals. Its sweet caramel flavour and smooth texture make it one of the most loved Sri Lankan desserts.', 'Images/Recipes/Watalappam.jpg', 'Coconut milk,\r\nJaggery,\r\nEggs,\r\nCardamom,\r\nCashew nuts,\r\nSalt', 'Melt the jaggery with a small amount of water and allow it to cool.\r\nBeat the eggs until they become smooth.\r\nMix coconut milk, jaggery syrup, eggs, cardamom, and salt together.\r\nStrain the mixture to remove any unwanted particles and create a smooth texture.\r\nPour the mixture into a suitable bowl or container.\r\nSteam the watalappam until it becomes firm and fully cooked.\r\nCool before serving and decorate with cashew nuts.', '50 min', '45 min', '1 hour 35 min', '10 Servings', NULL),
(7, 'brinjalcurry', 'Sri Lankan Brinjal Curry', 'Sri Lankan Brinjal Curry is a flavourful traditional curry made with fried or roasted eggplant pieces cooked with coconut milk, onions, curry leaves, and a special blend of spices. The soft texture of brinjal combined with the rich and spicy gravy creates a unique taste loved by many Sri Lankan families. It is commonly served with rice and other side dishes as part of a traditional meal.', 'Images/Recipes/Brinjal_Curry.jpg', 'Brinjal,\r\nOnion,\r\nGreen chilies,\r\nGarlic,\r\nGinger,\r\nCurry leaves,\r\nPandan leaves,\r\nCoconut milk,\r\nTurmeric powder,\r\nChili powder,\r\nCurry powder,\r\nRoasted curry powder,\r\nBlack pepper,\r\nCinnamon,\r\nSalt,\r\nCooking oil', 'Wash and cut the brinjal into medium-sized pieces.\r\n\r\nSprinkle the brinjal pieces with turmeric powder and salt.\r\n\r\nHeat oil in a pan and fry the brinjal pieces until lightly golden, then set them aside.\r\n\r\nIn the same pan, sauté onion, green chilies, garlic, ginger, curry leaves, and pandan leaves until fragrant.\r\n\r\nAdd chili powder, curry powder, roasted curry powder, black pepper, cinnamon, and salt and mix well.\r\n\r\nAdd the fried brinjal pieces and gently mix with the spices.\r\n\r\nPour in coconut milk and a small amount of water.\r\n\r\nCook on medium heat until the brinjal becomes tender and the curry thickens.\r\n\r\nSimmer for a few more minutes until the flavours combine well.\r\n\r\nServe hot with steamed rice, roti, string hoppers, or other traditional Sri Lankan side dishes.', '20 min', '30 min', '50 min', '4 Servings', NULL),
(8, 'potatocurry', 'Sri Lankan Potato Curry', 'Sri Lankan Potato Curry is a simple and delicious traditional curry made with tender potatoes, coconut milk, onions, curry leaves, and aromatic Sri Lankan spices. The creamy and mildly spicy gravy combines perfectly with the soft potatoes, making it a popular everyday dish commonly served with rice, roti, string hoppers, or other Sri Lankan meals.', 'Images/Recipes/Potato_Curry.jpg', 'Potatoes,\r\nOnion,\r\nGreen chilies,\r\nGarlic,\r\nGinger,\r\nCurry leaves,\r\nPandan leaves,\r\nCoconut milk,\r\nTurmeric powder,\r\nChili powder,\r\nCurry powder,\r\nCinnamon,\r\nSalt,\r\nCooking oil', 'Wash, peel, and cut the potatoes into medium-sized pieces.\r\n\r\nHeat oil in a pan and sauté onion, green chilies, garlic, ginger, curry leaves, and pandan leaves until fragrant.\r\n\r\nAdd turmeric powder, chili powder, curry powder, cinnamon, and salt and mix well.\r\n\r\nAdd the potato pieces and mix them with the spices.\r\n\r\nPour in the coconut milk and the required amount of water.\r\n\r\nCook on medium heat until the potatoes become tender.\r\n\r\nSimmer for a few more minutes until the curry thickens and the flavours combine well.\r\n\r\nServe hot with steamed rice, roti, string hoppers, or other traditional Sri Lankan dishes.', '15 min', '30 min', '45 min', '4 Servings', NULL),
(9, 'pumpkincurry', 'Sri Lankan Pumpkin Curry', 'A traditional Sri Lankan pumpkin curry prepared with sweet pumpkin pieces, coconut milk, and mild spices. This creamy curry has a unique sweet and spicy flavour and is commonly enjoyed with rice and other traditional dishes.', 'Images/Recipes/Pumpkin_Curry.webp', 'Pumpkin,\r\nOnion,\r\nGreen chilies,\r\nGarlic,\r\nGinger,\r\nCurry leaves,\r\nPandan leaves,\r\nCoconut milk,\r\nTurmeric powder,\r\nChili powder,\r\nCurry powder,\r\nRoasted curry powder,\r\nCinnamon,\r\nMustard seeds,\r\nSalt,\r\nCooking oil', 'Wash, peel, remove the seeds, and cut the pumpkin into medium-sized pieces.\r\n\r\nHeat oil in a pan and add mustard seeds.\r\n\r\nWhen the mustard seeds begin to splutter, add onion, green chilies, garlic, ginger, curry leaves, and pandan leaves and sauté until fragrant.\r\n\r\nAdd turmeric powder, chili powder, curry powder, roasted curry powder, cinnamon, and salt and mix well.\r\n\r\nAdd the pumpkin pieces and gently mix them with the spices.\r\n\r\nPour in the coconut milk and a small amount of water.\r\n\r\nCover the pan and cook on medium heat until the pumpkin becomes tender.\r\n\r\nSimmer for a few more minutes until the curry thickens and the flavours combine well.\r\n\r\nServe hot with steamed rice, roti, string hoppers, or other traditional Sri Lankan side dishes.', '15 min', '25 min', '40 min', '4 Servings', NULL),
(10, 'jackfruitcurry', 'Sri Lankan Jackfruit Curry', 'Sri Lankan Jackfruit Curry, also known as Polos Curry when made with young jackfruit, is a traditional dish cooked with coconut milk and a rich blend of spices. This flavorful curry has a meat-like texture and is a popular choice in Sri Lankan vegetarian cuisine.', 'Images/Recipes/Jackfruit_Curry.jpg', 'Young jackfruit,\r\nOnion,\r\nGreen chilies,\r\nGarlic,\r\nGinger,\r\nCurry leaves,\r\nPandan leaves,\r\nCoconut milk,\r\nTurmeric powder,\r\nChili powder,\r\nCurry powder,\r\nRoasted curry powder,\r\nBlack pepper,\r\nCinnamon,\r\nCardamom,\r\nCloves,\r\nSalt,\r\nCooking oil', 'Wash and cut the young jackfruit into medium-sized pieces.\r\n\r\nHeat oil in a large pan and sauté onion, green chilies, garlic, ginger, curry leaves, and pandan leaves until fragrant.\r\n\r\nAdd turmeric powder, chili powder, curry powder, roasted curry powder, black pepper, cinnamon, cardamom, cloves, and salt and mix well.\r\n\r\nAdd the young jackfruit pieces and gently mix them with the spices.\r\n\r\nPour in coconut milk and the required amount of water.\r\n\r\nCover the pan and cook on medium heat until the jackfruit becomes tender and absorbs the spices.\r\n\r\nReduce the heat and simmer until the curry becomes thick and the flavours combine well.\r\n\r\nServe hot with steamed rice, roti, string hoppers, or other traditional Sri Lankan side dishes.', '20 min', '45 min', '1 hour 5 min', '5 Servings', NULL),
(11, 'vegetablebiriyani', 'Vegetable Biriyani', 'Vegetable Biriyani is a fragrant and flavourful rice dish prepared with basmati rice, mixed vegetables, aromatic spices, and fresh herbs. This colourful vegetarian dish is a delicious and filling meal commonly enjoyed with raita, curry, or other traditional side dishes.', 'Images/Recipes/Vegetable_Biriyani.jpg', 'Basmati rice,\r\nCarrot,\r\nBeans,\r\nGreen peas,\r\nPotato,\r\nOnion,\r\nGreen chilies,\r\nGinger and garlic,\r\nBiriyani spices,\r\nTurmeric powder,\r\nChili powder,\r\nCinnamon,\r\nCardamom,\r\nCloves,\r\nCoconut milk,\r\nSalt', 'Wash and soak the basmati rice for about 20 minutes.\r\n\r\nHeat oil or ghee in a large pot and sauté onions until golden brown.\r\n\r\nAdd ginger, garlic, green chilies, and the whole spices and sauté until fragrant.\r\n\r\nAdd carrots, beans, green peas, and potatoes and cook for a few minutes.\r\n\r\nAdd turmeric powder, chili powder, biriyani spices, and salt and mix well.\r\n\r\nAdd the soaked rice and gently mix with the vegetables and spices.\r\n\r\nPour in coconut milk and the required amount of water.\r\n\r\nCook on medium heat until the rice is almost done.\r\n\r\nReduce the heat, cover the pot, and cook until the rice becomes fluffy and the vegetables are tender.\r\n\r\nGently mix the biriyani and serve hot with raita, salad, or other Sri Lankan side dishes.', '30 min', '45 min', '1 hour 15 min', '4 Servings', NULL),
(12, 'chickenfriedrice', 'Sri Lankan Chicken Fried Rice', 'Sri Lankan Chicken Fried Rice is a delicious and flavourful rice dish prepared with cooked rice, tender chicken pieces, vegetables, eggs, and aromatic seasonings. The combination of fried rice, juicy chicken, and fresh vegetables makes it a popular meal enjoyed by families and commonly served with chilli paste, curry, or other side dishes.', 'Images/Recipes/Chicken_Fried_Rice.jpg', 'Cooked rice,\r\nChicken pieces,\r\nEggs,\r\nCarrot,\r\nLeeks,\r\nGreen peas,\r\nOnion,\r\nGarlic,\r\nGinger,\r\nGreen chilies,\r\nSoy sauce,\r\nPepper,\r\nChili sauce,\r\nSalt,\r\nCooking oil', 'Cut the chicken into small pieces and season with salt and pepper.\r\n\r\nHeat oil in a large pan or wok and stir-fry the chicken pieces until fully cooked.\r\n\r\nAdd chopped garlic, ginger, onion, and green chilies and sauté until fragrant.\r\n\r\nAdd carrots, green peas, and leeks and stir-fry for a few minutes.\r\n\r\nPush the ingredients to one side of the pan and scramble the eggs.\r\n\r\nAdd the cooked rice and mix well with the chicken and vegetables.\r\n\r\nAdd soy sauce, chili sauce, pepper, and salt according to taste.\r\n\r\nStir-fry everything on high heat until the rice becomes hot and the flavours combine well.\r\n\r\nAdd the remaining leeks and mix gently.\r\n\r\nServe hot with your favourite Sri Lankan side dishes.', '20 min', '25 min', '45 min', '4 Servings', NULL),
(13, 'paneerrice', 'Paneer Rice', 'Paneer Rice is a delicious and aromatic rice dish prepared with soft paneer cubes, basmati rice, vegetables, and a blend of Indian spices. The combination of fluffy rice and lightly fried paneer creates a satisfying vegetarian meal that can be enjoyed with raita, curry, or other side dishes.', 'Images/Recipes/Paneer_Rice.jpg', 'Basmati rice,\r\nPaneer cubes,\r\nCarrot,\r\nBeans,\r\nGreen peas,\r\nOnion,\r\nGreen chilies,\r\nGarlic,\r\nGinger,\r\nCapsicum,\r\nSoy sauce,\r\nPepper,\r\nChili powder,\r\nTurmeric powder,\r\nSalt,\r\nCooking oil', 'Wash and soak the basmati rice for about 20 minutes.\r\n\r\nCut the paneer into small cubes.\r\n\r\nHeat oil in a pan and lightly fry the paneer cubes until golden brown, then set them aside.\r\n\r\nIn the same pan, sauté onion, garlic, ginger, and green chilies until fragrant.\r\n\r\nAdd carrots, beans, green peas, and capsicum and stir-fry for a few minutes.\r\n\r\nAdd turmeric powder, chili powder, pepper, and salt and mix well.\r\n\r\nAdd the soaked rice and gently mix with the vegetables and spices.\r\n\r\nAdd the required amount of water and cook until the rice becomes tender and fluffy.\r\n\r\nAdd the fried paneer cubes and soy sauce and gently mix everything together.\r\n\r\nCook for a few more minutes until the flavours combine well.\r\n\r\nServe hot with your favourite Sri Lankan side dishes.', '20 min', '30 min', '50 min', '4 Servings', NULL),
(14, 'prawnsmasalarice', 'Prawn Masala Rice', 'Sri Lankan Prawn Masala is a spicy and flavourful seafood dish prepared with fresh prawns, onions, garlic, ginger, tomatoes, and aromatic Sri Lankan spices. The prawns are cooked in a rich and spicy masala sauce, making this dish a delicious accompaniment to rice, roti, or other traditional meals.', 'Images/Recipes/Prawns_Masala_Rice.jpg', 'Basmati rice,\r\nPrawns,\r\nOnion,\r\nTomato,\r\nGreen chilies,\r\nGarlic,\r\nGinger,\r\nCarrot,\r\nGreen peas,\r\nCapsicum,\r\nChili powder,\r\nTurmeric powder,\r\nCurry powder,\r\nBlack pepper,\r\nCinnamon,\r\nCardamom,\r\nCloves,\r\nCoconut milk,\r\nSalt,\r\nCooking oil', 'Wash and clean the prawns properly and remove the shells if necessary.\r\n\r\nMarinate the prawns with turmeric powder, chili powder, pepper, and salt.\r\n\r\nWash and soak the basmati rice for about 20 minutes.\r\n\r\nHeat oil in a large pan and lightly fry the marinated prawns until cooked, then set them aside.\r\n\r\nIn the same pan, sauté onion, garlic, ginger, and green chilies until fragrant.\r\n\r\nAdd chopped tomato, carrot, green peas, and capsicum and cook for a few minutes.\r\n\r\nAdd curry powder, chili powder, turmeric powder, cinnamon, cardamom, cloves, and salt and mix well.\r\n\r\nAdd the soaked rice and gently mix it with the vegetables and spices.\r\n\r\nPour in coconut milk and the required amount of water and cook until the rice becomes tender and fluffy.\r\n\r\nAdd the cooked prawns and gently mix everything together.\r\n\r\nCook for a few more minutes until the flavours combine well.\r\n\r\nServe hot with your favourite Sri Lankan side dishes.', '20 min', '20 min', '40 min', '4 Servings', NULL),
(15, 'dunthelbath', 'Sri Lankan Dunthel Bath', 'Dunthel Bath is a traditional Sri Lankan yellow rice dish prepared with rice, turmeric, ghee or butter, onions, and aromatic spices. This fragrant and colourful rice is commonly served during special occasions and family gatherings with curries, sambols, and other traditional side dishes.', 'Images/Recipes/Dunthel_Bath.jpg', 'Basmati rice,\r\nPumpkin,\r\nCoconut milk,\r\nOnion,\r\nGarlic,\r\nGinger,\r\nGreen chilies,\r\nCurry leaves,\r\nPandan leaves,\r\nCinnamon,\r\nCardamom,\r\nCloves,\r\nTurmeric powder,\r\nBlack pepper,\r\nSalt,\r\nCooking oil', 'Wash and soak the rice for about 20 minutes.\r\n\r\nPeel and cut the pumpkin into medium-sized pieces.\r\n\r\nHeat oil in a large pot and sauté onion, garlic, ginger, green chilies, curry leaves, and pandan leaves until fragrant.\r\n\r\nAdd cinnamon, cardamom, cloves, turmeric powder, black pepper, and salt and mix well.\r\n\r\nAdd the pumpkin pieces and cook for a few minutes with the spices.\r\n\r\nAdd the soaked rice and gently mix with the pumpkin and spices.\r\n\r\nPour in coconut milk and the required amount of water.\r\n\r\nCook on medium heat until the rice and pumpkin become tender.\r\n\r\nReduce the heat, cover the pot, and simmer until the rice becomes soft and fluffy.\r\n\r\nGently mix the rice and pumpkin without breaking the pumpkin pieces.\r\n\r\nServe hot with traditional Sri Lankan curries, sambols, or other side dishes.', '15 min', '30 min', '45 min', '4 Servings', NULL),
(16, 'tunafishcurry', 'Spicy Tuna Fish Curry', 'Spicy Tuna Fish Curry is a traditional Sri Lankan fish curry with a spicy and sour flavour. This curry is prepared with tuna fish, goraka, spices, and aromatic ingredients. It is commonly served with rice, bread, roti, and other Sri Lankan meals.', 'Images/Recipes/Tuna_Fish_Curry.avif', 'Tuna fish pieces,\r\nOnion,\r\nTomato,\r\nGreen chilies,\r\nGarlic,\r\nGinger,\r\nCurry leaves,\r\nPandan leaves,\r\nTurmeric powder,\r\nChili powder,\r\nRoasted curry powder,\r\nBlack pepper,\r\nCinnamon,\r\nGoraka,\r\nCoconut milk,\r\nSalt,\r\nCooking oil', 'Wash and clean the tuna fish pieces properly.\r\n\r\nMarinate the fish with turmeric powder, chili powder, black pepper, and salt.\r\n\r\nHeat oil in a pan and sauté onion, garlic, ginger, green chilies, curry leaves, and pandan leaves until fragrant.\r\n\r\nAdd tomato and cook until it becomes soft.\r\n\r\nAdd chili powder, roasted curry powder, black pepper, cinnamon, goraka, and salt and mix well.\r\n\r\nAdd the marinated tuna pieces and gently coat them with the spices.\r\n\r\nPour in coconut milk and a small amount of water.\r\n\r\nCover the pan and cook on medium heat until the tuna becomes tender and fully cooked.\r\n\r\nSimmer for a few more minutes until the curry thickens and the flavours combine well.\r\n\r\nServe hot with steamed rice, roti, string hoppers, or other traditional Sri Lankan side dishes.', '10 mins', '15 mins', '55 mins', '3 Servings', NULL),
(17, 'sailfishcurry', 'Sri Lankan Sailfish Curry', 'Sri Lankan Sailfish Curry is a traditional spicy fish curry prepared with fresh sailfish pieces, aromatic spices, and a rich coconut-based gravy. This flavourful curry is commonly enjoyed with steamed rice and other Sri Lankan side dishes.', 'Images/Recipes/Sailfish_Curry.jpg', 'Sailfish pieces,\r\nOnion,\r\nTomato,\r\nGreen chilies,\r\nGarlic,\r\nGinger,\r\nCurry leaves,\r\nPandan leaves,\r\nTurmeric powder,\r\nChili powder,\r\nRoasted curry powder,\r\nBlack pepper,\r\nCinnamon,\r\nGoraka,\r\nCoconut milk,\r\nSalt,\r\nCooking oil', 'Wash and clean the sailfish pieces properly.\r\n\r\nMarinate the fish with turmeric powder, chili powder, black pepper, and salt.\r\n\r\nHeat oil in a pan and sauté onion, garlic, ginger, green chilies, curry leaves, and pandan leaves until fragrant.\r\n\r\nAdd chopped tomato and cook until it becomes soft.\r\n\r\nAdd chili powder, roasted curry powder, black pepper, cinnamon, goraka, and salt and mix well.\r\n\r\nAdd the marinated sailfish pieces and gently coat them with the spices.\r\n\r\nPour in coconut milk and a small amount of water.\r\n\r\nCover the pan and cook on medium heat until the fish becomes tender and fully cooked.\r\n\r\nSimmer for a few more minutes until the curry thickens and the flavours combine well.\r\n\r\nServe hot with steamed rice, roti, string hoppers, or other traditional Sri Lankan side dishes.', '15 min', '30 min', '45 min', '4 Servings', NULL),
(18, 'chickencurry', 'Sri Lankan Chicken Curry', 'Sri Lankan Chicken Curry is a traditional spicy curry prepared with tender chicken pieces, aromatic spices, and a rich coconut-based gravy. This popular dish is loved for its deep flavour and is commonly served with steamed rice, roti, string hoppers, or other Sri Lankan meals.', 'Images/Recipes/Chicken_Curry.jpg', 'Chicken pieces,\r\nChili powder,\r\nRoasted curry powder,\r\nTurmeric powder,\r\nBlack pepper,\r\nOnion,\r\nTomato,\r\nGreen chilies,\r\nGarlic,\r\nGinger,\r\nCurry leaves,\r\nPandan leaves,\r\nCinnamon,\r\nCardamom,\r\nCloves,\r\nCoconut milk,\r\nSalt,\r\nCooking oil', 'Clean and cut the chicken into medium-sized pieces.\r\n\r\nMarinate the chicken with chili powder, roasted curry powder, turmeric powder, black pepper, and salt.\r\n\r\nHeat oil in a large pan and sauté onion, garlic, ginger, green chilies, curry leaves, and pandan leaves until fragrant.\r\n\r\nAdd chopped tomato and cook until it becomes soft.\r\n\r\nAdd roasted curry powder, chili powder, turmeric powder, black pepper, cinnamon, cardamom, cloves, and salt and mix well.\r\n\r\nAdd the marinated chicken pieces and stir well to coat them with the spices.\r\n\r\nCook for a few minutes until the chicken absorbs the spices and develops a rich colour.\r\n\r\nAdd coconut milk and a small amount of water.\r\n\r\nCover the pan and cook slowly until the chicken becomes tender and fully cooked.\r\n\r\nSimmer for a few more minutes until the curry thickens and the flavours combine well.\r\n\r\nServe hot with steamed rice, roti, string hoppers, or other traditional Sri Lankan side dishes.', '20 min', '40 min', '1 hour', '4 Servings', NULL),
(19, 'beefcurry', 'Sri Lankan Beef Curry', 'Sri Lankan Beef Curry is a traditional spicy meat curry prepared with tender beef pieces, roasted curry spices, and aromatic ingredients. The slow cooking process allows the spices to absorb deeply into the meat, creating a rich and flavorful curry that is commonly enjoyed with rice, roti, bread, or string hoppers.', 'Images/Recipes/Beef_Curry.jpg', 'Beef pieces,\r\nChili powder,\r\nRoasted curry powder,\r\nTurmeric powder,\r\nBlack pepper,\r\nCurry powder,\r\nOnion,\r\nTomato,\r\nGreen chilies,\r\nGarlic,\r\nGinger,\r\nCurry leaves,\r\nPandan leaves,\r\nCinnamon,\r\nCardamom,\r\nCloves,\r\nCoconut milk,\r\nSalt,\r\nCooking oil', 'Clean and cut the beef into medium-sized pieces.\r\n\r\nMarinate the beef with chili powder, roasted curry powder, turmeric powder, black pepper, curry powder, and salt.\r\n\r\nHeat oil in a large pan and sauté onion, garlic, ginger, green chilies, curry leaves, and pandan leaves until fragrant.\r\n\r\nAdd chopped tomato and cook until it becomes soft.\r\n\r\nAdd roasted curry powder, chili powder, turmeric powder, black pepper, cinnamon, cardamom, cloves, and salt and mix well.\r\n\r\nAdd the marinated beef pieces and stir well to coat them with the spices.\r\n\r\nCook for a few minutes until the beef absorbs the spices.\r\n\r\nAdd coconut milk and a small amount of water.\r\n\r\nCover the pan and cook slowly until the beef becomes tender and fully cooked.\r\n\r\nSimmer for a few more minutes until the curry thickens and the flavours combine well.\r\n\r\nServe hot with steamed rice, roti, bread, or string hoppers.', '20 min', '1 hour', '1 hour 20 min', '4 Servings', NULL),
(21, 'fish2', 'Fish Ambul Thiyal', 'Sri Lankan Fish Ambul Thiyal is a traditional dry fish curry made with firm fish, goraka, black pepper, chili, and aromatic spices. The fish is slowly cooked until the gravy reduces and the pieces become dark, dry, spicy, and sour. It is commonly served with rice and other traditional Sri Lankan dishes.', 'Images/Recipes/Fish_Ambul_Thiyal.jpg', '[\"Firm fish pieces\",\"Goraka\",\"Black pepper\",\"Chili powder\",\"Turmeric powder\",\"Roasted curry powder\",\"Garlic\",\"Ginger\",\"Curry leaves\",\"Salt\"]', '[\"Clean and cut the fish into medium-sized pieces.\",\"Soak goraka in warm water and prepare a thick goraka paste.\",\"Mix the fish with goraka paste, black pepper, chili powder, turmeric, curry powder, garlic, ginger, curry leaves, and salt.\",\"Place the marinated fish in a cooking pot and add a small amount of water.\",\"Cook on medium heat until the fish becomes tender.\",\"Reduce the heat and continue cooking until the liquid completely reduces and the fish becomes dry.\",\"Turn the fish pieces carefully while cooking so they absorb the spices evenly.\",\"Serve with steamed rice and traditional Sri Lankan side dishes.\"]', '20 min', '45 min', '1 hour 5 min', '4 Servings', NULL),
(24, 'buttercake', 'Sri Lankan Butter Cake', 'Sri Lankan Butter Cake is a soft, rich, and delicious traditional cake made with butter, sugar, eggs, flour, and vanilla. It has a light and moist texture with a rich buttery flavour, making it a popular cake for tea time, birthdays, celebrations, and family gatherings.', 'Images/Recipes/Butter_Cake.jpg', 'Butter,\r\nSugar,\r\nEggs,\r\nAll-purpose flour,\r\nBaking powder,\r\nVanilla essence,\r\nFull cream milk,\r\nSalt', 'Preheat the oven to 180°C.\r\n\r\nBeat butter and sugar together until the mixture becomes light and creamy.\r\n\r\nAdd eggs one at a time and beat well after each addition.\r\n\r\nAdd vanilla essence and mix well.\r\n\r\nSift flour, baking powder, and salt together.\r\n\r\nGradually add the dry ingredients to the butter mixture while alternating with milk.\r\n\r\nMix gently until a smooth cake batter is formed.\r\n\r\nPour the batter into a greased and lined cake tin.\r\n\r\nBake at 180°C for about 35-40 minutes until golden brown and fully cooked.\r\n\r\nAllow the cake to cool before removing it from the tin.\r\n\r\nCut into slices and serve with tea or as a dessert.', '20 min', '40 min', '1 hour', '10 Servings', NULL),
(25, 'chocolatecake', 'Sri Lankan Chocolate Cake', 'Sri Lankan Chocolate Cake is a rich, soft, and delicious homemade cake made with cocoa powder, flour, butter, sugar, eggs, and milk. The moist chocolate texture and rich cocoa flavour make it a favourite dessert for birthdays, tea time, celebrations, and family gatherings.', 'Images/Recipes/Chocolate_Cake.jpg', 'All-purpose flour,\r\nCocoa powder,\r\nSugar,\r\nButter,\r\nEggs,\r\nMilk,\r\nBaking powder,\r\nVanilla essence,\r\nSalt', 'Preheat the oven to 180°C.\r\n\r\nCream the butter and sugar together until light and fluffy.\r\n\r\nAdd the eggs one at a time and beat well after each addition.\r\n\r\nAdd vanilla essence and mix well.\r\n\r\nSift the flour, cocoa powder, baking powder, and salt together.\r\n\r\nGradually add the dry ingredients to the butter mixture while alternating with milk.\r\n\r\nMix gently until a smooth chocolate cake batter is formed.\r\n\r\nPour the batter into a greased and lined cake tin.\r\n\r\nBake at 180°C for about 35-40 minutes until the cake is fully cooked.\r\n\r\nAllow the cake to cool before removing it from the tin.\r\n\r\nCut into slices and serve with tea or as a dessert.', '20 min', '40 min', '1 hour', '10 Servings', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(15, 'TestUser', 'test@gmail.com', '$2y$10$SEPaMPVriQcOPCzdFPVK8eOkfuck59xLYAumt1V17dPcRnph.f9tK', '2026-08-07 17:33:23'),
(27, 'Yovi', 'Yovi12@gmail.com', '$2y$10$/YDZEPZwQO5ic5Sw7iQk4.gCp7/ixMNwDNOcSfokRCuvUs0LPH17q', '2026-08-05 16:28:02'),
(28, 'dinu', 'dinu@gmail.com', '$2y$10$O1.fQrz717I/gLRPRmu9xudL8otCAnYNxUPtuajVp/I3SBYTW.dVC', '2026-08-06 08:51:30'),
(29, 'dinu', 'dinu@gmail.com', '$2y$10$nIfooBaHT56dqTxmB6.yVua1J98JHGqosI88u5OzART8CbybVZjMS', '2026-08-06 08:53:53'),
(30, 'para', 'viha@gimail.com', '$2y$10$xmcemcQ2ZqTR.fHNPRL1duHDDOrB.DoG4g4hZCdV2/X3g2vJDFl5a', '2026-08-06 08:58:36'),
(31, 'tharu', 'taru@gmail.com', '$2y$10$9RZB0uhcFjvGM4gaBExiYOX44MyRdY.wq1LF3EI.hfBVfFCsyNSQi', '2026-08-06 09:05:24'),
(32, 'hhfhf', 'fffff@gmail.com', '$2y$10$2ac1jonAgPHHgUZQqDE7k.3asplk6s4W2LH4R/XHLQ18mSMbOVM1i', '2026-08-06 09:12:18'),
(33, 'testuser', 'test2@gmail.com', '$2y$10$UjEHBGGljVm2BdlvShPe3OzadUa1uOxvHxqul4MUX3C5Zoh9X1/mK', '2026-08-06 09:14:40'),
(34, 'newuser', 'newuser@gmail.com', '$2y$10$eLFUYneZyIM4FYLYky9Ax.LqB43XmnOhpui2Aygs51gedoo5snCXa', '2026-08-06 09:27:02'),
(35, 'yovie', 'yovindu@gmail.com', '$2y$10$F3hnQkRx5p5h2YD.LdjaiOn1CsEi89V7MleHb5dSDE.nIeyCcoZu2', '2026-08-06 09:32:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `recipe_key` (`recipe_key`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
