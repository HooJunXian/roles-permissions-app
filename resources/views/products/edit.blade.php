@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Project</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('products.update',$product->id) }}" method="POST">
        @csrf
        @method('PUT')
         <div class="row">
            @if(Auth::id()=='1')
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Student Name:</strong>
                    <select class="form-control" name="studname">
                        <option value={{$product->studname}}>{{$product->studname}}</option>
                        @foreach($data as $user)
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    @if($v=="Student")
                                        @if($product->studname != $user->name)
                                            <option value={{$user->name}}>{{$user->name}}</option>
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Project Title:</strong>
                    <input type="text" name="projtitle" class="form-control"  value="{{$product->projtitle}}" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Project type:</strong>
                    <select class="form-control" name="projtype">
                        @if($product->projtype=='Development Project')
                        <option value="Development Project">Development Project</option>
                        <option value="Research Project">Research Project</option>
                        @endif
                        @if($product->projtype=='Research Project')
                        <option value="Research Project">Research Project</option>
                        <option value="Development Project">Development Project</option>
                        @endif
                      </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Supervisor:</strong>
                    <select class="form-control" name="supname">
                        <option value={{$product->supname}}>{{$product->supname}}</option>
                        @foreach($data as $user)
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    @if($v=="Lecturer")
                                        @if($product->supname != $user->name)
                                            <option value={{$user->name}}>{{$user->name}}</option>
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Examiner 1:</strong>
                    <select class="form-control" name="ex1name">
                        <option value={{$product->ex1name}}>{{$product->ex1name}}</option>
                        @foreach($data as $user)
                            @if(!empty($user->getRoleNames()))
                                @foreach($user->getRoleNames() as $v)
                                    @if($v=="Lecturer")
                                        @if($product->ex1name != $user->name)
                                            <option value={{$user->name}}>{{$user->name}}</option>
                                        @endif
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Examiner 2:</strong>
                        <select class="form-control" name="ex2name">
                            <option value={{$product->ex2name}}>{{$product->ex2name}}</option>
                            @foreach($data as $user)
                                @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                        @if($v=="Lecturer")
                                            @if($product->ex2name != $user->name)
                                                <option value={{$user->name}}>{{$user->name}}</option>
                                            @endif
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif
            @if(Auth::user()->name==$product->supname)
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Start Date:</strong>
                    <input type="date" name="startdate" class="form-control" value="{{$product->startdate}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>End Date:</strong>
                    <input type="date" name="enddate" class="form-control" value="{{$product->enddate}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Project Progress:</strong>
                    <select class="form-control" name="projprogress">
                        @if($product->projprogress=='Milestone1')
                            <option value="Milestone 1">Milestone 1</option>
                            <option value="Milestone 2">Milestone 2</option>
                            <option value="Final Report">Final Report</option>
                        
                        @elseif($product->projprogress=='Milestone2')
                            <option value="Milestone 2">Milestone 2</option>
                            <option value="Milestone 1">Milestone 1</option>
                            <option value="Final Report">Final Report</option>
                        
                        @elseif($product->projprogress=='FinalReport')
                            <option value="Final Report">Final Report</option>
                            <option value="Milestone 2">Milestone 2</option>
                            <option value="Milestone 1">Milestone 1</option>
                        @else
                            <option value="Milestone 1">Milestone 1</option>
                            <option value="Milestone 2">Milestone 2</option>
                            <option value="Final Report">Final Report</option>
                        @endif
                    </select>   
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Project Status:</strong>
                    <select class="form-control" name="projstatus">
                        @if($product->projstatus=='On track')
                            <option value="On track">On track</option>
                            <option value="Delayed">Delayed</option>
                            <option value="Extended">Extended</option>
                            <option value="Completed">Completed</option>
                        @elseif($product->projstatus=='Delayed')
                            <option value="Delayed">Delayed</option>
                            <option value="On track">On track</option>
                            <option value="Extended">Extended</option>
                            <option value="Completed">Completed</option>
                        @elseif($product->projstatus=='Extended')
                            <option value="Extended">Extended</option>    
                            <option value="Delayed">Delayed</option>
                            <option value="On track">On track</option>
                            <option value="Completed">Completed</option>
                        @elseif($product->projstatus=='Completed')
                            <option value="Completed">Completed</option>
                            <option value="Extended">Extended</option>    
                            <option value="Delayed">Delayed</option>
                            <option value="On track">On track</option>
                        @else
                            <option value="On track">On track</option>
                            <option value="Delayed">Delayed</option>
                            <option value="Extended">Extended</option>
                            <option value="Completed">Completed</option>
                        @endif
                      </select>
                </div>
            </div>
            @endif
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection