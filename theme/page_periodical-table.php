<?php
/*
 * Template Name: Periodická tabulka prvků
 * Description: Stránka s interaktivní periodickou tabulkou prvků.
 * Template Post Type: page, study_material_cat, teach_material_cat
 */

use Zakjakub\ChemieZijeTheme\Model\ChemicalElement;

const GSHEET_URL = 'https://docs.google.com/spreadsheets/d/1QUGqq7ZxccdSeSu5KVp07AVSUjbFVApMGrCIem0qRGA/edit';
$data = [];
$elements = [];
$elementsData = [];
if (GSHEET_URL) {
    try {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, GSHEET_URL);
        curl_setopt($curl, CURLOPT_HEADER, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $sheet = curl_exec($curl);
        curl_close($curl);
        preg_match('/(<table[^>]+>)(.+)(<\/table>)/', $sheet, $matches);
        $data = $matches['0'];
        $cells_xml = new SimpleXMLElement($data);
        $cells_json = json_encode($cells_xml, JSON_THROW_ON_ERROR);
        $cells = json_decode($cells_json, true, 512, JSON_THROW_ON_ERROR);
        foreach (isset($cells) && is_array($cells) ? $cells['tbody']['tr'] : [] as $rowIndex => $row) {
            $columnLetter = 'A';
            foreach ($row['td'] as $columnIndex => $cell) {
                if (!is_array($cell) || ($cell['div'] ?? false)) {
                    $elementsData[($rowIndex)][$columnIndex++] = !is_array($cell) ? $cell : $cell['div'];
                }
            }
            $columnLetter++;
        }
        $keys = array_flip(array_shift($elementsData));
        foreach ($elementsData as $elementData) {
            $elements[] = ChemicalElement::fromRow($elementData, $keys);
        }
    } catch (Exception $e) {
        die('ERROR_ELEMENT: ' . $e->getMessage());
    }
}

$context = Timber::context();
$context['elements'] = $elements;
$templates = ["custom-templates/periodical-table.html.twig", 'post-types/page-layout.html.twig'];
Timber::render($templates, $context);
