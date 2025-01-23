<?php

// namespace App\Helpers;
// composer dump-autoload


/**
 * This is fucntion to split the full name.
 * @param $name
 * @return array $names
 */
if (!function_exists('split_full_name'))
{
	function split_full_name($name) {
		$parts = array();

		while ( strlen( trim($name)) > 0 ) {
			$name = trim($name);
			$string = preg_replace('#.*\s([\w-]*)$#', '$1', $name);
			$parts[] = $string;
			$name = trim( preg_replace('#'.$string.'#', '', $name ) );
		}

		if (empty($parts)) {
			return false;
		}

		$parts = array_reverse($parts);
		$name = array();
		$name['f_name'] = $parts[0];
		$name['m_name'] = (isset($parts[2])) ? $parts[1] : '';
		$name['l_name'] = (isset($parts[2])) ? $parts[2] : ( isset($parts[1]) ? $parts[1] : '');

		return $name;
	}
}

/**
 * This is fucntion to convert list to ids by field.
 * @param $list
 * @param $field
 * @return array
 */
if (!function_exists('convertRowsToIds'))
{
    function convertRowsToIds($list, $field, $justrow = false)
    {
        $ids = array();
        if($justrow == false)
        {
            foreach ($list as $key => $value)
            {
                if(is_object($value))
                    $ids[] = $value->$field;
                else
                    $ids[] = $value[$field];
            }
        }
        else
        {
            $ids = $list->$field;
        }

		return $ids;
	}
}

/**
 * This is fucntion to return visibility List.
 * @return array
 */
if (!function_exists('get_visibility_list'))
{
	function get_visibility_list()
	{
        return [
			'1' => 'Visible',
			'0' => 'Invisible',
		];
	}
}

/**
 * This is fucntion to return enabler list.
 * @return array
 */
if (!function_exists('get_enabler_list'))
{
	function get_enabler_list()
	{
        return [
			'1' => 'Enabled',
			'0' => 'Disabled',
		];
	}
}

/**
 * This is fucntion to return YES NO list.
 * @return array
 */
if (!function_exists('get_yesNo_list'))
{
	function get_yesNo_list()
	{
        return [
			true => 'Yes',
			false => 'No',
		];
	}
}

/**
 * This is fucntion to return Gender List.
 * @return array
 */
if (!function_exists('get_gender_list'))
{
	function get_gender_list()
	{
        return [
			'male' => 'Male',
			'female' => 'Female',
		];
	}
}

/**
 * This is fucntion to return Status List.
 * @return array
 */
if (!function_exists('get_status_list'))
{
	function get_status_list()
	{
        return [
			'active' => 'Active',
			'suspended' => 'Suspended',
			'closed' => 'Closed',
		];
	}
}

/**
 * This is fucntion to Uniq Id.
 * @return String
*/
if (!function_exists('getUniqId'))
{
	function getUniqId($model = null, $key = null)
	{
		do {
			// $uniqid = uniqid();
			$uniqid = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 13); // 13 is limit.
		} while ($model::where($key, $uniqid)->first());
	
		return $uniqid;
	}
}

/**
 * This is fucntion to Uniq Id.
 * @return String
*/
if (!function_exists('getRandomStringRand'))
{
	function getRandomStringRand($length = 10)
    {
        $stringSpace = '0123456789abcdefghijklmnopqrstuvwxyz';
        $stringLength = strlen($stringSpace);
        $randomString = '';
        for ($i = 0; $i < $length; $i ++) {
            $randomString = $randomString . $stringSpace[rand(0, $stringLength - 1)];
        }

        return $randomString;
    }
}

/**
 * This is function to get admins.
 * @return Array.
*/
if (!function_exists('get_admins_stuff'))
{
    function get_admins_stuff()
	{
		return \App\Models\User::where('is_admin', true)->get();
    }
}

/**
 * This is function to return User Object.
 * @return array
*/
if (!function_exists('auth_user'))
{
	function auth_user($check = false)
	{
		if($check) {
			return auth()->check();
		} else {
			return auth()->user();
		}
	}
}

/**
 * This is function to return Unique Code.
 * @return array
*/
if (!function_exists('unique_code'))
{
	function unique_code($limit = 10)
    {
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
    }
}