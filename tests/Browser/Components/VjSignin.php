<?php

namespace Tests\Browser\Components;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Component as BaseComponent;

class VjSignin extends BaseComponent
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
	
	public function Signin($browser,$){
		$browser -> select('#lstPaxGender')
				 -> type('#txtProfFName',)
				 -> type('#txtPassport',)
				 -> type('#txtProfLName',)
				 -> select('#lstPax1_PassportCtry')
				 -> type('#txtProfCity',)
				 -> select('#txtPax1_Ctry',)
				 -> select('#txtPax1_Prov',)
				 -> type('#txtProfAddr1',)
				 -> type('#txtProfHFax',)
				 -> type('txtProfEmail',)
				 -> type('#txtProfUserPswd',)
				 -> type('#txtProfUserPswdConfirm',)
				 -> select('#lstOrigAP',)
				 -> select('#lstDestAP',)
				 -> type('#txtSecQuestion',)
				 -> type('#txtSecAnswer',)
				 -> clickLink('Đăng ký');
		 return $browser;
	}
}
