<?php //
ini_set('display_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('Europe/Kaliningrad');

    
// Подключаем файл реализующий автозагрузку
require_once PathList::GetPath(PathList::FILE_PATH_CONTROLLER).'autoload.php';
require_once(PathList::GetPath(PathList::FILE_PATH_CONFIG).'application_top.php');
//require('includes/plugins.php');


/*
--Включить логирование--
ini_set('log_errors', 'On');
ini_set('error_log', PathList::GetPath(PathList::FILE_PATH_LOGS).'/logFile.log');

*/

if (!isset($_SESSION)) 
{	       
    session_start();
}

//$app = new app();
app::run();
	
class PathList
{
	const FILE_PATH_CONTROLLER = "controller";
	const FILE_PATH_LOGS = "logs";
	const FILE_PATH_MODEL = "model";
	const FILE_PATH_CONFIG = "config";
        const FILE_PATH_VIEW = "view";
        

        
	
	
	// ОЯЗАТЕЛЬНО добавлять сюда все константы путей
	static $arFilePathC = array(
		self::FILE_PATH_CONTROLLER,
		self::FILE_PATH_LOGS,
		self::FILE_PATH_MODEL,
		self::FILE_PATH_CONFIG,
                self::FILE_PATH_VIEW,
                
	);
	
	static $arFilePath = null; 
        
	static function GetPath($type)
	{
		self::SetPath();
		if(isset(self::$arFilePath[$type]))
		{
			return self::$arFilePath[$type];
		}
		return null;
	}
	
	static function SetPath()
	{
		if(self::$arFilePath === null)
		{
			foreach(self::$arFilePathC as $c)
			{
				self::$arFilePath[$c] = $_SERVER['DOCUMENT_ROOT'] . "/../" . $c . "/";
			}
		}
	}
	
}


