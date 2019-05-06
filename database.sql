ALTER TABLE `assignment_surat_tugas` CHANGE `assign_surat_type` `assign_surat_jabatanTTD` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

ALTER TABLE `par_audit_type` CHANGE `audit_type_name` `audit_type_name` VARCHAR(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

ALTER TABLE `audit_plan_auditee` ADD `audit_plan_auditee_hari` INT(5) NOT NULL DEFAULT '0' AFTER `audit_plan_auditee_id_auditee`;

ALTER TABLE `audit_plan` ADD `audit_plan_sub_tipe` VARCHAR(50) NOT NULL AFTER `audit_plan_tipe_id`;

DROP TABLE `audit_plan_auditee`;

CREATE TABLE `audit_plan_auditee` (
  `audit_plan_auditee_id` varchar(50) NOT NULL,
  `audit_plan_auditee_id_plan` varchar(50) NOT NULL,
  `audit_plan_auditee_id_auditee` varchar(50) NOT NULL,
  `audit_plan_auditee_hari` int(5) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE `audit_plan_auditee` ADD PRIMARY KEY (`audit_plan_auditee_id`);

ALTER TABLE `audit_plan_auditee` CHANGE `audit_plan_auditee_id` `audit_plan_auditee_id` INT NOT NULL AUTO_INCREMENT;

ALTER TABLE `par_audit_type` ADD `audit_type_code` VARCHAR(10) NOT NULL AFTER `audit_type_name`;
ALTER TABLE `par_audit_type` CHANGE `audit_type_name` `audit_type_name` VARCHAR(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL;

ALTER TABLE `par_posisi_penugasan` ADD `posisi_code` VARCHAR(5) NOT NULL AFTER `posisi_name`;

UPDATE `par_posisi_penugasan` SET `posisi_code` = 'PT' WHERE `par_posisi_penugasan`.`posisi_id` = '9e8e412b0bc5071b5d47e30e0507fe206bdf8dbd'; UPDATE `par_posisi_penugasan` SET `posisi_code` = 'PM' WHERE `par_posisi_penugasan`.`posisi_id` = '1fe7f8b8d0d94d54685cbf6c2483308aebe96229'; UPDATE `par_posisi_penugasan` SET `posisi_code` = 'KT' WHERE `par_posisi_penugasan`.`posisi_id` = '8918ca5378a1475cd0fa5491b8dcf3d70c0caba7'; UPDATE `par_posisi_penugasan` SET `posisi_code` = 'AT' WHERE `par_posisi_penugasan`.`posisi_id` = '6a70c2a39af30df978a360e556e1102a2a0bdc02';

ALTER TABLE `audit_plan` CHANGE `audit_plan_start_date` `audit_plan_start_date` DATE NOT NULL, CHANGE `audit_plan_end_date` `audit_plan_end_date` DATE NOT NULL;

ALTER TABLE `program_audit` ADD `program_status` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '1=ajukan katim, 2=approve dalnis, 3=reject_dalnis' AFTER `program_lampiran`;

CREATE TABLE `program_audit_comment` (
  `program_comment_id` varchar(50) NOT NULL,
  `program_comment_program_id` varchar(50) NOT NULL,
  `program_comment_desc` varchar(255) NOT NULL,
  `program_comment_user_id` varchar(50) NOT NULL,
  `program_comment_date` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

ALTER TABLE `program_audit_comment` ADD PRIMARY KEY (`program_comment_id`);