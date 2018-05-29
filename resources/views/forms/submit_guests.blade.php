@extends('layouts.main')

@section('main')
    <div class="row justify-content-md-center">
        <div class="col col-lg-6">
            <guests-form>
                <template slot="header">
                    <h2>Please fill out the form</h2>
                </template>
            </guests-form>
        </div>
    </div>
@endsection