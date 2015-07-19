alter table power_base_station_runing_data add energy_all int default 0;
alter table power_base_station_runing_data add energy_dc int default 0;
alter table power_base_station_runing_data add power_all int default 0;
alter table power_base_station_runing_data add power_dc int default 0;

alter table power_base_station_energy_info add building_type varchar(200) default '0';
alter table power_base_station_energy_info add ration varchar(200) default '0';
alter table power_base_station_energy_info add energy_type varchar(200) default '0';

alter table power_base_station_device_info add air_condition_tempature varchar(200) default '0';
alter table power_base_station_device_info drop column energy_type;
