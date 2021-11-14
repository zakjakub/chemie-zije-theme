<?php

/**
 * @param  null  $url
 *
 * @return array
 * @throws \Exception
 */
function google_sheet($url = null): array
{
    $array = [];
    if ($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $sheet = curl_exec($curl);
        curl_close($curl);
        preg_match('/(<table[^>]+>)(.+)(<\/table>)/', $sheet, $matches);
        $data = $matches['0'];
        $cells_xml = new SimpleXMLElement($data);
        $cells_json = json_encode($cells_xml, JSON_THROW_ON_ERROR);
        $cells = json_decode($cells_json, true, 512, JSON_THROW_ON_ERROR);
    }
    if (isset($cells) && is_array($cells)) {
        foreach ($cells['tbody']['tr'] as $row => $row_data) {
            $column = 'A';
            foreach ($row_data['td'] as $column_index => $cell) {
                if (!is_array($cell)) {
                    $array[($row + 1)][$column++] = $cell;
                } elseif ($cell['div']) {
                    $array[($row + 1)][$column++] = $cell['div'];
                }
            }
        }
    }

    return $array;
}
