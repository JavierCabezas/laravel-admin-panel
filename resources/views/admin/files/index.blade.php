@extends('admin.layout')

@section('content')
    <div class="right_col" role="main">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Administrador de <small>Archivos</small></h2>
                      <ul class="nav navbar-right panel_toolbox">
                          <li>
                              <button type="button" class="btn btn-success" onclick="window.location='{{ route('admin::files.pdf_response') }}';">Visualizar PDF en browser</button>
                          </li>
                          <li>
                              <button type="button" class="btn btn-success" onclick="window.location='{{ route('admin::files.pdf_save_file') }}';">Crear PDF</button>
                          </li>
                      </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive">

                              <thead>
                                  <tr>
                                      <th>Name</th>
                                      <th>Hash</th>
                                      <th>Path</th>
                                      <th>Mime Type</th>
                                      <th>Extension</th>
                                      <th>Size</th>
                                      <th>Descargar</th>
                                  </tr>
                              </thead>

                              <tbody>
                                  @foreach ($items as $item)
                                  <tr>

                                      <td>{{ $item->name }}</td>
                                      <td>{{ $item->hash }}</td>
                                      <td>{{ $item->path }}</td>
                                      <td>{{ $item->mime_type }}</td>
                                      <td>{{ $item->extension }}</td>
                                      <td>{{ $item->size }}</td>
                                      <td><a href="{{ route('admin::files.download', ['file' => $item->id]) }}">Descargar</a></td>
                                  </tr>
                                  @endforeach
                              </tbody>

                          </table>
                          @if($items->total() > 0)
                              <div class="row">
                                  <div class="col-sm-4 text-muted font-13">Mostrando registros del {{$items->firstItem()}} al {{$items->lastItem()}} de {{$items->total()}}.</div>
                                  <div class="col-sm-8 text-right">{{$items->appends(['search' => request('search')])->links()}}</div>
                              </div>
                          @endif
                </div>
            </div>
        </div>
    </div>


@stop

@section('js-scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable-responsive').DataTable({
                dom: 't',
                bDestroy: true,
                language: {
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }
            });
        });
    </script>
@stop
