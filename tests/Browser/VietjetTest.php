<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Tests\Browser\VjBaseTest;
use Laravel\Dusk\Browser;


use Illuminate\Foundation\Testing\DatabaseMigrations;

class VietjetTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testBooking()
    {
		
        $this->browse(function (Browser $browser) {
			extract([
					'name' =>'AG39355462',
					'password' =>'D*#nM#N(R(*2019',
					'round_trip' =>'chkRoundTrip1',
					'from' =>'HPH',
					'to' =>'SGN',
					'currency' =>'VND',
					'adult' =>1,
					'children' =>0,
					'infant' =>0,
					'company' =>'1844ƒCTY TAY HO (SUB)',
					'dep' =>'1,Z_Eco,O',
					'gender' =>'M',
					'lname' =>'Ahihi',
					'fname' =>'Haha',
					'add1' =>'HaNoi',
					'city' =>'Hanoi',
					'country'=>'234',
					'prov' =>'10242',
					'email' =>'ahaha@gmail.com',
					'day' =>'20',
					'month'=> '05',
					'year' =>'1980',
					'phone2' =>'987647384',
					'phone1' =>'987647384',
					'passport' =>'1234',
					'expiry_day' =>'01',
					'expiry_month' => '2019/12',
					'nation' =>'VNM',
					'baggage' =>'2:-1:2234719:1'
					
					
		]);
            $browser -> screenshot('Begin')
					 -> visit('https://www.vietjetair.com/Sites/Web/vi-VN/Home');
						VjBaseTest::clickByXPath($browser,'//a[contains(text(),"Đăng nhập")]');
					 -> pause(1000);
						VjBaseTest::clickByXPath($browser,'//a[contains(text(),"Đại lý bán vé")]')
					 -> pause(4000)
					
					-> type('txtAgentID',$name)
					-> type('txtAgentPswd',$password)
					-> clickLink('Truy cập')
					-> pause(1000);
					 VjBaseTest::clickByXPath($browser,'//a[contains(text(),"Đặt chuyến bay")]')
					 -> pause(4000);
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
					 
					 -> radio('#gridTravelOptDep','1,'.$dep.',O')
					 -> pause(4000)
					 -> clickLink('Tiếp tục')
					 -> pause(4000)
					 
					 -> select('#txtPax1_Gender',$gender)
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
					
					 -> script("$('html, body').animate({ scrollTop: $('.rightbutton').offset().top }, 0);");
					$browser -> pause(4000)
							 -> clickLink('Tiếp tục')
							 -> assertSee('Chọn chỗ ngồi')
							 -> script("$('html, body').animate({ scrollTop: $('.scrollNext').offset().top }, 0);");
					$browser -> pause(4000) 
							 -> clickLink('Không, cảm ơn')
							 -> select('#lstPaxItem:-1:1:1:0:cp',$baggage);
							
				
        });
    }
}
