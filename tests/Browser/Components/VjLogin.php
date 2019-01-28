<?php

namespace Tests\Browser\Components;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Component as BaseComponent;
use Tests\Browser\VjBaseTest;

class VjLogin extends BaseComponent
{
    /**
     * Get the root selector for the component.
     *
     * @return string
     */
    public function selector()
    {
        return '#container';
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
	
	public function LoginSubmit($browser,$name,$password){
		$browser -> type('txtAgentID',$name)
				 -> type('txtAgentPswd',$password)
				 -> clickLink('Truy cập')
				// -> asserSee('Đặt chuyến bay')
				 -> screenshot('LoginFinishing');
		return $browser;
	}
}
