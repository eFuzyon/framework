<?php

	namespace Core;

	class Template 
	{

		public static function Parse($content = null, $replace = null){

			# Load globals
			global $_CORE;

			# Check for content
			if ($content) :

				# Vars
				$output = $content;			

				# Parse core messages
				if (isset($_CORE['messages'])) :

					# Vars
					$keys = [];
					$values = [];

					# Split array
					foreach ($_CORE['messages'] as $key => $value) :
						$keys[] = "{{{$key}}}";
						$values[] = $value;
					endforeach;

					# Parse vars in the content
					$output = str_replace($keys, $values, $output);

				endif;

				# Parse custom messages
				if (isset($replace)) :

					# Vars
					$keys = [];
					$values = [];

					# Split array
					foreach ($replace as $key => $value) :
						$keys[] = "{{{$key}}}";
						$values[] = $value;
					endforeach;

					# Parse vars in the content
					$output = str_replace($keys, $values, $output);

				endif;

				# Output
				return $output;

			endif;

		}

	}