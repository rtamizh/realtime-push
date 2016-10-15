<?php 
	namespace Realtime\Push;

	use Illuminate\Config\Repository as Config;

	/**
	* 
	*/
	class RealtimePusher
	{
		private $pconfig;
		
		function __construct(Config $config)
		{
			if ($config->has('realtime-pusher')) {
				$this->pconfig = $config->get('realtime-pusher');
			}else{
				throw new Exception('No config found');
			}
		}

		public function makeRequest($url, $data) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			if ($this->pconfig['username'] && $this->pconfig['password']) {
				curl_setopt($process, CURLOPT_HEADER, 1);
				curl_setopt($process, CURLOPT_USERPWD, $username . ":" . $password);
				curl_setopt($process, CURLOPT_TIMEOUT, 30);	
			}
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
			curl_setopt($ch, CURLOPT_PORT, $this->pconfig['port']);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array(
				"cache-control: no-cache",
    			"content-type: application/x-www-form-urlencoded",
			));
			// receive server response ...
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$server_output = curl_exec($ch);
			$server_output = json_decode($server_output, TRUE);
			dd($server_output);

			curl_close($ch);

			return $server_output;
		}

		public function createApp($name)
		{
			$data = ['name' => $name];
			$url = $this->pconfig['url'].':'.$this->pconfig['port'].'/api/app/create';
			$response = $this->makeRequest($url, $data);
			return $response;
		}

		public function createUser($name, $password)
		{
			$data = array(
				'name' => $name,
				'password' => $password,
				'app_secret' => $this->pconfig['app_secret_id']
			);
			$url = $this->pconfig['url'].':'.$this->pconfig['port'].'/api/user/create';
			$response = $this->makeRequest($url, $data);
			return $response;
		}

		public function createNotification($user_secret, $text, $image=null, $link=null)
		{
			$data = array(
				'app_secret' => $this->pconfig['app_secret_id'],
				'user_secret' => $user_secret,
				'text' => $text,
				'image' => $image
			);
			$url = $this->pconfig['url'].':'.$this->pconfig['port'].'/api/app/notification/create';
			$response = $this->makeRequest($url, $data);
			return $response;
		}
	}
