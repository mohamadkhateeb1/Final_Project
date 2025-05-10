-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10 مايو 2025 الساعة 20:40
-- إصدار الخادم: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- بنية الجدول `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `description`, `image`, `section`) VALUES
(15, 'ASUS ROG Zephyrus M16', 1500.00, 'عندما يتعلق الأمر بالبحث عن أفضل لاب توب في البرامج الهندسية لعام 2025 ، فإن جهاز ASUS ROG Zephyrus M16 يتصدر القائمة بلا منازع. هذا الجهاز ليس مجرد لاب توب ألعاب فائق القوة فحسب، بل هو أيضًا أداة قوية ومتكاملة لتلبية جميع احتياجات المهندسين المحترفين وطلاب الهندسة. يحتوي الجهاز على معالج Intel Core I9-13900H من الجيل الأحدث،', 'imege/5260405373989417809.jpg', 'laptop'),
(22, 'TUF FX506HF-HN018', 825.00, 'cpu مواصفات المعالج : i5-11400H  جيل المعالج جيل المعالج : الحادي عشر  ram مواصفات الرام : 16G  التخزين : 512GB SSD  الشاشة : 15.6FHD144Hz  كرت الشاشة مواصفات كرت الشاشة : NVIDIA® RTX 2050 4GB  كرت الشاشة مواصفات نمط كرت الشاشة : منفصل  الكيبورد : RGB BACKLIT  البطارية : 2-4H  السواقة مواصفات السواقة : بدون  يدعم اللمس مواصفات بصمة الأصبع: لا يدعم', 'imege/TUF.jpg', 'laptop'),
(23, 'Asus Vivobook Pro 14 OLED K3400PH-OLED005W Creator Laptop', 670.00, 'cpu مواصفات المعالج : Intel Core i5-11300H  جيل المعالج جيل المعالج : الحادي عشر  ram مواصفات الرام : 8GB DDR5  التخزين : 512GB SSD  الشاشة : 14 Inch 2.8K (2880x1800) OLED 90Hz  كرت الشاشة مواصفات كرت الشاشة : NVIDIA GeForce GTX 1650 4GB  كرت الشاشة مواصفات نمط كرت الشاشة : منفصل  الكيبورد : yas  البطارية : 2-4H  السواقة مواصفات السواقة : بدون  يدعم اللمس مواصفات بصمة الأصبع: لا يدعم', 'imege/Asus Vivobook Pro 14 OLED K3400PH-OLED005W Creator Laptop.jpg', 'laptop'),
(24, 'ASUS ROG STRIX G513RM-WS74', 1225.00, 'cpu مواصفات المعالج : AMD Ryzen™ 7 6800H  الرام : 16G  التخزين : 1T SSD  الشاشة : 15.6\" (2560x1440) *WQHD 165Hz 2K SRGB100% IPS  كرت الشاشة مواصفات كرت الشاشة : NVIDIA® RTX 3060 6GB  كرت الشاشة مواصفات نمط كرت الشاشة : منفصل  الكيبورد :  البطارية : 2-4H  السواقة مواصفات السواقة : بدون  يدعم اللمس مواصفات بصمة الأصبع: لا يدعم', 'imege/ROG STRIX G513RM-WS74.png', 'laptop'),
(25, 'MSI', 800.00, 'cpu مواصفات المعالج : i7-12650H  جيل المعالج جيل المعالج : 12  ram مواصفات الرام : 16GB DDR5  التخزين : 512GB SSD  الشاشة : 15.6 FHD (1920x1080) 144Hz  كرت الشاشة مواصفات كرت الشاشة : NVIDIA GeForce RTX 3050 4G GDDR6  كرت الشاشة مواصفات نمط كرت الشاشة : منفصل  الكيبورد : Backlight  البطارية : 3-4  السواقة مواصفات السواقة : بدون  يدعم اللمس مواصفات بصمة الأصبع: لا يدعم', 'imege/MSi.webp', 'laptop'),
(26, 'HP VICTUS 16-S1023', 1275.00, 'cpu مواصفات المعالج : AMD Ryzen™ 7 8845HS  جيل المعالج جيل المعالج :  ram مواصفات الرام : 16GB DDR5  التخزين : 512GB SSD  الشاشة : 16.1\" FHD (1920x1080) 144Hz  كرت الشاشة مواصفات كرت الشاشة : NVIDIA RTX 4070 8 GB GDDR6  كرت الشاشة مواصفات نمط كرت الشاشة : منفصل  الكيبورد : Backlit Keyboard  البطارية : 2-4H  السواقة مواصفات السواقة : بدون  يدعم اللمس مواصفات بصمة الأصبع: لا يدعم', 'imege/VICTUS 16-S1023.jpg', 'laptop'),
(27, 'ASUS ROG STRIX G18 G814JIR-N6136', 2600.00, 'cpu مواصفات المعالج : i9-14900HX  جيل المعالج جيل المعالج : الرابع عشر  ram مواصفات الرام : 32G DDR5-5600MHZ  التخزين : 1TB PCIe 4.0 SSD  الشاشة : 18QHD+/2560x1600 IPS 240HZ  كرت الشاشة مواصفات كرت الشاشة : NVIDIA RTX 4070 8 GB GDDR6 140W TGP  كرت الشاشة مواصفات نمط كرت الشاشة : منفصل  الكيبورد : RGB PER KEY  البطارية : 2-4H  السواقة مواصفات السواقة : بدون  يدعم اللمس مواصفات بصمة الأصبع: لا يدعم', 'imege/ROG STRIX G18 G814JIR-N6136.jpg', 'laptop'),
(28, 'ASUS TUF F15 FX507ZC4 Gaming Laptop', 970.00, 'cpu مواصفات المعالج : Intel Core i7-12700H  جيل المعالج جيل المعالج : الثاني عشر  ram مواصفات الرام : 16GB DDR5  التخزين : 512GB SSD  الشاشة : 15.6.FHD (1920x1080)144Hz  كرت الشاشة مواصفات كرت الشاشة : GeForce RTX™ 3050 Ti 4GB GDDR6  كرت الشاشة مواصفات نمط كرت الشاشة : منفصل  الكيبورد : yas  البطارية : 2-4H  السواقة مواصفات السواقة : بدون  يدعم اللمس مواصفات بصمة الأصبع: لا يدعم', 'imege/TUF F15 FX507ZC4 Gaming Laptop.jpg', 'laptop'),
(29, 'A36 5G', 400.00, 'سامسونج هاتف ذكي جالكسي ايه 36 الجيل الخامس 5G، ذاكرة تخزين 128GB، ذاكرة RAM 8GB، ارجواني فاتح، 6 تحديثات لنظام التشغيل، شاشة كبيرة، معالج ثماني النواة', 'imege/A36.jpg', 'mobile'),
(30, 'Samsung Galaxy A55', 450.00, 'مواصفات سامسونج A55 الرئيسية : الشاشة : 6.6 انش  الذاكرة : 128 جيجابايت  الرامات : 8 جيجا رام  الكاميرا الرئيسية : 50 ميجابكسل  البطارية : 5000 مللي امبير  شبكة الاتصال : 5G', 'imege/A55.jpg', 'mobile'),
(31, 'Samsung Galaxy S24Ultra', 800.00, 'يدعم الهاتف 2 شريحة للاتصال من نوع Nano SIM الاتصال	الهاتف يدعم تشغيل شبكة الجيل الخامس 5G، كما يدعم شبكة الـ 4G وباقي الشبكات الأخرى الوزن والأبعاد	وزن الجوال يبلغ 233 جرام، وطوله 162.3 ملم، وعرضه 79 ملم، وسمكه 8.6 ملم الخامات	الظهر يأتي مصنوع من الزجاج المحمي بـ Gorilla Glass Armor، كما يحتوي على إطار مصنوع من التيتانيوم الشاشة	نوع الشاشة Dynamic LTPO AMOLED 2X، كما تبلغ مساحتها 6.8 بوصة، وسطوعها يصل إلى 2600 شمعة الذاكرة	يأتي بثلاث إصدارات من حيث حجم الذاكرة الأول بسعة 256 جيجا بايت ذاكرة صلبة و12 جيجا بايت رام، والثاني يأتي بذاكرة صلبة سعتها 512 جيجا بايت وعشوائية سعتها 12 جيجا بايت، والثالث يأتي بذاكرة صلبة 1 تيرا وعشوائية سعتها 12 جيجا بايت المعالج	المعالج يأتي من نوع Snapdragon 8 Gen 3 بتكنولوجيا 4 نانو المعالج الرسومي	يأتي من نوع Adreno 750 الكاميرا الأمامية	تبلغ دقتها الكاميرا الخلفية	رباعية حيث تبلغ دقة الكاميرا الأولى الأساسية 200 ميجا بكسل، والثانية دقتها 50 ميجا بكسل، والثالثة دقتها 10 ميجا بكسل، والرابعة دقتها 12 ميجا بكسل', 'imege/S24.jpg', 'mobile'),
(32, 'Samsung Galaxy S23Ultra', 1200.00, 'نظام التشغيل   Android v13  وحدة المعالجة المركزية   Snapdragon 888 من الجيل الثاني  RAM  سعة تصل إلى 16 جيجابايت.  وحدة التخزين  128/256/512 جيجابايت  الشاشة  6. 8 بوصة، AMOLED، 120 هرتز، 1440×3200 QHD  كاميرا خلفية 200mp، 10mp، 10mp، 12 ميجابكسل  الكاميرا الأمامية  40mp  البطارية 5،OOOmAh، الشحن السريع 57Wht', 'imege/S23alt.webp', 'mobile'),
(33, 'Samsung Galaxy A54', 900.00, 'الشاشة: مزود بشاشة من نمط AMOLED بحجم 64 بوصة، ومعدل ارتداد 120 هرتز.  الشريحة: يدعم جهاز سامسونج جالاكسي A54 شريحة من نوع Exynos 1380.  التخزين: يستوعب رامات بسعة 8 جيجا، أما الذاكرة الخارجية 128 جيجا بايت، وأيضًا بنسخة 256 جيجابايت.  البطارية: جهاز سامسونج جالاكسي A54 مدعوم ببطارية تستوعب مقدار طاقة 5000 مللي أمبير.  الاتصالات: يدعم الاتصال بالشبكات عبر تقنية الجيل الخامس 5G  مقاومة الماء، من الأجهزة المقاومة للماء حيث يعمل ضمن معيار IP67  الكاميرا: مزود بكاميرا فريدة من نوعها تصل دقة المستشعر فيها إلى 50 ميجا بكسل تقريبًا', 'imege/Samsung Galaxy A54.webp', 'mobile'),
(34, 'Samsung Galaxy A75', 600.00, 'لشاشة: 6.53 بوصة  الكاميرا: رباعية  الذاكرة: 8 جيجابايت  البطارية: 5500 ملى امبير  نظام التشغيل: Android 12 – واجهة استخدام One UI Core 4.0  المعالج: Snapdragon 662  الشاشة  حجم الشاشة  6.53 بوصة، تستحوذ الشاشة على 84.2% من الموبايل  النوع  Super AMOLED، كابستف، تعمل باللمس، 16 مليون  الدقة  2400 × 1080 بكسل، نسبة الطول إلى العرض 20:9  البكسل في كل نقطة  399 بكسل بالانش  المواصفات الداخلية  أجهزة الاستشعار  مستشعر البصمة (مثبت على جانب الموبايل)، التسارع، الجيرسكوب، القرب، البوصلة  Chipset  Qualcomm SM6115 Snapdragon 662 – بدقة تصنيع 11 نانومتر  المعالج  ثماني النواه:- 4×2.0 GHz Kryo 260 Gold 4×1.8 GHz Kryo 260 Silver CPU Bit:64-bit  معالج رسومي (GPU)  Qualcomm® Adreno™ 610 GPU  الذاكرة العشوائية  8 جيجابايت  الذاكرة الداخلية  128 جيجابايت', 'imege/Samsung Galaxy A75.webp', 'mobile'),
(35, 'Samsung Galaxy M14', 500.00, 'لوزن: 206 جرام.  نظام التشغيل: أندرويد 13 مع واجهة One UI 5.1.  قياس الشاشة: 6.5 بوصة من نوع PLS LCD بتردد 90 هرتز.  دقة عرض الشاشة: 1080 × 2408 بكسل.  شريحة المعالج: Exynos 1330 بتقنية 5 نانوميتر.  سعة ذاكرة الوصول العشوائي: 6 / 4 جيجارام.  سعة ذاكرة التخزين الداخلية: 128 أو 64 جيجابايت.  الكاميرا الخلفية: ثلاثية بدقة 50 ميجابكسل + 2 ميجابكسل + 2 ميجابكسل.  الكاميرا الأمامية: بدقة 13 ميجابكسل.  سعة البطارية: 6000 ميللي أمبير بقوة شحن سريع 25/15 وات', 'imege/Samsung Galaxy M14.jpg', 'mobile'),
(36, 'samsung Galaxy S24', 450.00, 'أنظمة التشغيل: أندرويد 5G,:النظام الخلوي سعة تخزين الذاكرة: 256 غيغابايت تقنية الاتصال: Wi-Fi اللون: ماربل غراي حجم الشاشة: 6,2 بوصة', 'imege/samsung Galaxy S24.webp', 'mobile'),
(37, 'Samsung Galaxy S24 Plus', 470.00, 'نظمة التشغيل: أندرويد 5G,:النظام الخلوي سعة تخزين الذاكرة: 512 غيغابايت تقنية الاتصال:  Wi-Fi اللون: أسود حجم الشاشة: 6,7 بوصة', 'imege/samsung Galaxy S24.webp', 'mobile'),
(38, 'Samsung Galaxy S23', 430.00, 'أنظمة التشغيل: Android 5G,:النظام الخلوي سعة تخزين الذاكرة: 256 غيغابايت تقنية الاتصال: USB اللون: فانتوم بلاك', 'imege/Samsung Galaxy S23.webp', 'mobile'),
(39, 'Samsung Galaxy S22', 400.00, 'أنظمة التشغيل: Android 12.0 5G,:النظام الخلوي سعة تخزين الذاكرة: 256 غيغابايت تقنية الاتصال: بلوتوث, Wi-Fi, USB, NFC , اللون: غرافيت حجم الشاشة: 6,04 بوصة', 'imege/Samsung Galaxy S22.webp', 'mobile'),
(40, 'Samsung Galaxy S20 FE', 650.00, 'أنظمة التشغيل: Android 11.0 4G,:النظام الخلوي سعة تخزين الذاكرة: 6 غيغابايت تقنية الاتصال: بلوتوث, Wi-Fi, USB, NFC اللون: كلاود نافي حجم الشاشة: 6,5 بوصة', 'imege/Samsung Galaxy S20 FE.webp', 'mobile'),
(41, 'Galaxy S25 Ultra', 700.00, 'يأتي بقدرات خاصة تجعله واحدًا من أبرز الهواتف الذكية، ويأتي مزودا بمعالج Snapdragon 8 Gen3، والذي تم تطويره خصيصا لهواتف Galaxy، ويقدم هذا المعالج أداء استثنائيا بدءا من الألعاب والمهام اليومية، كما تم تحسين وحدة معالجة الذكاء الاصطناعي NPU، بشكل كبير ما يساهم في تحسين تجربة المستخدم في العديد من التطبيقات التي تعتمد على الذكاء الاصطناعي.  ويتميز الهاتف بشاشة من نوع AMOLED، بدقة عالية مع معدل تحديث يتراوح بين 1 و120 هرتز، كما تعمل هذه الميزة أيضا على تحسين كفاءة استهلاك الطاقة ما يزيد من عمر البطارية، ويتميز بتصميم أنيق وأبعاد مناسبة، حيث يبلغ وزن الهاتف 219 جرامًا.', 'imege/Galaxy S25 Ultra.jpg', 'mobile'),
(42, 'Galaxy Z-filp4', 800.00, 'نظام التشغيل	Android 12.0 ذاكرة الوصول العشوائي المثبتة	8 جيجابايت نموذج وحدة المعالجة المركزية	سناب دراجون سرعة وحدة المعالجة المركزية	2,7 جيجاهرتز سعة تخزين الذاكرة	256 جيجابايت حجم الشاشة	1,9 انش الدقة	1080 × 2640 معدل التحديث	120 Hz ', 'imege/Galaxy Zfilp4.jpg', 'mobile');

-- --------------------------------------------------------

--
-- بنية الجدول `products_cart`
--

CREATE TABLE `products_cart` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `section` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `products_cart`
--

INSERT INTO `products_cart` (`id`, `product_name`, `price`, `description`, `image`, `section`) VALUES
(69, 'ASUS ROG STRIX G18 G814JIR-N6136', 2600.00, 'cpu مواصفات المعالج : i9-14900HX  جيل المعالج جيل المعالج : الرابع عشر  ram مواصفات الرام : 32G DDR5-5600MHZ  التخزين : 1TB PCIe 4.0 SSD  الشاشة : 18QHD+/2560x1600 IPS 240HZ  كرت الشاشة مواصفات كرت الشاشة : NVIDIA RTX 4070 8 GB GDDR6 140W TGP  كرت الشاشة مواصفات نمط كرت الشاشة : منفصل  الكيبورد : RGB PER KEY  البطارية : 2-4H  السواقة مواصفات السواقة : بدون  يدعم اللمس مواصفات بصمة الأصبع: لا يدعم', 'imege/ROG STRIX G18 G814JIR-N6136.jpg', 'laptop');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'mohamadkhateeb', 'mohamadkhateeb45@gmail.com', '111111', 'admin'),
(3, 'yaser', 'eewwww@g2mail.com', '11111111', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_cart`
--
ALTER TABLE `products_cart`
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
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `products_cart`
--
ALTER TABLE `products_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
