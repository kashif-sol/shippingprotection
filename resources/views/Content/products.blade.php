@extends('website')
@section('content')

{{-- @dd($setting) --}}

<section role="main" class="content-body content-body-modern mt-0">
    <header class="page-header page-header-left-inline-breadcrumb">
        <h2 class="font-weight-bold text-6">Products</h2>
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
                {{-- @if(session()->has('message'))
            <div class="alert alert-success">
             {{ session()->get('message') }}
                 </div>
@endif --}}
                <form method="POST" class="form-horizontal form-bordered " action="{{url('/saveproduct')}}" enctype="multipart/form-data" >
                    <input name="user_id" type="hidden" value="{{$user_id}}">
                    <input name="product_id" type="hidden" value="1">
                    @sessionToken
                    <div class="form-group row pb-4">
                        <label class="col-lg-3 control-label text-lg-end pt-2" for="inputDefault">Title</label>
                        <div class="col-lg-6">
                         
                            <input name="title" type="text" class="form-control title"   id="title">
                    
                        </div>
                    </div>

                    <div class="form-group row pb-4">
                        <label class="col-lg-3 control-label text-lg-end pt-2" for="inputDefault">Price</label>
                        <div class="col-lg-6">
                       
                            <input name="price" type="text" class="form-control price"   id="price">
                        </div>
                    </div>
                    
                    <div class="form-group row pb-4">
                        <label class="col-lg-3 control-label text-lg-end pt-2" for="inputDefault">Image</label>
                        <div class="col-lg-6">
                          
                            <input name="img_path" type="file" class="form-control detail"   id="image">
            
                        </div>
                    </div>
               
                
              

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2 col-lg-3"></label>
                            <div class="col-lg-9">
                                
                                <div >
                                    <button type="submit" class="mb-1 mt-1  me-1 btn btn-info">Save</button>
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-group row pb-3">
                            <label class="col-lg-3 control-label text-lg-end pt-2 col-lg-3"></label>
                            <div class="col-lg-9">
                                
                                <div >
                                    <a href="{{url('/senddata')}}" class="mb-1 mt-1  me-1 btn btn-info">Save </a>
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