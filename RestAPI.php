<?php
namespace CodeBoost\RestAPI;
class RestAPI
{
	protected $_data = array();
	protected $_pass_data = array();
	protected $_url = null;

	/**
	 * @param array $arr | expect all necessary data
	 * @return CSV, PDF, DOCX
	 */
	public function optionData($arr = array())
	{
		$keys = array_keys($arr);
		$keys = $this->dataOrdering($keys);
		
		if($keys[0] == 'as' && $keys[1] == 'data' && $keys[2] == 'key' && $keys[3] == 'output' && $keys[4] == 'type') {
			$arr['actual_address'] = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			$this->_data = $arr; 
			if($arr['type'] == 'csv') {
				$this->_url = 'http://jaidulit.com/codeboost/api/csv';
			} else if($arr['type'] == 'docx') {
				$this->_url = 'http://jaidulit.com/codeboost/api/docx';
			} else {
				$this->_url = 'http://jaidulit.com/codeboost/api/pdf';
			}
			$this->_pass_data = $this->actionData($this->_data, $this->_url);
			return $this->_pass_data;

		} else {
			echo 'Sorry!! You input wrong array key';
		}
	}

	/**
	 * @param array $keys | expect array keys
	 * @return array by sorting
	 */
	public function dataOrdering($keys = array())
	{
		$data = $keys;
		sort($data);
		return $data;
	}

	/**
	 * @param array $data | expect array of all data
	 * @param null $url | expect URl for posting the data
	 * @return string
	 */
	public function actionData($data = array(), $url = null)
	{
		$post_data = json_encode($data);
		$post_array = array(
			'http' => array(
				'method' => 'POST',
				'header' => 'Content-type: application/x-www-form-urlencoded',
				'content' => $post_data
			)
		);

		$context = stream_context_create($post_array);

		$result = file_get_contents($url, false, $context);
		return $result;
	}
}
