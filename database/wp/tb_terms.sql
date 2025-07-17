TRUNCATE TABLE `tb_terms`;
INSERT INTO `tb_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Opini', 'opini', 0),
(2, 'Menu 1', 'menu-1', 0),
(3, 'Menu 2', 'menu-2', 0),
(4, 'Menu 3', 'menu-3', 0),
(5, 'Teknologi', 'teknologi', 0),
(6, 'Pendidikan', 'pendidikan', 0),
(7, 'Keislaman', 'keislaman', 0),
(8, 'Wordpress', 'wordpress', 0),
(9, 'Codeigniter', 'codeigniter', 0),
(null, 'OJS', 'ojs', 0);
COMMIT;
