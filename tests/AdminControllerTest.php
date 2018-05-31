<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminControllerTest extends WebTestCase
{
    public function testAdminPage()
    {
        $client = static::createClient();
        //---------------------------------------------------------------
        //Prisijungiame paprastu vartotoju
        $crawler = $client->request('GET', '/login');
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame(1, $crawler->filter('html:contains("LOGIN")')->count());        
        $form = $crawler->selectButton('_submit')->form();
        // set some values
        $form['_username'] = 'asd';
        $form['_password'] = 'asd';
        // submit the form
        $crawler = $client->submit($form);
        $this->assertTrue($client->getResponse()->isRedirect());
        $crawler = $client->followRedirect();
        //---------------------------------------------------------------
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        //Ar Esame index.html?
        $this->assertSame(1, $crawler->filter('html:contains("Welcome")')->count());
        //------------------------------------------------------------------------------
        //Pabandome įeiti į /admin
        $crawler = $client->request('GET', '/admin/');
        $this->assertSame(403, $client->getResponse()->getStatusCode());

        //Atsijungiame
        $crawler = $client->request('GET', '/logout');
        $this->assertTrue($client->getResponse()->isRedirect());
        $crawler = $client->followRedirect();
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame(1, $crawler->filter('html:contains("Register")')->count());

        //Pabandome įeiti į /admin
        $crawler = $client->request('GET', '/admin/');
        $this->assertTrue($client->getResponse()->isRedirect());
        $crawler = $client->followRedirect();
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame(1, $crawler->filter('html:contains("LOGIN")')->count());

        //------------------------------------------------------------------------------
        //Prisijungiame
        $crawler = $client->request('GET', '/login');

        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame(1, $crawler->filter('html:contains("LOGIN")')->count());

        $form = $crawler->selectButton('_submit')->form();
        // set some values
        $form['_username'] = 'armsab';
        $form['_password'] = 'arminas';
        // submit the form
        $crawler = $client->submit($form);
        $this->assertTrue($client->getResponse()->isRedirect());
        $crawler = $client->followRedirect();
        //---------------------------------------------------------------
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        //Ar Esame /admin?
        $this->assertSame(1, $crawler->filter('html:contains("Actions")')->count());
        //------------------------------------------------------------------------------
        //Pabandome įeiti į /admin/clients 
        $crawler = $client->request('GET', '/admin/clients');
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        //Iejome patikriname ar tikrai esame admin puslapi paieskodami raktazodzio admin
        $this->assertSame(1, $crawler->filter('html:contains("Clients")')->count());
        //------------------------------------------------------------------------------
        //Pabandome įeiti į /admin/services
        $crawler = $client->request('GET', '/admin/services');
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        //Iejome patikriname ar tikrai esame admin puslapi paieskodami raktazodzio admin
        $this->assertSame(1, $crawler->filter('html:contains("Services")')->count());
        //------------------------------------------------------------------------------
        //Pabandome redaguoti admin/services irasa
        $link = $crawler->selectLink('edit')->last()->link();
        $crawler = $client->click($link);
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        //Iejome patikriname ar tikrai esame admin puslapi paieskodami raktazodzio admin
        $this->assertSame(1, $crawler->filter('html:contains("Edit Service")')->count());
        $form = $crawler->selectButton('Update')->form();
        // set some values
        $form['service[title]'] = 'AD';
        // submit the form
        $crawler = $client->submit($form);
        $this->assertTrue($client->getResponse()->isRedirect());
        $crawler = $client->followRedirect();
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        //Ar tikrai pakeitem reiksme?
        $this->assertSame(1, $crawler->filter('html:contains("ASD")')->count());
        //------------------------------------------------------------------------------
        //Pabandome istrinti admin/services irasa
        $link = $crawler->selectLink('show')->last()->link();
        $crawler = $client->click($link);
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame(1, $crawler->filter('html:contains("Delete")')->count());
        $form = $crawler->selectButton('Delete')->form();
        $crawler = $client->submit($form);
        $this->assertTrue($client->getResponse()->isRedirect());
        $crawler = $client->followRedirect();
        //------------------------------------------------------------------------------
        //Pabandome sukurti admin/services irasa
        $link = $crawler->selectLink('Create new')->last()->link();
        $crawler = $client->click($link);
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        //Iejome patikriname ar tikrai esame admin puslapi paieskodami raktazodzio admin
        $this->assertSame(1, $crawler->filter('html:contains("Create new service")')->count());
        $form = $crawler->selectButton('Save')->form();
        // set some values
        $form['service[title]'] = 'AAA';
        $form['service[available]'] = '1';
        $form['service[price]'] = '1.1';
        $form['service[category]'] = '1';
        $form['service[subCategory]'] = '1';
        // submit the form
        $crawler = $client->submit($form);
        $this->assertTrue($client->getResponse()->isRedirect());
        $crawler = $client->followRedirect();
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        //Ar tikrai pakeitem reiksme?
        $this->assertSame(1, $crawler->filter('html:contains("AAA")')->count());
        //------------------------------------------------------------------------------
        //Pabandome įeiti į /admin/cars
        $crawler = $client->request('GET', '/admin/cars');
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        //Iejome patikriname ar tikrai esame admin puslapi paieskodami raktazodzio admin
        $this->assertSame(1, $crawler->filter('html:contains("Cars")')->count());
        //------------------------------------------------------------------------------
        //Pabandome įeiti į pirma pasitaikiusia masina
        $link = $crawler->selectLink('Show more details')->link();
        $crawler = $client->click($link);
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        //Iejome patikriname ar tikrai esame admin puslapi paieskodami raktazodzio admin
        $this->assertSame(1, $crawler->filter('html:contains("License plate")')->count());
        //------------------------------------------------------------------------------
        //Pabandome įeiti į masinos savininko informacija
        $link = $crawler->selectLink('Show owner details')->link();
        $crawler = $client->click($link);
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        //Iejome patikriname ar tikrai esame admin puslapi paieskodami raktazodzio admin
        $this->assertSame(1, $crawler->filter('html:contains("Username")')->count());
        //------------------------------------------------------------------------------
        //Pabandome pazymeti automobili kaip atlikta
        $crawler = $client->request('GET', '/admin/');
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        //Iejome patikriname ar tikrai esame admin puslapi paieskodami raktazodzio admin
        $this->assertSame(1, $crawler->filter('html:contains("Actions")')->count());
        $link = $crawler->selectLink('Ordered services')->last()->link();
        $crawler = $client->click($link);
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame(1, $crawler->filter('html:contains("Mark as repaired")')->count());
        $link = $crawler->selectLink('Mark as repaired')->link();
        $crawler = $client->click($link);
        $this->assertTrue($client->getResponse()->isRedirect()); //Patvirtinti uzsakyma
        $crawler = $client->followRedirect();
        $this->assertTrue($client->getResponse()->isRedirect()); // Nukreipti i /admin
        $crawler = $client->followRedirect();
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame(1, $crawler->filter('html:contains("Actions")')->count());
        // Pries tai buvo 4 uzsakymai ivykdyti, tai turėtų būti 5 įvykdyti
        $this->assertSame(5, $crawler->filter('td:contains("Done")')->count());
        //------------------------------------------------------------------------------
        //Atsijungiame
        $crawler = $client->request('GET', '/logout');
        $this->assertTrue($client->getResponse()->isRedirect());
        $crawler = $client->followRedirect();
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame(1, $crawler->filter('html:contains("Register")')->count());
    }
}
