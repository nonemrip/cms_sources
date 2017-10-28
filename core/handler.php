<?php
//обработчик исключений
if (!defined('_PLUGSECURE_'))
{
  die('Прямой вызов модуля запрещен!');
}

class handler
{
	//имя модуля, читаемое
	private static $className = 'Обработчик';
	

	public static function httpError($error)
	{
		$descript = array(
				'400'	=>	'Bad Request',
				'401'	=>	'Unauthorized',
				'402'	=>	'Payment Required',
				'403'	=>	'Forbidden',
				'404'	=>	'Not Found',
				'405'	=>	'Method Not Allowed',
				'406'	=>	'Not Acceptable',
				'407'	=>	'Proxy Authentication Required',
				'408'	=>	'Request Timeout',
				'409'	=>	'Conflict',
				'410'	=>	'Gone',
				'413'	=>	'Request Entity Too Large ',
				'429'	=>	'Too Many Requests',
				'444'	=>	'',
				'000'	=>	'Undefinded Error'
			);
		header($_SERVER['SERVER_PROTOCOL'].' '.$error.' '.$descript[$error]);
		header('Location: '.surl::genUri('error', $error));
	}
/*
 *	функция генерирует ошибку движка
 * 	$error - код ошибки
 * 	$data - некоторые данные об ошибке (если есть)
*/
	public static function engineError($error, $data = null)
	{
		switch ($error) {
			//БД
			case 'db_connect':
				$descript	=	'Ошибка при подключении к базе данных';
				break;
			case 'db_query':
				$descript	=	'Ошибка при выполнении запроса в базу данных';
				break;
			case 'db_empty_query':
				$descript	=	'Пустой запрос';
				break;
			case 'db_empty_prepare':
				$descript	=	'Пустой шаблон запроса';
				break;
			case 'db_empty_values':
				$descript	=	'Не получен массив данных для шаблона запроса';
				break;
			case 'db_unknown_type':
				$descript = 	'Неизвестный тип данных в запросе';
				break;
			case 'db_empty_type':
				$descript =		'Не указан тип данных в шаблоне запроса';
				break;
			//ШАБЛОНЫ
			case 'template_not_found':
				$descript	=	'Файл шаблона не найден';
				break;
			case 'template_part_not_found':
				$descript	=	'Файл части шаблона не найден';
				break;
			case 'template_not_configure':
				$descript	=	'Не получена конфигурация шаблона';
				break;
			//МОДУЛИ
			case 'module_not_found':
				$descript	=	'Не найден файл модуля';
				break;
			//ПЛАГИНЫ
			case 'plugin_not_found':
				$descript	=	'Не найден главный файл плагина';
				break;
			case 'plugin_part_not_found':
				$descript	=	'Не найден один из файлов плагина';
				break;
			case 'plugin_bad_try':
				$descript	=	'Попытка подключения неисправного плагина';
				break;
			case 'plugin_error':
				$descript	=	'Ошибка при подключении одного или нескольких плагинов';
				break;
			//ИСКЛЮЧЕНИЕ
			case 'exception':
				$descript	=	'Исключение';
				break;
			
			default:
				$descript	=	'Неизвестная ошибка.';
				break;
		}

		echo '
			<div style="padding: 10px; width: 80%; margin: 10px auto; background: #fff; border: 3px solid #FF0000;">
				<b>'.$descript.'</b>: '.$data.'
			</div>
			';

	}

	/*
	 *	функция для нормального вывода print_r или var_dump
	 *	$params - параметры вызываемой функции
	 */
	public static function vardump($data, $full = false)
	{
		if($full)
		{
			echo '
				<div style="padding: 10px; width: 80%; margin: 10px auto; background: #fff; border: 3px solid #FF0000;">
					<pre>';
						var_dump($data);
			echo '
					</pre>
				</div>
				';
		}
		else
		{
			echo '
				<div style="padding: 10px; width: 80%; margin: 10px auto; background: #fff; border: 3px solid #FF0000;">
					<pre>';
						print_r($data);
			echo '
					</pre>
				</div>
				';
		}
	}
	
	public static function getClassName()
	{		
		return self::$className;	
	}
}

?>