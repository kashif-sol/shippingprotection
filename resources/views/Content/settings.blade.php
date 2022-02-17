@extends('website')
@section('content')

{{-- @dd($setting) --}}

<section role="main" class="content-body content-body-modern mt-0">
    <header class="page-header page-header-left-inline-breadcrumb">
        <h2 class="font-weight-bold text-6">Settings</h2>
        <div class="right-wrapper">
            <ol class="breadcrumbs">

                {{-- <li><span>Home</span></li>

                <li><span>eCommerce</span></li>

                <li><span>Products</span></li> --}}

            </ol>
        </div>
    </header>

    
    <div class="col">
    
        <section class="card">
          
            <div class="card-body ">
                @if(session()->has('message'))
            <div class="alert alert-success">
             {{ session()->get('message') }}
                 </div>
@endif
                <form method="POST" class="form-horizontal form-bordered " action="{{url('/settings/1')}}" >
                    <input name="shop_id" type="hidden" value="{{$shop_id}}">
                    @csrf 
                    <div class="form-group row pb-4">
                        <label class="col-lg-3 control-label text-lg-end pt-2" for="inputDefault">Heading</label>
                        <div class="col-lg-6">
                            @if(isset($setting))
                            <input name="heading" type="text" class="form-control heading" value="{{$setting->heading}}"  id="heading">
                        @else
                            <input name="heading" type="text" class="form-control heading"  id="heading">
                         
                        @endif
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-lg-3 control-label text-lg-end pt-2" for="inputDefault">Sub Heading</label>
                        <div class="col-lg-6">
                            @if(isset($setting))
                            <input name="sub_heading" type="text" class="form-control sub_heading" value="{{$setting->sub_heading}}"  id="sub_heading">
                       @else
                       <input name="sub_heading" type="text" class="form-control sub_heading"   id="sub_heading">
                    @endif

                      
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-lg-3 control-label text-lg-end pt-2" for="inputDefault">Detail</label>
                        <div class="col-lg-6">
                            @if(isset($setting))
                            <input name="detail" type="text" class="form-control detail" value="{{$setting->detail}}"  id="detail">
                        @else
                        <input name="detail" type="text" class="form-control detail"   id="detail">
                        @endif
                        </div>
                    </div>
                    <div class="form-group row pb-4">
                        <label class="col-lg-3 control-label text-lg-end pt-2" for="inputDefault">Popup</label>
                        <div class="col-lg-6">
                            {{-- <input type="text-" class="form-control Popup" id="Popup"> --}}
                            @if(isset($setting))

                            
                        <textarea name="popup" class="form-control Popup"  id="Popup">{{$setting->popup}} </textarea>
                       @else
                       <textarea name="popup" class="form-control Popup"  id="Popup"> </textarea>
                      @endif
                    </div>
                    </div>
                   

                    <div class="form-group row pb-3">
                        <label class="col-lg-3 control-label text-lg-end pt-2 col-lg-3"> Status</label>
                        <div class="col-lg-9"> 
                            <div class="switch switch-info">
                                @if(isset($setting))
                                @if($setting->status == 1)
                                    <input type="checkbox" name="status" data-plugin-ios-switch checked="checked"/>
                                @else
                                    <input type="checkbox" name="status" data-plugin-ios-switch/>
                                @endif
                            @else
                                <input type="checkbox" name="status" data-plugin-ios-switch/>
                            @endif
                            </div> 
                        </div>
                    </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2 col-lg-3"></label>
                            <div class="col-lg-9">
                                
                                <div >
                                    <button type="submit" class="mb-1 mt-1  me-1 btn btn-info">Update</button>
                                </div>
                                
                            </div>
                        </div>
                    
                   


                    


                  

                    

                   

                 
                   

                  

                  
                  

                  
                </div>
                </form>
            </div>
        </section>
    </div>






</section>






@endsection