<?php 
    require_once('../membertekapi/config.php');
    require_once('../membertekapi/database.php');
    require_once('../membertekapi/lib.php');
    require_once('../membertekapi/member.php');
    
	$MemberId = GetParamInt('MemberId');
	if (! $MemberId)
	{
		$LoginId = preg_replace('/\.[^.]*$/', '', GetParam('Request'));
		$MemberId = LoginIdToMemberId($LoginId);
	}
	

	if (! $MemberId)
	{
		include 'include-head.php'; 
?>
<div id="ErrorDiv">
The specified URL is invalid.
</div> 
   </body>
</html>			
<?
		exit();					
	}

	$Member = new Member($MemberId);
	if ($Member->Field['ExternalId'] == GetParam('ExternalId'))
	{
		$Password = $Member->Field['Password'];
	}
	else
	{
		$Password = '********';
	}
	$LoginId = $Member->Field['LoginId'];


    include 'include-head-thankyou.php'; 

?>  

       <!-- ====================== Section One ============ -->
<img src="images/thankyou.jpg" class="floatl" alt="" width="450" height="auto" padding="20">
<div class="floatr half" id="introMessage">
  <div style="margin: 60px 0 0 0;" id="memberInfo">
    <h3 class="small dkblue">Your Member #: <span id="memberNo" class="lite">#<?= $LoginId ?></span></h3>
      
        <p class="xsmall dkblue"><strong>Your Password:</strong> <span class="grey" id="memberPass"><?= $Password ?></span></p>
        <p class="xxsmall">Congrats on becoming a Mommy's Club Member! Here is your unique member ID and password.  Please keep your member number recorded as you will use your member number and unique URL as a way to track your referrals to earn your 10% commission.</p>
        <h4 class="xsmall dkblue">Your Affiliate Link:</h4>
        <span id="memberLink">http://mommysclub.com/<?= $LoginId ?></span>
  </div>

</div> 

<div class="clear"></div>

<!-- ====================== anchor bar ============ -->
<div id="navBar">
  <a href="#whatsNext" class="navBarLink"><img src="images/icon-one.png" class="floatl" alt=""><br>What's Next</a>
  <a href="#takeTest" class="navBarLink"><img src="images/icon-two.png" class="floatl" alt="">Take the Toxic Test</a>
  <a href="#retailChallenge" class="navBarLink"><img src="images/icon-three.png" class="floatl" alt="">Learn About Our Retail Challenge</a>
  <a href="#shopProducts" class="navBarLink"><img src="images/icon-four.png" class="floatl" alt="">Shop Products</a>
<div class="clear"></div>
</div>

<!-- ====================== End anchor bar ============ -->
       
<!-- ====================== What's Next ============ -->

<div id="whatsNext">
  <a name="whatsNext"></a>
  <h2 class="dkblue arial"><img src="images/icon-one.png" class="floatl imgIcon" alt="">What's Next</h2>
    <p class="arial small"><img src="images/retail-challenge-guy.png" class="floatl imgIcon" alt="">Expect to receive a welcome message from Mommy's Club with your unique member URL and a Retail Challenge Guide.</p>
    <div class="clear"></div>
</div>

<!-- ====================== End What's Next ============ -->
       
<!-- ====================== introducing Toxic Test ============ -->

