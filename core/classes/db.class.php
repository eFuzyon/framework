<?php

	namespace Core;

	class Db 
	{

		public static $con;
		public static $table;

		public static function connect(){

			# Push env to var
			$mysql = $_ENV['database']['mysql'];

			# Connect to mysql
			self::$con = mysql_connect($mysql['host'], $mysql['username'], $mysql['password']);
			mysql_select_db($mysql['dbname']);

			# Pass the table along
			self::$table = static::$table;

			# 
			if (empty(self::$table)) :

				self::$table = strtolower(basename(str_replace("\\", "/", get_called_class())));

			endif; 

		}

		public static function find($values=null){

			self::connect();

			if ($values) :

				$query = "SELECT * FROM " . self::$table;

				if ($values) :

					$query .= " WHERE ";

					foreach ($values as $key => $value) :

						$query .= "{$key} = '{$value}' AND ";

					endforeach;

					$query = rtrim($query, " AND ");

				endif;

			endif;

			if ($query) :

				$r = @mysql_query($query, self::$con);
				$c = @mysql_num_rows($r);

			endif;

		}

	}