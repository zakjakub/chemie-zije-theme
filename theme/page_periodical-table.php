<?php
/*
 * Template Name: Periodická tabulka prvků
 * Description: Stránka s interaktivní periodickou tabulkou prvků.
 * Template Post Type: page, study_material_cat, teach_material_cat
 */

const GSHEET_URL = 'https://docs.google.com/spreadsheets/d/1QUGqq7ZxccdSeSu5KVp07AVSUjbFVApMGrCIem0qRGA/edit';
$data = [];
if (GSHEET_URL) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, GSHEET_URL);
    curl_setopt($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $sheet = curl_exec($curl);
    curl_close($curl);
    preg_match('/(<table[^>]+>)(.+)(<\/table>)/', $sheet, $matches);
    $data = $matches['0'];
    try {
        $cells_xml = new SimpleXMLElement($data);
        $cells_json = json_encode($cells_xml, JSON_THROW_ON_ERROR);
        $cells = json_decode($cells_json, true, 512, JSON_THROW_ON_ERROR);
    } catch (Exception $e) {
    }
}
foreach (isset($cells) && is_array($cells) ? $cells['tbody']['tr'] : [] as $rowIndex => $row) {
    $columnIndex = 'A';
    foreach ($row['td'] as $column_index => $cell) {
        if (!is_array($cell)) {
            $elementsData[($rowIndex + 1)][$columnIndex++] = $cell;
        } elseif ($cell['div']) {
            $elementsData[($rowIndex + 1)][$columnIndex++] = $cell['div'];
        }
    }
}

die(var_export($elementsData, true));

$context = Timber::context();
$context['elements'] = $data;
$templates = ["custom-templates/periodical-table.html.twig", 'post-types/page-layout.html.twig'];
Timber::render($templates, $context);
