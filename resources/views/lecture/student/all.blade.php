@extends('layouts.layout')
@section('title', $title)
@push('css')
    <style>
        #dataTableBuilder_wrapper,table,
       form .select2-container--default.select2-container--disabled,
       form .select2.select2-container.select2-container--default.select2-container--focus {
           width: 100% !important;
       }

    </style>
@endpush
@section('content')
    <div class="m-content">
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                          {{$title}}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row px-5 py-2 pb-5 ">

                {!! $dataTable->table(["class"=> "table table-striped table-bordered table-hover table-checkable no-footer"],true) !!}

            </div>
        </div>
    </div>
@endsection
@push('js')
    {!! $dataTable->scripts() !!}
@endpush
