@include ('finallayout.view')
	
    <!-- Page Title Start -->
    <div class="row">
        <div class="col xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-title-wrapper">
                <div class="page-title-box">
                    <h4 class="page-title">Data Tables</h4>
                </div>
                <div class="breadcrumb-list">
                    <ul>
                        <li class="breadcrumb-link">
                            <a href="index.html"><i class="fas fa-home mr-2"></i>Dashboard</a>
                        </li>
                        <li class="breadcrumb-link active">Data Tables</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Products view Start -->
    <div class="row">
        <!-- Styled Table Card-->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card table-card">
                <div class="card-header pb-0">
                    <h4>Default Datatable</h4>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>SKU</th>
                                <th>Title</th>
                                <th>Opening Stock</th>
                                <th>Creation Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0 ?>
                            @foreach($items as $item)
                            <?php $i++ ?>
                            <tr>
                                <td>{{ $i}}</td>
                                <td>{{$item['sku']}}</td>
                                <td>{{$item['title']}}</td>
                                <td>{{$item['openingstock']}}</td>
                                <td>{{$item['created_at']}}</td>
                                <td>
                                    @if ($item['status']==0)
                                    <button class="status_checks btn btn-success mt-2 mr-2 sm-btn"  status="0" >Active</button>
                                    @else
                                    <button class="status_checks btn btn-danger mt-2 mr-2 sm-btn"  status="1" >Inactive</button>
                                    @endif 
                                </td>
                                <td>
                                    <div class="btn-group btn-group-pill mt-2" role="group" aria-label="Basic example">
                                        <a class="btn btn-primary sm-btn" href="{{url('/more-list')}}">View</a>
                                        <a class="btn btn-secondary sm-btn" href={{"edit/".$item['id']}}>Edit</a>
                                        @if ($item['status']==1)
                                            <button class="btn btn-success sm-btn status_checks" type="button"  id={{$item['id']}} status="1" >Active</button>
                                        @else
                                            <button class="btn btn-danger sm-btn status_checks" type="button"  id={{$item['id']}} status="0" >Inactive</button>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@include ('finallayout.foot')
<script type="text/javascript" src="{{url('assets/js/active.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>