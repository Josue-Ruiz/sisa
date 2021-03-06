
@push('extra_css')
    <link href="{{ asset('vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
@endpush


@push('extra_js')
    <script src="{{ asset('vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
    <script src="{{ asset('vendor/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
@endpush

@extends('layouts.master')

@section('content')

    <div class="col-md-12 col-sm-12 col-xs-12">
    @include('components.alerts.all')
            <div class="x_panel">
                  <div class="x_title">
                    <h2>Roles de usuarios<small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                   <li>
                        <a href="{{ route('roles.create') }}"><button class="btn btn-sm btn-success" type="button"><i class="fa fa-plus"></i> Agregar</button></a>
                   </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                @if(count($registers)>0)

                  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>N°</th>
                          <th>Nombre</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach($registers as $key=>$item)
                            <tr>

                                <td>{{$key+1}}</td>
                                <td>{{$item->nombre}}</td>
                                <td>
                                <a href="{{ route('roles.edit',$item->id) }}"><button class="btn btn-sm btn-warning" type="button"><i class="fa fa-edit"></i> Editar</button></a>

                                <button class="btn btn-sm btn-danger"  data-toggle="modal" data-target="#modal-confirm-delete-{{$item->id}}"><i class="fa fa-trash-o"></i> Eliminar</button>


                                </td>
                            </tr>
                            @include('components.alerts.confirm',['ruta'=>route('roles.destroy',$item->id),'id'=>$item->id])
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
