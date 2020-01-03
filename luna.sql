CREATE TABLE `portal` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `portal`
--

INSERT INTO `portal` (`id`, `name`, `content`) VALUES
(1, 'domain', 'http://localhost/MVC'),
(2, 'base_url', 'http://localhost/MVC'),
(3, 'path_cdn', 'http://localhost/cdn.luna'),
(4, 'kurs', '5'),
(5, 'portal', 'http://localhost/portalluna'),
(6, 'path_home_slideIndex', '../MVC/public/assets/img/slideIndex/'),
(7, 'path_portal_slideIndex', 'public/assets/img/slideIndex/'),
(8, 'path_home_slideCategory', '../MVC/public/assets/img/slideCategory/'),
(9, 'path_portal_slideCategory', 'public/assets/img/slideCategory/'),
(10, 'path_home_topImageHow', '../MVC/public/assets/img/topHow/'),
(11, 'path_portal_topImageHow', 'public/assets/img/topHow/'),
(12, 'path_home_topImageFaq', '../MVC/public/assets/img/topFaq/'),
(13, 'path_portal_topImageFaq', 'public/assets/img/topFaq/'),
(14, 'path_home_topImageContact', '../MVC/public/assets/img/topContact/'),
(15, 'path_portal_topImageContact', 'public/assets/img/topContact/'),
(16, 'path_home_categoryProduct', '../MVC/public/assets/img/categoryProduct/'),
(17, 'path_portal_categoryProduct', 'public/assets/img/categoryProduct/'),
(18, 'path_home_product', '../MVC/public/assets/img/product/'),
(19, 'path_portal_product', 'public/assets/img/product/'),
(20, 'path_home_dataManagement', '../MVC/public/assets/img/dataManagement/'),
(21, 'path_portal_dataManagement', 'public/assets/img/dataManagement/'),
(22, 'price_bid', '1');

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `notification`
--

INSERT INTO `notification` (`id`, `sender_id`, `users_id`, `message`, `date`) VALUES
(1, 1, 761764, 'Your bid product 1', '20-12-2019 19:48');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

ALTER TABLE `portal`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `portal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;
