<?php
 /**
 * Example Implementation of PSR-0
 *
 * @param $className
 */
function autoload($className)
{
    $className = ltrim($className, '\\');
    $className = str_replace('\\', '/', $className);
    $fileName = '';
    $fileName = PathList::GetPath(PathList::FILE_PATH_CONTROLLER). str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
    if(!file_exists($fileName))
	{		
                $fileName = PathList::GetPath(PathList::FILE_PATH_MODEL). str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
		if(!file_exists($fileName))
		{
                    $fileName = PathList::GetPath(PathList::FILE_PATH_MODEL). str_replace('_', DIRECTORY_SEPARATOR, $className) . '/index.php';
		}
	}
    require $fileName;
 }
 
spl_autoload_register('autoload');
