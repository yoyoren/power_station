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

ALTER TABLE `power_ammeter_chinamobile` ADD `station_id` INT(11) NULL DEFAULT NULL AFTER `ammeter_id`;
ALTER TABLE `power_ammeter_chinamobile` ADD `ammeter_normal` INT(11) NULL DEFAULT NULL AFTER `station_id`;
ALTER TABLE `power_ammeter_chinamobile` ADD `ammeter_normal_chinamobile` INT(11) NULL DEFAULT NULL AFTER `ammeter_normal`;
ALTER TABLE `power_ammeter_chinamobile` ADD `read_time` INT NULL DEFAULT NULL AFTER `ammeter_normal_chinamobile`;

alter table power_base_station add use_energy_station varchar(200) default '0';
alter table power_base_station add project_serise varchar(200) default '0';


alter table power_base_station_energy_info modify column price varchar(200);
alter table power_base_station_energy_info modify column ammeter_num varchar(200);
alter table power_base_station_energy_info modify column ammeter_num_chinamobile varchar(200);

alter table power_base_station_device_info modify column tempature_outside varchar(200);
alter table power_base_station_device_info modify column tempature_inside varchar(200);


alter table power_base_station_runing_data modify column wet_inside double;
alter table power_base_station_runing_data modify column wet_outside double;
alter table power_base_station_runing_data modify column ammeter_normal double;
alter table power_base_station_runing_data modify column ammeter_smart double;
alter table power_base_station_runing_data modify column overload_ac double;
alter table power_base_station_runing_data modify column overload_dc double;
alter table power_base_station_runing_data modify column temperature_inside double;
alter table power_base_station_runing_data modify column temperature_outside double;
alter table power_base_station_runing_data modify column temperature_cabinet double;
alter table power_base_station_runing_data modify column temperature_aircondition_1 double;
alter table power_base_station_runing_data modify column temperature_aircondition_2 double;
alter table power_base_station_runing_data modify column temperature_aircondition_3 double;
alter table power_base_station_runing_data modify column temperature_aircondition_4 double;
alter table power_base_station_runing_data modify column temperature_aircondition_5 double;
alter table power_base_station_runing_data modify column temperature_aircondition_6 double;
alter table power_base_station_runing_data modify column temperature_aircondition_7 double;
alter table power_base_station_runing_data modify column temperature_aircondition_8 double;
alter table power_base_station_runing_data modify column energy_all double;
alter table power_base_station_runing_data modify column energy_dc double;
alter table power_base_station_runing_data modify column power_all double;
alter table power_base_station_runing_data modify column power_dc double;