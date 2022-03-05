@include ('finallayout.view')

    <!-- Page Title Start -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-title-wrapper">
                <div class="page-title-box">
                    <h4 class="page-title">Form</h4>
                </div>
                <div class="breadcrumb-list">
                    <ul>
                        <li class="breadcrumb-link">
                            <a href="{{url('/')}}"><i class="fas fa-home mr-2"></i>Dashboard</a>
                        </li>
                        <li class="breadcrumb-link active">Form</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- From Start -->
    <div class="from-wrapper">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add</h4>
                    </div>
                    <div class="card-body">
                        <form  id="yourform" class="separate-form" method="POST" enctype="multipart/form-data">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <h5 class="from-title mb-1">Info</h5>
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="{{$items['id']}}" >
                                            <label for="" class="col-form-label">SKU</label>
                                            <input class="form-control" type="text" name="sku" value="{{$items['sku']}}" placeholder="Enter SKU" id="sku">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Title</label>
                                            <input class="form-control" type="text" name="title" value="{{$items['title']}}" placeholder="Enter Title" id="title">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Capacity</label>
                                            <input class="form-control" type="text" name="capacity" value="{{$items['capacity']}}" placeholder="Enter Capacity" id="capacity">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Opening Stock</label>
                                            <input class="form-control" type="text" name="openingstock" value="{{$items['openingstock']}}" placeholder="Enter Opening Stock" id="openingstock">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Buffer Stock</label>
                                            <input class="form-control" type="text" name="bufferstock" value="{{$items['bufferstock']}}" placeholder="Enter Buffer Stock" id="bufferstock">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Unit</label>
                                            <select name="unit" class="form-control">
                                                <option value="">Select Unit</option>
                                                @if($items['units'])
                                                    @foreach($items['units'] as $unit)
                                                    <option value="{{ $unit->id }}" @if($unit->id == $items['unit_id']) selected @endif >{{ $unit->unit }}</option>
                                                    @endforeach
                                                @endif
                                            </select>                                                    
                                        </div>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Raw Material Add</label>
                                            <table class="table table-bordered" id="dynamic_field">
                                                <thead>
                                                    <tr>
                                                        <th>Select Raw Material</th>
                                                        <th>Quantity</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody">
                                                    <tr class="defaultTr">
                                                        <td>
                                                            <input type="text" name="item[]" class="form-control" value="{{$items['item']}}" placeholder="Raw Material Name here..">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="quantity[]" class="form-control" value="{{$items['quantity']}}" placeholder=" Quantity here..">
                                                        </td>
                                                        <td class="text-center" colspan="3">
                                                            <a class="btn btn-primary btn-sm" href="#" id="btnAddMore">+</a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Select Image</label>
                                            <input class="form-control" type="file" value="{{$items['image']}}" name="image" id="image">
                                        </div>
                                    </div>
                                </div>                   
                                <hr class="mt-4 mb-4">
                                <div class="form-group mb-0">
                                    <input class="btn btn-primary" type="submit">
                                </div>
                            </div>
                        </form>
                        @if (session('status'))
                            <h6 class="alert alert-success">{{ session('status') }}</h6>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@include ('finallayout.foot')
<script type="text/javascript" src="{{url('assets/js/jqueryvalidation.js')}}"></script>
<script type="text/javascript" src="{{url('assets/js/addmore.js')}}"></script>