<div id="toxicTest">
  <a name="takeTest"></a>
  <h2 class="dkblue arial"><img src="images/icon-two.png" class="floatl imgIcon" alt="">Introducing the Toxic Test as a way to educate your friends and family on why Mommy's Club products are a better option for them.</h2>
  <p class="center arial white xsmall">You can use your replicated URL for the Toxic Test too,<br>your link would be www.takethetoxictest.com/<?= $LoginId ?></p>
  <div class="clear"></div>
  <h3 class="center arial dkblue medium">
    <img src="images/toxictest-laptop.png" alt=""><br>
    What is the Toxic Test?
  </h3>
  <p class="bodyCopy">Over 80,000 chemicals are manufactured and sold every day. These chemicals can be found in ommon household products like shampoo, counter cleaner, lotion and detergents. Because these chemicals are in our products, they are in us! It only takes 26 seconds for chemicals in our products to enter our bloodstream through our skin. Our organs are major targets of toxic chemicals including the liver, bladder, kidneys and digestive system. They also effect our unborn babies. Studies have shown these chemicals have been found in the blood of umbilical cords! The side effects of these chemicals can run the gambi from birth defects, to negatively effecting our immune system to negatively impacting our brain and nervous system.</p>
  <p class="white arial center">Find out what chemicals are in your home by taking the Toxic Test right now.<br><br>
    <h3 class="center dkblue arial medium">What Can You Do?</h3>
                    
   <p class="bodyCopy">
     <img style="width: 150px; float:left;" src="images/icon-toxictestcover.png"><br><br>
     <span class="dkblue"><b>Take the Toxic Test -</b></span> Use our resources to help guide you in uncovering which dangerous chemicals already reside in your home. Learn how they can be and are dangerous to your health. 
   </p><div class="clear"></div>

   <p class="bodyCopy">
     <img style="width: 150px; float:left;" src="images/icon-cleaners.png"><br>
     <span class="dkblue"><b>Commit to purchasing safer products.</b></span> When you complete the test (even if you test only a few products), we ask you to consider making a simple change – find and purchase a safe alternative to the products you use now. It can be directly from a store, online or even from us, but it’s an important step in protecting yourself and your family moving forward.
   </p><div class="clear"></div>

   <p class="bodyCopy">
     <img style="width: 150px; float:left;" src="images/tellafriend.png"><br><br>
     <span class="dkblue"><b>Tell a friend!</b></span> Join the Healthy Home Company in our crusade to educate friends, family and the general public about the appalling practices of these industries, who for decades have sold us misinformation about the benefits and safety of their products.
   </p><div class="clear"></div><br><br>
    <a href="http://www.takethetoxictest.com" target="_blank"><center><img src="images/btn-take-the-toxic-test.png" alt=""></center></a></p>
</div>

<div id="retailOverview">
  <a name="retailChallenge"></a>
  <h2 class="dkblue arial"><img src="images/icon-two.png" class="floatl imgIcon" alt="">Read Our Quick Retail Challenge Overview</h2>
    <img src="images/parent-society-fullcomic.jpg" style="margin: 0 0 0 100px; width: 800px; height: auto;">
    <div class="clear"></div>
</div>
       
