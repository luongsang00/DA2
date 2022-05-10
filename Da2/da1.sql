-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 20, 2021 lúc 05:52 AM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `da1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(200) NOT NULL,
  `adminUser` varchar(255) NOT NULL,
  `adminPass` varchar(255) NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(1, 'Lương Sang', 'luongtiensang1999@gmailcom', 'SangAdmin', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `sId` varchar(255) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `quantily` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `productId`, `sId`, `productName`, `price`, `quantily`, `image`) VALUES
(38, 17, '8ojm91hcckkv6dqblag3kbsnhc', 'Combo Doraemon Plus (Trọn Bộ 6 Tập) - Phiên Bản Bìa Gập', 86, 1, 'e49dc8255e.jpg'),
(39, 17, '6qbrv7l6v7rhedq50p6l4leb7f', 'Combo Doraemon Plus (Trọn Bộ 6 Tập) - Phiên Bản Bìa Gập', 86, 1, 'e49dc8255e.jpg'),
(70, 9, '1hgmf0dtgg9520hdinh6qg1tho', 'Diary Of A Wimpy Kids T9 - Paperback', 138000, 1, '3e3e8e095d.jpg'),
(72, 17, 'cujdqghnsrdbo0rh6af2m0d4mc', 'Combo Doraemon Plus (Trọn Bộ 6 Tập) - Phiên Bản Bìa Gập', 86000, 1, 'e49dc8255e.jpg'),
(73, 17, 'cujdqghnsrdbo0rh6af2m0d4mc', 'Combo Doraemon Plus (Trọn Bộ 6 Tập) - Phiên Bản Bìa Gập', 86000, 1, 'e49dc8255e.jpg'),
(74, 8, 'cujdqghnsrdbo0rh6af2m0d4mc', 'Harry Potter 7 Volume ChildrenS Paperback Boxed Set', 1716000, 1, '5384f8766e.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(3, 'Sách trong nước'),
(4, 'Truyện - Tiểu thuyết'),
(5, 'Sách kinh tế'),
(6, 'Sách thiểu nhi'),
(7, 'Kỹ năng sống'),
(11, 'Sách nước ngoài'),
(12, 'Kinh dị'),
(18, 'Sách chuyên ngành'),
(19, 'Sách nuôi dạy con'),
(20, 'Sách kỹ năng'),
(21, 'Sách cho tuổi mới lớn'),
(22, 'Sách thưởng thức - đời sống'),
(23, 'Truyện tranh manga'),
(24, 'Sách văn hóa - nghệ thuật- du lịch'),
(25, 'Tạp chí'),
(26, 'Hài hước - truyện cười'),
(27, 'Văn học Việt Nam'),
(28, 'Huyền bí - giả tưởng'),
(29, 'Văn học nước ngoài'),
(30, 'Thơ'),
(31, 'Tiểu thuyết tình cảm'),
(32, 'Ngôn tình'),
(33, 'Truyện kiếm hiệp phiêu lưu'),
(34, 'Tiểu thuyết tình cảm'),
(36, 'Sách tiếng anh'),
(37, 'Truyện tranh manga'),
(38, 'Trinh thám');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `commentName` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `commentName`, `comment`, `product_id`, `blog_id`, `image`) VALUES
(4, 'sang', 'sách thật là hữu ích, hay mọi người nên đọc', 17, 0, ''),
(5, 'sang', 'hay', 17, 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zipcode` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `country`, `zipcode`, `phone`, `email`, `password`) VALUES
(2, 'Lương Tiến Sang', 'Sài Gòn', 'Hồ Chí Minh', 'null', '5454', '0356818597', 'luongtiensang1999@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'Lương Sang 11', 'Sài Gòn', 'Hồ Chí Minh', 'null', '5454', '0356818597', 'luongtiensang@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantily` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `productId`, `productName`, `customer_id`, `quantily`, `price`, `image`, `status`, `date_order`) VALUES
(41, 9, 'Diary Of A Wimpy Kids T9 - Paperback', 2, 1, '138000', '3e3e8e095d.jpg', 2, '2021-12-19 06:24:42'),
(42, 19, 'Tình Yêu Cuồng Nhiệt', 2, 1, '38000', 'fe134a4b6f.jpg', 1, '2021-12-19 06:28:01'),
(43, 20, 'Truyện Tranh Tiếu Lâm Việt Nam (Tập 1)', 2, 1, '27000', '8688703d03.jpg', 0, '2021-12-19 06:28:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `catId` int(11) NOT NULL,
  `publishingId` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `catId`, `publishingId`, `product_desc`, `author`, `price`, `image`, `type`) VALUES
(8, 'Harry Potter 7 Volume ChildrenS Paperback Boxed Set', 36, 11, '<p><span>A beautiful boxed set containing all seven Harry Potter novels in paperback. These new editions of the classic and internationally bestselling, multi-award-winning series feature instantly pick-up-able new jackets by Jonny Duddle, with huge child appeal, to bring Harry Potter to the next generation of readers. It\'s time to PASS THE MAGIC ON ...</span></p>', 'J. K. Rowling', '1716000', '5384f8766e.png', 1),
(9, 'Diary Of A Wimpy Kids T9 - Paperback', 36, 10, '<p><span>A family road trip is supposed to be a lot of fun... unless, of course, you&rsquo;re the Heffleys.</span><br /><br /><span>The journey starts off full of promise, then quickly takes several wrong turns. Petrol-station bathrooms, crazed seagulls, a fender bender and a runaway pig - not exactly Greg Heffley&rsquo;s idea of a good time. But even the worst road trip can turn into an adventure - and this is one the Heffleys won&rsquo;t soon forget.</span></p>', 'Jeff Kinney', '138000', '3e3e8e095d.jpg', 1),
(10, 'Diary Of A Wimpy Kid: Old School (Paperback)', 36, 12, '<p>That&rsquo;s the question Greg Heffley is asking as his town voluntarily unplugs and goes electronics-free. But modern life has its conveniences, and Greg isn&rsquo;t cut out for an old-fashioned world.</p>\r\n<p>With tension building inside and outside the Heffley home, will Greg find a way to survive? Or is going &ldquo;old school&rdquo; just too hard for a kid like Greg?</p>', 'Jeff Kinney', '308000', 'f0782cac52.jpg', 1),
(11, 'Diary Of A Wimpy Kid Box Of Books 1 - 10', 36, 12, '<p>The first eight books in the bestselling Diary of a Wimpy Kid series are now available together in a collectible boxed set. Included are:</p>\r\n<p>- Diary of a wimpy kid</p>\r\n<p>- Do It yourself book</p>\r\n<p>- The long haul</p>\r\n<p>- Hard luck</p>\r\n<p>- The third wheel</p>\r\n<p>- Cabin fever</p>\r\n<p>- The urly truth</p>\r\n<p>- Dog days</p>\r\n<p>- The last straw</p>\r\n<p>- Rodrich rules</p>', 'Jeff Kinney', '1046000', 'aff896aed2.jpg', 0),
(12, 'The Read It Yourself With Ladybird Princess And the Frog', 36, 13, '<p>A kind frog helps a princess and she makes him a promise. What happens when the king tells her that she has keep her promise? Read it yourself with Ladybird is one of Ladybird\'s best-selling reading series. For over thirty-five years it has helped young children who are learning to read develop and improve their reading skills.</p>\r\n<p>Each Read it yourself book is very carefully written to include many key, high-frequency words that are vital for learning to read, as well as a limitednumber of story words that are introduced and practised throughout. Simple sentences and frequently repeated words help to build the confidence of beginner readers and the four different levels of books support children all the way from very first reading practice through to independent, fluent reading. Each book has been carefully checked by educational consultants and can be read independently at home or used in a guided reading session at school. Further content includes comprehension puzzles, helpful notes for parents, carers and teachers, and book band information for use in schools. The Princess and the Frog is a Level 2 Read it yourself book, ideal for children who have received some initial reading instruction and can read short, simple sentences with help.</p>', 'Ladybird Ladybird', '78000', 'ef79e8fac6.jpg', 0),
(13, '  Share  Tweet  Plus The Tale of Jemima Puddle - Duck', 36, 13, '<p><span>A gentle adaptation of the classic tale by Beatrix Potter. Jemima Puddle-Duck wants to lay and hatch her own eggs, so she sets off to find a safe spot in the woods to make a nest. But she meets an unusual gentleman who has other plans for Jemima!</span><br /><br /><span>Read it yourself with Ladybird is one of Ladybird\'s best-selling series. For over thirty-five years it has helped young children who are learning to read develop and improve their reading skills.</span><br /><br /><span>Each Read it yourself book is very carefully written to include many key, high-frequency words that are vital for learning to read, as well as a limited number of story words that are introduced and practised throughout. Simple sentences and frequently repeated words help to build the confidence of beginner readers and the four different levels of books support children all the way from very first reading practice through to independent, fluent reading.</span><br /><br /><span>Each book has been carefully checked by educational consultants and can be read independently at home or used in a guided reading session at school. Further content includes comprehension puzzles, helpful notes for parents, carers and teachers, and book band information for use in schools.</span><br /><br /><span>The Tale of Jemima Puddle-Duck is a Level 2 Read it yourself title, ideal for children who have received some initial reading instruction and can read short, simple sentences with help.</span></p>', 'Ladybird Ladybird', '78000', 'dac5bdb305.jpg', 0),
(14, '  Share  Tweet  Plus Read It Yourself With Ladybird Superhero Max', 36, 13, '<p>Superhero Max Max is an ordinary boy, but he is also Swooperman, a superhero! When the baddies take his swoop boots, can he stop them from robbing the bank?&nbsp;<span>Read it yourself with Ladybird</span>&nbsp;is one of Ladybird\'s best-selling reading series. For over thirty-five years it has helped young children who are learning to read develop and improve their reading skills. Each Read it yourself book is very carefully written to include many key, high-frequency words that are vital for learning to read, as well as a limited number of story words that are introduced and practised throughout.</p>\r\n<p>Simple sentences and frequently repeated words help to build the confidence of beginner readers and the four different levels of books support children all the way from very first reading practice through to independent, fluent reading. There are more than ninety titles in the Read it yourself series, ranging from classic fairy tales and traditional world stories to favourite children\'s brands such as Peppa Pig, Angry Birds and Peter Rabbit. All-new, first reference titles complete the range, with information books about favourite subjects that even the most reluctant readers will enjoy.</p>\r\n<p>Each book has been carefully checked by educational consultants and can be read independently at home or used in a guided reading session at school. Further content includes comprehension questions or puzzles, helpful notes for parents, carers and teachers, and book band information for use in schools.</p>\r\n<p>Superhero Max is a Level 2 Read it yourself book, ideal for children who have received some initial reading instruction and can read short, simple sentences with help.</p>', 'Ladybird Ladybird', '78000', '2eb630eb04.jpg', 0),
(15, 'Read It Yourself the Gingerbread Man', 36, 13, '<p><span>\"The Gingerbread Man\" is a brilliant fun tale to read over and over again. This is a Level Two title for beginner readers who can read short simple sentences with help.</span></p>', 'Ladybird Ladybird', '78000', 'ff510feb1c.jpg', 0),
(16, 'Những Chấn Thương Tâm Lý Hiện Đại', 5, 6, '<p><em>\"Hồi c&ograve;n thời bao cấp, t&ocirc;i thường h&igrave;nh dung c&aacute;i vội của d&acirc;n m&igrave;nh như người c&oacute; c&aacute;i xe đạp đ&atilde; t&agrave;ng đ&atilde; cũ, cứ phải rướn cổ c&ograve; m&agrave; đạp tr&ecirc;n con đường qu&ecirc; gồ ghề. C&ograve;n ng&agrave;y nay thường đến với t&ocirc;i l&agrave; h&igrave;nh ảnh những người đi xe m&aacute;y rồ ga c&ograve;i b&oacute;p inh ỏi, đưa xe l&ecirc;n cả vỉa h&egrave;, nhưng chẳng để l&agrave;m g&igrave; ngo&agrave;i việc lăn từ đ&aacute;m tắc đường n&agrave;y sang đ&aacute;m tắc đường kh&aacute;c. M&agrave; cả th&agrave;nh phố th&igrave; tr&igrave; trệ &igrave; ạch, dấu hiệu c&ograve;n lại của thời buổi kinh tế thị trường chỉ l&agrave; một sự nhốn nh&aacute;o.\"</em><br /><br /><span>Nh&agrave; ph&ecirc; b&igrave;nh Vương Tr&iacute; Nh&agrave;n đi nhiều, đọc nhiều v&agrave; chưa bao giờ th&ocirc;i quan s&aacute;t những chuyển động kh&ocirc;ng ngừng trong cuộc sống thường nhật. Từ h&agrave;nh động của một nh&acirc;n vật trong trang s&aacute;ch của Nam Cao, cho đến lời n&oacute;i của một anh x&iacute;ch l&ocirc; tr&ecirc;n phố đều c&oacute; thể trở th&agrave;nh chất liệu cho &ocirc;ng đặt ra những c&acirc;u hỏi thiết thực về x&atilde; hội đương đại: Ch&uacute;ng ta đang sống như thế n&agrave;o? Người d&acirc;n m&igrave;nh c&oacute; tiền th&igrave; l&agrave;m g&igrave;? Tại sao lại c&oacute; c&aacute;i t&igrave;nh trạng nh&acirc;n thế như ch&uacute;ng ta đang thấy?</span><br /><br /><span>Những Chấn Thương T&acirc;m L&yacute; Hiện Đại</span><span>&nbsp;đ&aacute;nh dấu sự trở lại đầy bất ngờ của thể loại phiếm luận, của một ng&ograve;i b&uacute;t sắc sảo, v&agrave; hơn hết l&agrave; của một bữa tiệc văn h&oacute;a đa dạng m&agrave; kh&aacute;ch mời kh&ocirc;ng phải ai kh&aacute;c ch&iacute;nh l&agrave; cuộc sống.</span></p>', 'Vương Trí Nhàn', '45000', '72fa1c18f9.jpg', 1),
(17, 'Combo Doraemon Plus (Trọn Bộ 6 Tập) - Phiên Bản Bìa Gập', 6, 9, '<p>D&ugrave; bạn c&oacute; l&agrave; ai, c&oacute; đọc bao nhi&ecirc;u lần th&igrave; vẫn thấy th&uacute; vị!! Vượt qua thời gian, vượt qua thế hệ, đ&acirc;y l&agrave; danh t&aacute;c lu&ocirc;n được y&ecirc;u qu&yacute; v&agrave; đ&oacute;n nhận!!&nbsp;<span>Doraemon Plus</span>&nbsp;l&agrave; tuyển tập những truyện ngắn về Doraemon v&agrave; c&aacute;c bạn của t&aacute;c giả Fujiko F Fujio từng được đăng rải r&aacute;c tr&ecirc;n c&aacute;c tạp ch&iacute; học tập Nhật Bản.<br /><br /><span>Doraemon Plus</span>&nbsp;tập hợp những truyện ngắn chưa từng c&oacute; trong bộ truyện Doraemon 45 tập đ&atilde; rất quen thuộc với tất cả ch&uacute;ng ta. Đặc biệt&nbsp;<span>Doraemon Plus</span>&nbsp;tập 6 c&ograve;n giới thiệu 21 truyện ngắn cực k&igrave; hấp dẫn v&agrave; chưa từng được c&ocirc;ng bố!</p>\r\n<p><span>Doraemon Plus</span>&nbsp;phi&ecirc;n bản b&igrave;a gập, chất liệu giấy thường, trọng lượng nhẹ.<br /><br />Combo Doraemon Plus gồm 6 tập:<br /><br />Doraemon Plus (Tập 1)<br /><br />Doraemon Plus (Tập 2)<br /><br />Doraemon Plus (Tập 3)<br /><br />Doraemon Plus (Tập 4)<br /><br />Doraemon Plus (Tập 5)<br /><br />Doraemon Plus (Tập 6).</p>', 'Fujiko.F.Fujio', '86000', 'e49dc8255e.jpg', 0),
(19, 'Tình Yêu Cuồng Nhiệt', 21, 1, '<p><span>T&igrave;nh Y&ecirc;u Cuồng Nhiệt</span>&nbsp;c&oacute; lối viết truyện rất duy&ecirc;n: c&acirc;u chuyện cứ dần d&agrave; được kể v&agrave; người đọc sẽ lu&ocirc;n bất ngờ khi c&acirc;u chuyện kết th&uacute;c. Tiếng cười trong c&aacute;c t&aacute;c phẩm của &ocirc;ng nhẹ nh&agrave;ng m&agrave; th&acirc;m thu&yacute;, khơi gợi cho đọc giả nhiều suy ngẫm về cuộc đời, về số phận con người...</p>\r\n<p><span>T&igrave;nh y&ecirc;u cuồng nhiệt&nbsp;</span>gồm 26 truyện h&agrave;i hước của&nbsp;<span>Azit Nexin</span>&nbsp;hẳn sẽ mang lại những tiếng cười</p>', 'Aziz Nesin', '38000', 'fe134a4b6f.jpg', 0),
(20, 'Truyện Tranh Tiếu Lâm Việt Nam (Tập 1)', 26, 1, '<p>Kho t&agrave;ng truyện cười Việt Nam hết sức phong ph&uacute;, đa dạng. C&oacute; tiếng cười ch&acirc;m biếm s&acirc;u cay, c&oacute; tiếng cười tr&agrave;o lộng sảng kho&aacute;i, c&oacute; tiếng cười đả k&iacute;ch mạnh mẽ, c&oacute; tiếng cười th&acirc;m th&uacute;y nhẹ nh&agrave;ng. Tiếng cười v&igrave; thế được xem như một \"phương thức giải tỏa tinh thần\" trong đời sống h&agrave;ng ng&agrave;y của người lao động. Hơn thế nữa, đ&oacute; c&ograve;n l&agrave; kinh nghiệm, tr&iacute; tuệ d&acirc;n gian được đ&uacute;c kết qua nhiều thế hệ. Bởi lẽ, tiếng cười kh&ocirc;ng hẳn để \"mua vui\" m&agrave; c&ograve;n ẩn chứa nhiều &yacute; nghĩa về c&aacute;ch đối nh&acirc;n xử thế, gi&aacute; trị đạo đức truyền thống...</p>\r\n<p>Cuốn s&aacute;ch&nbsp;<span>Truyện tranh tiếu l&acirc;m Việt Nam (Tập 1) t</span>ập hợp những c&acirc;u chuyện h&agrave;i hước th&uacute; vị: Ba anh đầy tớ, C&oacute; con giun đất, thơ con c&oacute;c, Thơm rồi lại thối... Phần tranh minh họa sinh động sẽ l&agrave;m cho c&acirc;u chuyện th&ecirc;m phần hấp dẫn cuốn h&uacute;t.</p>', 'Anh Phương', '27000', '8688703d03.jpg', 0),
(21, 'Ma Thổi Đèn: Thần Cung Côn Luân (Tái Bản 2014)', 12, 1, '<p>Mộc trần ch&acirc;u đ&atilde; c&oacute; trong tay, nhưng l&agrave;m thế n&agrave;o hiểu được b&iacute; mật ẩn chứa trong đ&oacute;? Mọi manh mối đều hướng về v&ugrave;ng tuyết phủ T&acirc;y Tạng. Bất ngờ thay, một tay bu&ocirc;n đồ cổ Hồng K&ocirc;ng l&agrave; Minh Th&uacute;c muốn t&igrave;m x&aacute;c thủy tinh ở s&ocirc;ng băng của Ma quốc trong truyền thuyết \"Vua Kelamer\", đ&atilde; thu&ecirc; ba vị M&ocirc; kim Hiệu &uacute;y c&ugrave;ng v&agrave;o đất Tạng kiếm t&igrave;m.</p>\r\n<p>Cả đo&agrave;n ch&iacute;n người tiến v&agrave;o v&ugrave;ng đất khởi nguy&ecirc;n của văn minh Thanh Tạng, nơi di chỉ vương quốc Kelamer đ&atilde; biến mất một c&aacute;ch thần b&iacute; từ hơn 300 năm trước, để t&igrave;m mắt bạc Kuge, bởi tương truyền đ&oacute; ch&iacute;nh l&agrave; vật định vị địa l&yacute; tr&ecirc;n đất Tạng m&agrave; căn cứ v&agrave;o đ&oacute; c&oacute; thể đo&aacute;n định vị tr&iacute; của x&aacute;c thủy tinh, v&agrave; t&igrave;m ra lời giải đ&aacute;p về Mộc trần ch&acirc;u.</p>\r\n<p>Bao nguy hiểm r&igrave;nh rập bước ch&acirc;n đo&agrave;n th&aacute;m hiểm, rồi c&aacute;i chết của lần lượt từng th&agrave;nh vi&ecirc;n, v&agrave; hy vọng cuối c&ugrave;ng ở cơ mưu của đệ nhất M&ocirc; kim Hiệu &uacute;y Hồ B&aacute;t Nhất...</p>\r\n<p><span>Thần Cung C&ocirc;n Lu&acirc;n</span>&nbsp;- Lời giải cuối c&ugrave;ng cho b&iacute; mật con mắt Quỷ động v&agrave; t&acirc;m nguyện của những kẻ trộm mộ.</p>', 'Thiên Hạ Bá Xướng', '90000', '5c8083286c.jpg', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_publishing`
--

CREATE TABLE `tbl_publishing` (
  `publishingId` int(11) NOT NULL,
  `publishingName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_publishing`
--

INSERT INTO `tbl_publishing` (`publishingId`, `publishingName`) VALUES
(1, 'NXB Văn Học'),
(2, 'NXB Dân Trí'),
(3, 'NXB Lao Động'),
(4, 'NXB Trẻ'),
(5, 'NXB Văn Hóa - Văn Nghệ'),
(6, 'NXB Thời Đại'),
(7, 'NXB Chính Trị  - Quốc Gia'),
(8, 'NXB Văn Hóa - Thông Tin'),
(9, 'NXB Kim Đồng'),
(10, 'Penguin Books'),
(11, 'Bloombury'),
(12, 'Amulet'),
(13, 'Amazon'),
(14, 'NXB Hội Nhà Văn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `sliderId` int(11) NOT NULL,
  `sliderName` varchar(255) NOT NULL,
  `slider_image` varchar(255) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`sliderId`, `sliderName`, `slider_image`, `type`) VALUES
(1, 'slider 1', '648c768c98.jpg', 0),
(3, 'slider 2', 'e86400f89b.jpg', 0),
(4, 'slider 3', 'e06433cd8f.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`id`, `customer_id`, `productId`, `productName`, `price`, `image`) VALUES
(7, 0, 10, 'Diary Of A Wimpy Kid: Old School (Paperback)', '308000', 'f0782cac52.jpg'),
(10, 2, 17, 'Combo Doraemon Plus (Trọn Bộ 6 Tập) - Phiên Bản Bìa Gập', '86000', 'e49dc8255e.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Chỉ mục cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Chỉ mục cho bảng `tbl_publishing`
--
ALTER TABLE `tbl_publishing`
  ADD PRIMARY KEY (`publishingId`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`sliderId`);

--
-- Chỉ mục cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `tbl_publishing`
--
ALTER TABLE `tbl_publishing`
  MODIFY `publishingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `sliderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
