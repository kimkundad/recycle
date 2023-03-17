@extends('layouts.template')

@section('title')
บริการของเรา - wpnrayong
@stop

@section('stylesheet')



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

            
            <div class="row">

                @isset($objs)
                @foreach($objs as $u)
                    <div class="col-md-4 mt-15">
                      <button class="ps-btn--fullwidth-green btn-block" id="btnSendData" style="border-radius: 5px; border: solid 1px #009247 ">{{ $u->name }}</button>
                        <img src="{{ url('img/certificate/'.$u->image) }}" data-toggle="modal" data-target="#product-cer{{ $u->id }}" alt="{{ $u->name }}" class='img-fluid' 
                        style="border: solid 1px #009247; 
                        border-radius: 5px;     width: 100%;">
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