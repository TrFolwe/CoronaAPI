<?php

class CoronaAPI {

	public function __construct() {
		echo $this->returnToCoronaInfo("tests"); //Number of tests available
		echo $this->returnToCoronaInfo("cases"); //Number of current cases
		echo $this->returnToCoronaInfo("deaths"); //Current number of deaths
		echo $this->returnToCoronaInfo("recovered"); //Number of recoveries available
	}

	public function getCoronaInfo(string $data = "cases") :string {
        $corona_site = json_decode(file_get_contents("https://raw.githubusercontent.com/ozanerturk/covid19-turkey-api/master/dataset/timeline.json", true), true);
        return number_format(intval(array_key_exists(date("d/m/Y"), $corona_site) ? $corona_site[date("d/m/Y")][$data] : $corona_site[date("d/m/Y", strtotime("yesterday"))][$data]), 0, ".",".");
    }
}
new CoronaAPI();
?>
