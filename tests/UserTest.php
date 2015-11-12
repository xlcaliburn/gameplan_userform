<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{

    public function testMasterLinks()
    {
    	$this->visit('/')
    		 ->click('Gameplan Userform')
    		 ->seePageIs('/');

    	$this->visit('/')
    		->click('Admin Panel')
    		->seePageIs('admin');

    	$this->visit('admin')
    		 ->click('Gameplan Userform')
    		 ->seePageIs('/');

    	$this->visit('admin')
    		->click('Admin Panel')
    		->seePageIs('admin');

    	$this->visit('admin/14/edit')
    		->click('Gameplan Userform')
    		->seePageIs('/');

    	$this->visit('admin/14/edit')
    		->click('Admin Panel')
    		->seePageIs('admin');
    }

    public function testFormSubmitRedirect()
    {
    	$this->visit('/')
    		->press('Register')
    		->seePageIs('/');

    	$this->visit('admin/14/edit')
    		->press('Update')
    		->seePageIs('admin');    
    }

    public function testAdminPageLinks()
    {
    	$this->visit('admin')
    		->click('edit 14')
    		->seePageIs('admin/14/edit');	
    }
}
