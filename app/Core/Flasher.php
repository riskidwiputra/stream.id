<?php 

/**
 * 
 */
class Flasher
{
	
	public static function setFlash($pesan, $tipe)
	{
		$_SESSION['flash'] = [
			'pesan' => $pesan, 
			'tipe' => $tipe
		];
	} 
	public static function setFlashLogin($pesan, $tipe)
	{
		$_SESSION['flashLogin'] = [
			'pesan' => $pesan, 
			'tipe' => $tipe
		];
	} 

	public static function flash()
	{
		if (isset($_SESSION['flash'])) {
			echo '
				<div class="alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					' . $_SESSION['flash']['pesan'] . '
				</div>
				';
			unset($_SESSION['flash']);
		}
	} 
	public static function flashLogin()
	{
		if (isset($_SESSION['flashLogin'])) {
			echo '
				<div class="alert alert-' . $_SESSION['flashLogin']['tipe'] . ' alert-dismissible fade show" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					' . $_SESSION['flashLogin']['pesan'] . '
				</div>
				';
			unset($_SESSION['flashLogin']);
		}
	} 
}










class Session {  

	public function __construct()
	{
		session_start();
	}

	public static function set($session, $data)
	{ 
		$_SESSION[$session] = $data; 
		return true;
	}

	public static function get($session)
	{
		return $_SESSION[$session];
	}

	public static function unset($session = null)
	{ 
		if (is_null($session)) {
			session_unset();
		} else {
			unset($_SESSION[$session]);
		}
	}

	public static function check($session)
	{
		if (empty($_SESSION[$session]) || is_null($_SESSION[$session])) {
			return false;
		} else {
			return true;
		}
	}  

}