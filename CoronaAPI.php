<?php

class CoronaAPI {
	
	public function __construct() {
		echo $this->getCoronaInfo("tests","07/06/2022"); //Number of tests available '07/06/2022'
		echo $this->getCoronaInfo("cases"); //Number of current cases
		echo $this->getCoronaInfo("deaths"); //Current number of deaths
		echo $this->getCoronaInfo("recovered"); //Number of recoveries available
	}

	public function getCoronaInfo(string $data = "cases", ?string $date = null) :string {
        $date = $date ?? date("d/m/Y");
        $corona_site = json_decode(file_get_contents("https://raw.githubusercontent.com/ozanerturk/covid19-turkey-api/master/dataset/timeline.json", true), true);
        return number_format(intval(array_key_exists($date, $corona_site) ? $corona_site[$date][$data] : $corona_site[date("d/m/Y", strtotime("yesterday"))][$data]), 0, ".",".");
    }
}
new CoronaAPI();
?>
