<?php

namespace Tests\Browser\Components;

use Laravel\Dusk\Browser;
use Tests\Browser\VjBaseTest;
use Laravel\Dusk\Component as BaseComponent;
use Facebook\WebDriver\WebDriverBy;

class VjGoto extends BaseComponent
{
    /**
     * Get the root selector for the component.
     *
     * @return string
     */
    public function selector()
    {
        return '#main';
    }

    /**
     * Assert that the browser page contains the component.
     *
     * @param  Browser  $browser
     * @return void
     */
    public function assert(Browser $browser)
    {
        $browser->assertVisible($this->selector());
    }

    /**
     * Get the element shortcuts for the component.
     *
     * @return array
     */
    public function elements()
    {
        return [
            '@element' => '#selector',
        ];
    }
	
	public function GotoLogin($browser){
		
		VjBaseTest::clickByXPath($browser,'//a[contains(text(),"Đăng nhập")]');
		$browser-> screenshot('GoToLogin1');
		VjBaseTest::clickByXPath($browser,'//a[contains(text(),"Đại lý bán vé")]');
		
		return $browser;
	}
}
