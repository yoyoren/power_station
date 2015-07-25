alter table power_base_station_runing_data add energy_all int default 0;
alter table power_base_station_runing_data add energy_dc int default 0;
alter table power_base_station_runing_data add power_all int default 0;
alter table power_base_station_runing_data add power_dc int default 0;

alter table power_base_station_energy_info add building_type varchar(200) default '0';
alter table power_base_station_energy_info add ration varchar(200) default '0';
alter table power_base_station_energy_info add energy_type varchar(200) default '0';

alter table power_base_station_device_info add air_condition_tempature varchar(200) default '0';
alter table power_base_station_device_info drop column energy_type;

ALTER TABLE `power_base_station_log` CHANGE `origin_value` `origin_value` VARCHAR(500) NULL DEFAULT NULL;
ALTER TABLE `power_base_station_log` CHANGE `current_value` `current_value` VARCHAR(500) NULL DEFAULT NULL;

ALTER TABLE `power_ammeter` ADD `station_id` INT(11) NULL DEFAULT NULL AFTER `ammeter_id`;
ALTER TABLE `power_ammeter` ADD `ammeter_normal` INT(11) NULL DEFAULT NULL AFTER `station_id`;
ALTER TABLE `power_ammeter` ADD `read_time` INT NULL DEFAULT NULL AFTER `ammeter_normal`;
ALTER TABLE `power_ammeter` ADD `read_value` INT NULL DEFAULT NULL AFTER `read_time`;

ALTER TABLE `power_ammeter_chinamobile` ADD `station_id` INT(11) NULL DEFAULT NULL AFTER `ammeter_id`;
ALTER TABLE `power_ammeter_chinamobile` ADD `ammeter_normal` INT(11) NULL DEFAULT NULL AFTER `station_id`;
ALTER TABLE `power_ammeter_chinamobile` ADD `ammeter_normal_chinamobile` INT(11) NULL DEFAULT NULL AFTER `ammeter_normal`;
ALTER TABLE `power_ammeter_chinamobile` ADD `read_time` INT NULL DEFAULT NULL AFTER `ammeter_normal_chinamobile`;
