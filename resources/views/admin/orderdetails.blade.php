@extends('admin.layout')
@section('content')
    <div class="orderdetails">
        <div class="toporderdetails">
             
        </div>
        <div class="topicedit">
            <div class="toptopicedit">
                <div class="lefttopedit">
                    <h5>Order Details  ({{ $order->task_id }} )</h5>
                </div>
                <div class="righttopedit">
                    
                       <button type="button" class="btn btn-primary" data-client="{{ $order->client_email}}" data-recordid="{{ $order->task_id}}" data-toggle="modal" data-target="#exampleModal">
                        Start Conversation Now
                      </button>
                </div>
            </div>

            {{-- MODAL CONTENT --}}
            
             
             <!-- Modal -->
             <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
               <div class="modal-dialog" role="document">
                 <div class="modal-content">
                   <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Start Chat Thread</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>
                   <form action="{{ url('admin/start-chat-thread') }}" method="POST">
                     @csrf 
                   <div class="modal-body">
                     <div class="form-group">
                         <label for="">Client Email</label>
                         <input type="email"   class="form-control" id="modalemail" readonly>
                         <input type="hidden" name="receiver" id="recipientemail">
                     </div>
                     <div class="form-group">
                         <label for="">Task Id</label>
                         <input type="number" min="10000000" max="99999999"  class="form-control" required id="modalrecordid" readonly>
                         <input type="hidden" name="taskid" id="modalrecordedid">
                     </div>
                     <div class="form-group">
                         <label for="">Message Body</label> 
                         <textarea name="description" id="" cols="30" rows="10" class="form-control" required></textarea>
                     </div>
                   </div>
                   <div class="modal-footer"> 
                     <button type="submit" class="btn btn-primary">Send Message</button>
                   </div>
                   </form>
                 </div>
             
               </div>
             </div>
            {{-- MODAL CONTENT --}}
            <div class="bottomtopicedit">
                <div class="bmoredetails">
                    <div class="eachbdetail">
                       <section>Date Uploaded: </section>
                       <section>  {{ $order->updated_at }}</section>
                    </div> 
                    <div class="eachbdetail">
                       <section>Topic: </section>
                       <section>  {{ $order->topic }}</section>
                    </div> 
                    <div class="eachbdetail">
                       <section>Date Expected: </section>
                       <section>  {{ $order->submission_date }}</section>
                    </div> 
                    <div class="eachbdetail">
                       <section>Time Given: </section>
                       <section>  {{ $order->deadline }} hours</section>
                    </div> 
                    <div class="eachbdetail">
                       <section>Amount Paying </section>
                       <section>  {{ $order->amount }} dollars</section>
                    </div> 
                    <div class="eachbdetail">
                       <section>Category</section>
                       <section>{{ $order->category }}</section>
                    </div>  
                    <div class="eachbdetail">
                       <section>Solution Format</section>
                       <section> {{ $order->solution_format }}</section>
                    </div> 
                    <div class="eachbdetail">
                       <section>Files</section>
                       <section> <a href="" class="btn btn-primary">click to download</a></section>
                    </div> 
                    <div class="eachbdetail">
                       <section>Description</section>
                       <section> {{ $order->description }}</section>
                    </div> 
                    <div class="eachbdetail">
                        <section>Language: </section>
                        <section>  {{ $order->language }}</section>
                     </div> 
                     <div class="eachbdetail">
                        <section>Education Level: </section>
                        <section>  {{ $order->education_level }}</section>
                     </div> 
                </div>
            </div>
        </div>
    </div>
@endsection