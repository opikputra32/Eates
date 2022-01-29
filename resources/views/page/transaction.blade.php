@extends('layout.master')

@section('title', 'History Transaction')

@section('content')
    @if (session()->has('success'))
        <div class="mb-3">
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        </div>
    @endif
    <div class="container p-5">
        <h2 class="pb-3">My History Transaction</h2>
        <div class="accordion" id="accordionExample">
            @foreach ($transaction_list->unique('transaction_date') as $transactions => $transaction_unique)
                {{-- {{$transaction_unique}} --}}
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#{{ 'collapse' . $transaction_unique->transaction_id }}" aria-expanded="true"
                            aria-controls="collapseOne">
                            {{ $transaction_unique->transaction_date }}
                        </button>
                    </h2>
                    <div id="{{ 'collapse' . $transaction_unique->transaction_id }}" class="accordion-collapse collapse"
                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            @foreach ($transaction_list as $transactions => $transaction)
                                {{-- {{$transaction}} --}}
                                @if ($transaction->transaction_id == $transaction_unique->transaction_id)
                                    <div class="card mb-3 p-2">
                                        <div class="row g-0">
                                            <div class="col-md-3 p-2">
                                                <img src={{ $transaction->image }} class="img-fluid rounded-start"
                                                    alt="Gambar {{ $transaction->name }}">
                                            </div>
                                            <div class="col-md-5 d-flex flex-column p-2">
                                                <div class="flex-grow-1">
                                                    <div class="d-flex">
                                                        <h3 class="card-title text-bold mb-2">{{ $transaction->name }}
                                                        </h3>
                                                        <p class="text-muted">
                                                            <sup>(@currency($transaction->price))</sup>
                                                        </p>
                                                    </div>
                                                    <h6 class="card-subtitle text-muted mb-4">
                                                        x{{ $transaction->quantity }} pcs
                                                    </h6>
                                                </div>
                                                <div class="">
                                                    <h4>{{ App\Models\Courier::find($transaction->courier_id)->value('name') }}
                                                        <sup class="text-muted fs-6">{{ $transaction->status }}</sup>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            @currency($transaction->price)
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                            <div class="d-flex justify-content-end">
                                <h5 class="font-weight-bold">Total Price: @currency($transaction_unique->total)</h5>
                            </div>

                        </div>
                    </div>


                </div>
            @endforeach
        </div>
    </div>

@endsection
