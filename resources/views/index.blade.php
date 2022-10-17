@extends('layout.main')

@section ('content')

<section class="section section-on-footer">

    <div class="container">

      <div class="row">

        <div class="col-12 text-center">

          <h2 class="section-title">Customer Account</h2>

        </div>

        <div class="col-lg-12 mx-auto">

          <div class="table-responsive">

            <table class="table table-bordered table-striped">

              <thead>

                <tr>

                  <th>#</th>
                  
                  <th>Name</th>

                  <th>Email</th>

                  <th>Balance</th>

                  <th>Transactions</th>

                </tr>

              </thead>

              <tbody>

                @foreach($allCustomers as $index=>$customers)

                <tr>

                  <td>{{$index+1}}</td>

                  <td>{{$customers->name}}</td>

                  <td>{{$customers->email}}</td>
                  
                  <td>{{$customers->balance}}</td>

                  <td><a href="{{url('customerData')}}/{{$customers->id}}"><button class="btn btn-primary">Withdraw & Deposit Money</button></a></td>

                </tr>

                @endforeach

              </tbody>

            </table>

          </div>

        </div>

      </div>

    </div>

  </section>

@endsection('content')