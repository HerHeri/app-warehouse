/*
 Navicat Premium Data Transfer

 Source Server         : local-host-pc
 Source Server Type    : MySQL
 Source Server Version : 100419 (10.4.19-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : app-warehouse

 Target Server Type    : MySQL
 Target Server Version : 100419 (10.4.19-MariaDB)
 File Encoding         : 65001

 Date: 23/02/2024 20:24:45
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for formbarangs
-- ----------------------------
DROP TABLE IF EXISTS `formbarangs`;
CREATE TABLE `formbarangs`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_form` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `barang_id` int NULL DEFAULT NULL,
  `jumlah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `deleted_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of formbarangs
-- ----------------------------
INSERT INTO `formbarangs` VALUES (4, 'WHIN-23/02/2024/003', 5, '3', '1', 'in', '2024-02-23 20:24:09', '2024-02-23 20:24:09', NULL);

-- ----------------------------
-- Table structure for listbarangs
-- ----------------------------
DROP TABLE IF EXISTS `listbarangs`;
CREATE TABLE `listbarangs`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `harga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `stock` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of listbarangs
-- ----------------------------
INSERT INTO `listbarangs` VALUES (4, 'b-5', 'barang 5', '13000', '12', '1', '2024-02-23 01:24:20', '2024-02-23 13:32:57', '2024-02-23 13:32:57');
INSERT INTO `listbarangs` VALUES (5, 'b-7', 'barang 7', '13000', '9', '1', '2024-02-23 01:29:52', '2024-02-23 20:24:09', NULL);
INSERT INTO `listbarangs` VALUES (6, 'b-3', 'barang 5', '13000', '12', '2', '2024-02-23 01:30:25', '2024-02-23 01:30:25', NULL);
INSERT INTO `listbarangs` VALUES (7, 'b-1', 'barang 1', '13000', '12', '2', '2024-02-23 01:31:20', '2024-02-23 13:33:54', '2024-02-23 13:33:54');
INSERT INTO `listbarangs` VALUES (8, 'b-5', 'barang 2', '13000', '12', '1', '2024-02-23 01:36:02', '2024-02-23 20:24:12', NULL);
INSERT INTO `listbarangs` VALUES (9, 'b10', 'barang 5', '13000', '12', '2', '2024-02-23 01:36:41', '2024-02-23 01:36:41', NULL);
INSERT INTO `listbarangs` VALUES (10, 'b-1', 'barang 5', '13000', '12', '2', '2024-02-23 13:34:10', '2024-02-23 13:34:10', NULL);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- ----------------------------
-- Table structure for password_reset_tokens
-- ----------------------------
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of password_reset_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 49 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------
INSERT INTO `personal_access_tokens` VALUES (1, 'App\\Models\\User', 1, 'admin@admin.com', '9b933f4e42d4427752956a5a882724646d1ee348d7a49dce39a3e9b98cf21d5e', '[\"*\"]', NULL, NULL, '2024-02-20 14:49:12', '2024-02-20 14:49:12');
INSERT INTO `personal_access_tokens` VALUES (2, 'App\\Models\\User', 1, 'admin', 'e1f36dae28d1ef83ad1d3adfc7d0d9f7ed0c0afa9c42b4d240ed093c4d8e7c35', '{\"a\":\"b\"}', NULL, NULL, '2024-02-20 14:54:58', '2024-02-20 14:54:58');
INSERT INTO `personal_access_tokens` VALUES (3, 'App\\Models\\User', 1, 'admin', '89e8a1d741dd610d381baf8dad7815512f002e04bce1edbef3e83de3f77a32f2', '[\"*\"]', NULL, NULL, '2024-02-20 14:55:49', '2024-02-20 14:55:49');
INSERT INTO `personal_access_tokens` VALUES (4, 'App\\Models\\User', 1, 'admin', 'df137b050b8d47134cdf22ada4e907e0839a0cfbd9cf93ee0c2b35464f1a5dfb', '[\"*\"]', NULL, NULL, '2024-02-20 14:56:18', '2024-02-20 14:56:18');
INSERT INTO `personal_access_tokens` VALUES (5, 'App\\Models\\User', 1, 'admin', '1ecd575e91c7bf3947b9856dbabbadb2c6717fbfb1a03ee027eed949c2d7faa1', '[\"*\"]', NULL, NULL, '2024-02-20 14:56:53', '2024-02-20 14:56:53');
INSERT INTO `personal_access_tokens` VALUES (6, 'App\\Models\\User', 1, 'admin', '2029a7dee775b89506c277f6944afa2f43f325a950818399757eea4b80311080', '[\"*\"]', NULL, NULL, '2024-02-20 15:14:12', '2024-02-20 15:14:12');
INSERT INTO `personal_access_tokens` VALUES (7, 'App\\Models\\User', 1, 'admin', '44970b6aa19eb7e35dde4892d29f5361bc69b6dd1e6d18a4d1d7eeb37e504d3c', '[\"*\"]', NULL, NULL, '2024-02-20 15:18:30', '2024-02-20 15:18:30');
INSERT INTO `personal_access_tokens` VALUES (8, 'App\\Models\\User', 1, 'admin', '2e912162dde93a28d1fb8e865a2ae5249361f185c1b7caf67040e18964287d28', '[\"*\"]', NULL, NULL, '2024-02-20 15:19:28', '2024-02-20 15:19:28');
INSERT INTO `personal_access_tokens` VALUES (9, 'App\\Models\\User', 1, 'admin', '11e17218263c304d34a5c6e0375d109f99e6eac713002cd18ab5f330d67cd976', '[\"*\"]', NULL, NULL, '2024-02-20 15:22:17', '2024-02-20 15:22:17');
INSERT INTO `personal_access_tokens` VALUES (10, 'App\\Models\\User', 1, 'admin', '8559f40d9365008c1de6657ecdf255beca82fe13d1166e1645ca35b10f4e24f7', '[\"*\"]', NULL, NULL, '2024-02-20 15:30:20', '2024-02-20 15:30:20');
INSERT INTO `personal_access_tokens` VALUES (11, 'App\\Models\\User', 1, 'admin', '79ce49ded3ed5033dbff7486939df2bb2e3bc715604d531ea7b0787ffd2b0435', '[\"*\"]', NULL, NULL, '2024-02-20 15:36:48', '2024-02-20 15:36:48');
INSERT INTO `personal_access_tokens` VALUES (12, 'App\\Models\\User', 1, 'admin', '3848daa536d35a631a9a0c24efeb857eb43121ce3e416b4cf46af66c859ca841', '[\"*\"]', NULL, NULL, '2024-02-20 15:38:13', '2024-02-20 15:38:13');
INSERT INTO `personal_access_tokens` VALUES (13, 'App\\Models\\User', 1, 'admin', '01bd8869432f431ce4d7a799e6abc7873e6817ba9453062bcd27fd4ce6398f9b', '[\"*\"]', NULL, NULL, '2024-02-20 15:44:21', '2024-02-20 15:44:21');
INSERT INTO `personal_access_tokens` VALUES (14, 'App\\Models\\User', 1, 'admin', '07731933059b206e86e4b6059eac69bd21c087d072f9c95a24967571e6dc8f48', '[\"*\"]', NULL, NULL, '2024-02-20 15:46:54', '2024-02-20 15:46:54');
INSERT INTO `personal_access_tokens` VALUES (15, 'App\\Models\\User', 1, 'admin', 'f05554ec193012b437eab5326ef7f882550a1b72cb265833e06c78bb9cccc48e', '[\"*\"]', NULL, NULL, '2024-02-20 15:49:40', '2024-02-20 15:49:40');
INSERT INTO `personal_access_tokens` VALUES (16, 'App\\Models\\User', 1, 'admin', '2f2bb91879b36a3efdae8c8205cca22d0c42fb2011f88086dabafc087574b750', '[\"*\"]', NULL, NULL, '2024-02-20 15:49:51', '2024-02-20 15:49:51');
INSERT INTO `personal_access_tokens` VALUES (17, 'App\\Models\\User', 1, 'admin', '5b760e908ac1f4aa3b29261115c34a247d2ba237b9da7c84176ad9b897af7644', '[\"*\"]', NULL, NULL, '2024-02-20 15:53:44', '2024-02-20 15:53:44');
INSERT INTO `personal_access_tokens` VALUES (18, 'App\\Models\\User', 1, 'admin', 'c08d8f6346d6c01f2c4875f848edda99507b5167d54485a798935a9353dd6dcc', '[\"*\"]', NULL, NULL, '2024-02-20 16:08:17', '2024-02-20 16:08:17');
INSERT INTO `personal_access_tokens` VALUES (19, 'App\\Models\\User', 1, 'admin', '3844810a6fe47e87e0924512e7acfeb3d23370c444d74fe4ba4e0125cde8e5a6', '[\"*\"]', NULL, NULL, '2024-02-20 16:08:45', '2024-02-20 16:08:45');
INSERT INTO `personal_access_tokens` VALUES (20, 'App\\Models\\User', 1, 'admin', '05ce6833f931d59aff43b8c83bf06cb382439838c3fd45a8fb69de2a3f4b1575', '[\"*\"]', NULL, NULL, '2024-02-20 16:22:00', '2024-02-20 16:22:00');
INSERT INTO `personal_access_tokens` VALUES (21, 'App\\Models\\User', 1, 'admin', 'b5fe54fa85479d685bd9d65cfc0f00b7af58cc0cb8e8ba86eba374b22b5c0bf3', '[\"*\"]', NULL, NULL, '2024-02-20 16:23:33', '2024-02-20 16:23:33');
INSERT INTO `personal_access_tokens` VALUES (22, 'App\\Models\\User', 1, 'admin', 'a77ef0c6b72bd2265579b0e83a30692a8311d454f970787ed09685d97406f04d', '[\"*\"]', NULL, NULL, '2024-02-20 16:24:58', '2024-02-20 16:24:58');
INSERT INTO `personal_access_tokens` VALUES (23, 'App\\Models\\User', 1, 'admin', 'baea6df570ca0fc129d548ce1653c1e5664b1ec9a228a2369d5f52423190d482', '[\"*\"]', '2024-02-20 16:35:49', NULL, '2024-02-20 16:35:09', '2024-02-20 16:35:49');
INSERT INTO `personal_access_tokens` VALUES (24, 'App\\Models\\User', 1, 'admin', '4b46410ec927fb7f9d386a348238363f5f7b67d37e2304539033391feb5726bd', '[\"*\"]', NULL, NULL, '2024-02-20 16:55:59', '2024-02-20 16:55:59');
INSERT INTO `personal_access_tokens` VALUES (25, 'App\\Models\\User', 1, 'admin', '67d843417374ee39d090bb90b8a10c1fed865f372ff14bbb9f22bddd18af1214', '[\"*\"]', NULL, NULL, '2024-02-20 17:29:49', '2024-02-20 17:29:49');
INSERT INTO `personal_access_tokens` VALUES (26, 'App\\Models\\User', 1, 'admin', '8befe1dcb228bc08dbb88f1d43fdfb810b905fc65c2db634689fbd1a8264bbc8', '[\"*\"]', NULL, NULL, '2024-02-20 17:30:41', '2024-02-20 17:30:41');
INSERT INTO `personal_access_tokens` VALUES (27, 'App\\Models\\User', 1, 'admin', 'ceb4e4332817a19c76d64fb664a9c415855c9c2ee1b6f882bcc9d4ec948efa66', '[\"*\"]', NULL, NULL, '2024-02-20 17:33:12', '2024-02-20 17:33:12');
INSERT INTO `personal_access_tokens` VALUES (28, 'App\\Models\\User', 1, 'admin', '47e0073c7931a6b07233b0c9c7bc7b0de79a8f3d0885b6cf371385d8a7c92cf1', '[\"*\"]', NULL, NULL, '2024-02-20 17:34:11', '2024-02-20 17:34:11');
INSERT INTO `personal_access_tokens` VALUES (29, 'App\\Models\\User', 1, 'admin', 'eba56b6beb1dce15b033aace1140aa59b7028cf8cb7e6bebe8c976e7d1b2263a', '[\"*\"]', '2024-02-21 03:38:27', NULL, '2024-02-20 17:39:24', '2024-02-21 03:38:27');
INSERT INTO `personal_access_tokens` VALUES (30, 'App\\Models\\User', 1, 'admin', '9171cc929f64a56d8f2d508f000b2b48a87e040a1fd2b1b88e7755f2a99cacfd', '[\"*\"]', '2024-02-20 18:12:15', NULL, '2024-02-20 17:52:38', '2024-02-20 18:12:15');
INSERT INTO `personal_access_tokens` VALUES (31, 'App\\Models\\User', 1, 'admin', 'dd521d9f5cd7005a5c6027e96aad9903b5df62c7c1967f00812f2ca3887d2367', '[\"*\"]', '2024-02-20 18:16:43', NULL, '2024-02-20 18:15:57', '2024-02-20 18:16:43');
INSERT INTO `personal_access_tokens` VALUES (32, 'App\\Models\\User', 1, 'admin', '2c21052535720ef5b13dafa8bb1a6c20d1d7f3f0e0d7a1d825d6da06806d2b49', '[\"*\"]', '2024-02-21 03:12:40', NULL, '2024-02-21 03:09:35', '2024-02-21 03:12:40');
INSERT INTO `personal_access_tokens` VALUES (33, 'App\\Models\\User', 1, 'admin', '6df2adbbeac11ff737f911a5650dbe6360ada8a3eedfa15d785d49dea2920a15', '[\"*\"]', '2024-02-21 03:41:33', NULL, '2024-02-21 03:37:27', '2024-02-21 03:41:33');
INSERT INTO `personal_access_tokens` VALUES (34, 'App\\Models\\User', 1, 'admin', 'b3918252a346d537d8d59b4ba796e48777e2e82bec9f87201dcf8d8b2d9dd20e', '[\"*\"]', NULL, NULL, '2024-02-21 03:53:13', '2024-02-21 03:53:13');
INSERT INTO `personal_access_tokens` VALUES (35, 'App\\Models\\User', 1, 'admin', '9b219ef3cc9b302abeedd5ea851d5b20d2f2011bdeefd4f3fe74d7f7a1e1198f', '[\"*\"]', NULL, NULL, '2024-02-21 03:57:54', '2024-02-21 03:57:54');
INSERT INTO `personal_access_tokens` VALUES (36, 'App\\Models\\User', 1, 'admin', 'dff03bb126761dd54e9c8ce6f909e090f113dad532032ccbb9580cef2870d547', '[\"*\"]', NULL, NULL, '2024-02-21 03:59:35', '2024-02-21 03:59:35');
INSERT INTO `personal_access_tokens` VALUES (37, 'App\\Models\\User', 1, 'admin', '921e9e86c1483af1cd475fed2ead60cdfb6edcc57dc6d6aa76237b12376480aa', '[\"*\"]', NULL, NULL, '2024-02-22 10:58:50', '2024-02-22 10:58:50');
INSERT INTO `personal_access_tokens` VALUES (38, 'App\\Models\\User', 1, 'admin', '236cef53b4df3fb12f3c24a8e079702029cfd6ce46af739f7b90c18c83046683', '[\"*\"]', NULL, NULL, '2024-02-22 11:30:50', '2024-02-22 11:30:50');
INSERT INTO `personal_access_tokens` VALUES (39, 'App\\Models\\User', 1, 'admin', 'de5df1c20c7ea6c98f347aba7b4f5105b042d33e7f8d7519effa81c5dff8faf7', '[\"*\"]', NULL, NULL, '2024-02-22 11:34:03', '2024-02-22 11:34:03');
INSERT INTO `personal_access_tokens` VALUES (40, 'App\\Models\\User', 1, 'admin', '618211cb9051e0148bad31f10a52ff0ab06997b339cb09a1a2a87c68cc86767e', '[\"*\"]', NULL, NULL, '2024-02-22 11:34:38', '2024-02-22 11:34:38');
INSERT INTO `personal_access_tokens` VALUES (41, 'App\\Models\\User', 1, 'admin', '89d3cc8fad38a428be2b8e7d233db0871dd3e72b578afe6f8f443ed16db08847', '[\"*\"]', NULL, NULL, '2024-02-22 11:35:31', '2024-02-22 11:35:31');
INSERT INTO `personal_access_tokens` VALUES (42, 'App\\Models\\User', 1, 'admin', 'c133abb42419339cb270899aa33bb9b1fea6aab02b75f453676647639eeaba80', '[\"*\"]', NULL, NULL, '2024-02-22 11:40:08', '2024-02-22 11:40:08');
INSERT INTO `personal_access_tokens` VALUES (43, 'App\\Models\\User', 1, 'admin', '99cba6c3ed5eadd660e553a51d8b08f6beee88755d47411fe0637ee1f0d8e335', '[\"*\"]', NULL, NULL, '2024-02-22 11:41:06', '2024-02-22 11:41:06');
INSERT INTO `personal_access_tokens` VALUES (44, 'App\\Models\\User', 1, 'admin', 'b7d39eda33b3e175516b3bd14ee033efe34ac4317814bfdf69209ae370e67c3c', '[\"*\"]', NULL, NULL, '2024-02-22 11:42:25', '2024-02-22 11:42:25');
INSERT INTO `personal_access_tokens` VALUES (45, 'App\\Models\\User', 1, 'admin', '1c6c2eaf021a142e7c1c884aec49269a550fd37b5207010606ea14ffdd8fadfd', '[\"*\"]', '2024-02-22 21:39:34', NULL, '2024-02-22 21:38:59', '2024-02-22 21:39:34');
INSERT INTO `personal_access_tokens` VALUES (47, 'App\\Models\\User', 1, 'admin', '2cd6f7ee83511adc5f255361ddd34e7960d41271ddf6ccbe65571da4f2762ec6', '[\"*\"]', '2024-02-23 01:36:42', NULL, '2024-02-22 22:33:59', '2024-02-23 01:36:42');
INSERT INTO `personal_access_tokens` VALUES (48, 'App\\Models\\User', 1, 'Admin', '4b776355e3d28001eac90bd137b1ac8b2d2a68b50becef1ba5208a073d05244e', '[\"*\"]', '2024-02-23 20:24:13', NULL, '2024-02-23 12:45:16', '2024-02-23 20:24:13');

-- ----------------------------
-- Table structure for recordbarangs
-- ----------------------------
DROP TABLE IF EXISTS `recordbarangs`;
CREATE TABLE `recordbarangs`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_barang` int NULL DEFAULT NULL,
  `kode_history` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jumlah_request` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of recordbarangs
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `role_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  `deleted_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'admin', 'Admin', NULL, NULL, NULL);
INSERT INTO `roles` VALUES (2, 'keeper', 'Keeper', NULL, NULL, NULL);
INSERT INTO `roles` VALUES (3, 'staff', 'Staff', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int NULL DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Admin', 'admin@admin.com', NULL, '$2y$12$JiBINMdI/FGGC380jKbwJuaeXNUp0D22mF33zi2CoM09cFfooMUVu', 1, '48|ym9tBIBdLVwBRTXi6JkMiXlxBwvoBjAg2eTqy1Ucbc69ff9a', '1', '2024-02-20 14:48:58', '2024-02-23 13:07:00', NULL);
INSERT INTO `users` VALUES (2, 'Keeper', 'keeper@keeper.com', NULL, '$2y$12$kKiUbEp7RQq2kjEFrmwBB.QjqyY0bH6KaZ4FanGEsJiOtccAcHRg6', 2, NULL, '1', '2024-02-23 00:51:42', '2024-02-23 00:51:42', NULL);
INSERT INTO `users` VALUES (3, 'Staff', 'staff@staff.com', NULL, '$2y$12$P70pTV1PxakJ.qz0L9sqAuVYGb1TAHnnNC6HblrEpZYoo1vQpt5pW', 3, NULL, '1', '2024-02-23 00:54:23', '2024-02-23 00:54:23', NULL);

-- ----------------------------
-- Table structure for xxusers
-- ----------------------------
DROP TABLE IF EXISTS `xxusers`;
CREATE TABLE `xxusers`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of xxusers
-- ----------------------------
INSERT INTO `xxusers` VALUES (2, 'admin', 'admin@mail.com', '2', '$2y$12$ebZ3ALd2RInJ2ep.XNf3TurIG.7B8feaIA0Ce1jTz3YUai3cDPS.2', '2024-02-20 12:35:21', '2024-02-20 12:35:21');
INSERT INTO `xxusers` VALUES (3, 'admin', 'admin@admin.com', '2', '$2y$12$ATtqyQ1unc/oCG6tu4e.le2F7SIn7UnshGQIKVrmgJjKae9UJyLfW', '2024-02-20 14:08:02', '2024-02-20 14:08:02');

SET FOREIGN_KEY_CHECKS = 1;
