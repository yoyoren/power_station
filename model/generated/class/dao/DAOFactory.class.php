<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return PowerAccountDAO
	 */
	public static function getPowerAccountDAO(){
		return new PowerAccountMySqlExtDAO();
	}

	/**
	 * @return PowerAccountAccessInfoDAO
	 */
	public static function getPowerAccountAccessInfoDAO(){
		return new PowerAccountAccessInfoMySqlExtDAO();
	}

	/**
	 * @return PowerAccountAccessProjectDAO
	 */
	public static function getPowerAccountAccessProjectDAO(){
		return new PowerAccountAccessProjectMySqlExtDAO();
	}

	/**
	 * @return PowerAmmeterDAO
	 */
	public static function getPowerAmmeterDAO(){
		return new PowerAmmeterMySqlExtDAO();
	}

	/**
	 * @return PowerAmmeterChinamobileDAO
	 */
	public static function getPowerAmmeterChinamobileDAO(){
		return new PowerAmmeterChinamobileMySqlExtDAO();
	}

	/**
	 * @return PowerBaseStationDAO
	 */
	public static function getPowerBaseStationDAO(){
		return new PowerBaseStationMySqlExtDAO();
	}

	/**
	 * @return PowerBaseStationAnalysisDAO
	 */
	public static function getPowerBaseStationAnalysisDAO(){
		return new PowerBaseStationAnalysisMySqlExtDAO();
	}

	/**
	 * @return PowerBaseStationDeviceInfoDAO
	 */
	public static function getPowerBaseStationDeviceInfoDAO(){
		return new PowerBaseStationDeviceInfoMySqlExtDAO();
	}

	/**
	 * @return PowerBaseStationEnergyInfoDAO
	 */
	public static function getPowerBaseStationEnergyInfoDAO(){
		return new PowerBaseStationEnergyInfoMySqlExtDAO();
	}

	/**
	 * @return PowerBaseStationLogDAO
	 */
	public static function getPowerBaseStationLogDAO(){
		return new PowerBaseStationLogMySqlExtDAO();
	}

	/**
	 * @return PowerBaseStationRuningDataDAO
	 */
	public static function getPowerBaseStationRuningDataDAO(){
		return new PowerBaseStationRuningDataMySqlExtDAO();
	}

	/**
	 * @return PowerStationWarningDAO
	 */
	public static function getPowerStationWarningDAO(){
		return new PowerStationWarningMySqlExtDAO();
	}

	/**
	 * @return PowerWeatherDAO
	 */
	public static function getPowerWeatherDAO(){
		return new PowerWeatherMySqlExtDAO();
	}

	/**
	 * @return ProwerProjectDAO
	 */
	public static function getProwerProjectDAO(){
		return new ProwerProjectMySqlExtDAO();
	}


}
?>