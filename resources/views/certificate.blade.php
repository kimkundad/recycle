@extends('layouts.template')

@section('title')
บริการของเรา - wpnrayong
@stop

@section('stylesheet')

<style>
.grid-container {
  columns: 5 200px;
  column-gap: 1.5rem;
  width: 90%;
  margin: 0 auto;
}
.grid-container div {
  width: 150px;
  margin: 0 1.5rem 1.5rem 0;
  display: inline-block;
  width: 100%;
  border: solid 2px black;
  padding: 5px;
  box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5);
  border-radius: 5px;
  transition: all 0.25s ease-in-out;
}
.grid-container div:hover img {
  filter: grayscale(0);
}
.grid-container div:hover {
  border-color: #009247;
}
.grid-container div img {
  width: 100%;
  border-radius: 5px;
  transition: all 0.25s ease-in-out;
}
.grid-container div p {
  margin: 5px 0;
  padding: 0;
  text-align: center;
  font-style: italic;
}
</style>

@stop('stylesheet')

@section('content')




<div class="ps-deal-of-day mt-30">
    <div class="container">
        <div class="ps-section__header">
            <div class="ps-block--countdown-deal">
                <div class="ps-block__left">
                    <h3>ใบอนุญาตและรางวัลทั้งหมด</h3>
                </div>
            </div>
            
            
        </div>
        <div class="ps-section__content">

            
            <div class="grid-container">

                @isset($objs)
                @foreach($objs as $u)
                    <div>
                        <img src="{{ url('img/certificate/'.$u->image) }}" data-toggle="modal" data-target="#product-cer{{ $u->id }}" alt="{{ $u->name }}" class='grid-item grid-item-1' >
                        <p> {{ $u->name }} </p>
                    </div>

                @endforeach
                @endisset
           
            </div>
            @isset($objs)
                @foreach($objs as $u)
            <div class="modal fade " id="product-cer{{ $u->id }}" tabindex="-1" role="dialog" aria-labelledby="product-cer{{ $u->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    
                    <div class="modal-content">
                    
                        <span class="modal-close" data-dismiss="modal" style="text-align: right; margin: 5px;">
                            <img src="{{ url('img/close_green.svg') }}" class="h-30px">
                        </span>
                        <article class="ps-product--detailx ps-product--fullwidth ">
                            <div class="ps-product__header p-20" >
                                
                               <div class="text-center">
                                    <img src="{{ url('img/certificate/'.$u->image) }}" style="width:100%">
                               </div>
                                
                            </div>
                        </article>
                    </div>
                    
                </div>
              </div>
              @endforeach
                @endisset
            
           
        </div>
    </div>
</div>




@endsection

@section('scripts')
@stop('scripts')