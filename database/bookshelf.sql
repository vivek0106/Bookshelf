-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 30, 2020 at 08:43 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookshelf`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `name`, `phone`, `email`, `pass`) VALUES
(1, 'Shantanu Tripathi', 8459751677, 'shantanutripathi96@gmail.com', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `adminnotification`
--

CREATE TABLE `adminnotification` (
  `notificationID` int(11) NOT NULL,
  `from` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `notificationStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookID` int(11) NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  `bookName` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `genre` int(11) NOT NULL,
  `pages` int(11) NOT NULL,
  `author` varchar(20) NOT NULL,
  `publication` varchar(50) NOT NULL,
  `yearOfPublish` varchar(5) NOT NULL,
  `descriptions` varchar(1000) NOT NULL,
  `rating` float NOT NULL,
  `price` float NOT NULL,
  `tags` varchar(200) NOT NULL,
  `stock` int(11) NOT NULL,
  `featured` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookID`, `ISBN`, `bookName`, `image`, `genre`, `pages`, `author`, `publication`, `yearOfPublish`, `descriptions`, `rating`, `price`, `tags`, `stock`, `featured`) VALUES
(2, '9780333791035', 'The Great Gatsby', '../uploadedBookImages/theGreatGatsby.jpg', 1, 218, 'F. Scott Fitzgerald', 'Chatto & Windus (UK)', '1925', 'The story of the book primarily concerns the young and mysterious millionaire Jay Gatsby and his quixotic passion and obsession to reunite with his ex-lover, the beautiful former debutante Daisy Buchanan.', 0, 200, 'The Great Gatsby F. Scott Fitzgerald 218 Chatto & Windus (UK) 1925', 3, 'no'),
(3, '9780143058175', 'Pride and Prejudice', '../uploadedBookImages/prideAndPrejudice.jpg', 1, 432, 'Jane Austen', 'T. Egerton, Whitehall', '1813', 'The novel follows the character development of Elizabeth Bennet, the dynamic protagonist of the book who learns about the repercussions of hasty judgments and comes to appreciate the difference between superficial goodness and actual goodness. Its humour lies in its honest depiction of manners, education, marriage, and money during the Regency era in Great Britain.', 0, 200, 'Pride and Prejudice Jane Austen 432 T. Egerton, Whitehall 1813', 5, 'yes'),
(4, '2240182398', 'Midnights Children', '../uploadedBookImages/midnightsChildren.jpg', 1, 446, 'Salman Rushdie', 'Jonathan Cape', '1981', 'The protagonist and narrator of the story is Saleem Sinai, born at the exact moment when India became an independent country. He was born with telepathic powers, as well as an enormous and constantly dripping nose with an extremely sensitive sense of smell.', 0, 200, 'Midnight\'s Children Salman Rushdie 446 Jonathan Cape 1981', 5, 'no'),
(5, '9780739322062', 'Lolita', '../uploadedBookImages/lolita.jpg', 1, 336, 'Vladimir Nabokov', 'Olympia Press', '1955', 'The novel is notable for its controversial subject: the protagonist and unreliable narrator, a middle-aged literature professor under the pseudonym Humbert Humbert, is obsessed with a 12-year-old girl, Dolores Haze, with whom he becomes sexually involved after he becomes her stepfather.', 0, 200, 'Lolita Vladimir Nabokov 336 Olympia Press 1955', 5, 'no'),
(6, '9780060888695', 'To Kill a Mockingbird', '../uploadedBookImages/toKillAMockingbird.jpg', 1, 281, 'Harper Lee', 'J. B. Lippincott & Co.', '1960', 'The plot and characters are loosely based on Lee\'s observations of her family, her neighbors and an event that occurred near her hometown of Monroeville, Alabama, in 1936, when she was ten.', 0, 200, 'To Kill a Mockingboard Harper Lee 281 J. B. Lippincott & Co. 1960', 5, 'no'),
(7, '9780140861723', 'Moby Dick', '../uploadedBookImages/mobyDick.jpg', 1, 585, 'Herman Melville', 'Richard Bentley (England)', '1851', 'The book is the sailor Ishmael', 0, 200, 'Moby Dick Herman Melville 585 Richard Bentley (England) 1851', 10, 'no'),
(8, '60977493', 'The God of Small Thi', '../uploadedBookImages/theGodOfSmallThings.jpg', 1, 335, 'Arundhati Roy', 'Indiaink, India', '1997', 'It is a story about the childhood experiences of fraternal twins whose lives are destroyed by the \"Love Laws\" that lay down \"who should be loved, and how.', 0, 200, 'The God of Small Things Arundhati Roy 335 Indiaink, India 1997', 5, 'no'),
(9, '9780486282114', 'Frankenstein', '../uploadedBookImages/frankenstein.jpg', 1, 280, 'Mary Shelley', 'Lackington, Hughes, Harding, Mavor & Jones', '1818', 'The story of Victor Frankenstein, a young scientist who creates a hideous sapient creature in an unorthodox scientific experiment.', 0, 200, 'Frankenstein Mary Shelley 280 Lackington, Hughes, Harding, Mavor & Jones 1818', 5, 'yes'),
(10, '224062522', 'Atonement', '../uploadedBookImages/atonement.jpg', 1, 371, 'Ian McEwan', 'Jonathan Cape', '2001', 'Set in three time periods, 1935 England, Second World War England and France, and present-day England, it covers an upper-class girl\'s half-innocent mistake that ruins lives, her adulthood in the shadow of that mistake, and a reflection on the nature of writing.', 0, 200, 'Atonement Ian McEwan 371 Jonathan Cape 2001', 5, 'no'),
(11, 'B0727XB6YC', 'Sita: Warrior of Mithila', '../uploadedBookImages/sitaWarriorOfMithila.jpg', 3, 388, 'Amish Tripathi', 'Westland Publications', '2017', 'In this book, you will follow Lady Sita\'s journey from an Adopted Child to the Prime Minister to finding her true calling. You will find all the familiar characters you have heard of, like Lord Ram and Lord Lakshman and see more of Lord Hanuman and many others from Mithila. You will also start discovering the true purpose of the Vayuputras and Malayaputras and their conflicting ideologies that leads to plot twists, politics and intrigue as they try to influence outcomes from behind the scenes.\n\nShe is the warrior we need. The Goddess we await.\n\nShe will defend Dharma. She will protect us.\n\nIndia, 3400 BCE.\n\nIndia is beset with divisions, resentment and poverty. The people hate their rulers. They despise their corrupt and selfish elite. Chaos is just one spark away. Outsiders exploit these divisions. Raavan, the demon king of Lanka, grows increasingly powerful, sinking his fangs deeper into the hapless Sapt Sindhu.\n\nTwo powerful tribes, the protectors of the divine land of India, decide', 4, 200, 'Sita: Warrior of Mithila Amish Tripathi 388 Westland Publications 2017', 5, 'no'),
(12, '9789390000000', '7 Secrets of Shiva', '../uploadedBookImages/7SecretsOfShiva.jpg', 3, 236, 'Devdutt Pattnaik', 'Westland Publications', '2016', 'Shiva, ‘the destroyer’ among the Hindu trinity (of gods), is\ndepicted in many contradictory manners. He is an ascetic\nwho wears animal skin, his body smeared with ashes.\nContradictory to his wild nature, he is also depicted as\nhaving a family, with a beautiful wife and two children.\nThere are many more such varied representations of\nShiva, the most prominent of these being the Linga and\nthe Nataraja. The author, Devdutt Pattanaik, introduces\nthe readers to these varied aspects and representations,\nand then sets about interpreting them. He explains the\ndifferent anomalies and conflicts in beliefs, as well as the\nsymbolism, rituals and reasons behind Hindu worship.', 4, 200, '7 Secrets of Shiva Devdutt Pattnaik 236 Westland Publications 2016', 5, 'yes'),
(13, '9789390000000', 'The Rise of Sivagami (Baahubali: Before the Beginn', '../uploadedBookImages/theRiseOfSivagami.jpg', 3, 494, 'Anand Neelakantan', 'Westland Publications', '2017', 'Blessed by the sacred Gauriparvat, Mahishmathi is an empire of abundance. The powerful kingdom is flourishing under its king, who enjoys the support and loyalty of his subjects, down to his lowly slaves. But is everything really as it appears, or is the empire hiding its own dirty secret?\nOrphaned at a young age and wrenched away from her foster family, Sivagami is waiting for the day she can avenge the death of her beloved father, cruelly branded a traitor. Her enemy? None other than the king of Mahishmathi. With unflinching belief in her father’s innocence, the fiery young orphan is driven to clear his name and destroy the empire of Mahishmathi against all odds. How far can she go in her audacious journey?\nFrom the pen of masterful storyteller and bestselling author Anand Neelakantan, comes The Rise of Sivagami, the first book in the series Bahubali: Before the Beginning. A tale of intrigue and power, revenge and betrayal, the revelations in The Rise of Sivagami will grip the reader ', 4, 200, 'The Rise of Sivagami (Baahubali: Before the Beginning Book 1) Anand Neelakantan 494 Westland Publications 2017', 5, 'no'),
(14, '9789380000000', 'AJAYA : Epic of the Kaurava Clan', '../uploadedBookImages/ajayaEpicOfTheKauravaClan.jpg', 3, 483, 'Anand Neelakantan', 'Platinum Press', '2013', 'THE MAHABHARATA ENDURES AS THE GREAT EPIC OF INDIA. But while Jaya is the story of the Pandavas, told from the perspective of the victors of Kurukshetra; Ajaya is the narrative of the ‘unconquerable’ Kauravas, who were decimated to the last man. At the heart of India’s most powerful empire, a revolution is brewing. Bhishma, the noble patriarch of Hastinapura, is struggling to maintain the unity of his empire. On the throne sits Dhritarashtra, the blind King, and his foreign-born Queen – Gandhari. In the shadow of the throne stands Kunti, the Dowager-Queen, burning with ambition to see her firstborn become the ruler, acknowledged by all. And in the wings: Parashurama, the enigmatic Guru of the powerful Southern Confederate, bides his time to take over and impose his will from mountains to ocean. Ekalavya, a young Nishada, yearns to break free of caste restrictions and become a warrior. Karna, son of a humble charioteer, travels to the South to study under the foremost Guru of the day an', 3.2, 200, 'AJAYA : Epic of the Kaurava Clan Anand Neelakantan 483 Platinum Press 2013', 5, 'no'),
(15, '978-9352773138', 'The Queens of Hastinapur', '../uploadedBookImages/theQueensOfHastinapur.jpg', 3, 352, 'Sharath Komarraju', 'HarperCollins India', '2017', 'They can claim to know her because she is unknowable. They see her form because she is formless. They speak her words because she never utters a word.\' This is the story of Ganga, Madri, Pritha and Gandhari: powerful women who, driven by their fears and ambitions, trigger events that lead to an epic war, propelling kings, princes and warriors towards glory and bloodshed, sin and redemption. Here is a retelling of the Mahabharata through the eyes of its female characters, for what came to an end at Kurukshetra took root in throne rooms and bed chambers; hermitages and sacred lakes; prisons and shrines; on horseback and under the stars.', 4.8, 200, 'The Queens of Hastinapur Sharath Komarraju 352 HarperCollins India 2017', 5, 'no'),
(16, '978-9353046118', 'Ashtamahishi: The Eight Wives of Krishna', '../uploadedBookImages/astamahishiTheEightWivesOfKrishna.jpg', 3, 197, 'Radha Viswanath', 'Rupa Publications', '2018', 'Krishna, the eternal lover, is believed to have charmed the heart of every woman he came across and his marriage with 16,100 women is the stuff of numerous ballads that have enthralled us over ages. But who amongst them all did Krishna love? Who ruled his heart and influenced his life?\nNot one, but there were eight women whom Krishna married solely on the basis of mutual love and respect. Each of these wives—the Ashtabharyas—contributed to making Krishna what he was. While their names figure in the text of the great epic Mahabharata, not much has been discussed about them. Who are these women and what was that special ‘something’ in each of them that won Krishna over? What were each of those relationships like?\nRadha Viswanath delves deep into the great Hindu epics, puranas and other ancient texts, weaving nuggets of information with rich imagination to give us a fascinating picture of Krishna’s life with these eight extraordinary women.', 4.2, 200, 'Ashtamahishi: The Eight Wives of Krishna Radha Viswanath 197 Rupa Publications 2018', 5, 'no'),
(17, '978-9389152197', 'The Vault of Vishnu', '../uploadedBookImages/theVaultOfVishnu.jpg', 3, 400, 'Ashwin Sanghi', 'Westland Publications', '2020', 'A Pallava prince travels to Cambodia to be crowned king, carrying with him secrets that will be the cause of great wars many centuries later.\n\nA Buddhist monk in ancient China treks south to India, searching for the missing pieces of a puzzle that could make his emperor all-powerful.\n\nA Neolithic tribe fights to preserve their sacred knowledge, oblivious to the war drums on the Indo-China border.\n\nMeanwhile, far away in the temple town of Kanchipuram, a reclusive scientist deciphers ancient texts even as a team of secret agents shadows his every move.\n\nCaught in the storm is a young investigator with a complex past of her own, who must race against time to maintain the balance of power in the new world.\n\nWelcome back to the exciting and shadowy world of Ashwin Sanghi, where myth and history blend into edge-of-the-seat action.', 4.1, 200, 'The Vault of Vishnu Ashwin Sanghi 400 Westland Publications 2020', 5, 'no'),
(18, '978-9389152197', 'Last Clash of the Titans: The Second Coming of Her', '../uploadedBookImages/lastClashOfTheTitans.jpg', 3, 223, 'Derek Gilbert', 'Defender Publishing', '2018', 'Greek and Roman tales of deities and demigods, what we call myths, are twisted versions of true history: Zeus is Satan, the Titans are the sons of god who came in to the daughters of man, and the heroes of the Golden Age are the mighty men of old—the Nephilim.\nIf you were brought up in church, there’s a good chance you were taught that the pagan gods were imaginary. But God Himself calls them gods. Not only that, He’s judged them, found them wanting, and proclaimed a sentence of death on these rebels.\nBut they’re not dead yet. They’re angry, and they’re coming back.\nIn Last Clash of the Titans, you’ll discover:\n\n•The Titans, the old gods of the Greeks, are the Watchers, the angelic sons of God who created the monstrous Nephilim by taking human women as wives\n•The Nephilim, later called Rephaim, were the heroes and demigods of the Greeks\n•Satan is lord of the Rephaim—and he’ll lead them in an end times army against Israel\n•The pagan Amorites worshiped the Rephaim spirits and believed th', 4.3, 200, 'Last Clash of the Titans: The Second Coming of Hercules, Leviathan, and the Prophesied War Between Jesus Christ and the Gods of Antiquity Derek Gilbert 223 Defender Publishing 2018', 5, 'no'),
(19, '9781950000000', 'Bad Moon Rising: Islam, Armageddon, and the Most D', '../uploadedBookImages/badMoonRising.jpg', 3, 478, 'Derek Gilbert', 'Defender Publishing', '2018', 'Derek P. Gilbert, author of the groundbreaking books The Great Inception and Last Clash of the Titans, argues that Islam is too big and too successful to be the work of just one spirit. Tracing the pagan religions of the nations around ancient Israel, Gilbert makes the bold claim that the religion of Muhammad is actually a collaboration by the old gods of Mesopotamia, a desperate partnership of fallen angels who were caught off-guard by the Resurrection of Jesus Christ.\n\n\nBad Moon Rising reveals:\n\n- Why Islam is the supernatural equivalent of a corporate merger\n\n- How “the iniquity of the Amorites” is affecting the world today\n\n- The importance of the moon-god, then and now\n\n- How Islam’s history reflects the characteristics of the gods of Mesopotamia\n\n- Shocking links between Mount Hermon, Petra, and Mecca\n\n- The prophesied death of the gods at Armageddon\n\n- Islam’s tragic role in the end times\n\nDrawing on peer-reviewed academic research, Gilbert exposes Islam as a dark alliance of pa', 3.8, 200, 'Bad Moon Rising: Islam, Armageddon, and the Most Diabolical Double-Cross in History Derek Gilbert 478 Defender Publishing 2018', 5, 'no'),
(20, '978-1781680032', 'The Book of Saladin: A Novel (The Islam Quintet)', '../uploadedBookImages/theBookOfSaladin.jpg', 3, 384, 'Tariq Ali', 'Open road Media', '2015', 'The Book of Saladin is the fictional memoir of Saladin, the Kurdish liberator of Jerusalem, as dictated to a Jewish scribe, Ibn Yakub. Saladin grants Ibn Yakub permission to talk to his wife and retainers so that he might present a full portrait in the Sultan’s memoirs. A series of interconnected stories follows, tales brimming over with warmth, earthy humor and passions in which ideals clash with realities and dreams are confounded by desires.\n\nAt the heart of the novel is an affecting love affair between the Sultan’s favored wife, Jamila, and the beautiful Halina, a later addition to the harem. The novel charts the rise of Saladin as Sultan of Egypt and Syria and follows him as he prepares, in alliance with his Jewish and Christian subjects, to take Jerusalem back from the Crusaders. This is a medieval story, but much of it will be uncannily familiar to those who follow events in contemporary Cairo, Damascus, and Baghdad. Betrayed hopes, disillusioned soldiers and unrealistic allianc', 3.8, 200, 'The Book of Saladin: A Novel (The Islam Quintet) Tariq Ali 384 Open road Media 2015', 5, 'no'),
(21, 'B08CGRM3CZ', 'Why Not Me?: A feeli', '../uploadedBookImages/whyNotMeAFeelingOfMillions.jpg', 2, 141, 'Anubhav Agarwal', 'Hinglish', '2020', 'The book “Why Not Me?” is based on the life story of our very own author. Where he speaks about his past relationship with Zoya.', 4.8, 200, 'Why Not Me?: A feeling of Millions Anubhav Agarwal 141 Hinglish 2020', 5, 'no'),
(22, '9382665870', 'Her Last Wish', '../uploadedBookImages/herLastWish.jpg', 2, 208, 'Ajay Pandey', 'Srishti Publishers', '2016', 'This book is about a young couple who have vowed to live along and go through the jungle of life by holding hands. Vijay who is overloaded with expectations and is never sure about his actions. Astha enters his life and moulds his shattered bits into a beautiful soul. Everything seems perfect and suddenly time stabs the pious feelings of Vijay as he realises that its time to release hands, its time to let go of Astha.', 4.6, 200, 'Her Last Wish Ajay Pandey 208 Srishti Publishers 2016', 5, 'no'),
(23, '9387022609', 'Wake Up, Life is Cal', '../uploadedBookImages/wakeUpLifeIsCalling.jpg', 2, 256, 'Preeti Shenoy', 'Srishti Publishers', '2019', 'The tagline of the book is ‘When your mind is your greatest enemy.’ The core message is the same as the first book: That with love, hope and determination, we can overcome anything. We do not have much control over what happens to us. But we do have control over what we choose to focus on. The book demonstrates how by changing our thoughts, we can change our life itself.', 4.5, 200, 'Wake Up, Life is Calling Preeti Shenoy 256 Srishti Publishers 2019', 5, 'no'),
(24, '9780141439600', 'A Tale of Two Cities', '../uploadedBookImages/aTaleOfTwoCities.jpg', 2, 264, 'Charles Dickens', 'Penguin Books', '1859', 'Novel by Charles Dickens, published both serially and in book form in 1859. The story is set in the late 18th century against the background of the French Revolution. Although Dickens borrowed from Thomas Carlyle\'s history, The French Revolution, for his sprawling tale of London and revolutionary Paris, the novel offers more drama than accuracy. The scenes of large-scale mob violence are especially vivid, if superficial in historical understanding. The complex plot involves Sydney Carton\'s sacrifice of his own life on behalf of his friends Charles Darnay and Lucie Manette. While political events drive the story, Dickens takes a decidedly antipolitical tone, lambasting both aristocratic tyranny and revolutionary excess--the latter memorably caricatured in Madame Defarge, who knits beside the guillotine. The book is perhaps best known for its opening lines, \"It was the best of times, it was the worst of times,\" and for Carton\'s last speech, in which he says of his replacing Darnay in a p', 4.2, 200, 'A Tale of Two Cities Charles Dickens 264 Penguin Books 1859', 5, 'no'),
(25, '9789389152043', 'Stories We Never Tel', '../uploadedBookImages/storiesWeNeverTell.jpg', 2, 215, 'Savi Sharma', 'Westland Publications', '2020', 'There are stories we never talk about. Stories we are afraid to share. Simply because they hurt too much or no one wants to listen to them.\n\nSuch was the story of Jhanvi, who is a budding social media influencer. She appears to have it all together, living her ideal life, but something is missing: Jhanvi has this impossible need that drives her to be more perfect than any person could possibly be.\n\nAnd the story of Ashray, who had a rocky start in life. With hard work and determination, he translates his dreams into reality, but his deep-seated insecurities come to the fore when life throws him a curveball.\n\nAs their stories intersect, their lives change in ways they never expected.\n\nIn a world of loss, darkness and destruction, will Jhanvi and Ashray be able to tell a story of hope, light and recovery?', 4.5, 200, 'Stories We Never Tell Savi Sharma 215 Westland Publications 2020', 5, 'no'),
(26, '9789380349305', 'Life Is What You Mak', '../uploadedBookImages/lifeIsWhatYouMakeIt.jpg', 2, 226, 'Preeti Shenoy', 'Srishti Publishera', '2011', 'The second book by Preeti Shenoy, Life Is What You Make It, was published on January 1, 2011 and it turned out to be a national bestseller. The book has also featured in the “Top Books of 2011, ” a Nielsen list, which is released by the Hindustan Times. The book was also selected as one of the all-time bestsellers of 2011 by the Times of India.\n\nLife Is What You Make It is based on a love story that has been set in India in the 90s. It has been described by the readers as a book portraying how love, hope and determination can together win over even the destiny. It is a gripping tale of few significant years of the protagonist’s life.\n\nThe novel revolves around a woman in her 20s, Ankita, who has a past haunting her like a nightmare. As she grows up from adolescence to a woman in her mid-20s, she wades through different situations, engages in affairs with a couple of guys and is set-back by her parents’ refusal to accept her situation. As a result of non-stop upheavals in her life, Anki', 4.1, 200, 'Life Is What You Make It Preeti Shenoy 226 Srishti Publishera 2011', 5, 'no'),
(27, '978-8175994058', 'Journey to the Center Earth', '../uploadedBookImages/journeyToThe CentreOfTheEarth.jpg', 2, 240, 'Jules Verne', 'Wordsworth Editions', '2016', 'Professor Liedenbrock, a man of incredible impatience and Axel, his unadventurous nephew, come across a coded note in an original runic manuscript of an Icelandic saga. as they try to decipher the code and reveal the message, the results are not quite meaningful.“I will get at the secret of this document andI will neither sleep nor eat until I have found it out.”My comment on this was a half-suppressed “Oh!”“Nor you either, Axel,” he added.As Axel discovers the secret, he decides to keep it to himself. But defeated by his hunger after two days, he reveals it to Liedenbrock. and what follows is a journey to the center of the Earth through Iceland, down a volcanic crater.Encountering grave dangers and bizarre phenomena, as they descend down the underground world, will they reach the center of the Earth?Adapted into numerous movies and television series, Journey to the Centre of the Earth is a brilliant science fiction adventure. Demonstrating Verne’s power of imagination, this mas', 4.4, 200, 'Journey to the Centre of the Earth Jules Verne 240 Wordsworth Editions 2016', 5, 'no'),
(28, '9781542040464', 'The Girl in Room 105', '../uploadedBookImages/theGirlInRoom105.jpg', 2, 314, 'Chetan Bhagat', 'Westland Publications', '2018', 'Hi, I’m Keshav, and my life is screwed. I hate my job and my girlfriend left me. Ah, the beautiful Zara. Zara is from Kashmir. She is a Muslim. And did I tell you my family is a bit, well, traditional? Anyway, leave that.\n\nZara and I broke up four years ago. She moved on in life. I didn’t. I drank every night to forget her. I called, messaged, and stalked her on social media. She just ignored me.\n\nHowever, that night, on the eve of her birthday, Zara messaged me. She called me over, like old times, to her hostel room 105. I shouldn’t have gone, but I did… and my life changed forever.\n\nThis is not a love story. It is an unlove story.', 4.3, 200, 'The Girl in Room 105 Chetan Bhagat 314 Westland Publications 2018', 5, 'no'),
(29, '978-9389178227', 'Shadow of the Past', '../uploadedBookImages/shadowOfThePast.jpg', 2, 168, 'Mayank Manohar', 'Fingerprint Passion', '2019', 'Life throws up tough choices that often control your life, forcing you to carry the baggage of your past. In the process, you have no option but to fall in love with your own shadow. Your pain and loneliness are your best friends. But there comes a breaking point and when you reach it, there is a good chance it can destroy you completely. Shadow of the past is a story about three young people crippled by their own past and insecurities and how their life changes when they stop running away and start embracing it. But the question always remains: to what extent can anyone go to get rid of their past? Meet Lavanya, deprived of the love that she deserved and fighting a seven-year-long battle for rehan, who is crippled by the complexity of his own mind, then takes a major u-turn. Arpita, who yearns for rehan’s love, suddenly finds herself trapped between the incomplete love saga of rehab and Lavanya. Rehan comes out of the void he is in, only to Tumble into another. Will the shadow of thei', 4.4, 200, 'Shadow of the Past Mayank Manohar 168 Fingerprint Passion 2019', 5, 'no'),
(30, '978-9387022362', 'A Thing Beyond Forever', '../uploadedBookImages/aThingBeyondForever.jpg', 2, 224, 'Novneel Chakraborty', 'Srishti Publishers', '2018', 'Some love stories are soul stories.\nDr. Radhika Sharma is what girls of today aspire to become – educated, financially independent and a woman of substance. But within, she is a broken person who is yet to come to terms with her past, her first love Raen’s sudden death.\nIn comes a nine-year-old patient under her treatment, who is not only infatuated with her, but also keeps asking her non-stop questions. One of those questions leads her to open Raen’s personal diary. By the time she finishes reading the diary, Radhika finds an uncanny similarity between Raen and the young patient. She finds herself in the middle of an unusual situation. One after another, shocking truths emerge, which push her to question if an unexplained attraction is the missing link between souls.\nA Thing Beyond Forever is a pristine love story which digs deep into human emotions and explores the complexity of it in a soul-stirring manner.', 4.2, 200, 'A Thing Beyond Forever Novneel Chakraborty 224 Srishti Publishers 2018', 5, 'no'),
(31, '978-8175993280', 'The Autobiography of', '../uploadedBookImages/theAutobiographyOfBenjaminFranklin.jpg', 4, 240, 'Benjamin Franklin', 'Fingerprint Publications', '2015', 'An apprentice to his brother at twelve, a writer at sixteen, a printer at twenty-two and an inventor at thirty-six,\nBenjamin Franklin was a renowned polymath\nand a scientist extraordinaire.\nA member of the Committee of Five that drafted and presented America‘s Declaration of Independence, Benjamin Franklin was one of the Founding Fathers of the United States and was titled ‘The First American.’\nWith his wit and wisdom shining through every page of this remarkable autobiography, Autobiography of Benjamin Franklin brings for us one of the first examples of the fulfilment of the American Dream. Though an unfinished record, this work continues to remain the most influential autobiography ever written.', 4.3, 125, 'The Autobiography of Benjamin Franklin Benjamin Franklin 240 Fingerprint Publications 2015', 5, 'no'),
(32, '978-8175993143', 'Alexander the Great', '../uploadedBookImages/alexanderTheGreat.jpg', 4, 200, 'Jacob Abbott', 'Fingerprint Publications', '2015', 'A king at nineteen, dead at thirty-two and\nin between.. an empire that refused to end.\nThis is the incredible true story of Alexander the Great, the boy who set out to win till there were ‘no more worlds to conquer.’ a ruthless and self-willed king of the Ancient Greek kingdom of Macedonia, Alexander’s rule extended from Greece to Egypt to India, making him one of history’s most successful military commanders.\nThis enlightening account of the great king’s remarkable life, highlights not only his phenomenal military accomplishments, unparalleled success and victories and adept leadership qualities, but also brings for us an insight into this extremely interesting man’s life.\nAlexander the Great’s story is one of the most fascinating ones ever told and he continues to attract the attention of mankind by remaining an unsurpassed legendary hero.', 4.1, 125, 'Alexander the Great Jacob Abbott 200 Fingerprint Publications 2015', 5, 'no'),
(33, '9780062301239', 'Elon Musk', '../uploadedBookImages/elonMusk.jpg', 4, 400, 'Ashlee Vance', 'Virgin Digital', '2015', 'South African born Elon Musk is the renowned entrepreneur and innovator behind PayPal, SpaceX, Tesla, and SolarCity. Musk wants to save our planet; he wants to send citizens into space, to form a colony on Mars; he wants to make money while doing these things; and he wants us all to know about it. He is the real-life inspiration for the Iron Man series of films starring Robert Downey Junior.\n\nThe personal tale of Musk’s life comes with all the trappings one associates with a great, drama-filled story. He was a freakishly bright kid who was bullied brutally at school, and abused by his father. In the midst of these rough conditions, and the violence of apartheid South Africa, Musk still thrived academically and attended the University of Pennsylvania, where he paid his own way through school by turning his house into a club and throwing massive parties.\n\nHe started a pair of huge dot-com successes, including PayPal, which eBay acquired for $1.5 billion in 2002. Musk was forced out as CE', 4.5, 125, 'Elon Musk Ashlee Vance 400 Virgin Digital 2015', 5, 'no'),
(34, '9780748131327', 'Steve Jobs', '../uploadedBookImages/steveJobs.jpg', 4, 568, 'Walter Isaacson', 'Little, Brown Book Group', '2011', 'Based on more than forty interviews with Steve Jobs conducted over two years - as well as interviews with more than a hundred family members, friends, adversaries, competitors, and colleagues - this is the acclaimed, internationally bestselling biography of the ultimate icon of inventiveness.\n\nWalter Isaacson tells the story of the rollercoaster life and searingly intense personality of creative entrepreneur whose passion for perfection and ferocious drive revolutionized six industries: personal computers, animated movies,music, phones, tablet computing, and digital publishing.\n\nAlthough Jobs cooperated with this book, he asked for no control over what was written, nor even the right to read it before it was published. He put nothing off limits. He encouraged the people he knew to speak honestly. And Jobs speaks candidly, sometimes brutally so, about the people he worked with and competed against. His friends, foes, and colleagues provide an unvarnished view of the passions, perfection', 4.6, 180, 'Steve Jobs Walter Isaacson 568 Little, Brown Book Group 2011', 5, 'yes'),
(35, '9780062413406', 'Alibaba: The House T', '../uploadedBookImages/alibabaTheHouseThatJackMaBuilt.jpg', 4, 304, 'Duncan Clark', 'HarperCollins Publishers', '2016', 'In just a decade and half Jack Ma, a man who rose from humble beginnings and started his career as an English teacher, founded and built Alibaba into the second largest Internet company in the world. The company’s $25 billion IPO in 2014 was the world’s largest, valuing the company more than Facebook or Coca Cola. Alibaba today runs the e-commerce services that hundreds of millions of Chinese consumers depend on every day, providing employment and income for tens of millions more. A Rockefeller of his age, Jack has become an icon for the country’s booming private sector, and as the face of the new, consumerist China is courted by heads of state and CEOs from around the world.\n\nGranted unprecedented access to a wealth of new material including exclusive interviews, Clark draws on his own first-hand experience of key figures integral to Alibaba’s rise to create an authoritative, compelling narrative account of how Alibaba and its charismatic creator have transformed the way that Chinese ', 4.3, 180, 'Alibaba: The House That Jack Ma Built Duncan Clark 304 HarperCollins Publishers 2016', 5, 'no'),
(36, '9788129138392', 'My Life: An Illustra', '../uploadedBookImages/myLifeAnIllustratedBiography.jpg', 4, 122, 'A.P.J Abdul Kalam', 'Rupa Publications', '2015', '‘The story of my life has become intertwined with the story of this country. And somewhere along the way, as I met a million children across this land, I too learnt from a million minds. This book was not written to only tell my story. I want every young reader to think that this book is his or her story too.’\n\nA.P.J. Abdul Kalam has been one of the most iconic figures of Independent India. A scientist, leader, thinker, teacher and writer, he achieved remarkable success in various fields. Yet, what endeared him to so many was his dedication to the idea of a developed India, his simple and direct way of interacting with people and his deep love for his fellowmen.\n\nIn My Life Dr Kalam writes his life story starting from his days growing up at Rameswaram; about working on India’s space and missile programmes; his years as the eleventh President of India; and about his life thereafter. Full of anecdotes that demonstrate the importance of hard work, commitment,courage and innovative thinkin', 4.8, 420, 'My Life: An Illustrated Biography A.P.J Abdul Kalam 122 Rupa Publications 2015', 5, 'no'),
(37, '9780143066897', 'C.V. Raman: A Biogra', '../uploadedBookImages/cVRamanABiography.jpg', 4, 296, 'Uma Parameswaran', 'Penguin', '2011', 'The compelling story of a trailblazer of modern science In 1921, while on a voyage to England, Chandrasekhara Venkata Raman was amazed by the spectacular blue of the Mediterranean Sea.', 4, 420, 'C.V. Raman: A Biography Uma Parameswaran\n296 Penguin 2011', 5, 'no'),
(38, '978-8179925911', 'The Theory of Everyt', '../uploadedBookImages/theTheoryOfEverything.jpg', 4, 140, 'Stephen Hawking', 'Jaico Publishing House', '2006', 'Seven lectures by the brilliant theoretical physicist have been compiled into this book to try to explain to the common man, the complex problems of mathematics and the question that has been gripped everyone all for centuries, the theory of existence.\n\nUndeniably intelligent, witty and childlike in his explanations, the narrator describes every detail about the beginning of the universe. He describes what a theory that can state the initiation of everything would encompass.\n\nIdeologies about the universe by Aristotle, Augustine, Hubble, Newton and Einstein have all been briefly introduced to the reader. Black holes and Big Bang has been explained in an unsophisticated manner for anyone to understand.\n\nAll these events and individual theories may be strung together to create a theory of the origin of everything and the author strongly believes that the origin might not necessarily be from a singular event. He advocates the idea of a multi-dimensional origin with a no-boundary condition', 4.6, 125, 'The Theory of Everything Stephen Hawking 140 Jaico Publishing House 2006', 5, 'yes'),
(39, '9780062508867', 'Muhammad: A Biograph', '../uploadedBookImages/muhammadABiographyOfTheProphet.jpg', 4, 304, 'Karen Armstrong', 'HarperOne', '1991', 'Muhammad was born in 570 C.E. Over the course of the following sixty years, he built a thriving spiritual community and laid out the foundations of a religion that has changed the course of world history. There is more historical data available about his life than that of the founder of any other major faith, and yet, particularly in the West, his is a consistently misunderstood story.\n\n\n\nAn acclaimed authority on religious and spiritual issues, Karen Armstrong offers a balanced portrait of this revered figure. Through comparison with other prophets and mystics, she illuminates Muhammad\'s spiritual ideas; she uses the facts of his life, from which Muslims have drawn instruction for centuries, to make the tenets of Islam clear and accessible for modern readers of all faiths. This vivid and detailed biography strips away centuries of distortion and myth to reveal the man behind the religion.', 4.1, 180, 'Muhammad: A Biography of the Prophet Karen Armstrong 304 HarperOne 1991', 5, 'no'),
(40, '9780743264730', 'Einstein: His Life a', '../uploadedBookImages/einsteinHisLifeAndUniverse.jpg', 4, 675, 'Walter Isaacson', 'Simon Schuster', '2007', 'Einstein was a rebel and nonconformist from boyhood days, and these character traits drove both his life and his science. In this narrative, Walter Isaacson explains how his mind worked and the mysteries of the universe that he discovered.', 4.1, 210, 'Einstein: His Life and Universe Walter Isaacson 675 Simon Schuster 2007', 5, 'no'),
(41, '9781542005234', 'If You Tell: A True ', '../uploadedBookImages/ifYouTellATrueStoryOfMurder.jpg', 5, 410, 'Gregg Olsenn', 'Thomas & Mercer', '2019', 'After more than a decade, when sisters Nikki, Sami, and Tori Knotek hear the word mom, it claws like an eagle’s talons, triggering memories that have been their secret since childhood. Until now.\n\nFor years, behind the closed doors of their farmhouse in Raymond, Washington, their sadistic mother, Shelly, subjected her girls to unimaginable abuse, degradation, torture, and psychic terrors. Through it all, Nikki, Sami, and Tori developed a defiant bond that made them far less vulnerable than Shelly imagined. Even as others were drawn into their mother’s dark and perverse web, the sisters found the strength and courage to escape an escalating nightmare that culminated in multiple murders.\n\nHarrowing and heartrending, If You Tell is a survivor’s story of absolute evil—and the freedom and justice that Nikki, Sami, and Tori risked their lives to fight for. Sisters forever, victims no more, they found a light in the darkness that made them the resilient women they are today—loving, loved,', 4.4, 200, 'If You Tell: A True Story of Murder, Family Secrets, and the Unbreakable Bond of Sisterhood Gregg Olsenn 410 Thomas & Mercer 2019', 5, 'no'),
(42, '9781683993018', 'The Girl Who Lived', '../uploadedBookImages/theGirlWhoLived.jpg', 5, 297, 'Christopher Greyson', 'Greyson Media', '2017', 'As the anniversary of the murders approaches, Faith Winters is released from the psychiatric hospital and yanked back to the last spot on earth she wants to be—her hometown where the slayings took place. Wracked by the lingering echoes of survivor\'s guilt, Faith spirals into a black hole of alcoholism and wanton self-destruction. Finding no solace at the bottom of a bottle, Faith decides to track down her sister\'s killer—only to discover that she\'s the one being hunted.\n\nHow can one woman uncover the truth when everyone\'s a suspect—including herself?\n\nFrom the mind of Wall Street Journal bestselling author Christopher Greyson comes a story with twists and turns that take the reader to the edge of madness. The Girl Who Lived should come with a warning label: once you start reading, you won\'t be able to stop. Not since Girl on the Train and Gone Girl has a psychological thriller kept readers so addicted—and guessing right until the last page.\n\n\"Christopher Greyson has created a thriller ', 4.4, 200, 'The Girl Who Lived Christopher Greyson 297 Greyson Media 2017', 5, 'no'),
(43, '978-8175994317', 'The Complete Novels ', '../uploadedBookImages/theCompleteNovelsOfSherlockHolmes.jpg', 5, 536, 'Arthur Conan Doylr', 'FingerPrint Publishing', '2017', '“There’s the scarlet thread of murder running through the colourless skein of life and our duty is to unravel it and isolate it and expose every inch of it.”Sherlock Holmes Consulting Detective 221B Baker Street London.\nThis is where begins a historical partnership between Dr. Watson—the archetypal gentleman from the Victorian era—and the eccentric, legendary sleuth, Sherlock Holmes. Join them as they gather clues, ranging from bloodstains and footprints to cigarette ash and wedding rings and arrive at unusual and surprising conclusions. This book is a collection of the four novels written by Sir Arthur Conan Doyle: A Study in Scarlet (1887), The Sign of the Four (1890), The Hound of the Baskervilles (1902) and The Valley of Fear (1915). Featuring the timeless detective Sherlock Holmes, these novels have been successfully engrossing readers for more than a century now.', 4.5, 200, 'The Complete Novels of Sherlock Holmes Arthur Conan Doylr 536 FingerPrint Publishing 2017', 5, 'no'),
(44, '978-8175994256', '3 and a Half Murders', '../uploadedBookImages/3AndAHalfMurders.jpg', 5, 328, 'Salil Desai', 'FingerPrint Publishing', '2017', 'Two corpses . . . a woman lying dead on her bed,\na man hanging from the ceiling fan.\nA suicide note cum murder confession.\nAnd a name . . . Shaunak Sodhi.\nWhen the case comes their way, Senior Inspector Saralkar has just been diagnosed with hypertension and PSI Motkar is busy with rehearsals of an amateur play.\nWhat appears at first to be a commonplace crime by a debt-ridden, cuckolded husband, who has killed his unfaithful wife and then hung himself, soon begins to unfold as a baffling mystery. As clues point to a seven-year-old unsolved murder in Bangalore and other leads emerge closer home, Saralkar and Motkar find themselves investigating shady secrets, bitter grudges, fishy land deals, carnal desires, the dead woman Anushka Doshi’s sinister obsession with past life regression and her husband’s links to a suspicious, small-time god-man, Rangdev Baba.And then, suddenly, the murderer resurfaces and yet another life is in grave danger . . .\nCan Saralkar and Motkar get to the bottom of', 4.3, 200, '3 and a Half Murders Salil Desai 328 FingerPrint Publishing 2017', 5, 'no'),
(45, '978-9387022256', 'The Mysterious Affai', '../uploadedBookImages/theMysteriousAffairAtStyles.jpg', 5, 194, 'Agatha Christie', 'Srishti Publishers', '2018', 'Emily Inglethorp, the rich mistress of Styles Court manor, is found dead. Poisoned. Hercule Poirot is called upon to investigate the death by Captain Hastings, who is a guest at the manor. Though a retired detective, Poirot steps in to unravel the truth. Who could have killed her? And why? The husband who would inherit the wealth or her stepson? There are others who raise suspicion too. What do the clues add up to? A broken coffee cup, splash of candle grease and the name of the husband on Emily’s dying lips. There is one way to find out and the master sleuth Poirot the Belgian detective who features in thirty-nine Agatha Christie mysteries is sure to find out.', 4.1, 200, 'The Mysterious Affair at Styles Agatha Christie 194 Srishti Publishers 2018', 5, 'no'),
(46, '978-8172345679', 'The Murder of Sonia ', '../uploadedBookImages/theMurderOfSoniaRaikkonen.jpg', 5, 336, 'Salil Desai', 'FingerPrint Publishing', '2015', 'Late one November night, the mutilated corpse of a young Finnish tourist is found in a public garden in Pune. It looks like a case of brutal rape and murder, but Senior Inspector Saralkar and PSI Motkar find themselves probing further delving deeper.\n\nStanding virtually clueless, except for a single white sandal found on the scene of the crime, the policemen duo start looking for suspects. Things get murkier when Saralkar\'s old friend and colleague, Inspector Patange, seeks his help to establish the identity of another murder victim - an old man found by a wooded hillside on the outskirts of Pune. Not only do the old man\'s stab injuries match the wounds inflicted on the Finnish girl, but he is also found wearing the other white sandal. As Saralkar and Motkar struggle to find the link that connects the two murders, nothing is what it seems. The emerging truth seems far more dangerous and the motive far more bizarre. Who murdered Sonia, and why? The truth will chill you to the bone!', 4.3, 200, 'The Murder of Sonia Raikkonen Salil Desai 336 FingerPrint Publishing 2015', 5, 'no'),
(47, '9781788750011', 'The Last Nazi: a WW2', '../uploadedBookImages/theLastNazi.jpg', 5, 482, 'Andrew Turpin', 'The Write Direction Publishing', '2017', 'In this gripping thriller, war crimes investigator and ex-CIA officer Joe Johnson uncovers links between financing for the presidential campaign, the Nazi train, and a ruthless British blackmail plot. \n\nBut the mystery becomes bigger and more deeply personal than Johnson expects when it turns out the SS Holocaust killer escaped his net years earlier.\n\nSoon there are high-level intelligence agency and criminal networks combining across three continents against Johnson and his ex-MI6 colleague Jayne Robinson. He finds himself inextricably caught up in a deeply challenging quest to win justice, to avenge his mother’s tortured past and revive his flagging career.\n\nThe Last Nazi is the first book in the Joe Johnson series. Read how he puts himself in the firing line to uncover dark truths.', 4.1, 200, 'The Last Nazi: a WW2 spy conspiracy thriller Andrew Turpin 482 The Write Direction Publishing 2017', 5, 'no'),
(48, '978-9388144858', 'The Sane Psychopath', '../uploadedBookImages/theSanePsycopath.jpg', 5, 240, 'Salil Desai', 'FingerPrint Publishing', '2018', 'Are some crimes unpardonable?\nA young lawyer is about to find out.\nIt was just another day in Pune. Just another morning.\nUntil a man decided otherwise.\nAnd left an entire city horrified . . . scared . . . angry . . . baying for blood.\nThis is the story of Shanker Lande, driver of a state transport bus, who goes on a bone-chilling hour-long rampage on the streets of Pune—killing 10, maiming 70, and damaging over 100 vehicles, before he is captured.\nIn this case of Shanker Lande vs the city of Pune, the difference between the criminal and the victims is clear as night and day. But a young idealistic lawyer, Varun Gupte, a Punekar, still decides to defend Lande. And in the process seeks help from a psychiatrist, a man who lost his son to the same incident.\nCaught in the pincer grip of their dilemmas, do the two men crumble? Do they unearth the truth? And does the truth absolve Lande?\nInspired by a real incident, The Sane Psychopath is a fictional exploration of a frightening murderous ph', 4.1, 200, 'The Sane Psychopath Salil Desai 240 FingerPrint Publishing 2018', 5, 'no'),
(49, '9781646787517', 'The Rape Trial', '../uploadedBookImages/theRapeTrial.jpg', 5, 484, 'Bidisha Ghosal', 'Notion Press', '2020', 'What do you do when the rapist is someone you know? What do you do when he has been found innocent in the eyes of the law? Rhea, Hitaishi and Amruta’s friendship has been cemented over a lifetime, but now they find themselves struggling to answer these questions together.\nNearly a decade has passed since Rahul Satyabhagi, heir to the mega Satyabhagi business empire, had raped Avni Rambha, bested her in court, and gone on to become a men’s rights activist, and the who’s-who of Badrid Bay had breathed a sigh of relief that the sordid mess was over. But now a sting operation proves what many, the three friends included, had suspected all along – he’d been lying. Furious that he has been exposed, Rahul plans to sue the media as well as his long-suffering victim. Now, Rhea, Hitaishi and Amruta find themselves at a crossroad - can they carry on doing nothing?\nDC Virendra Dixit was among those who’d believed that the Rambha rape case had been a ‘false allegation’, but now the sting tape bring', 4.5, 200, 'The Rape Trial Bidisha Ghosal 484 Notion Press 2020', 5, 'no'),
(50, '9783426306901', 'The Silent Patient', '../uploadedBookImages/theSilentPatient.jpg', 5, 336, 'Alex Michaelides', 'Orion', '2019', 'Alicia Berenson lived a seemingly perfect life until one day six years ago.\n\nWhen she shot her husband in the head five times.\n\nSince then she hasn\'t spoken a single word.\n\nIt\'s time to find out why.', 4, 200, 'The Silent Patient Alex Michaelides 336 Orion 2019', 5, 'no'),
(51, '553103547', 'A Game of Thrones', '../uploadedBookImages/aGameOfThrones.jpg', 6, 694, 'George R. R. Martin', 'Bantam Books; Voyager Books', '1996', 'Upon the death of Lord Jon Arryn, the principal advisor to King Robert Baratheon, Robert recruits his childhood friend Eddard \"Ned\" Stark, now lord of the North, to replace Arryn as \"Hand of the King\", and to betroth his daughter Sansa to Robert', 0, 500, 'A Game of Thrones George R. R. Martin 694 Bantam Books; Voyager Books 1996', 5, 'no'),
(52, '000224585X', 'A Clash of Kings', '../uploadedBookImages/aClashOfKings.jpg', 6, 761, 'George R. R. Martin', 'Bantam Books; Voyager Books', '1998', 'A Clash of Kings depicts the Seven Kingdoms of Westeros in civil war, while the Night', 0, 500, 'A Clash of Kings George R. R. Martin 761 Bantam Books; Voyager Books 1998', 5, 'no'),
(53, '553106635', 'A Storm of Swords', '../uploadedBookImages/aStormOfSwords.jpg', 6, 973, 'George R. R. Martin', 'Bantam Books; Voyager Books', '2000', 'A Storm of Swords picks up the story slightly before the end of its predecessor, A Clash of Kings. The Seven Kingdoms of Westeros are still in the grip of the War of the Five Kings,[6] wherein Joffrey Baratheon and his uncle Stannis Baratheon compete for the Iron Throne, while Robb Stark of the North and Balon Greyjoy of the Iron Islands declare their independence', 0, 200, 'A Storm of Swords George R. R. Martin 973 Bantam Books; Voyager Books 2000', 5, 'no'),
(54, '2247437', 'A Feast for Crows', '../uploadedBookImages/aFeastForCrows.jpg', 6, 753, 'George R. R. Martin', 'Bantam Books; Voyager Books', '2005', 'The War of the Five Kings is slowly coming to its end. The secessionist kings Robb Stark and Balon Greyjoy have been killed. One claimant to the throne, Stannis Baratheon, has gone to fight off invading wildling tribes at the northern Wall, where Robb\'s half-brother Jon Snow has become the 998th Lord Commander of the Night\'s Watch, the order responsible for guarding the Wall.', 0, 200, 'A Feast for Crows George R. R. Martin 753 Bantam Books; Voyager Books 2005', 5, 'no');
INSERT INTO `books` (`bookID`, `ISBN`, `bookName`, `image`, `genre`, `pages`, `author`, `publication`, `yearOfPublish`, `descriptions`, `rating`, `price`, `tags`, `stock`, `featured`) VALUES
(55, '9780553801477', 'A Dance with Dragons', '../uploadedBookImages/aDanceWithDragons.jpg', 6, 1016, 'George R. R. Martin', 'Bantam Books; Voyager Books', '2011', 'A claimant to the Iron Throne of Westeros, occupies the Wall at the realm\'s northern border, having helped to repel an invasion of wildlings from the northern wilderness. Stannis executes Mance Rayder, the leader of the wildlings, for refusing to submit to him, and marches his army south to seek support in his bid for the throne.', 0, 200, 'A Dance with Dragons George R. R. Martin 1016 Bantam Books; Voyager Books 2011', 5, 'no'),
(56, '747532699', 'Harry Potter and the Philosopher\'s Stone', '../uploadedBookImages/philosophersStone.jpg', 6, 223, 'J. K. Rowling', 'Bloomsbury Publishing', '1997', 'The first novel in the Harry Potter series and Rowling\'s debut novel, it follows Harry Potter, a young wizard who discovers his magical heritage on his eleventh birthday, when he receives a letter of acceptance to Hogwarts School of Witchcraft and Wizardry. Harry makes close friends and a few enemies during his first year at the school, and with the help of his friends, Harry faces an attempted comeback by the dark wizard Lord Voldemort, who killed Harry\'s parents, but failed to kill Harry when he was just 15 months old.', 0, 200, 'Harry Potter and the Philosopher\'s Stone J. K. Rowling 223 Bloomsbury Publishing 1997', 5, 'no'),
(57, '747538492', 'Harry Potter and the Chamber of Secrets', '../uploadedBookImages/chamberOfSecrets.jpg', 6, 251, 'J. K. Rowling', 'Bloomsbury Publishing', '1998', 'The plot follows Harry\'s second year at Hogwarts School of Witchcraft and Wizardry, during which a series of messages on the walls of the school\'s corridors warn that the \"Chamber of Secrets\" has been opened and that the \"heir of Slytherin\" would kill all pupils who do not come from all-magical families. These threats are found after attacks that leave residents of the school petrified. Throughout the year, Harry and his friends Ron and Hermione investigate the attacks.', 0, 200, 'Harry Potter and the Chamber of Secrets J. K. Rowling 251 Bloomsbury Publishing 1998', 5, 'no'),
(58, '747542155', 'Harry Potter and the Prisoner of Azkaban', '../uploadedBookImages/prisonerOfAzkaban.jpg', 6, 317, 'J. K. Rowling', 'Bloomsbury Publishing', '1999', 'The book follows Harry Potter, a young wizard, in his third year at Hogwarts School of Witchcraft and Wizardry. Along with friends Ronald Weasley and Hermione Granger, Harry investigates Sirius Black, an escaped prisoner from Azkaban, the wizard prison, believed to be one of Lord Voldemort\'s old allies.', 0, 200, 'Harry Potter and the Prisoner of Azkaban J. K. Rowling 317 Bloomsbury Publishing 1999', 5, 'no'),
(59, '074754624X', 'Harry Potter and the Goblet of Fire', '../uploadedBookImages/gobletOfFire.jpg', 6, 636, 'J. K. Rowling', 'Bloomsbury Publishing', '2000', 'It follows Harry Potter, a wizard in his fourth year at Hogwarts School of Witchcraft and Wizardry, and the mystery surrounding the entry of Harry\'s name into the Triwizard Tournament, in which he is forced to compete.', 0, 200, 'Harry Potter and the Goblet of Fire J. K. Rowling 636 Bloomsbury Publishing 2000', 5, 'no'),
(60, '747551006', 'Harry Potter and the Order of the Phoenix', '../uploadedBookImages/orderOfThePhoenix.jpg', 6, 766, 'J. K. Rowling', 'Bloomsbury Publishing', '2003', 'It follows Harry Potter\'s struggles through his fifth year at Hogwarts School of Witchcraft and Wizardry, including the surreptitious return of the antagonist Lord Voldemort, O.W.L. exams, and an obstructive Ministry of Magic.', 0, 200, 'Harry Potter and the Order of the Phoenix J. K. Rowling 766 Bloomsbury Publishing 2003', 5, 'no'),
(61, '747581088', 'Harry Potter and the Half-Blood Prince', '../uploadedBookImages/halfBloodPrince.jpg', 6, 607, 'J. K. Rowling', 'Bloomsbury Publishing', '2005', 'Set during Harry Potter\'s sixth year at Hogwarts, the novel explores the past of Harry\'s nemesis, Lord Voldemort, and Harry\'s preparations for the final battle against Voldemort alongside his headmaster and mentor Albus Dumbledore.', 0, 200, 'Harry Potter and the Half-Blood Prince J. K. Rowling 607 Bloomsbury Publishing 2005', 5, 'no'),
(62, '545010225', 'Harry Potter and the Deathly Hallows', '../uploadedBookImages/deathlyHallows.jpg', 6, 607, 'J. K. Rowling', 'Bloomsbury Publishing', '2007', 'Throughout the six previous novels in the series, the main character Harry Potter has struggled with the difficulties of adolescence along with being famous as the only person ever to survive the Killing Curse. The curse was cast by the evil Tom Riddle, better known as Lord Voldemort, a powerful evil wizard who murdered Harry\'s parents and attempted to kill Harry as a baby in the belief this would thwart a prophecy which claimed Harry would be able to stop him. As an orphan, Harry was placed in the care of his Muggle (non-magical) relatives Petunia Dursley and Vernon Dursley, who already had a son called Dudley Dursley.', 0, 200, 'Harry Potter and the Deathly Hallows J. K. Rowling 607 Bloomsbury Publishing 2007', 5, 'no'),
(63, '9780060276362', 'The Lion, the Witch and the Wardrobe', '../uploadedBookImages/theLion.jpg', 6, 208, 'C. S. Lewis', 'The Bodley Head', '1950', 'Peter, Susan, Edmund and Lucy Pevensie are evacuated from London in 1940 to escape the Blitz, and sent to live with Professor Digory Kirke at a large house in the English countryside. While exploring the house, Lucy enters a wardrobe and discovers the magical world of Narnia. Here, she meets the faun Mr. Tumnus, who invites her to his cave for tea and admits that he intended to report Lucy to the White Witch, the false ruler of Narnia who has kept the land in perpetual winter, but he repents and guides her back home. Although Lucy\'s siblings initially disbelieve her story of Narnia, Edmund follows her into the wardrobe and winds up in a separate area of Narnia and meets the White Witch.', 0, 200, 'The Lion, the Witch and the Wardrobe C. S. Lewis 208 The Bodley Head 1950', 5, 'no'),
(64, '9780006716792', 'Prince Caspian', '../uploadedBookImages/princeCaspian.jpg', 6, 195, 'C. S. Lewis', 'The Bodley Head', '1951', 'Prince Caspian features a \"return to Narnia\" by the four Pevensie children of the first novel, about a year later in England but 1300 years later in Narnia.', 0, 200, 'Prince Caspian C. S. Lewis 195 The Bodley Head 1951', 5, 'no'),
(65, '9780006716808', 'The Voyage of the Dawn Treader', '../uploadedBookImages/theVoyageOfTheDawn.jpg', 6, 223, 'C. S. Lewis', 'The Bodley Head', '1952', 'The two youngest Pevensie children, Lucy and Edmund, are staying with their odious cousin Eustace Scrubb while their older brother, Peter, is studying for an exam with Professor Kirke, and their older sister, Susan, is travelling through America with their parents. Edmund, Lucy, and Eustace are drawn into the Narnian world through a picture of a ship at sea.', 0, 200, 'The Voyage of the Dawn Treader C. S. Lewis 223 The Bodley Head 1952', 5, 'no'),
(66, '9780006716815', 'The Silver Chair', '../uploadedBookImages/theSilverChair.jpg', 6, 217, 'C. S. Lewis', 'The Bodley Head', '1953', 'The novel is set primarily in the world of Narnia, decades after The Voyage of the Dawn Treader there but less than a year later in England. King Caspian X is now an old man, but his son and only heir, Prince Rilian, is missing. Aslan the lion sends two children from England to Narnia on a mission to resolve the mystery: Eustace Scrubb, from The Voyage of the Dawn Treader, and his classmate, Jill Pole. In England, Eustace and Jill are students at a horrible boarding school, Experiment House.', 0, 200, 'The Silver Chair C. S. Lewis 217 The Bodley Head 1953', 5, 'no'),
(67, '9780006716785', 'The Horse and His Boy', '../uploadedBookImages/theHorseAndHisBoy.jpg', 6, 199, 'C. S. Lewis', 'The Bodley Head', '1954', 'The novel is set in the period covered by the last chapter of The Lion, the Witch, and the Wardrobe during the reign of the four Pevensie children as Kings and Queens of Narnia. Though three of the Pevensies appear as minor characters in The Horse and His Boy, the main characters are two children and two talking horses who escape from Calormen and travel north into Narnia. On their journey, they learn of the Prince of Calormen\'s plan to attack Archenland, and warn the King of Archenland of the impending strike.', 0, 200, 'The Horse and His Boy C. S. Lewis 199 The Bodley Head 1954', 5, 'no'),
(68, '9780006716839', 'The Magician\'s Nephew', '../uploadedBookImages/theMagiciansNephew.jpg', 6, 183, 'C. S. Lewis', 'The Bodley Head', '1955', 'The story begins in London during the summer of 1900. Two children, Digory and Polly, meet while playing in the adjacent gardens of a row of terraced houses. They decide to explore the attic connecting the houses, but take the wrong door and surprise Digory\'s Uncle Andrew in his study. Uncle Andrew tricks Polly into touching a yellow magic ring, causing her to vanish. Then he explains to Digory that he has been dabbling in magic, and that the rings allow travel between one world and another. He blackmails Digory into taking another yellow ring to follow wherever Polly has gone, and two green rings so that they both can return.', 0, 200, 'The Magician\'s Nephew C. S. Lewis 183 The Bodley Head 1955', 5, 'no'),
(69, '9780006716822', 'The Last Battle', '../uploadedBookImages/theLastBattle.jpg', 6, 184, 'C. S. Lewis', 'The Bodley Head', '1956', 'Narnia has had peace and prosperity since the reign of King Caspian X, but Roonwit the Centaur warns Tirian, the latest king of Narnia, that strange and evil things are happening to Narnia and that the stars portend ominous developments. Tirian and his friend Jewel the Unicorn hear word of the death of the Talking Trees and rashly set out to confront the danger, giving Roonwit instructions to go and gather a small army to join them.', 0, 200, 'The Last Battle C. S. Lewis 184 The Bodley Head 1956', 5, 'no'),
(70, '786856297', 'The Lightning Thief', '../uploadedBookImages/theLightningThief.jpg', 6, 377, 'Rick Riordan', 'Disney Hyperion', '2005', 'The Lightning Thief is narrated in the first person past tense by Percy Jackson, a twelve-year-old diagnosed with dyslexia and ADHD. While on a school trip to the Metropolitan Museum of Art, one of the chaperones, Mrs. Dodds, turns into a Fury and attacks him. Percy\'s favorite teacher, Mr. Brunner, lends Percy a magical sword-pen to defeat her.', 0, 200, 'The Lightning Thief Rick Riordan 377 Disney Hyperion 2005', 5, 'no'),
(71, '786856866', 'The Sea of Monsters', '../uploadedBookImages/theSeaOfMonsters.jpg', 6, 279, 'Rick Riordan', 'Disney Hyperion', '2006', 'It is the second novel in the Percy Jackson & the Olympians series and the sequel to The Lightning Thief. This book chronicles the adventures of thirteen-year-old demigod Percy Jackson as he and his friends rescue his satyr friend Grover from the Cyclops Polyphemus and save Camp Half-Blood from a Titan\'s attack by bringing the Golden Fleece to cure Thalia\'s poisoned pine tree.', 0, 200, 'The Sea of Monsters Rick Riordan 279 Disney Hyperion 2006', 5, 'no'),
(72, '9781423101451', 'The Titan\'s Curse', '../uploadedBookImages/theTitansCurse.jpg', 6, 312, 'Rick Riordan', 'Disney Hyperion', '2007', 'It was released on May 1, 2007, and is the third novel in the Percy Jackson & the Olympians series and the sequel to The Sea of Monsters. It is about the adventures of the 14-year-old demigod Percy Jackson as he and his friends go on a dangerous quest to rescue his 14-year-old demigod friend Annabeth Chase and the Greek goddess Artemis, who have both been kidnapped.', 0, 200, 'The Titan\'s Curse Rick Riordan 312 Disney Hyperion 2007', 5, 'no'),
(73, '9781423101468', 'The Battle of the Labyrinth', '../uploadedBookImages/theBattleOfTheLabyrinth.jpg', 6, 361, 'Rick Riordan', 'Disney Hyperion', '2008', 'The book follows the adventures of modern-day fifteen-year-old demigod Percy Jackson, the son of a mortal woman and the Greek god Poseidon. Percy and his friends Annabeth Chase, Grover Underwood, Rachel Dare and Tyson attempt to stop Luke Castellan and his army from invading Camp Half-Blood through Daedalus\'s labyrinth by trying to prevent the Ariadne\'s string from falling into his hands.', 0, 200, 'The Battle of the Labyrinth Rick Riordan 361 Disney Hyperion 2008', 5, 'no'),
(74, '9781423101475', 'The Last Olympian', '../uploadedBookImages/theLastOlympian.jpg', 6, 381, 'Rick Riordan', 'Disney Hyperion', '2009', 'The Last Olympian revolves around the demigod Percy Jackson as he leads his friends in a last stand to protect Mount Olympus.', 0, 200, 'The Last Olympian Rick Riordan 381 Disney Hyperion 2009', 5, 'no'),
(75, '9780439023528', 'The Hunger Games', '../uploadedBookImages/theHungerGames.jpg', 6, 374, 'Suzanne Collins', 'Scholastic', '2008', 'It is written in the voice of 16-year-old Katniss Everdeen, who lives in the future, post-apocalyptic nation of Panem in North America. The Capitol, a highly advanced metropolis, exercises political control over the rest of the nation. The Hunger Games is an annual event in which one boy and one girl aged 12–18 from each of the twelve districts surrounding the Capitol are selected by lottery to compete in a televised battle royale to the death.', 0, 200, 'The Hunger Games Suzanne Collins 374 Scholastic 2008', 5, 'no'),
(76, '9780545227247', 'Catching Fire', '../uploadedBookImages/catchingFire.jpg', 6, 391, 'Suzanne Collins', 'Scholastic', '2009', 'As the sequel to the 2008 bestseller The Hunger Games, it continues the story of Katniss Everdeen and the post-apocalyptic nation of Panem. Following the events of the previous novel, a rebellion against the oppressive Capitol has begun, and Katniss and fellow tribute Peeta Mellark are forced to return to the arena in a special edition of the Hunger Games.', 0, 200, 'Catching Fire Suzanne Collins 391 Scholastic 2009', 5, 'no'),
(77, '9780439023511', 'Mockingjay', '../uploadedBookImages/mockingjay.jpg', 6, 390, 'Suzanne Collins', 'Scholastic', '2010', 'It is chronologically the last installment of The Hunger Games series, following 2008\'s The Hunger Games and 2009\'s Catching Fire. The book continues the story of Katniss Everdeen, who agrees to unify the districts of Panem in a rebellion against the tyrannical Capitol.', 0, 200, 'Mockingjay Suzanne Collins 390 Scholastic 2010', 5, 'no'),
(78, '9780702300172', 'The Ballad of Songbirds and Snakes', '../uploadedBookImages/theBallad.jpg', 6, 517, 'Suzanne Collins', 'Scholastic', '2020', 'It is a spinoff and a prequel to The Hunger Games trilogy. It was released May 19, 2020, published by Scholastic. An audiobook of the novel read by American actor Santino Fontana was released simultaneously with the printed edition.', 0, 200, 'The Ballad of Songbirds and Snakes Suzanne Collins 517 Scholastic 2020', 5, 'no'),
(79, '1238671927', 'TEst Book', '../uploadedBookImages/Screenshot from 2020-09-21 01-24-28.png', 5, 200, 'abc', 'PQR publication ', '2013', 'askhabkd asdhgask asdhak', 0, 200, 'Test Book PQR publication ', 10, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `cartdetails`
--

CREATE TABLE `cartdetails` (
  `cartID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `genreID` int(11) NOT NULL,
  `genreName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genreID`, `genreName`) VALUES
(1, 'Fiction'),
(2, 'Novel'),
(3, 'Mythology'),
(4, 'Biography'),
(5, 'Crime'),
(6, 'Series');

-- --------------------------------------------------------

--
-- Table structure for table `googleuser`
--

CREATE TABLE `googleuser` (
  `googleID` varchar(100) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(500) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `dt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `googleuser`
--

INSERT INTO `googleuser` (`googleID`, `fname`, `lname`, `gender`, `email`, `phone`, `address`, `pincode`, `dt`) VALUES
('100072941530851720833', 'Shantanu', 'Tripathi', '', 'shantanutripathi96@gmail.com', '', '', '', '2020-09-18 10:15:19'),
('112337154954044251562', '46 Shantanu', 'Tripathi', '', 'shantanu.tripathi@xaviers.edu.in', '', '', '', '2020-09-18 10:16:56');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderDetailsID` int(11) NOT NULL,
  `orderID` varchar(50) NOT NULL,
  `product` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderDetailsID`, `orderID`, `product`, `qty`) VALUES
(1, 'order_Fj4FCWfL09lEnq', 21, 1),
(2, 'order_Fj4VOB1UFkAUN6', 9, 1),
(3, 'order_Fj4h0Bd10Y6CEO', 2, 1),
(4, 'order_Fj5CeNsKfkkyiw', 23, 4),
(5, 'order_Fj5CeNsKfkkyiw', 12, 1),
(6, '5636175', 12, 1),
(7, 'order_Fj5x4Prqwk6VBO', 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` varchar(50) NOT NULL,
  `orderedBy` int(11) NOT NULL,
  `orderStatus` varchar(50) NOT NULL,
  `totalAmount` int(11) NOT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deliveryDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `orderedBy`, `orderStatus`, `totalAmount`, `orderDate`, `deliveryDate`) VALUES
('5636175', 30, 'Delivered', 200, '2020-09-30 03:37:40', '2020-09-30 09:04:56'),
('order_Fj4CgnaktQRLXX', 30, 'Ordered', 1000, '2020-09-30 01:53:48', '2020-09-30 07:23:48'),
('order_Fj4FCWfL09lEnq', 30, 'Delivered', 1000, '2020-09-30 03:16:50', '2020-09-30 07:26:08'),
('order_Fj4h0Bd10Y6CEO', 30, 'Delivered', 200, '2020-09-30 03:14:00', '2020-09-30 07:52:26'),
('order_Fj4VOB1UFkAUN6', 30, 'Delivered', 1000, '2020-09-30 03:06:01', '2020-09-30 07:41:21'),
('order_Fj5CeNsKfkkyiw', 30, 'Cancelled', 1000, '2020-09-30 03:02:14', '2020-09-30 08:22:28'),
('order_Fj5x4Prqwk6VBO', 30, 'Ordered', 200, '2020-09-30 03:36:30', '2020-09-30 09:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `paymentdetails`
--

CREATE TABLE `paymentdetails` (
  `paymentID` varchar(40) NOT NULL,
  `paymentMode` int(11) NOT NULL,
  `orderId` varchar(50) NOT NULL,
  `paymentStatus` varchar(50) NOT NULL,
  `totalAmount` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymentdetails`
--

INSERT INTO `paymentdetails` (`paymentID`, `paymentMode`, `orderId`, `paymentStatus`, `totalAmount`) VALUES
('12', 1, '5636175', 'Pending', 200),
('21', 2, 'order_Fj5x4Prqwk6VBO', 'Success', 200),
('pay_Fj5CmuTjc5RN2p', 2, 'order_Fj5CeNsKfkkyiw', 'Success', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `paymentmode`
--

CREATE TABLE `paymentmode` (
  `paymentModeID` int(11) NOT NULL,
  `modeName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymentmode`
--

INSERT INTO `paymentmode` (`paymentModeID`, `modeName`) VALUES
(1, 'Online'),
(2, 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `reset_tokens`
--

CREATE TABLE `reset_tokens` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(500) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reset_tokens`
--

INSERT INTO `reset_tokens` (`id`, `email`, `token`, `createdon`) VALUES
(4, 'shantanutripathi96@gmail.com', '9ad0e7144d975a7a0ffb5bddaa61a641799e160c77b3abba8bb91a82354b3076', '2020-09-25 04:28:11');

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `returnID` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `returnStatus` varchar(10) NOT NULL,
  `refundStatus` varchar(10) NOT NULL,
  `paymentDetails` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usernotification`
--

CREATE TABLE `usernotification` (
  `notificationID` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `notificationStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `userReviews`
--

CREATE TABLE `userReviews` (
  `reviewID` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `bookId` int(11) NOT NULL,
  `review` varchar(500) NOT NULL,
  `rating` float NOT NULL,
  `addedOn` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userReviews`
--

INSERT INTO `userReviews` (`reviewID`, `userId`, `bookId`, `review`, `rating`, `addedOn`) VALUES
(1, 30, 40, 'Nice book', 4, '2020-09-28 18:16:04'),
(6, 31, 46, 'Mystery Unfolds', 4.5, '2020-09-28 18:27:31'),
(7, 30, 51, 'Nice Book', 4.5, '2020-09-29 07:01:07'),
(8, 31, 51, 'Very very nice book', 5, '2020-09-29 07:02:30'),
(9, 32, 51, 'Not so good.', 2, '2020-09-29 07:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `pincode` varchar(6) NOT NULL,
  `dt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `type`, `fname`, `lname`, `gender`, `pass`, `email`, `phone`, `address`, `pincode`, `dt`) VALUES
(30, 'normal', 'Shantanu', 'Tripathi', 'female', 'admin', 'shantanutripathi96@gmail.com', '1234567890', 'A/106,Dorgamata apt, Laxmi nagr, Virar road, Nallasopara East', '401209', '2020-09-25'),
(31, 'normal', 'Vivek', 'Singh', 'Male', 'test', 'viveksingh@gmail.com', '12412', ', , ', '', '2020-09-25'),
(32, 'normal', '$fname', '$lname', '$gender', 'test', '$email', '$number', '$address', '$posta', '2020-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE `user_sessions` (
  `sessionID` varchar(50) NOT NULL,
  `sessionEmail` varchar(100) DEFAULT NULL,
  `sessionStartTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sessions`
--

INSERT INTO `user_sessions` (`sessionID`, `sessionEmail`, `sessionStartTime`) VALUES
('6c1909692b5ce22376ff', 'viveksingh@gmail.com', '2020-09-29 12:23:36'),
('bcc7a684a2ebb8b464f4', 'shantanutripathi96@gmail.com', '2020-09-30 01:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlistID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`wishlistID`, `productID`, `userID`) VALUES
(2, 9, 30),
(3, 12, 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `adminnotification`
--
ALTER TABLE `adminnotification`
  ADD KEY `from` (`from`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookID`),
  ADD KEY `books_fk0` (`genre`);

--
-- Indexes for table `cartdetails`
--
ALTER TABLE `cartdetails`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `cartDetails_fk1` (`productID`),
  ADD KEY `userID foreign` (`userID`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genreID`);

--
-- Indexes for table `googleuser`
--
ALTER TABLE `googleuser`
  ADD PRIMARY KEY (`googleID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orderDetailsID`),
  ADD KEY `orderDetails_fk0` (`orderID`),
  ADD KEY `orderDetails_fk1` (`product`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `orders_fk0` (`orderedBy`);

--
-- Indexes for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `paymentDetails_fk0` (`paymentMode`),
  ADD KEY `paymentDetails_fk1` (`orderId`);

--
-- Indexes for table `paymentmode`
--
ALTER TABLE `paymentmode`
  ADD PRIMARY KEY (`paymentModeID`);

--
-- Indexes for table `reset_tokens`
--
ALTER TABLE `reset_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`returnID`),
  ADD KEY `returns_fk0` (`orderId`),
  ADD KEY `returns_fk1` (`paymentDetails`);

--
-- Indexes for table `usernotification`
--
ALTER TABLE `usernotification`
  ADD KEY `to` (`to`);

--
-- Indexes for table `userReviews`
--
ALTER TABLE `userReviews`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `book_foreignkey` (`bookId`),
  ADD KEY `user_foreignkey` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`sessionID`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlistID`),
  ADD KEY `wishlist_fk0` (`wishlistID`),
  ADD KEY `wishlist_fk1` (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `cartdetails`
--
ALTER TABLE `cartdetails`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genreID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `orderDetailsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `paymentmode`
--
ALTER TABLE `paymentmode`
  MODIFY `paymentModeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `userReviews`
--
ALTER TABLE `userReviews`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cartdetails`
--
ALTER TABLE `cartdetails`
  ADD CONSTRAINT `userID foreign` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `userReviews`
--
ALTER TABLE `userReviews`
  ADD CONSTRAINT `book_foreignkey` FOREIGN KEY (`bookId`) REFERENCES `books` (`bookID`),
  ADD CONSTRAINT `user_foreignkey` FOREIGN KEY (`userId`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
