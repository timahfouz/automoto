@extends('admin.layout.master')
@section('title')
    Donations
@endsection

@section('content')

    <div class="statbox widget box box-shadow" >
        <div class="widget-header" >
            <div class="row" style="padding: 24px;">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4> Donations List
                    </h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">

                    <thead>
                    <tr>
                        <th class="">Condition ID</th>
                        <th class="">User Phone</th>
                        <th class="">Amount</th>
                        <th class="">Case Title</th>
                        <th class="">Case Description</th>
                        <th class="">Donation Time</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($items as $item)
                        <tr>
                            <td class="checkbox-column">
                                <a style="color: blue; font-size:18px; text-decoration: underline" href="{{ route('admin.cases.show', $item->condition->id) }}">{{ $item->condition->id }}</a>
                            </td>
                            <td class="checkbox-column">
                                <a style="color: blue; font-size:18px; text-decoration: underline" href="{{ route('admin.users.edit', $item->user->id) }}">{{ $item->user->name }}</a>
                            </td>
                            <td class="checkbox-column">
                                <b style="font-size: 18px;">{{ $item->user->phone }}</b>
                            </td>
                            <td class="checkbox-column">
                                <b style="font-size: 18px;">{{ $item->amount }}</b>
                            </td>
                            <td class="checkbox-column">
                                <b style="font-size: 18px;">{{ $item->condition->title }}</b>
                            </td>
                            <td class="checkbox-column">
                                <b style="font-size: 18px;">{{ $item->condition->description }}</b>
                            </td>
                            <td class="checkbox-column">
                                <b style="font-size: 18px;">{{ $item->created_at->format('Y-m-d h:ia') }}</b>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>


            </div>


        </div>
    </div>



@endsection
