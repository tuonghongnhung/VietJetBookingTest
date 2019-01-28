<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Tests\Browser\JestarBaseTest;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class JestarGotoTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testBookingJestar()
    {
        $this->browse(function (Browser $browser) use($name,$password,$round_trip,$from,$to,$date1,$adult,$children,$bagage,$seat){
            $browser	->visit('https://www.jetstar.com/vn/vi/home');
						JestarBaseTest::clickByXPath($browser,'//span[contains(text(),"Đăng nhập đại lý")]')
						-> type('#ControlGroupNewTradeLoginAgentView_AgentNewTradeLoginView_TextBoxUserID',$name)
						-> type('#ControlGroupNewTradeLoginAgentView_AgentNewTradeLoginView_PasswordFieldPassword',$password)
						-> press('.btn-flow')
						-> pause(1000);
						JestarBaseTest::clickByXPath($browser,'//*[contains(text(),"'.$round_trip.'")]');
						JestarBaseTest::clickByXPath($browser,'//*[@id="ControlGroupTradeSalesHomeView_AvailabilitySearchInputTradeSalesHomeView_TextBoxMarketOrigin1"]');
						JestarBaseTest::clickByXPath($browser,'//*[contains(text(),"'.$from.'")]');
						JestarBaseTest::clickByXPath($browser,'//*[@id="ControlGroupTradeSalesHomeView_AvailabilitySearchInputTradeSalesHomeView_TextBoxMarketDestination1"]');
						JestarBaseTest::clickByXPath($browser,'//*[contains(text(),"'.$to.'")]');
						$browser -> type('#ControlGroupTradeSalesHomeView_AvailabilitySearchInputTradeSalesHomeView_TextboxDepartureDate1',$date1)
								 -> select('#ControlGroupTradeSalesHomeView_AvailabilitySearchInputTradeSalesHomeView_DropDownListPassengerType_ADT',$adult)
								 -> select('#ControlGroupTradeSalesHomeView_AvailabilitySearchInputTradeSalesHomeView_DropDownListPassengerType_CHD',$children)
								 -> select('#ControlGroupTradeSalesHomeView_AvailabilitySearchInputTradeSalesHomeView_DropDownListPassengerType_INFANT',$infant)
								 -> press('#ControlGroupTradeSalesHomeView_AvailabilitySearchInputTradeSalesHomeView_ButtonSubmit')
								 -> pause(1000)
								 -> script("$('html, body').animate({ scrollTop: $('.button-toggle').offset().top }, 0);");
				//		JestarBaseTest::clickByXPath($browser,'//*[contains(text(),"Chọn")][0]');
						$browser -> script("$('html, body').animate({ scrollTop: $('#submit_button').offset().top }, 0);");
						JestarBaseTest::clickByXPath($browser,'//*[@id="submit_button"]');
						$browser -> script("$('html, body').animate({ scrollTop: $('#submit_button').offset().top }, 0);");
						JestarBaseTest::clickByXPath($browser,'//*[@id="submit_button"]');
						JestarBaseTest::clickByXPath($browser,'//div[contains(text(),"'.$bagage.'")]');
						$browser -> script("$('html, body').animate({ scrollTop: $('#submit_button').offset().top }, 0);");
						JestarBaseTest::clickByXPath($browser,'//*[@id="submit_button"]');
						$browser -> clickByXPath($browser,'//*[@class="seating-option-card "'.$seat.'" js-seat-option js-seat-segment-option seating-option-card--text-small"]//button[contains(text(),"Chọn")]');
						
        });
    }
}
