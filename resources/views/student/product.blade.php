@extends('layouts.student.app')

@section('content')
    <div class="p-lg-5 p-4">
        <div class="d-flex justify-content-center align-items-center product-card">
            <div>
                <h5 class="text-center fw-600">No Product</h5>
                <a href="{{ route('student.card') }}">
                    <button class="btn btn-custom-bg text-white rounded-3 px-4">
                        Apply For Card
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection
