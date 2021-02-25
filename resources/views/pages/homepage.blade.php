@extends('pages.layout')
@section('content')
<div class="banner">
	<div class="container">
    	<div class="banner-contents">
            <h1>Do You Want Your Work Done Online Faster, Cheaper and of Best Quality work Now?</h1>
            <p>Its Easy Now. Get help with your work assignment, homework, research paper, data entry, social media managing, programming and graphic design from our competent Elites Talented across the world; contact us directly via sendus@homeworkelites.org or place an order</p>
            <a href="{{ url('/client') }}" target="_blank">Place Order Now</a>
        </div>
    </div>
</div>
<div class="container-fluid">
<div class="white-box">
    	<div class="row">
        	<div class="col-sm-4">
            	<img src="https://homeworkdoer.org/images/icon-prices.gif" alt="" title="" />
                <p>Prices as low as $9<br>per page</p>
            </div>
        	<div class="col-sm-4">
            	<img src="https://homeworkdoer.org/images/icon-native-writers.gif" alt="" title="" />
                <p>1000+ Native Writers</p>
            </div>
        	<div class="col-sm-4">
            	<img src="https://homeworkdoer.org/images/icon-award.gif" alt="" title="" />
                <p>Award Winning Service</p>
            </div>
        </div>
    </div>
</div>

<div class="welcome-content">
	<div class="container">
    	<h2>WELCOME TO HOMEWORK ELITES.ORG</h2>
        <p>A Homework service that offers premium work to academia at all academic levels in over 100 subjects areas in different countries</p>
        <div class="row">
        	<div class="col-sm-4">
            	<span class="h1">9.8/10</span>
            	<h4>QUALITY SCORE</h4>
            </div>
        	<div class="col-sm-4">
            	<span class="h1">2+</span>
            	<h4>YEARS IN BUSINESS</h4>
            </div>
        	<div class="col-sm-4">
            	<span class="h1">150</span>
            	<h4>PAGES COMPLETED DAILY</h4>
            </div>
        </div>
    </div>
</div>

<div class="order-now">
	<div class="container">
    	<span class="h1">Want to pay for homework help?</span>
        <a href="" target="_blank">order now</a>
    </div>
</div>
<br><br>
<div class="working">
    <div class="topworking">
        <span>  how it   Works</span>
    </div>
    <div class="bottomworking">
        <section class="eachwork">
            <div class="topeachwork">
                <div class="workicon">
                    <img src="{{ asset('pages/images/postjob.svg') }}" alt="">
                </div>
            </div>
            <div class="bottomeachwork">
                <h6>Post A Job</h6>
                <p>Tell us about your project. Homework Elites connects you with top talent and agencies around the world, or near you.</p>
            </div>
        </section>
        <section class="eachwork">
            <div class="topeachwork">
                <div class="workicon">
                    <img src="{{ asset('pages/images/chatadmin.svg') }}" alt="">
                </div>
            </div>
            <div class="bottomeachwork">
                <h6>Chat Admin</h6>
                <p>Initiate chat with the support and receive a quote of the task posted.</p>
            </div>
        </section>
        <section class="eachwork">
            <div class="topeachwork">
                <div class="workicon">
                    <img src="{{ asset('pages/images/payjob.svg') }}" alt="">
                </div>
            </div>
            <div class="bottomeachwork">
                <h6>Payment</h6>
                <p>Pay for the order.Prices vary according the task being discussede</p>
            </div>
        </section>
        <section class="eachwork">
            <div class="topeachwork">
                <div class="workicon">
                    <img src="{{ asset('pages/images/bidjob.svg') }}" alt="">
                </div>
            </div>
            <div class="bottomeachwork">
                <h6>Allocation to Writer</h6>
                <p>Best fit writer is assigned your work. All works are submited to clients before the agreed duration expires.</p>
            </div>
        </section>
    </div>
</div>

