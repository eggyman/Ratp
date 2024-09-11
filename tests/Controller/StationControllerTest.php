<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StationControllerTest extends WebTestCase
{
    public function testSearchStationWithResults(): void
    {
        // Créer un client HTTP pour simuler une requête
        $client = static::createClient();

        // Effectuer une requête GET à l'URL de recherche avec un nom de station
        $client->request('GET', '/search?station_name=Châtillon-Montrouge');

        // Vérifier que la réponse est bien 200
        $this->assertResponseIsSuccessful();

        // Vérifier qu'un certain contenu est présent dans la réponse
        $this->assertSelectorTextContains('h2', 'Résultats de la recherche');
        $this->assertSelectorTextContains('td', 'Châtillon-Montrouge');
    }

    public function testSearchStationNoResults(): void
    {
        $client = static::createClient();

        // Effectuer une requête avec une station qui n'existe pas
        $client->request('GET', '/search?station_name=NomInexistant');

        $this->assertResponseIsSuccessful();

        // Vérifier que le message d'erreur est présent
        $this->assertSelectorTextContains('.alert-danger', 'Aucune gare trouvée pour le nom');
    }
}
