@extends('layouts.app')

@section('content')
    <div class="col-12 col-sm-6 col-md-4 mt-2 mt-lg-2">
        <h1 class="display-4">2018</h1>

        <p class="lead">Holiday expenses for 2018</p>

        <table class="table table-sm table-hover">
            <caption>Holiday expenses for 2018</caption>
            <thead>
            <tr class="bg-dark text-white">
                <th scope="col">Family member</th>
                <th scope="col">Total</th>
                <th scope="col">Presents</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($summary as $summary_row)
                <tr>
                    <td><strong>{{ $summary_row['sub_category'] }}</strong></td>
                    <td>&pound;{{ $summary_row['actualised_total'] }}</td>
                    <td>{{ $summary_row['items'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
