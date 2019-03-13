

@extends('layouts.app')

@section('content')
   

    <section id="events" class="events">
        <div class="w3-display-container" style="margin-bottom:50px">
  <img src="/allevents.jpg" style="width:100%">
  <div class="w3-display-bottomleft w3-container w3-amber w3-hover-orange w3-hide-small"
   style="bottom:10%;opacity:0.7;width:70%">
  
</div>
</div>

<style>
 {
  box-sizing: border-box;
}

.column {
  float: left;
  width: 50.33%;
  padding: 5px;
}

/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}
</style>
                @if (count($view) > 0) 
                 @foreach ($view as $event)
        <div class="w3-row w3-container" style="margin:50px 0">
<div class="w3-half w3-container">
  <div class="w3-topbar w3-border-amber">
   
  
    &nbsp;&nbsp;&nbsp;&nbsp;<img src="{{$event->image}}" style="width:25%">
   


                        <div class="col-lg-4">
                            <h2><a href="/login" class="">{{ $event->eventname }}</h2></a>
                            <div class="event-meta">
                                <div class="venue"><span class="label label-default">{{ $event->event_venue }}</span></div>
                                 <div class="venue"><span class="label label-default">{{ $event->startdate }}</span></div>
                                 <div class="venue"><span class="label label-default">{{ $event->enddate }}</span></div>
                               
                            </div>
                            {!! $event->description !!}
                        </div>
                        @if ($loop->index > 0 && ($loop->index + 1) % 3 == 0) </div><hr /><div class="row"> @endif
                    @endforeach
                @endif
           </div>
       </div>




    </section>

@endsection