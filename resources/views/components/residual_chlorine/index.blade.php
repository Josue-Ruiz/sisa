@push('extra_css')
    <link href="{{ asset('css/table.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }} " rel="stylesheet">
    <link href="{{ asset('vendor/switchery/dist/switchery.min.css') }}" rel="stylesheet">

    <link href="{{ asset('vendor/pnotify/dist/pnotify.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/pnotify/dist/pnotify.buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/pnotify/dist/pnotify.nonblock.css') }}" rel="stylesheet">
@endpush

@push('extra_js')
    <script src="{{ asset('vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
    <script src="{{ asset('vendor/iCheck/icheck.min.js') }}"></script>
    <script src="{{ asset('vendor/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('js/datetime.js') }}"></script>
    <script src="{{ asset('vendor/switchery/dist/switchery.min.js') }}"></script>
    <script src="{{ asset('js/notify.js') }}"></script>
    <script src="{{ asset('js/residual.js') }}"></script>

@endpush

@extends('layouts.master')

@section('content')


<div class="col-md-12 col-sm-12 col-xs-12">
    @include('components.alerts.all')
            <div class="x_panel">
                  <div class="x_title">
                    <h2>Notificaciónes de cloro residual<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                   <li>
                        <a href="{{ route('cloro-residual.create') }}"><button class="btn btn-sm btn-success" type="button"><i class="fa fa-plus"></i> Agregar</button></a>
                   </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                @if(count($registers)>0)

                <table   id="datatable-responsive" cellspacing="0" width="100%" class="table table-striped table-bordered  nowrap">
                    <thead class="header-table">
                        <tr>
                            <th>Folio</th>
                            <th>Municipio</th>
                            <th>Localidad</th>
                            <th>Dirección</th>
                            <th>Fecha y Hora </th>
                            <th>CRL(mg/l)</th>
                            <th>S/S</th>
                            <th>Causas</th>
                            <th>Acciones Ejecutadas</th>
                            <th>M.A.B</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
		        <tbody class="data-table">

            @foreach($registers as $key=>$item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->municipio}} <input type="hidden" name="municipio" value="{{$item->id_municipio}}"></td>
                    <td>{{$item->localidad}} <input type="hidden" name="localidad" value="{{$item->id_localidad}}"> </td>
                    <td>{{$item->calle  }} <input type="hidden" name="calle" value="{{$item->id_calle}}"></td>
                    <td>
                        <div class='date myDatepicker'>
                            <input type='text' class="form-control" name="fecha" id="fecha" readonly="read_only" />
                        </div>
                    </td>
                    <td><input type="number" name="valor"/></td>
                    <td><input type="checkbox"    name="ss" /></td>
                    <td><input type="text" name="causas" /></td>
                    <td><input type="text" name="acciones" /> </td>
                    <td> <input type="checkbox"     name="analisis" /> </td>
                    <td>

                        <button class="btn btn-sm btn-success saved"  ><i class="fa fa-save"></i> Guardar</button>
                    </td>
                </tr>
                @include('components.alerts.confirm',['ruta'=>route('cloro-residual.destroy',$item->id),'id'=>$item->id])
            @endforeach
		</tbody>
	</table>



                @else
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class=" profile-responsive ">
                            <div class="dropdown-menu-header">
                                <div class="dropdown-menu-header-inner ">
                                    <div class="menu-header-content">
                                        <div class="avatar-icon-wrapper mr-2 avatar-icon-xl">
                                            <img  src="{{ asset('images/empty/search_empty.png') }}" alt="" >
                                        </div>
                                        <div>
                                            <h1 class="text-search-results">No se encontraron resultados.</h1>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                @endif
                  </div>
                </div>
</div>



@endsection
