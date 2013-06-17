CREATE TABLE `tl_materials` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `tstamp` int(10) unsigned NOT NULL default '0',
  `title` varchar(64) NOT NULL default '',
  `size` int(10) unsigned NOT NULL default '0',
  `image` varchar(64) NOT NULL default '',
  `type` varchar(64) NOT NULL default '',
  `src` varchar(64) NOT NULL default '',
  PRIMARY KEY  (`id`),
) ENGINE=MyISAM DEFAULT CHARSET=utf8;