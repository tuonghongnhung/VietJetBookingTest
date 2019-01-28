<?php

namespace Tests\Browser\Components;

use Laravel\Dusk\Browser;
use Laravel\Dusk\Component as BaseComponent;
use Tests\Browser\VjBaseTest;

class VjTravelBooking extends BaseComponent
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
	
	public function inputBooking($browser,$round_trip,$from,$to,$currency,$adult,$children,$infant,$company){
		
				
				// -> click('$round_trip')
				VjBaseTest::clickByXPath($browser,'//*[@id="'.$round_trip.'"]')
				 -> select('#lstOrigAP',$from)
				 -> select('#lstDestAP',$to)
				 -> select('#lstResCurrency',$currency)
				 -> type('#txtNumAdults',$adult)
				 -> type('#txtNumChildren',$children)
				 -> type('#txtNumInfants',$infant)
				 -> select('#lstCompanyList',$company)
				 -> clickLink('Lựa chọn chuyến đi')
				 -> waitForText('Lựa chọn chuyến đi')
				 -> screenshot('FinishFight');
			return $browser;
				 
	}
	
	public function chooseFight($browser,$dep){
		if($browser->assertDontSee('Không tìm thấy chuyến bay nào cho lựa chọn của bạn')&& $browser->assertSee('Hết vé')){
			$browser-> radio('#gridTravelOptDep','1,'.$dep.',O')
					-> clickLink('Tiếp theo')
					-> assertSee('Thông tin hành khách');
		}
		else{
			$browser->clickLink('Quay về');
		}
		return $browser;
	}
	
	public function FillInfo($browser,$gender,$lname,$fname,$add1,$city,$country,$prov,$email,$day,$month,$year,
	$phone2,$phone1,$passport,$expiry_day,$expiry_month,$nation,$baggage,$pay){
		VjBaseTest::clickByXPath($browser,'//a[contains(text(),"Đặt chuyến bay")]');
		$browser -> select('#txtPax1_Gender',$gender)
				 -> type('#txtPax1_LName',$lname)
				 -> type('#txtPax1_FName',$fname)
				 -> type('#txtPax1_Addr1',$add1)
				 -> type('#txtPax1_City',$city)
				 -> select('#txtPax1_Ctry',$country)
				 -> select('#txtPax1_Prov',$prov)
				 -> type('#txtPax1_EMail',$email)
				 -> select('#txtPax1_DOB_Day',$day)
				 -> select('#txtPax1_DOB_Month',$month)
				 -> select('#txtPax1_DOB_Year',$year)
				 -> type('#txtPax1_Phone2',$phone2)
				 -> type('#txtPax1_Phone1',$phone1)
				 -> type('#txtPax1_Passport',$passport)
				 -> select('#dlstPax1_PassportExpiry_Day',$expiry_day)
				 -> select('#dlstPax1_PassportExpiry_Month',$expiry_month)
				 -> select('#txtPax1_Nationality',$nation)
				 -> screenshot('FinishInfo')
				 -> clickLink('Tiếp tục')
				 -> assertSee('Chọn chỗ ngồi')
				 -> clickLink('Không,cảm ơn')
				 -> select('#lstPaxItem:-1:1:1:0:cp',$baggage)
				 -> screenshot('Finish1')
				
				 -> screenshot('FinishCMNR');
		return $browser;		 
	}
	
}
