@extends('layouts.app')

@section('content')
<div class="mx-auto h-full flex justify-center items-center bg-gray-300">
    <div class="w-1/4 bg-blue-900 rounded-lg shadow-xl p-8">

        {{-- メインアイコン --}}
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="181px" viewBox="-0.5 -0.5 181 48" content="&lt;mxfile host=&quot;app.diagrams.net&quot; modified=&quot;2020-05-23T09:29:32.051Z&quot; agent=&quot;5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36&quot; etag=&quot;HE6jM4ghji1ju8ChEeZ-&quot; version=&quot;13.1.3&quot; type=&quot;google&quot;&gt;&lt;diagram id=&quot;eoWUthKHQIw06nZ4uOaG&quot; name=&quot;Page-1&quot;&gt;jZNNb8IwDIZ/TY+TaAvdOA72pWmckBjaZcoa02akcQkplP36uY1L6aZJE1JJHtuJ7bwO4nlRP1pR5guUoINoJOsgvguiaDpO6NuAkwdJOPYgs0p6FPZgqb6A4YhppSTsB44OUTtVDmGKxkDqBkxYi8eh2wb18NZSZPALLFOhf9NXJV3u6U103fMnUFne3RwmU28pROfMlexzIfF4geL7IJ5bROdXRT0H3fSu64uPe/jDek7MgnH/CVi56W69eNss6/UzfOrt+2r7fsVlHISuuOAgSjSdN9sgHUtZuxO3ItlV2Bmu9u1D3ZLDeFTWvbF9CY12EBFEMSTNb+C3Eenw4BVYKYy4dEqy5v9FWLGi/DgzKtEn563c3XOekYO64bkrNIGQlhYoX/HROoxoLyqHvoLWLLTKDK1T6iRQ6rMDWKdIA7dsKJSUTfCsRGVcq6jJLJjcNd1QWs+5YoOmcdo7i1v4AS1WRoLkBLjrdA3Ufz5neBYJDRdgAc6eyIUDEpYVz9WEt8depOENs/xCoDEzwXORnQ/upUMLVk+37VXa2i5GPb7/Bg==&lt;/diagram&gt;&lt;/mxfile&gt;" onclick="(function(svg){var src=window.event.target||window.event.srcElement;while (src!=null&amp;&amp;src.nodeName.toLowerCase()!='a'){src=src.parentNode;}if(src==null){if(svg.wnd!=null&amp;&amp;!svg.wnd.closed){svg.wnd.focus();}else{var r=function(evt){if(evt.data=='ready'&amp;&amp;evt.source==svg.wnd){svg.wnd.postMessage(decodeURIComponent(svg.getAttribute('content')),'*');window.removeEventListener('message',r);}};window.addEventListener('message',r);svg.wnd=window.open('https://app.diagrams.net/?client=1&amp;lightbox=1&amp;edit=_blank');}}})(this);" style="cursor:pointer;max-width:100%;max-height:48px;"><defs/><g><rect x="0" y="9" width="180" height="30" fill="none" stroke="none" pointer-events="all"/><g transform="translate(-0.5 -0.5)"><switch><foreignObject style="overflow: visible; text-align: left;" pointer-events="none" width="100%" height="100%" requiredFeatures="http://www.w3.org/TR/SVG11/feature#Extensibility"><div xmlns="http://www.w3.org/1999/xhtml" style="display: flex; align-items: unsafe center; justify-content: unsafe center; width: 1px; height: 1px; padding-top: 24px; margin-left: 90px;"><div style="box-sizing: border-box; font-size: 0; text-align: center; "><div style="display: inline-block; font-size: 12px; font-family: Helvetica; color: #000000; line-height: 1.2; pointer-events: all; white-space: nowrap; "><font style="font-size: 40px" color="#e6e6e6" face="Verdana">LaraVue</font></div></div></div></foreignObject><text x="90" y="28" fill="#000000" font-family="Helvetica" font-size="12px" text-anchor="middle">LaraVue</text></switch></g></g><switch><g requiredFeatures="http://www.w3.org/TR/SVG11/feature#Extensibility"/><a transform="translate(0,-5)" xlink:href="https://desk.draw.io/support/solutions/articles/16000042487" target="_blank"><text text-anchor="middle" font-size="10px" x="50%" y="100%">Viewer does not support full SVG 1.1</text></a></switch></svg>

        <h1 class="text-white text-3xl pt-8">Welcome Back</h1>
        <h2 class="text-blue-300">Enter your credentials below</h2>

        {{-- ログインフォーム --}}
        <form method="POST" action="{{ route('login') }}" class="pt-8">
            @csrf

            {{-- E-mail入力フォーム --}}
            <div class="relative">
                <label for="email" class="uppercase text-blue-500 text-xs font-bold absolute pl-3 pt-2">E-mail</label>

                <div>
                    <input id="email" type="email" class="pt-8 w-full rounded pb-2 pl-3 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="your@email.com">

                    @error('email')
                        <span class="text-red-600 text-sm pt-1" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            {{-- Password入力フォーム --}}
            <div class="relative pt-3">
                <label for="password" class="uppercase text-blue-500 text-xs font-bold absolute pl-3 pt-2">Password</label>

                <div>
                    <input id="password" type="password"  class="pt-8 w-full rounded pb-2 pl-3 bg-blue-800 text-gray-100 outline-none focus:bg-blue-700" name="password" autocomplete="current-password" placeholder="Password">

                    @error('password')
                        <span class="text-red-600 text-sm pt-1" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>

            {{-- Remeber-meチェックボタン --}}
            <div class="pt-2">
                <div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="text-white" for="remember">Remember Me</label>
                    </div>
                </div>
            </div>

            {{-- Loginボタン --}}
            <div class="pt-8">
                <button type="submit" class="w-full bg-gray-400 py-2 px-3 text-left uppercase rounded text-blue-800 font-bold">
                    Login
                </button>
            </div>

            {{-- PW再設定・新規登録のリンク　 --}}
            <div class="flex justify-between pt-8 text-white text-sm font-bold">
                <a class="" href="{{ route('password.request') }}">
                    Forgot Your Password?
                </a>
                <a class="" href="{{ route('register') }}">
                    Register
                </a>
            </div>

        </form>
    </div>
</div>
@endsection
