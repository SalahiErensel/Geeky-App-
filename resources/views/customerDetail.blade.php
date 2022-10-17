@extends('layout.main')

@section('content')

<section class="section section-on-footer">

    <div class="container">

      <div class="row">

        <div class="col-12 ms-5 text-center">

          <h2 class="section-title">Customer Details</h2>
          
        </div>

        <div class="col-lg-12 mx-auto">

        @if($customerData != null) 

        <div class="table-responsive">

            <table class="table table-bordered table-striped">

              <thead>

                <tr>

                  <th>Name</th>

                  <th>Email</th>

                  <th>Balance</th>

                </tr>

              </thead>

              <tbody>

                <tr>

                  <td>{{$customerData->name}}</td>

                  <td>{{$customerData->email}}</td>

                  <td>{{$customerData->balance}}</td>
                   
            </td>

                </tr>

              </tbody>

            </table>

                <h4 class="modal-title">Withdraw & Deposit Money</h4>

                <form action="{{route('withdrawProcess') }}" method="POST">

                  @csrf

                  <input type="hidden" name="id" value="{{$customerData->id}}">

                    <div class="form-group">

                      <label for="amount">Withdraw Amount:</label>

                      <input type="number" class="form-control" min="0" max ="{{$customerData->balance}}" name="amount_val" placeholder="Enter Amount" id="amount" 
                      
                      required>

                    </div>

                    <button type="submit"  class="btn btn-primary btn-sm btn-block">Confirm Withdraw</button>
                    
                </form>

              <br>

              <br>

                <form action="{{route('depositProcess') }}" method="POST">

                  @csrf

                  <input type="hidden" name="id" value="{{$customerData->id}}">

                    <div class="form-group">

                      <label for="amount">Deposit Amount:</label>

                      <input type="number" class="form-control" min="10" name="amount_val" placeholder="Enter Amount" id="amount" required>

                    </div>

                    <button type="submit"  class="btn btn-danger btn-sm btn-block">Confirm Deposit</button>

                </form>

              </div>
  
        @endif

  </section>

@endsection()