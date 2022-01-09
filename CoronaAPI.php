<?php

class CoronaAPI {

	public function __construct() {
		echo $this->returnToCoronaInfo("tests", "08/01/2022"); //Number of tests available date '08/01/2022'
		echo $this->returnToCoronaInfo("cases"); //Number of current cases
		echo $this->returnToCoronaInfo("deaths"); //Current number of deaths
		echo $this->returnToCoronaInfo("recovered"); //Number of recoveries available
	}

	public function getCoronaInfo(string $data = "cases", string $date = date("d/m/Y")) :string {
        $site = json_decode(file_get_contents("https://raw.githubusercontent.com/ozanerturk/covid19-turkey-api/master/dataset/timeline.json", true), true);
        return number_format(intval(array_key_exists($date, $site) ? $site[$date][$data] : $site[$date, strtotime("yesterday"))][$data]), 0, ".",".");
    }
}
new CoronaAPI();
?>
