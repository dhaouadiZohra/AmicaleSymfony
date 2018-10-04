<?php

namespace GrapheBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GrapheControllerTest extends WebTestCase
{
    public function testChartline()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/chartLine');
    }

}
