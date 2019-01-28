<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Facebook\WebDriver\WebDriverBy;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class JestarBaseTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testJestar(){
		$this->browse(function (Browser $browser) {
			$browser -> visit('https://www.jetstar.com/vn/vi/home')
				     -> assertSee('Đăng nhập đại lý');
		});
	}
	
	public static function clickByXPath($browser, $xpath) {
		$browser->driver->findElement( WebDriverBy::xpath($xpath) )
					->click();	
		return $browser;
	}
}
