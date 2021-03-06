<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <?=$navbar?>

    <form class="form-horizontal" role="form" action="https://yandex.ru/search/" role="search"
        aria-label="Поиск в интернете"
        data-bem="{&quot;suggest2-form&quot;:{},&quot;suggest2-counter&quot;:{&quot;service&quot;:&quot;morda_ru_desktop&quot;,&quot;host&quot;:&quot;//yandex.ru/clck&quot;,&quot;path&quot;:&quot;jclck&quot;,&quot;submitBySelect&quot;:true,&quot;preventSubmit&quot;:true,&quot;suggestReqID&quot;:true,&quot;params&quot;:{&quot;dtype&quot;:&quot;stred&quot;,&quot;pid&quot;:&quot;0&quot;,&quot;cid&quot;:&quot;2873&quot;}},&quot;search2&quot;:{&quot;cleanOnSubmit&quot;:false,&quot;nl&quot;:true}}">
        <div class="row">
            <div class="col-md-10">
                <input class="form-control" type="text" placeholder="Поиск Яндекса" autocomplete="off" autocorrect="off"
                    autocapitalize="off" spellcheck="false" aria-autocomplete="list" aria-label="Запрос" id="text"
                    maxlength="400" name="text" autofocus>
            </div>
            <div class="col-md-2">
                <button class="btn btn-success btn-block" data-bem="{&quot;button&quot;:{}}" tabindex="-1" role="button"
                    type="submit">Поиск</button>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-sm-12">
            <div class="row" id="content">
                <?=$content?>
            </div>
        </div>
    </div>
</div>