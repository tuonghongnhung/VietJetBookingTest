<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Facebook\WebDriver\WebDriverBy;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class VjBaseTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLaravel(){
		$this->browse(function (Browser $browser) {
			$browser -> visit('https://www.vietjetair.com/Sites/Web/vi-VN/Home')
				     -> assertSee('Đăng nhập');
		});
	}
	
	public static function clickByXPath($browser, $xpath) {
		$browser->driver->findElement( WebDriverBy::xpath($xpath) )
					->click();	
		return $browser;
	}
	
}
