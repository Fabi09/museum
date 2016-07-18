<?php
function RETURN_CSVFILE_CONTENT ($file)
{
	# => Function to return an array read from a csv-file
	# Parameters: -

	$return_array = array ();

	if (file_exists ($file))
	{
		$fp = fopen ($file, 'r');
			flock ($fp, LOCK_SH);
				$i = - 1;
				while (($temp_array = fgetcsv ($fp, filesize ($file), ';')) !== false)
				{
					if ($i != - 1)
					{
						foreach ($header_array as $key_ind => $content)
						{
							# Set $return_array
							# Format, i.e.: $return_array[0]['TEXT_EN'] = 'Hello world'
							#               $return_array[0]['TEXT_DE'] = 'Hallo Welt'
							if (isset ($temp_array[$key_ind]))
							{
								$return_array[$i][$content] = $temp_array[$key_ind];
							}
							else
							{
								$return_array[$i][$content] = '';
							}
						}
					}
					else
					{
						# Get associate header keys for $return_array
						# Format, i.e.: $header_array[0] = 'TEXT_EN'
						#               $header_array[1] = 'TEXT_DE'
						$header_array = $temp_array;
					}
					$i++;
				}
			flock ($fp, LOCK_UN);
		fclose ($fp);
	}

	return $return_array;
}