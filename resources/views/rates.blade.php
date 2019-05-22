@extends('layouts.app')

@section('content')
<div class="container">
    <transition name="fade" appear>


    <div class="row justify-content-center">
        <div class="col-md-9">
            <h3 class="font-weight-bold text-purple">Курсы валют</h3>
            <div class="hr_gradient mb-3"></div>

                <iframe class="mb-3" style="width:100%;border:0;overflow:hidden;background-color:transparent;height:184px"  scrolling="no" src="https://fortrader.org/informers/getInformer?st=33&cat=11&showGetBtn=0&w=0&from=2&to=11111&amount=1"></iframe>
            <iframe style="width:100%;border:0;overflow:hidden;background-color:transparent;height:237px" scrolling="no" src="https://fortrader.org/informers/getInformer?st=11&cat=7&title=%D0%9A%D1%83%D1%80%D1%81%D1%8B%20%D0%B2%D0%B0%D0%BB%D1%8E%D1%82%20%D0%A6%D0%91%20%D0%A0%D0%A4&texts=%7B%22toolTitle%22%3A%22%D0%92%D0%B0%D0%BB%D1%8E%D1%82%D0%B0%22%2C%22todayCourse%22%3A%22RUB%22%7D&mult=0.96&showGetBtn=0&hideHeader=0&hideDate=1&w=0&codes=1&colors=titleTextColor%3D454545%2CtitleBackgroundColor%3Dfff%2CthTextColor%3D454545%2CthBackgroundColor%3Dfff%2CsymbolTextColor%3D454545%2CtableTextColor%3D454545%2CborderTdColor%3Ddcdcdc%2CtableBorderColor%3Ddcdcdc%2CprofitTextColor%3D89bb50%2CprofitBackgroundColor%3Deaf7e1%2ClossTextColor%3Dff1616%2ClossBackgroundColor%3Df6e1e1%2CoddBackgroundTrColor%3Dfff%2CevenBackgroundTrColor%3Dfff%2CdataTextColor%3D454545%2CdataBackgroundColor%3Dffffff%2CinformerLinkTextColor%3D454545%2CinformerLinkBackgroundColor%3Dfff&items=2%2C21&columns=todayCourse&toCur=11111"></iframe>
            <iframe style="width:100%;border:0;overflow:hidden;background-color:transparent;height:409px" scrolling="no" src="https://fortrader.org/informers/getInformer?st=11&cat=9&title=%D0%9A%D1%83%D1%80%D1%81%20%D0%B2%D0%B0%D0%BB%D1%8E%D1%82%20%D0%BD%D0%B0%20%D0%BC%D0%B5%D0%B6%D0%B1%D0%B0%D0%BD%D0%BA%D0%B5&texts=%7B%22toolTitle%22%3A%22%D0%92%D0%B0%D0%BB%D1%8E%D1%82%D0%B0%22%2C%22bid%22%3A%22%D0%A6%D0%B5%D0%BD%D0%B0%22%2C%22ask%22%3A%22%D0%A1%D0%BF%D1%80%D0%BE%D1%81%22%2C%22chgPer%22%3A%22%D0%98%D0%B7%D0%BC.%20%25%22%7D&mult=1&showGetBtn=0&w=0&colors=false&items=54%2C99%2C115%2C107%2C63%2C25456%2C105&columns=bid%2Cask%2CchgPer"></iframe>

        </div>

    </div>
    </transition>
</div>
@endsection
