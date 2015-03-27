<?php 

	require_once('../membertekapi/config.php');
	require_once('../membertekapi/database.php');
	require_once('../membertekapi/lib.php');
	require_once('../membertekapi/address.php');
	require_once('../membertekapi/paymentinformation.php');
	require_once('../membertekapi/emailsmtp.php');
	require_once('../membertekapi/member.php');
	require_once('../membertekapi/validate.php');
	require_once('../membertekapi/order.php');
	require_once('../membertekapi/orderitem.php');
	require_once('../membertekapi/product.php');
	require_once('locallib.php');

	if (! GetParamInt('SSL')) { GotoPage('https://www.georgiachildcaregiftmembership.com?SSL=1'); }

	$Validate = new Validate(5);

	$FirstName = GetParam('FirstName');
	$LastName = GetParam('LastName');
	$Email = GetParam('Email');
	$Telephone = GetParam('Telephone');
	$URL2 = GetParam('URL2');
	$Street = GetParam('Street');
	$Street2 = GetParam('Street2');
	$City = GetParam('City');
	$State = GetParam('State');
	$PostalCode = GetParam('PostalCode');
	$TaxId = '';
	
	if (GetParam('Command'))
	{	
		$Validate->TextInput('FirstName', 'First Name', true, 32);	
		$Validate->TextInput('LastName', 'First Name', true, 32);	
		$Validate->EmailInput('Email', 'E-mail', true, 128);	
		$Validate->TelephoneInput('Telephone', 'Telephone', true, 10, 32);	
//		$Validate->TextInput('URL2', 'Blog URL', true, 256);	

		$Validate->TextInput('Street', 'Street', true, 64);	
		$Validate->TextInput('Street2', 'Street2', false, 64);	
		$Validate->TextInput('City', 'City', true, 32);	
		$Validate->TextInput('State', 'State', true, 32);	
		$Validate->TextInput('PostalCode', 'Zip/Postal Code', true, 10);	
//		$Validate->TextInput('TaxId', 'SSN or Tax Id', true, 10);	
	
		if (EmailToMemberId(GetParam('Email')))
		{
			$Validate->RecordError('E-mail address is already in use by another member.');
		}
	
		if ($Validate->Error())
		{
			include 'include-head.php'; 
?>
<form method="post">
 <? PrintValidationErrors($Validate); ?>

 <? HiddenParams(array('FirstName', 'LastName', 'Email', 'Telephone', 'Street', 'Street2',
		'City', 'State', 'PostalCode', 'TaxId', 'URL2')); ?>
	<input type="hidden" name="SSL" value="1" />
</form>
  </body>
</html>			
<?
			exit();			
		}
		else
		{
			$LoginId = MomBloggerCreate($FirstName, $LastName, $Email, $Telephone, $URL2,
				$Street, $Street2, $City, $State, $PostalCode, $TaxId, 10424, 5, 'M');
			$MemberId = $LoginId - 500000;
			$Member = new Member($MemberId);
			GotoPage("thankyou.php?MemberId={$Member->Field['MemberId']}&ExternalId={$Member->Field['ExternalId']}");
		}
	}



