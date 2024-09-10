<?php
// src/Controller/StationController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StationController extends AbstractController
{
    /**
     * @Route("/search", name="search_station", methods={"GET", "POST"})
     */
    public function searchStation(Request $request): Response
    {
        $stationName = $request->query->get('station_name', null);

        // Chemin vers ton fichier CSV
        $file = $this->getParameter('kernel.project_dir') . '/public/uploads/emplacement-des-gares-idf.csv';

        if (!file_exists($file) || !is_readable($file)) {
            return $this->render('station/search.html.twig', [
                'error' => 'Fichier CSV introuvable ou illisible.',
                'stations' => null,
            ]);
        }

        // Lire le fichier CSV
        $csv = array_map(function($line) {
            return str_getcsv($line, ';');
        }, file($file));

        $header = array_shift($csv); // Extraction de l'en-tête

        $results = [];

        if ($stationName) {
            // Filtrer par nom de gare
            $results = array_filter($csv, function($row) use ($stationName) {
                return stripos($row[3], $stationName) !== false;
            });
        }

        return $this->render('station/search.html.twig', [
            'stations' => $results,
            'error' => empty($results) ? 'Aucune gare trouvée pour le nom : ' . $stationName : null,
        ]);
    }
}
