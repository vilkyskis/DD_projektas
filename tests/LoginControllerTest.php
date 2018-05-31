<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class LoginControllerTest extends WebTestCase
{
    public function testSomething()
    {
        $client = static::createClient();
        //---------------------------------------------------------------
        $crawler = $client->request('GET', '/login');
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        //Ar esame login.html?
        $this->assertSame(1, $crawler->filter('html:contains("LOGIN")')->count());
        //Pabandome prisijungti be parametru
        $form = $crawler->selectButton('_submit')->form();
        $crawler = $client->submit($form);
        $this->assertTrue($client->getResponse()->isRedirect());
        $crawler = $client->followRedirect();
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame(1, $crawler->filter('html:contains("Invalid credentials")')->count());
        //----------------------------------
        //Pabandome palikti palikti slaptazodi tuscia
        $form = $crawler->selectButton('_submit')->form();
        // set some values
        $form['_username'] = 'armsab';
        $form['_password'] = '';
        // submit the form
        $crawler = $client->submit($form);
        $this->assertTrue($client->getResponse()->isRedirect());
        $crawler = $client->followRedirect();
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame(1, $crawler->filter('html:contains("Invalid credentials")')->count());
        //-------------------------------------------
        //Pabandome palikti palikti varda tuscia
        $form = $crawler->selectButton('_submit')->form();
        // set some values
        $form['_username'] = '';
        $form['_password'] = 'arminas';
        // submit the form
        $crawler = $client->submit($form);
        $this->assertTrue($client->getResponse()->isRedirect());
        $crawler = $client->followRedirect();
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame(1, $crawler->filter('html:contains("Invalid credentials")')->count());
        //-------------------------------------------
        //Prisijungiame
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
        //Ar Esame index.html?
        $this->assertSame(1, $crawler->filter('html:contains("Welcome")')->count());
        //Atsijungiame
        $crawler = $client->request('GET', '/logout');
        $this->assertTrue($client->getResponse()->isRedirect());
        $crawler = $client->followRedirect();
        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame(1, $crawler->filter('html:contains("Register")')->count());
    }
}
