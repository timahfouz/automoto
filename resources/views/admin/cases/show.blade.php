@extends('admin.layout.master')
@section('title')
    Case Info
@endsection
@section('content')
    <div class="col-lg-12 col-12 layout-spacing">
        <div class="statbox widget box box-shadow">
            <div class="widget-header mt-3 ml-3">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>{{ $item->title}}</h4>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12 ml-3">
                <p style="font-size: 18px;font-family: times;">{{ $item->description}}</p>
            </div>

            <div class="widget-content widget-content-area">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Case Info</h4>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                    <thead>
                        <tr>
                            <th class="">Case ID</th>
                            <th class="">Added By</th>
                            <th class="">Case Gender</th>
                            <th class="">Case Age</th>
                            <th class="">Expired At</th>
                            <th class="">Required Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="checkbox-column">
                                {{ $item->id }}
                            </td>
                            <td class="checkbox-column">
                                {{ $item->type }}
                            </td>
                            <td class="checkbox-column">
                                {{ $item->gender }}
                            </td>
                            <td class="checkbox-column">
                                {{ $item->age }}
                            </td>
                            <td class="checkbox-column">
                                {{ $item->expired_at ? $item->expired_at->format('Y-m-d') : '---' }}
                            </td>
                            <td class="checkbox-column">
                                {{ $item->amount }}
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </div>

            <div class="widget-content widget-content-area">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Contact Info</h4>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                    <thead>
                        <tr>
                            <th class="">Phone</th>
                            <th class="">Email</th>
                            <th class="">Website</th>
                            <th class="">State</th>
                            <th class="">City</th>
                            <th class="">Address</th>
                            <th class="">Map Location</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="checkbox-column">
                                {{ $item->phone }}
                            </td>
                            <td class="checkbox-column">
                                {{ $item->email }}
                            </td>
                            <td class="checkbox-column">
                                {{ $item->website }}
                            </td>
                            <td class="checkbox-column">
                                {{ $item->state }}
                            </td>
                            <td class="checkbox-column">
                                {{ $item->city }}
                            </td>
                            <td class="checkbox-column">
                                {{ $item->address }}
                            </td>
                            <td class="checkbox-column">
                                <a target="_blank" style="text-decoration: underline; font-size: 14px; color:blue;" href="http://maps.google.com/?q={{ $item->lat.','.$item->lon }}">Open Google Map</a>
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </div>


            <div class="widget-content widget-content-area">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>User Info</h4>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                    <thead>
                        <tr>
                            <th class="">Name</th>
                            <th class="">Phone</th>
                            <th class="">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="checkbox-column">
                                <img class="avatar" src="{{ imagePath($item->user->image) }}" alt="">
                                {{ $item->user->name }}
                            </td>
                            <td class="checkbox-column">
                                <b style="font-size: 18px;">{{ $item->user->phone }}</b>
                            </td>
                            <td class="checkbox-column">
                                <b style="font-size: 18px;">{{ $item->user->email }}</b>
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </div>

            <div class="widget-content widget-content-area">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Charity Info</h4>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                    <thead>
                        <tr>
                            <th class="">User Name</th>
                            <th class="">User Phone</th>
                            <th class="">User Position</th>
                            <th class="">Foundation Name</th>
                            <th class="">Foundation Phone</th>
                            <th class="">Bio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="checkbox-column">
                                {{ $item->charity->user_name }}
                            </td>
                            <td class="checkbox-column">
                                {{ $item->charity->user_phone }}
                            </td>
                            <td class="checkbox-column">
                                {{ $item->charity->user_position }}
                            </td>
                            <td class="checkbox-column">
                                {{ $item->charity->foundation_name }}
                            </td>
                            <td class="checkbox-column">
                                {{ $item->charity->foundation_phone }}
                            </td>
                            <td class="checkbox-column">
                                {{ $item->charity->foundation_bio }}
                            </td>
                        </tr>
                    </tbody>
                </table> 
            </div>

            <div class="widget-content widget-content-area">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Tags</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 m-3">
                    @foreach($item->getTags as $tag) 
                        <span style="margin: 3px;
                        background-color: #eee;
                        padding: 10px;
                        border-radius: 12px;
                        color: black;
                        font-size: 16px;">{{ $tag->name }}</span>
                    @endforeach
                </div>
            </div>

            <div class="widget-content widget-content-area">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>Documents</h4>
                        </div>
                    </div>
                </div>
                @foreach($item->documents as $document) 
                <div class="col-md-1 m-3">
                    <a href="{{ $document->path }}" target="_blank">
                        <img class="avatar" src="{{ imagePath('uploads/PDF_file_icon.svg.png') }}" alt="">
                    </a>
                </div>
                @endforeach
                @foreach($item->images as $image) 
                <div class="col-md-3 m-3">
                    <img class="rect-image" src="{{ $image->path }}" alt="">
                </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
