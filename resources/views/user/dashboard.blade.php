@extends('layouts.app')

@section('content')
<section class="dashboard my-5">
        <div class="container">
            <div class="row text-left">
                <div class=" col-lg-12 col-12 header-wrap mt-4">
                    <p class="story">
                        DASHBOARD
                    </p>
                    <h2 class="primary-header ">
                        My Bootcamps
                    </h2>
                </div>
            </div>
            <div class="row my-5">
                
                <table class="table">
                    <tbody>
                        @forelse ($checkouts as $checkout)
                        <tr class="align-middle">
                            <td width="18%">
                                <img src="{{asset('images/item_bootcamp.png')}}" height="120" alt="">
                            </td>
                            <td>
                                <p class="mb-2">
                                    <strong>{{$checkout->Camp->title}}</strong>
                                </p>
                                <p>
                                {{$checkout->created_at->format('M d, Y')}}
                                </p>
                            </td>
                            <td>
                                <strong>${{$checkout->Camp->price}}k</strong>
                            </td>
                            <td>
                                @if ($checkout->is_bool)
                                    <strong class="text-success">Payment Success</strong>
                                @else
                                    <strong>Waiting for Payment</strong>
                                @endif
                                
                            </td>
                            <td>
                                <a href="https://wa.me/083812379277?text=Hi, Saya ingi bertanya tentang kelas {{$checkout->Camp->title}}" class="btn btn-primary">
                                    Contact Support
                                </a>
                            </td>
                        </tr>
                        @empty
                            <td rowspan="5"><h3>No Data</h3></td>
                        @endforelse
                    
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection