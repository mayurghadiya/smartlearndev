ALTER TABLE `lh_departament` ADD `visible_if_online` tinyint(1) NOT NULL, COMMENT='';
ALTER TABLE `lh_abstract_widget_theme` ADD `show_voting` tinyint(1) NOT NULL DEFAULT '1', COMMENT='';
ALTER TABLE `lh_abstract_widget_theme` ADD `department_title` varchar(250) NOT NULL, COMMENT='';
ALTER TABLE `lh_abstract_widget_theme` ADD `department_select` varchar(250) NOT NULL, COMMENT='';
ALTER TABLE `lh_abstract_widget_theme` ADD `buble_visitor_background` varchar(250) NOT NULL, COMMENT='';
ALTER TABLE `lh_abstract_widget_theme` ADD `buble_visitor_title_color` varchar(250) NOT NULL, COMMENT='';
ALTER TABLE `lh_abstract_widget_theme` ADD `buble_visitor_text_color` varchar(250) NOT NULL, COMMENT='';
ALTER TABLE `lh_abstract_widget_theme` ADD `buble_operator_background` varchar(250) NOT NULL, COMMENT='';
ALTER TABLE `lh_abstract_widget_theme` ADD `buble_operator_title_color` varchar(250) NOT NULL, COMMENT='';
ALTER TABLE `lh_abstract_widget_theme` ADD `buble_operator_text_color` varchar(250) NOT NULL, COMMENT='';