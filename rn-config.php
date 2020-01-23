<?php
	$top_bar = 1;
	function getOSFun() { 
		$user_agent = $_SERVER['HTTP_USER_AGENT'];
		$os_platform    =   "Unknown OS Platform";
		$os_array   =   array(
							'/windows nt 10/i'     =>  'Windows 10',
							'/windows nt 6.3/i'     =>  'Windows 8.1',
							'/windows nt 6.2/i'     =>  'Windows 8',
							'/windows nt 6.1/i'     =>  'Windows 7',
							'/windows nt 6.0/i'     =>  'Windows Vista',
							'/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
							'/windows nt 5.1/i'     =>  'Windows XP',
							'/windows xp/i'         =>  'Windows XP',
							'/windows nt 5.0/i'     =>  'Windows 2000',
							'/windows me/i'         =>  'Windows ME',
							'/win98/i'              =>  'Windows 98',
							'/win95/i'              =>  'Windows 95',
							'/win16/i'              =>  'Windows 3.11',
							'/macintosh|mac os x/i' =>  'OSX',
							'/mac_powerpc/i'        =>  'OSX',
							'/linux/i'              =>  'Linux',
							'/ubuntu/i'             =>  'Ubuntu',
							'/iphone/i'             =>  'iOS',
							'/iPhone/i'             =>  'iOS',
							'/ipod/i'               =>  'iOS',
							'/ipad/i'               =>  'iOS',
							'/android/i'            =>  'Android',
							'/blackberry/i'         =>  'BlackBerry',
							'/webos/i'              =>  'Mobile',
							'/windows phone/i'		=>	'Windows Phone'
						);
		foreach ($os_array as $regex => $value) { 
			if (preg_match($regex, $user_agent)) {
				$os_platform    =   $value;
			}
		}   
		return $os_platform;
	}
	$operating_system = getOSFun();
	if(($operating_system == 'iOS')||($operating_system == 'Android')||($operating_system == 'BlackBerry')||($operating_system == 'Windows Phone')||
	($operating_system == 'Mobile')){
		$device_type = 0;
	}else{
		$device_type = 1;
	}
	?>