<div class="paper-format">
	<div class="col-sm-12 text-center">
		<span class="h1">OUR PAPER FORMAT</span>
    </div>
	<div class="left-right-parts">
    	<div class="container-fluid background">
        	<div class="col-sm-5 pull-right">
            	<img src="{{ asset('pages/images/paper-format.jpg') }}" alt="" title="" />
            </div>
        </div>
    	<div class="container">
        	<div class="row">
                <div class="col-sm-6">
                    <div class="left-contents">
                        <ul>
                            <li>Times New Roman, 12pt</li>
                            <li>Double / Single spacing </li>
                            <li>275 Words per page</li>
                            <li>All Referencing styles ( APA, MLA, Chicago etc )</li>
                        </ul>
                        <div class="h1"><span>sendus@homeworkelites.org</span></div>
                    </div>
                </div>
                <div class="col-sm-6">
                    {{-- <img src="{{ asset('pages/images/paper-format.jpg') }}" alt="" title="" /> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="professionalservices">
	<div class="container-fluid topbenefits">
    	<span>WE OFFER SERVICES TO OUR CLIENTS WITH 3 KEY BENEFITS</span>
    </div>
    <div class="clientbenefits">
       
        <section class="clientadvs">
            <div>
            <img src="{{ asset('pages/images/medal.svg') }}" alt="">
            </div>
            <div>
            <h5>Quality Work Help</h5>
            <p>Our team of professional writers guarantees top-quality essay writing results.</p>
            </div>
        </section>
        <section class="clientadvs">
            <div>
            <img src="{{ asset('pages/images/support.svg') }}" alt="">
            </div>
            <div>
            <h5>The Best Support Service</h5>
            <p>Get 24⁄7 help with proofreading and editing your draft – fixing your grammar, spelling, or formatting.</p>
            </div>
        </section>
        <section class="clientadvs">
            <div>
            <img src="{{ asset('pages/images/cheapprices.svg') }}" alt="">
            </div>
            <div>
            <h5>Affordable Writing Service</h5>
            <p>We guarantee a perfect price-quality balance to all students. The more pages you order, the less you pay.</p>
            </div>
        </section>
    </div>
</div>

<div class="customerrates">
    <div class="enclosecustomerrates"> 
	 <section class="leftcustomerrates">
         <div class="topleftcustomerrates">
             <span>custom writing at your convinience</span>
         </div>
         <div class="bottomleftcustomerrates">
             <div class="eachcontent">
                 <div class="lefteachcontent">
                     <img src="{{ asset('pages/images/calendar.svg') }}" alt="">
                 </div>
                 <div class="righteachcontent">
                     <h6>Any Deadline - Any Subject</h6>
                     <p>We cover any subject you have.
                        Set the deadline and keep calm.
                        Receive your papers on time.</p>
                 </div>
             </div>
             <div class="eachcontent">
                 <div class="lefteachcontent">
                     <img src="{{ asset('pages/images/profile.svg') }}" alt="">
                 </div>
                 <div class="righteachcontent">
                     <h6>Detailed Writer Profiles</h6>
                     <p>That’s our Place of Truth.
                        Look over the writers’ ratings, success rating, and the feedback left by other students.</p>
                 </div>
             </div>
             <div class="eachcontent">
                 <div class="lefteachcontent">
                     <img src="{{ asset('pages/images/email.svg') }}" alt="">
                 </div>
                 <div class="righteachcontent">
                     <h6>Email and SMS Notifications</h6>
                     <p>Stay informed 24⁄7 about every update of the whole ordering process.</p>
                 </div>
             </div>
             <div class="eachcontent">
                 <div class="lefteachcontent">
                     <img src="{{ asset('pages/images/plagiarism.svg') }}" alt="">
                 </div>
                 <div class="righteachcontent">
                     <h6>Plagiarism Free Papers</h6>
                     <p>We double-check all the assignments for plagiarism and send you only original essays.</p>
                 </div>
             </div>
             <div class="eachcontent">
                 <div class="lefteachcontent">
                     <img src="{{ asset('pages/images/support.svg') }}" alt="">
                 </div>
                 <div class="righteachcontent">
                     <h6>Chat With Your Writer</h6>
                     <p>Communicate directly with your writer anytime regarding assignment details, edit requests, etc.</p>
                 </div>
             </div>
             <div class="eachcontent">
                 <div class="lefteachcontent">
                     <img src="{{ asset('pages/images/coins.svg') }}" alt="">
                 </div>
                 <div class="righteachcontent">
                     <h6>Affordable Prices</h6>
                     <p>We offer the lowest prices per page in the industry, with an average of $9 per page.</p>
                 </div>
             </div>
         </div>
     </section>
	 <section class="rightcustomerrates">
         <div class="placeorderlink">
             <div class="topplaceorderlink">
                 <h5>HOMEWORK ELITES Features</h5>
                 <span>Get all features for free</span>
                 <span>Friendly Prices</span>
             </div>
             <div class="middleplaceorderlink">
                 
                 <a href="">place order now</a>
             </div>
             <div class="bottomplaceorderlink">
                <h5>Free Formatting</h5>
                <span>Plagiarism Check</span>
                <span>Best Writer</span>
            </div>
         </div>
     </section>
    </div>
</div>

<div class="footer-order">
	<div class="container">
    	<h3>Your have a Busy Schedule or need Homework Assistance.<br>
        Our Homework Elites can service all your academic needs Perfectly,Faster with high Quality and on Time.</h3>
        <a href="">order now</a>
</div>
</div>
@endsection