include 'include-head.php'; ?>  
<div id="introCopy">
        <h1 class="blue xxlarge regular" id="helpUs">Help us help make your home a<br><span class="xlarge">healthier place to raise your family.</span></h1>
        
        <div><br><br>
          <img src="images/houseChemicals.jpg" class="floatl" alt="" />
          <p class="bodyCopy">There are over <span class="blue">80,000 chemicals</span> used in the United States. <span class="blue">11,000 of these chemicals are banned in Europe and Japan</span>. They are found in products we use everyday to clean our homes, our bodies, and our children. It takes 26 seconds for chemicals from shampoos, laundry detergent, household soaps, cosmetics, lotions, household cleaners and many more products found in the home, to enter the blood stream.</p>
          <p class="bodyCopy">Proof of this is in our <a href="http://www.ewg.org/research/body-burden-pollution-newborns">children's cord blood</a> where over 200 chemicals have been found, chemicals that have been coursing through their veins from the beginning of when their tiny brains and bodies first began to develop.</p>
          <p class="blue medium"><img src="images/houseMan.jpg" class="floatl" alt="" />If these chemicals are in your home, They are in you!</p>
        </div>

        <div class="clear"></div>
        <div id="helpYourFriends">
          <h2 class="blue regular xlarge">Help your friends and family<br><span class="large">make their home a healthier place.</span></h2><br>
          <span class="floatl enourmous arial" id="ampersand">&amp;</span>
          <p class="small arial" id="earnTen"><img src="images/productBottles.jpg" class="floatr" id="bottles" alt="" />earn 10% on every product they buy for as long as they buy.
           </p>
           <div class="clear"><br></div>
        </div>
      </div>
      <!-- === /#introCopy === -->

      <div class="clear"></div>

      <!-- === #infoSignUp : sign up form & add. info === -->
      <div class="infoSignUp">

        <!-- === Additional Info Section === -->
        <div class="floatl half" id="info">

          <!-- What is Mommy's Club? -->
          <a name="aboutmc"></a>
          <p class="bodyCopy" style="margin: 35px 0 90px 0;">
          <img class="floatl" style="margin-right: 40px; margin-bottom: 20px; " src="images/icon-memberclub.png">
          <b><span class="green">What is Mommy's Club?</span></b><br><br>
          We're a company that's dedicated to making the home a healthier place to raise a family. As a parent, you want the best for your family, and Mommy's Club provides some of the safest, most effective personal care, health and body care products on the market made with all-natural, EcoCert and ToxicFree&reg; ingredients.
          </p>
          <div class="clear"></div>

          <!-- Our Products -->
          <p class="bodyCopy" style="margin: 0 0 90px 0;">
          <img class="floatl" style="margin-right: 40px; margin-bottom: 20px;" src="images/icon-products.png">
          
          <b><span class="green">Our Products</span></b><br><br>
          Are not only formulated with all-natural, organic and ToxicFree&reg; ingredients. They're also Made in the USA, EcoCert, Non-GMO, Vegan, BPA Free, Cruelty Free
          </p>
          <div class="clear"></div> 
          

          <!-- Make Money With Mommy's Club! -->
          <p class="bodyCopy" style="margin: 0 0 90px 0;">
          <img class="floatl" style="margin-right: 40px;" src="images/icon-makemoney.png">
          
          <b><span class="green">Make Money with Mommy's Club!</span></b><br><br>
          Have you ever been rewarded for sharing the products you love with your family and friends? Now you can! Earn 10% commission on any products they purchase every time they buy!
          </p>
          <div class="clear"></div>   
        
    
    
    </div>
        </div>

        <!-- === Sign Up Section === -->
        <div class="floatr half arial">
          <a name="signup"></a>
          <form method="post">
            <h3 class="blue">Sign up for Free!</h3>
              <p class="green">Join and receive a free 4oz Home and Hand Sanitizer and complimentary membership to the Healthy Home Company.</p>

              <!-- Contact Info -->
              <fieldset>
                <h4 class="blue">Contact Info</h4>
                  <label>First Name</label>
                    <input type="text" name="FirstName" value="<?= $FirstName ?>" >
                  <label>Last Name</label>
                    <input type="text" name="LastName" value="<?= $LastName ?>" >
                  <label>Email Address</label>
                    <input type="email" name="Email" value="<?= $Email ?>" >
                  <label>Ph Number</label>
                    <input type="text" name="Telephone" value="<?= $Telephone ?>" >
              </fieldset>

              <!-- Shipping Info -->
              <fieldset>
                <h4 class="blue">Shipping Info</h4>
                  <label>Address 1</label>
                    <input type="text" name="Street" value="<?= $Street ?>" >
                  <label>Address 2</label>
                    <input type="text" name="Street2" value="<?= $Street2 ?>" >
                  <label>City</label>
                    <input type="text" name="City" value="<?= $City ?>" >
                  <label>State</label>
                    <input type="text" name="State" value="<?= $State ?>" >
                  <label>Zip</label>
                    <input type="text" name="PostalCode" value="<?= $PostalCode ?>" >
              </fieldset>
              
              <input class="submit" type="image" src="images/submit.png" name="submit" onClick="document.getElementById('Command').value = 'Register Now';">

              <p class="tiny">This special offer is available to Continental U.S. residents only.</p>
<input type="hidden" name="Command" value="" id="Command" />

          </form>
        </div>
        <!-- === /Sign Up section === -->
        <div class="clear"></div>
        <div id="footer">
          <h3 class="blue medium center arial">Connect With Us</h3>
            <p class="center">
              <a href="https://www.facebook.com/themommysclub"><img align="absmiddle" src="images/icon-fb.png" border="0"></a>
              <a href="https://twitter.com/themommysclub"><img align="absmiddle" src="images/icon-twitter.png" border="0"></a>
              <a href="http://www.pinterest.com/themommysclub/"><img align="absmiddle" src="images/icon-pin.png" border="0"></a>
              <a href="https://vimeo.com/user21859339"><img align="absmiddle" src="images/icon-vimeo.png" border="0"></a>
              <a href="https://plus.google.com/u/1/b/100042920894792536538"><img align="absmiddle" src="images/icon-gplus.png" border="0"></a>
              <a href="http://www.youtube.com/user/themommysclub"><img align="absmiddle" src="images/icon-youtube.png" border="0"></a>
            </p>
        </div>
      </div>  
      <!-- === /#infoSignUp === -->  

    </div>
  </body>
</html>
                