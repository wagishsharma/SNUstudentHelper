@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    New CabPool Request
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New cabRequest Form -->
                    <form action="{{ url('cabRequest') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- cabRequest Name -->
                        <div class="form-group">
                            <label for="cabRequest-item" class="col-sm-3 control-label">Pickup Location</label>

                            <div class="col-sm-6">
                                <input type="text" name="pickupLocation" id="cabRequest-item" class="form-control" value="{{ old('receipt') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cabRequest-variety" class="col-sm-3 control-label">Destination</label>

                            <div class="col-sm-6">
                                <input type="text" name="destination" id="cabRequest-variety" class="form-control" value="{{ old('receipt') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cabRequest-harvestedDate" class="col-sm-3 control-label">Date</label>

                            <div class="col-sm-6">
                               
                                
                                 {{ Form::text('date', null, array('class' => 'form-control datepicker','placeholder' => 'Date','id' => 'datepicker')) }}
                            </div>


                        </div>
                        
                        <div class="form-group">
                            <label for="cabRequest-receivedFrom" class="col-sm-3 control-label">Time</label>

                            <div class="col-sm-6">
                                
                                {{ Form::select('time',['morning'=>'morning','afternoon'=>'afternoon','evening'=>'evening','night'=>'night'],null,array('class' => 'form-control '))}}
                            </div>
                        </div>
                         


                        <!-- Add cabRequest Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Request
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current cabRequests -->
        @if (count($cabRequests) > 0)

                <div class="panel panel-default">
                    <div class="panel-heading">
                        Current cabRequests       
                    </div>

                    <div class="table-responsive">

                        <table class="table table-striped cabRequest-table">
                            <thead>
                                <th>Pickup Location</th>
                                <th>Destination</th>
                                <th>Date</th>
                                <th>Time</th>
                                
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($cabRequests as $cabRequest)
                                    <tr>
                                        <td class="table-text"><div>{{ $cabRequest->pickupLocation }}</div></td> 
                                        <td class="table-text"><div>{{ $cabRequest->destination }}</div></td>
                                        <td class="table-date"><div>{{ $cabRequest->date }}</div></td>
                                        <td class="table-date"><div>{{ $cabRequest->time}}</div></td>
                                        
                                       
                                        
                                        
                                        <!-- cabRequest Delete Button -->
                                        <td>
                                            <form action="{{url('cabRequest/' . $cabRequest->id)}}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" id="delete-cabRequest-{{ $cabRequest->id }}" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
      
        </div>
    </div>
@endsection
