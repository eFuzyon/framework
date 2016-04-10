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

		public static function Call($template = null, $replace = null) {

			# Does the template exists?
			if (file_exists(BASE_PATH_APP . "view/{$template}.tpl")) :

				# Create a cache for the content
				ob_start();
				include BASE_PATH_APP . "view/{$template}.tpl";
				$content = ob_get_contents();
				ob_end_clean();

				# Output
				if ($content) echo $content;

			endif;

		}

	}