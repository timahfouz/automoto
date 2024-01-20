@extends('admin.layout.master')
@section('title')
    Vendors
@endsection

@section('content')

    <div class="statbox widget box box-shadow" >
        <div class="widget-header" >
            <div class="row" style="padding: 24px;">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <div class="float-lg-left" style="display: flex;
                        justify-content: flex-start;
                        align-items: center;
                        gap: 24px;
                        width: 80%;"
                    >
                        <h4>  Vendors List </h4>
                        <form action="" style="width: 30%;">
                            <input type="text" class="form-control" name="keyword" placeholder="Search by name, bio, phone, whatsapp" value="{{ request()->get('keyword') }}">

                        </form>
                    </div>
                    
                    <div class="float-lg-right">
                        <a class="btn btn-primary" href="{{ route('admin.vendors.create') }}">Add new vendor</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">

                    <thead>
                    <tr>
                        <th class="">ID</th>
                        <th class="">Name</th>
                        <th class="">City</th>
                        <th class="">Area</th>
                        <th class="">Category</th>
                        <th class="">Start time</th>
                        <th class="">End time</th>
                        <th class="">New Job</th>
                        <th class="">Driver</th>
                        <th class="">Location</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td class="checkbox-column">
                                {{ $item->id }}
                            </td>
                            <td class="checkbox-column">
                                <img class="avatar" src="{{ imagePath($item->image->path) }}" alt="">
                                {{ $item->name }}
                            </td>
                            <td class="checkbox-column">
                                {{ $item->city->name ?? '---' }}
                            </td>
                            <td class="checkbox-column">
                                {{ $item->area->name ?? '---' }}
                            </td>
                            <td class="checkbox-column">
                                {{ $item->category->name ?? '---' }}
                            </td>
                            <td class="checkbox-column">
                                {{ date('h:i a', strtotime($item->start_time)) }}
                            </td>
                            <td class="checkbox-column">
                                {{ date('h:i a', strtotime($item->end_time)) }}
                            </td>
                            <td class="checkbox-column">
                                <span style="font-size: 18px;" class="fa fa-thumbs-{{ $item->is_new_job ? 'up' : 'down' }} text-{{ $item->is_new_job ? 'primary' : 'danger' }}"></span>
                            </td>
                            <td class="checkbox-column">
                                <span style="font-size: 18px;" class="fa fa-thumbs-{{ $item->is_driver ? 'up' : 'down' }} text-{{ $item->is_driver ? 'primary' : 'danger' }}"></span>
                            </td>
                            <td class="checkbox-column">
                                <a target="_blank" href="{{ $item->geo_url }}">Click here</a>
                            </td>

                            <td class="text-center">
                                <a data-toggle="tooltip" href="{{ route('admin.vendors.edit', $item->id) }}"
                                data-placement="top" title="" data-original-title="Edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="feather feather-edit-2 text-success">
                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                    </svg>
                                </a>

                                <button style="border: 0;background: none" type="button"  data-placement="top" title=""
                                        data-original-title="Delet" data-toggle="modal" data-target="#deleteModal{{$item->id}}">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-trash-2 text-danger">
                                        <polyline points="3 6 5 6 21 6"></polyline>
                                        <path
                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                    </svg>
                                </button>
                                <x-admin.delete-modal :route="$delte_route" :id="$item->id" />
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>


            </div>


        </div>
    </div>



@endsection