<div id="shopProducts">
  <a name="shopProducts"></a>
  <h2 class="dkblue arial"><img src="images/icon-three.png" class="floatl imgIcon" alt="">We encourage you to become familiar with the Mommy's Club Family of Products</h2>

  <p class="bodyCopy">Once you've experienced these high-quality, non-toxic products for yourself, you will be able to write product reviews and post testimonials encouraging your readers to join the Mommy's Club movement, too.</p>
        
                        
                        
                    <div style="padding: 0 40px 40px 100px;">
                    
                         <!-- =============== Product TBH ============ -->
                         <div class="product">
                             <a href="http://mommysclub.com/product?ProductId=12">
                             <img width="225" height="275"src="images/body-small.png">
                             </a>
                             <p class="productbluetxt">Body 32 oz
                             </p>
                             <p class="productgreytxt"><span class="strike">Retail Price: $49.95</span></span> <br>
                             Your Price: $39.95
                             </p>
                             <a href="http://mommysclub.com/product?ProductId=12">
                             <img src="images/btn-learnmore.png">
                             </a>
                         
                         </div>
                         <!-- =============== End Product Body ============ -->
                         
                         <!-- =============== Product Body for Children ============ -->
                         <div class="product">
                             <a href="http://mommysclub.com/product?ProductId=13">
                             <img width="225" height="275"src="images/bodychild-small.png">
                             </a>
                             <p class="productbluetxt">Body for Children 

                             </p>
                             <p class="productgreytxt"><span class="strike">Retail Price: $34.95</span><br>
                             Your Price: $25.95
                             </p>
                             <a href="http://mommysclub.com/product?ProductId=13">
                             <img src="images/btn-learnmore.png">
                             </a>
                         
                         </div>
                         <!-- =============== End Product BC ============ -->
                         
                         <!-- ============= Wash Foam  ============ -->
                         <div class="product">
                             <a href="http://mommysclub.com/product?ProductId=8">
                             <img width="225" height="275"src="images/wash-small.png">
                             </a>
                             <p class="productbluetxt">Wash 7 oz

                             </p>
                             <p class="productgreytxt"><span class="strike">Retail Price: $15.95</span><br>
                             Your Price: $10.95
                             </p>
                             <a href="http://mommysclub.com/product?ProductId=8">
                             <img src="images/btn-learnmore.png">
                             </a>
                         
                         </div>
                         <!-- =============== End Product Daily Cleansing Foam  ====== -->
                         
                         <!-- ============= Product Chewable  ============ -->
                         <div class="product">
                             <a href="http://mommysclub.com/product?ProductId=9">
                             <img width="225" height="275"src="images/cherrychew-small.png">
                             </a>
                             <p class="productbluetxt">Childrens Chewable 

                             </p>
                             <p class="productgreytxt"><span class="strike">Retail Price: $31.95</span><br>
                             Your Price: $25.95
                             </p>
                             <a href="http://mommysclub.com/product?ProductId=9">
                             <img src="images/btn-learnmore.png">
                             </a>
                         
                         </div>
                         <!-- =============== End Product Chewable ====== -->
                         
                         <!-- =============== Product Rash & Remedy ============ -->
                         <div class="product">
                             <a href="http://mommysclub.com/product?ProductId=3">
                             <img width="225" height="275"src="images/remedy-small.png">
                             </a>
                             <p class="productbluetxt">Remedy 1 oz

                             </p>
                             <p class="productgreytxt"><span class="strike">Retail Price: $22.95</span><br>
                             Your Price: $17.95
                             </p>
                             <a href="http://mommysclub.com/product?ProductId=3">
                             <img src="images/btn-learnmore.png">
                             </a>
                         
                         </div>
                         <!-- =============== End Product Rash & Remedy ============ -->
                         
                         <!-- ============= Product Daily Sanitizer 4  ============ -->
                         <div class="product">
                             <a href="http://mommysclub.com/product?ProductId=6">
                             <img width="225" height="275"src="images/sanitizer4-small.jpg">
                             </a>
                             <p class="productbluetxt">Hand Sanitizer 4 oz

                             </p>
                             <p class="productgreytxt"><span class="strike">Retail Price: $11.50</span><br>
                             Your Price: $6.95
                             </p>
                             <a href="http://mommysclub.com/product?ProductId=6">
                             <img src="images/btn-learnmore.png">
                             </a>
                         
                         </div>
                         <!-- =============== End Product Sanitizer 4  ====== -->
                         
                         <!-- ============= Product Omega  ============ -->
                         <div class="product">
                             <a href="http://mommysclub.com/product?ProductId=10">
                             <img width="225" height="275"src="images/omega-small.png">
                             </a>
                             <p class="productbluetxt">Advance Omega 3 8 oz


                             </p>
                             <p class="productgreytxt"><span class="strike">Retail Price: $31.95</span><br>
                             Your Price: $25.95
                             </p>
                             <a href="http://mommysclub.com/product?ProductId=10">
                             <img src="images/btn-learnmore.png">
                             </a>
                         
                         </div>
                         <!-- =============== End Product Omega ====== -->
                         
                         
                         <!-- =============== Product Baby Lotion ============ -->
                         <div class="product">
                             <a href="http://mommysclub.com/product?ProductId=4">
                             <img width="225" height="275"src="images/lotion-small.png">
                             </a>
                             <p class="productbluetxt">Lotion 8 oz

                             </p>
                             <p class="productgreytxt"><span class="strike">Retail Price: $15.95</span><br>
                             Your Price: $10.95
                             </p>
                             <a href="http://mommysclub.com/product?ProductId=4">
                             <img src="images/btn-learnmore.png">
                             </a>
                         
                         </div>
                         <!-- =============== End Product Baby Lotion ============ -->
                         
                         <!-- =============== Product Baby Shampoo ============ -->
                         <div class="product">
                             <a href="http://mommysclub.com/product?ProductId=2">
                             <img width="225" height="275"src="images/shampoo-small.png">
                             </a>
                             <p class="productbluetxt">Shampoo 8 oz


                             </p>
                             <p class="productgreytxt"><span class="strike">Retail Price: $15.95</span> <br>
                             Your Price: $10.95
                             </p>
                             <a href="http://mommysclub.com/product?ProductId=2">
                             <img src="images/btn-learnmore.png">
                             </a>
                         
                         </div>
                         <!-- =============== End Product Baby Shampoo ============ -->
                         
                         <!-- ============= Product Fortify  ============ -->
                         <div class="product">
                             <a href="http://mommysclub.com/product?ProductId=11">
                             <img width="225" height="275"src="images/fortify-small.png">
                             </a>
                             <p class="productbluetxt">Fortify 16 oz

                             </p>
                             <p class="productgreytxt"><span class="strike">Retail Price: $45.95</span><br>
                             Your Price: $35.95
                             </p>
                             <a href="http://mommysclub.com/product?ProductId=11">
                             <img src="images/btn-learnmore.png">
                             </a>
                         
                         </div>
                         <!-- =============== End Product Fortify  ====== -->
                         
                         <!-- ============= Product Sanitizer 1  ============ -->
                         <div class="product">
                             <a href="http://mommysclub.com/product?ProductId=5">
                             <img width="225" height="275"src="images/sanitizer1-small.png">
                             </a>
                             <p class="productbluetxt">Hand Sanitizer 1 oz


                             </p>
                             <p class="productgreytxt"><span class="strike">Retail Price: $7.50</span><br>
                             Your Price: $3.95
                             </p>
                             <a href="http://mommysclub.com/product?ProductId=5">
                             <img src="images/btn-learnmore.png">
                             </a>
                         
                         </div>
                         <!-- =============== End Product Sanitizer 1 ====== -->

                         <!-- ============= Product Clean  ============ -->
                         <div class="product">
                             <a href="http://mommysclub.com/product?ProductId=5">
                             <img width="225" height="275"src="images/clean-small.png">
                             </a>
                             <p class="productbluetxt">Clean


                             </p>
                             <p class="productgreytxt"><span class="strike">Retail Price: $29.95</span><br>
                             Your Price: $19.95
                             </p>
                             <a href="http://mommysclub.com/product?ProductId=9424">
                             <img src="images/btn-learnmore.png">
                             </a>
                         
                         </div>
                         <!-- =============== End Product Sanitizer 1 ====== -->

                         <!-- ============= Product Tough Stuff  ============ -->
                         <div class="product">
                             <a href="http://mommysclub.com/product?ProductId=5">
                             <img width="225" height="275"src="images/toughstuff-small.png">
                             </a>
                             <p class="productbluetxt">Tough Stuff


                             </p>
                             <p class="productgreytxt"><span class="strike">Retail Price: $24.95</span><br>
                             Your Price: $16.95
                             </p>
                             <a href="http://mommysclub.com/product?ProductId=9422">
                             <img src="images/btn-learnmore.png">
                             </a>
                         
                         </div>
                         <!-- =============== End Product Sanitizer 1 ====== -->
                         
                         <!-- ============= Product Cosmetics  ============ -->
                         <div class="product">
                             <a href="https://www.mommysclub.com/department?DepartmentId=12">
                             <img width="225" height="275"src="images/cosmetics-small.png">
                             </a>
                             <p class="productbluetxt">Cosmetics


                             </p>
                             <p class="productgreytxt"><span class="strike">&nbsp;</span><br>
                             &nbsp;
                             </p>
                             <a href="https://www.mommysclub.com/department?DepartmentId=12">
                             <img src="images/btn-learnmore.png">
                             </a>
                         
                         </div>
                         <!-- =============== End Product Cosmetics ====== -->
                         <br class="clear">
                    <!-- ==========      
                         <div class="shopbundle">
                    SHOP BUNDLES
                    
                    </div>
                         
                  Referral Member Bundle 1 
                         <div class="product">
                             <a href="http://mommysclub.com/product?ProductId=17">
                             <img width="225" height="225"src="images/bundle1-small.jpg">
                             </a>
                             <p class="productbluetxt">Referral Member Bundle 1

                             </p>
                             <p class="productgreytxt">One Bundle: $89.95
                             </p>
                             <a href="http://mommysclub.com/product?ProductId=17">
                             <img src="images/btn-learnmore.png">
                             </a>
                         
                         </div>
                          End Referral Member Bundle 1 ========== -->
                         
                         <!-- ============= Referral Member Bundle 2 
                         <div class="product">
                             <a href="http://mommysclub.com/product?ProductId=19">
                             <img width="225" height="225"src="images/bundle2-small.jpg">
                             </a>
                             <p class="productbluetxt">Referral Member Bundle 2

                             </p>
                             <p class="productgreytxt">One Bundle: $89.95
                             </p>
                             <a href="http://mommysclub.com/product?ProductId=19">
                             <img src="images/btn-learnmore.png">
                             </a>
                         
                         </div>
                         End Personal Body Bundle  ====== -->
                         
                         <!-- ============= Personal Skin Bundle
                         <div class="product">
                             <a href="http://mommysclub.com/product?ProductId=15519">
                             <img width="225" height="225"src="images/bundle3-small.jpg">
                             </a>
                             <p class="productbluetxt">Referral Member Bundle 3


                             </p>
                             <p class="productgreytxt">One Bundle: $89.95
                             </p>
                             <a href="http://mommysclub.com/product?ProductId=15519">
                             <img src="images/btn-learnmore.png">
                             </a>
                         
                         </div>
                         End Personal Skin Bundle ====== -->
                         

                         
                         <!-- ===== Living Nature - Personal Skin Bundle 
                         <div class="product">
                             <a href="http://mommysclub.com/product?ProductId=18">
                             <img width="217" height="255"src="images/pers-skin-care-bundle-small.png">
                             </a>
                             <p class="productbluetxt">Personal Skin Care Bundle&nbsp;&nbsp;&nbsp;&nbsp;


                             </p>
                             <p class="productgreytxt"><span class="strike">Retail Price: $147.70</span><br>
                             Your Price: $99.00
                             </p>
                             <a href="http://mommysclub.com/product?ProductId=18">
                             <img src="images/btn-learnmore.png">
                             </a>
                         
                         </div>
                         End Personal Skin Bundle ====== -->
                         
                         <!-- ===== Living Nature - Personal Body Health Bundle 
                         <div class="product">
                             <a href="http://mommysclub.com/product?ProductId=19">
                             <img width="217" height="255"src="images/pers-body-health-bundle.png">
                             </a>
                             <p class="productbluetxt">Personal Body Health Bundle


                             </p>
                             <p class="productgreytxt"><span class="strike">Retail Price: $186.80</span><br>
                             Your Price: $139.00
                             </p>
                             <a href="http://mommysclub.com/product?ProductId=19">
                             <img src="images/btn-learnmore.png">
                             </a>
                         
                         </div>
                         End Personal Body Health Bundle ====== -->
                         
                                                   <!-- ===== Living Nature - All Products Bundle 
                         <div class="product">
                             <a href="https://www.mommysclub.com/product?ProductId=13474">
                             <img width="217" height="255"src="images/ln-bundle-small.jpg">
                             </a>
                             <p class="productbluetxt">Living Nature All Products Bundle


                             </p>
                             <p class="productgreytxt"><span class="strike">Retail Price: $819.00</span><br>
                             Your Price: $655.20
                             </p>
                             <a href="https://www.mommysclub.com/product?ProductId=13474">
                             <img src="images/btn-learnmore.png">
                             </a>
                         
                         </div>
                          Living Nature - All Products Bundle ====== -->
                    </div>
                    
         <!-- ====================== End Products ============ -->

         <br class="clear"> 
        

</div>
        <!-- ====================== Footer ============ -->
        <div id="bookmarkThis">
           <h2 class="white capitolize">
              <img style="float: left; margin: 40px 30px 40px 40px"  src="images/icon-bookmark.png"><br>Either Bookmark This Page or Check Your Confirmation Email so You Can Reference This Page as Needed
            </h2>
            <p class="white" style="margin: 40px 0px 0 0px">Your unique URL to return to this page<br>
                             http://www.georgiachildcaregiftmembership.com/<?= $LoginId ?>
                             </p>
        <br class="clear">  
        </div>
        <!-- ====================== End Footer ============ -->
        
        
        <!-- ====================== New Footer ============ -->
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
        <!-- ====================== End  New Footer ============ -->

</div> <!-- /#container -->
</body>
</html>