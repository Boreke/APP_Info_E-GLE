<?php

class Capteur {

    function getLatestData() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=G10B");
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $data = curl_exec($ch);
        curl_close($ch);

        $data_tab = str_split($data, 33);

        /*echo "Tabular Data:<br />";
        for ($i = 0, $size = count($data_tab); $i < $size; $i++) {
            echo "Trame $i: $data_tab[$i]<br />";
        }*/
        

        $trames = [];
        foreach ($data_tab as $trame) {
            list($t, $o, $r, $c, $n, $v, $a, $x, $year, $month, $day, $hour, $min, $sec) = sscanf($trame, "%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");

            $trames[] = [
                'sensorType' => $c,
                'idcapteur' => intval($n),
                'value' => hexdec($v),
                'timestamp' => mktime($hour, $min, $sec, $month, $day, $year)
            ];
        }

        return $trames;
    }

    function updateCapteur() {
        $DB = new Database();
        $trames = $this->getLatestData();
        
        $currentTime = time();
        /*
        $interval = 5 * 60; 
        $recentTrames = array_filter($trames, function ($trame) use ($currentTime, $interval) {
            return ($currentTime - $trame['timestamp']) <= $interval;
        });
        */

        $soundValues = [];
        $tempValues = [];
        foreach ($trames as $trame) {
            //echo' ' . $trame['value'] . '<br />';
            if ($trame['sensorType'] == '7' && $trame['value'] <= 150) {
                $soundValues[] = $trame['value'];
            } elseif ($trame['sensorType'] == '3' && $trame['value'] <= 50) {
                $tempValues[] = $trame['value'];
            }
        }

        $averageSound = !empty($soundValues) ? array_sum($soundValues) / count($soundValues) : null;
        $averageTemp = !empty($tempValues) ? array_sum($tempValues) / count($tempValues) : null;

        $idcapteur = 1;
        $salle_idsalle = 1; 

        $query = "INSERT INTO capteur (idcapteur, niveau_sonore, temperature, salle_idsalle)
                VALUES (:idcapteur, :niveau_sonore, :temperature, :salle_idsalle)
                ON DUPLICATE KEY UPDATE
                niveau_sonore = VALUES(niveau_sonore),
                temperature = VALUES(temperature)";

        $params = [
            'idcapteur' => $idcapteur,
            'niveau_sonore' => $averageSound,
            'temperature' => $averageTemp,
            'salle_idsalle' => $salle_idsalle
        ];

        $result = $DB->read($query, $params);

        header('Content-Type: application/json');
        echo json_encode($result);
        echo json_encode([
            'sound' => $soundValues,
            'temp' => $tempValues,
            'timestamp' => $currentTime,
            'averageSound' => $averageSound,
            'averageTemp' => $averageTemp
        ]);
    }
}

?>
