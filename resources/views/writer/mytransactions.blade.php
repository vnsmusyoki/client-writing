@extends('writer.layout')
@section('content')
    <div class="dashboardone">
        <div class="topdashboardone">
            <div>
                <h5>My Balance:Ksh 0</h5>
            </div>
            <div> 
                <a href=""> {{ Auth::user()->name }}</a>
            </div>
        </div>
        <div class="bottomdashboardone">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Transactions</a>
                  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Pending</a>
                  <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Penalties</a>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active customerorders" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="topcontent">
                        <div class="lefttopcontent">
                            <h5>Paid To My Account <span>(ksh :0)</span> </h5>
                        </div>
                        <div class="righttopcontent">
                            <form action="">
                                <div class="scontent"> 
                                <input type="text" class="toprightinput" placeholder="filter transactions">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="bottomcontent">
                        <div class="topbottomcontent">
                            <img src="{{ asset('pages/images/no-transactions.svg') }}" alt="">
                            <h5>No Transactions yet</h5>
                            <p>You have pending payments or uncompleted tasks</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade customerorders" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="topcontent">
                        <div class="lefttopcontent">
                            <h5>Pending Payments <span>(0)</span></h5>
                        </div>
                        <div class="righttopcontent">
                            <form action="">
                                <div class="scontent"> 
                                <input type="text" class="toprightinput" placeholder="search">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="bottomcontent">
                        <div class="topbottomcontent">
                            <img src="{{ asset('pages/images/no-transactions.svg') }}" alt="">
                            <h5>Nothing Here</h5>
                            <p>All Completed Unpaid Jobs will be Displayed In This Section</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade customerorders" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="topcontent">
                        <div class="lefttopcontent">
                            <h5>New Penalties </h5>
                        </div>
                        <div class="righttopcontent">
                            <form action="">
                                <div class="scontent"> 
                                <input type="text" class="toprightinput" placeholder="search">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="bottomcontent">
                        <div class="topbottomcontent">
                            <img src="{{ asset('pages/images/no-transactions.svg') }}" alt="">
                            <h5>Nothing Here</h5>
                            <p>All penalties given will be displayed here</p>
                        </div>
                    </div>
                </div>
              </div>
        </div>
    </div>
@endsection