@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="row">

            {{-- Day Report --}}
            <div class="col-4">
                <div class="card">

                    <div class="card-header">
                        <h3>Today Report</h3>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('search.date') }}" method="post">

                            @csrf

                            <div class="row">
                                <div class="col-12">
                                    <input type="date" name="date" class="form-control mb-3">
                                    <button type="submit" class="btn btn-dark rounded-0">Search</button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
            {{-- Day Report --}}

            {{-- Monthly Report --}}
            <div class="col-4">
                <div class="card">

                    <div class="card-header">
                        <h3>Monthly Report</h3>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('search.month') }}" method="post">

                            @csrf

                            <div class="row">

                                <div class="col-12">
                                    <select name="month" class="form-select mb-3">
                                        <option selected disabled>Select Month</option>
                                        <option value="January">January</option>
                                        <option value="February">February</option>
                                        <option value="March">March</option>
                                        <option value="April">April</option>
                                        <option value="May">May</option>
                                        <option value="June">June</option>
                                        <option value="July">July</option>
                                        <option value="August">August</option>
                                        <option value="September">September</option>
                                        <option value="October">October</option>
                                        <option value="November">November</option>
                                        <option value="December">December</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label for="">Year</label>
                                    <input type="text" name="year" autocomplete="off" class="form-control mb-3 mt-2">
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-dark rounded-0">Search</button>
                                </div>

                            </div>

                        </form>
                    </div>

                </div>
            </div>
            {{-- Monthly Report --}}

            {{-- Yearly Report --}}
            <div class="col-4">
                <div class="card">

                    <div class="card-header">
                        <h3>Yearly Report</h3>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('search.year') }}" method="post">

                            @csrf

                            <div class="row">

                                <div class="col-12">
                                    <label for="">Year</label>
                                    <input type="text" autocomplete="off" placeholder="2024" name="year"
                                        class="form-control mb-3 mt-2">
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-dark rounded-0">Search</button>
                                </div>

                            </div>

                        </form>
                    </div>

                </div>
            </div>
            {{-- Yearly Report --}}

        </div>
    </div>
@endsection
