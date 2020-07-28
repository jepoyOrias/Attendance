@extends('layouts.layout')
@section('title','records')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css">
<style>
    .ui-datepicker-calendar {
        display: none;
    }
    .ui-datepicker .ui-datepicker-buttonpane button {
        font-weight: normal;
        padding: .2em .6em .3em .6em;
    }
    .ui-widget {
        font-size: 0.9rem;
    }
</style>
    <div class="container py-4">
        <div class="card">
            <div class="card-header"><strong>Attendance Record</strong></div>
            <div class="card-body">
                <div class="row my-2">
                    <div class="col-md-4">
                        <a href="/intern" type="button" class="btn btn-sm btn-primary"><i class="fa fa-arrow-circle-left"></i></a>
                        <h1 class="mt-4">{{$info->name}}</h1>
                        <h3 class="text-primary">{{$info->intern_id}}</h3>
                        {{-- <a class="btn btn-outline-secondary" id="print" onclick="javascript:printlayer('printData')">Print DTR</a> --}}
                        <button class="btn btn-outline-success btn-sm" id="printBtn" onclick="print()"><i class="fa fa-print"></i> Print DTR</button>
                        <hr>
                        <h6>Address : <p class="text-primary">{{$info->address}}</p></h6>
                        <h6>Contact No. : <p class="text-primary">{{$info->mobile}}</p></h6>
                    </div>
                    <div class="col-md-8" id="printData">
                        
                    <form action="" method="get">
                            <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm"><d class="fas fa-calendar-alt"></i></span>
                                </div>
                                <input autocomplete="off" name="startDate" id="startDate"
                                 class="date-picker form-control col-3" placeholder="search month"
                                 value=""{{ old('startDate', date('Y-m-d')) }}/>
                                <button type="submit" class="btn btn-sm btn-secondary mx-2"><i class="fas fa-search"></i></button>
                            </div>
                    </form>
                        
                        <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th id="tname" class="text-center text-uppercase bg-light">{{$info->name}}</th>
                                <th id="tname" class="text-center text-uppercase bg-light">ID: {{$info->intern_id}}</th>
                                <th id="tname" class="text-center bg-light">{{$info->department->dept_name}}</th>              
                            </tr>
                            <tr>
                                <th colspan="3" class="text-center text-uppercase">
                                {{$monthName}} {{$year}}
                                </th>             
                            
                            </tr>
                            <tr class="bg-light">
                                <th>Time-in</th>
                                <th>Time-out</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($intern as $dtr)
                           
                            <tr>  
                                @if($dtr->Time_out == null && $dtr->created_at->format('d') != Carbon\Carbon::now()->format('d'))    
                                    <td colspan="2" class="text-center">This marked as Absent</td>
                                    <td>{{$dtr->created_at->format('M-d-Y')}}</td>
                                @else
                                    <td>{{date("h:i a",strtotime($dtr->Time_in))}}</td>
                                    @if($dtr->Time_out == null)
                                    <td>{{$dtr->Time_out}}</td>
                                @else
                                    <td>{{date("h:i a",strtotime($dtr->Time_out))}}</td>
                                @endif
                                <td>{{$dtr->created_at->format('M-d-Y')}}</td>
                                @endif
                              
                            </tr>
                          
                            @endforeach
                            
                            <tr class="bg-light">
                            <td colspan="2" align="right" class="font-weight-bold">Total time :</td>
                                <td>
                                    @php
                                    $totalTime = 0;
                                    
                                    foreach ($intern as $intern) {
                                        if($intern->created_at->format('M') == Carbon\Carbon::now()->format('M')){
                                        if(is_null($intern->Time_out)){
                                                                                           
                                           
                                        }else{

                                            $start = new Carbon\Carbon($intern->Time_in);
                                            $end = new Carbon\Carbon($intern->Time_out);
                                            $totalHours = $start->diffInHours($end); 
                                            $timeRender =  floor($totalHours);
                                            $totalTime += $timeRender;
                                            }
                                         }
                                        }
                                    echo $totalTime . " " . "Hours";
                                    @endphp
                                </td>  
                            </tr>
                            <tr>
                                <td colspan="2" align="right">Supervisor Signature :</td>
                                <td></td>
                            </tr> 
                        </tbody>
                        </table>
                    </div>      
                </div>
            </div>
            
        </div>
    </div>

    <script type="text/javascript">
        $(function() {
            $('.date-picker').datepicker( {
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                dateFormat: 'yy-mm',    
                onClose: function(dateText, inst) { 
                    var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                    var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                    $(this).datepicker('setDate', new Date(year, month, 1));
                    
                }

            });
        });

    </script>
@endsection

