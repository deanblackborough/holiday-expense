@extends('layouts.app')

@section('content')
    <div class="col-12 col-sm-6 col-md-4 mt-2 mt-lg-2">
        <h1 class="display-4">Add holiday expense</h1>

        <p class="lead">You can add a new holiday expense using the form below.</p>

        <form method="post" action="#">
            <div class="form-group">
                <label for="item_description">Present description:</label>
                <input type="text" id="item_description" name="description" class="form-control form-control-sm" placeholder="Expense description" required autofocus />
            </div>
            <div class="form-row">
                <div class="form-group col-6">
                    <label for="item_date">Purchase date:</label>
                    <input type="date" id="item_date" name="effective_date" class="form-control form-control-sm" required />
                </div>
                <div class="form-group col-6">
                    <label for="item_total">Cost: &pound;</label>
                    <input type="number" name="total" id="item_total" class="form-control form-control-sm" min="0.00" max="10000.00" step="0.01" placeholder="2.50" required />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="category_id">Family:</label>
                </div>
                <div class="form-group col-12">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info btn-sm active">
                            <input type="radio" name="options" class="category_selector" value="{{ $category_id_1 }}" autocomplete="off" checked /> Our family
                        </label>
                        <label class="btn btn-info btn-sm">
                            <input type="radio" name="options" class="category_selector" value="{{ $category_id_2 }}" autocomplete="off" /> Aideens Family
                        </label>
                        <label class="btn btn-info btn-sm">
                            <input type="radio" name="options" class="category_selector" value="{{ $category_id_3 }}" autocomplete="off" /> Deans family
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="item_sub_category_id">Person:</label>
                <select id="item_sub_category_id" name="sub_category_id" class="form-control form-control-sm" required>
                    @foreach ($sub_categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{ csrf_field() }}
                <input type="hidden" id="item_category_id" name="category_id" value="{{ $category_id_1 }}" />
                <input type="hidden" id="percentage" name="percentage" value="100" />
                <button class="btn btn-primary btn-block mt-3" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection
