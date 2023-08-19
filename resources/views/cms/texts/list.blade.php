@extends('cms.layout.container')

@section('content')
<div class="col-sm-9 main">
    <div class="row main__title">
        <div class="col-sm-8">
            <h2><i class="fas fa-list"></i>{{ $title }}</h2>
            <p>{{ __('app.list') }}</p>
        </div>
        <div class="col-sm-4 shortcuts">
            <a
                href="{{ url('cms') }}"
                class="shortcut"
                data-toggle="tooltip"
                data-placement="bottom"
                title="{{ __('app.daschlow') }}"
            >
                <i class="fas fa-desktop"></i>
            </a>
            <a
                href="{{ url('cms/'.$route) }}"
                class="shortcut"
                data-toggle="tooltip"
                data-placement="bottom"
                title="{{ __('app.list') }}"
            >
                <i class="far fa-clone"></i>
            </a>
            <a
                href="{{ url('cms/'.$route.'/create') }}"
                class="shortcut"
                data-toggle="tooltip"
                data-placement="bottom"
                title="{{ __('app.add') }}"
            >
                <i class="fas fa-plus"></i>
            </a>
            <a
                href="https://symple.kayako.com/"
                target="_blank"
                class="shortcut"
                data-toggle="tooltip"
                data-placement="bottom"
                title="Support"
            >
                <i class="fas fa-question"></i>
            </a>
        </div>
    </div>
    @include('cms.partials.alerts')
    <div class="main__list">
        <div class="row form__title">
            <h3>{{ $title }}</h3>
        </div>
        <div class="row default__table">
            <div class="table-responsive">
                    <table class="display" id="dataTableSSR" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>{{ __('app.title') }}</th>
                            <th class="nosort">{{ __('app.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>{{ __('app.title') }}</th>
                            <th class="nosort">{{ __('app.action') }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">

$(document).ready(function() {
    $('#dataTableSSR').DataTable({
    'aoColumnDefs': [{
        'bSortable': false,
        'aTargets': ['nosort']
    }],
    'language': {
        "sEmptyTable":     "{!! __('app.sEmptyTable') !!}",
        "sInfo":           "{!! __('app.sInfo') !!}",
        "sInfoEmpty":      "{!! __('app.sInfoEmpty') !!}",
        "sInfoFiltered":   "{!! __('app.sInfoFiltered') !!}",
        "sInfoPostFix":    "",
        "sInfoThousands":  ".",
        "sLengthMenu":     "{!! __('app.sLengthMenu') !!}",
        "sLoadingRecords": "{!! __('app.sLoadingRecords') !!}",
        "sProcessing":     "{!! __('app.sProcessing') !!}",
        "sSearch":         "{!! __('app.sSearch') !!}",
        "sZeroRecords":    "{!! __('app.sZeroRecords') !!}",
        "oPaginate": {
            "sFirst":    "{!! __('app.sFirst') !!}",
            "sLast":     "{!! __('app.sLast') !!}",
            "sNext":     "{!! __('app.sNext') !!}",
            "sPrevious": "{!! __('app.sPrevious') !!}"
        },
        "oAria": {
            "sSortAscending":  ": {!! __('app.sSortAscending') !!}",
            "sSortDescending": ": {!! __('app.sSortDescending') !!}"
        }
    },
    "bProcessing": true,
    "serverSide": true,
    "ajax": {
        url: "{{ url('cms/'.$route.'/ajax') }}",
        type: "post",
        headers: {
            'X-CSRF-Token': "{{ csrf_token() }}"
        },
        error: function(){
            $("#dataTableSSR_processing").css("display","none");
            alert("{{ __('app.errorloading') }}")
        }
    },
    "createdRow": function (row, data, index) {
        $(row).addClass("text-center");
        $(row).find('td:eq(2)').addClass("td_action");
    },
    "order": [[ 0, "desc"]],
  });
});
</script>
@endsection